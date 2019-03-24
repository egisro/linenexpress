<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;
use App\Category;
use App\Price;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('admin.products.view_products',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $memberships = Membership::all('id','name');
      $categories = Category::all('id','name');
      return view('admin.products.add_product', ['categories' => $categories,'memberships' => $memberships]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      $product = new Product;
      $product -> category_id = $request['category_id'];
      $product -> product_name = $request['product_name'];
      $product -> product_code = $request['product_code'];
      $product -> description = $request['description'];
      if($request->hasFile('image')) {
        $image_tmp = Input::file('image');
              if ($image_tmp -> isValid()){
                  $extension = $image_tmp -> getClientOriginalExtension();
                  $filename = rand(111,99999).'.'.$extension;
                  $large_image_path = 'images/backend_images/products/large/'.$filename;
                  $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                  $small_image_path = 'images/backend_images/products/small/'.$filename;
                  // Resize Images
                  Image::make($image_tmp) -> save($large_image_path);
                  Image::make($image_tmp) -> resize(600,600) -> save($medium_image_path);
                  Image::make($image_tmp) -> resize(300,300) -> save($small_image_path);
                  // Store image name in products table
                  $product -> image = $filename;
              }
      }else{
          $product -> image = '';
      }
      if(isset($request['status'])?$status = 1:$status = 0);
      $product->status = $status;
      $product -> save();
      $memberships = Membership::all();
      $product->membership()->attach($memberships);
      foreach ($request->id as $key => $prices) {
        $price = new Price;
        $price->product_id = $product->id;
        $price->membership_id = $request->id[$key];
        $price->price = $request->price[$key];
        $price->save();
      }
      return redirect('/admin/products')->with('flash_message_success', 'Product has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
      $memberships = Membership::all('id','name');
      $categories = Category::all('id','name');
      return view('admin.products.edit_product', ['categories' => $categories,'memberships' => $memberships,'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request);
      if(isset($request['status'])?$status = 1:$status = 0);
      Product::where(['id'=> $id])->update([
        'category_id'=>$request['category_id'],
        'product_name'=>$request['product_name'],
        'product_code'=>$request['product_code'],
        'description'=>$request['description'],
        'image'=>$request['image'],
        'status'=>$status
        ]);
      $prices_id = $request->id;
      foreach($prices_id as $key => $price_id)
      {
          Price::find($price_id)->update(['price'=>$request->price[$key]]);
      }
      return redirect ('/admin/products')->with('flash_message_success', 'Product updated successfully!');
            //TODO padaryti nuotraukos atnaujinima
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd($id);
      $product = Product::find($id);
      $memberships = Membership::all();
      $product->membership()->detach($memberships);
      Price::where(['product_id'=> $id])->delete();
      $product->delete();
      return redirect ('/admin/products')->with('flash_message_success', 'Product has been deleted successfully!');
    }
}

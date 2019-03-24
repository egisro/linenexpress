<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      $products = Product::all();
      return view('admin.categories.view_categories',['categories'=>$categories,'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.categories.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(isset($request['status'])?$status = 1:$status = 0);
      $category = new Category;
      $category->name = $request['category_name'];
      $category->description = $request['description'];
      $category->url = $request['url'];
      $category->status = $status;
      $category->save();
      return redirect ('/admin/categories')->with('flash_message_success', 'Category added successfully!');
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
      $categoryDetails = Category::find($id);
      return view('admin.categories.edit_category')->with(compact('categoryDetails'));
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
      // $data = $request->all();
      if(isset($request['status'])?$status = 1:$status = 0);
      Category::where(['id'=> $id])->update(['name'=>$request['category_name'], 'description'=>$request['description'], 'url'=>$request['url'], 'status'=>$status]);
      return redirect ('/admin/categories')->with('flash_message_success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(isset($id)){
        $products = Product::where('category_id', '=', $id)->get();
        $without_category = Category::where('name', '=', 'Without category')->get();
        foreach ($products as $product) {
          Product::where('id', $product->id)->update(['category_id' => $without_category[0]->id]);
        }
        Category::find($id) -> delete();
        return redirect('/admin/categories')->with('flash_message_success', 'Category deleted successfully!');
      }
    }
}

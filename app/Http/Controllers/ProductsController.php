<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function addProduct(Request $request){

    	if($request -> isMethod('post')){
    		$data = $request -> all();
    		if (empty($data['category_id'])) {
    			return redirect()-> back()-> with('flash_message_error', 'Field "Select Category" is missing!');
    		}
    		$product = new Product;
    		$product -> category_id = $data['category_id'];
    		$product -> product_name = $data['product_name'];
    		$product -> product_code = $data['product_code'];
    		if (!empty($data['description'])) {
    			$product -> description = $data['description'];
    		} else {
    			$product -> description = '';
    		}
    		$product -> price = $data['price'];

    		// Upload Image
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
    		}
            else{
                $product -> image = '';
            }
            // Ceck checkbox
              if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }
            $product->status = $status;

    		// $product -> image = '';
    		$product -> save();
            return redirect()-> back()-> with('flash_message_success', 'Product has been added successfully!');
    		// return redirect('admin/view-products')-> with('flash_message_success', 'Product has been added successfully!');
    	}

    	//---------------- Categories Dropdown start-----------------//

      // $categories = Category::where(['parent_id' => 0]) -> get();
    	// $categories_dropdown = "<option value='' selected disabled>Select</option>";
    	// foreach ($categories as $cat) {
      //                     	         $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
      //                     		    	}
    	// return view('admin.products.add_product')-> with(compact('categories_dropdown'));
      $categories = \App\Category::all('id','name');
      // dump($categories);
      return view('admin.products.add_product', ['categories' => $categories]);
    //------------------------Categories Dropdown ends-------------//
    }

    public function editProduct(Request $request, $id = null) {
        if($request->isMethod('post')) {
            $data = $request->all();

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
                }
            } else{
                $filename = $data['current_image'];
            }
            if (empty($data['description'])) {
                $data['description']='';
            }

              if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }
            Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'description'=>$data['description'],'price'=>$data['price'],'image'=>$filename, 'status'=>$status]);
            return redirect()->back()->with('flash_message_success', 'Product has been updated successfully!');
        }

        // get Product Details
        $productDetails = Product::where(['id' =>$id]) -> first();

        // Categories Dropdown start
        $categories = Category::where(['parent_id' => 0]) -> get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if ($cat->id == $productDetails->category_id) {
                $selected = "selected";
            } else{
                $selected = "";
            }
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
                    }
        // Categories Dropdown ends
        return view('admin.products.edit_product')->with(compact('productDetails', 'categories_dropdown'));



        // if($request->isMethod('post')){
        //   $data = $request->all();
        //   Category::where(['id'=> $id])->update(['name'=>$data['category_name'], 'description'=>$data['description'], 'url'=>$data['url']]);
        //   return redirect ('/admin/view-categories')->with('flash_message_success', 'Category updated successfully!');
        // }
        // $categoryDetails = Category::where(['id'=>$id])->first();
        // return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }
    //

    public function viewProducts(){

        // $products = DB::table('products')
        //     ->join('categories', 'categories.id', '=', 'products.category_id')
        //     // ->join('prices', 'products.id', '=', 'prices.product_id')
        //     ->select('products.id','categories.name as categoryName','products.product_name as productName','products.product_code')
        //     // ->select('products.id','categories.name as categoryName','products.product_name as productName','products.product_code','prices.price','membership_id')
        //     ->get();

            $products = \App\Product::all();
            // dd($items[0][1]);

        return view('admin.products.view_products',['products' => $products]);
    }

    public function deleteProduct($id = null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully!');
    }

    public function deleteProductImage($id = null) {
        // Get product Image Name
        $productImage = Product::where(['id' => $id])->first();
        // Get Product Image Path
        $large_image_path = 'images/backend_images/products/large/';
        $medium_image_path = 'images/backend_images/products/medium/';
        $small_image_path = 'images/backend_images/products/small/';
        // Delete large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }// Delete medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }// Delete small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        // Delete Image from Products Table
        Product::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'Product Image has been deleted successfully!');
    }
}

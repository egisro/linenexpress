<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{


    public function addCategory(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            if (empty($data['status'])) {
              $status = 0;
            }else{
              $status = 1;
            }
           $category = new Category;
           $category->name = $data['category_name'];
           $category->description = $data['description'];
           $category->url = $data['url'];
           $category->status = $status;
           $category->save();
           return redirect ('/admin/view-categories')->with('flash_message_success', 'Category added successfully!');

        }
        return view('admin.categories.add_category');
    }


    public function viewCategories() {
      $categories = Category::all();
      $products = Product::all();
        return view('admin.categories.view_categories',['categories'=>$categories,'products'=>$products]);
    }

     public function deleteCategory($id) {
      if(!empty($id)){
        $products = Product::where('category_id', '=', $id)->get();
        $without_category = Category::where('name', '=', 'Without category')->get();
        // $products->category_id = $without_category[0]->id;
        foreach ($products as $product) {
          DB::table('products')
              ->where('id', $product->id)
              ->update(['category_id' => $without_category[0]->id]);
        }


        Category::where(['id' => $id]) -> delete();
        return redirect() -> back() -> with('flash_message_success', 'Category deleted successfully!');
      }
    }

     public function editCategory(Request $request, $id = null) {
        if($request->isMethod('post')){
          $data = $request->all();
           $data = $request->all();
            if (empty($data['status'])) {
              $status = 0;
            }else{
              $status = 1;
            }
          Category::where(['id'=> $id])->update(['name'=>$data['category_name'], 'description'=>$data['description'], 'url'=>$data['url'], 'status'=>$status]);
          return redirect ('/admin/view-categories')->with('flash_message_success', 'Category updated successfully!');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }
}

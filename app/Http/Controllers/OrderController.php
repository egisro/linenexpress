<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class OrderController extends Controller
{
    public function order()
    {
        $productsAll = Product::where('status',1)->get();
        $categories = Category::all();
        // $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        // $categories = json_decode(json_encode($categories));
        // echo "<pre>"; print_r($categories); die;
        // dump($categories);
        return view('order') -> with(compact('productsAll', 'categories'));
    }
}


// Old
 // public function order()
 //    {
 //        $productsAll = Product::get();
 //        $categories = Category::with('categories')->where(['parent_id'=>1])->get();
 //        $categories = json_decode(json_encode($categories));
 //        echo "<pre>"; print_r($categories); die;
 //        return view('order') -> with(compact('productsAll', 'categories'));
 //    }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // public function cat_prod_count($page){
    //     $categories_count = \App\Category::all('id')->count();
    //     $products_count = \App\Product::all('id')->count();
    //     // dump($products_count);
    //     return response(['categories_count'=>$categories_count, 'products_count'=>$products_count]);
    // }
}

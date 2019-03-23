<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;
use App\Price;
use App\Product;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $memberships = Membership::all();
      return view('admin.memberships.view_memberships',['memberships' => $memberships]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Product::all();
      return view('admin.memberships.add_membership',['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $membership = new Membership;
      $membership->name = $request['membership_name'];
      $membership->save();
      $products = Product::all();
      $membership->product()->attach($products);

      foreach ($request->id as $key => $product) {
        $price = new Price;
        $price->product_id = $request->id[$key];
        $price->membership_id = $membership->id;
        $price->price = $request->price[$key];
        $price->save();
      }
      return redirect ('/admin/memberships')->with('flash_message_success', 'Membership added successfully!');
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
      $membership_cur = Membership::find($id);
      $products = Product::all();
      return view('admin.memberships.edit_membership',['membership_cur'=>$membership_cur,'products'=>$products]);
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
      Membership::where(['id'=> $id])->update(['name'=>$request['membership_name']]);
      $prices = $request->input('products');
      foreach($prices as $price){
      Price::find($price['id'])->update(['price'=>$price['price']]);
    }
      // dd($prices);
      // \App\Price::where(['id'=> $id])->update(['name'=>$data['membership_name'], 'description'=>$data['description'], 'url'=>$data['url'], 'status'=>$status]);
      return redirect ('/admin/memberships')->with('flash_message_success', 'Membership and prices updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $membership = Membership::find($id);
      $products = Product::all();
      $membership->product()->detach($products);
      Price::where(['membership_id' => $id]) -> delete();
      Membership::find($id) -> delete();
      return redirect ('/admin/memberships')->with('flash_message_success', 'Membership deleted successfully!');
    }
}

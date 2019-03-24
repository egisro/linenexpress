<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Membership;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = Client::all();
      return view('admin.clients.view_clients',['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberships = Membership::all('id','name');
        return view('admin.clients.add_client',['memberships'=>$memberships]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $client = new Client;
      $client->name = $request['name'];
      $client->address = $request['address'];
      $client->membership_id = $request['membership_id'];
      $client->save();
      return redirect ('/admin/clients')->with('flash_message_success', 'Client added successfully!');
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
      $client = Client::find($id);
      $memberships = Membership::all('id','name');
      return view('admin.clients.edit_client',['client' => $client,'memberships'=>$memberships]);
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
        Client::where(['id'=> $id])->update(['name'=>$request['name'], 'address'=>$request['address'], 'membership_id'=>$request['membership_id']]);
        return redirect ('/admin/clients')->with('flash_message_success', 'Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Client::find($id) -> delete();
      return redirect('/admin/clients')->with('flash_message_success', 'Client deleted successfully!');
    }
}

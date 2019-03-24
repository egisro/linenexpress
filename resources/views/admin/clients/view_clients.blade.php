@extends('layouts.adminLayout.admin_design')
@section('content')

  <div id="content">
    <div id="content-header">
       <div id="breadcrumb">
         <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
         <a href="/admin/clients/create">Add Client</a>
         <a href="/admin/clients" class="current">View Clients</a>
       </div>
      <h1>Clients</h1>
         @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif

            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>View Clients</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>Client ID</th>
                  <th>Client Name</th>
                  <th>Client Address</th>
                  <th>Client Membership</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr class="gradeX">
                  <td>{{ $client -> id }}</td>
                  <td>{{ $client -> name }}</td>
                  <td>{{ $client -> address }}</td>
                  <td>{{ $client -> membership['name'] }}</td>
                  <td class="center">
                    <form class="" action="{{ url('/admin/clients',$client -> id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <!-- <a href="#myModal{{ $client -> id }}" data-toggle="modal"  class="btn btn-info btn-mini">View</a> -->
                      <a href="{{ url("/admin/clients/{$client->id}/edit/") }}" class="btn btn-primary btn-mini">Edit</a>
                      <button class="btn btn-danger btn-mini">Delete</button>
                    </form>
                  </td>
                </tr>


                  <div id="myModal{{ $client -> id }}" class="modal hide">
                    <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>Full Details for: {{ $client -> name }}</h3>
                    </div>
                    <div class="modal-body">
                      <p>Name: {{ $client -> name }}</p>
                      <p>ID: {{ $client -> id }}</p>
                      <p>Code: {{ $client -> address }}</p>
                      <p>Category: {{ $client -> membership_id }}</p>
                    </div>
                  </div>


                @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection

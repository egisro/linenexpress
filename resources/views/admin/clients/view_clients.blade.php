@extends('layouts.adminLayout.admin_design')
@section('content')

  <div id="content">
    <div id="content-header">
       <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Product</a> </div>
      <h1>Products</h1>
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
              <h5>View Products</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>Client ID</th>
                  <th>Client Name</th>
                  <th>Client Address</th>
                  <th>Client Membership</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr class="gradeX">
                  <td>{{ $client -> id }}</td>
                  <td>{{ $client -> name }}</td>
                  <td>{{ $client -> address }}</td>
                  <td>{{ $client -> membership_id }}</td>
                  <td class="center">
                    <a href="#myModal{{ $product -> id }}" data-toggle="modal"  class="btn btn-info btn-mini">View</a>
                    <a href="{{ url('/admin/add-client/') }}" class="btn btn-success btn-mini">Add</a>
                    <a href="{{ url('/admin/edit-client/'.$client -> id) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a id="delProduct" href="{{ url('/admin/delete-client/'.$client -> id) }}" class="btn btn-danger btn-mini">Delete</a>
                    <!-- <a rel="{{ $product->id }}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delet</a> -->
                  </td>
                </tr>


                  <div id="myModal{{ $product -> id }}" class="modal hide">
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

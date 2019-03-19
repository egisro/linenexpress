@extends('layouts.adminLayout.admin_design')
@section('content')

  <div id="content">
    <div id="content-header">
       <div id="breadcrumb"> <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/admin/add-product/">Add Product</a> <a href="#" class="current">View Products</a> </div>
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
                  <th>Product ID</th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  @foreach($products[0] -> membership as $membership)
                  <th>{{ $membership['name'] }} price</th>
                  @endforeach
                  <!-- <th>Silver Price</th>
                  <th>Golden Price</th>
                  <th>Diamond Price</th> -->
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $product -> id }}</td>
                  <td>{{ $product -> category -> name }}</td>
                  <td>{{ $product -> product_name }}</td>
                  <td>{{ $product -> product_code }}</td>
                  @foreach($product -> membership as $prices_col)
                  <td>
                    @foreach($prices_col['price'] as $prices)
                    {{ $prices['product_id'] == $product -> id ? $prices['price'] : ''}}
                    @endforeach
                  </td>
                  @endforeach
                  <td>

                    <img src="{{ asset('/images/backend_images/products/small/')}}" style="width:70px;">

                  </td>
                  <td class="center">
                    <a href="#myModal{id }" data-toggle="modal"  class="btn btn-info btn-mini">View</a>
                    <a href="{{ url('/admin/add-product/') }}" class="btn btn-success btn-mini">Add</a>
                    <a href="{{ url('/admin/edit-product/') }}" class="btn btn-primary btn-mini">Edit</a>
                    <a id="delProduct" href="" class="btn btn-danger btn-mini">Delete</a>
                    <!-- <a rel="{id}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delet</a> -->
                  </td>
                </tr>


                  <div id="myModal" class="modal hide">
                    <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>Full Details for: </h3>
                    </div>
                    <div class="modal-body">

                      <p>Name:</p>
                      <p>ID: </p>
                      <p>Code: </p>
                      <p>Category: </p>
                      <p>Price: </p>
                      <p>Description: </p>
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

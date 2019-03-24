@extends('layouts.adminLayout.admin_design')
@section('content')

  <div id="content">
    <div id="content-header">
       <div id="breadcrumb">
         <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
         <a href="/admin/products/create/">Add Product</a>
         <a href="/admin/products/" class="current">View Products</a>
       </div>
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
                    @if(!isset($product -> image))
                    <img src="{{ asset('/images/backend_images/products/small/')}}" style="width:70px;">
                    @endif
                  </td>
                  <td class="center">
                    <form class="" action="{{ url('/admin/products', $product -> id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url("/admin/products/{$product -> id}/edit") }}" class="btn btn-primary btn-mini">Edit</a>
                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                      </form>
                  </td>
                </tr>

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

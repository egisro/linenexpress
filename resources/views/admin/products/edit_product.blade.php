@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
              <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
              <a href="/admin/products/create/">Add Product</a>
              <a href="/admin/products/">View Products</a>
              <a href="#" class="current">Edit Product</a>
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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Product</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/products', $product->id) }}" name="edit_product" id="edit_product">
                              @csrf
                              @method('PUT')
                               <div class="control-group">
                                  <label class="control-label">Select Category</label>
                                  <div class="controls">
                                    <div class="select2-container" id="s2id_autogen1">
                                    <select name="category_id" id="category_id" style="width: 220px;">
                                      @foreach($categories as $category)
                                        <option value='{{ $category->id }}' {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Product Name</label>
                                    <div class="controls">
                                        <input type="text" name="product_name" value="{{ $product->product_name }}">
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label">Product Code</label>
                                    <div class="controls">
                                        <input type="text" name="product_code" value="{{ $product->product_code }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                @foreach($memberships as $membership)
                                 <div class="control-group">
                                    <label class="control-label">{{$membership->name}} price</label>
                                    <div class="controls">
                                        <input type="hidden" name="id[]" value="{{ $product->price[$loop->index]['id'] }}">
                                        <input type="text" name="price[]"  value="{{ $product->price[$loop->index]['price'] }}" required>
                                    </div>
                                </div>
                                @endforeach
                                 <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image">
                                        <input type="hidden" name="current_image" value="{{ $product->image }}">
                                        @if(!empty($product->image))
                                        <img style="width:50px;" src="{{ asset('/images/backend_images/products/small/'.$product->image) }}"> | <a href="{{ url('/admin/delete-product-image/'.$product->id ) }}">Delete</a>
                                        @endif
                                    </div>
                                </div>

                                 <div class="control-group">
                                    <label class="control-label">Enable</label>
                                    <div class="controls">
                                        <input type="checkbox" name="status" id="status" @if($product->status=="1") checked @endif value == "1">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit Product" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

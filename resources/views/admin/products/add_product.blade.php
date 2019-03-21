@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add Product</a> <a href="/admin/view-products/">View Products</a> </div>
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
                            <h5>Add Product</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}" name="add_product" id="add_product" novalidate="novalidate"> {{ csrf_field() }}

                               <div class="control-group">
                                  <label class="control-label">Select Category</label>
                                  <div class="controls">
                                    <!-- <div class="select2-container" id="s2id_autogen1"> -->
                                    <select name="category_id" id="category_id" style="display: none; width: 220px;" required>
                                      <option value='0' disabled selected>Select</option>
                                      @foreach($categories as $category)
                                        <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                      @endforeach
                                    </select>
                                    <!-- </div> -->
                                  </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Product Name</label>
                                    <div class="controls">
                                        <input type="text" name="product_name" id="product_name" required>
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label">Product Code</label>
                                    <div class="controls">
                                        <input type="text" name="product_code" id="product_code">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="description"></textarea>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Standart price</label>
                                    <div class="controls">
                                        <input type="text" name="standart_price" id="standart_price" required>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Silver price</label>
                                    <div class="controls">
                                        <input type="text" name="silver_price" id="silver_price" required>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Golden price</label>
                                    <div class="controls">
                                        <input type="text" name="golden_price" id="golden_price" required>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Diamond price</label>
                                    <div class="controls">
                                        <input type="text" name="diamond_price" id="diamond_price" required>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Enable</label>
                                    <div class="controls">
                                        <input type="checkbox" name="status" id="status" value="1">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Add Product" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()

@extends('layouts.adminLayout.admin_design')
@section('content')

 <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
              <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
              <a href="/admin/categories/create/">Add Category</a>
              <a href="/admin/categories/">View Categories</a>
              <a href="#" class="current">Edit Category</a>
            </div>
            <h1>Categories</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Category</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{ url('/admin/categories', $categoryDetails->id) }}">
                              @csrf
                              @method('PUT')
                                <div class="control-group">
                                    <label class="control-label">Category Name</label>
                                    <div class="controls">
                                        <input type="text" name="category_name" id="category_name" value="{{ $categoryDetails ->name }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="description">{{ $categoryDetails ->description }}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">URL (Start with http://)</label>
                                    <div class="controls">
                                        <input type="text" name="url" id="url" value="{{ $categoryDetails ->url }}">
                                    </div>
                                </div>

                                 <div class="control-group">
                                    <label class="control-label">Enable</label>
                                    <div class="controls">
                                        <input type="checkbox" name="status" id="status" @if($categoryDetails->status=="1") checked @endif value == "1">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Products in the category</label>
                                    <div class="controls">
                                        @foreach($categoryDetails->product as $product)
                                          <div>{{$product->product_name}}</div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Update Category" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

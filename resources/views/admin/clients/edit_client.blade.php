@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
              <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
              <a href="/admin/clients/create">Add Client</a>
              <a href="/admin/clients">View Client</a> 
              <a href="#" class="current">Edit Client</a>
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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit client</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-client/'.$clientDetails->id) }}" name="edit_client" id="edit_client" novalidate="novalidate"> {{ csrf_field() }}

                               <div class="control-group">
                                  <label class="control-label">Select Category</label>
                                  <div class="controls">
                                    <div class="select2-container" id="s2id_autogen1">
                                    <select name="category_id" id="category_id" style="display: none; width: 220px;">
                                          <?php echo $categories_dropdown; ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">client Name</label>
                                    <div class="controls">
                                        <input type="text" name="client_name" id="client_name" value="{{ $clientDetails ->client_name }}">
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label">client Code</label>
                                    <div class="controls">
                                        <input type="text" name="client_code" id="client_code" value="{{ $clientDetails ->client_code }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="description">{{ $clientDetails -> description }}</textarea>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Price</label>
                                    <div class="controls">
                                        <input type="text" name="price" id="price" value="{{ $clientDetails -> price }}">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image">
                                        <input type="hidden" name="current_image" value="{{ $clientDetails->image }}">
                                        @if(!empty($clientDetails->image))
                                        <img style="width:50px;" src="{{ asset('/images/backend_images/clients/small/'.$clientDetails->image) }}"> | <a href="{{ url('/admin/delete-client-image/'.$clientDetails->id ) }}">Delete</a>
                                        @endif
                                    </div>
                                </div>

                                 <div class="control-group">
                                    <label class="control-label">Enable</label>
                                    <div class="controls">
                                        <input type="checkbox" name="status" id="status" @if($clientDetails->status=="1") checked @endif value == "1">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit client" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()clients

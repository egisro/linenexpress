@extends('layouts.adminLayout.admin_design')
@section('content')

  <div id="content">
    <div id="content-header">
       <div id="breadcrumb"> <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/admin/add-category/">Add Category</a> <a href="#" class="current">View Category</a> </div>
      <h1>Categories</h1>
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
              <h5>View Categories</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Category URL</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr class="gradeX">
                  <td class="category_id">{{ $category -> id }}</td>
                  <td class="category_name">{{ $category -> name }}</td>
                  <td class="category_url">{{ $category -> url }}</td>
                  <td class="center">
                    @if($category -> name != 'Without category')
                    <a href="{{ url('/admin/edit-category/'.$category -> id) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a  href="#deleteModal" data-toggle="modal" data-id="{{ $category -> id }}" class="btn btn-danger btn-mini delete">Delete</a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>


            <div id="deleteModal" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Do you really want to delete category {{ $category -> name }}?</h3>
              </div>
              <div class="modal-body">
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>Category URL</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr class="gradeX">
                        <td id='category_id'></td>
                        <td id='category_name'></td>
                        <td id='category_url'></td>
                        <td>
                          <form class="" action="{{ url('/admin/delete-category', '') }}" id="form_category_id" method="post">
                            <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-mini">Delete</button>
                          </form>
                        </td>
                        </tr>
                    </tbody>
                  </table>
              </div>
              All products in category <b id="cat"></b> will be remark as "without category"!
            </div>
            </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
  <script type="text/javascript">
  /////////////////////category delete modalinis langas//////////////////
           $('.delete').on('click', function(){
           $('#category_id').html($(this).data('id'));
           $('#category_name').html($(this).closest('tr').find('.category_name').text());
           $('#cat').html($(this).closest('tr').find('.category_name').text());
           $('#category_url').html($(this).closest('tr').find('.category_url').text());
           $('#form_category_id').attr("action", $('#form_category_id').attr("action") + "/" + $(this).data('id'));
           });
  //////////////////////pabaiga modalinio lango///////////////////
  </script>

@endsection

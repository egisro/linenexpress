@extends('layouts.adminLayout.admin_design')
@section('content')

  <div id="content">
    <div id="content-header">
       <div id="breadcrumb"> <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/admin/add-membership/">Add Membership</a> <a href="#" class="current">View Memberships</a> </div>
      <h1>Memberships</h1>
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
              <h5>View memberships</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                <tr>
                  <th>Membership ID</th>
                  <th>Membership Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($memberships as $membership)
                <tr class="gradeX">
                  <td>{{ $membership -> id }}</td>
                  <td>{{ $membership -> name }}</td>
                  <td class="center">
                    <a href="#myModal{{ $membership -> id }}" data-toggle="modal"  class="btn btn-info btn-mini">View</a>
                    <a href="{{ url('/admin/add-membership/') }}" class="btn btn-success btn-mini">Add</a>
                    <a href="{{ url('/admin/edit-membership/'.$membership -> id) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a id="delmembership" href="{{ url('/admin/delete-membership/'.$membership -> id) }}" class="btn btn-danger btn-mini">Delete</a>
                  </td>
                </tr>


                  <div id="myModal{{ $membership -> id }}" class="modal hide">
                    <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>Full Details for: {{ $membership -> name }}</h3>
                    </div>
                    <div class="modal-body">
                      <p>Name: {{ $membership -> name }}</p>
                      <p>ID: {{ $membership -> id }}</p>
                      <p>Code: {{ $membership -> address }}</p>
                      <p>Category: {{ $membership -> membership_id }}</p>
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

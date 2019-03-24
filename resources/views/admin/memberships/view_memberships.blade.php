@extends('layouts.adminLayout.admin_design')
@section('content')

  <div id="content">
    <div id="content-header">
        <div id="breadcrumb">
          <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
          <a href="/admin/memberships/create">Add Membership</a>
          <a href="/admin/memberships" class="current">View Memberships</a>
        </div>
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
                    @if($membership -> id != 1)
                    <form class="" action="{{ url('/admin/memberships', $membership -> id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="{{ url("/admin/memberships/{$membership->id}/edit/") }}" class="btn btn-primary btn-mini">Edit</a>
                      <button class="btn btn-danger btn-mini">Delete</button>
                    </form>
                    @else
                      <a href="{{ url("/admin/memberships/{$membership->id}/edit/") }}" class="btn btn-primary btn-mini">Edit</a>
                    @endif
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

@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
              <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
              <a href="/admin/clients/create" class="current">Add Client</a>
              <a href="/admin/clients">View Clients</a>
            </div>
            <h1>Clients</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Client</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{ url('/admin/clients') }}" name="add_client" id="add_client">
                              @csrf
                                <div class="control-group">
                                    <label class="control-label">Client Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Client Address</label>
                                    <div class="controls">
                                        <input type="text" name="address" id="address">
                                    </div>
                                </div>
                                <div class="control-group">
                                   <label class="control-label">Select Membership</label>
                                   <div class="controls">
                                     <!-- <div class="select2-container" id="s2id_autogen1"> -->
                                     <select name="membership_id" id="membership_id" style="width: 220px;" required>
                                       @foreach($memberships as $membership)
                                         <option value='{{ $membership->id }}'>{{ $membership->name }}</option>
                                       @endforeach
                                     </select>
                                     <!-- </div> -->
                                   </div>
                                 </div>
                                <div class="form-actions">
                                    <input type="submit" value="Add Client" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()

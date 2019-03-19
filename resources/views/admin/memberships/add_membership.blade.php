@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/admin/view-memberships">View Memberships</a> <a href="#" class="current">Add Membership</a> </div>
            <h1>Memberships</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Membership</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{ url('/admin/add-membership') }}" name="add_membership" id="add_membership"> {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Membership Name</label>
                                    <div class="controls">
                                        <input type="text" name="membership_name" id="membership_name" required>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Add Membership" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()

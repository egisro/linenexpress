@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
              <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
              <a href="/admin/memberships/create">Add Membership</a>
              <a href="/admin/memberships">View Memberships</a>
              <a href="#" class="current">Edit Membership</a>
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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Membership</h5>
                        </div>
                        <div class="widget-content nopadding">
                          <form class="form-horizontal" method="post" action="{{ url('/admin/memberships', $membership_cur -> id ) }}">
                            @csrf
                            @method('PUT')
                            <table class="table table-bordered data-table">
                              <thead>
                              <tr>
                                <th>
                                  <!-- <div> -->
                                      <label class="control-label">Membership Name</label>
                                      <div class="controls">
                                          <input type="text" name="membership_name" id="membership_{{ $membership_cur->id }}" value="{{ $membership_cur -> name }}" required>
                                      </div>
                                  <!-- </div> -->
                                </th>
                                <th>Product Category</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                @foreach($products[0] -> membership as $membership)
                                <th>{{ $membership['name'] }}</th>
                                @endforeach
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($products as $product)
                                <tr class="gradeX">
                                  <td>
                                        <label class="control-label">{{ $product -> product_name }} Price</label>
                                        <div class="controls">
                                            <input type="hidden" name="products[{{$loop->index}}][id]" value="{{ $membership_cur->price[($product->id)-1]['id'] }}" >
                                            <input type="text" name="products[{{$loop->index}}][price]" value="{{ $membership_cur->price[($product->id)-1]['price'] }}" required>
                                        </div>
                                  </td>
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
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-actions">
                                <input type="submit" value="Update Membership" class="btn btn-success">
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

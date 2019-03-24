@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
              <a href="/admin/dashboard/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
              <a href="/admin/memberships/create" class="current">Add Membership</a>
              <a href="/admin/memberships">View Memberships</a>
            </div>
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
                            <form class="form-horizontal" method="post" action="{{ url('/admin/memberships') }}" name="add_membership" id="add_membership">
                              @csrf
                              <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                  <th>
                                    <!-- <div> -->
                                        <label class="control-label">New Membership Name</label>
                                        <div class="controls">
                                            <input type="text" name="membership_name" required>
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
                                              <input type="hidden" name="id[]" value="{{ $product -> id }}">
                                              <input type="text" name="price[]" id="{{ $product -> id }}"  value="{{ $product->membership[0]->price[$loop->index]['price'] }}" required>
                                          </div>
                                    </td>
                                    <td>{{ $product -> category -> name }}</td>
                                    <td>{{ $product -> product_name }}</td>
                                    <td>{{ $product -> product_code }}</td>
                                    @foreach($product -> membership as $prices_col)
                                    <td>
                                      @foreach($prices_col['price'] as $prices)
                                      {{ $prices['product_id'] === $product -> id ? $prices['price'] : ''}}
                                      @endforeach
                                    </td>
                                    @endforeach
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
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

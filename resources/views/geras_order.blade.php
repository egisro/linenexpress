@extends('layouts.frontLayout.front_design')
@section('content')
			<section class="generic-banner pt-150 pb-100 relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-lg-12">
							<div class="banner-content text-center">
								<h2>New Service Enquiry</h2>
								<p>Please login first before placing an order !</p>
								<!-- Start Table Area -->
								<form method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="/products">	
									<table class="table table-hover">
										<thead align="left">
											<tr class="text-white" style="background-color: #6cbb23 !important">
											<th scope="col">No.</th>
											<th scope="col">Item</th>
											<th scope="col">Code</th>
											<th scope="col">Price</th>
											<th scope="col">Quantity</th>
											<th scope="col">Subtotal</th>
											</tr>
										</thead>
										<tbody align="left">
										@foreach($categories as $cat)
											@if($cat->status == "1")<tr>
												<th scope="row"></th>
												<th>{{$cat->name}}</th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
											</tr>
											@foreach($cat->categories as $index => $product)
												
												<tr class="product">
												<td scope="row"style="width: 20px !important;">{{$index+1}}</td>
												<td class="name {{ $product->id }}" id="{{ $product->id }}">{{$product->product_name}}</td>
												<td>{{$product->product_code}}</td>
												<td class="price">{{$product->price}}</td>
												<td><input class="quantity" type="number" id="tentacles" name="quantity[]" min="0" max="100"></td>
												<td class="subtotal"></td>
												</tr>
											@endforeach
											@endif
											@endforeach
											<tr>
												<td scope="row"style="width: 20px !important;"></td>
												<td></td>
												<td></td>
												<td></td>
												<td><span style="font-weight: bold;">TOTAL:</span></td>
												<td class="total"  style="font-weight: bold;"></td>
											</tr>
										</tbody>
									</table>
									
            					</form>
            					<button type="button" class="genric-btn primary circle arrow d-inline-flex align-items-center mt-20" data-toggle="modal" data-target="#shopCartModal"><span class="mr-10">View Shopping Cart<span class="lnr lnr-arrow-right"></span></button>
            					<!-- Modal -->
								<div class="modal fade bd-example-modal-lg" id="shopCartModal" tabindex="-1" role="dialog" aria-labelledby="shopCartModal" aria-hidden="true">
								  	<div class="modal-dialog modal-lg" role="document">
								    	<div class="modal-content">
								      		<div class="modal-header">
								        	<h5 class="modal-title" id="shopCartModal"><span style="font-weight: bold;">Shopping Cart</span></h5>
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								      		</div>
								    		<div class="modal-body">
												<table class="table table-hover">
													<thead align="left">
														<tr class="text-white" style="background-color: #6cbb23 !important">
														<th scope="col">No.</th>
														<th scope="col">Item</th>
														<th scope="col">Code</th>
														<th scope="col">Price</th>
														<th scope="col">Quantity</th>
														<th scope="col">Subtotal</th>
														</tr>
													</thead>
													<tbody align="left" class="tbody-modal">
														<tr class="cart">
															<td>Your Shopping Cart Is Empty! <i class='far fa-frown-open' style='font-size:36px;color:#6cbb23'></i></td>
														</tr>
													</tbody>
												</table>
								    		</div>
								    	<div class="modal-footer">
								    	<button type="button" class="genric-btn secondary-border circle arrow d-inline-flex align-items-center mt-20" data-dismiss="modal">Close</button>
								   		<button type="button" class="genric-btn primary circle arrow d-inline-flex align-items-center mt-20">Buy<span class="lnr lnr-arrow-right"></span></button>
								    </div>
								    </div>
								  	</div>
								</div>
								<!-- End Modal -->
							</div>
						</div>
					</div>
				</div>
			</section>
@endsection




<!-- @foreach($productsAll as $index => $product)
	<tr>
	<th scope="row"style="width: 20px !important;">{{$index+1}}</th>
	<td>{{$product->product_name}}</td>
	<td>{{$product->product_code}}</td>
	<td>{{$product->price}}</td>
	</tr>
@endforeach -->
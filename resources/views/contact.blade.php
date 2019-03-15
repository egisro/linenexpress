@extends('layouts.frontLayout.front_design')
@section('content')
<!-- Start Banner Area -->
<section class="generic-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row height align-items-center justify-content-center">
						<div class="col-lg-12">
							<div class="banner-content text-center">
							<!-- 	@if(Session::has('success'))
                                    toastr.success(" {{ Session::get('success') }} ")
                                @endif
                    
								@if(Session::has('flash_message_success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{!! session('flash_message_success') !!}</strong>
                                    </div>
                                @endif -->
								<h2>Contact Us</h2>
								<p>If You have any question, feel free to as here !</p>
							
							</div>
						</div>
					</div>
				</div>
</section>
<!-- End Banner Area -->
@endsection
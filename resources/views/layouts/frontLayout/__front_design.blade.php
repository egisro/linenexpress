<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset('images/frontend_images/fav.png') }}">
	<!-- Author Meta -->
	<meta name="author" content="LinenExpress">
	<!-- Meta Description -->
	<meta name="description" content="Linen Rental Service">
	<!-- Meta Keyword -->
	<meta name="keywords" content="linen rental service">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>LinenExpress Rental Service</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,500" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/linearicons.css') }}">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/owl.carousel.css') }}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/nice-select.css') }}">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/main.css') }}">
		<link rel="stylesheet" href="{{ asset('css/frontend_css/custom.css') }}">
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
			
	</head>
<body>
	<div class="oz-body-wrap">	
	@include('layouts.frontLayout.front_header')

		@yield('content')
		
	@include('layouts.frontLayout.front_contact')
	
	@include('layouts.frontLayout.front_footer')	
	</div>
	<script src="{{ asset('js/frontend_js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="{{ asset('js/frontend_js/vendor/bootstrap.js') }}"></script>
	<script src="{{ asset('js/frontend_js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/jquery.counterup.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/waypoints.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/main.js') }}"></script>
	<script src="{{ asset('js/frontend_js/readmore.js') }}"></script>
	<script src="{{ asset('js/frontend_js/order.js') }}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script>
	  @if(Session::has('message'))
	    var type = "{{ Session::get('alert-type', 'info') }}";
	    switch(type){
	        case 'info':
	            toastr.info("{{ Session::get('message') }}");
	            break;
	        case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
	        case 'error':
	            toastr.error("{{ Session::get('message') }}");
	            break;
	    }
	  @endif
	</script>
</body>
</html>












	<!-- 	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="{{ asset('js/frontend_js/vendor/jquery-3.3.1.min.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		
		<script src="{{ asset('js/frontend_js/bootstrap.js') }}"></script>

		<script src="https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js"></script>


		<script src="{{ asset('js/frontend_js/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ asset('js/frontend_js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('js/frontend_js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('js/frontend_js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('js/frontend_js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('js/frontend_js/waypoints.min.js') }}"></script>s
		<script src="{{ asset('js/frontend_js/playvideo.js') }}"></script>
		<script src="{{ asset('js/frontend_js/main.js') }}"></script>
		<script src="{{ asset('js/frontend_js/readmore.js') }}"></script>
		<script src="{{ asset('js/frontend_js/order.js') }}"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		{!! Toastr::render() !!} -->
		<!-- <script>
		  @if(Session::has('message'))
		    var type = "{{ Session::get('alert-type', 'info') }}";
		    switch(type){
		        case 'info':
		            toastr.info("{{ Session::get('message') }}");
		            break;
		        
		        case 'warning':
		            toastr.warning("{{ Session::get('message') }}");
		            break;

		        case 'success':
		            toastr.success("{{ Session::get('message') }}");
		            break;

		        case 'error':
		            toastr.error("{{ Session::get('message') }}");
		            break;
		    }
		  @endif
		</script> -->


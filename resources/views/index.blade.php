@extends('layouts.frontLayout.front_design')
@section('content')

<!-- Start Banner Area -->
		<section class="banner-area relative">
			<div class="container">
				<div class="row fullscreen align-items-center justify-content-center">
 					<div class="banner-left col-lg-6">
						<img class="d-flex mx-auto img-fluid" src="{{ asset('images/frontend_images/header-img.png') }}" alt="">
					</div>
					<div class="col-lg-6">
						<div class="story-content">
							<h4 class="text-uppercase">Linen Express Rental Service<br>The Future of Clean Professional Business</h4>
							<br>
							<h1>Behind Every <span class="sp-1">Success</span><br>
							There is a <span class="sp-2">Linen</span> <span class="sp-1">Express</span></h1>
							<a href="#" class="genric-btn primary circle arrow">Get Started<span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
						<!-- @if(Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                    	@endif -->
				</div>
			</div>
		</section>
		<!-- End Banner Area -->
		<!-- Start Video Area -->
		<section class="video-area pt-40 pb-40">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="video-content">
					<!-- Button trigger modal -->
					<a href="{{ asset('video/video.mp4') }}" class="play-btn"><img src="{{ asset('images/frontend_images/play-btn.png') }}" alt=""></a>
					<div class="video-desc">
						<h3 class="h2 text-white text-uppercase">Being unique is the preference</h3>
						<h4 class="text-white">Youtube video will appear in popover</h4>
					</div>
				</div>
			</div>
		</section>
		<!-- End Video Area -->
		<!-- Start about Area -->
		<section class="about-area pt-100 pb-100">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="story-content">
							<h2>Brief Information <br>
							About <span class="sp-2" style="font-size:40px !important;">Linen</span> <span>Express</span></h2>
							<p class="mt-30">We are a small family business in Ballinasloe. Supply Linen to Hotels, Bed & Breakfast, Hostels and Nursing Homes in the West of Ireland and Midlands.
                        We deliver clean linen and pick up used linen on a weekly basis.
							</p>
							<p class="mt-30">As partner supplier to some of Ireland’s largest hospitals, our linen and scrubs services operate to the highest standards of hygiene and infection control. We also operate a highly successful direct-to-ward linen system.
							</p>
							<span id="dots"></span>
                        	<span id="more"> 
							<p>Proud to be an environmentally responsible and friendly laundry with full ISO accreditation and certiﬁcation, we encourage our customers to explore our products and services and support them in making new choices. The signiﬁcant new investment in upgraded plant equipment and processes revolutionised our service offering and delivery.
                        	With strategic distribution hubs in the four corners of Ireland, our logistics network is efficient and convinient. We dedicate resources to improving our service and continue to focus on delivering a better experience for our customers. All our teams are committed to constant improvement of our customerss – because this in turn means improvements for their customers!
                        	For many industries, linen products have become a staple. For instance, towel and bed linens are a requirement for hotels. Guests who do not receive linens may assume that the establishment is unqualified to run in the hospitality industry. Linen services for restaurants are also important. The employees may express dissatisfaction without proper kitchen wear or towels. It goes without saying that there is a high demand for linens for many businesses through all kinds of industries. Restaurants generate an advantage when they have fresh linens. Having a quality linen service helps restaurants provide a quality appearance for their customers. Not only does it help appearances, but it improves efficiency and function for many restaurants and fine dining establishments. By investing in high-quality and fresh linens, your restaurant’s ambiance will grow. Your business will look and feel more exquisite to your customers. Tablecloths and napkins can turn a small shack into a neat and pristine dining experience.

							In addition to the restaurant having a polished appearance, by equipping your restaurant’s waiters and hosts with quality uniforms, they can portray and provide a higher form of professionalism and quality service for your business. By providing your employees with fresh linen and restaurant apparel, you are not only providing them with a quality appearance, you are also keeping them safe from splashes from grease and sprays. Floor mats in restaurants will also keep employees and guests safe, by making sure that your business has a safe and anti-slip environment.</p>
							<h3>LinenExpress Provides Quality Linen Services for Restaurants, Hospitals and More</h3>
							<p class="mt-30">LinenExpress Linen Services provides high-quality linen services when you need them. We make sure that our products are of the utmost quality, and we make sure to wash them thoroughly. The high-quality material provides a durability through the washes. Contact us today by calling us at (+353) 87 222 8059 for our servicing.</p>
							</span>
							<button onclick="readmore()" id="readmoreBtn" class="genric-btn primary-border circle arrow">Read more<span id="addArrow" class="lnr lnr-arrow-right"></span></button>
							<!-- <a href="#" class="genric-btn primary-border circle arrow">View More<span class="lnr lnr-arrow-right"></span></a> -->
						</div>
					</div>
					<div class="col-lg-6">
						<img class="img-fluid d-flex mx-auto" src="{{ asset('images/frontend_images/linen.jpg') }}" alt="">
					</div>
				</div>
			</div>
		</section>
		<!-- End Team Force Area -->
		<!-- Start Feature Area -->
		<section class="feature-area pt-100 pb-100  relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
						<div class="single-feature">
							<div class="icon">
								<span class="lnr lnr-database"></span>
							</div>
							<div class="desc">
								<h2 class="text-uppercase">Simple Way To Save <br> A Bunch Of Money</h2>
								<p>
								We are focused to deliver what we promise in quality and service. Given that we develop a plan that is unique to each customer, we customize a pricing schedule that is both fair and competitive.
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
						<div class="single-feature">
							<div class="icon">
								<span class="lnr lnr-smile"></span>
							</div>
							<div class="desc">
								<h2 class="text-uppercase">We feel pride in <br>serving You</h2>
								<p>
								Our core strength is providing consistent quality services that our customers have come to trust. We make maximum efforts to know our customers and their requirements so that we can serve them as per their expectations.
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
						<div class="single-feature">
							<div class="icon">
								<span class="lnr lnr-clock"></span>
							</div>
							<div class="desc">
								<h2 class="text-uppercase">Our team's
								<br>Professionalism</h2>
								<p>
								We are the leading provider of linen rental service and textiles in the West of Ireland and Midlands. Because our quality standards are high, our drivers are among the best in the business with consistent punctuality. 
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
						<div class="single-feature">
							<div class="icon">
								<span class="lnr lnr-leaf"></span>
							</div>
							<div class="desc">
								<h2 class="text-uppercase">Environment <br>Friendly</h2>
								<p>
								With a new state of the art system, our washers use less water and Eco-Friendly Products to produce a quality services while staying Green for our communities and country!
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
						<div class="single-feature">
							<div class="icon">
								<span class="lnr lnr-apartment"></span>
							</div>
							<div class="desc">
								<h2 class="text-uppercase">bussiness Range<br>And Services</h2>
								<p>
								Our company will be responsible for supplying your hotel, hostel, hospital, restaurant, Spa & Leasure, Nursing Home or any activity with a fundamental part of your everyday business – if you don’t have clean linen, you cannot do successfull bussiness.
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
						<div class="single-feature">
							<div class="icon">
								<span class="lnr lnr-thumbs-up"></span>
							</div>
							<div class="desc">
								<h2 class="text-uppercase">3 Reasons To Rent<br> Our Services</h2>
								<p>
								Reliability - responding to our customers' needs promptly and following through on promises in a timely manner is important for us.<br>
								Cost - LinenExpress committed to ensuring that our service costs are minimized.<br>
								Carefulness - assiduity, adaptiveness, communication and responsiveness are at the core of LinenExpress’ commitment to quality and client satisfaction.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Start Feature Area -->
		<!-- Start faq Area -->
		<section class="faq-area pt-100 pb-100">
			<div class="container">
				<div class="row">
					<div class="counter-left col-lg-3 col-md-3">
						<div class="single-facts">
							<h2 class="counter">2152</h2>
							<p>Orders Completed</p>
						</div>
						<div class="single-facts">
							<h2 class="counter">27</h2>
							<p>New Orders Submitted</p>
						</div>
						<div class="single-facts">
							<h2 class="counter">933</h2>
							<p>Customers Serviced</p>
						</div>
						<div class="single-facts">
							<h2 class="counter">25679</h2>
							<p>Total Mileage</p>
						</div>
					</div>
					<div class="faq-content col-lg-9 col-md-9">
						<div class="single-faq">
							<h2 class="text-uppercase">
								Quality Service at Simple Low Pricing. Imagine That.
							</h2>
							<p>
								Few would argue that, despite the advertisments of other companies, we still facusing to reduce service prices when it comes to our customer satuisfaction.
							</p>
						</div>
						<div class="single-faq">
							<h2 class="text-uppercase">
								GUARANTEED DELIVERY DAYS
							</h2>
							<p>
							Some would argue that the days and time doesn't matter but we are very proud of sticking to our shedule.
							</p>
						</div>
						<div class="single-faq">
							<h2 class="text-uppercase">
							FRIENDLY AND HELPFULL DELIVERY DRIVERS
							</h2>
							<p>
							Some would argue that it doesn't matter who delivers your linen but actually they are the face of the company.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Start faq Area -->
		

@endsection

<!-- https://www.youtube.com/watch?v=jwSBE1EIevA -->
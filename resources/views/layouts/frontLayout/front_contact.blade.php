<!-- Start Conatct- Area -->
<section class="contact-area pt-100 pb-100 relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="single-contact col-lg-6 col-md-8">
				<h2 class="text-white">Send Us <span>Message</span></h2>
				<p class="text-white">
				Please drop us a line and let us know your requirements and we will be in touch with you shortly.
				</p>
			</div>
		</div>
		<form action="{{ url('/contact') }}" method="post" class="contact-form">
			{{ csrf_field() }}
			<div class="row justify-content-center">
				<div class="col-lg-4">
				<input name="fname" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mt-20" required="" type="text">
				</div>
				<div class="col-lg-4">
					<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mt-20" required="" type="email">
				</div>
				<div class="col-lg-4">
					<input name="phone" placeholder="Enter your phone number" pattern="[+]+[0-9]{11,}$" onfocus="this.placeholder = 'e.g. +353xxx'" onblur="this.placeholder = 'Enter your phone number'" class="common-input mt-20" required="" type="text">
				</div>
				<div class="col-lg-12">
				<input name="subject" placeholder="Choose a subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Choose a subject'" class="common-input mt-20" required="" type="text">
				</div>
				<div class="col-lg-12">
								<textarea class="common-textarea mt-20" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
			</div>
			<div class="col-lg-10 d-flex justify-content-end">
			<button type="submit" class="primary-btn white-bg d-inline-flex align-items-center mt-20"><span class="mr-10">Send Message</span><span class="lnr lnr-arrow-right"></span></button> <br>
			</div>
			<div class="alert-msg"></div>
			</div>
		</form>
	</div>
</section>
<!-- End Conatct- Area -->
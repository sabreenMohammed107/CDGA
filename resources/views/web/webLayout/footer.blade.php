	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-50 col-lg-8">
				<div class="title text-center">
					<h4 class="text-color" style="font-family:pruistin;font-size:30px">Get in Touch</h4>
					<h1 class="mb-10" style="font-size:30px">We Would Love To Hear From You!</h1>
					<p>We will never stop improving</p>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-lg-4 d-flex flex-column address-wrap">
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-home" style="color:#FFA500"></span>
					</div>
					<div class="contact-details">
						<h5>{{ $branch->venue->venue_en_name }}, {{ $branch->country->country_en_name }}</h5>
						<p>
						{{ $branch->address }}
						</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-phone-handset" style="color:#FFA500"></span>
					</div>
					<div class="contact-details">
						<h5>{{ $branch->office_phone}}</h5>
						<p>Mon to Fri 09:00 AM to 06:00 PM</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-envelope" style="color:#FFA500"></span>
					</div>
					<div class="contact-details">
						<h5> {{ $branch->email}}</h5>
						<p><a href="{{ route('contactus') }}" style="color:#FFA500">Contact Us </a> anytime!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<form class="form-area contact-form text-right"  action="{{url('/sendMessage')}}" method="POST">
				@csrf
					<div class="row">
						<div class="col-lg-6 form-group">
							<input name="sender_name" value="{{ old('sender_name') }}" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

							<input name="sender_email"  value="{{ old('sender_email') }}"placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
							<input name="sender_subject" value="{{ old('sender_subject') }}" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<textarea class="common-textarea form-control" value="{{ old('sender_message') }}" name="sender_message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required="">{{Request::old('sender_message')}}</textarea>
						</div>
						
						<div class="col-lg-12">
						
							<div class="alert-msg" style="text-align: left;"></div>
							<button type="submit" class="genric-btn primary" style="float: right;">Send Message</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</section>
	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>ِAbout</h4>
						<ul>
							<li><a href="{{url('/aboutUs')}}" >About Us</a></li>
							<li><a href="{{ route('accreditations') }}">Accreditations</a></li>
							<li><a href="{{ route('tesimonial') }}">Testimonials</a></li>
							<li><a href="{{url('/consunltancy')}}">Consultancy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>JOIN CDGA</h4>
						<ul>
							<li><a href="{{ route('joinus') }}">Jobs</a></li>
							<li><a href="{{ route('speakers') }}">Speakers</a></li>
							<li><a href="{{url('/conditions')}}">Terms of Service</a></li>
							<li><a href="{{ route('contactus') }}">Contact US</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Majors</h4>
						<ul>
							<li><?php 
						$catId=1;
						?>
					<a href="{{ url('category/'.$catId) }}" >Technical</a></li>
							<li><?php 
						$catId=2;
						?>
						<a href="{{ url('category/'.$catId) }}">Soft skills</a></li>
							<li>
							<?php 
						$catId=3;
						?>
						<a href="{{ url('category/'.$catId) }}">Certified</a></li>
							
						<li>
							<?php 
						$catId=4;
						$sub=4;
						?>
					
				{{--<!-- <a href='{{url ("/courses/$catId/$catId/date") }}' style="font-size:16px">البرامج العربية</a></li> -->--}}	
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Resources</h4>
						<ul>
						<li><a href="{{ route('publicTraining') }}">Public Training</a></li>
									<li><a href="{{ route('inHouse') }}">In-House Training</a></li>
							<?php 
						$current=now()->year;
						$next=$current+1;
						?>
							<li><a href="{{ url('calender/'.$current) }}">Calender {{$current}}</a></li>
							<li><a href="{{ url('calender/'.$next) }}">Calender {{$current+1}}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Newsletter</h4>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">
							<form  action="{{url('/sendNewsLetter')}}" method="POST">
							@csrf
								<div class="input-group">
									<input type="text" class="form-control" name="email" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<span class="lnr lnr-arrow-right"></span>
										</button>
									</div>
									<div class="info"></div>
								</div>
							</form>

						</div>
						<div class="footer-bottom">
							<div class="footer-social">
							<a href="https://www.facebook.com/Best-Technology-Solutions-101762614785390/" target="_blank" ><i class="fab fa-facebook-f"></i></a>
								<a href="https://twitter.com/bts_consultants" target="_blank"><i class="fab fa-twitter"></i></a>
								<a href="https://www.linkedin.com/company/best-technology-solutions-bts" target="_blank"><i class="fab fa-linkedin-in"></i></a>
								<a href="https://wa.me/?text={{ urlencode('http://test.btsconsultant.com/public/index') }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
								<a href="https://www.instagram.com/best_technology_solutions/" target="_blank" ><i class="fab fa-instagram"></i></a>
							</div>
							
						</div>

						
</div>

					</div>
				<a href="https://horizontechs.com/ar/" target="blank">	<img style="display: block; float:left; opacity:0.8 ;margin-top:-25px " src="{{ asset('webasset/images/horiz.png')}}"> </a>

				</div>
			</div>
			<!-- <div class="footer-bottom">
						<div class="row" style=" border-top: 1px solid black;">

							<img style="display: block; margin: auto;margin-top: 10px;" src="{{ asset('webasset/images/horizon.png')}}">
						</div>
		</div> -->
	</footer>
	<!-- End footer Area -->

	<!--back to top-->
	<div id="container">
		<!--  backToTop Button  -->
		<!-- <div id="backToTop"></div> -->
		<div id="backToTop">
		<a class="backToTop" href="javascript:void(null);" style="display: none;"
		><i class="fa fa-angle-up"></i>
		<iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe>
		</a></div>

	</div>
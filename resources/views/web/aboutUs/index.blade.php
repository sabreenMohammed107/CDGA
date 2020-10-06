@extends('web.webLayout.web')
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">About Us</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start about Area -->
	<section class="info-area"style="padding:50px 0px">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-6 no-padding info-area-left">
					<img class="img-fluid" src="{{ asset('webasset/images/about.jpg')}}" alt=""style="border-radius:.3rem">
				</div>
				<div class="col-lg-6 info-area-right">
					<h1>
					Who we are 
					</h1>
					<p>
					We are an international engineering & management training and consulting firm, providing training programs and consulting services to hundreds of organizations in UK and abroad. We have built our reputation on providing innovative solutions and custom-designed training programs to address problems and challenges facing our clients in rapidly changing times. Since 2000, we have trained more than 25,000 people who have applied effective time-saving procedures and techniques to increase productivity, ultimately resulting in an improved bottom line for our clients.					</p>
					<br>
					<p>
					CDGA offers you high quality, professional services that will increase your productivity and decrease your expenses.
<br>
					We strive to:
					<ul>
					<li>•	Have a direct effect upon your profitability</li>
					<li>•	Help you in your pursuit of excellence</li>
					<li>•	Assist you in implementing and achieving your strategic plans</li>
					<li>•	Enhance your image within your industry</li>
</ul>


</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End about Area -->
<!--Start Our Vision-->
<div class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30">Our Vision</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
						Our vision is to consistently deliver excellent training courses and seminars which set the highest standards in our industry.						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Our vision-->
	<!--Start Our Mission-->
	<div class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30">Our Mission</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
						<ul>
					<li>	•	Promote and support employers and employees in their continuous professional and organisational development whilst empowering them through the provision of innovative, high-quality workplace learning programs, resources and services.</li>
					<li>•	Earn the trust and confidence of our clients by providing the most reliable training and consulting products and services in the region.<li>
					<li>•	Ensure that our services are aligned with our client's needs and to strive for excellence in every way.</li>
					<li>•	Inspire and encourage our clients to be enthusiastic about what they do by providing them opportunities associated with those newly acquired skills.</li>
						</ul>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Our Mission-->

	<!--Start Our Service Quality-->
	<div class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30">Our Service Quality</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
						CDGA is a client-centric service provider where our service quality focuses on ultimate customer satisfaction which serves as the cornerstone of the business. We see our success in the success of our clients in reaching their goals - that's the value we place.
 
 Our customer service strategy is evaluated constantly throughout the year to measure our performance to meet the customers' expectations and their needs along with the associated performances of venues and trainers. We focus on building excellent relationships with our clients to enhance their satisfaction with us which is our pride and the tool to benchmark and measure our success.
					 </div>
				</div>
			</div>
		</div>
	</div>
	<!--End Our Service Quality-->
	<!--Start OOur Values-->
<div class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30">Our Values</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
						<ul>
						<li>•	Mastery: Providing knowledge and skills to enhance confidence and mastery</li>
						<li>•	Excellence: Set the quality standards by which individual and team performance are measured and rewarded</li>
						<li>•	Innovation: Implementing new ideas, creating dynamic products while consistently improving existing services</li>
						<li>•	Reliability: Measuring performance to improve quality standards</li>
						<li>•	Client-Centricity: Ensuring the customers' satisfaction first</li>
						<li>•	Integrity: Committed to honesty, respect, and open communication whilst adhering to ethical standards</li>
						<li>•	Commitment: Delivering high-quality service and vigilant regard for our clients</li>
</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Our Values-->

	<!-- Start Clients Area -->
<div class="row d-flex justify-content-center" style="margin:0px !important">
	<div class="menu-content pb-15">
		<div class="title text-center">
			<h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Our Clients</h4>
			<h1 class="mb-10" style="font-size:30px">Our Clients</h1>
			<p>We will never stop improving

</p>
		</div>
	</div>
</div>
<section class="popular-course-area section-gap" style="background-color:#fff">
	<div class="">
		<div class="row" style="margin:0px !important">
			<div class="active-popular-carusel">
				@foreach($clients as $client)
				<div class="single-popular-carusel">
					<div class="thumb-wrap relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" 
							src="{{ asset('uploads/clients')}}/{{ $client->client_logo_url }}" alt="{{ $client->client_name }}"
							style="max-height:100px;max-width:200px">
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</div>
</section>
<!-- End Clients Area -->

@endsection
	@section('scripts')
    @endsection
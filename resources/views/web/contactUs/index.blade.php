@extends('web.webLayout.web')
@section('style')
<link href="{{ asset('webasset/css/courses.css')}}" rel="stylesheet" />
@endsection
@section('content')

<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
                <h1 class="text-white"> Contact Us</h1>
                <p class="text-color link-nav"><a href="{{ url('/') }}">Home </a> 
                <span class="lnr lnr-arrow-right"></span> 
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
	<!-- End banner Area -->
	
	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
       
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-50 col-lg-8">
					<div class="title text-center">
						<h4 class="text-color" style="font-family:pruistin;font-size:30px">Contact Us</h4>
						<h1 class="mb-10" style="font-size:30px">CDGA Offices and Branches</h1>
						<p>Learning With Us Is The Ticket To Success</p>
					</div>
				</div>
			</div>
            @foreach($contactBranchs as $branchxx)
			<div class="row"style="background-color:#ffffff;padding-top:20px;padding-bottom:10px;border-radius:1rem">
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home" style="color:#FFA500"></span>
						</div>
						<div class="contact-details">
							<h5>{{ $branchxx->branch_name}}</h5>
							<p>
							{{ $branchxx->address }}
							
							</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset" style="color:#FFA500"></span>
						</div>
						<div class="contact-details">
                        
							<h5>Office: {{ $branchxx->office_phone}}</h5>
							<h5>Mobile: {{ $branchxx->mobile}}</h5>
						<h5>whatsapp: +353 877 738134</h5>
											</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope" style="color:#FFA500"></span>
						</div>
						<div class="contact-details">
							<h5>{{ $branchxx->email}}</h5>
							<p>Send us your query anytime!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
						<div class="row">
							<div class="col-lg-12 form-group">
								<style>
									.mapouter {
										position: relative;
										text-align: right;
									}

									.gmap_canvas {
										overflow: hidden;
										background: none !important;
										height: 200px;
									}
								</style>
								<div id="map" class="bg-white">
									<div class="mapouter">
										<div class="gmap_canvas" style="width:100%">
										<iframe style="width:100%;height:100%" id="gmap_canvas" src="{{$branchxx->map_location}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
									</iframe><a href="https://www.crocothemes.net"></a></div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
            @endforeach
			<hr />
		
	
		</div>
	</section>
	<!-- End contact-page Area -->
    @endsection


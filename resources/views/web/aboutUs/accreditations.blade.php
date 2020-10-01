
@extends('web.webLayout.web')
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">Accreditations</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start Accreditations Area -->
	<section class="sample-text-area" style="padding-top:50px">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<h3 class="text-heading"style="font-size:22px"><br />We have been assessed against internationally recognized standards</h3>
					<p class="sample-text text-justify">
						Accreditation means that we have been assessed against internationally recognized standards and operate to the highest levels of quality and service – providing further assurance to you that the certificates we issue are both credible and impartial.
					</p>
					<p class="sample-text text-justify">
						This accreditation reduces the risk to you and your customers and gives you complete confidence that we have been independently evaluated for our competence and performance capability.
					</p>
				</div>
				<div class="col-lg-3">
					<img src="{{ asset('webasset/images/accreditation.jpg')}}" style="border-radius:1rem" />
				</div>
			</div>
		</div>
	</section>
	<!-- End Accreditations Area -->

	<!--Start accredited by-->
	<div class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30">Who we’re accredited by</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
							“We are among the most respected and reputable management systems certification bodies in the world and are accredited by around 20 local and international bodies including:”
						
							<ul style="list-style:square;padding:20px 20px">
								<li>American National Standards Institute – American Society for Quality National Accreditation Board LLC (ANAB)</li>
								<li>China National Accreditation Service for Conformity Assessment (CNAS)</li>
								<li>Japan Accreditation Board (JAB)</li>
								<li>Raad voor Accreditatie (RvA) in the Netherlands</li>
								<li>United Kingdom Accreditation Service (UKAS)</li>
							</ul>
							“To enable us to provide a cost-effective service, we regularly review our accreditation schemes. We have decided to provide accreditation worldwide with ANSI-ASQ National Accreditation Board (ANAB), supported by local well-known and credible accreditation as appropriate to our customer requirements and the local market needs.”
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End accredited by-->

@endsection
	@section('scripts')
    @endsection
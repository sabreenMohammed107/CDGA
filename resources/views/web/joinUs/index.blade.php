@extends('web.webLayout.web')
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">Join Our Team</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->
	
	<!-- Start form Area -->
	<section class="event-details-area section-gap">
		<div class="container">

			<div class="row">
				<p>We are always interested to meet potential team members to join our fast-growing, dynamic team of professionals in order to continue providing a personalized, efficient, professional and confidential service to our increasing portfolio of clients. Our people are undoubtedly our greatest asset and we pride ourselves on creating an environment where our team look forward to come to work every day. While experience is not a requirement (for certain positions), preference will be given to those applicants who are interested in a challenge, who are results and target-oriented besides wanting to form part of our dynamic team and fast-growing business.
Read on below to find out more about what our positions entail and what skills are required.

</p>
				<div class="col-lg-12 event-details-left left-contents">
					<h4 style="border-bottom:solid #FFA500;padding-bottom:10px;margin:30px 0px 0px 0px"><i class="fas fa-bullhorn"></i> Currently Available Jobs</h4>
				</div>
			</div>
            @if(Session::has('flash_success'))
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        <strong><i class="fa fa-check-circle"></i> {!! session('flash_success') !!}</strong>
                    </div>
                </div>
            @endif
            @if(Session::has('flash_danger'))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <strong><i class="fa fa-info-circle"></i> {!! session('flash_danger') !!}</strong>
                    </div>
                </div>
            @endif
		</div>
	</section>

	<section class="">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 event-details-left left-contents">
					<div class="accordion-left">
						<!-- accordion 2 start-->
						<dl class="accordion">
						
						
						@foreach($careers as $career)
							<dt>
								<a href="">{{$career->job_name}}</a>
							</dt>
							<dd>
								{!!$career->job_requirements !!}
							</dd>
                            @endforeach
						</dl>
						<!-- accordion 2 end-->
					</div>
				</div>
				<div class="col-lg-5 col-md-8">
					<div class="whole-wrap">
						<div class="section-top-border">
							<form action="{{route('joinusForm')}}" method="POST" enctype="multipart/form-data">
                            @csrf
								<h5 class="mb-30">Apply For Your Desired Job Here</h5>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
									<div class="form-select" id="default-select">
										<select name="career_id" require >
											<option value="">Job Title</option>
                                            @foreach ($careers as $career)
                                            <option value='{{$career->id}}' >
                                         {{ $career->job_name }}</option>
                                           @endforeach
										</select>
									</div>
								</div>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
									<div class="form-select" id="default-select2">
										<select name="carrer_level_id" >
											<option value="1">Career Level</option>
                                            @foreach ($careerLevels as $level)
                                            <option value='{{$level->id}}' >
                                         {{ $level->level }}</option>
                                           @endforeach
										</select>
									</div>
								</div>
								<div class="input-group-icon mt-10">
									<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
									<input type="number" name="expected_salary" placeholder="Expected Salary" onfocus="this.placeholder ='Expected Salary'" onblur="this.placeholder = 'Expected Salary'" required class="single-input">
								</div>
								<div class="mt-10">
									<input type="text" name="name" placeholder="Name" onfocus="this.placeholder = 'Name'" onblur="this.placeholder = 'Name'" required class="single-input-primary">
								</div>
								<div class="mt-10">
									<input type="email" name="email" placeholder="Email" onfocus="this.placeholder = 'Email'" onblur="this.placeholder = 'Email'" required class="single-input-primary">
								</div>

								<div class="mt-10">
									<input type="tel" name="mobile" placeholder="Mobile" onfocus="this.placeholder = 'Mobile'" onblur="this.placeholder = 'Mobile'" required class="single-input-primary">
								</div>
								<hr />
								<div class="switch-wrap d-flex justify-content-between">
									<div class="row">
										<h6 class="col-lg-12" style="margin-bottom:10px">Upload CV with a clear photo</h6>
										<div class="col-lg-12" style="margin-bottom:10px">
											<input type="file" name="cv_path" id="cv_path">
											<label for="cv"></label>
										</div>
										<h6 class="col-lg-12" style="margin-bottom:10px">Upload other supporting documents</h6>
										<div class="col-lg-12" style="margin-bottom:10px">
											<input type="file" name="doc_path" id="doc_path">
											<label for="doc"></label>
										</div>
									</div>
								</div>
								<div class="button-group-area mt-40">
									<button type="submit" class="genric-btn primary e-large" style="font-size:15px">Apply Now <i class="fas fa-arrow-right"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End form Area -->

	<!-- Start join our team Area -->
	<section class="cta-one-area relative section-gap" style="padding:120px 0px;background: url(({{ asset('webasset/images/join.jpg')}}) center bottom !important;">
		<div class="container">
			<div class="overlay overlay-bg"></div>
			<div class="row justify-content-center">
				<div class="wrap">
					<h1 class="text-white">Thank You For Your Interest In Joining BTS Teamwork</h1>
					<p style="visibility:hidden">
						There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station whether that is on the deck.
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End join our team Area -->
@endsection
	@section('scripts')
@extends('web.webLayout.web')
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">Download Brochure</h1>
				<p class="text-color link-nav"><a href="{{ url('/') }}">Home </a>
					<span class="lnr lnr-arrow-right"></span>
					<?php
					$catId = $course->subCategory->courseCategory->id;
					$subId = $course->subCategory->id;

					?>
					<a href="{{ url('category/'.$catId) }}"> {{ $course->subCategory->courseCategory->category_en_name}} </a>

					<span class="lnr lnr-arrow-right"></span> <a href='{{url ("/courses/$catId/$subId/date") }}'> {{ $course->subCategory->subcategory_en_name}}</a>
					<span class="lnr lnr-arrow-right"></span> <a href="{{ url('courseDetails/'.$course->id) }}"> {{ $course->course_en_name}}</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<section class="event-details-area section-gap">
	<div class="container">
		<div class="row">
			<h4 style="padding-bottom:30px ;padding: 0 350px 0 0">{{ $course->course_en_name}}</h4>
			<div class="col-lg-8 event-details-left left-contents" style="background-color:#f9f9ff">
				<h4 style="border-bottom:solid #FFA500;padding-bottom:10px;margin:30px 0px 0px 0px">Download and further your knowledge with us.</h4>
				<style>
					.comment-form form input,
					textarea {
						border: 1px solid #ced4da !important;
					}
				</style>
				<div class="comment-form" style="margin-top:0px">
					<form id="downloadForm">
						@csrf
						<div class="form-group form-inline">
							<input type="hidden" name="courseBrochure" value="{{ asset('uploads/courseBrochure')}}/{{ $course->course_brochure }}" alt="{{ $course->course_en_name }}" />
							<input type="hidden" name="course_id" value="{{$course->id}}" />
							<input type="hidden" name="applicant_type_id" value=1 />
							<input type="hidden" id="fileName" value="{{$course->course_brochure}}" />

							<div class="form-group col-lg-12 col-md-12">
								<label>Your Name : </label>
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<input name="name" type="text" value="{{ old('name') }}" class="form-control" />
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<label>Your Company : </label>
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<input name="company" type="text" value="{{ old('company') }}" class="form-control" />
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<label>Your Country : </label>
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<select name="country_id" class="form-control" style="padding:0 12px;border: 1px solid #CCC;">
									<option value=""></option>
									@foreach ($countries as $country)
									<option value='{{$country->id}}' @if (old('country_id')=="$country->id" ) {{ 'selected' }} @endif>
										{{ $country->country_en_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<label>Your Job Title : </label>
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<input type="text" name="job_title" value="{{ old('job_title') }}" class="form-control" />
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<label>Your Email Address : </label>
							</div>
							<div class="form-group col-lg-12 col-md-12">
								<input type="text" name="email" value="{{ old('email') }}" class="form-control" id="emailAddrees" />
							</div>
						</div>
						<hr />
						<div>
							<h6></h6>
						</div>
						<div class=" form-inline" style="padding-bottom:10px">
							<h5>Terms & Conditions</h5>
						</div>
						<div class="form-check form-inline">
							<input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">I accept the Terms & Conditions*</label>
						</div>
						<div class="form-inline">
							<div class="form-group">
								<label class="form-check-label" for="exampleCheck1"><a href="{{url('/conditions')}}" target="blank" style="color:#4169E1">Terms & Conditions of Registration</a></label>
							</div>
							<span style="color:red;display:block" class="error-message"> </span>
						</div>
						<div id="alertDivDanger" class="alert alert-danger alert-block" style="display:none">

							<strong><span style="color:red;display:block" class="error-message">Please accept conditions </span>
							</strong>
						</div>
						<div id="alertDivMail" class="alert alert-danger alert-block" style="display:none">

							<strong><span style="color:red;display:block" class="error-message">You cannot use free email address!</span>
							</strong>
						</div>
						<div id="alertDivValid" class="alert alert-danger alert-block" style="display:none">

							<strong><span style="color:red;display:block" class="error-message">Please enter a valid Company email address!</span>
							</strong>
						</div>
						<div id="alertDivinfo" class="alert alert-info alert-block" style="display:none">

							<strong><span style="color:black;display:block" class="error-message">Thanks; your request has been submitted successfully ! </span>
							</strong>
						</div>

						<div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<div class="captcha">
									<span>{!! captcha_img() !!}</span>
									<button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"></div>
						</div>
						<a id="downloadButton" class="mt-40 text-uppercase genric-btn primary text-center">Submit</a>
					</form>

				</div>
			</div>
			<div class="col-lg-1 event-details-left left-contents"></div>
			<div class="col-lg-3 event-details-left left-contents" style="background-color:#f9f9ff">
				<h5 style="margin-top:30px;margin-bottom:10px"> {{ $branch->venue->venue_en_name }}</h5>
				<p> {{ $branch->address }} </p>
				<p> {{ $branch->email}} </p>
				<p> {{ $branch->venue->venue_en_name }} ,{{ $branch->country->country_en_name }}</p>
				<p><span style="color:#FFA500">Tel :</span> {{ $branch->mobile}}</p>
				<p><span style="color:#FFA500">Office Phone :</span>{{ $branch->office_phone}}</p>

			</div>
		</div>

	</div>
</section>
@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		$('#downloadButton').click(function() {

			var data = $('#downloadForm').serialize();
			var _token = $('input[name="_token"]').val();
			var courseBrochure = $('input[name="courseBrochure"]').val();
			var fileName = $('#fileName').val();
			var email = $('#emailAddrees').val();
			var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
			var freeRegex = /^[\w-\.]+@([hotmail+\.]|[yahoo+\.]|[gmail+\.])+[\w-]{2,4}$/;
			if (email.match(emailRegex)) {
				if (!email.match(freeRegex)) {
					if ($('input[name="agree"]:checked').length > 0) {
						$.ajax({
							url: "{{route('registerApplicantsDawnload')}}",
							method: "POST",
							data: data,
							success: function(result) {
								var link = document.createElement("a");
								link.download = fileName;
								link.href = courseBrochure;
								link.click();
							},
						})
						$('#alertDivinfo').fadeTo(2000, 500).slideUp(500, function() {
							$("#alertDivinfo").slideUp(3000);
						});
					} else {
						$('#alertDivDanger').fadeTo(2000, 500).slideUp(500, function() {
							$("#alertDivDanger").slideUp(3000);
						});
					}
				} else {

					$('#alertDivValid').fadeTo(2000, 500).slideUp(500, function() {
						$("#alertDivValid").slideUp(3000);
					});

				}
			} else {

				$('#alertDivValid').fadeTo(2000, 500).slideUp(500, function() {
					$("#alertDivValid").slideUp(3000);
				});

			}
		});
	});
</script>
@endsection
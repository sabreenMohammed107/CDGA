@extends('web.webLayout.web')
@section('style')
<link href="{{ asset('webasset/css/tabs.css')}}" rel="stylesheet" />
@endsection
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
		
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">Public Training</h1>
					<p class="text-color link-nav"><a href="{{ url('/') }}">Home </a> 
					 <span class="lnr lnr-arrow-right"></span>  <a > Public Training</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!--Start category tab-->
	<div class="row d-flex justify-content-center" style="margin:0px !important;padding-bottom:0px">
		<div class="menu-content">
			<div class="title text-center">
				<h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Explore Training Subjects</h4>
			</div>
		</div>
	</div>
	<section  class="top-category-widget-area pt-90 pb-90" style="background-color:#ffffff !important;padding-top:0px">
		<div  class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3>Courses Category</h3>
					<hr />
					<div class="col-lg-2 col-md-4 col-sm-12">
						<!-- required for floating -->
						<!-- Nav tabs -->
						<?php 
                        $techId=1;
                        $soft=2;
						$certi=3;
						$it=5;
						?>
						<ul class="nav nav-tabs tabs-left sideways list-group">
							<li ><a href="{{ route('publicTraining') }}" data-toggle="tab">All Training</a></li>
							<li><a href="{{ url('technicalTraining/'.$techId) }}" data-toggle="tab">Technical Training</a></li>
							<li><a href="{{ url('softTraining/'.$soft) }}" data-toggle="tab">Soft Skills Training</a></li>
							<li class="active"><a href="{{ url('certiTraining/'.$certi) }}" data-toggle="tab">Certified Courses</a></li>
							<li><a href="{{ url('it/'.$it) }}" data-toggle="tab">IT Courses</a></li>
						</ul>
					</div>
<div id="certifiedList">
@include('web.publicTraining.certifiedCat')
					</div>
						</div>

				</div>
			</div>
	</section>
	<!--End category tab-->

	<!--Start Download Calender-->
	
	<section class="ftco-counter bg-light" id="section-scedules" style="background-color:#E6E6FA!important">
		<div class="row d-flex justify-content-center" style="margin:0px !important">
			<div class="menu-content pb-15">
				<div class="title text-center">
					<h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">BTS Schedules</h4>
					<h1 class="mb-10" style="font-size:30px">Download The Complete BTS Training Schedules Here</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="scedules">
				<div class="row justify-content-center ">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 col-12"></div>
							<div class="col-md-4 col-12">
								<div class="last">
									<a href="#">Calender 2020</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--End Download Calender-->
    @endsection
	@section('scripts')
    <script>

$(document).ready(function() {



//pagination
$(document).on('click', '#categoryCert .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
 
  fetch_data(page);
 });
 
 
 function fetch_data(page)
 {
	 
  $.ajax({
	
    url:"{{ URL::to('fetch_certi') }}?page="+page,

   
   success:function(data)
   {
    $('#certifiedList').html(data);
   }
  });
 }

});


</script>
    @endsection
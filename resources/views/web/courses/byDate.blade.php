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
                <h1 class="text-white"> {{$courseSubCategory->subcategory_en_name }}</h1>
                <p class="text-color link-nav"><a href="{{ url('/') }}">Home </a> 
                <span class="lnr lnr-arrow-right"></span> <a href="{{ url('category/'.$courseSubCategory->course_category_id) }}">{{ $courseCategory->category_en_name }}</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<section class="popular-courses-area section-gap courses-page" style="padding-top:5px">
    <div class="container" style="background-color:;margin-top:0px!important">
        <div class="row">
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <a href='{{url ("/courses/$courseCategory->id/$courseSubCategory->id/title") }}' class="primary-btn" style="width:100%">
                    Browse By Title
                </a>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <a href='{{url ("/courses/$courseCategory->id/$courseSubCategory->id/venue") }}' class="primary-btn" style="width:100%">
                    Browse By Venue
                </a>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <a href='{{url ("/courses/$courseCategory->id/$courseSubCategory->id/date") }}' class="primary-btn" style="width:100%">
                    Browse By Date
                </a>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <a href='{{url ("/courses/$courseCategory->id/$courseSubCategory->id/duration") }}' class="primary-btn" style="width:100%">
                    Browse By Duration
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Sort Area -->
@if($courseCategory->id==6 && $courseSubCategory->id==6)
<!-- Start top-category-widget Area -->
<section class="top-category-widget-area pb-90 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a  target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="{{ asset('webasset/images/cor-1.jpg')}}" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Online Training</h4>
									<span></span>
									<p>Simple .. Interactive .. Latest technology</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a  target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="{{ asset('webasset/images/cor-2.jpg')}}" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Online Training</h4>
									<span></span>
									<p>Live online combines</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a  target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="{{ asset('webasset/images/cor-3.jpg')}}" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Online Training</h4>
									<span></span>
									<p>Flexibility, convenience</p>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a  target="_blank">
								<div class="thumb">
									<img class="content-image img-fluid d-block mx-auto" src="{{ asset('webasset/images/cor-4.jpg')}}" alt="">
								</div>
								<div class="content-details">
									<h4 class="content-title mx-auto text-uppercase">Online Training</h4>
									<span></span>
									<p>More effective learning</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End top-category-widget Area -->
    @endif

<!-- Start course-mission Area -->
<section class="course-mission-area">
    <div class="container">
        <div class="row d-flex justify-content-center" style="padding-top:0px">
            <div class="menu-content col-lg-8">
                <div class="container title text-center">
                    <h4 class="text-color" style="font-family:pruistin;font-size:30px">Technical Training</h4>
                    <h1 class="mb-10" style="font-size:30px">Courses We Offer</h1>
                    <p>Learning With Us Is The Ticket To Success</p>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        @foreach($filterd_rounds as $rounds)
        <table class="table">
            <thead style="">
                <tr style="border-bottom:solid #FFA500">
                    <th style="border:none !important">
                        <h4>{{$rounds->month}} </h4>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($rounds->rounds as $round)
                <tr>
                    <td style="width:25%;">
                        <div class="">
                            <img class="img-fluid" src="{{ asset('uploads/courses')}}/{{ $round->course->course_image_thumbnail }}" alt="" style="border-radius:.5rem;padding-top:10px;height:120px ;width: 200px;">
                        </div>
                    </td>
                    <td style="width:60%;">
                        <div class="detials" >
                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                            </a>
                            <p style="margin-bottom:0px">
                            {{ Str::limit($round->course->course_en_desc, 220, ' ...') }}
                             
                            </p>
                        </div>
                        
                        <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
                    </td>
                    <td style="width:15%;">
                        <div class="detials" style="padding:0px">
                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <a href="{{url ('/registerCourse/'.$round->id) }}" class="btn btn-dark">Register</a>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>
</section>
<!-- End course-mission Area -->

<!-- Start courses Area -->
<!-- <section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h4 class="text-color" style="font-family:pruistin;font-size:30px">Technical Training</h4>
                    <h1 class="mb-10" style="font-family:;font-size:30px">Upcoming Courses</h1>
                    <p>There is a moment in the life of any aspiring.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($randomRounds as $randomRound)
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" style="width:100%;height:250px" src="{{ asset('uploads/courses')}}/{{ $randomRound->course->course_image_thumbnail }}" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <h4> {{ $randomRound->round_price }} - {{$randomRound->currancy->currency_name}}</h4>
                    </div>
                </div>
                <div class="details" style="padding: 0 0 50px 0;">
                    <a href="{{ url('courseDetails/'.$randomRound->course->id) }}">
                        <h4>
                            {{ $randomRound->course->course_en_name }}
                        </h4>
                    </a>
                  
                    <p>
                    {{ Str::limit($randomRound->course->course_en_desc, 200, ' ...') }}
                      
                    </p>
                </div>
                <a href="{{ url('courseDetails/'.$randomRound->course->id) }}" class="primary-btn" style="width:90%;position: absolute; bottom: 0">Book Course</a>
            </div>
            @endforeach
            <div class="col-lg-4"></div>
            <div class="col-lg-8 align-content-center">
                <nav class="blog-pagination justify-content-center">
                    <ul class="pagination">
                        {{ $randomRounds->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section> -->
<!-- End courses Area -->

	<!-- Start search-course Area -->
    <div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h4 class="text-color" style="font-family:pruistin;font-size:30px">Technical Training</h4>
						<h1 class="mb-10" style="font-size:30px">Get Your Best Offer</h1>
						<p>Learning With Us Is The Ticket To Success</p>
					</div>
				</div>
			</div>
		</div>
		<section class="search-course-area relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">

            <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 search-course-left">
                <h1 class="text-white">
                Quality Policy
                </h1>
                <p>
                               
                    Providing services with a high quality that are satisfying the requirements  <br>
                	Appling the specifications and legalizations to ensure the quality of service.  <br>
               	Best utilization of resources for continually improving the business activities.<br>
            
             
                              </p>
                <div class="row details-content">
                    <div class="col single-detials">
                        <span class="lnr lnr-graduation-hat" style="color:#FFA500"></span>
                        <a href="#">
                            <h4>Technical Team</h4>
                        </a>
                        <p>
                        CDGA keen to selects highly technical instructors based on professional field experience                    </div>
                    <div class="col single-detials">
                        <span class="lnr lnr-license" style="color:#FFA500"></span>
                        <a href="#">
                            <h4>Strengths and capabilities</h4>
                        </a>
                        <p>
                        Since CDGA was established, it considered a training partner for world class oil & gas institution
                                                </p>
                    </div>
                </div>
            </div>
					<div class="col-lg-4 col-md-6 ">
						<form  action="{{route('reducedForm')}}" method="POST">
                        @csrf
                        <h4 class="text-white pb-20 text-center mb-30">Search For Available Course</h4>
                        <div class="form-group col-lg-12 col-md-12">
							<input type="text" class="form-control" style="padding-bottom:10px" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                            <input type="number" class="form-control" style="padding-bottom:10px" name="phone" placeholder="Your Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'">
                            </div>
                            <div class="form-group col-lg-12 col-md-12">

                            <input type="email" class="form-control" style="padding-bottom:10px" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'">
</div>
                            <div class="form-group col-lg-12 col-md-12">
                            <select class="form-control"  name="course_id" style="padding:0px 12px;">
                            <option datd-display="">Choose Course</option>
                            @foreach ($objectCourses as $objectCourse)
                                        <option  value='{{$objectCourse->id}}' >
                                         {{ $objectCourse->course_en_name }}</option>
                                           @endforeach
                                        
                        </select>
                         
								
							</div>
							<button type="submit" class="primary-btn text-uppercase" style="background-color:#FFA500">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End search-course Area -->

@endsection
@section('scripts')
<script>

$(document).ready(function () {
  
  /* custom select */
    $(function() {
        jcf.setOptions('Select', {
            wrapNative: false,
            wrapNativeOnMobile: true,
            fakeDropInBody: false
        });
        
        jcf.replaceAll();
    });
});
    </script>
@endsection
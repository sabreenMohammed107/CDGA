@extends('web.webLayout.web')

@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white"> {{ $course->course_en_name }} </h1>
                <p class="text-color link-nav"><a href="{{ url('/') }}">Home </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="{{ url('category/'.$course->subCategory->courseCategory->id) }}"> {{ $course->subCategory->courseCategory->category_en_name}} </a>
                    <?php
                    $catId = $course->subCategory->courseCategory->id;
                    $subId = $course->subCategory->id;
                    ?>

                    <span class="lnr lnr-arrow-right"></span> <a href='{{url ("/courses/$catId/$subId/date") }}'> {{ $course->subCategory->subcategory_en_name}}</a>

            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
@if ($message =Session::get('messageDetails'))
<div id="alertDivDetails" class="alert alert-info alert-block">
    <button type="button" id="alertCloseDetails" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>


@endif
<!-- Start course-details Area -->
<section class="event-details-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-15">
                <div class="title text-center">
                    <h4 class="text-color" style="font-family:pruistin;font-size:30px">Technical Training</h4>
                    <h1 class="mb-10" style="font-family:;font-size:30px">Courses Details</h1>
                    <p>We will never stop improving</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 event-details-left left-contents">
                <div class="main-img col-lg-12">
                    <img class="img-fluid" src="{{ asset('uploads/courses')}}/{{ $course->course_image }}" alt="{{ $course->course_en_name }}" style="border-radius:1rem">
                </div>
                <div class="details-content col-lg-8">
                    <a href="#">
                        <h4></h4>
                    </a>
                </div>
                <div class="accordion-left">
                    <!-- accordion 2 start-->
                    <style>
                        strong {
                            font-weight: bold !important;
                        }
                    </style>
                    <style>
                        .accordion ol {
                            margin-left: 15px;
                            list-style: decimal;
                            list-style-position: outside;
                        }

                        .accordion ul {
                            margin-left: 15px;
                            list-style-type: disc;

                            list-style-position: outside;
                        }
                    </style>
                    <dl class="accordion collapsable">

                        @if($course->subCategory->courseCategory->id==4)
                        <dt style="font-weight: bold;text-align:center;">
                            <a href="" style="">المقدمة</a>
                        </dt>
                        <dd style=" display: flex;justify-content:flex-end;margin:0; padding:0;direction: rtl">
                            {{ $course->course_en_desc }}
                        </dd>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">Course Description</a>
                        </dt>
                        <dd style=" display: flex;justify-content:flex-end;margin:0; padding:0">
                            {{ $course->course_en_desc }}
                        </dd>
                        @endif

                        @if($course->subCategory->courseCategory->id==4)
                        <dt style="font-weight: bold;text-align:center;">
                            <a href="" style="">أهم النقاط فى الدورة</a>
                        </dt>
                        <dd style="direction: rtl">

                            {!! $course->course_highlight !!}
                        </dd>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">The Training Course Will Highlight ?</a>
                        </dt>
                        <dd>

                            {!! $course->course_highlight !!}
                        </dd>
                        @endif

                        @if($course->subCategory->courseCategory->id==4)
                        <dt style="font-weight: bold;text-align:center;">
                            <a href="" style="">أهداف الدورة</a>
                        </dt>
                        <dd style="direction: rtl">
                            <p>

                                {!! $course->course_objectives !!}
                            </p>
                        </dd>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">Training Objective</a>
                        </dt>
                        <dd>
                            <p>

                                {!! $course->course_objectives !!}
                            </p>
                        </dd>
                        @endif

                        @if($course->subCategory->courseCategory->id==4)
                        <dt style="font-weight: bold;text-align:center;">
                            <a href="" style="">الفئات المستهدفة</a>
                        </dt>
                        <dd style="direction: rtl">
                            <p>

                                {!! $course->course_audience !!}
                            </p>
                        </dd>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">Target Audience</a>
                        </dt>
                        <dd>
                            <p>

                                {!! $course->course_audience !!}
                            </p>
                        </dd>
                        @endif

                        @if($course->subCategory->courseCategory->id==4)
                        <dt style="font-weight: bold;text-align:center;">
                            <a href="" style="">وسائل التدريب</a>
                        </dt>
                        <dd style="direction: rtl">
                            <p>
                                {!! $course->course_training_methods !!}
                            </p>
                        </dd>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">Training Methods</a>
                        </dt>
                        <dd>
                            <p>
                                {!! $course->course_training_methods !!}
                            </p>
                        </dd>
                        @endif

                        @if($course->subCategory->courseCategory->id==4)
                        <dt style="font-weight: bold;text-align:center;">
                            <a href="" style="">المحتويات الأﺳﺎﺳﻴﺔ</a>
                        </dt>
                        <dd style="direction: rtl">
                            {!! $course->course_daily_agenda !!}
                        </dd>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">Daily Agenda</a>
                        </dt>
                        <dd>
                            {!! $course->course_daily_agenda !!}
                        </dd>
                        @endif

                        @if($course->subCategory->courseCategory->id==4)

                        <dt style="font-weight: bold;text-align:center;">
                            <a href="">الشهادات المعتمدة</a>
                        </dt>
                        <dd style="direction: rtl">
                            {!! $course->Accreditation !!}
                        </dd>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">Accreditation</a>
                        </dt>
                        <dd>
                            {!! $course->Accreditation !!}
                        </dd>
                        @endif


                        @if($course->subCategory->courseCategory->id==4)
                        <dt style="font-weight: bold;text-align:center;">
                            <a href="" style="">طلب تنفيذ</a>
                        </dt>
                        @else
                        <dt style="font-weight: bold;">
                            <a href="">Quick Enquiry</a>
                        </dt>
                        @endif
                        <dd>

                            <style>
                                .comment-form form input,
                                textarea {
                                    border: 1px solid #ced4da !important
                                }
                            </style>
                            <div class="comment-form">
                                <h4>Request Info</h4>
                                <form class="form-area contact-form text-right" action="{{url('/registerApplicants')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{$course->id}}" />
                                    <input type="hidden" name="applicant_type_id" value=2 />
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <label>Salutation*</label>
                                            <select name="salut_id" class="form-control" style="padding:0 12px;border: 1px solid #CCC;">
                                                <option value=""></option>
                                                @foreach ($saluts as $salut)
                                                <option value='{{$salut->id}}' @if (old('salut_id')=="$salut->id" ) {{ 'selected' }} @endif>
                                                    {{ $salut->en_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12 email">
                                            <label>Full Name*</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <label>Designation*</label>
                                            <input name="job_title" type="text" value="{{ old('job_title') }}" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12 email">
                                            <label>Company*</label>
                                            <input type="text" name="company" value="{{ old('company') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <label>Country*</label>
                                            <select name="country_id" class="form-control" style="padding:0 15px;border: 1px solid #CCC;">
                                                <option value=""></option>
                                                @foreach ($countries as $country)
                                                <option value='{{$country->id}}' @if (old('country_id')=="$country->id" ) {{ 'selected' }} @endif>
                                                    {{ $country->country_en_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-12 email">
                                            <label>City*</label>
                                            <select name="venue_id" class="form-control" style="padding:0 12px;border: 1px solid #CCC;">
                                                <option value=""></option>
                                                @foreach ($venues as $venue)
                                                <option value='{{$venue->id}}' @if (old('venue_id')=="$venue->id" ) {{ 'selected' }} @endif>
                                                    {{ $venue->venue_en_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <label>Address*</label>
                                            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12 email">
                                            <label> Email*</label>
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <label>Fax*</label>
                                            <input type="text" name="fax" value="{{ old('fax') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group  form-inline">
                                        <label>Enquiry*</label>
                                        <textarea name="quk_enquery_notes" value="{{ old('quk_enquery_notes') }}" class="form-control mb-10" rows="5">{{Request::old('quk_enquery_notes')}}</textarea>
                                    </div>

                                    <div class="form-group form-inline">
                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
                                        </div>
                                    </div>



                                    <div class="form-group col-lg-6">
                                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                    </div>

                                    <button type="submit" class="mt-40 text-uppercase genric-btn primary text-center">Submit</button>
                                </form>
                            </div>
                        </dd>
                    </dl>
                    <!-- accordion 2 end-->
                </div>

                <div class="social-nav row no-gutters">

                    <div class="col-lg-4 col-md-4">
                        <div class=".social">
                            <?php

                            $courseId = $course->id;
                            $url = 'https://btsconsultant.com/courseDetails/' . $courseId;
                            ?>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" style="padding:3px 7px;background-color:#777" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}','popup','width=600,height=600'); return false;"><i class="fab fa-facebook-f" style="color:#fff"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}" style="padding:3px 7px;background-color:#777" target="popup" onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode($url) }}','popup','width=600,height=600'); return false;"><i class="fab fa-twitter" style="color:#fff"></i></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($url) }}" style="padding:3px 7px;background-color:#777" target="popup" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($url) }}','popup','width=600,height=600'); return false;"><i class="fab fa-linkedin-in" style="color:#fff"></i></a>
                            <a href="https://wa.me/?text={{ urlencode($url) }}" style="padding:3px 7px;background-color:#777" target="popup" onclick="window.open('https://wa.me/?text={{ urlencode($url) }}','popup','width=600,height=600'); return false;"><i class="fab fa-whatsapp" style="color:#fff"></i></a>

                            <a href="http://www.facebook.com/dialog/send?
  app_id=140586622674265
  &amp;link={{ urlencode($url) }}
  &amp;redirect_uri={{ urlencode('$url') }}" style="padding:3px 7px;background-color:#777" target="popup" onclick="window.open('https://developers.facebook.com/docs/
  app_id=140586622674265
  &amp;link={{ urlencode($url) }}
  &amp;redirect_uri={{ urlencode('$url') }}','popup','width=600,height=400'); return false;"><i class="fab fa-facebook-messenger" style="color:#fff"></i></a>

                        </div>

                    </div>

                </div>


            </div>

            <div class="col-lg-6 event-details-right" style="padding:0px">
                <div style="padding-bottom:10px">
                    <a href='{{url ("/downloadBrochure/$course->id") }}' class="btn btn-dark">
                        <i class="fas fa-download"></i> Download Brochure</a>
                    <a href='{{url ("/requestInHouse/$course->id") }}' class="btn btn-dark">
                        Request In house Proposal</a>
                    <!-- <button class="btn btn-dark">Request In house Proposal</button> -->
                </div>
                <div class="single-event-details" style="padding:30px 10px">
                    <h4>Course Rounds : ({{ $course->course_duration }} -Days) </h4><br />
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Fees</th>
                                <th scope="col">Register</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rounds as $round)
                            <tr>
                                <th scope="row"> {{ $round->round_code }}</th>

                                <td> <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                </td>
                                <td> {{ $round->venue->venue_en_name }} </td>
                                <td> {{ $round->currancy->currency_name}} {{ $round->round_price}}</td>
                                <td>

                                    <button class="btn btn-dark">
                                        <a href='{{url ("/registerCourse/$round->id") }}' style="padding:2px 3px;color:#fff"> Register</a>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h6><i class="fas fa-angle-double-right"></i> Prices doesn't include VAT</h6>
                </div>
                <div class="single-event-details">
                    <h4>UpComing Date</h4>
                    <hr />
                    <h6>Details</h6>
                    <ul class="mt-10">
                        <li class="justify-content-between d-flex">
                            <span>Start date</span>
                            <span> <?php $date = date_create($specfic_round->round_start_date) ?>
                                {{ date_format($date,"d-m-Y") }}
                            </span>
                        </li>
                        <li class="justify-content-between d-flex">
                            <span>End date</span>
                            <span> <?php $date = date_create($specfic_round->round_end_date) ?>
                                {{ date_format($date,"d-m-Y") }}</span>
                        </li>
                    </ul>
                    <br />
                    <h6>Venue</h6>
                    <ul class="mt-10">
                        <li class="justify-content-between d-flex">
                            <span> Country </span>
                            <span> {{ $specfic_round->country->country_en_name }}</span>
                        </li>
                        <li class="justify-content-between d-flex">
                            <span> Venue </span>
                            <span> {{ $specfic_round->venue->venue_en_name }} </span>
                        </li>

                    </ul>
                    <div class="display-4">
                        <button class="btn btn-dark" style="" ;>
                            <a href='{{url ("/registerCourse/$specfic_round->id") }}' style="padding:2px 3px;color:#fff"> Register Now</a>
                        </button>
                    </div>
                </div>
                @if($catId==6 && $subId==6)
                <!-- Start post-content Area -->
                <section class="post-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 sidebar-widgets">
                                <div class="widget-wrap" style="border:none !important">
                                    <div class="single-sidebar-widget popular-post-widget">
                                        <h4 class="popular-title">BTS Online Training Solution</h4>
                                        <div class="popular-post-list">
                                            <div class="single-post-list d-flex flex-row align-items-center">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="{{ asset('webasset/images/pp1.jpg')}}" alt="">
                                                </div>
                                                <div class="details">
                                                    <a >
                                                        <h6>Simple .. Interactive .. Latest technology</h6>
                                                    </a>
                                                    <p>Simple .. Interactive .. Latest technology</p>
                                                </div>
                                            </div>
                                            <div class="single-post-list d-flex flex-row align-items-center">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="{{ asset('webasset/images/pp2.jpg')}}" alt="">
                                                </div>
                                                <div class="details">
                                                    <a >
                                                        <h6>Live online combines the advantage</h6>
                                                    </a>
                                                    <p>Live online combines the advantage</p>
                                                </div>
                                            </div>
                                            <div class="single-post-list d-flex flex-row align-items-center">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="{{ asset('webasset/images/pp1.jpg')}}" alt="">
                                                </div>
                                                <div class="details">
                                                    <a >
                                                        <h6>Flexibility, convenience</h6>
                                                    </a>
                                                    <p>Flexibility, convenience</p>
                                                </div>
                                            </div>
                                            <div class="single-post-list d-flex flex-row align-items-center">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="{{ asset('webasset/images/pp2.jpg')}}" alt="">
                                                </div>
                                                <div class="details">
                                                    <a >
                                                        
                                                        <h6>More effective learning</h6>
                                                    </a>
                                                    <p>More effective learning</p>
                                                </div>
                                            </div>
                                            <div class="single-post-list d-flex flex-row align-items-center">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="{{ asset('webasset/images/pp1.jpg')}}" alt="">
                                                </div>
                                                <div class="details">
                                                    <a >
                                                        <h6>Easy on the pockets</h6>
                                                    </a>
                                                    <p>Easy on the pockets</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End post-content Area -->
                @endif

            </div>
        </div>
    </div>
</section>
<!-- End course-details Area -->

<!-- Start related-course Area -->
<section class="popular-course-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70">
                <div class="title text-center">
                    <h4 class="text-color" style="font-family:pruistin;font-size:30px">Technical Training</h4>
                    <h1 class="mb-10" style="font-family:;font-size:30px">Related Courses</h1>
                    <p>We will never stop improving</p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="active-popular-carusel">
                @foreach($related_courses as $related_course)
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>

                            <img class="img-fluid" style="height:100%" src="{{ asset('uploads/courses')}}/{{ $related_course->relatedcourse->course_image_thumbnail }}" alt="{{ $related_course->relatedcourse->course_en_name }}">
                        </div>

                    </div>

                    <div class="details">
                        <div style=" position: relative ;height:100px !important; border-bottom:1px solid #ccc;">

                            <a href="{{ url('courseDetails/'.$related_course->relatedcourse->id) }}">

                                <h4 style="border:none;">{{ Str::limit( $related_course->relatedcourse->course_en_name ,89,'') }}</h4>

                            </a> </div>
                        <p>
                            {{ Str::limit($related_course->relatedcourse->course_en_desc, 200, ' ...') }}

                        </p>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End related-course Area -->
<!-- Start search-course Area -->
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
                <h4 class="text-color" style="font-family:pruistin;font-size:30px">Technical Training</h4>
                <h1 class="mb-10" style="font-size:30px">Get Your Best Offer</h1>
                <p>We will never stop improving</p>
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

                     Providing services with a high quality that are satisfying the requirements <br>
                     Appling the specifications and legalizations to ensure the quality of service. <br>
                     Best utilization of resources for continually improving the business activities.<br>


                </p>
                <div class="row details-content">
                    <div class="col single-detials">
                        <span class="lnr lnr-graduation-hat" style="color:#FFA500"></span>
                        <a href="#">
                            <h4>Technical Team</h4>
                        </a>
                        <p>
                            BTS keen to selects highly technical instructors based on professional field experience
                    </div>
                    <div class="col single-detials">
                        <span class="lnr lnr-license" style="color:#FFA500"></span>
                        <a href="#">
                            <h4>Strengths and capabilities</h4>
                        </a>
                        <p>
                            Since BTS was established, it considered a training partner for world class oil & gas institution
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 search-course-right section-gap">
                <form action="{{route('reducedForm')}}" method="POST">
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
                        <select class="form-control" name="course_id" style="padding:0px 12px;">
                            <option datd-display="">Choose Course</option>
                            @foreach ($objectCourses as $objectCourse)
                            <option value='{{$objectCourse->id}}'>
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

@endsection
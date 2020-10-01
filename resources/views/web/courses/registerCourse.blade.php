@extends('web.webLayout.web')
@section('content')

<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Course Registration</h1>
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
            <div class="col-lg-8 event-details-left left-contents" style="background-color:#f9f9ff">
                <h4 style="border-bottom:solid #FFA500;padding-bottom:10px;margin:30px 0px 0px 0px">Course Registration Form</h4>
                <style>
                    .comment-form form input,
                    textarea,
                    select {
                        border: 1px solid #ced4da !important;
                    }
                </style>

                <div class="comment-form" style="margin-top:0px">
                    <form action="{{url('/registerApplicantRounds')}}" method="POST">
                        @csrf
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Course Details</h5>
                        </div>
                        <div class="form-group form-inline">
                            <input type="hidden" name="applicant_type_id" value=0 />
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Code : </label>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <p class="input-group-text">{{$course->course_code }}</p>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title : </label>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <p class="input-group-text">{{$course->course_en_name}}</p>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Date & Venue</label>

                                <select class="form-control" style="padding:0px 12px;" name="register_round_id">
                                <option value=""> Select</option>
                                    @foreach($course_rounds as $course_round)
                                    <?php $date = date_create($course_round->round_start_date) ?>
                                    <option value="{{ $course_round->id }}" @if (old('register_round_id')=="$course_round->id" ) {{ 'selected' }} @endif>{{ date_format($date,"d-m-Y")    }} | {{ $course_round->country->country_en_name }} {{$course_round->venue->venue_en_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr />
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Personal Data</h5>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Salutation*</label>
                                <select name="salut_id" class="form-control " style="padding:0 12px">
                                    <option value=""></option>
                                    @foreach ($saluts as $salut)
                                    <option value='{{$salut->id}}' @if (old('salut_id')=="$salut->id" ) {{ 'selected' }} @endif >
                                        {{ $salut->en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Full Name*</label>
                                <input type="text" name="name"  value="{{ old('name') }}"class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Designation*</label>
                                <input name="job_title" type="text" value="{{ old('job_title') }}" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Company*</label>
                                <input type="text" name="company" value="{{ old('company') }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Address*</label>
                                <input type="text" value="{{ old('address') }}"  name="address" class="form-control">
                            </div>

                            <div class="form-group col-lg-6 col-md-12">
                                <label>Phone*</label>
                                <input type="phone" name="phone" value="{{ old('phone') }}" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Country*</label>
                                <select name="country_id" class="form-control" style="padding:0">
                                    <option value=""></option>
                                    @foreach ($countries as $country)
                                    <option value='{{$country->id}}' @if (old('country_id')=="$country->id" ) {{ 'selected' }} @endif >
                                        {{ $country->country_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>City*</label>
                                <select name="venue_id" class="form-control" style="padding:0 ">
                                    <option value=""></option>
                                    @foreach ($venues as $venue)
                                    <option value='{{$venue->id}}' @if (old('venue_id')=="$venue->id" ) {{ 'selected' }} @endif >
                                        {{ $venue->venue_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class=" form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Email*</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Fax*</label>
                                <input type="text" name="fax" value="{{ old('fax') }}" class="form-control">
                            </div>
                        </div>
                        <hr />
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Payment Details</h5>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Payment Method*</label>
                                <select class="form-control" style="padding:0px 12px;">
                                    <option>Please Select Payment Mode</option>
                                    <option>Invoice My Company</option>
                                </select>
                            </div>
                        </div>
                        <hr />
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Billing Details</h5>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Salutation*</label>
                                <select name="billing_salut_id" class="form-control" style="padding:0 ">
                                    <option value=""></option>
                                    @foreach ($saluts as $salut)
                                    <option value='{{$salut->id}}' @if (old('billing_salut_id')=="$salut->id" ) {{ 'selected' }} @endif >
                                        {{ $salut->en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Full Name*</label>
                                <input type="text" name="billing_name" value="{{ old('billing_name') }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Designation*</label>
                                <input name="billing_job_title" value="{{ old('billing_job_title') }}" type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Company*</label>
                                <input type="text" name="billing_company" value="{{ old('billing_company') }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Address*</label>
                                <input type="text" name="billing_address" value="{{ old('billing_address') }}" class="form-control">
                            </div>

                            <div class="form-group col-lg-6 col-md-12">
                                <label>Phone*</label>
                                <input type="phone" name="billing_phone" value="{{ old('billing_phone') }}" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Country*</label>
                                <select name="billing_country_id" class="form-control" style="padding:0 ">
                                    <option value=""></option>
                                    @foreach ($countries as $country)
                                    <option value='{{$country->id}}' @if (old('billing_country_id')=="$country->id" ) {{ 'selected' }} @endif >
                                        {{ $country->country_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>City*</label>
                                <select name="billing_venue_id" class="form-control" style="padding:0 ">
                                    <option value=""></option>
                                    @foreach ($venues as $venue)
                                    <option value='{{$venue->id}}' @if (old('billing_venue_id')=="$venue->id" ) {{ 'selected' }} @endif >
                                        {{ $venue->venue_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Email*</label>
                                <input type="email" name="billing_email" value="{{ old('billing_email') }}" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Fax*</label>
                                <input type="billing_fax" name="billing_fax" value="{{ old('billing_fax') }}" class="form-control">
                            </div>
                        </div>
                        <hr />
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Terms & Conditions</h5>
                        </div>
                        <div class="form-check form-inline">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">I accept the Terms & Conditions*</label>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-check-label" for="exampleCheck1"><a href="{{url('/conditions')}}" target="blank" style="color:#4169E1">Terms & Conditions of Registration</a></label>

                            </div>
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
                        <button type="submit" class="mt-40 text-uppercase genric-btn primary text-center">Submit</button>
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
                <div class="sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="popular-title">Popular Courses</h4>
                            <div class="popular-post-list">
                                @foreach($rounds as $round)
                                <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb" style="width:50%;height:100%">
                                        <img style="border-radius:.5rem" class="img-fluid" src="{{ asset('uploads/courses')}}/{{ $round->course->course_image_thumbnail }}" alt="{{ $round->course->course_en_name }}">
                                    </div>
                                    <div class="details">
                                        <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                            <h5>{{ $round->course->course_en_name }}</h5>
                                        </a>
                                        <p>{{$round->venue->venue_en_name}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')


@endsection
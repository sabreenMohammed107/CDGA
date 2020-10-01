@extends('web.webLayout.web')
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Request for Inhouse</h1>
                <p class="text-color link-nav"><a href="{{ url('/') }}">Home </a>
					<span class="lnr lnr-arrow-right"></span>
					<?php 
					$catId=$course->subCategory->courseCategory->id;
					$subId=$course->subCategory->id;
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
                <h4 style="border-bottom:solid #FFA500;padding-bottom:10px;margin:30px 0px 0px 0px">Request for in - house proposal</h4>
                <style>
                    .comment-form form input,
                    textarea,
                    select {
                        border: 1px solid #ced4da !important;
                    }
                </style>
                <div class="comment-form" style="margin-top:0px">
                    <form action="{{url('/registerApplicants')}}" method="POST">
                        @csrf
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Course Details</h5>
                        </div>
                        <div class="form-group form-inline">
                            <input type="hidden" name="applicant_type_id" value=3 />
                            <input type="hidden" name="course_id" value="{{$course->id}}" />
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Code : </label>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <p class="input-group-text"> {{$course->course_code }} </p>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Title : </label>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <p class="input-group-text">{{$course->course_en_name}}</p>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>No. of Days</label>
                          
                                <input type="number" name="inhouse_no_days" value="{{5}}" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>No. of Participants</label>
                             
                                <input type="number" name="inhouse_no_particants" value="{{5}}" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Preferred Dates : </label>
                            </div>
                            <div class="form-group col-lg-12 col-md-12">
                                <input type="text" name="inhouse_perefer_dates" value="{{ old('inhouse_perefer_dates') }}"  class="form-control" />
                            </div>
                        </div>
                        <hr />
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Contact Person Details</h5>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Salutation*</label>
                                <select name="salut_id" class="form-control" style="padding:0 ">
                                    <option value=""></option>
                                    @foreach ($saluts as $salut)
                                    <option value='{{$salut->id}}' @if (old('salut_id')=="$salut->id" ) {{ 'selected' }} @endif>
                                        {{ $salut->en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Full Name*</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="padding:8px">
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Designation*</label>
                                <input name="job_title" value="{{ old('job_title') }}" type="text" class="form-control" style="padding:8px">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Company*</label>
                                <input type="text" name="company"  value="{{ old('company') }}" class="form-control" style="padding:8px">
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Address*</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control" style="padding:8px">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Phone*</label>
                                <input type="phone" name="phone" value="{{ old('phone') }}" class="form-control" style="padding:8px">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Country*</label>
                                <select name="country_id" class="form-control" style="padding:0 ">
                                    <option value=""></option>
                                    @foreach ($countries as $country)
                                    <option value='{{$country->id}}' @if (old('country_id')=="$country->id" ) {{ 'selected' }} @endif>
                                        {{ $country->country_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>City*</label>
                                <select name="venue_id" class="form-control" style="padding:0 ">
                                    <option value=""></option>
                                    @foreach ($venues as $venue)
                                    <option value='{{$venue->id}}' @if (old('venue_id')=="$venue->id" ) {{ 'selected' }} @endif>
                                        {{ $venue->venue_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                </div>
                       
                            
                           
                      
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Email*</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" style="padding:8px">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Fax*</label>
                                <input type="text" name="fax" value="{{ old('fax') }}" class="form-control" style="padding:8px">
                            </div>
                        </div>
                        <hr />
                        <div class="form-inline" style="padding-bottom:10px">
                            <h5>Other Requirements</h5>
                        </div>
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-12 col-md-12">
                                <textarea class="form-control" name="inhouse_requirements" style="padding:0px 12px;min-height:200px;">{{Request::old('inhouse_requirements')}}</textarea>
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
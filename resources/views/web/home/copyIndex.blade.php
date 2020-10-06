@extends('web.webLayout.web')

@section('content')
<!--Start Social Icon-->
<div class="fixed-icon">
    <div class="f-icon f1"><a href="https://www.facebook.com/Best-Technology-Solutions-101762614785390/" target="_blank"><i class="fab fa-facebook-f"></i></a></div>
    <div class="f-icon f2"><a href="https://twitter.com/bts_consultants" target="_blank"><i class="fab fa-twitter"></i></a></div>
    <div class="f-icon f3"><a href="https://www.linkedin.com/company/best-technology-solutions-bts" target="_blank"><i class="fab fa-linkedin-in"></i></a></div>
    <div class="f-icon f3"><a href="https://wa.me/?text={{ urlencode('http://test.btsconsultant.com/public/index') }}" target="_blank"><i class="fab fa-whatsapp"></i></a></div>
    <div class="f-icon f4"><a href="https://www.instagram.com/best_technology_solutions/" target="_blank"><i class="fab fa-instagram"></i></a></div>
</div>
<!--End Social Icon-->
<style>
 
</style>                
               
<!-- start banner Area -->
<section class="banner-area relative" id="home" style="background: url({{ asset('webasset/images/banner-bg.jpg')}}) right;
    background-size: cover">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-9 col-md-12">
                <h1 class="text-uppercase">
                    We Ensure better education
                    for a better world
                </h1>
                <p class="pt-10 pb-10 text-white">
                    In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
                </p>
                <a href="#" class="primary-btn text-uppercase">Get Started</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Popular Courses</h1>
                    <p>In the history of modern astronomy there is.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($poprounds as $round)
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" style="width:100%;height:250px" src="{{ asset('uploads/courses')}}/{{ $round->course->course_image_thumbnail }}" alt="{{ $round->course->course_image_thumbnail }}">
                </div>
                <?php $date = date_create($round->round_start_date) ?>
                <div style=" position: relative ;height: 18%; border-bottom:1px solid #ccc;">

                    <p style="margin-top:10px;margin-bottom:20px; " class="meta">
                        <a href="{{ url('courseDetails/'.$round->course->id) }}">
                            @if($round->course->course_sub_category_id==4)
                            <h5 style="border:none; padding-bottom:30px;text-align:right">{{ Str::limit($round->course->course_en_name, 130,'') }}</h5>
                            @else
                            <h5 style="border:none; padding-bottom:30px;">{{ Str::limit($round->course->course_en_name, 89,'') }}</h5>
                            @endif
                        </a>
                    </p>
                    <p class="meta" style="margin-top:10px; position: absolute;bottom:0">
                        {{ $round->venue->venue_en_name }} - {{ $round->country->country_en_name }} | {{ date_format($date,"d M, Y") }}
                        </a></p>
                </div>

                <div style="padding: 0 0 30px 0;">

                    @if($round->course->course_sub_category_id==4)
                    <p style="direction: rtl;">
                        {{ Str::limit($round->course->course_en_desc, 400, '...') }}
                    </p>
                    @else
                    </p>
                    {{ Str::limit($round->course->course_en_desc, 200, ' ...') }}
                    </p>
                    @endif


                    <a href="{{ url('courseDetails/'.$round->course->id) }}" style="position: absolute; bottom: 0;" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End blog Area -->


<!-- Start search-course Area -->
<section class="search-course-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 search-course-left">
                <h1 class="text-white">
                    Our Services
                </h1>
                <p>
                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
                </p>
                <div class="row details-content">
                    <div class="col single-detials">
                        <span class="lnr lnr-license"></span>
                        <?php
                        $catId = 1;
                        ?>
                        <a href="{{ url('category/'.$catId) }}">
                            <h4><i class="fas fa-cogs" style="color:#FFA500;font-size:20px"></i> Technical Categories</h4>
                        </a>
                        <p class="text-white">
                            Our training programs are designed to maximize delegate participation.
                            Participants .. </p>
                    </div>
                    <div class="col single-detials">
                        <span class="lnr lnr-license"></span>
                        <?php
                        $catId = 2;
                        ?>
                        <a href="{{ url('category/'.$catId) }}">
                            <h4><i class="fas fa-users" style="color:#FFA500;font-size:20px"></i> Soft skills Categories</h4>
                        </a>
                        <p>CDGA offers a range of Soft Skills training courses which provides delegates opportunities to develop ..
                        </p>

                    </div>
                </div>
                <div class="row details-content">
                    <div class="col single-detials">
                        <span class="lnr lnr-license"></span>
                        <?php
                        $catId = 3;
                        ?>
                        <a href="{{ url('category/'.$catId) }}">
                            <h4><i class="fas fa-graduation-cap" style="color:#FFA500;font-size:20px"></i> Certified Courses</h4>
                        </a>
                        <p>
                            Why do some participants take Professional Certificate training course? According to The Guide to ..
                        </p>
                    </div>
                    <div class="col ">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 search-course-right section-gap">
               
                <form action="{{route('searchForm')}}" class="search-area">

                    <h4 class="text-white pb-20 text-center mb-30">Search for Available Course</h4>
                    <label class="text-white">Enter Key Words</label>
                    <input type="text" class="form-control" name="wordName" placeholder="Key Words">
                    <label class="text-white">Category</label>
                    <div class="form-select mb-10" id="service-select">
                        <select  name="category_id">
                            <option datd-display="">Choose Category</option>
                            @foreach ($subCategories as $category)
                            <option value='{{$category->id}}'>
                                {{ $category->subcategory_en_name }}</option>
                            @endforeach
                        </select>
                        </div>
                    <label class="text-white">Venue</label>
                    <div class="form-select mb-10" id="service-select">
                        <select>
                            <option datd-display="">Choose Venue</option>
                            @foreach ($venues as $venue)
                            <option value='{{$venue->id}}'>
                                {{ $venue->venue_en_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="text-white">Start Date</label>
                    <input name="start" placeholder="From Date" class="form-control " type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                    <label class="text-white">End Date</label>
                    <input name="end" placeholder="To Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                    <div style="margin:15px 5px 10px 0px">
                        <input type="submit" value="Search" class="form-control btn text-uppercase" style="background-color:#FFA500;color:#fff;" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End search-course Area -->

<!-- Start Popular Courses Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-15">
                <div class="title text-center">
                    <h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Upcoming Courses</h4>
                    <h1 class="mb-10" style="font-size:30px">Upcoming Courses We Offer</h1>
                    <p>We will never stop improving</p>
                </div>
            </div>
            <div class="row">
                @foreach($rounds as $round)
                <div class="col-lg-3 col-md-6 single-blog">
                    <div class="thumb">
                        <img class="img-fluid" style="width:100%;height:250px" src="{{ asset('uploads/courses')}}/{{ $round->course->course_image_thumbnail }}" alt="{{ $round->course->course_image_thumbnail}}">
                    </div>
                    <?php $date = date_create($round->round_start_date) ?>
                    <div style=" position: relative ;height: 18%; border-bottom:1px solid #ccc;">

                        <p style="margin-top:10px;margin-bottom:20px; " class="meta">
                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                @if($round->course->course_sub_category_id==4)
                                <h5 style="border:none; padding-bottom:30px;text-align:right">{{ Str::limit($round->course->course_en_name, 130,'') }}</h5>
                                @else
                                <h5 style="border:none; padding-bottom:30px;">{{ Str::limit($round->course->course_en_name, 89,'') }}</h5>
                                @endif
                            </a>
                        </p>
                        <p class="meta" style="margin-top:10px; position: absolute;bottom:0">
                            {{ $round->venue->venue_en_name }} - {{ $round->country->country_en_name }} | {{ date_format($date,"d M, Y") }}
                            </a></p>
                    </div>

                    <div style="padding: 0 0 30px 0;">

                        @if($round->course->course_sub_category_id==4)
                        <p style="direction: rtl;">
                            {{ Str::limit($round->course->course_en_desc, 400, '...') }}
                        </p>
                        @else
                        </p>
                        {{ Str::limit($round->course->course_en_desc, 200, ' ...') }}
                        </p>
                        @endif


                        <a href="{{ url('courseDetails/'.$round->course->id) }}" style="position: absolute; bottom: 0;" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>
<!-- End Popular Courses Area -->

<!-- Start Clients Area -->
<div class="row d-flex justify-content-center" style="margin:0px !important">
    <div class="menu-content pb-15">
        <div class="title text-center">
            <h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Our Clients</h4>
            <h1 class="mb-10" style="font-size:30px">Our Clients</h1>
            <p>We will never stop improving</p>
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
                            <img class="img-fluid" src="{{ asset('uploads/clients')}}/{{ $client->client_logo_url }}" alt="{{ $client->client_name }}" style="max-height:100px;max-width:200px">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- End Clients Area -->

<!--Start Counter Section-->
<div class="row d-flex justify-content-center" style="margin:0px !important">
    <div class="menu-content pb-15">
        <div class="title text-center">
            <h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">CDGA in Numbers</h4>
            <h1 class="mb-10" style="font-size:30px">CDGA in Numbers</h1>
            <p>We will never stop improving</p>
        </div>
    </div>
</div>
<section class="ftco-counter" id="section-counter" style="margin:0px !important">
    <div class="container">
        <div class="statistic">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($btsNumbers as $btsNumber)
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <h4 class="counter" data-count="{{$btsNumber->bts_number_value}}">300</h4><br />
                                    <h4>{{$btsNumber->bts_number_en_name}}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Counter Section-->

<!-- Start Instructors Area -->
<section class="popular-course-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-15">
                <div class="title text-center">
                    <h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Our Experienced Instructors</h4>
                    <h1 class="mb-10" style="font-size:30px">Meet Your Trainer</h1>
                    <p>We will never stop improving</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-popular-carusel">
                @foreach($trainers as $trainer)
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset('uploads/trainers')}}/{{ $trainer->trainer_image }}" alt="{{ $trainer->trainer_name }}" style="border-radius:1rem ;width:100%;height:200px">
                        </div>
                    </div>
                    <div class="details" style="text-align:center">

                        <h4>{{$trainer->trainer_name}}</h4>

                        <p>{{$trainer->trainer_desc}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- End Instructors Area -->

<!-- Start become instructor Area -->
<section class="cta-one-area relative section-gap" style="padding:120px 0px">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="overlay overlay-bg"></div>
        <div class="row justify-content-center">
            <div class="wrap">
                <h1 class="text-white">Become an Instructor</h1>
                <p>
                    Join our group of world-class training experts and help reshape the world of learning and development one training course at a time.
                </p>
                <a class="primary-btn wh" href="{{ route('speakers') }}">Apply For a Job</a>
            </div>
        </div>
    </div>
</section>
<!-- End become instructor Area -->



<!-- Start Parteners Area -->
<div class="row d-flex justify-content-center" style="margin:0px !important">
    <div class="menu-content pb-15">
        <div class="title text-center">
            <h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Our Partners</h4>
            <h1 class="mb-10" style="font-size:30px">Our Partners</h1>
            <p>We will never stop improving</p>
        </div>
    </div>
</div>
<section class="popular-course-area section-gap" style="background-color:#fff">
    <div class="">

        <div class="row" style="margin:0px !important">
            <div class="active-popular-carusel">
                @foreach($partners as $partner)
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset('uploads/partners')}}/{{ $partner->partner_logo_url }}" alt="{{ $partner->partner_name }}" style="max-height:100px;max-width:200px">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- End Parteners Area -->


<!--Start Download Calender-->
<div class="row d-flex justify-content-center" style="margin:0px !important">
    <div class="menu-content pb-15">
        <div class="title text-center">
            <h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">CDGA Schedules</h4>
            <h1 class="mb-10" style="font-size:30px">Download Complete CDGA Schedules Here</h1>
            <p>We will never stop improving</p>
        </div>
    </div>
</div>
<section class="ftco-counter bg-light" id="section-scedules" style="background-color:#E6E6FA!important">
    <div class="container">
        <div class="scedules">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="last">
                                <a id="downloadCurrentCalender">
                                    Calender {{$year}}
                                </a>
                                <input type="hidden" name="calender" value="{{ asset('uploads/calender')}}/{{$calender->current_year_calendar}}" alt="{{$calender->current_year_calendar}}" />

                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="last">
                                <a id="downloadProfile">Company Profile</a>
                                <input type="hidden" name="campany_profile" value="{{ asset('uploads/calender')}}/{{$calender->campany_profile}}" alt="{{$calender->campany_profile}}" />

                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="last">
                                <a id="downloadNextCalender">Calender {{$year+1}}</a>
                                <input type="hidden" name="nextCalender" value="{{ asset('uploads/calender')}}/{{$calender->next_year_calendar}}" alt="{{$calender->next_year_calendar}}" />

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
        $('#downloadCurrentCalender').click(function() {
            var calender = $('input[name="calender"]').val();


            var link = document.createElement("a");
            link.download = 'Current-Calender';
            link.href = calender;
            link.click();


        });
        $('#downloadNextCalender').click(function() {
            var calender = $('input[name="nextCalender"]').val();


            var link = document.createElement("a");
            link.download = 'Next-Calender';
            link.href = calender;
            link.click();


        });
        $('#downloadProfile').click(function() {
            var calender = $('input[name="campany_profile"]').val();


            var link = document.createElement("a");
            link.download = 'campany_profile';
            link.href = calender;
            link.click();


        });
    });
</script>

@endsection
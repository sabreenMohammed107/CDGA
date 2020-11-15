<!-- Start Header -->
<header id="header">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-3 col-8 header-top-left no-padding">
					<ul>
						<li><a href="https://www.facebook.com/Best-Technology-Solutions-101762614785390/" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://twitter.com/bts_consultants" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com/company/best-technology-solutions-bts" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
						<li><a href="https://wa.me/?text={{ urlencode('http://test.btsconsultant.com/public/') }}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
						<li><a href="https://www.instagram.com/best_technology_solutions/" target="_blank" ><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-md-9 col-4 header-top-right no-padding ">
				
					<a href="{{ route('contactus') }}" id="xx"><span class="lnr lnr-phone-handset"></span> <span class="text">
					<i class="fas fa-phone" style="opacity:0.9"></i> {{$branch->office_phone}}</span></a>
					<a href="{{ route('contactus') }}" id="yy"><span class="lnr lnr-envelope"></span> <span class="text">
					<i class="far fa-envelope" style="opacity:0.9"></i> {{$branch->email}}
					</span></a>
					<a href="{{ route('contactus') }}" id="zz"><span class="lnr lnr-whatsapp"></span> <span class="text">
					<i class="fab fa-whatsapp" style="opacity:0.9"></i> +353879459509 - +353877738134
					</span></a></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container main-menu">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a  href="{{ url('/') }}"><img src="{{ asset('webasset/images/100.jpg')}}" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li><a href="{{url('/')}}">HOME</a></li>
					<li class="menu-has-children">
						<a href="">ABOUT</a>
						<ul>
							<li class="menu-has-children">
								<a href="{{url('/aboutUs')}}">ABOUT CDGA</a>
							</li>
							<li class="menu-has-children">
								<a href="">Services</a>
								<ul>
									<li><a href="{{ route('publicTraining') }}">Public Training</a></li>
									<li><a href="{{ route('inHouse') }}">In-House Training</a></li>
									<li><a href="{{url('/consunltancy')}}">Consultancy</a></li>
								</ul>
							</li>
							<li class="menu-has-children">
								<a href="{{ route('accreditations') }}">Accreditations</a>
							</li>
							<li class="menu-has-children">
								<a href="{{ route('tesimonial') }}">Testimonials</a>
							</li>
						</ul>
					</li>
					<li class="menu-has-children">
						<a href="">TRAINING CALENDER</a>
						<?php 
						$current=now()->year;
						$next=$current+1;
						?>
						<ul>
							<li><a href="{{ url('calender/'.$current) }}">Calender {{$current}}</a></li>
							<li><a href="{{ url('calenderNext/'.$next) }}">Calender {{$current+1}}</a></li>
						</ul>
					</li>
					<li class="menu-has-children">
						<a href="">TRAINING CATEGORY </a>
						<ul>
							@foreach ($courseCategories as $courseCategory)
							<li class="menu-has-children">
								<a href="{{ url('category/'.$courseCategory->id) }}">{{ $courseCategory->category_en_name}}</a>
								@if (count($courseCategory->courseSubCategories) > 0)
								<ul class="scrollable-menu" style="max-height: 455px; overflow-x: auto;">
									@foreach ($courseCategory->courseSubCategories as $courseSubCategory)
									<li><a href='{{url ("/courses/$courseCategory->id/$courseSubCategory->id/date") }}'>{{ $courseSubCategory->subcategory_en_name}}</a></li>
									@endforeach
								</ul>
								@endif
							</li>
							@endforeach
						</ul>
					</li>
					<?php 
						$catId=4;
						$sub=4;
						$online=6;
						?>
					
					{{-- 					<li><a href='{{url ("/courses/$catId/$catId/date") }}' style="font-size:16px">البرامج العربية</a></li>
--}}
					<li><a href='{{url ("/courses/$online/$online/date") }}' >Online Courses</a></li>
					<li><a href="{{ route('contactus') }}">CONTACT US</a></li>
					<li class="menu-has-children">
						<a href="">JOIN US</a>
						<ul>
							<li><a href="{{ route('speakers') }}">Speakers</a></li>
							<li><a href="{{ route('joinus') }}">Team Members</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<!-- #nav-menu-container -->
		</div>
	</div>
	@if ($message =Session::get('message'))
		<div id="alertDiv" class="alert alert-info alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>	
        <strong style="color:black;font-weight:bold">{{ $message }}</strong>
</div>
	

@endif
@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
</header>

<!-- End Header -->
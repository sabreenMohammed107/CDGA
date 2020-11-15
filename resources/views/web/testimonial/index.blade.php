@extends('web.webLayout.web')
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">Testimonials</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start course-mission Area -->
	<section class="course-mission-area pb-120">
		<div class="container">
			<div class="row d-flex justify-content-center"style="padding-top:50px">
				<div class="menu-content pb-15">
					<div class="title text-center">
						<h4 class="text-color" style="font-family:pruistin;font-size:30px">Testimonials</h4>
						<h1 class="mb-10" style="font-family:;font-size:30px">Testimonials</h1>
						<p>Learning With Us Is The Ticket To Success</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 video-right justify-content-center align-items-center d-flex relative">
					<div class="overlay overlay-bg"></div>
					
                    <div class="video">
	         <iframe width="560" height="315" src="{{ asset('uploads/vedio')}}/{{ $testimonial->testimonials_video_url }}?autoplay=1" frameborder="0" allowfullscreen></iframe>
			
		     </div>
				</div>
				<div class="col-lg-6 info-area-right">
					<h4>	WHAT DO OUR DELEGATES AND CLIENTS SAY ABOUT US?</h4>

					<br />
					
					<p>
				
					We are always delighted to receive positive comments regarding our courses.
Here are some of our many testimonials. Feedback from our clients is most important to us. Client feedback enables us to continuously develop and improve our course offerings based on the experiences and opinions of former course participants.  In this section, we would like to share some of the feedback that we have received from individuals and companies.  We also share regular updates on our social media pages (Facebook, LinkedIn & Twitter) so please check us out if you want to see more recent updates.

					</p>
					
					<p>
					The first comments have been made by our open-course delegates who have attended our wide range of courses and the last testimonials are from a few of our clients about the experience they had with us with In-House training.					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End course-mission Area -->

	

	<!-- Start review Area -->
	<div class="container">
		<div class="row d-flex justify-content-center" style="padding-top:50px">
			<div class="menu-content pb-15">
				<div class="title text-center">
					<h4 class="text-color" style="font-family:pruistin;font-size:30px">Reviews</h4>
					<h1 class="mb-10" style="font-family:;font-size:30px">Reviews</h1>
					<p>Learning With Us Is The Ticket To Success</p>
				</div>
			</div>
		</div>
	</div>
	<section class="review-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row">
				<div class="active-review-carusel">
					@if($reviews!=null)
				@foreach($reviews as $review)
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#"><h4>{{$review->reviewer_name}}</h4></a>
                            @foreach(range(1,5) as $i)
                        	<div class="star">
                            @if($review->reviewer_star_rate >=$i )
								<span class="fa fa-star checked"></span>
                                @else
								<span class="fa fa-star"></span>
                                @endif
								
							</div>
                            @endforeach
						</div>
						<p>
{!!$review->reviewer_text!!}						
</p>
					</div>
					@endforeach
					@endif
					
				</div>
			</div>
		
			
		</div>
	</section>
	<!-- End review Area -->	

	<!-- Start gallery Area -->
	<section class="gallery-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center" style="padding-top:50px">
				<div class="menu-content pb-15">
					<div class="title text-center">
						<h4 class="text-color" style="font-family:pruistin;font-size:30px">Testimonials</h4>
						<h1 class="mb-10" style="font-family:;font-size:30px">Images Gallery</h1>
						<p>Learning With Us Is The Ticket To Success</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7">
				@isset($galleries['0'])
					<a href="{{ asset('uploads/gallery')}}/{{ $galleries['0']['image_path']}}" class="img-gal">
						<div class="single-imgs relative">
							<div class="overlay overlay-bg"></div>
							<div class="relative">
                           
								<img class="img-fluid" style="height:250px" src="{{ asset('uploads/gallery')}}/{{ $galleries['0']['image_path']}}" alt="">
							</div>
						</div>
					</a>
					@endisset

				</div>
				<div class="col-lg-5">
				@isset($galleries['1'])
					<a href="{{ asset('uploads/gallery')}}/{{ $galleries['1']['image_path']}}" class="img-gal">
						<div class="single-imgs relative">
							<div class="overlay overlay-bg"></div>
							<div class="relative">
								<img class="img-fluid" style="height:250px" src="{{ asset('uploads/gallery')}}/{{ $galleries['1']['image_path']}}" alt="">
							</div>
						</div>
					</a>
					@endisset

				</div>
				<div class="col-lg-4">
				@isset($galleries['2'])
					<a href="{{ asset('uploads/gallery')}}/{{ $galleries['2']['image_path']}}" class="img-gal">
						<div class="single-imgs relative">
							<div class="overlay overlay-bg"></div>
							<div class="relative">
								<img class="img-fluid" style="height:250px" src="{{ asset('uploads/gallery')}}/{{ $galleries['2']['image_path']}}" alt="">
							</div>
						</div>
					</a>
					@endisset

				</div>
				<div class="col-lg-4">
				@isset($galleries['3'])
					<a href="{{ asset('uploads/gallery')}}/{{ $galleries['3']['image_path']}}" class="img-gal">
						<div class="single-imgs relative">
							<div class="overlay overlay-bg"></div>
							<div class="relative">
								<img class="img-fluid" style="height:250px" src="{{ asset('uploads/gallery')}}/{{ $galleries['3']['image_path']}}" alt="">
							</div>
						</div>
					</a>
					@endisset

				</div>
				<div class="col-lg-4">
				@isset($galleries['4'])
					<a href="{{ asset('uploads/gallery')}}/{{ $galleries['4']['image_path']}}" class="img-gal">
						<div class="single-imgs relative">
							<div class="overlay overlay-bg"></div>
							<div class="relative">
								<img class="img-fluid" style="height:250px" src="{{ asset('uploads/gallery')}}/{{ $galleries['4']['image_path']}}" alt="">
							</div>
						</div>
					</a>
					@endisset

				</div>
				<div class="col-lg-5">
				@isset($galleries['5'])
					<a href="{{ asset('uploads/gallery')}}/{{ $galleries['5']['image_path']}}" class="img-gal">
						<div class="single-imgs relative">
							<div class="overlay overlay-bg"></div>
							<div class="relative">
								<img class="img-fluid" style="height:250px" src="{{ asset('uploads/gallery')}}/{{ $galleries['5']['image_path']}}" alt="">
							</div>
						</div>
					</a>
					@endisset

				</div>
				<div class="col-lg-7">
				@isset($galleries['6'])
					<a href="{{ asset('uploads/gallery')}}/{{ $galleries['6']['image_path']}}" class="img-gal">
						<div class="single-imgs relative">
							<div class="overlay overlay-bg"></div>
							<div class="relative">
								<img class="img-fluid" style="height:250px" src="{{ asset('uploads/gallery')}}/{{ $galleries['6']['image_path']}}" alt="">
							</div>
						</div>
					</a>
					@endisset

				</div>
			</div>
		</div>
	</section>
	<!-- End gallery Area -->
    @endsection
	@section('scripts')
    @endsection

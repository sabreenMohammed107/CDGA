@extends('web.webLayout.web')
@section('content')

<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">Join us as a Speaker</h1>
				</div>
			</div>
		</div>
	</section>

	<!-- End banner Area -->
	<section class="event-details-area section-gap">
		<div class="container">
			<h4 style="padding-bottom:30px;color:#FFA500">Are you highly qualified, experienced and respected in your field of technical expertise ?</h4>
			<h4 style="padding-bottom:30px">Then, YOU ARE WHO WE’RE LOOKING FOR!</h4>
			<hr />
			<p>At BTS, commitment to excellence is at the core of everything we do and we are always looking to welcome motivated, talented and experienced professionals to support our growth. If you have the passion to deliver training courses, seminars and workshops with the highest standards, we invite you to view our current openings for experienced trainers below:</p>
		</div>
</section>


	<!-- Start form Area -->
	<div class="whole-wrap">
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
		<div class="container">
        <form action="{{route('speakerForm')}}" method="POST" enctype="multipart/form-data" >
							@csrf
			<div class="section-top-border">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<style>
							form input, textarea, select{
								border: 1px solid #ced4da !important;
							}
						</style>
						
							<h5 class="mb-30">Personal Details</h5>
							
							<div class=" input-group-icon mt-10">
								<select name="salut_id" class="form-control "  >
                                        <option value="">select Salutation....</option>
                                        @foreach ($saluts as $salut)
                                        <option value='{{$salut->id}}' >
                                         {{ $salut->en_name }}</option>
                                           @endforeach

                                      </select>
							
							</div>
							<div class="mt-10">
								<input type="text" name="frist_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"  class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"  class="single-input">
							</div>
							<div class="mt-10">
								<input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"  class="single-input">
							</div>
							<hr style="margin:30px 0px !important" />
							<h5 class="mb-30">Contact Information</h5>
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
								<input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'"  class="single-input">
							</div>
							
							<div class=" input-group-icon mt-10">
								<!-- <div class="icon" ><i class="fa fa-globe" aria-hidden="true"></i></div> -->
								<select name="country_id" class="form-control  dynamic" data-show-subtext="true" data-live-search="true" id="country" data-dependent="state" >
                                        <option value="">select Country....</option>
                                        @foreach ($countries as $country)
                                        <option value='{{$country->id}}' >
                                         {{ $country->country_en_name }}</option>
                                           @endforeach

                                      </select>
							
							</div>
							<div class="input-group-icon mt-10">
								<!-- <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div> -->
							
								<select name="venue_id" class="form-control " data-show-subtext="true" data-live-search="true" id="state">
                                        <option value="">select ....</option>
                                                                           
                                      </select>
								
							</div>
							
							<div class="mt-10">
								<input type="" name="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'"  class="single-input-primary">
							</div>
							<div class="mt-10">
								<input type="" name="mobile" placeholder="Mobile" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile'"  class="single-input-primary">
							</div>
							<div class="mt-10">
								<textarea name="other_data" class="single-textarea" placeholder="Other Data" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Other Data'" ></textarea>
							</div>
							<div class="button-group-area mt-40">
								<button type="submit"  class="genric-btn primary e-large">Submit</button>
							</div>
						
					</div>
					<div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
						<div class="single-element-widget">
							<h5 class="mb-30">What are your expertise?</h5>
							<div class="switch-wrap d-flex justify-content-between">
								<h5>>> Tick 1 Or More</h5>
								<div class="primary-checkbox">
									<input type="checkbox" id="primary-checkbox" checked disabled>
									<label for="primary-checkbox"></label>
								</div>
							</div>
							
						@foreach($expertises as $expertise)
							<div class="switch-wrap d-flex justify-content-between">
								<p>{{$expertise->text}}</p>
								<div class="confirm-checkbox">
									<input type="checkbox" id="confirm-checkbox{{$expertise->id}}" name="expertise[]" value="{{$expertise->id}}">
									<label for="confirm-checkbox{{$expertise->id}}"></label>
								</div>
							</div>
                            @endforeach
							<!--<div class="mt-10">
								<textarea class="single-textarea" placeholder="Other ? Please Specify" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Other ? Please Specify'" required></textarea>
							</div>-->
						</div>
						<hr />
						<div class="single-element-widget">
							<h5 class="mb-30">Can you conduct training courses below?</h5>
							<div class="row">
								<div class="col-lg-6 col-md-12 mt-sm-30 element-wrap">
									<div class="single-element-widget">
										
										@foreach($courses as $course)
										
										<div class="switch-wrap d-flex justify-content-between">
											<p>{{$course->name}}</p>
											<div class="confirm-checkbox">
												<input type="checkbox" id="confirm-checkboxx{{$course->id}}" name="courses[]" value="{{$course->id}}">
												<label for="confirm-checkboxx{{$course->id}}"></label>
											</div>
										</div>
										@endforeach
									</div>
								</div>
								
							</div>
						</div>
						<hr />
						<div class="switch-wrap d-flex justify-content-between">
							<div class="row">
								<h6 class="col-lg-12" style="margin-bottom:5px">Upload CV with a clear photo</h6>
								<div class="col-lg-12">
									<input type="file" name="cv_path" id="cv_path">
									<label for="cv"></label>
								</div>
								<h6 class="col-lg-12" style="margin-bottom:5px">Upload other supporting documents</h6>
								<div class="col-lg-12">
									<input type="file" name="doc_path" id="doc_path">
									<label for="doc"></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            </form>
		</div>
	</div>
	<!-- End form Area -->

	<!-- Start join our team Area -->
	<section class="cta-one-area relative section-gap" style="padding:120px 0px;background: url({{ asset('webasset/images/teamwork.jpg')}}) center center !important">
		<div class="container">
			<div class="overlay overlay-bg"></div>
			<div class="row justify-content-center">
				<div class="wrap">
					<h1 class="text-white">Join Our Team</h1>
					<p>
					Join our group of world-class training experts and help reshape the world of learning and development one training course at a time.					</p>
					<a class="primary-btn wh" href="{{ route('joinus') }}">Join Our Team</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End join our team Area -->
@endsection
	@section('scripts')
	<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
    
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
  
   $.ajax({
    url:"{{route('speaker_dependentCountry.fetch')}}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
        
     $('#state').html(result);
    }

   })
  }
 });

 
 

});
 

</script>
    @endsection
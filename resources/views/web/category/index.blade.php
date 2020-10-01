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
					<h1 class="text-white">{{$category->category_en_name}}</h1>
					<p class="text-color link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>
					  <a >{{$category->category_en_name}}</a>
					    
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!--Start category tab-->
	<div class="row d-flex justify-content-center" style="margin:0px !important;padding-bottom:50px">
		<div class="menu-content">
			<div class="title text-center">
				<h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Explore Training Subjects</h4>
				<h1 class="mb-10" style="font-size:30px">{{$category->category_en_name}}</h1>
				@if($category->id !=4)
				<div style="padding:0 150px;text-align: justify;color:#777">
				<p>{{$category->category_en_description}}</p>
				</div>
				@else
				<div style="padding:0 150px;text-align: right;color:#777">
				<p>{{$category->category_en_description}}</p>
				</div>
				@endif
			</div>
		</div>
	</div>
	<section class="top-category-widget-area pt-90 pb-90" style="background-color:#ffffff !important;padding-top:0px">
		<div id="all-cat" class="container">
			
				
					@include('web.category.catList')

					
			</div>
	</section>
	<!--End category tab-->
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
								<a  id="downloadCurrentCalender" >
							Calender {{$yearCal}}
				               </a>
				<input type="hidden" name="calender" value="{{ asset('uploads/calender')}}/{{$calender->current_year_calendar}}" alt="{{$calender->current_year_calendar}}" />
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
$(document).on('click', '#category .pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
 
  fetch_data(page);
 });
 
 
 function fetch_data(page)
 {
	 
  $.ajax({
	
    url:"{{ URL::to('fetch_data') }}?page="+page,
	data:
		{
		
			id:$("#catId").val(),

		
        } ,
   
   success:function(data)
   {
    $('#all-cat').html(data);
   }
  });
 }
//dawnload calender
$('#downloadCurrentCalender').click(function() {
            var calender = $('input[name="calender"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'Current-Calender';
						link.href = calender;
						link.click();

		
		});
});


</script>
@endsection

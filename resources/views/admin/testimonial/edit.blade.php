@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Edit-Testimonials') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Testimonials</h6>
      <!-- <a href="add_cource.html" class="btn btn-dark" > add Course </a> -->
    </div>
    <div class="ms-panel-body">
      <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
          <form action="{{route('testimonial.update',$testimonial->id)}}" method="POST"  >
                {{ csrf_field() }}

                @method('PUT')

              <div class="ms-auth-container row">
     
          <div class="col-md-6">
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="exampleInputPassword1" for="exampleCheck1">* Name </label>
                      <input type="text" id="newTestimonials" name="reviewer_name" value="{{$testimonial->reviewer_name}}" class="form-control" placeholder="Name">
                  </div>
              </div>
              
              <div class="col-md-12" style=" opacity: 0.5;">
                  <div class="form-group">
                      <label>* your old rate</label>
                      @foreach(range(1,5) as $i)
									<div class="review-rating pull-right" style="display: inline-block;">
									@if($testimonial->reviewer_star_rate >=$i )
										<i class="fas fa-star"></i>
										@else
										<i class="fas fa-star empty" ></i>
										@endif
										
									</div>
                 
                  
									@endforeach
                  </div>
              </div>
                  <div class="col-md-12">
                  <label>* your new  rate</label>
                      <div class="stars" >
										<input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
										<input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
										<input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
										<input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
										<input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
									</div>
                  </div>
                
             
              <div class="col-md-12">
                  <div class="col-md-13">
                      <div class="form-group">
                          <label for="example">* Feed Back</label>
                          <div class="form-group">
                              <textarea class="content" name="reviewer_text">
                              {{$testimonial->reviewer_text}}
                              </textarea>
                          </div>
                      </div>
                  </div>
              </div>

      </div>
      <div class="input-group d-flex justify-content-end text-center">
        <a href="{{ route('testimonial.index') }}" class="btn btn-dark mx-2"> Cancel</a>
        <!-- <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close"> -->
        <input type="submit" value="Add" class="btn btn-success ">
      </div>
    </form>
    </div>
  </div>




</div>

</div>

@endsection
@section('scripts')
@endsection
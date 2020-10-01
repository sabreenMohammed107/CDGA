@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Home Slider') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>{{ __('titles.edit') }}</h6>

			</div>
			<div class="ms-panel-body col-md-6 col-md-offset-2">

				@if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif
</div>
<div class="col-md-12">  
<form action="{{route('slider.update',$slider->id)}}" method="POST"  >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}

@method('PUT')
<div class="col-md-12">
                        <div class="form-group">
                            
                              <div class="upload-icon">
                              
                                <i class="fas fa-video "></i>
                                <label> Home Video URL</label>
                              </div>
                          
                            <div class="input-group">
                            <input type="text" name="slider_video_url" value="{{$slider->slider_video_url}}" class="form-control" id="url-type-styled-input">
                        </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                              
                                <div class="upload-icon">
                                
                                  <i class="fas fa-video "></i>
                                  <label> Testimonials Video URL</label>
                                </div>
                            
                              <div class="input-group">
                              <input type="url"  class="form-control" value="{{$slider->testimonials_video_url}}" name="testimonials_video_url" id="url-type-styled-input">
                          </div>
                            </div>
                          </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>EN Tiltle</label>
                            <div class="input-group">
                              <input type="text" id="newCity" name="slider_en_title" value="{{$slider->slider_en_title}}" class="form-control" placeholder="title">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                              <label>EN Sub_title </label>
                              <div class="input-group">
                                <input type="text" id="newCity" name="slider_en_subtitle" value="{{$slider->slider_en_subtitle}}" class="form-control" placeholder="subtitle">
                              </div>
                            </div>
                          </div>

                        
                          <div class="col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="slider" name="slider"
                              checked>
                       <label for="slider">active slider</label>
                     </div>
                             
                            </div>
      
                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                        <a href="{{route('slider.index')}}"  class="btn btn-dark mx-2" >Cancel</a>
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
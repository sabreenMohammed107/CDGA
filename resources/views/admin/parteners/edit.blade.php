@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Partner') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>{{ __('Partner') }}</h6>
			
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
<form action="{{route('partener.update',$partener->id)}}" method="POST" enctype="multipart/form-data" >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}

@method('PUT')
                      <div class="col-md-3">
                          <div class="form-group">
                            <div id="img-upload" class="img-upload">
                              <img src="{{ asset('uploads/partners')}}/{{ $partener->partner_logo_url }}" alt="">
                              <div class="upload-icon">
                                <input type="file" name="pic" class="upload">
                                <i class="fas fa-camera  "></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      <div class="col-md-9">
                        <div class="form-group">
                          

                                
                            
                          <div class="upload-icon">
                          
                            
                            <label>website URL</label>
                          </div>
                      
                        <div class="input-group">
                        <input type="url" name="partner_website" value="{{$partener->partner_website}}"  class="form-control" id="url-type-styled-input">
                    </div>
                      </div>
                      </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>partner_name</label>
                            <div class="input-group">
                              <input type="text" id="newpartener" name="partner_name" value="{{$partener->partner_name}}" class="form-control" placeholder="partner">
                            </div>
                          </div> </div>
                         
                     
                        <div class="col-12">
                          <div class="custom-control custom-checkbox">
                          @if($partener->active == 1)
                          <input type="checkbox" id="partener" name="partener"
                            checked>
                          @else
                          <input type="checkbox" id="partener" name="partener"
                            >
                          @endif
                           
                     <label for="category">active </label>
                   </div>
                           
                          </div>
                    </div>
                    <div class="input-group d-flex justify-content-end text-center">
                      <a href="{{route('partener.index')}}"  class="btn btn-dark mx-2" >Cancel</a>
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
@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="#"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Edit-Calender') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  <?

  ?>
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Calender</h6>
                <!-- <a href="add_cource.html" class="btn btn-dark" > add Course </a> -->
              </div>
              <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                    @if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif
                <form action="{{route('yearCalender.update',$calender->id)}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}

@method('PUT')
                        <div class="ms-auth-container row">

                

                    <div class="col-md-6">
                    <label> Current Calender </label>
                    
                    <div class="fileUpload">
                        <div class="upload-icon">
                        <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
                     
                        <input type="file" name="fileCurrent" class="upload up" id="up" onchange="readURLFile(this);" />
                        <span class="upl" id="upload">{{$calender->current_year_calendar}}</span></div>
                      
                      </div>
                  </div>
              
                  <div class="col-md-6">
                    <label> Next Calender  </label>
                    
                    <div class="fileUpload">
                        <div class="upload-icon">
                        <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
                     
                        <input type="file" name="fileNext" class="upload up" id="up" onchange="readURLFile(this);" />
                        <span class="upl" id="upload">{{$calender->next_year_calendar}}</span></div>
                      
                      </div>
                </div>

                <div class="col-md-6">
                    <label>campany_profile </label>
                    
                    <div class="fileUpload">
                        <div class="upload-icon">
                        <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
                     
                        <input type="file" name="fileProfile" class="upload up" id="upprofile" onchange="readURLFile(this);" />
                        <span class="upl" id="upload">{{$calender->campany_profile}}</span></div>
                      
                      </div>
                </div>
             
                      
                     
                    
                    
                   

                 
                

                  



  
                     
                   
                <div class="input-group d-flex justify-content-end text-center">
                  <a href="{{ route('yearCalender.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                  <input type="submit" value="Add" class="btn btn-success ">
                </div>
              </form>
              </div>
            </div>
  
  
  
  
          </div>
  
        </div>
      </div>


@endsection
@section('scripts')

@endsection
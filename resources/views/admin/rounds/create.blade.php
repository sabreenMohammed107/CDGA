@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Add-Round') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Round</h6>
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
                <form action="{{route('round.store')}}" method="POST"  >
                {{ csrf_field() }}
              <div class="ms-auth-container row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label style="color:red">Courses *</label>
              <select name="course_id" id="test" class="form-control selectpicker" data-live-search="true" >
                <option value="">select....</option>
                @foreach ($courses as $course)
                                        <option value='{{$course->id}}' >
                                         {{ $course->course_en_name }}</option>
                                           @endforeach
              </select>
            </div>
          </div>
         
        
         
        
          
          <div class="col-md-6 mb-3">
          
          </div>
         
         
         
          <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Country</label>
                                      <select name="country_id" class="form-control  dynamic"   id="country" data-dependent="state" >
                                        <option value="">select....</option>
                                        @foreach ($countries as $country)
                                        <option value='{{$country->id}}' >
                                         {{ $country->country_en_name }}</option>
                                           @endforeach

                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Venue </label>
                                      <select name="venue_id" class="form-control "  id="state">
                                        <option value="">select....</option>
                                                                           
                                      </select>
                                    </div>
                                  </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label>Round Start Date </label>
              <input type="date" name="round_start_date" class="form-control"  >
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Round End Date </label>
              <input type="date" name="round_end_date" class="form-control" >
            </div>
          </div>
         

       
           

                
          <div class="col-md-6">
            <div class="form-group">
              <label class="exampleInputPassword1" for="exampleCheck1">Round Price </label>
              <input type="number" id="newClint" name="round_price" class="form-control" placeholder="Price" >
            </div>
          </div>
           
             
  

        

          <div class="col-md-6">
            <div class="form-group">
              <label>Currency </label>
              <select name="currency_id" class="form-control " data-show-subtext="true" data-live-search="true" id="">
                <option value="">select....</option>
                @foreach ($currencies as $currency)
                                        <option value='{{$currency->id}}' >
                                         {{ $currency->currency_name }}</option>
                                           @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label class="exampleInputPassword1" for="exampleCheck1">Round Place </label>
              <textarea type="number" id="newClint" name="round_place" class="form-control" placeholder="Round Place"></textarea>
            </div>
          </div>

          


          <div class="col-md-6">
            <div class="form-group">
              <label class="exampleInputPassword1" for="exampleCheck1">Show Home Order </label>
              <input type="number" id="newClint" name="show_home_order" class="form-control" placeholder="" >
            </div>
          </div>

          
          
          
          <div class="col-12">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" id="round" name="round"
                checked>
         <label for="category">active course</label>
       </div>
               
              </div>
         
          
    
      </div>
      <div class="input-group d-flex justify-content-end text-center">
        <a href="{{route('round.index')}}" class="btn btn-dark mx-2"> Cancel</a>
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
    url:"{{route('dynamic_dependentCountry.fetch')}}",
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
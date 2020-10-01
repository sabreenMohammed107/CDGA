@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Branches') }} </li>
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
                <form action="{{route('branch.update',$branch->id)}}" method="POST" >
                    <div class="ms-auth-container row">
                    {{ csrf_field() }}

                    @method('PUT')
                                    <div class="col-md-12">
                            <div class="form-group">
                              <label>branch_name</label>
                              <div class="input-group">
                                <input type="text" id="newbranch" name="branch_name" class="form-control"  value="{{$branch->branch_name}}">
                              </div>
                            </div> </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label>Email</label>
                              <div class="input-group">
                                <input type="email" id="newbranch" name="email" class="form-control" value="{{$branch->email}}" placeholder="Email Adress">
                              </div>
                            </div> </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>branch_Adress</label>
                                  <div class="input-group">
                                    <input type="text" id="newAdress" name="address" class="form-control"  value="{{$branch->address}}" >
                                  </div>
                                </div> </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>BranchCountry</label>
                                      <select name="country_id" class="form-control  dynamic" data-show-subtext="true" data-live-search="true" id="country" data-dependent="state" >
                                        <option value="">{{$branch->country->country_en_name}}</option>
                                        @foreach ($countries as $country)
                                        <option value='{{$country->id}}' >
                                         {{ $country->country_en_name }}</option>
                                           @endforeach

                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>BranchVenue </label>
                                      <select name="venue_id" class="form-control " data-show-subtext="true" data-live-search="true" id="state">
                                        <option value="">{{$branch->venue->venue_en_name}}</option>
                                                                           
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Office Phone</label>
                                      <div class="input-group">
                                        <input type="text" id="newPhone" name="office_phone" class="form-control" placeholder="phone" value="{{$branch->office_phone}}">
                                      </div>
                                    </div> </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Mobile</label>
                                          <div class="input-group">
                                            <input type="text" id="newMobile" name="mobile" class="form-control" placeholder="Mobile" value="{{$branch->mobile}}" >
                                          </div>
                                        </div> </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                
                      
                                                      
                                                  
                                              <div class="upload-icon">
                                              
                                                
                                                <label>Location URL</label>
                                              </div>
                                          
                                            <div class="input-group">
                                            <input type="url"  class="form-control" name="map_location" id="url-type-styled-input" value="{{$branch->map_location}}" placeholder="GPS Link">
                                        </div>
                                          </div>
                                        </div>
                       
                          <div class="col-12">
                            <div class="custom-control custom-checkbox">
                            @if($branch->active)
                              <input type="checkbox" id="activeBranch" name="active"
                              checked>
                              @else
                              <input type="checkbox" id="activeBranch" name="active"
                              >
                              @endif
                       <label >active </label>
                     </div>
                             
                            </div>
                            <div class="col-12">
                              <div class="custom-control custom-checkbox">
                              @if($branch->hq)
                                <input type="checkbox" id="hq" name="hq"
                                checked>
                                @else
                                <input type="checkbox" id="hq" name="hq"
                                >
                                @endif  
                         <label for="category">HQ</label>
                       </div>
                               
                              </div>
                             
                      </div>
                      
                      <div class="input-group d-flex justify-content-end text-center">
                        <a href="{{route('branch.index')}}"  class="btn btn-dark mx-2" >Cancel</a>
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
    url:"{{route('dynamicdependent.fetch')}}",
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
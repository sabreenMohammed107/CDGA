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
          <h6>ُBranches</h6>
          <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addbranch" >{{ __('Add Branch') }} </a>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                        <th>#</th>
                          <th>Branch Name</th>
                          <th>Address</th>
                          <th>Mobile</th>
                          <th>Venue</th>
                          <th>Active</th>
                          <th>HQ</th>
                          <th>Action</th>
                         
                        </thead>
                        <tbody>
                        @foreach($branches as $index=> $branch)
                        <tr>
                        <td>{{$index+1}}</td>
                          <td>{{$branch->branch_name}}</td>
                          <td>{{$branch->address}}</td>
                          <td>{{$branch->mobile}}</td>
                          <td>{{$branch->venue->venue_en_name}} - {{$branch->country->country_en_name}}</td>
                          
                          @if($branch->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif

                          @if($branch->hq == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif
                         
                          <td>
                            <a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-info d-inline-block" 
                            >edit</a>
                          <a href="#" onclick="destroy('this Branch','{{$branch->id}}')" class="btn d-inline-block btn-danger">delete</a>
                          <form id="delete_{{$branch->id}}" action="{{ route('branch.destroy', $branch->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
                          </td>
                        </tr>
      @endforeach
                        </tbody>
                      </table>
          </div>
        </div>
      </div>
    
     
  

</div>

</div>
<!-- Add branch Modal -->
<div class="modal fade" id="addbranch" tabindex="-1" role="dialog" aria-labelledby="addbranch">
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
             
            </button>
            <h3>Add branch</h3>
          
            <div class="modal-body">
    
             
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
                  <form action="{{route('branch.store')}}" method="POST" >
                    <div class="ms-auth-container row">
                   
                    {{ csrf_field() }}
  
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>branch_name</label>
                              <div class="input-group">
                                <input type="text" id="newbranch" name="branch_name" class="form-control" placeholder="branch">
                              </div>
                            </div> </div>
                            <div class="col-md-12">
                            <div class="form-group">
                              <label>Email</label>
                              <div class="input-group">
                                <input type="email" id="newbranch" name="email" class="form-control" placeholder="Email Address">
                              </div>
                            </div> </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>branch_Adress</label>
                                  <div class="input-group">
                                    <input type="text" id="newAdress" name="address" class="form-control" placeholder="Adress">
                                  </div>
                                </div> </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>BranchCountry</label>
                                      <select name="country_id" class="form-control  dynamic" data-show-subtext="true" data-live-search="true" id="country" data-dependent="state" >
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
                                      <label>BranchVenue </label>
                                      <select name="venue_id" class="form-control " data-show-subtext="true" data-live-search="true" id="state">
                                        <option value="">select....</option>
                                                                           
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Office Phone</label>
                                      <div class="input-group">
                                        <input type="text" id="newPhone" name="office_phone" class="form-control" placeholder="phone">
                                      </div>
                                    </div> </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Mobile</label>
                                          <div class="input-group">
                                            <input type="text" id="newMobile" name="mobile" class="form-control" placeholder="Mobile">
                                          </div>
                                        </div> </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                
                      
                                                      
                                                  
                                              <div class="upload-icon">
                                              
                                                
                                                <label>Location URL</label>
                                              </div>
                                          
                                            <div class="input-group">
                                            <input type="url"  class="form-control" name="map_location" id="url-type-styled-input" placeholder="GPS Link">
                                        </div>
                                          </div>
                                        </div>
                       
                          <div class="col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="activeBranch" name="active"
                              checked>
                       <label >active </label>
                     </div>
                             
                            </div>
                            <div class="col-12">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="hq" name="hq"
                                checked>
                         <label for="category">HQ</label>
                       </div>
                               
                              </div>
                             
                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                        <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                        <input type="submit" value="Add" class="btn btn-success ">
                      </div>
     </form>
          </div>
        </div>
      </div>
  
    </div>
  </div>
  </div>
  <!-- /Add branch Modal -->
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
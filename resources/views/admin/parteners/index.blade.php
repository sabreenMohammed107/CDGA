@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Partners') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>partners</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addpartener"> add partner </a>
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
                      <th>#</th>
                      <th>img</th>
                      
                      <th>partner Name </th>
                      <th>website</th>
                      <th>Active</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
  @foreach($Parteners as $index=> $Partener)
                      <tr>
                      <td>{{$index+1}}</td>
                        <td><img src="{{ asset('uploads/partners')}}/{{ $Partener->partner_logo_url }}" alt=""></td>
                        <td>{{$Partener->partner_name}}</td>
                        
                        <td><a href="www.google.com">{{$Partener->partner_website}}</a></td>

                        @if($Partener->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif

                        <td>
                          <a href="{{ route('partener.edit', $Partener->id) }}" class="btn btn-info d-inline-block" 
                          >edit</a>
                        <a href="#" onclick="destroy('this Partner','{{$Partener->id}}')"  class="btn d-inline-block btn-danger">delete</a>
                        <form id="delete_{{$Partener->id}}" action="{{ route('partener.destroy', $Partener->id) }}"  method="POST" style="display: none;">
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
     
    <!-- Add SubCat Modal -->
    <div class="modal fade" id="addpartener" tabindex="-1" role="dialog" aria-labelledby="addpartener">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add partner</h3>
        
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
                <form action="{{route('partener.store')}}" method="POST" enctype="multipart/form-data" >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}
                      <div class="col-md-3">
                          <div class="form-group">
                            <div  id="img-upload" class="img-upload">
                              <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
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
                        <input type="url" name="partner_website" class="form-control" id="url-type-styled-input">
                    </div>
                      </div>
                      </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>partner_name</label>
                            <div class="input-group">
                              <input type="text" id="newpartener" name="partner_name" class="form-control" placeholder="partner">
                            </div>
                          </div> </div>
                         
                     
                        <div class="col-12">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="partener" name="partener"
                            checked>
                     <label for="category">active</label>
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
<!-- /Add Sub Modal -->
@endsection
@section('scripts')

@endsection
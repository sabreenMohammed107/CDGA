@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Clients') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Clients</h6>
      <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> add client </a>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
          <thead>
          <th>#</th>
            <th>img</th>
            
            
            <th>client Name </th>
            <th>website</th>
            <th>Active</th>
            <th>Action</th>
          </thead>
          <tbody>
@foreach($clients as $index=> $client)
            <tr>
            <td>{{$index+1}}</td>
              <td><img src="{{ asset('uploads/clients')}}/{{ $client->client_logo_url }}" alt=""></td>
              <td>{{$client->client_name}}</td>
              
              <td><a href="www.google.com">{{$client->client_website}}</a></td>
              @if($client->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif
              

              <td>
                <a href="{{ route('client.edit', $client->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this Client','{{$client->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$client->id}}" action="{{ route('client.destroy', $client->id) }}"  method="POST" style="display: none;">
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
<div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add client</h3>
        
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
        <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data" >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}
                      <div class="col-md-3">
                          <div class="form-group">
                            <div id="img-upload" class="img-upload">
                              <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                              <div class="upload-icon">
                                <input type="file" name="pic" class="upload">
                                <i class="fas fa-camera    "></i>
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
                        <input type="url" name="client_website"  class="form-control" id="url-type-styled-input">
                    </div>
                      </div>
                      </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>client_name</label>
                            <div class="input-group">
                              <input type="text" name="client_name" id="newClient" class="form-control" placeholder="client">
                            </div>
                          </div> </div>
                         
                     
                        <div class="col-12">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="client" name="client"
                            checked>
                     <label for="category">active Client</label>
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
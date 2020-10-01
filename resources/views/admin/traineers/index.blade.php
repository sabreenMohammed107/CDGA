@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Trainers') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Trainers</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> add new </a>
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
				  	<thead>
				  	<th>#</th>
				  	<th>Trainer image </th>
				  	<th>Trainer name</th>
				  	<th>Trainer Desc</th>
				  	<th>Action</th>
                    </thead>
                    <tbody>
                 
  @foreach($trainers as $index => $trainer)
                      <tr>
					  	<td>{{ $index +1 }}</td>
                        <td><img src="{{ asset('uploads/trainers')}}/{{ $trainer->trainer_image }}" alt=""></td>
                        
					  	<td>{{ $trainer->trainer_name}}</td>
                        <td><p>
                        {{ $trainer->trainer_desc}}</p>
                  
                        </td>
                        

                        <td>
                        <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this Trainer','{{$trainer->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$trainer->id}}" action="{{ route('trainer.destroy', $trainer->id) }}"  method="POST" style="display: none;">
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
          <!-- Add Img Modal -->
	<div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
		<div class="modal-dialog modal-lg " role="document">
			<div class="modal-content">
				<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
					X

				</button>
				<h3>Add Trainer</h3>

				<div class="modal-body">


					<div class="ms-auth-container row no-gutters">
						<div class="col-12 p-3">
							<form action="{{route('trainer.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
								<div class="ms-auth-container row">
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
												<label>Name</label>
											</div>
											<div class="input-group">
												<input type="text" name="trainer_name" class="form-control" placeholder="Name">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Image</label>
											<div class="form-group">
												<div class="upload-icon">
													<label>Description</label>
												</div>
												<div class="input-group">
													<textarea class="form-control" name="trainer_desc" placeholder="Description" rows="5"></textarea>
												</div>
											</div>
										</div>
									</div>


									<!--<div class="col-12">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="client" name="client"
												   checked>
											<label for="category">active</label>
										</div>

									</div>-->
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
  
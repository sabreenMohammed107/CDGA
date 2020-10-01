@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Edit-Trainers') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
				<div class="col-md-12">
					<div class="ms-panel">
						<div class="ms-panel-header d-flex justify-content-between">
							<h6>Trainers</h6>
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
                <form action="{{route('trainer.update',$trainer->id)}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}

                @method('PUT')
										<div class="ms-auth-container row">
										
												<div class="col-md-6">
													<div class="col-md-12">
														<label> img_trainer </label>
														<div class="form-group">
															<div class="img-upload">
																<img src="{{ asset('uploads/trainers')}}/{{ $trainer->trainer_image }}" alt="">
																<div class="upload-icon">
																	<input type="file" name="pic" class="upload">
																	<i class="fas fa-camera    "></i>
																</div>
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label class="exampleInputPassword1" for="exampleCheck1">* Name </label>
															<input type="text" id="newCourse" name="trainer_name" class="form-control" value="{{$trainer->trainer_name}}" placeholder="name">
														</div>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label>* Description</label>
														<div class="input-group">
															<textarea  id="" rows="7" name="trainer_desc" class="form-control" placeholder="Description">{{$trainer->trainer_desc}}</textarea>
														</div>
													</div>
												</div>

											
										</div>
										<div class="input-group d-flex justify-content-end text-center">
											<a href="{{ route('trainer.index') }}" class="btn btn-dark mx-2"> Cancel</a>
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

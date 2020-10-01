@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('View Applicant Speaker') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Applicants</h6>
    </div>
    <div class="ms-panel-body">
      <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            <form action="">
                <div class="ms-auth-container row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">First Name</label>
                            <input type="text" value="{{$speaker->frist_name}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Last Name</label>
                            <input type="text" value="{{$speaker->last_name}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Salution</label>
                            <div class="input-group">
                            <input type="text" value="{{$speaker->salut->en_name}}" class="form-control"disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Email</label>
                            <input type="email" value="{{$speaker->email}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Mobile</label>
                            <input type="tel" value="{{$speaker->mobile}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Phone</label>
                            <input type="tel" value="{{$speaker->phone}}" class="form-control"disabled>
                        </div>
                    </div>


                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country  </label>
                            <div class="input-group">
                            <input type="text" value="{{$speaker->country->country_en_name}}" class="form-control"disabled>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Venue </label>
                            <div class="input-group">
                            <input type="text" value="{{$speaker->venue->venue_en_name}}" class="form-control"disabled>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example">Address </label>
                            <div class="form-group">
                                <textarea class="" name="example" disabled>{{$speaker->address}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example2">Other info</label>
                            <div class="form-group">
                                <textarea class="" name="example2"disabled>{{$speaker->other_data}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label> CV Link  </label>

                        <div class="fileUpload">
                            <div class="upload-icon">
                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                <input type="file" class="upload up" id="up" onchange="readURLFile(this);"disabled />
                                <span class="upl" id="upload">{{ $speaker->cv_path }}</span>
                                <input type="hidden" name="brochure" value="{{ asset('uploads/courseBrochure')}}/{{ $speaker->cv_path  }}" alt="{{  $speaker->cv_path  }}" />

                            </div>
                        </div>
                        <a id="downloadButton" class="btn btn-large pull-right"><i class="fas fa-download"></i>Download </a>

                    </div>
                    <div class="col-md-6">
                        <label> Doc Link  </label>

                        <div class="fileUpload">
                            <div class="upload-icon">
                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                <input type="file" class="upload up" id="up" onchange="readURLFile(this);"disabled />
                                <span class="upl" id="upload">{{ $speaker->doc_path }}</span>
                                <input type="hidden" name="brochureFile" value="{{ asset('uploads/courseBrochure')}}/{{ $speaker->doc_path  }}" alt="{{  $speaker->doc_path  }}" />

                            </div>

                        </div>
                        <a id="downloadFileButton" class="btn btn-large pull-right"><i class="fas fa-download"></i>Download </a>

                    </div>
                </div>
                <div class="input-group d-flex justify-content-end text-center">
                    <a href="{{ route('appl.index') }}" class="btn btn-dark d-inline-block">Cancel</a>
                  <!--<input type="submit" value="Add" class="btn btn-success ">-->
                </div>
                </form>
              </div>
          </div>
  
  
  
  
        </div>
  
      </div>

      <div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs " role="tablist">
						<li class="btn btn-light test">
							<a href="#tab_default_1" class="active" data-toggle="tab" role="tab">
								Expertises
							</a>
						</li>

						<li class="btn btn-light ">
							<a href="#tab_default_3" data-toggle="tab" role="tab">
								Training Courses
							</a>
						</li>
					</ul>
					<div class="tab-content test ">
						<div class="tab-pane active" id="tab_default_1">
							<!-- Add Expertises -->
							<div class="row">
								<div class="col-md-12">
									<div class="ms-panel">
										<div class="ms-panel-header d-flex justify-content-between">
											<!--<button class="btn btn-dark" data-toggle="modal" data-target="#addCat"> Add Expertises </button>-->
										</div>
										<div class="ms-panel-body">

											<div class="table-responsive">
												<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
													<thead>
														<tr>
															<th>#</th>
															<th>Expertise Name </th>
														</tr>
													</thead>
													<tbody>
                                                    @foreach($speakerExpers->expertise as $index => $speakerExper)
							                          <tr>
                                                     <td>{{ $index +1 }}</td>
													

															<td><p>{{$speakerExper->text}}</p></td>
															
														</tr>
                                                        @endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Expertises-->
						</div>

						<div class="tab-pane" id="tab_default_3">
							<!-- Add Training Courses  -->
							<div class="row">
								<div class="col-md-12">
									<div class="ms-panel">
										<div class="ms-panel-header d-flex justify-content-between">
											<!--<button class="btn btn-dark" data-toggle="modal" data-target="#addfeatures"> Add Training Courses </button>-->
										</div>
										<div class="ms-panel-body">

											<div class="table-responsive">
												<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
													<thead>
														<tr>
															<th>#</th>
															<th>Course Name </th>
														</tr>
													</thead>
													<tbody>
                                                    @foreach($speakerCourses->course as $index => $speakerCourse)
							                          <tr>
                                                     <td>{{ $index +1 }}</td>
													

															<td><p>{{$speakerCourse->name}}</p></td>
															
														</tr>
                                                        @endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Training Courses -->
						</div>
					</div>
					</div>
				</div>
			</div>
            <hr>
     
</div>

@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		$('#downloadButton').click(function() {
            var brochure = $('input[name="brochure"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'applicant-cv';
						link.href = brochure;
						link.click();

		
		});

        $('#downloadFileButton').click(function() {
            var brochure = $('input[name="brochureFile"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'applicant-File';
						link.href = brochure;
						link.click();

		
		});
	});
</script>
@endsection
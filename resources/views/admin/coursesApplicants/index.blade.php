@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
		<li class="breadcrumb-item active" aria-current="page"> {{ __('Courses Applicants') }} </li>
	</ol>
</nav>

@endsection

@section('content')
<div class="row">

	<div class="col-md-12">



		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>Courses Applicants</h6>
			</div>
			<div class="ms-panel-body">
				<div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Full Name</th>
								<th>Course Name</th>
								<th>Register Type</th>
								<th>Register Date</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tbody>
						@foreach($applicants as $index => $applicant)
							<tr>
								<td>
									<p>{{ $index +1 }}</p>
								</td>
								<td>
									<p>{{$applicant->name}}</p>
								</td>
								<td>
									@if($applicant->course_id !=null)
									<p>{{$applicant->courses->course_en_name}}</p>
									@else
									<p></p>

									@endif
								</td>

								<td>
									<p>
										<?php $zero = '';

										if ($applicant->applicant_type_id == 0) {
											$zero = 'REGISTER ROUND';
										}
										if ($applicant->applicant_type_id == 1) {
											$zero = 'DOWNLOAD BROCHURE FOR COURSE';
										}
										if ($applicant->applicant_type_id == 2) {
											$zero = 'QUICK ENQUERY';
										}
										if ($applicant->applicant_type_id == 3) {
											$zero = 'INHOUSE COURSE REQUEST';
										}
										if ($applicant->applicant_type_id == 4) {
											$zero = 'BEST OFFERS COURSE';
										}

										?>

										{{$zero}}</p>
								</td>
								<td>
									<p> <?php $date = date_create($applicant->created_at) ?>
										{{ date_format($date,"d-m-Y") }}</p>
								</td>

								<td>
									<a href="#" class="btn btn-dark d-inline-block" data-toggle="modal" data-target="#editclient{{$applicant->id}}">View</a>

									<a href="#" onclick="destroy('this Course Applicant','{{$applicant->id}}')" class="btn d-inline-block btn-danger">delete</a>
									<form id="delete_{{$applicant->id}}" action="{{ route('applCourse.destroy', $applicant->id) }}" method="POST" style="display: none;">
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
@foreach($applicants as $index => $applicant)
	<!-- View Expertise Modal -->
	<div class="modal fade" id="editclient{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="editclient">
							<div class="modal-dialog modal-lg " role="document">
								<div class="modal-content">
									<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

									</button>
									<h3>View Courses Applicants</h3>
									<div class="modal-body">
										<div class="ms-auth-container row no-gutters">
											<div class="col-12 p-3">
												<form action="">
													<div class="ms-auth-container row">
														<div class="col-md-12">
															<h3>Course Data</h3>

														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Full Name </label>
																<input type="text" id="newjob-name" value="{{$applicant->name}}" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Course Name</label>
																@if($applicant->course_id !=null)
																<input type="text" class="form-control" value="{{$applicant->courses->course_en_name}}" disabled>
																@else
																<input type="text" class="form-control" value="" disabled>

																@endif
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Register Type</label>
																<?php $zero = '';

																if ($applicant->applicant_type_id == 0) {
																	$zero = 'REGISTER ROUND';
																}
																if ($applicant->applicant_type_id == 1) {
																	$zero = 'DOWNLOAD BROCHURE FOR COURSE';
																}
																if ($applicant->applicant_type_id == 2) {
																	$zero = 'QUICK ENQUERY';
																}
																if ($applicant->applicant_type_id == 3) {
																	$zero = 'INHOUSE COURSE REQUEST';
																}
																if ($applicant->applicant_type_id == 4) {
																	$zero = 'BEST OFFERS COURSE';
																}

																?>
																<input type="text" class="form-control" value="{{$zero}}" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Register date</label>
																<?php $date = date_create($applicant->created_at) ?>

																<input type="text" id="newjob-title" value=" {{ date_format($date,'d-m-Y') }}" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Country</label>
																@if($applicant->country_id !=null)
																<input type="text" id="newClint" class="form-control" value="{{$applicant->country->country_en_name}}" disabled>
																@else
																<input type="text" class="form-control" value="" disabled>

																@endif
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">City</label>
																@if($applicant->venue_id !=null)
																<input type="text" class="form-control" value="{{$applicant->venues->venue_en_name}}" disabled>
																@else
																<input type="text" class="form-control" value="" disabled>

																@endif
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Job Title</label>
																<input type="text" class="form-control" value="{{$applicant->job_title}}" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="example2">Address</label>
																<div class="form-group">
																	<textarea class="" name="example2" rows="3" style="width:100%" disabled>{{$applicant->address}}</textarea>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Company</label>
																<input type="text" id="newjob-title" class="form-control" value="{{$applicant->company}}" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Phone</label>
																<input type="number" id="newClint" class="form-control" value="{{$applicant->phone}}" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Fax</label>
																<input type="text" class="form-control" value="{{$applicant->fax}}" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="exampleInputPassword1" for="exampleCheck1">Email</label>
																<input type="text" class="form-control" value="{{$applicant->email}}" disabled>
															</div>
														</div>


														<div class="col-md-12">
															<h3>In house enquery title</h3>

														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label for="example2">Enquery Notes</label>
																<div class="form-group">
																	<textarea class="" name="example2" rows="3" style="width:100%" disabled>{{$applicant->quk_enquery_notes}}</textarea>
																</div>
															</div>
														</div>


														<div class="col-md-12">
															<h3>In house enquery title</h3>
														</div>

														<div class="col-md-12">
															<div class="row">
																<div class="col-md-6">
																	<div class="col-md-12">
																		<div class="form-group">
																			<label class="exampleInputPassword1" for="exampleCheck1">No Days</label>
																			<input type="text" class="form-control" value="{{$applicant->inhouse_no_days}}" disabled>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group">
																			<label class="exampleInputPassword1" for="exampleCheck1">No Participants</label>
																			<input type="text" class="form-control" value="{{$applicant->inhouse_no_particants}}" disabled>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="form-group">
																			<label class="exampleInputPassword1" for="exampleCheck1">Preferred Dates</label>
																			<input type="text" class="form-control" value="{{$applicant->inhouse_perefer_dates}}" disabled>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="col-md-12">
																		<div class="form-group">
																			<label for="example2">Inhouse Requirements</label>
																			<div class="form-group">
																				<textarea class="" name="example2" rows="10" style="width:100%" disabled>{{$applicant->inhouse_requirements}}</textarea>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>



													</div>




													<div class="input-group d-flex justify-content-end text-center">
														<input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
													</div>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

						<!--  Setup  -->

						@endforeach
						@endsection
@section('scripts')

@endsection
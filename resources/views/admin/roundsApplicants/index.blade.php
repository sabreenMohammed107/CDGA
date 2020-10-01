@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Rounds Applicants') }} </li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Rounds Applicants</h6>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
          <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Full Name</th>
                      <th>Course Name</th>
                      <th>Register Date</th>
                      <th>Round Date</th>
                      <th>Round City</th>
                      <th>Action</th>
                  </tr>
              </thead>
			
              <tbody>
			  @foreach($applicants as $index => $applicant)
                  <tr>
                      <td><p>{{$index +1 }}</p></td>
                      <td><p>{{$applicant->name}}</p></td>
                      <td>
					       @if($applicant->register_round_id !=null)
                                <p>{{$applicant->round->course->course_en_name}}</p>
                                @else
                                <p></p>

                                @endif
					  </td>
                      <td><p> <?php $date = date_create($applicant->created_at) ?>
                                    {{ date_format($date,"d-m-Y") }}</p></td>
                      <td>
					  @if($applicant->register_round_id !=null)
					  <p>
					  <?php $dateRound = date_create($applicant->round->round_start_date) ?>
					  {{ date_format($dateRound,"d-m-Y") }}</p>
					  @else
                                <p></p>

                                @endif
					  </td>
                      <td><p>{{$applicant->venues->venue_en_name}}</p></td>

                      <td>
                          <a href="#" class="btn btn-dark d-inline-block" data-toggle="modal"data-target="#editclient{{$applicant->id}}">View</a>
                          
						  <a href="#" onclick="destroy('this Course Applicant','{{$applicant->id}}')"  class="btn d-inline-block btn-danger">delete</a>
                        <form id="delete_{{$applicant->id}}" action="{{ route('applRound.destroy', $applicant->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>				                      </td>
                  </tr>

            
         

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
						<h3>Personal Data</h3>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">#</label>
							<input type="text" class="form-control" value="{{$index+1}}" >
						</div>
					</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Full Name </label>
								<input type="text" id="newjob-name" value="{{$applicant->name}}" class="form-control" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Register date</label>
								<?php $date = date_create($applicant->created_at) ?>
								<input type="text" value=" {{ date_format($date,'d-m-Y') }}" class="form-control" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Course Name</label>
								@if($applicant->register_round_id !=null)
								<input type="text" class="form-control" value="{{$applicant->round->course->course_en_name}}" disabled>

                                @else
								<input type="text" class="form-control" value=" " disabled>


                                @endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Round Date</label>
								@if($applicant->register_round_id !=null)
					  
					  <?php $dateRound = date_create($applicant->round->round_start_date) ?>
					  
					  <input type="text" id="newjob-title" class="form-control" value="{{ date_format($dateRound,'d-m-Y') }}" disabled>
					  @else
					  <input type="text" id="newjob-title" class="form-control" disabled>

                                @endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Round City</label>
								@if($applicant->register_round_id !=null)
								<input type="text" class="form-control" value="{{$applicant->round->venue->venue_en_name}}" disabled>
                                @else
                                <input type="text" class="form-control" value="" disabled>

                                @endif
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Country</label>
								@if($applicant->country_id !=null)
								<input type="text" id="newClint" class="form-control" value="{{$applicant->country->country_en_name}}" disabled >
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
							<label for="example2">Address</label>
							<div class="form-group">
								<textarea class="" name="example2" rows="3" style="width:100%" disabled>{{$applicant->address}}</textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Job Title</label>
							<input type="text" id="newjob-title" value="{{$applicant->job_title}}" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Company</label>
							<input type="number" id="newClint" value="{{$applicant->company}}" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Phone</label>
							<input type="text" value="{{$applicant->phone}}" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Email</label>
							<input type="text" class="form-control" value="{{$applicant->email}}" disabled >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Fax</label>
							<input type="text" class="form-control" value="{{$applicant->fax}}" disabled >
						</div>
					</div>
					<div class="col-md-12">
						<h3>Billing Data</h3>
						</div>
						<?php $billing=\App\Models\BillingDetails::where('applicant_id', '=', $applicant->id)->first();
						  ?>
						  @if($billing !=null)
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Full Name </label>
							<input type="text" id="newjob-name" value="{{$billing->name}}" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Salution</label>
							@if($billing->salut_id !=null)

							<input type="text" class="form-control" value="{{$billing->salut->en_name}}" >
							@else
                                <input type="text" class="form-control" value="" disabled>

                                @endif
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Country</label>
							@if($billing->country_id !=null)
								<input type="text" id="newClint" class="form-control" value="{{$billing->country->country_en_name}}" disabled >
                                @else
                                <input type="text" class="form-control" value="" disabled>

                                @endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">City</label>
							@if($billing->venue_id !=null)
								<input type="text" class="form-control" value="{{$billing->venues->venue_en_name}}" disabled>
                                @else
                                <input type="text" class="form-control" value="" disabled>

                                @endif
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Job Title</label>
							<input type="text" class="form-control" value="{{$billing->job_title}}" disabled >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Company</label>
							<input type="text" class="form-control" value="{{$billing->company}}" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="example2">Address</label>
							<div class="form-group">
								<textarea class="" name="example2" rows="3" style="width:100%" disabled >{{$billing->address}}</textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Phone</label>
							<input type="text" id="newjob-title" class="form-control" value="{{$billing->phone}}" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Email</label>
							<input type="email" id="newClint" class="form-control" value="{{$billing->email}}" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Fax</label>
							<input type="text" class="form-control" value="{{$billing->fax}}" disabled>
						</div>
					</div>
					

					</div>



@endif
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
	  </tbody>
	  </table>
      </div>
    </div>
  </div>




</div>

</div>

@endsection
@section('scripts')

@endsection
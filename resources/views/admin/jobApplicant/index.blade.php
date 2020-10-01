@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Jobs Applicants') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Jobs Applicants</h6>
               
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
					<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Job Title</th>
								<th>Creation Date</th>
								<th>Expected Salary</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($jobApplicants as $index => $jobApplicant)
							<tr>
                            <td>{{ $index +1 }}</td>
								<td><p>{{$jobApplicant->name}}</p></td>
								<td><p>{{$jobApplicant->career->job_name}}</p></td>
								<td><p> <?php $date = date_create($jobApplicant->created_at) ?>
                                    {{ date_format($date,"d-m-Y") }}</p></td>
								<td><p>{{$jobApplicant->expected_salary}}</p></td>

								<td>
                                <a href="{{ route('jobApplicant.edit', $jobApplicant->id) }}" class="btn btn-info d-inline-block" 
                >View</a>
                <a href="#" onclick="destroy('this jobApplicant','{{$jobApplicant->id}}')"  class="btn d-inline-block btn-danger">delete</a>
	
                <form id="delete_{{$jobApplicant->id}}" action="{{ route('jobApplicant.destroy', $jobApplicant->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>     								</td>
							</tr>
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
@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}" ><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Applicants Speaker') }} </li>
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
								<th>First Name</th>
								<th>Last Name</th>
								<th>Salution</th>
								<th>Country</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($speakers as $index => $speaker)
							<tr>
                            <td>{{ $index +1 }}</td>
                            <td><p>{{$speaker->frist_name}}</p></td>
								<td><p>{{$speaker->last_name}}</p></td>
								<td><p>{{$speaker->salut->en_name}}</p></td>
								<td><p>{{$speaker->country->country_en_name}}</p></td>
								<td>
                                <a href="{{ route('appl.edit', $speaker->id) }}" class="btn btn-info d-inline-block" 
                >View</a>
                <a href="#" onclick="destroy('this Applicant Speaker','{{$speaker->id}}')"  class="btn d-inline-block btn-danger">delete</a>
	
                <form id="delete_{{$speaker->id}}" action="{{ route('appl.destroy', $speaker->id) }}"  method="POST" style="display: none;">
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
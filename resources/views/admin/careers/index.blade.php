@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Available Jobs') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

            <div class="col-md-12">
    
    
    
              <div class="ms-panel">
                <div class="ms-panel-header d-flex justify-content-between">
                  <h6>Available Jobs</h6>
                  <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat"> add new </a>
                </div>
			  	<div class="ms-panel-body">
			  		<div class="table-responsive">
			  			<table id="testimonials" class="dattable table table-striped thead-dark  w-100">
			  				<thead>
								  <tr>
			  				<th>#</th>
			  				<th>Job Title</th>
			  			
			  				<th>Creation Date</th>
			  				<th>Active</th>
			  				<th>Action</th>
								  </tr>
			  				</thead>
			  				<tbody>
@foreach($careers as $index => $career)
			  					<tr>
			  						<td>{{ $index +1 }}</td>
			  						<td><p>{{$career->job_name}}</p></td>
			  					
			  						<td>
                                      <?php $date = date_create($career->created_at) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                      </td>
			  						<td>
                                      @if($career->active == 1)
                          <i class="fas fa-check"></i>
                          @else
                          <i class="fas fa-times"></i>
                          @endif
                                      </td>
			  						<td>
                                      <a href="{{ route('career.edit', $career->id) }}" class="btn btn-info d-inline-block" 
                                      >edit</a>
                                        <a href="#" onclick="destroy('this Career','{{$career->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                         <form id="delete_{{$career->id}}" action="{{ route('career.destroy', $career->id) }}"  method="POST" style="display: none;">
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

          <!-- Add Available Jobs Modal -->
      <div class="modal fade" id="addSubCat" tabindex="-1" role="dialog" aria-labelledby="addSubCat">
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
             
            </button>
            <h3>Add Jobs</h3>
            <div class="modal-body">
    
             
              <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                <form action="{{route('career.store')}}" method="POST" >
                            {{ csrf_field() }}
                    <div class="ms-auth-container row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Job Title</label>
                              <div class="input-group">
                                <input type="text" id="newTes" name="job_name" class="form-control" placeholder="name">
                              </div>
                            </div> </div>
						
                        
                      
                          <div class="col-md-12">
							<div class="col-md-12">
								<div class="form-group">
									<label for="example">* Description</label>
									<div class="form-group">
										<textarea class="content" name="job_requirements" >
										</textarea>
									</div>
								</div>
							</div>
						</div>
						
                            <div class="col-12">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="career" name="career"
                                checked>
                         <label for="career">Active</label>
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
  <!-- /Add Available Jobs Modal -->

  @endsection
@section('scripts')

@endsection
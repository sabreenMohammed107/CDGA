@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Testimonials') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

            <div class="col-md-12">
    
    
    
              <div class="ms-panel">
                <div class="ms-panel-header d-flex justify-content-between">
                  <h6>Testimonials</h6>
                  <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat"> add new </a>
                </div>
			  	<div class="ms-panel-body">
			  		<div class="table-responsive">
			  			<table id="testimonials" class="dattable table table-striped thead-dark  w-100">
			  				<thead>
                  <th>#</th>
			  				<th>Name</th>
			  				<th>Star Rate</th>
			  				<th>Feedback</th>
			  			
			  			
			  				<th>Action</th>
			  				</thead>
			  				<tbody>
@foreach($testimonials as $index=> $testimonial)
			  					<tr>
                  <td>{{$index+1}}</td>
			  						<td> {{$testimonial->reviewer_name}} </td>
			  						<td>
                                      @foreach(range(1,5) as $i)
									<div class="review-rating pull-right" style="display: inline-block;">
									@if($testimonial->reviewer_star_rate >=$i )
										<i class="fas fa-star"></i>
										@else
										<i class="fas fa-star empty" ></i>
										@endif
										
									</div>
									@endforeach
                                    </td>
			  						<td><p>
                                      {{$testimonial->reviewer_name}}</p>
                                      </td>
			  					
			  					
			  						<td>
                                      <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this Testimonial','{{$testimonial->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$testimonial->id}}" action="{{ route('testimonial.destroy', $testimonial->id) }}"  method="POST" style="display: none;">
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
<div class="modal fade" id="addSubCat" tabindex="-1" role="dialog" aria-labelledby="addSubCat">
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
             
            </button>
            <h3>Add Testimonials</h3>
            <div class="modal-body">
    
             
              <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                  <form action="{{route('testimonial.store')}}" method="POST" >
                            {{ csrf_field() }}
                    <div class="ms-auth-container row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Name</label>
                              <div class="input-group">
                                <input type="text" id="newTes" name="reviewer_name" class="form-control" placeholder="name">
                              </div>
                            </div> </div>
						
                              
						
                        
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Feed Back</label>
                              <div class="input-group">
                               <textarea name="reviewer_text" id="" rows="4" class="form-control" placeholder="Feed Back"></textarea>
                              </div>
                            </div>
                          </div>
                          
						<div class="col-md-12">
							<div class="form-group">
                            <label>* Rate</label>
                            <div class="stars" >
										<input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
										<input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
										<input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
										<input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
										<input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
									</div>
							

								
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
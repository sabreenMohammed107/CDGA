@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Email NewsLetter') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Email News Letter</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> add new </a>
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead><tr>
	<th>#</th>

	<th>Email </th>
	<th>Register Date</th>
	<th>Action</th>
</tr>
                    </thead>
                 
                    <tbody>
                    @foreach($letters as $index => $letter)
                      <tr>
					  	<td>{{ $index +1 }}</td>
                        <td><p>{{ $letter->email}}</p></td>
                        
                        
                        <td>
                        <?php $date = date_create($letter->created_at) ?>
                                    {{ date_format($date,"d-m-Y") }}
                      </td>


                        <td>
                        <a  data-toggle="modal" data-target="#editTitle{{ $letter->id }}" class="btn d-inline-block btn-info">{{ __('Edit') }}</a>
                        <a href="#" onclick="destroy('this Letter','{{$letter->id}}')"  class="btn d-inline-block btn-danger">delete</a>
                        <form id="delete_{{$letter->id}}" action="{{ route('newsLetter.destroy', $letter->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
                        </td>
                      </tr>


                    <div class="modal fade" id="editTitle{{ $letter->id }}" tabindex="-1" role="dialog" aria-labelledby="editTitle">

<div class="modal-dialog modal-lg " role="document">
  <div class="modal-content">

    <div class="modal-body">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
       
              <form action="{{route('newsLetter.update',$letter->id) }}" method="POST">
              @csrf
        @method('PUT')
                  <div class="ms-auth-container row">

                  <div class="col-md-12">
						<div class="form-group">
							<label>Email</label>
							<div class="form-group">
								<div class="input-group">
									<input type="email" name="email" value="{{$letter->email}}" class="form-control" placeholder="email">
								</div>
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
@endforeach

</tbody>
                  </table>
                </div>
              </div>
            </div>
  
  
  
  
          </div>
  
        </div>
        <!-- Add Email NewsLetter Modal -->
    <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add Email NewsLetter</h3>
        
          <div class="modal-body">
  
           
            <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
			  	 <form action="{{route('newsLetter.store') }}" method="POST">
			  		<div class="ms-auth-container row">
            @csrf
			  			<div class="col-md-12">
			  				<div class="form-group">
			  					<label>Email</label>
			  					<div class="form-group">
			  						<div class="input-group">
			  							<input type="email" name="email" class="form-control" placeholder="email">
			  						</div>
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
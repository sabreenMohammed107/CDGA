@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Bts-Numbers') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
    <h6>BTS_numbers</h6>
        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addnumber"> add BTS_numbers </a>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
          <thead>
            <th>#</th>
            <th>en_name</th>
             <th>value</th>
            <th>Active</th>
            <th>Action</th>
          </thead>
          <tbody>
@foreach($numbers as $index => $number)
            <tr>
            <td>{{$index+1}}</td>
              <td>{{$number->bts_number_en_name}}</td>
              
              <td>{{$number->bts_number_value}}</td>
            
              @if($number->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif
              <td>
                <a href="{{ route('number.edit', $number->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this Number','{{$number->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$number->id}}" action="{{ route('number.destroy', $number->id) }}"  method="POST" style="display: none;">
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
   <div class="modal fade" id="addnumber" tabindex="-1" role="dialog" aria-labelledby="addnumber">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add number</h3>
        
          <div class="modal-body">
  
           
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
                <form action="{{route('number.store')}}" method="POST"  >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Number_en_name</label>
                            <div class="input-group">
                              <input type="text" id="newnumber" name="bts_number_en_name" class="form-control" placeholder="number">
                            </div>
                          </div>
                         </div>
                    
                         
                       
                          <div class="col-md-8">
                            <div class="form-group">
                              <label>Number_value</label>
                              <div class="input-group">
                                <input type="number" id="newnumber" name="bts_number_value" class="form-control" placeholder="number">
                              </div>
                            </div>
                           </div>
                           <div class="col-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="numbers" name="numbers"
                              checked>
                       <label for="category">active Number</label>
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
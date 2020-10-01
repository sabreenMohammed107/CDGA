@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Sub Category') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
    <h6>Sub_Categories</h6>
      <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat"> add new </a>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
      <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                      <thead>
                      <th>#</th>
                        <th>Sub Category Code</th>
                        
                        <th>subCategory Name </th>
                        <th>parent-Category</th>
                        
                        
                        <th>Action</th>
                      </thead>
                      <tbody>
                     @if($subCategories !=null)
                      @foreach($subCategories as $index=> $sub)
                        <tr>
                        <td>{{$index+1}}</td>
                          <td>{{$sub->subcategory_code}}</td>
                          <td>{{$sub->subcategory_en_name}}</td>
                          
                          <td>{{$sub->courseCategory->category_en_name}}</td>
                         
                          <td>
                          <a href="{{ route('subcat.edit',$sub->id) }}" class="btn btn-info d-inline-block" 
                           >edit</a>
              <a href="#" onclick="destroy('this SubCategory','{{$sub->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$sub->id}}" action="{{ route('subcat.destroy', $sub->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
                          </td>
                        </tr>

                        @endforeach  
                        @endif  
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
            <h3>Add Sub_Category</h3>
          
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
                <form action="{{route('subcat.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="ms-auth-container row">
                    {{ csrf_field() }}
                      <div class="col-md-3">
                          <div class="form-group">
                            <div id="img-upload" class="img-upload">
                              <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                              <div class="upload-icon">
                                <input type="file" name="pic" class="upload">
                                <i class="fas fa-camera    "></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Sub Category Code</label>
                            <div class="input-group">
                              <input type="text" id="newCat" name="subcategory_code" maxlength="3" class="form-control" placeholder="Sub category Code">
                            </div>
                          </div></div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>subCategory_en_name</label>
                              <div class="input-group">
                                <input type="text" id="newCat" name="subcategory_en_name" class="form-control" placeholder="sub Category en name">
                              </div>
                            </div> </div>
                           
                              
                       
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Parent Category</label>
                            <select name="course_category_id" class="form-control " data-show-subtext="true" data-live-search="true" id="course_category_id">
                              <option value="">select....</option>
                              @foreach ($categories as $cat)
                                        <option value='{{$cat->id}}' >
                                         {{ $cat->category_en_name }}</option>
                                           @endforeach

                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>desciption</label>
                              <div class="input-group">
                               <textarea name="subcategory_en_description" id="" rows="4" class="form-control" placeholder="desciption"></textarea>
                              </div>
                            </div>
                          </div>
                        

                            <div class="col-12">
                              <div class="custom-control custom-checkbox" style="display: none;" >
                                <input type="checkbox" id="subcategory" name="subcategory"
                                checked>
                         <label for="category">Active</label>
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
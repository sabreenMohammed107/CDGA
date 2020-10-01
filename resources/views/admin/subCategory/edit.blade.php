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
				<h6>{{ __('titles.edit') }}</h6>
			</div>
			<div class="ms-panel-body col-md-6 col-md-offset-2">

				@if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif
</div>
<div class="col-md-12">  
                <form action="{{route('subcat.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data" >
                    <div class="ms-auth-container row">
                    {{ csrf_field() }}

                    @method('PUT')
                    <div class="col-md-3">
                          <div class="form-group">
                            <div id="img-upload" class="img-upload">
                              <img src="{{ asset('uploads/courses')}}/{{ $subcategory->subcategory_image }}" alt="">
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
                              <input type="text" id="newCat" maxlength="3" name="subcategory_code" value="{{$subcategory->subcategory_code}}" class="form-control" placeholder="Sub category Code">
                            </div>
                          </div></div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>subCategory_en_name</label>
                              <div class="input-group">
                                <input type="text" id="newCat" name="subcategory_en_name" value="{{$subcategory->subcategory_en_name}}" class="form-control" placeholder="sub Category en name">
                              </div>
                            </div> </div>
                           
                              
                       
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Parent Category</label>
                            <select name="course_category_id" class="form-control " data-show-subtext="true" data-live-search="true" id="course_category_id">
                              <option value="">{{$subcategory->courseCategory->category_en_name}}</option>
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
                               <textarea name="subcategory_en_description" id="" value="{{$subcategory->subcategory_en_description}}" rows="4" class="form-control" placeholder="desciption"></textarea>
                              </div>
                            </div>
                          </div>
                        

                            <div class="col-12">
                              <div class="custom-control custom-checkbox" style="display: none;" >
                              @if($subcategory->active)
                              <input type="checkbox" id="subcategory" name="subcategory"
                                checked>
                              @else
                              <input type="checkbox" id="subcategory" name="subcategory"
                                >
                              @endif
                               
                         <label for="category">Active</label>
                       </div>
                               
                              </div>

                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                        <a href="{{route('subcat.index')}}"  class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">Cancel</a>
                        <input type="submit" value="Add" class="btn btn-success ">
                      </div>
     </form>

                </div>
		</div>
	</div>
</div>
@endsection
@section('scripts')

@endsection
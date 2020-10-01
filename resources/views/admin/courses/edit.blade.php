@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Edit-Course') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  <?

  ?>
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Course</h6>
                <!-- <a href="add_cource.html" class="btn btn-dark" > add Course </a> -->
              </div>
              <div class="ms-panel-body">
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
                <form action="{{route('course.update',$course->id)}}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}

@method('PUT')
                        <div class="ms-auth-container row">

                    <div class="col-md-3">
                        <label> img_course </label>
                      <div class="form-group">
                        <div id="uploadOne" class="img-upload">
                          <img src="{{ asset('uploads/courses')}}/{{ $course->course_image }}" alt="">
                          <div class="upload-icon">
                            <input type="file" name="course_image" class="upload">
                            <i class="fas fa-camera    "></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label> img_thumbnail </label>
                    <div class="form-group">
                      <div id="uploadTwo" class="img-upload">
                        <img src="{{ asset('uploads/courses')}}/{{ $course->course_image_thumbnail }}" alt="">
                        <div class="upload-icon">
                          <input type="file" name="thumbnail" class="upload">
                          <i class="fas fa-camera    "></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label> pdf  </label>
                    
                    <div class="fileUpload">
                        <div class="upload-icon">
                        <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
                     
                        <input type="file" name="fileDoc" class="upload up" id="up" onchange="readURLFile(this);" />
                        <span class="upl" id="upload">{{$course->course_brochure}}</span></div>
                      
                      </div>
                </div>
                <div class="col-md-3">
                  <label class="exampleInputPassword1" for="exampleCheck1"> Course Code </label>
                        <input type="text" id="newClint" class="form-control mt-3" value="{{$course->course_code}}" disabled>
                    
              </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="exampleInputPassword1" for="exampleCheck1" style="color:red" >*Course_en_Name </label>
                          <input type="text" id="newCourse" name="course_en_name" value="{{$course->course_en_name}}" class="form-control" required placeholder="course">
                        </div>
                      </div>
                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="exampleInputPassword1" for="exampleCheck1">Duration ( in days ) </label>
                          <input type="number" id="newClint" name="course_duration" value="{{$course->course_duration}}" class="form-control" placeholder="Duration">
                        </div>
                      </div>
                      
                     
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="color:red">category* </label>
                          <select name="category_id" class="form-control  dynamic" data-show-subtext="true"  data-live-search="true" id="country" data-dependent="sub" >
                            <option value="">{{$course->subCategory->courseCategory->category_en_name}}</option>
                            @foreach ($categories as $category)
                                        <option value='{{$category->id}}' >
                                         {{$category->category_en_name }}</option>
                                           @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="color:red"> sub category *</label>
                          <select name="course_sub_category_id" class="form-control " data-show-subtext="true"   data-live-search="true" id="sub">
                                        <option value="">{{$course->subCategory->subcategory_en_name}}</option>
                          </select>
                        </div>
                      </div>
                    
                   

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example"> Training Methods</label>
                        <div class="form-group">
                            <textarea class="content"  name="course_training_methods">
                            {{$course->course_training_methods}}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example2"> Daily Agenda</label>
                          <div class="form-group">
                              <textarea class="content"  name="course_daily_agenda" >{{$course->course_daily_agenda}}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example"> HighLight</label>
                          <div class="form-group">
                              <textarea class="content" name="course_highlight">{{$course->course_highlight}}</textarea>
                          </div>
                        </div>
                      </div>
  
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="example2">Audience</label>
                            <div class="form-group">
                                <textarea class="content"  name="course_audience">{{$course->course_audience}}</textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example2">Course Objectives</label>
                            <div class="form-group">
                                <textarea class="content"  name="course_objectives">{{$course->course_objectives}}</textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example2">Accreditation</label>
                            <div class="form-group">
                                <textarea class="content"  name="Accreditation">{{$course->Accreditation}}</textarea>
                            </div>
                          </div>
                        </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example"> en desc</label>
                          <div class="form-group">
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="course_en_desc">
{{$course->course_en_desc}}
</textarea>
                          </div>
                        </div>
                      </div>
  
                     
                    
                    <div class="col-12">
                        <div class="custom-control custom-checkbox" style="display: none;">
                        @if($course->active == 1)
                        <input type="checkbox" id="course" name="course"
                          checked>
                          @else
                          <input type="checkbox" id="course" name="course"
                          >
                          @endif
                         
                   <label for="category">active course</label>
                 </div>
                         
                        </div>
                   
                    
                
                </div>
                <div class="input-group d-flex justify-content-end text-center">
                  <a href="{{ route('course.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                  <input type="submit" value="Add" class="btn btn-success ">
                </div>
              </form>
              </div>
            </div>
  
  
  
  
          </div>
  
        </div>
     
<!-- Request Best offer -->
<div class="tabbable-panel">
		 			<div class="tabbable-line">
		 				<ul class="nav nav-tabs " role="tablist">

		 					<li class="btn btn-light ">
		 						<a href="#tab_default_4" class="active"  data-toggle="tab" role="tab">
							   	Related Courses
		 						</a>
		 					</li>
		 				
             </ul>
             <div class="tab-content test ">
               	<!-- Add RELATED   -->
		 					<div class="tab-pane active" id="tab_default_4">
		 						
		 						<div class="row">
		 							<div class="col-md-12">
		 								<div class="ms-panel">
		 									<div class="ms-panel-header d-flex justify-content-between">
		 										<button class="btn btn-dark" data-toggle="modal" data-target="#addRelated"> Add New </button>
		 									</div>
		 									<div class="ms-panel-body">

		 										<div class="table-responsive">
		 											<table id="courseEval" class="dattable table table-striped thead-dark  w-100">
		 												<thead>

		 													<tr>
                                 <th>#</th>
		 														<th scope="col">Course name</th>

		 													
		 														<th scope="col"></th>

		 													</tr>
		 												</thead>
		 												<tbody>
                               @if($relatedCourses !=null)
                               @foreach($relatedCourses as $index =>$relatedCourse)
		 													<tr>
                                 <td>{{$index+1}}</td>
		 														<td>{{$relatedCourse->relatedcourse->course_en_name}}</td>
		 												


		 														<td>

		 														
		 														<a href="#" onclick="destroy('this Related_Course','{{$relatedCourse->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                 <form id="delete_{{$relatedCourse->id}}" action="{{ route('deleteRelated', $relatedCourse->id) }}"  method="POST" style="display: none;">
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
		 						
		 					</div>
               <!--End RELATED  -->
               </div>



</div>
</div>
</div>
<hr>
</div>
<!--  addRelated  Modal -->
<div class="modal fade" id="addRelated" tabindex="-1" role="dialog" aria-labelledby="addRelated">
		<div class="modal-dialog modal-lg " role="document">
			<div class="modal-content">
				<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
					X

				</button>
				<h3>Related Courses</h3>
				<div class="modal-body">


					<div class="ms-auth-container row no-gutters">
						<div class="col-12 p-3">
							<form  action="{{route('saveRelated')}}" method="post">
              {{ csrf_field() }}
          <input type="hidden" value="{{$course->id}}" name="course_id">
                
          <div class="ms-auth-container row">

									<div class="col-md-12">
										<div class="form-group">
											<label>Course</label>
											<div class="input-group">
                      <select data-size="7" name="related_course_id" data-live-search="true" class="selectpicker  fill_selectbtn_in own_selectbox" data-title="course" id="state_list" data-width="100%">
                   
                            <option value="">select....</option>
                            @if($relateds !=null)
                              @foreach ($relateds as $related)
                                        <option value='{{$related->id}}' >
                                         {{ $related->course_en_name }}</option>
                                           @endforeach
                            @endif
                          
                          </select>
												
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
	<!-- /addRelated  Modal -->

@endsection
@section('scripts')
<script>
$(document).ready(function(){
 
 $('.dynamic').change(function(){
    
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
  
   var _token = $('input[name="_token"]').val();
  
   $.ajax({
    url:"{{route('dynamicdependentCat.fetch')}}",
    method:"POST",
    data:{select:select, value:value, _token:_token},
    success:function(result)
    {
        
     $('#sub').html(result);
    }

   })
  }
 });

 
 

});
 

</script>
@endsection
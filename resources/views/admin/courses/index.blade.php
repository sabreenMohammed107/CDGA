@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Courses') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
    <h6>Course</h6>
                <a href="{{ route('course.create') }}" class="btn btn-dark" > add Course </a>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
      <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
                      <th>#</th>
                      <th>Course Code</th>  
                      <th>Course Name </th>
                      <th>Course Duration</th>
                    
                      <th>Action</th>
                    </thead>
                    <tbody>
  @foreach($courses as $index=> $course)
                      <tr>
                      <td>{{$index+1}}</td>
                        <td>{{$course->course_code}}</td>
                        <td>{{$course->course_en_name}}</td>
                        <td>{{$course->course_duration}}</td>
                       
                        <td>
                        <a href="{{ route('course.edit',$course->id) }}" class="btn btn-info d-inline-block" 
                           >edit</a>
              <a href="#" onclick="destroy('this Course','{{$course->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$course->id}}" action="{{ route('course.destroy', $course->id) }}"  method="POST" style="display: none;">
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


@endsection
@section('scripts')

@endsection
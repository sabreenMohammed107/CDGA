@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Rounds') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Round</h6>
                <a href="{{ route('round.create') }}" class="btn btn-dark" > add Round </a>
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
                      <th>Img</th>
                     
                      <th>round  Code </th>
                      <th>Course Name</th>
                      <th>Course Duration(Days)</th>
                     
                      <th>venue </th>
                   
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>price</th>   
                      <th>Active</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
  
                     @foreach($rounds as $round) 
                      <tr>
                        <td><img src="{{ asset('uploads/courses')}}/{{ $round->course->course_image }}" alt=""></td>
                        <td>{{$round->round_code}}</td>
                        <td>{{$round->course->course_en_name}}</td>
                        <td>{{$round->course->course_duration}}</td>
                       
                        <td>
                          @if($round->venue!=null)
                          {{$round->venue->venue_en_name}}
                          @endif
                        </td>
                       
                        <td>
                        <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                             </td>
                        <td>
                        <?php $date = date_create($round->round_end_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                        </td>
                        <td>{{$round->round_price}}
                        @if($round->currancy!=null)
                          {{$round->currancy->currency_name}}
                          @endif
                        </td>
                       
                        @if($round->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif                        <td>
                       
                        <a href="{{ route('round.edit',$round->id) }}" class="btn btn-info d-inline-block" 
                           >edit</a>
                        <a href="#" onclick="destroy('this Round','{{$round->id}}')" class="btn d-inline-block btn-danger">delete</a>
                        <form id="delete_{{$round->id}}" action="{{ route('round.destroy', $round->id) }}"  method="POST" style="display: none;">
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
      </div>
     @endsection
@section('scripts')

@endsection
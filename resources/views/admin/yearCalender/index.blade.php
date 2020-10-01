@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="#"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Calender') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
               
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
          <thead>
            <th>#</th>
             <th>Current Year Calendar</th>
            <th>Next Year Calendar</th>
            <th>Company Profile</th>
         
            <th>Action</th>
          </thead>
          <tbody>
              @foreach($calenders as $index => $calender)
            <tr>
            <td>{{$index+1}}</td>
              <td>
              <a id="downloadButton" class="btn btn-large pull-right">
                  <img src="https://image.flaticon.com/icons/svg/136/136549.svg" title="{{$calender->current_year_calendar}}" class="icon">
                </a>

                  <input type="hidden" name="calender" value="{{ asset('uploads/calender')}}/{{$calender->current_year_calendar}}" alt="{{$calender->current_year_calendar}}" />
                </td>
              
              <td>
              <a id="downloadNext" class="btn btn-large pull-right">
                  <img src="https://image.flaticon.com/icons/svg/136/136549.svg" title="{{$calender->next_year_calendar}}" class="icon">
                </a>

                  <input type="hidden" name="nextCalender" value="{{ asset('uploads/calender')}}/{{$calender->next_year_calendar}}" alt="{{$calender->next_year_calendar}}" />
              
                 </td>
            
            
             <td>
            
              <a id="downloadProfile" class="btn btn-large pull-right">
                  <img src="https://image.flaticon.com/icons/svg/136/136549.svg" title="{{$calender->campany_profile}}" class="icon">
                </a>

                  <input type="hidden" name="campany_profile" value="{{ asset('uploads/calender')}}/{{$calender->campany_profile}}" alt="{{$calender->campany_profile}}" />
              
                 </td>
            
            
             <td>
                <a href="{{ route('yearCalender.edit', $calender->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              
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
<script>
	$(document).ready(function() {
		$('#downloadButton').click(function() {
            var calender = $('input[name="calender"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'Current-Calender';
						link.href = calender;
						link.click();

		
		});
        $('#downloadNext').click(function() {
            var calender = $('input[name="nextCalender"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'Next-Calender';
						link.href = calender;
						link.click();

		
    });
    $('#downloadProfile').click(function() {
            var calender = $('input[name="campany_profile"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'campany_profile';
						link.href = calender;
						link.click();

		
		});
    });
    </script>

@endsection
@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('View Applicants') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Applicants</h6>
    </div>
    <div class="ms-panel-body">
      <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            <form action="">
                <div class="ms-auth-container row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1"> Name</label>
                            <input type="text" value="{{$jobApplicant->name}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1"> Job Title</label>
                            <input type="text" value="{{$jobApplicant->career->job_name}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                            <input type="email" value="{{$jobApplicant->email}}" class="form-control"disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Career Level</label>
                            <input type="text" value="{{$jobApplicant->level->level}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Mobile</label>
                            <input type="tel" value="{{$jobApplicant->mobile}}" class="form-control"disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="exampleInputPassword1" for="exampleCheck1">Expected Salary</label>
                            <input type="number" value="{{$jobApplicant->expected_salary}}" class="form-control"disabled>
                        </div>
                    </div>


                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Creation Date  </label>
                            <div class="input-group">
                            <?php $date = date_create($jobApplicant->created_at) ?>
                            <input type="text" value="{{ date_format($date,'d-m-Y') }}" class="form-control"disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>

                    <div class="col-md-6">
                        <label> CV Link  </label>

                        <div class="fileUpload">
                            <div class="upload-icon">
                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                <input type="file" class="upload up" id="up" onchange="readURLFile(this);"disabled />
                                <span class="upl"   id="upload">{{ $jobApplicant->cv_path }}</span>
                                <input type="hidden" name="brochure" value="{{ asset('uploads/applicant')}}/{{ $jobApplicant->cv_path  }}" alt="{{  $jobApplicant->cv_path  }}" />
                            </div>

                        </div>
                        <a id="downloadButton" class="btn btn-large pull-right"><i class="fas fa-download"></i>Download </a>

                    </div>
                    <div class="col-md-6">
                        <label> Doc Link  </label>

                        <div class="fileUpload">
                            <div class="upload-icon">
                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                <input type="file" class="upload up" id="up" onchange="readURLFile(this);"disabled />
                                <span class="upl" id="upload">{{ $jobApplicant->doc_path }}</span>
                                <input type="hidden" name="brochureFile" value="{{ asset('uploads/applicant')}}/{{ $jobApplicant->doc_path  }}" alt="{{  $jobApplicant->doc_path  }}" />

                            </div>

                        </div>
                        <a id="downloadFileButton" class="btn btn-large pull-right"><i class="fas fa-download"></i>Download </a>
                    </div>
                </div>
                <div class="input-group d-flex justify-content-end text-center">
                    <a href="{{ route('jobApplicant.index') }}" class="btn btn-dark d-inline-block">Cancel</a>
               
                </div>
                </form>
              </div>
          </div>
  
  
  
  
        </div>
  
      </div>
      @endsection
@section('scripts')
<script>
	$(document).ready(function() {
		$('#downloadButton').click(function() {
            var brochure = $('input[name="brochure"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'applicant-cv';
						link.href = brochure;
						link.click();

		
		});

        $('#downloadFileButton').click(function() {
            var brochure = $('input[name="brochureFile"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'applicant-File';
						link.href = brochure;
						link.click();

		
		});
	});
</script>
@endsection
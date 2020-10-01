@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('HomeSlider') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Clients</h6>
      <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSlider"> add new </a>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
          <thead>
          <th>#</th>
            <th>Url_vedio</th>
            <th>testimonials_url</th>
             <th>EN title</th>
            <th>EN Sub_tilte</th>
              <th>Active</th>
              <th>Action</th>
          </thead>
          <tbody>
@foreach($sliders as $index=> $slider)
<tr>
<td>{{$index+1}}</td>
                          <td>
                            <a href="{{$slider->slider_video_url}}" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
                              
                                <img src="{{ asset('adminasset/img/YouTube-icon.png')}}" alt="" >
                            </a>

                              </td>
                              <td>
                            <a href="{{$slider->testimonials_video_url}}" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
                              
                                <img src="{{ asset('adminasset/img/YouTube-icon.png')}}" alt="" >
                            </a>

                              </td>
                          <td>{{$slider->slider_en_title}}</td>
                          <td>{{$slider->slider_en_subtitle}}</td>
                         
                          @if($slider->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif
                          
                          <td>
                          <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this Slider','{{$slider->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$slider->id}}" action="{{ route('slider.destroy', $slider->id) }}"  method="POST" style="display: none;">
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
<div class="modal fade" id="addSlider" tabindex="-1" role="dialog" aria-labelledby="addSlider">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add Slider</h3>
        
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
        <form action="{{route('slider.store')}}" method="POST"  >
                  {{ csrf_field() }}
                  <div class="ms-auth-container row">
                        <div class="col-md-12">
                        <div class="form-group">
                            
                              <div class="upload-icon">
                              
                                <i class="fas fa-video "></i>
                                <label> Home Video URL</label>
                              </div>
                          
                            <div class="input-group">
                            <input type="text" name="slider_video_url"  class="form-control" id="url-type-styled-input">
                        </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                              
                                <div class="upload-icon">
                                
                                  <i class="fas fa-video "></i>
                                  <label> Testimonials Video URL</label>
                                </div>
                            
                              <div class="input-group">
                              <input type="url"  class="form-control" name="testimonials_video_url" id="url-type-styled-input">
                          </div>
                            </div>
                          </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>EN Tiltle</label>
                            <div class="input-group">
                              <input type="text" id="newCity" name="slider_en_title" class="form-control" placeholder="title">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                              <label>EN Sub_title </label>
                              <div class="input-group">
                                <input type="text" id="newCity" name="slider_en_subtitle" class="form-control" placeholder="subtitle">
                              </div>
                            </div>
                          </div>

                        
                          <div class="col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="slider" name="slider"
                              checked>
                       <label for="slider">active slider</label>
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
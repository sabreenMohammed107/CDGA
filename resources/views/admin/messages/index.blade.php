@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Clients Messages') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Clients Messages</h6>
      
    </div>
      <div class="ms-panel-body">
          <div class="table-responsive">
              <table id="testimonials" class="dattable table table-striped thead-dark  w-100">
                  <thead>
                  <tr>
                    <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject </th>
                <th>Message</th>
                <th>Message Date</th>
                <th>Action</th>
                  </tr>
                  </thead>
                
                  <tbody>
                  @foreach($messages as $index=> $message)
                      <tr>
                      <td>{{$index+1}}</td>
                          <td> {{$message->sender_name}} </td>
                          <td><p>{{$message->sender_email}}</p></td>
                        <td><p>{{$message->sender_subject}}</p></td>
                          <td><p>{{$message->sender_message}}</p></td>
                          <td><?php $date = date_create($message->created_at) ?>
                                    {{ date_format($date,"d-m-Y") }}</td>
                          <td>
                            <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat{{ $message->id }}"> View Msg </a>
                            
                            <a href="#" onclick="destroy('this Message','{{$message->id}}')"  class="btn d-inline-block btn-danger">delete</a>
                        <form id="delete_{{$message->id}}" action="{{ route('message.destroy', $message->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>                          </td>
                      </tr>

               
           
                  <!-- View Messages -->
<div class="modal fade" id="addSubCat{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="addSubCat">
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
             
            </button>
            <h3>View Messages</h3>
            <div class="modal-body">
    
             
              <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                  <form action="">
                    <div class="ms-auth-container row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Message</label>
                              <div class="input-group">
                               <textarea name="" id="" rows="7" class="form-control"style="text-align:left">{{$message->sender_message}}</textarea>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                        <input type="button" value="Close" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                      </div>
     </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
  <!-- /Add Sub Modal -->

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
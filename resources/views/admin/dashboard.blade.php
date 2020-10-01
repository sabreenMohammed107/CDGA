@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __('BTS Home') }} </a></li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$rounds}}</h3>

                <p>Rounds on {{$monthRound}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$roundsYear}}</h3>

                <p>Rounds on {{$year}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$registerApplicant}}</h3>

                <p>register Applicant on {{$monthRound}} - {{$year}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                @if($nextRounds!=null && $nextRounds->course!=null)
                <h3>{{$nextRounds->course->course_en_name}}</h3>
                @endif
                <p>
            <?php 
            $dateRound =null;
            if($nextRounds!=null){
              $dateRound = date_create($nextRounds->round_start_date) ;
            }
          
            ?>
            @if($nextRounds!=null && $nextRounds->venue!=null)
            {{$nextRounds->venue->venue_en_name}} - {{ date_format($dateRound,"Y/m/d") }}
            @endif
          </p>
                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


</div>
@endsection
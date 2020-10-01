@extends('web.webLayout.web')
@section('style')
<link href="{{ asset('webasset/css/tabs.css')}}" rel="stylesheet" />
<link href="{{ asset('webasset/css/intro.css')}}" rel="stylesheet" />
	<link href="{{ asset('webasset/css/style.css')}}" rel="stylesheet" />
@endsection
@section('content')
<!-- Start banner Area -->
<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">Training Calendar</h1>

				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!--Start Training Calendar tab-->
	<div class="row d-flex justify-content-center" style="margin:0px !important;padding-bottom:0px">
		<div class="menu-content">
			<div class="title text-center">
				<h4 class="text-color" style="font-family:pruistin;font-size:30px;padding-top:50px">Training Calendar</h4>
			</div>
		</div>
	</div>
	<div class="container mt-3">
		<h2>Training Courses & Seminars</h2>
		<br>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="#home"></a>
			</li>
            <?php 
                        $current=now()->year;
                        $next=$current+1;
						?>
			<li class="nav-item">
				<a class="nav-link active" href="{{ url('calender/'.$current) }}">Training Calendar {{$current}}</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('calenderNext/'.$next) }}">Training Calendar {{$next}}</a>
			</li>
		</ul>
		<style>
td:first-child { width:75%; }

</style>

		<!-- Tab panes -->
		<div class="tab-content">
			<div id="menu1" class="container tab-pane active">
				<br>
				<section class="top-category-widget-area pt-90 pb-90" style="background-color:#ffffff !important;padding-top:0px">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h3>Training Calendar {{$years}}</h3>
								<hr />
								<div class="col-lg-2 col-md-4 col-sm-12">
									<!-- required for floating -->
									<!-- Nav tabs -->
									<ul class="nav nav-tabs tabs-left sideways list-group">
										<li class="active"><a href="#cat-0" data-toggle="tab">January</a></li>
										<li><a href="#cat-1" data-toggle="tab">February</a></li>
										<li><a href="#cat-2" data-toggle="tab">March</a></li>
										<li><a href="#cat-3" data-toggle="tab">April</a></li>
										<li><a href="#cat-4" data-toggle="tab">May</a></li>
										<li><a href="#cat-5" data-toggle="tab">June</a></li>
										<li><a href="#cat-6" data-toggle="tab">July</a></li>
										<li><a href="#cat-7" data-toggle="tab">August</a></li>
										<li><a href="#cat-8" data-toggle="tab">September</a></li>
										<li><a href="#cat-9" data-toggle="tab">October</a></li>
										<li><a href="#cat-10" data-toggle="tab">November</a></li>
										<li><a href="#cat-11" data-toggle="tab">December</a></li>
									</ul>
								</div>

								<div class="col-lg-10 col-md-8 col-sm-12">
									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="cat-0">

                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='January' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
												
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-1">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='February' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-2">
                                        @foreach($filterd_rounds as $rounds)
                                       
                                        @if($rounds->month==='March' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
										
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-3">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='April' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
												
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                         @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-4">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='May' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
							
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-5">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month ==='June' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
							
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-6">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='July' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
										
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-7">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='August' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
										
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-8">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='September' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
										
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-9">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='October' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
																<ul>
																<li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
																</ul>
															</div>
														</td>
													</tr>
											
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-10">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='November'&& $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
								
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cat-11">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='December' && $rounds->year===$years)
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
									</div>
									<div class="col-lg-4"></div>
									<!-- <div class="col-lg-8 align-content-center">
										<nav class="blog-pagination justify-content-center">
											<ul class="pagination">
												<li class="page-item">
													<a href="#" class="page-link" aria-label="Previous">
														<span aria-hidden="true">
															<span class="lnr lnr-chevron-left"></span>
														</span>
													</a>
												</li>
												<li class="page-item"><a href="#" class="page-link">01</a></li>
												<li class="page-item active"><a href="#" class="page-link">02</a></li>
												<li class="page-item"><a href="#" class="page-link">03</a></li>
												<li class="page-item"><a href="#" class="page-link">04</a></li>
												<li class="page-item"><a href="#" class="page-link">05</a></li>
												<li class="page-item"><a href="#" class="page-link">06</a></li>
												<li class="page-item"><a href="#" class="page-link">07</a></li>
												<li class="page-item">
													<a href="#" class="page-link" aria-label="Next">
														<span aria-hidden="true">
															<span class="lnr lnr-chevron-right"></span>
														</span>
													</a>
												</li>
											</ul>
										</nav>
									</div> -->

								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</section>
			</div>
			<div id="menu2" class="container tab-pane fade">
				<br>
				<section class="top-category-widget-area pt-90 pb-90" style="background-color:#ffffff !important;padding-top:0px">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h3>Training Calendar {{$years}}</h3>
								<hr />
								<div class="col-lg-2 col-md-4 col-sm-12">
									<!-- required for floating -->
									<!-- Nav tabs -->
									<ul class="nav nav-tabs tabs-left sideways list-group">
										<li class="active"><a href="#cate-0" data-toggle="tab">January</a></li>
										<li><a href="#cate-1" data-toggle="tab">February</a></li>
										<li><a href="#cate-2" data-toggle="tab">March</a></li>
										<li><a href="#cate-3" data-toggle="tab">April</a></li>
										<li><a href="#cate-4" data-toggle="tab">May</a></li>
										<li><a href="#cate-5" data-toggle="tab">June</a></li>
										<li><a href="#cate-6" data-toggle="tab">July</a></li>
										<li><a href="#cate-7" data-toggle="tab">August</a></li>
										<li><a href="#cate-8" data-toggle="tab">September</a></li>
										<li><a href="#cate-9" data-toggle="tab">October</a></li>
										<li><a href="#cate-10" data-toggle="tab">November</a></li>
										<li><a href="#cate-11" data-toggle="tab">December</a></li>
									</ul>
								</div>

								<div class="col-lg-10 col-md-8 col-sm-12">
									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="cate-0">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='January' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-1">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='February' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-2">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='March' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-3">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='April' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-4">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='May' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-5">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='June' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-6">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='July' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-7">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='August' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-8">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='September' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
                                        </div>
                                        <div class="tab-pane" id="cate-9">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='October')
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
                                        </div>
										<div class="tab-pane" id="cate-10">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='November' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
										<div class="tab-pane" id="cate-11">
                                        @foreach($filterd_rounds as $rounds)
                                        @if($rounds->month==='December' )
											<table class="table">
												<thead style="">
                                                @if($years===$rounds->year)
													<tr style="border-bottom:solid #FFA500">
														<th style="border:none !important">
															<h4>{{$rounds->month}} -{{$rounds->year}}</h4>
														</th>
													</tr>
                                                    @endif
												</thead>
												<tbody>
                                                @foreach($rounds->rounds as $round)
                                                <?php
                                        $ddate=date("Y", strtotime($round->round_start_date));
                                        ?>
                                        @if($ddate===$years)
													<tr>
														<td>
															<div class="detials">
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                                  <h4 style="margin:10px 0px"> {{ $round->course->course_en_name }}</h4>
                                                    </a>
                                                                 <p style="margin-bottom:0px">
                                                        {{ Str::limit($round->course->course_en_desc, 100, ' ...') }}
                             
                                                              </p>
															</div>
                                                            <a href="{{ url('courseDetails/'.$round->course->id) }}" style="color:#FFA500">Read More <i class="fas fa-caret-right"></i></a>
														</td>
														<td>
															<div class="detials" style="padding:0px">
                                                            <ul>
                                <li><i class="fas fa-map-marker-alt" style="color:#FFA500"></i> {{ $round->venue->venue_en_name }} </li>
                                <li><i class="fas fa-clock" style="color:#FFA500"></i>
                                    {{ $round->course->course_duration }} -Days
                                </li>
                                <li><i class="fas fa-angle-double-right" style="color:#FFA500"></i> {{$round->currancy->currency_name}}-{{ $round->round_price}}</li>
                                <li><i class="fas fa-calendar-alt" style="color:#FFA500"></i>
                                    <?php $date = date_create($round->round_start_date) ?>
                                    {{ date_format($date,"d-m-Y") }}

                                </li>
                            </ul>
															</div>
														</td>
													</tr>
									
													@endif
                                                    @endforeach
												</tbody>
											</table>
                                            @endif
                                            @endforeach
										</div>
									</div>
									<div class="col-lg-4"></div>
									<!-- <div class="col-lg-8 align-content-center">
										<nav class="blog-pagination justify-content-center">
											<ul class="pagination">
												<li class="page-item">
													<a href="#" class="page-link" aria-label="Previous">
														<span aria-hidden="true">
															<span class="lnr lnr-chevron-left"></span>
														</span>
													</a>
												</li>
												<li class="page-item"><a href="#" class="page-link">01</a></li>
												<li class="page-item active"><a href="#" class="page-link">02</a></li>
												<li class="page-item"><a href="#" class="page-link">03</a></li>
												<li class="page-item"><a href="#" class="page-link">04</a></li>
												<li class="page-item"><a href="#" class="page-link">05</a></li>
												<li class="page-item"><a href="#" class="page-link">06</a></li>
												<li class="page-item"><a href="#" class="page-link">07</a></li>
												<li class="page-item">
													<a href="#" class="page-link" aria-label="Next">
														<span aria-hidden="true">
															<span class="lnr lnr-chevron-right"></span>
														</span>
													</a>
												</li>
											</ul>
										</nav>
									</div> -->

								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!--End Training Calendar tab-->



	<!-- Start become instructor Area -->
	<section class="cta-one-area relative section-gap" style="padding:120px 0px;background: url(images/calendar.jpg) center bottom !important;">
		<div class="container">
			<div class="overlay overlay-bg"></div>
			<div class="row justify-content-center">
				<div class="wrap">
					<h1 class="text-white">Download BTS Training Calendar</h1>
					<p>
					We will never stop improving					</p>
					<a class="primary-btn" id="downloadCurrentCalender" >
							Calender {{$yearCal}}
				               </a>
				<input type="hidden" name="calender" value="{{ asset('uploads/calender')}}/{{$calender->current_year_calendar}}" alt="{{$calender->current_year_calendar}}" />
								
				<a class="primary-btn" id="downloadNextCalender">Calender {{$yearCal+1}}</a>
								<input type="hidden" name="nextCalender" value="{{ asset('uploads/calender')}}/{{$calender->next_year_calendar}}" alt="{{$calender->next_year_calendar}}" />

				</div>
			</div>
		</div>
	</section>
	<!-- End become instructor Area -->
	<!-- End calendar Area -->
@endsection
	@section('scripts')
    <script src="{{ asset('webasset/js/tabs.js')}}"></script>


	<!--back to top-->
	<script>
		jQuery(document).ready(function () {
			//   insert back to top button dynamicly
			$("#backToTop").append('<a class="backToTop" href="javascript:void(null);" style="display: none;"><i class="fa fa-angle-up"></i><iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe></a>');
			var $window = $(window);
			var distance = 80;
			// scroll
			$window.scroll(function () {
				// header
				if ($window.scrollTop() >= distance) {
					$(".backToTop").fadeIn();
				} else {
					$(".backToTop").fadeOut();
				}
			});

			$('.backToTop').click(function () {
				$('html, body').animate({
					scrollTop: 0
				}, 800);
			});


			//dawnload calender
			$('#downloadCurrentCalender').click(function() {
            var calender = $('input[name="calender"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'Current-Calender';
						link.href = calender;
						link.click();

		
		});
        $('#downloadNextCalender').click(function() {
            var calender = $('input[name="nextCalender"]').val();
            
            
            var link = document.createElement("a");
						link.download = 'Next-Calender';
						link.href = calender;
						link.click();

		
		});
		})
	</script>


	<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});
	</script>
    @endsection
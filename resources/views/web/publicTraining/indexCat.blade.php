<div class="col-lg-10 col-md-8 col-sm-12">
						<!-- Tab panes -->
						<div  class="tab-content">
							<div class="tab-pane active" >
						@foreach($trainingCategories as $trAll)
							
								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="single-cat-widget">
										<div class="content relative">
											<div class="overlay overlay-bg"></div>
											<a href='{{url ("/courses/$trAll->course_category_id/$trAll->id/date") }}'>
												<div class="thumb">
													<img class="content-image img-fluid d-block mx-auto" style="height: 300px !important;" src="{{ asset('uploads/courses')}}/{{ $trAll->subcategory_image }}" alt="">
												</div>
												<div class="content-details" style="posation:relative">
													<h5 class="content-title mx-auto text-uppercase" style="width:80%">{{$trAll->subcategory_en_name}}</h5>
													<span></span>
													<p style=" margin:auto;width:80%">
													{{ Str::limit($trAll->subcategory_en_description, 120, ' ...') }}
												</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							
						@endforeach
							<div class="col-lg-4"></div>
							<div class="col-lg-8 align-content-center">
								
							</div>

						</div>
					</div>
					</div>
					<div class="clearfix"></div>
                    <div id="categoryAll" class="blog-pagination justify-content-center"  >
						
						{!! $trainingCategories->links() !!}
						</div>
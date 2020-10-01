<div class="row">
				<div class="col-sm-12">
						<!-- Tab panes -->
						<div class="">
							<div class="tab-pane active" >
							<input type="hidden" id="catId" value="{{$category->id}}">
@if(!$subCategories->isEmpty())
					@foreach($subCategories as $sub)

								<div class="col-lg-4 col-md-6 col-sm-12">
									<div class="single-cat-widget">
										<div class="content relative">
											<div class="overlay overlay-bg"></div>
											<a href='{{url ("/courses/$category->id/$sub->id/date") }}'>
												<div class="thumb">
													<img class="content-image img-fluid d-block mx-auto" style="height: 300px !important;" src="{{ asset('uploads/courses')}}/{{ $sub->subcategory_image }}" alt="">
												</div>
												<div class="content-details" style="posation:relative">
													<h5 class="content-title mx-auto text-uppercase" style="width:80%" >{{$sub->subcategory_en_name}}</h5>
													<span></span>
													<p style=" margin:auto;width:80%" >
													
													{{ Str::limit($sub->subcategory_en_description, 100, '...') }}
												</p>
												</div>
											</a>
										</div>
									</div>
								</div>
								@endforeach
								@endif
							</div>
						</div>
						<div class="col-lg-4"></div>
						<div class="col-lg-8 align-content-center">
						
                        </div>
                        </div>
				</div>
				<div class="clearfix"></div>
                        <div id="category" class="blog-pagination justify-content-center"  >
						
						{!! $subCategories->links() !!}
						
						</div>
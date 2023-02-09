@extends('layouts.user')
@section('head')
<link rel="stylesheet" href="{{url('css/list-property.css')}}" type="text/css" />
@endsection
@section('content')


 <!-- property list -->
 <section class="property-list pt-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="main-title mb20">
                <div class="menu-list">Home / <a href="#">List Property</a></div>
                <h2>List Property</h2>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 mt-2">
              <div class="property-slidbar">
              <form method = "get" action="{{route('property.search')}}">
                <div class="property-content mb-3">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Property Name">
                  </div>
                  <div class="form-group">
                    <select name="location_id" class="form-control">
                    <option value="0">Property Location</option>
                    @foreach($list_location as $location)
                                <option value="{{$location->id}}"  @if(Request::input('location_id') == $location->id ) selected @endif>{{$location->name}}</option>
                                @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="category_id" class="form-control">
                      <option value="0">Property Category</option>
                                 @foreach($list_category as $category)
                                <option value="{{$category->id}}"  @if(Request::input('category_id') == $category->id ) selected @endif>{{$category->categoryname}}</option>
                                @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-2">
                    <div>
                      <div class="main-title mb-2 mt-3">
                        <p class="mb-0"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="ml-2">Amenities</span></p>
                      </div>
                      <div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Air Conditioning</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Kitchen</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Parking</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Wi-Fi Internet</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Bathroom Type</label>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="main-title mb-2 mt-3">
                        <p class="mb-0"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="ml-2">Features</span></p>
                      </div>
                      <div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Office</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Study Hall</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Library</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Kitchen</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Parking</label>
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">CCTV</label>
                        </div>
                      </div>
                    </div>
                    <button class="btn px-0 btn-show text-thm">Show More</button>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-thm w-100">Search</button>
                  </div>
                </div>
            </form>
                <div class="property-content mb-3">
                  <div class="main-title mb-2">
                    <h3>Featured Properties</h3>
                  </div>
                    <div class="featured-content">
                      <div class="feature-slider owl-theme owl-carousel">
                        @foreach($list_features  as $feature)
                        <div class="slide">
                          <div class="feature-slide" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="main-title mb-0">
                              <h3 class="text-white mb-0">₹ 300</h3>
                              <p class="text-white">{{$feature->property_title}}</p>
                            </div>
                          </div>
                        </div>
                        @endforeach

                      </div>
                    </div>

                </div>
                <div class="property-content mb-3">
                  <div class="main-title mb-2">
                    <h3>Categories</h3>
                  </div>
                  <div class="categories-list">
                    <ul class="category-list mb-0">
                      <li class="category-item">
                        <div class="d-flex category-link align-items-center justify-content-between">
                          <p><i class="fa fa-caret-right mr-2" aria-hidden="true"></i><span>Hostel</span></p>
                          <p>5 properties</p>
                        </div>
                      </li>
                      <li class="category-item">
                        <div class="d-flex category-link align-items-center justify-content-between">
                          <p><i class="fa fa-caret-right mr-2" aria-hidden="true"></i><span>Paying Guest</span></p>
                          <p>6 properties</p>
                        </div>
                      </li>
                      <li class="category-item">
                        <div class="d-flex category-link align-items-center justify-content-between">
                          <p><i class="fa fa-caret-right mr-2" aria-hidden="true"></i><span>Guest House</span></p>
                          <p>3 properties</p>
                        </div>
                      </li>
                      <li class="category-item">
                        <div class="d-flex category-link align-items-center justify-content-between">
                          <p><i class="fa fa-caret-right mr-2" aria-hidden="true"></i><span>Service Apartment</span></p>
                          <p>4 properties</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="property-content">
                  <div class="main-title mb-2">
                    <h3>Recently Viewed</h3>
                  </div>
                  <div class="recently-content">
                    <ul class="recently-list mb-0">
                      <li>
                        <div class="recently-link d-flex align-items-center">
                          <div class="recently-img">
                            <img src="{{url('images/4.jpg')}}" class="img-fluid">
                          </div>
                          <div class="recently-details">
                            <p class="mb-1"><strong>Renovated Apartment</strong></p>
                            <p class="text-thm mb-0">₹300</p>
                            <small>Beds: 0</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="recently-link d-flex align-items-center">
                          <div class="recently-img">
                            <img src="{{url('images/4.jpg')}}" class="img-fluid">
                          </div>
                          <div class="recently-details">
                            <p class="mb-1"><strong>Renovated Apartment</strong></p>
                            <p class="text-thm mb-0">₹300</p>
                            <small>Beds: 0</small>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="recently-link d-flex align-items-center">
                          <div class="recently-img">
                            <img src="{{url('images/4.jpg')}}" class="img-fluid">
                          </div>
                          <div class="recently-details">
                            <p class="mb-1"><strong>Renovated Apartment</strong></p>
                            <p class="text-thm mb-0">₹300</p>
                            <small>Beds: 0</small>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mt-2">
              <div class="property-list-detail property-slidbar">
                <div class="property-content d-flex justify-content-between align-items-center py-2 mb-3">
                  <p class="mb-0">
                    @if($rows->total() > 1)
											{{ __(":count properties found",['count'=>$rows->total()]) }}
										@else
											{{ __(":count property found",['count'=>$rows->total()]) }}
										@endif
                    </p>
                  <div class="sort-by d-flex align-items-center">
                    <p><strong>Sort by:</strong></p>
                    <select value="{{$filter}}" onchange="changeFilterProperty(this)" name="filter" class="selectpicker property-select-filter show-tick">
													<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'new']) }}" value="new" @if(Request::input('filter') == 'new') selected @endif>{{__('Newest')}}</option>
													<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'old']) }}" value="old" @if(Request::input('filter') == 'old') selected @endif>{{__('Oldest')}}</option>
													<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'price_high']) }}" value="price_high" @if(Request::input('filter') == 'price_high') selected @endif>{{__('Price [high to low]')}}</option>
													<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'price_low']) }}" value="price_low" @if(Request::input('filter') == 'price_low') selected @endif>{{__('Price [low to high]')}}</option>
													<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'name_high']) }}" value="name_high" @if(Request::input('filter') == 'name_high') selected @endif>{{__('Name [a->z]')}}</option>
													<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'name_low']) }}" value="name_low" @if(Request::input('filter') == 'name_low') selected @endif>{{__('Name [z->a]')}}</option>
												</select>
                  </div>
                </div>
                <div class="properties-content">

                @if($rows->total() > 0)
                  <ul class="mb-0">
                    @foreach($rows as $row)

                    <li>
                    <a class="thumb-image" href="{{ route('property.detail',$row->id)}}">
                      <div class="properties-items d-flex align-items-start justify-content-between">
                        <div class="properties-details d-flex align-items-md-center">
                          <div class="properties-img" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="like-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                          </div>
                          <div class="propertiesdetail ml-md-3 mt-md-0 mt-2">
                            <small class="text-thm"></small>
                            <p class="mb-2"><strong>{{$row->property_title}}</strong></p>
                            <div class="property-review d-flex align-items-center">
                              <small class="review-star">
                                <i class="fa fa-star text-thm" aria-hidden="true"></i>
                                <i class="fa fa-star text-thm" aria-hidden="true"></i>
                                <i class="fa fa-star text-thm" aria-hidden="true"></i>
                                <i class="fa fa-star-o text-thm" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                              </small>
                              <small class="ml-2">12 views</small>
                            </div>
                            @if(!empty($row->location_id))
                            @php
                                $locationdata  = App\Models\Location :: find($row->location_id);
                             @endphp
                            @endif

                            <div class="property-location">
                              <small><i class="fa fa-map-marker" aria-hidden="true"></i> <span>{{($locationdata) ? $locationdata->name : ''}}</span></small>
                            </div>
                            <small>Beds: 5</small>
                          </div>
                        </div>
                        <div class="properties-rent mt-4"><strong>Rent: ₹300</strong></div>
                      </div>
                    </a>
                    </li>
                    @endforeach

                    @else
								<div class="col-lg-12">
									<div class="border rounded p-3 bg-white">
										{{__("Property not found")}}
									</div>
								</div>
							@endif





                  </ul>
                </div>
                <div class="property-pagination mt-4">
                {{$rows->appends(request()->query())->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection


@section('script')
<script>
    function changeFilterProperty(e){
    var url = $(e).find(":selected").data('url');
    window.location.href=url;
}
    </script>

@endsection

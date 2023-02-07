@extends('layouts.user')

@section('content')

<div class="page-template-content">
        <div class="header_top">
          <div class="container-xl">
            <div class="row justify-content-center mx-0">
              <div class="col-xl-11 col-lg-12 col-md-12 px-0">
                <div class="home_adv_srch_opt mb10 mx-0">
                  <form>
                    <div class="home1-advnc-search">
                      <ul class="mb0 d-flex align-items-center justify-content-center py-1">
                        <li>
                            <div class="search_option_two">
                              <div class="candidate_revew_select">
                                <select class="selectpicker w100 show-tick">
                                  <option value="0">Location</option>

                                  @foreach($locationdata as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                                </select>
                              </div>
                            </div>
                          </li>
                        <li class="search_area">
                            <div class="search_option_two">
                                <div class="candidate_revew_select">
                                  <select
                                    name="location_id"
                                    class="selectpicker w100 show-tick"
                                  >
                                    <option value="0">Area</option>
                                    @foreach($areadata as $area)
                                    <option value="{{$area->name}}">{{$area->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                        </li>
                        <li>
                          <div class="search_option_two">
                            <div class="candidate_revew_select">
                              <select
                                name="category_id"
                                class="selectpicker w100 show-tick"
                              >
                                <option value="0">Property Category</option>
                                @foreach($propertycategory as $category)
                                <option value="{{$category->id}}">{{$category->categoryname}}</option>
                                @endforeach

                              </select>
                            </div>
                          </div>
                        </li>

                        <li class="search_area">
                          <div class="check-in form-group mb-0">
                            <input type="text" class="form-control" placeholder="Check-in" onfocus="(this.type = 'date')">
                          </div>
                        </li>
                        <li class="search_area">
                          <div class="check-in form-group mb-0">
                            <input type="text" class="form-control" placeholder="Check-out" onfocus="(this.type = 'date')">
                          </div>
                        </li>
                        <li class="list-inline-item">
                          <div class="search_option_button home10">
                            <button type="submit" class="btn btn-thm">
                              Search
                            </button>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- new design create account(24-01-23) -->
            <div class="fixed-form">
              <div class="sign_up_form">
                  <h3 class="text-center mb-3">Create Account</h3>
                  <form>
                      <div class="form-group">
                          <input type="text" placeholder="username" class="form-control">
                      </div>
                      <div class="form-group">
                          <input type="email" placeholder="email" class="form-control">
                      </div>
                      <div class="form-group">
                          <input type="password" placeholder="password" class="form-control">
                      </div>
                      <div class="form-group">
                          <input type="password" placeholder="confirm password" class="form-control">
                      </div>
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">I agree all statements in Terms of service</label>
                      </div>
                      <div class="d-flex align-items-center justify-content-center mt-2"><button type="submit" class="btn btn-thm">Sign up</button></div>
                      <p class="text-center mb-0">Already have an account? <a class="text-thm" href="javascript:void(0)" data-target="#login" data-toggle="modal">Log In</a></p>
                  </form>

              </div>
            </div>
      <div class="mainslider">
        <div class="container-fluid p-lg-0">
          <div class="row mx-0">
            <div class="col-lg-12 px-0">
              <div class="main-banner-wrapper">
                <div class="slider-banner owl-theme owl-carousel">
                  <div
                    class="slide slide-one"
                    style="background-image:url({{asset('images/banner/1.jpg')}}); height: 620px;"
                  >
                    <div class="container"></div>
                  </div>
                  <div
                    class="slide slide-one"
                    style="
                      background-image: url({{asset('images/banner/2.jpg')}});
                      height: 620px;
                    "
                  >
                    <div class="container"></div>
                  </div>
                  <div
                    class="slide slide-one"
                    style="
                      background-image: url({{asset('images/banner/3.jpg')}});
                      height: 620px;
                    "
                  >
                    <div class="container"></div>
                  </div>
                </div>
                <div class="carousel-btn-block banner-carousel-btn">
                  <span class="carousel-btn left-btn"
                    ><i class="flaticon-left-arrow-1 left"></i
                  ></span>
                  <span class="carousel-btn right-btn"
                    ><i class="flaticon-right-arrow right"></i
                  ></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Feature Properties -->
      <section id="feature-property" class="feature-property pt-4">
        <div class="container">

        @foreach($propertycategory as $category)
          <div class="row py-3">
            <div class="col-lg-12">
              <div class="main-title mb40">

              @if($category->categoryname)
                        <h2>{{$category->categoryname}}</h2>
                    @endif
                <p>
                  Handpicked properties by our team..

                  <a class="float-right" href="#"
                    >View All <span class="flaticon-next"></span
                  ></a>
                </p>
              </div>
            </div>
            @php
                 $propertycategory = App\Models\Property :: where("status", "2")->where('category_id',$category->id)->get();
            @endphp

            <div class="col-lg-12">
              <div class="feature_property_slider owl-theme owl-carousel">
                <!-- new code (24-01-23) -->
                @foreach($propertycategory as $property)
            @php
            $locationdata  = App\Models\Location :: find($property->location_id);
            @endphp
                <div class="item">
                  <div class="properti_city properti-slider">
                    <div class="mb-2 properti-thumb">
                      <a class="thumb-image" href="{{ route('property.detail',1)}}">
                        <div class="thumb_img bg_img_placeholder feature_property_bg_image_overlay pt-0">
                          <img src="{{url($property->feature_image)}}" class="img-fluid">
                        </div>
                      </a>
                      <div class="properti-number d-flex align-items-center justify-content-center"><span>8</span></div>
                    </div>
                    <div class="properti-content">
                      <div class="properti-title">{{$property->property_title}}</div>
                      <div class="properti-location d-flex">
                        <div class="rate d-flex mr-2 align-items-center">
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star-half" aria-hidden="true"></i>
                        </div>
                        <div class="location">
                          <a href="#"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i><span>{{($locationdata) ? $locationdata->name : ''}}</span></a>
                        </div>
                      </div>
                      <div class="properti-price">
                        INR 1,758.33
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach


              </div>
            </div>

          </div>
@endforeach
        </div>
      </section>
      <!-- testimonial section -->
      <section class="testimonail">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <div class="main-title mb40 text-center">
                <p class="testimonial-title">Testimonnial</p>
                <h2>What Our Clients Say!</h2>
              </div>
            </div>
            <div class="col-lg-10">
              <div class="testimonial-slider owl-theme owl-carousel">
                <!-- new code (24-01-23) -->
                <div class="item">
                  <div class="testimonial-content">
                    <div class="client-detail">
                      <div class="client-logo">
                        <img src="{{url('images/male.png')}}" class="img-fluid">
                      </div>
                      <h5 class="client-name mb-0">Client Name<span class="d-block">Profession</span></h5>
                    </div>
                    <div class="client-dec">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, dolorum.</div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimonial-content">
                    <div class="client-detail">
                      <div class="client-logo">
                        <img src="{{url('images/male.png')}}" class="img-fluid">
                      </div>
                      <h5 class="client-name mb-0">Client Name<span class="d-block">Profession</span></h5>
                    </div>
                    <div class="client-dec">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, dolorum.</div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimonial-content">
                    <div class="client-detail">
                      <div class="client-logo">
                        <img src="{{url('images/male.png')}}" class="img-fluid">
                      </div>
                      <h5 class="client-name mb-0">Client Name<span class="d-block">Profession</span></h5>
                    </div>
                    <div class="client-dec">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, dolorum.</div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- icons section -->
      <section class="icons-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="main-title mb40 text-center">
                <h2>Icons Title</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="icon-content">
                <div class="icon-img">
                  <img src="{{url('images/Activity.png')}}" class="img-fluid" width="50px">
                </div>
                <div class="icon-dec">
                  <h5 class="icon-title">Activity</h5>
                  <p class="icon-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis, hic.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-content">
                <div class="icon-img">
                  <img src="{{url('images/Activity.png')}}" class="img-fluid" width="50px">
                </div>
                <div class="icon-dec">
                  <h5 class="icon-title">Activity</h5>
                  <p class="icon-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis, hic.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-content">
                <div class="icon-img">
                  <img src="{{url('images/Activity.png')}}" class="img-fluid" width="50px">
                </div>
                <div class="icon-dec">
                  <h5 class="icon-title">Activity</h5>
                  <p class="icon-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis, hic.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-content">
                <div class="icon-img">
                  <img src="{{url('images/Activity.png')}}" class="img-fluid" width="50px">
                </div>
                <div class="icon-dec">
                  <h5 class="icon-title">Activity</h5>
                  <p class="icon-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis, hic.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-content">
                <div class="icon-img">
                  <img src="{{url('images/Activity.png')}}" class="img-fluid" width="50px">
                </div>
                <div class="icon-dec">
                  <h5 class="icon-title">Activity</h5>
                  <p class="icon-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis, hic.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-content">
                <div class="icon-img">
                  <img src="{{url('images/Activity.png')}}" class="img-fluid" width="50px">
                </div>
                <div class="icon-dec">
                  <h5 class="icon-title">Activity</h5>
                  <p class="icon-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis, hic.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection




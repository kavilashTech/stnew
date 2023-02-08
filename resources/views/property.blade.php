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
                <div class="property-content mb-3">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Property Name">
                  </div>
                  <div class="form-group">
                    <select name="location_id" class="form-control">
                      <option value="0">Location</option>
                      <option value="9">Area 1</option>
                      <option value="9">Area 2</option>
                      <option value="9">Area 3</option>
                      <option value="9">Area 4</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="location_id" class="form-control">
                      <option value="0">Property Category</option>
                      <option value="9">Area 1</option>
                      <option value="9">Area 2</option>
                      <option value="9">Area 3</option>
                      <option value="9">Area 4</option>
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
                    <button class="btn btn-thm w-100">Search</button>
                  </div>
                </div>
                <div class="property-content mb-3">
                  <div class="main-title mb-2">
                    <h3>Featured Properties</h3>
                  </div>
                    <div class="featured-content">
                      <div class="feature-slider owl-theme owl-carousel">
                        <div class="slide">
                          <div class="feature-slide" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="main-title mb-0">
                              <h3 class="text-white mb-0">₹ 300</h3>
                              <p class="text-white">Renovated Apartment</p>
                            </div>
                          </div>
                        </div>
                        <div class="slide">
                          <div class="feature-slide" style="background-image: url({{asset('/images/5.jpg')}});">
                            <div class="main-title mb-0">
                              <h3 class="text-white mb-0">₹ 300</h3>
                              <p class="text-white">Renovated Apartment</p>
                            </div>
                          </div>
                        </div>
                        <div class="slide">
                          <div class="feature-slide" style="background-image: url({{asset('/images/6.jpg')}});">
                            <div class="main-title mb-0">
                              <h3 class="text-white mb-0">₹ 300</h3>
                              <p class="text-white">Renovated Apartment</p>
                            </div>
                          </div>
                        </div>
                        <div class="slide">
                          <div class="feature-slide" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="main-title mb-0">
                              <h3 class="text-white mb-0">₹ 300</h3>
                              <p class="text-white">Renovated Apartment</p>
                            </div>
                          </div>
                        </div>

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
                  <p class="mb-0">18 properties found</p>
                  <div class="sort-by d-flex align-items-center">
                    <p><strong>Sort by:</strong></p>
                    <select name="location_id" class="form-control pl-0">
                      <option value="0">Newest</option>
                      <option value="9">Area 1</option>
                      <option value="9">Area 2</option>
                      <option value="9">Area 3</option>
                      <option value="9">Area 4</option>
                    </select>
                  </div>
                </div>
                <div class="properties-content">
                  <ul class="mb-0">
                    <li>
                      <div class="properties-items d-flex align-items-start justify-content-between">
                        <div class="properties-details d-flex align-items-md-center">
                          <div class="properties-img" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="like-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                          </div>
                          <div class="propertiesdetail ml-md-3 mt-md-0 mt-2">
                            <small class="text-thm">Paying Guest</small>
                            <p class="mb-2"><strong>Renovated Apartment</strong></p>
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
                            <div class="property-location">
                              <small><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Paris</span></small>
                            </div>
                            <small>Beds: 5</small>
                          </div>
                        </div>
                        <div class="properties-rent mt-4"><strong>Rent: ₹300</strong></div>
                      </div>
                    </li>
                    <li>
                      <div class="properties-items d-flex align-items-start justify-content-between">
                        <div class="properties-details d-flex align-items-md-center">
                          <div class="properties-img" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="like-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                          </div>
                          <div class="propertiesdetail ml-md-3 mt-md-0 mt-2">
                            <small class="text-thm">Paying Guest</small>
                            <p class="mb-2"><strong>Renovated Apartment</strong></p>
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
                            <div class="property-location">
                              <small><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Paris</span></small>
                            </div>
                            <small>Beds: 5</small>
                          </div>
                        </div>
                        <div class="properties-rent mt-4"><strong>Rent: ₹300</strong></div>
                      </div>
                    </li>
                    <li>
                      <div class="properties-items d-flex align-items-start justify-content-between">
                        <div class="properties-details d-flex align-items-md-center">
                          <div class="properties-img" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="like-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                          </div>
                          <div class="propertiesdetail ml-md-3 mt-md-0 mt-2">
                            <small class="text-thm">Paying Guest</small>
                            <p class="mb-2"><strong>Renovated Apartment</strong></p>
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
                            <div class="property-location">
                              <small><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Paris</span></small>
                            </div>
                            <small>Beds: 5</small>
                          </div>
                        </div>
                        <div class="properties-rent mt-4"><strong>Rent: ₹300</strong></div>
                      </div>
                    </li>
                    <li>
                      <div class="properties-items d-flex align-items-start justify-content-between">
                        <div class="properties-details d-flex align-items-md-center">
                          <div class="properties-img" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="like-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                          </div>
                          <div class="propertiesdetail ml-md-3 mt-md-0 mt-2">
                            <small class="text-thm">Paying Guest</small>
                            <p class="mb-2"><strong>Renovated Apartment</strong></p>
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
                            <div class="property-location">
                              <small><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Paris</span></small>
                            </div>
                            <small>Beds: 5</small>
                          </div>
                        </div>
                        <div class="properties-rent mt-4"><strong>Rent: ₹300</strong></div>
                      </div>
                    </li>
                    <li>
                      <div class="properties-items d-flex align-items-start justify-content-between">
                        <div class="properties-details d-flex align-items-md-center">
                          <div class="properties-img" style="background-image: url({{asset('/images/4.jpg')}});">
                            <div class="like-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                          </div>
                          <div class="propertiesdetail ml-md-3 mt-md-0 mt-2">
                            <small class="text-thm">Paying Guest</small>
                            <p class="mb-2"><strong>Renovated Apartment</strong></p>
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
                            <div class="property-location">
                              <small><i class="fa fa-map-marker" aria-hidden="true"></i> <span>Paris</span></small>
                            </div>
                            <small>Beds: 5</small>
                          </div>
                        </div>
                        <div class="properties-rent mt-4"><strong>Rent: ₹300</strong></div>
                      </div>
                    </li>

                  </ul>
                </div>
                <div class="property-pagination mt-4">
                  <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection


@section('script')

@endsection

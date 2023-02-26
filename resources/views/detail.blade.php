@extends('layouts.user')

<link rel="stylesheet" href="{{url('css1/style.css')}}"/>
<link rel="stylesheet" href="{{url('css1/aos.css')}}">
<link rel="stylesheet" href="{{url('css1/magnific.css')}}">
<link rel="stylesheet" href="{{url('css1/owl.css')}}"/>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

@section('content')

<div class="gallery-section">
    <div class="gallery-box">
        <div class="row no-gutters">
            @php
            $gallery_image = ($rows->gallery_images != '') ? json_decode($rows->gallery_images): '';

            @endphp


            <div class="col-md-6 bor-right">
                <div class="inner-box">
                    @if($gallery_image != '')
                    <a href="{{url('images/property/gallery/'.$gallery_image['0'])}}" class="zoom" title="Hotel photo 1">
                        <img data-src="{{url('images/property/gallery/'.$gallery_image['0'])}}" src="{{url('images/property/gallery/'.$gallery_image['0'])}}" class="img-fluid lazyload" alt="Gallery" />
                    </a>
                    @else
                    <img data-src="{{url('images/property/gallery/empty_gallery.jpeg')}}" src="{{url('images/property/gallery/empty_gallery.jpeg')}}" class="img-fluid lazyload" alt="Gallery" />
                    @endif
                </div>
            </div>
        @if(isset($gallery_image[1]) || isset($gallery_image[2]) )
            <div class="col-md-3">
            @if(isset($gallery_image[1]))
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="{{url('images/property/gallery/'.$gallery_image['1'])}}" class="zoom" title="Hotel photo 2">
                                <img data-src="{{url('images/property/gallery/'.$gallery_image['1'])}}" src="{{url('images/property/gallery/'.$gallery_image['1'])}}" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($gallery_image[2]))
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="{{url('images/property/gallery/'.$gallery_image['2'])}}" class="zoom" title="Hotel photo 3">
                                <img data-src="{{url('images/property/gallery/'.$gallery_image['2'])}}" src="{{url('images/property/gallery/'.$gallery_image['2'])}}" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            @endif
            @if(isset($gallery_image[3]) || isset($gallery_image[4]) )
            <div class="col-md-3">
            @if(isset($gallery_image[3]))
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="{{url('images/property/gallery/'.$gallery_image['3'])}}" class="zoom" title="Hotel photo 4">
                                <img data-src="{{url('images/property/gallery/'.$gallery_image['3'])}}" src="{{url('images/property/gallery/'.$gallery_image['3'])}}" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($gallery_image[4]))
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="{{url('images/property/gallery/'.$gallery_image['4'])}}" class="zoom" title="Hotel photo 5">
                                <img data-src="{{url('images/property/gallery/'.$gallery_image['4'])}}" src="{{url('images/property/gallery/'.$gallery_image['4'])}}" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
    @if(isset($gallery_image) && isset($gallery_image[0]))
    <div class="view-all-photo">
        <a href="{{url('images/property/gallery/'.$gallery_image['0'])}}" class="zoom" title="Hotel photo 1">
            <i class="material-icons mr-2">image</i> View all photos
        </a>
    </div>
    @endif
</div>



<div class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header-section">
                    <h2>{{ $rows->property_title ?? '' }}</h2>
                </div>
                @if(!empty($rows->description))
                <p class = "limit_text">{!! Str::words($rows->description,50) !!}</p>
                <div id="collapse1" class="hide-part">
                    <p class="mt-3 gray"></p>
                    <p>{!! $rows->description !!}</p>
                </div>
                <button href="#collapse1" class="toggle-btn description_details">Show more</button>

                @endif
            </div>
            <div class="col-lg-6">
                <div class="header-section">
                    <h3>Amenities</h3>
                    <div class="row no-gutters">
                        @foreach($propertyamentie as $propertyamentiedata)
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">gite</i><span class="font-medium text-sm text-text ">{{$propertyamentiedata['name']}}</span></div></div>
                        @endforeach
                    </div>
                    <div class="d-flex" style="position:absolute; bottom:0px">
                        <h3>Exclusive :  </h3>
                        <p style="font-size: 16px; line-height: 2rem; font-weight:600;">&nbsp;&nbsp;{{@$rows->exclusivity ? $rows->exclusivity->name : 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-section">    
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs  property-detail-tab-section " >
                    <li class="nav-item" style="    margin: 0px 15px;">
                        <a class="nav-link" style="position:relative;padding:8px;"  href="#booking-section"><h4>Room Detail</h4></a>
                    </li>
                    <li class="nav-item" style="    margin: 0px 15px;">
                        <a class="nav-link" style="position:relative; padding:8px;"   href="#location-section"><h4>Location</h4></a>
                    </li>
                    <li class="nav-item" style="    margin: 0px 15px;">
                        <a class="nav-link" style="position:relative; padding:8px;"  href="#tab3"><h4>Amenities</h4></a>
                    </li>
                    <li class="nav-item" style="    margin: 0px 15px;">
                        <a class="nav-link" style="position:relative; padding:8px;"  href="#tab4"><h4>Property Video</h4></a>
                    </li>
                    <li class="nav-item" style="    margin: 0px 15px;">
                        <a class="nav-link" style="position:relative; padding:8px;"  href="#policy-section"><h4>Property Policy</h4></a>
                    </li>
                    <li class="nav-item" style="    margin: 0px 15px;">
                        <a class="nav-link" style="position:relative; padding:8px;"  href="#review-section"><h4>Reviews</h4></a>
                    </li>
                </ul>              
            </div>
        </div>
    </div>
</div>


<section class="booking-section" id="booking-section" >
    <div class="container" style="    background-color: #E8F0F2;
    padding: 14px 15px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-sticky">
                    <div class="row v-centter">
                        <div class="col-md-5">
                            <div class="header-section" >
                                <h3 class="mb-0" style="text-align:left !important">Book your stay</h3>
                                <p class="gray">Select from a range of beautiful rooms</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="v-centter justify-content-end">
                                <div class="dropdown dropdown-toggle red-drop mr-4">USD</div>
                                <div class="calender">
                                    <div class="cal1">Mon 19 Dec, 2022</div>
                                    <div class="pt-2 pl-2 pr-2 gray"><i class="material-icons mr-1">east</i></div>
                                    <div class="cal2">Tue 20 Dec, 2022</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                @if(count($list_of_rooms) > 0 )
                    @foreach($list_of_rooms as $roomdata)

                        <div class="room-section">
                            <div class="rooms">
                                <div class="row no-gutters">
                                    <div class="col-lg-2 col-md-12" style="display:none">
                                        <div class="room-slider">
                                            <div class="room-img"><img data-src="{{url('images/room1/slide1.jpg')}}" src="{{url('images/room1/slide1.jpg')}}" class="lazyload img-fluid" alt="image"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="room-details">
                                            <div class="head">
                                                <div class="">{{$roomdata->name}}<br/><span class="font14 v-centter normal mt-2"><i class="material-icons font16">person</i> X 1</span></div>
                                                <table class="price-table">
                                                    <tr><td>Total Beds :</td><td>{{$roomdata->total_bed_count}}</td></tr>
                                                    <tr><td class="bold">Rent :</td><td class="bold">&#8377; {{$roomdata->price_per_month}} / Month</td></tr>

                                                    <tr><td>Deposit :<br/> @if($roomdata->refundable == 1)<span class="font10">(Refundable)</span> @endif</td><td>&#8377; {{$roomdata->deposit}}</td></tr>

                                                </table>
                                            </div>
                                            <div class="row room-facilities">
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">local_drink</i><span class="font-medium text-sm text-text ">Water Dispenser</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">ac_unit</i><span class="font-medium text-sm text-text ">Air-conditioning</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">room_service</i><span class="font-medium text-sm text-text ">24/7 Reception</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">vpn_key</i><span class="font-medium text-sm text-text ">Lockers</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">hot_tub</i><span class="font-medium text-sm text-text ">Hot water</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">local_laundry_service</i><span class="font-medium text-sm text-text ">Laundry Services (Extra)</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">wifi</i><span class="font-medium text-sm text-text ">Free Wi-Fi</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">payment</i><span class="font-medium text-sm text-text ">Card Payment Accepted</span></div></div>
                                                <div class="col-lg-4 col-md-4 col-sm-6"><div class="amy"><i class="material-icons mr-1">tv</i><span class="font-medium text-sm text-text ">Common Television</span></div></div>
                                            </div>

                                            <div class="availability">
                                                <div class="avail one">Availability Calendar <i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                                <div class="">
                                                    <input type="number" name=""> <label>Month</label><br/>
                                                    <a href="javascript:;" class="book-btn">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cale-slider">
                                <div id="pro-carousel1" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 01</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 02</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 03</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 04</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 05</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 06</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 07</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 08</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="price-box">
                                            <div class="gray font14">MON<br/><span class="font-black">Jan 09</span></div>
                                            <div class="price">$7.23</div>
                                            <div class="font12 bold">18 Units</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                            <div class="flex flex-col items-center justify-center w-72">
                                <img src="https://book.zostel.com/static/media/gray-zobu.018014d9.svg" alt="zobu" class="h-40">
                                <span class="mt-4 font-medium text-lg text-subtitle">No room selected</span>
                            </div>
                            </div>
                        </div>
                    </div>          
                @endif
            </div>
        </div>
    </div>
</section>


 <section class="location-section" id="location-section">
    <div class="container" style="    background: white;
    padding: 15px;">
        <div class="header-section">
            <h3>Locate Us</h3>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="">
                    <p class="font14 gray bold"><strong class="font-black">Address:</strong></p>
                    <p class="font14 gray bold">2032, 17th Main, 1st cross, HAL 2nd stage, Behind Tipsy Bulls Bar, Indiranagar, Bangalore - 560038</p>
                    <p class="font14 gray bold"><strong class="font-black">Contact:</strong> 04440115819</p>
                </div>

                <a href="javascript:;">
                    <div class="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp Us</div>
                </a>

                <div class="accordion_box">
                    <button class="accordion new-acc">Direction</button>
                    <div class="panel">
                        <p class=""><span class="font-black gray">From the Majestic bus stand/KSR Junction:</span> 11 km, 45 min; ~INR 350 (auto) or ~INR 450 (cab) to Stayteller Bangalore.</p>
                        <p class="mt-3"><span class="font-black gray">From the airport:</span> 45 km, 1.5 hr, ~INR 900 (auto) or ~INR 1800 (cab) to Stayteller Bangalore. Alternately, take a Vayu Vajra bus towards the Majestic (Kempegowda) Bus Stand and follow the above instructions.</p>
                        <p class="mt-3 italic">Note: If you need more details, please contact the property.</p>
                    </div>
                </div>

                <a href="javascript:;">
                    <div class="direction"><i class="fa fa-map-o" aria-hidden="true"></i> Get Directions</div>
                </a>
            </div>
            <div class="col-lg-8">
                <iframe title="google-maps-parnter-location" width="100%" height="250" loading="lazy" class="w-full h-64 z-0 rounded-lg sm:mt-0" src="https://www.google.com/maps/embed/v1/place?q=12.964846750305556,77.64206038979783&amp;zoom=12&amp;key=AIzaSyC0VzzsqCWpoAd6YYwhwl_lxX1_GIIaSA8"></iframe>
            </div>
        </div>
    </div>
</section> 
<div class="review-section" id="review-section">
    <div class="container">
        <div class="header-section">
            <h3>Reviews</h3>
        </div>
        @if(count($rows->rating) > 0)
            @foreach ($rows->rating as $item )
          
                <div class="row" style="margin: 20px 0px;
                border-bottom: 1px solid #ff5a5f; padding-bottom: 12px;">
                    <div class="col-md-2 d-flex">                                    
                        <div>
                            @if($item->user->profile_img)
                                <img src="{{asset('images/users/'.$item->user->profile_img)}}" class="review-img">
                            @else
                                <img src="{{asset('images/users/default.jpg')}}" class="review-img">
                            @endif
                        </div>
                        <div class="property-review" style="padding: 10px 10px;">
                            <p>{{$item->user->display_name}}</p>
                            <small class="review-star">
                                @for ($i=1; $i <= $item->rating ; $i++)
                                    <i class="fa fa-star text-thm" aria-hidden="true"></i>
                                @endfor
                                @for ($i=1; $i <= (5 - $item->rating) ;$i++)
                                    <i class="fa fa-star-o text-thm" aria-hidden="true"></i>
                                @endfor
                            </small>
                            {{-- <small class="ml-2">12 views</small> --}}
                        </div>                                    
                    </div>      
                    <div class="col-md-10"> {!! $item->reviewcomments !!} 
                        @if($item->owner_id != null && $item->owner_reply != null)                              
                            {{-- <div class="row"> --}}
                            <div class="d-flex justify-content-start">
                                @if($item->owner->profile_img)
                                    <img src="{{asset('images/users/'.$item->owner->profile_img)}}" style=" width: 90px;
                                    border-radius: 10px;
                                    height: 90px;">
                                                @else
                                    <img src="{{asset('images/users/default.jpg')}}" style="width: 90px;
                                    border-radius: 10px;
                                    height: 90px;">
                                @endif
                                <div class="px-4">
                                    <h5>{{$item->owner->display_name}}</h5>
                                    {!! $item->owner_reply  !!}
                                </div>
                            </div>
                        @endif                        
                    </div>                                    
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-md-12">
                    <h4> No Record Found! </h4>
                </div>  
            </div>
        @endif   
    </div>
</div>
<div class="policy-section" id="policy-section">
    <div class="container">
        <div class="header-section">
            <h3>Property Policy</h3>
        </div>
        <div class="mt-3">
            {!! $rows->policy !!}
        </div>
    </div>
</div> 


<div class="cancellation" id="cencellation">
    <div class="container">
        <div class="header-section">
            <h3>Cancellation Policy</h3>
        </div>
        <div class="mt-4">
            <p>We understand that sometimes plans change. Hence, to make it light on your pocket, we are only charging a 21% advance, which is on a non-refundable basis.</p>
            <p class="mt-4">NOTE:</p>
            <p>- 21% advance payment is non-refundable at all times, as stated above. </p>
            <p>- If you have paid any amount over this 21%, it stands applicable for a credit only if the cancellation is informed 7 days or more in advance. You will be able to avail the credited amount for any future booking at any of our properties.</p>
            <p>- If informed within 7 days of the standard check-in time (12 pm), the amount shall be adjusted against the cancellation fee.</p>
            <p class="mt-4 font-black"><strong>/For Arrivals from 23rd Dec 2022 to 1st Jan 2023:</strong></p>
            <p>- All booking requests will be confirmed at a 100% advance payment at the time of booking.</p>
            <p>- We will be providing full credits on any cancellations received more than 7 days prior to the arrival date. You will be able to avail the credited amount for any future booking at any of our properties.</p>
            <p>- If informed within 7 days of the standard check-in time (12 pm), the entire amount shall be adjusted against the cancellation fee.</p>
            <p>- In case the property is not able to host you due to any local or subjective circumstances, we will provide you with a credit of the same amount. You will be able to avail the credited amount for any future booking at any of our properties. </p>
            <p class="mt-4 mb-2">For any other queries, please reach out to us at reservations@stayteller.com.</p>
        </div>
    </div>
</div>



@section('script')

<script type="text/javascript" src="{{url('js1/custome.js')}}"></script>
<script type="text/javascript" src="{{url('js1/font-5.js')}}"></script>
<script type="text/javascript" src="{{url('js1/magnific.js')}}"></script>
<script type="text/javascript" src="{{url('js1/owl.carousel.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
          $('[data-toggle="tooltip"]').tooltip()
    });

    $(".avail.one").click(function(){
      $(".cale-slider").toggle(200);
      $(".rooms").toggleClass('border-radius');
      $(".room-img .img-fluid").toggleClass('border-radius');
      $(".avail.one i").toggleClass('rotate');
    });

    $(document).ready(function() {
          $('.toggle-btn').click(function(){
            //get collapse content selector
            $(".limit_text").css("display", "none")
            var collapse_content_selector = $(this).attr('href');

            //make the collapse content to be shown or hide
            var toggle_switch = $(this);
            $(collapse_content_selector).toggle(function(){
              if($(this).css('display')=='none'){
                $(".limit_text").css("display", "block")
                                //change the button label to be 'Show'
                toggle_switch.html('Show more');
              }else{
                $(".limit_text").css("display", "none")             //change the button label to be 'Hide'
                toggle_switch.html('Show less');
              }
            });
          });

        });

</script>
<script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>
<script type="text/javascript">
    if ($(".view-all-photo, .inner-box").length) {
        var url;
        $(".view-all-photo, .inner-box").magnificPopup({
            delegate: "a.zoom",
            type: "image",
            tLoading: "Loading image #%curr%...",
            mainClass: "mfp-img-mobile",
            gallery: {
                enabled: true,
                navigateByImgClick: false,
                preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: ("<a href=" % url) % ">The image #%curr%</a> could not be loaded.",
            },
        });
    }

    $('#pro-carousel1').owlCarousel({
        items: 7,
        loop:true,
        margin:0,
        autoplay: false,
        dots: false,
        nav: true,
        navText: ["<span class='owl-prev'><i class='material-icons mr-1'>west</i></span>", "<span class='owl-next'><i class='material-icons mr-1'>east</i></span>"],
        navigation: true,
        responsive: {
            0: {
                items: 3
            },
            411: {
                items: 4
            },
            767: {
                items: 5
            },
            1000: {
                items: 9
            }
        }
    });
</script>

@endsection
@endsection






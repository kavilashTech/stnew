@extends('layouts.user')

<div class="first-head">

</div>

<div id="sticky-header" class="nav-section">
    <nav id="navbar_top" class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img src="images/logo.jpg" class="img-fluid logo-img" alt="image"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
              <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
              @if (Route::has('login'))

                    @auth

                    @else
                    <li class="nav-item"><a class="nav-link red-nav-link" href="{{ route('login') }}">Login</a></li>


                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link red-nav-link" href="{{ route('register') }}">Register</a></li>

                        @endif
                    @endif

            @endif


            </ul>
          </div>
        </div>
    </nav>
</div>


<div class="gallery-section">
    <div class="gallery-box">
        <div class="row no-gutters">
            <div class="col-md-6 bor-right">
                <div class="inner-box">
                    <a href="images/img1.jpg" class="zoom" title="Hotel photo 1">
                        <img data-src="images/img1.jpg" class="img-fluid lazyload" alt="Gallery" />
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="images/img2.jpg" class="zoom" title="Hotel photo 2">
                                <img data-src="images/img2.jpg" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="images/img3.jpg" class="zoom" title="Hotel photo 3">
                                <img data-src="images/img3.jpg" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="images/img4.jpg" class="zoom" title="Hotel photo 4">
                                <img data-src="images/img4.jpg" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row dd-none">
                    <div class="col-md-12">
                        <div class="inner-box">
                            <a href="images/img5.jpg" class="zoom" title="Hotel photo 5">
                                <img data-src="images/img5.jpg" class="img-fluid lazyload" alt="Gallery" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="view-all-photo">
        <a href="images/img3.jpg" class="zoom" title="Hotel photo 1">
            <i class="material-icons mr-2">image</i> View all photos
        </a>
    </div>
</div>


<div class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="header-section">
                    <h2>Supreme Hostel</h2>
                </div>
                <p>Zostel Bangalore offers you a convenient, social stay in Bangalore’s party hub of Indiranagar. It features indoor and outdoor common areas, a quaint cafe for homely meals, and well-equipped workstations. During your stay here, make new friends, network with the minds of India’s silicon valley, and step out to explore the city’s finest cafes, monuments, and streets.</p>
                <div id="collapse1" class="hide-part">
                    <p class="mt-3 gray"><strong>Recommended experiences:</strong></p>
                    <p>Visit Bangalore Palace, Cubbon Park, and Lal Bagh. Shop at MG Road. Indulge in Bangalore’s nightlife. Try the street food. Go to Ulsoor Lake and Nandi Hills.</p>
                </div>
                <button href="#collapse1" class="toggle-btn">Show more</button>
            </div>
            <div class="col-lg-6">
                <div class="header-section">
                    <h3>Amenities</h3>
                    <div class="row no-gutters">
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">vpn_key</i><span class="font-medium text-sm text-text ">Lockers</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">hot_tub</i><span class="font-medium text-sm text-text ">Hot water</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">local_laundry_service</i><span class="font-medium text-sm text-text ">Laundry Services (Extra)</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">wifi</i><span class="font-medium text-sm text-text ">Free Wi-Fi</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">payment</i><span class="font-medium text-sm text-text ">Card Payment Accepted</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">tv</i><span class="font-medium text-sm text-text ">Common Television</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">local_drink</i><span class="font-medium text-sm text-text ">Water Dispenser</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">ac_unit</i><span class="font-medium text-sm text-text ">Air-conditioning</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">room_service</i><span class="font-medium text-sm text-text ">24/7 Reception</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">casino</i><span class="font-medium text-sm text-text ">Common hangout area</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">restaurant</i><span class="font-medium text-sm text-text ">Cafe</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">sports_esports</i><span class="font-medium text-sm text-text ">In-house Activities</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">wb_incandescent</i><span class="font-medium text-sm text-text ">Bedside Lamps</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">free_breakfast</i><span class="font-medium text-sm text-text ">Breakfast (Extra)</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">luggage</i><span class="font-medium text-sm text-text ">Storage Facility</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">layers</i><span class="font-medium text-sm text-text ">Towels on rent</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">airline_seat_individual_suite</i><span class="font-medium text-sm text-text ">Linen Included</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">qr_code_scanner</i><span class="font-medium text-sm text-text ">UPI Payment Accepted</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">shower</i><span class="font-medium text-sm text-text ">Shower</span></div></div>
                        <div class="col-md-4 col-6 pr-2"><div class="amy"><i class="material-icons mr-1">local_parking</i><span class="font-medium text-sm text-text ">Parking (public)</span></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="booking-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-sticky">
                    <div class="row v-centter">
                        <div class="col-md-5">
                            <div class="header-section">
                                <h3 class="mb-0">Book your stay</h3>
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

                <div class="room-section">
                    <div class="rooms">
                        <div class="row no-gutters">
                            <div class="col-lg-2 col-md-12">
                                <div class="room-slider">
                                    <div class="room-img"><img data-src="images/room1/slide1.jpg" class="lazyload img-fluid" alt="image"></div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-12">
                                <div class="room-details">
                                    <div class="head">
                                        <div class="">6 Bed Mixed Dorm (with shared washroom)<br/><span class="font14 v-centter normal mt-2"><i class="material-icons font16">person</i> X 1</span></div>
                                        <table class="price-table">
                                            <tr><td>Total Beds :</td><td>25</td></tr>
                                            <tr><td class="bold">Rent :</td><td class="bold">&#8377; 5500 / Month</td></tr>
                                            <tr><td>Deposit :<br/><span class="font10">(Refundable)</span></td><td>&#8377; 15,000</td></tr>
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

                <div class="room-section">
                    <div class="rooms">
                        <div class="row no-gutters">
                            <div class="col-lg-2 col-md-12">
                                <div class="room-slider">
                                    <div class="room-img"><img data-src="images/room1/slide2.jpg" class="lazyload img-fluid" alt="image"></div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-12">
                                <div class="room-details">
                                    <div class="head">
                                        <div class="">6 Bed Mixed Dorm (with shared washroom)<br/><span class="font14 v-centter normal mt-2"><i class="material-icons font16">person</i> X 1</span></div>
                                        <table class="price-table">
                                            <tr><td>Total Beds :</td><td>25</td></tr>
                                            <tr><td class="bold">Rent :</td><td class="bold">&#8377; 5500 / Month</td></tr>
                                            <tr><td>Deposit :<br/><span class="font10">(Refundable)</span></td><td>&#8377; 15,000</td></tr>
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
                                        <div class="avail">Availability Calendar <i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                        <div class="">
                                            <input type="number" name=""> <label>Month</label><br/>
                                            <a href="javascript:;" class="book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="location-section">
    <div class="container">
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
                        <p class=""><span class="font-black gray">From the Majestic bus stand/KSR Junction:</span> 11 km, 45 min; ~INR 350 (auto) or ~INR 450 (cab) to Zostel Bangalore.</p>
                        <p class="mt-3"><span class="font-black gray">From the airport:</span> 45 km, 1.5 hr, ~INR 900 (auto) or ~INR 1800 (cab) to Zostel Bangalore. Alternately, take a Vayu Vajra bus towards the Majestic (Kempegowda) Bus Stand and follow the above instructions.</p>
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
</div>

<div class="policy-section">
    <div class="container">
    <div class="header-section">
        <h3>Property Policy</h3>
    </div>
        <div class="mt-3">
            <p>- Guests are required to pay a 21% advance at the time of booking itself.</p>
            <p>- We strictly DO NOT allow a group of more than 8 people. In case of a group of 4 or more, you might be purposefully allotted different dorm rooms. Further, if the group behaviour is deemed unfit at the property, the Zostel Property Manager, upon subjective evaluation, retains the full right to take required action which may also result in an on-spot cancellation without refunds.</p>
            <p>- Children below 18 years of age are not permitted entry/stay at any of our hostels, with or without guardians. We do not recommend families.</p>
            <p>- Our standard check-in time is 12 PM and the standard check-out time is 10 AM</p>
            <p>- We only accept a government ID as valid identification proof. No local IDs shall be accepted at the time of check-in.</p>
            <p>- Guests are not permitted to bring outsiders inside the hostel campus.</p>
            <p>- We believe in self-help and do not provide luggage assistance or room services.</p>
            <p>- Drugs and any substance abuse is strictly banned inside and around the property.</p>
            <p>- Alcohol consumption is strictly prohibited in and around the property premises.</p>
            <p>- Right to admission reserved. </p>
        </div>
    </div>
</div>


<div class="cancellation">
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
            <p class="mt-4 mb-2">For any other queries, please reach out to us at reservations@zostel.com.</p>
        </div>
    </div>
</div>

<div class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg col-md-12">
                <div class="mb-3"><img data-src="images/logo.jpg" class="lazyload img-fluid" alt="image"></div>
                <p class="white">The website ends here, but your journey to the remotest destinations in India and Nepal begins with Zostel. Explore with our social hostels, homestays, and luxury stays on your next holiday.</p>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="foot-link">USEFUL LINKS</div>
                <div class="row">
                    <div class="col-md-4">
                        <p><a href="javascript:;">Guest Policy</a></p>
                        <p><a href="javascript:;">Privacy Policy</a></p>
                        <p><a href="javascript:;">Careers</a></p>
                    </div>
                    <div class="col-md-4">
                        <p><a href="javascript:;">Destinations</a></p>
                        <p><a href="javascript:;">Franchise</a></p>
                        <p><a href="javascript:;">Contact Us</a></p>
                        <p><a href="javascript:;">Cookie Policy</a></p>
                    </div>
                    <div class="col-md-4">
                        <p><a href="javascript:;">About Us</a></p>
                        <p><a href="javascript:;">Support</a></p>
                        <p><a href="javascript:;">Terms</a></p>
                        <p><a href="javascript:;">Mobile app</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6">
                <div class="foot-link">DOWNLOAD OUR MOBILE APP</div>
                <div class="playstore">
                    <div class=""><img data-src="images/apple.png" class="lazyload img-fluid" alt="image"></div>
                    <div class=""><img data-src="images/google.png" class="lazyload img-fluid" alt="image"></div>
                </div>
                <div class="social">
                    <div class=""><a href="javascript:;"><img data-src="images/facebook.png" class="lazyload img-fluid" alt="image"></a></div>
                    <div class=""><a href="javascript:;"><img data-src="images/insta.png" class="lazyload img-fluid" alt="image"></a></div>
                    <div class=""><a href="javascript:;"><img data-src="images/twitter.png" class="lazyload img-fluid" alt="image"></a></div>
                    <div class=""><a href="javascript:;"><img data-src="images/youtube.png" class="lazyload img-fluid" alt="image"></a></div>
                </div>
                <div class="copyright">Zostel © 2022. All Rights Reserved</div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->


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
            var collapse_content_selector = $(this).attr('href');

            //make the collapse content to be shown or hide
            var toggle_switch = $(this);
            $(collapse_content_selector).toggle(function(){
              if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
                toggle_switch.html('Show more');
              }else{
                                //change the button label to be 'Hide'
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







<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


</html>

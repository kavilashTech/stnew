@extends('layouts.user')

<link rel="stylesheet" href="{{url('css1/style.css')}}"/>
<link rel="stylesheet" href="{{url('css1/aos.css')}}">
<link rel="stylesheet" href="{{url('css1/magnific.css')}}">
<link rel="stylesheet" href="{{url('css1/owl.css')}}"/>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
<style>

<style type="text/css">
        .cursor-pointer {
            cursor: pointer;
        }

        .bg-info.bg-lighten {
            background-color: #e5f4f7 !important;
        }



        .btn-outline-secondary {
            color: #6c757d !important;
        }

        .btn-outline-secondary:hover {
            color: #fff !important;
        }

        .roomAvailabilityCalendar {
            position: relative !important;
        }

        .card{
            background-color: #fff;
            box-shadow: 2px 2px 8px  #9d9898!important;

            }
        .card:hover {
            box-shadow: 2px 2px 10px  #000000!important;
        }

        .btn-thm-1 {
            color: #fff;
        }

        .roomAvailabilityCalendar-actionContainer-left,
        .roomAvailabilityCalendar-actionContainer-right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .roomAvailabilityCalendar-actionContainer-left {
            left: -5px;
        }

        .roomAvailabilityCalendar-actionContainer-right {
            right: -5px;
        }

        .roomAvailabilityCalendar-date:hover {
            background-color: #80808026;
        }

        .col-1-7 {
            flex: 14%;
            max-width: 14%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }
        .col-1-7.roomAvailabilityCalendar-date.text-center.activeRoomdata {
    background: #fafafa;
    border: 1px solid #e1e1e1;
    border-radius: 8px;
}
        .hideclass.text-thm.fz14 {
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
    font-weight: 400;
}
</style>

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
                            <!-- <div class="v-centter justify-content-end">
                                <div class="dropdown dropdown-toggle red-drop mr-4">USD</div>
                                <div class="calender">
                                    <div class="cal1">Mon 19 Dec, 2022</div>
                                    <div class="pt-2 pl-2 pr-2 gray"><i class="material-icons mr-1">east</i></div>
                                    <div class="cal2">Tue 20 Dec, 2022</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                @if(count($list_of_rooms) > 0 )
                @foreach($list_of_rooms as $roomdata)


                <div class="room-section">
                    <div class="rooms ">
                        <div class="row no-gutters">
                            <div class="col-lg-2 col-md-12">
                                <div class="room-slider">
                                    <div class="room-img"><img data-src="{{url('images/room1/slide1.jpg')}}" src="{{url('images/room1/slide1.jpg')}}" class="lazyload img-fluid" alt="image"></div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-12 roomContainer">
                                <div class="room-details">
                                    <div class="head">
                                        <div class="">{{$roomdata->name}}<br/><span class="font14 v-centter normal mt-2"><i class="material-icons font16">person</i> X 1</span></div>
                                        <table class="price-table">
                                            <tr><td>Total Beds :</td>
											<td>{{$roomdata->total_bed_count}}</td>
											</tr>
                                            <tr><td class="bold">Rent :</td><td class="bold">&#8377; {{$roomdata->price_per_month}} / Month</td></tr>

                                            <tr><td>Deposit :<br/> @if($roomdata->refundable == 1)<span class="font10">(Refundable)</span> @endif</td>
											<td>&#8377; {{$roomdata->deposit}}</td></tr>

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
                                    <span class="text-xs flex items-center font-semibold text-orange cursor-pointer btnBookRoom avail one" data-roomid = "{{$roomdata->id}}" data-propertyid = "{{$roomdata->property_id}}">Availability calendar<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 ml-1"><path d="M18 15l-6-6-6 6"></path></svg></span>
                                        <div class="avail one">Availability Calendar <i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                        <div class="">
                                            <input type="number" name=""> <label>Month</label><br/>
                                            <a href="javascript:;" class="book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                                <div class="col-12 roomAvailabilityCalendar"></div>
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
                </div>
                @endif

               
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
</div>

<div class="policy-section">
    <div class="container">
    <div class="header-section">
        <h3>Property Policy</h3>
    </div>
        <div class="mt-3">
        {!! $rows->policy !!}

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
            <p class="mt-4 mb-2">For any other queries, please reach out to us at reservations@stayteller.com.</p>
        </div>
    </div>
</div>



@endsection


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


    var ajaxReady = 1;
        function addDaysToDateObj(dateObj, days) {
            return new Date(new Date(dateObj.getFullYear(), dateObj.getMonth(), dateObj.getDate()).setDate(new Date(dateObj.getFullYear(), dateObj.getMonth(), dateObj.getDate()).getDate() + days));
        }

        function dateStrToObj(dateStr) {
            let dateArray = dateStr.split('-');
            return new Date(dateArray[0], dateArray[1] - 1, dateArray[2]);
        }

        function dateObjToStr(dateObj, humanReadable = false) {
            if (humanReadable) {
                return `${dateObj.getDate()}-${dateObj.getMonth() + 1}-${dateObj.getFullYear()}`;
            }

            return `${dateObj.getFullYear()}-${dateObj.getMonth() + 1}-${dateObj.getDate()}`;
        }

        // Temporary function - remove when implementing actual data
        function generateRandomRoomAvailabilityData(btnb) {
            let n=90;
           let roomid = btnb.data('roomid');
            let propertyid = btnb.data('propertyid');

            $.ajax({
                    url: "{{route('property.availabilty')}}",
                    data: {
                        roomid: roomid,
                        propertyid: propertyid,
                        _token: "{{csrf_token()}}",
                    },
                    dataType: 'json',
                    type: 'post',
                    beforeSend: function (xhr) {
                        ajaxReady = 0;
                    },
                    success: function (res) {
                        renderRoomAvailabilityCalendar(btnb.closest('.roomContainer').find('.roomAvailabilityCalendar'),res);



                    },
                    error:function () {
                        ajaxReady = 1;
                    }
                })


        }

        /**
         * @param availableDates - should be Array of Objects( date: 'YYYY-MM-DD', fare: AMOUNT )
         * */
        function renderRoomAvailabilityCalendar(calendarContainer, availableDates, startDate = false) {

            const daysInWeek = [
                'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
            ];
            const months = [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ];
            let roomContainer = calendarContainer.closest('.roomContainer');

            if (availableDates && Array.isArray(availableDates) && availableDates.length > 0) {
                let availableDatesHTML = '';
                let prevWeekAvailable = false;
                let minDate = new Date();

                availableDates.forEach(function(availableDate, index) {
                    let dateObj = dateStrToObj(availableDate['date']);

                    if (dateObj < minDate) {
                        minDate = dateObj;
                    }

                    availableDate['dateObj'] = dateObj;

                    availableDates[index] = availableDate;
                });

                if (startDate) {
                    prevWeekAvailable = startDate > minDate;
                } else {
                    // Set start date - first time
                    startDate = minDate;

                    calendarContainer.prop('availableDates', availableDates);
                }

                let daysRendered = 0;
                let endDateStr = '';

                while(daysRendered < daysInWeek.length) {
                    let dateObj = addDaysToDateObj(startDate, daysRendered);
                    let dateStr = dateObjToStr(dateObj);
                    let availableDate = null;

                    availableDates.forEach(function(tempAvailableDate) {
                        if (tempAvailableDate['dateObj'].getTime() == dateObj.getTime()) {
                            availableDate = tempAvailableDate;
                            console.log(availableDate);
                            return;
                        }
                    });



                    let calendarHTML =  `<div class="col-1-7 roomAvailabilityCalendar-date text-center  emptyroom_`+availableDate['fare']+`" data-date="${dateStr}">`+
                                            `<div class="row">`+
                                                `<div class="col-12">`+
                                                    daysInWeek[dateObj.getDay()]+
                                                `</div>`+
                                            `</div>`+
                                            `<div class="row">`+
                                                `<div class="col-12">`+
                                                    `<b>` + months[dateObj.getMonth()] + ` ` + dateObj.getDate() + `</b>`+
                                                `</div>`+
                                            `</div>`+
                                            `<div class="row">`+
                                                `<div class="col-12 roomAvailablecount">`+
                                                    (availableDate ? `<span class="text-danger">` + availableDate['fare'] + `</span>` : `-`)+
                                                `</div>`+
                                            `</div>`+
                                        `</div>`;

                    if ((daysInWeek.length - 1) == daysRendered) {
                        let nextWeekStartDate = addDaysToDateObj(dateObj, 1);
                        endDateStr = dateObjToStr(nextWeekStartDate);
                    }

                    availableDatesHTML += calendarHTML;

                    daysRendered++;
                }

                if (prevWeekAvailable) {
                    let prevWeekStartDate = addDaysToDateObj(startDate, daysInWeek.length * -1);
                    let prevWeekStartDateStr = dateObjToStr(prevWeekStartDate);

                    availableDatesHTML +=   `<div class="roomAvailabilityCalendar-actionContainer-left">`+
                                                `<a href="javascript:void(0);" class="btn btn-danger btnShowPreviousWeek" data-date="${prevWeekStartDateStr}"><i class="fa fa-arrow-left"></i></a>`+
                                            `</div>`;
                }

                availableDatesHTML +=   `<div class="roomAvailabilityCalendar-actionContainer-right">`+
                                            `<a href="javascript:void(0);" class="btn btn-danger btnShowNextWeek" data-date="${endDateStr}"><i class="fa fa-arrow-right"></i></a>`+
                                        `</div>`;

                calendarContainer.html(`<div class="row justify-content-center mt-2">${availableDatesHTML}</div>`);
            } else {
                calendarContainer.html('<span class="text-danger"><em>Cannot find available dates</em></span>');
                roomContainer.find('.btnCancelRoomBooking').addClass('d-none');
            }
        }

    jQuery(function ($) {
            $(document).on('click', '.btnBookRoom', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        let roomContainer = $(this).closest('.roomContainer');


                        roomContainer.find('.card-footer').removeClass('d-none');
                        roomContainer.find('.btnCancelRoomBooking').removeClass('d-none');
                        $(this).addClass('d-none');


                        generateRandomRoomAvailabilityData($(this));


                    });

                        $(document).on('click', '.btnCancelRoomBooking', function(e) {
                            e.preventDefault();
                            e.stopPropagation();

                            let roomContainer = $(this).closest('.roomContainer');
                            roomContainer.find('.card-footer').addClass('d-none');
                            roomContainer.find('.btnBookRoom').removeClass('d-none');
                            $(this).addClass('d-none');
                        });

                        $(document).on('click', '.roomContainer .roomAvailabilityCalendar .btnShowPreviousWeek, .roomContainer .roomAvailabilityCalendar .btnShowNextWeek', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            $('.roomAvailabilityCalendar-date').removeClass('activeRoomdata');

                            let calendarContainer = $(this).closest('.roomAvailabilityCalendar');
                            let dateObj = dateStrToObj($(this).attr('data-date'));

                            renderRoomAvailabilityCalendar(calendarContainer, calendarContainer.prop('availableDates'), dateObj);
                        });

            $(document).on('click', '.roomContainer .roomAvailabilityCalendar .roomAvailabilityCalendar-date', function(e) {
                e.preventDefault();
                e.stopPropagation();

                let calendarContainer = $(this).closest('.roomAvailabilityCalendar');
                let dateObj = dateStrToObj($(this).attr('data-date'));
                let dateAvailability = null;

                let roomid = $(this).closest('.roomContainer').find('.btnBookRoom').attr('data-roomid');
                let propertyid =$(this).closest('.roomContainer').find('.btnBookRoom').attr('data-propertyid');
                var date = new Date(dateObj);
                var formatsate = date.toLocaleDateString();
                var date = new Date(formatsate).toDateString("yyyy-MM-dd");
                (calendarContainer.prop('availableDates') || []).forEach(function(tempDateAvailability) {
                    if (tempDateAvailability['dateObj'].getTime() == dateObj.getTime()) {
                        dateAvailability = tempDateAvailability;
                        return;
                    }
                });

                if (dateAvailability) {
                    $(this).addClass('activeRoomdata');
                    $(this).attr("data-availablecount", dateAvailability.fare);
                    $(this).attr("data-roomid", roomid);
                    $(this).attr("data-property", propertyid);





                } else {
                    alert(`Sorry, It is not available on ${dateObjToStr(dateObj, true)}`);
                }
            });
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






@extends('layouts.user')

<link rel="stylesheet" href="{{url('css1/style.css')}}" />
<link rel="stylesheet" href="{{url('css1/aos.css')}}">
<link rel="stylesheet" href="{{url('css1/magnific.css')}}">
<link rel="stylesheet" href="{{url('css1/owl.css')}}" />


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

@section('content')


<div class="image-box" style="position: relative">
    <img src="{{asset('images/aboutus.jpg')}}" width="100%" height="250px">
</div>
<!-- <div class="about-section">
        <div class="container">
            <div class="header-section">
                <h3>Property Policy</h3>
            </div>
            <div class="mt-3"> At StayTeller, we are dedicated to providing our customers with the highest quality products and services. We are a team of passionate professionals who believe that by working together, we can create amazing results.
            </div>
        </div>
    </div> -->
<div class="about-section about-bg-dark">
    <div class="container">
        <div class="header-section">
            <h3>About Us</h3>
        </div>
        <div class="mt-3 px-5"> Our world is rapidly shrinking where there is a lot of movement of people. There is an increased need for safe and affordable stay. We the brain behind this idea are social entrepreneurs with an ambition to ensure that safe and affordable stay will be a reality one day.
        </div>
    </div>
</div>
<div class="about-section about-bg-dark">
    <div class="container">
        <div class="header-section">
            <h3>Our Mission for the above mentioned Vision is</h3>
        </div>
        <div class="mt-3 px-5">
            <ul style="list-style:numbered">
                <li>Empower stay place providers like hostel,paying guest accomodation,mansion owners so that they can provide safe and affordable stay</li>
                <li>Protect the accommodation seekers of their interests by providing valuable insights to the stay place providers</li>
                <li>We will also ensure that legal requirements of the country in which we operate is fulfilled.</li>
            </ul>
        </div>
    </div>
</div>
<div class="about-section ">
    <div class="container">
        <div class="header-section">
            <h3>Our Team</h3>
        </div>
        <div class="mt-3 px-5"> Our team is made up of highly skilled and dedicated professionals who are committed to delivering the best possible products and services to our customers. We believe in working together and supporting each other to achieve our goals.
            <div class="row mt-2" style="justify-content:center;">
                <div class="col-3" style="max-width:20%">
                    <div class="card  aboutus-image">
                        <img src="{{asset('images/sathiya.jpg')}}" alt="Sathiya" style="width:100%">
                        <div class="container">
                            <h3 class="mt-3">Sathiya Paul deepak</h3>
                            <!-- <p class="title">CEO & Founder</p> -->
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>example@example.com</p>
                            <!-- <p><button class="button">Contact</button></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-3" style="max-width:20%">
                    <div class="card aboutus-image">
                        <img src="{{asset('images/surjit.png')}}" alt="Surjit" style="width:100%">
                        <div class="container">
                            <h3 class="mt-3">Surjit</h3>
                            <!-- <p class="title">CEO & Founder</p> -->
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>example@example.com</p>
                            <!-- <p><button class="button">Contact</button></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-3" style="max-width:20%">
                    <div class="card aboutus-image">
                        <img src="{{asset('images/steve.jpg')}}" alt="Steven" style="width:100%">
                        <div class="container">
                            <h3 class="mt-3">Steven christiyaan</h3>
                            <!-- <p class="title">CEO & Founder</p> -->
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>example@example.com</p>
                            <!-- <p><button class="button">Contact</button></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@extends('layouts.user')

<link rel="stylesheet" href="{{url('css1/style.css')}}"/>
<link rel="stylesheet" href="{{url('css1/aos.css')}}">
<link rel="stylesheet" href="{{url('css1/magnific.css')}}">
<link rel="stylesheet" href="{{url('css1/owl.css')}}"/>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

@section('content')


    <div class="image-box" style="position: relative">
        <img  src="{{asset('images/aboutus.jpg')}}" width= "100%" height= "500px"> 
    </div>
    <div class="about-section">
        <div class="container">
            <div class="header-section">
                <h3>Property Policy</h3>
            </div>
            <div class="mt-3"> At StayTeller, we are dedicated to providing our customers with the highest quality products and services. We are a team of passionate professionals who believe that by working together, we can create amazing results.
            </div>
        </div>
    </div>
    <div class="about-section about-bg-dark" >
        <div class="container">
        <div class="header-section">
            <h3>Our Mission</h3>
        </div>
        <div class="mt-3">  Our mission at StayTeller, is to provide our customers with the best possible products and services that meet their needs and exceed their expectations. We are committed to maintaining the highest level of quality and customer service in everything we do.
        </div>
    </div>
    </div>
    <div class="about-section ">
        <div class="container">
            <div class="header-section">
            <h3>Our Team</h3>
        </div>
        <div class="mt-3"> Our team is made up of highly skilled and dedicated professionals who are committed to delivering the best possible products and services to our customers. We believe in working together and supporting each other to achieve our goals.
        </div>
        </div>
    </div>
    <div class="about-section about-bg-dark" >
        <div class="container">
            <div class="header-section">
            <h3>Our Commitment to Quality</h3>
        </div>
        <div class="mt-3"> 
            At StayTeller, we are committed to maintaining the highest level of quality in everything we do. We believe that quality is the key to customer satisfaction, and we strive to exceed our customers' expectations every time.
        </div>
    </div>
</div>
</div>
@endsection






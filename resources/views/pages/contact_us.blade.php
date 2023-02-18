@extends('layouts.user')

<link rel="stylesheet" href="{{url('css1/style.css')}}"/>
<link rel="stylesheet" href="{{url('css1/aos.css')}}">
<link rel="stylesheet" href="{{url('css1/magnific.css')}}">
<link rel="stylesheet" href="{{url('css1/owl.css')}}"/>
<link rel="stylesheet" href="{{url('css1/bootstrap.min.css')}}"/>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

@section('content')
<div class="contact-us-section">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="wrapper">
    <div class="row no-gutters">
    <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch" style="background-color: #f8f9fa; border-radius: 0px 50px 50px 0px;">
    <div class="contact-wrap w-100 p-md-5 p-4">
    <h3 class="mb-4">Get in touch</h3>
    <div id="form-message-warning" class="mb-4"></div>
    <div id="form-message-success" class="mb-4">
    Your message was sent, thank you!
    </div>
    <form method="POST" id="contactForm" name="contactForm" class="contactForm" novalidate="novalidate">
    <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="label" for="name">First Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" fdprocessedid="r0rqaa">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="label" for="name">Last Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" fdprocessedid="r0rqaa">
      </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label class="label" for="email">Email Address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" fdprocessedid="vz6yti">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label class="label" for="subject">Phone number</label>
    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" fdprocessedid="1d9p4f">
    </div>
    </div>
    
    <div class="col-md-12">
    <div class="form-group">
    <label class="label" for="#">Message</label>
    <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
    </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
    <input type="submit" value="Send Message" class="btn btn-thm" fdprocessedid="guotk8">
    <div class="submitting"></div>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
    <div class="info-wrap w-100 p-md-5 p-4" style=" border-radius: 50px 0px 0px 50px; color:white;     background-color: #e75786;">
    <h3 style="color:white">Let's get in touch</h3>
    <p class="mb-4" style="color:white" ></p>We're open for any suggestion or just to have a chat</p>
    <div class="dbox w-100 d-flex align-items-start">
    <div class="icon d-flex align-items-center justify-content-center">
    <span class="fa fa-map-marker"></span>
    </div>
    <div class="text pl-3">
    <p style="color:white"> <span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
    </div>
    </div>
    <div class="dbox w-100 d-flex align-items-center">
    <div class="icon d-flex align-items-center justify-content-center">
    <span class="fa fa-phone"></span>
    </div>
    <div class="text pl-3">
    <p style="color:white"><span>Phone:</span> <a href="tel://1234567920" style="color:white">+ 1235 2355 98</a></p>
    </div>
    </div>
    <div class="dbox w-100 d-flex align-items-center">
    <div class="icon d-flex align-items-center justify-content-center">
    <span class="fa fa-paper-plane"></span>
    </div>
    <div class="text pl-3">
    <p style="color:white"><span>Email:</span> <a href="mailto:info@yoursite.com" style="color:white">info@yoursite.com</a></p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
</div>
    
@endsection






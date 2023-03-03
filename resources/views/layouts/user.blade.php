<!DOCTYPE html>
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StayTeller</title>
    <link rel="icon" type="png" href="{{url('icon/favicon.png')}}">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{url('css/main.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('css/responsive.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('css2/font-awesome.min.css')}}" type="text/css" />
    @yield('head')
</head>

<body>
    <div class="wrapper mt-0 pt-0">
        <!-- Header -->
        @include('layouts.header')
        @yield('content')

    </div>

    <!-- Our Footer -->
    <section class="footer_one">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer_about_widget">
                        <h4>About Site</h4>
                        <p>
                            We’re reimagining how you buy, sell and rent. It’s now easier to
                            get into a place you love. So let’s do this, together.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer_about_widget">
                        <h4>COMPANY</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Community Blog</a></li>
                            <li><a href="#">Rewards</a></li>
                            <li><a href="#">Work with Us</a></li>
                            <li><a href="#">Meet the Team</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer_about_widget">
                        <h4>SUPPORT</h4>
                        <ul>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Legal</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer_about_widget">
                        <h4>Follow us</h4>
                        <ul class="mb30">
                            <li class="list-inline-item footer-social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item footer-social-icon">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item footer-social-icon">
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li class="list-inline-item footer-social-icon">
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li class="list-inline-item footer-social-icon">
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                            <li class="list-inline-item footer-social-icon">
                                <a href="#"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                        <h4>Subscribe</h4>
                        <form class="footer_mailchimp_form">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <input type="email" name="email" class="form-control mb-2" id="inlineFormInput" placeholder="Your email" />
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">
                                        <i class="fa fa-angle-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-mess"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Footer Bottom Area -->
    <section class="footer_middle_area pt40 pb40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="footer_menu_widget">
                        <ul>
                            <li class=" depth-0">
                                <a  target="" href="{{ url("/") }}" >Home</a>
                                <ul class="children-menu menu-dropdown">
                                    <li class=" depth-1"><a target="" href="/">Home 1</a></li>
                                    <li class=" depth-1"><a target="" href="#">Home 3</a></li>
                                    <li class=" depth-1"><a target="" href="#">Home 5</a></li>
                                    <li class=" depth-1"><a target="" href="#">Home 6</a></li>
                                    <li class=" depth-1"><a target="" href="#">Home 8</a></li>
                                    <li class=" depth-1"><a target="" href="#">Home 10</a></li>
                                </ul>
                            </li>
                            <li class=" depth-0">
                                <a target="" href="#">Property</a>
                                <ul class="children-menu menu-dropdown">
                                    <li class=" depth-1">
                                        <a target="" href="#">Property List</a>
                                        <ul class="children-menu menu-dropdown">
                                            <li class=" depth-2"><a target="" href="#">Property List V1</a></li>
                                            <li class=" depth-2"><a target="" href="#">Property List V2</a></li>
                                        </ul>
                                    </li>
                                    <li class=" depth-1">
                                        <a target="" href="#">Property Detail</a>
                                        <ul class="children-menu menu-dropdown">
                                            <li class=" depth-2">
                                                <a target="" href="#">Property Detail V1</a>
                                            </li>
                                            <li class=" depth-2">
                                                <a target="" href="#">Property Detail V2</a>
                                            </li>
                                            <li class=" depth-2">
                                                <a target="" href="#">Property Detail V3</a>
                                            </li>
                                            <li class=" depth-2">
                                                <a target="" href="#">Property Detail V4</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class=" depth-0">
                                <a target="" href="#">Agencies</a>
                                <ul class="children-menu menu-dropdown">
                                    <li class=" depth-1"><a target="" href="#">Agencies</a></li>
                                    <li class=" depth-1"><a target="" href="#">Agency Detail</a></li>
                                    <li class=" depth-1"><a target="" href="#">Agent List</a></li>
                                    <li class=" depth-1"><a target="" href="#">Agent Detail</a></li>
                                </ul>
                            </li>
                            <li class=" depth-0">
                                <a target="" href="#">Page</a>
                                <ul class="children-menu menu-dropdown">
                                    <li class=" depth-1"><a target="" href="#">News</a></li>
                                    <li class=" depth-1"><a target="" href="#">News Detail</a></li>
                                    <li class=" depth-1"><a target="" href="#">Contact</a></li>
                                    <li class=" depth-1"><a target="" href="#">About</a></li>
                                    <li class=" depth-1"><a target="" href="#">Become a agent</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="copyright-widget text-right">
                        <p>
                        <p>&copy; Stayteller. Service with love</p>
                        <div class="f-visa">

                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- login popup -->
    <div class="sign_up_modal modal fade bd-example-modal-lg" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body container pb20">
                    <div class="tab-content container" id="myTabContent">
                        <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_thumb">
                                    <img class="img-fluid w100" src="{{url('images/login.jpg')}}" alt="login.jpg">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_form">
                                    <form action="" class="bravo-form-login" method="POST">
                                        <input type="hidden" name="_token" value="35R7aGPos5A2gigPwSyuiL2m8rwAzeOUZoMAzytj">
                                        <div class="heading">
                                            <h4>Login</h4>
                                        </div>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="email" autocomplete="off" placeholder="Email">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-email"></span>
                                        </div>
                                        <div class="input-group form-group">
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="off" placeholder="Password">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-password"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me" value="1">
                                                <span class="custom-control-label" for="exampleCheck1">Remember me</span>
                                            </label>

                                            <a class="btn-fpswd float-right" href="#">Lost your password?</a>
                                        </div>
                                        <div class="error message-error invalid-feedback"></div>
                                        <span style="color: red;cursor: pointer; display: none;" class="resentmail user mb-2">Resent Mail</span>
                                        <button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
                                        <p class="text-center">Do not have an account? <a class="text-thm" href="javascript:void(0)" data-target="#register" data-toggle="modal">Register</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <!-- owner-login -->
    <div class="sign_up_modal modal fade bd-example-modal-lg" id="owner-login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body container pb20">
                    <div class="tab-content container" id="myTabContent">
                        <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_thumb">
                                    <img class="img-fluid w100" src="{{url('images/login.jpg')}}" alt="login.jpg">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_form">
                                    <form action="" class="bravo-form-login" method="POST" id="owner-login-form">
                                        {{-- <input type="hidden" name="_token" value="35R7aGPos5A2gigPwSyuiL2m8rwAzeOUZoMAzytj"> --}}
                                        <div class="heading">
                                            <h4>Login</h4>
                                            <div class="col-md-12 " id="errorBox"></div>
                            <div class="col-md-12 " id="successBox"></div>
                                        </div>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="email" class="form-control" id="inlineFormInputGroupUsername2" name="email" autocomplete="off" placeholder="Email" required>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-email"></span>
                                        </div>
                                        <div class="input-group form-group">
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="off" placeholder="Password" required>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-password"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me" value="1">
                                                <span class="custom-control-label" for="exampleCheck1">Remember me</span>
                                            </label>

                                            <a class="btn-fpswd float-right" href="#">Lost your passwor
                                                d?</a>
                                        </div>
                                        <div class="error message-error invalid-feedback"></div>
                                        <span style="color: red;cursor: pointer;display: none;" class="resentmail owner mb-2">Resent Mail</span>
                                        <button type="button" class="btn btn-log btn-block btn-thm " id="owner-login-btn">Log In</button>
                                        <p class="text-center">Do not have an account? <a class="text-thm" href="javascript:void(0)" data-target="#agentregister" data-toggle="modal">Register</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- register -->
    <div class="sign_up_modal modal fade bd-example-modal-lg" id="register" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body container pb20">
                    <div class="tab-content container" id="myTabContent">
                        <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_thumb">
                                    <img class="img-fluid w100" src="{{url('images/login.jpg')}}" alt="login.jpg">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="sign_up_form">
                                    <div class="heading">
                                        <h4>Register</h4>
                                    </div>
                                    <form action="#" class="form bravo-form-register" method="post">
                                    @csrf
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" name="first_name" autocomplete="off" placeholder="First Name">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-first_name"></span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" name="last_name" autocomplete="off" placeholder="Last Name">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-last_name"></span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email address">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-email"></span>
                                        </div>

                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="exampleInputPassword2" name="password" autocomplete="off" placeholder="Password">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-password"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-password"></span>
                                        </div>
                                        <div class="form-group custom-control custom-checkbox" style="display:none">
                                            <input type="radio" id="role" name="type_role" value="customer" checked>
                                              <label for="role">Customer</label>
                                            <input type="radio" id="owner" name="type_role" value="agent">
                                              <label for="owner">Owner</label>
                                            <span class="invalid-feedback error error-type_role"></span>

                                        </div>

                                        <div class="form-group custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="term" id="exampleCheck2">
                                            <label class="custom-control-label" for="exampleCheck2">I have read and accept the Terms and Privacy Policy?</label>
                                        </div>
                                        <div><span class="invalid-feedback error error-term"></span></div>

                                        <div class="error message-error invalid-feedback"></div>
                                        <button type="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
                                        <p class="text-center">Already have an account? <a class="text-thm" href="javascript:void(0)" data-target="#login" data-toggle="modal">Log In</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- agent register -->
    <div class="sign_up_modal modal fade bd-example-modal-lg" id="agentregister" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body container pb20">
                    <div class="tab-content container" id="myTabContent">
                        <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_thumb">
                                    <img class="img-fluid w100" src="{{url('images/login.jpg')}}" alt="login.jpg">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="sign_up_form">
                                    <div class="heading">
                                        <h4>Owner Register</h4>
                                    </div>
                                    <form action="#" class="form bravo-form-register-owner" method="post">
                                        <input type="hidden" name="_token" value="35R7aGPos5A2gigPwSyuiL2m8rwAzeOUZoMAzytj">
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" name="first_name" autocomplete="off" placeholder="First Name">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-first_name"></span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" name="last_name" autocomplete="off" placeholder="Last Name">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-last_name"></span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email address">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-email"></span>
                                        </div>

                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="exampleInputPassword2" name="password" autocomplete="off" placeholder="Password">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-password"></i></div>
                                            </div>
                                            <span class="invalid-feedback error error-password"></span>
                                        </div>
                                        <div class="form-group custom-control custom-checkbox" style="display:none">

                                            <input type="radio" id="owner" name="type_role" value="Owner" checked>
                                              <label for="owner">Owner</label>
                                            <span class="invalid-feedback error error-type_role"></span>

                                        </div>

                                        <div class="form-group custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="term" id="exampleCheck12">
                                            <label class="custom-control-label" for="exampleCheck12">I have read and accept the Terms and Privacy Policy?</label>
                                        </div>
                                        <div><span class="invalid-feedback error error-term"></span></div>

                                        <div class="error message-error invalid-feedback"></div>
                                        <button type="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
                                        <p class="text-center">Already have an account? <a class="text-thm" href="javascript:void(0)" data-target="#login" data-toggle="modal">Log In</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>

    <script type="text/javascript" src="{{url('js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.mmenu.all.js')}}"></script>
    <script type="text/javascript" src="{{url('js/ace-responsive-menu.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery-scrolltofixed-min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/main.js')}}"></script>
    <script type="text/javascript" src="{{url('js/custome.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{url('js/additional-methods.js')}}"></script>
    <script>
         $('#register').on('show.bs.modal', function(event) {
        $('#login').modal('hide')
    })
    
    $('#login').on('show.bs.modal', function(event) {
        $('#register').modal('hide')
    });


    $('.bravo-form-register [type=submit]').click(function(e) {
        e.preventDefault();
        let form = $(this).closest('.bravo-form-register');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': form.find('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': "",
            'data': {
                'email': form.find('input[name=email]').val(),
                'password': form.find('input[name=password]').val(),
                'first_name': form.find('input[name=first_name]').val(),
                'last_name': form.find('input[name=last_name]').val(),
                'phone': form.find('input[name=phone]').val(),
                'type_role': form.find('input[name=type_role]').is(":checked") ? $("input:radio[name=type_role]:checked").val() : '' ,
                'term': form.find('input[name=term]').is(":checked") ? 1 : '',
            },

            'type': '',
            beforeSend: function() {
                form.find('.error').hide();
                form.find('.icon-loading').css("display", 'inline-block');
            },
            success: function(data) {
                form.find('.icon-loading').hide();
                if (data.error === true) {
                    if (data.messages !== undefined) {
                        for (var item in data.messages) {
                            var msg = data.messages[item];
                            form.find('.error-' + item).show().text(msg[0]);
                        }
                    }
                    if (data.messages.message_error !== undefined) {
                        form.find('.message-error').show().html('<div class="alert alert-danger">' + data.messages.message_error[0] + '</div>');
                    }
                }
                if (data.redirect !== undefined) {
                    window.location.href = data.redirect
                }
            },
            error: function(e) {
                form.find('.icon-loading').hide();
                if (typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message != 'undefined') {
                    form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                }
            }
        });
    });

    // Owner login

$('#owner-login-btn').click(function(e){
    e.preventDefault();
        let form = $(this).parents('#owner-login-form');
        console.log('df',form);
        $('#successBox').html('');
        $('#errorBox').html('');

        $(this).attr("disabled",true);
        $.ajax({
            'url': "{{route('owner.login')}}",
            'data': {
                'email': form.find('input[name=email]').val(),
                'password': form.find('input[name=password]').val()               
            },
            'type': 'post',
            headers:{
                'accept':'application-json',
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            success: function(data) {
                let html = '';
                if(data.status == true){
                    html = `<div class="alert alert-success">${data.message}</div>`;
                    // setTimeout(function(){
                        let route = "{{route('owner.dashboard')}}";
                        window.location = 'owner/dashboard';
                    // }, 2000)
                    $('#successBox').html(html);
                }
                else{
                    html = `<div class="alert alert-danger">${data.message}</div>`;
                    $('#errorBox').html(html);

                }
                
            },
            error: function(e) {
                form.find('.icon-loading').hide();
                
            }
        });
        $(this).attr("disabled",false);
});
    </script>

    @yield('script')

</body>

</html>

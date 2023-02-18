<header class="main-menu header-nav navbar-scrolltofixed stricky main-menu">
        <div class="container-fluid p-0">
          <!-- Ace Responsive Menu -->
          <nav class="d-flex align-items-center">
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
              <img
                class="nav_logo_img img-fluid"
                src="{{url('images/logo.png')}}"
                alt=""
              />
              <button type="button" id="menu-btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <a href="{{ url("/") }}" class="navbar_brand float-left">
              <img
                class="logo1 img-fluid"
                src="{{url('images/logo.png')}}"
                alt=""
              />
              <span></span>
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul
              id="respMenu"
              class="ace-responsive-menu text-right nav-menu"
              data-menu-style="horizontal"
            >
              <li class="depth-0">
                <a target="" href="{{ url("/") }}">Home</a>
              </li>
              <li class="depth-0">
                <a target="" href="{{ route('aboutus')}}">About</a>
              </li>
              <li class="depth-0"><a target="" href="{{ route('faq') }}">FAQ</a></li>
              <li class="depth-0"><a target="" href="contact">Contact</a></li>
              <!--  -->
              <li class="list-inline-item list-inline-item add_listing dn-lg">
                <a href="javascript:void(0)" class="btn btn-thm">
                  <span class="dn-lg" data-toggle="modal" data-target="#login"
                    >Login</span
                  ></a
                >
              </li>
              <li class="list-inline-item add_listing">
                <a href="javascript:void(0)" class="btn btn-thm">
                  <span
                    class="dn-lg"
                    data-toggle="modal"
                    data-target="#owner-login">
                    <span class=""></span>
                    <span class="dn-lg"> For Owners</span></span>

                  </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- banner -->
        <div class="banner-content">
          <!-- <h4 class="banner-title text-center mb-0 mr-5">
            Book Now And <br />
            Get Upto <span>Rs.750 Discount!</span>
          </h4>
          <button class="btn btn-thm">Book Now!</button> -->
          <img src="{{url('images/banner/banner1.jpeg')}}" style='max-height:90px' alt=''>
        </div>
      </header>
 <!-- Main Header Nav For Mobile -->
 <div id="page" class="stylehome1 h0">
        <div class="mobile-menu">
          <div class="header stylehome1">
            <div class="main_logo">
              <!-- <img
                class="nav_logo_img img-fluid"
                src="./images/stayteller-150x45.png"
                alt=""
              /> -->
            </div>
            <ul class="menu_bar_home2">
              <li class="list-inline-item list_s">
                <a href="{{ url("/") }}"
                  ><span class="flaticon-user"></span
                ></a>
              </li>
              <li class="list-inline-item menu-icon">
                <a href="#menu"><span></span></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.mobile-menu -->
        <nav id="menu" class="stylehome1 mm-menu_offcanvas">
          <ul>
            <li class="active depth-0">
              <a target="" href="{{ url("/") }}"
                >Home</a
              >
            </li>
            <li class="depth-0"><a target="" href="page/about-us">About</a></li>
            <li class="depth-0"><a target="" href="#">FAQ</a></li>
            <li class="depth-0"><a target="" href="contact">Contact</a></li>
            <li>
              <a href="#"
                ><span class="flaticon-user"></span> Login</a
              >
            </li>
            <li>
              <a href="#"
                ><span class="flaticon-edit"></span> Register</a
              >
            </li>
            <li></li>
            <li></li>
          </ul>
        </nav>
      </div>

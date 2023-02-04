(function($) {

  "use strict";

  /* ----- Preloader ----- */
  function preloaderLoad() {
      // $('.preloader').hide();
      if($('.preloader').length){
          $('.preloader').delay(200).fadeOut(300);
      }
      $(".preloader_disabler").on('click', function() {
          $("#preloader").hide();
      });
  }

  /* ----- Navbar Scroll To Fixed ----- */
  function navbarScrollfixed() {
      if(typeof $.fn.scrollToFixed  == 'undefined') return;
      $('.navbar-scrolltofixed').scrollToFixed();
      var summaries = $('.summary');
      summaries.each(function(i) {
          var summary = $(summaries[i]);
          var next = summaries[i + 1];
          summary.scrollToFixed({
              marginTop: $('.navbar-scrolltofixed').outerHeight(true) + 10,
              limit: function() {
                  var limit = 0;
                  if (next) {
                      limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                  } else {
                      limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                  }
                  return limit;
              },
              zIndex: 999
          });
      });
  }

  /** Main Menu Custom Script Start **/
  $(document).on('ready', function() {
      $("#respMenu").aceResponsiveMenu({
          resizeWidth: '768', // Set the same in Media query
          animationSpeed: 'fast', //slow, medium, fast
          accoridonExpAll: false //Expands all the accordion menu on click
      });
  });

  function mobileNavToggle() {
      if ($('#main-nav-bar .navbar-nav .sub-menu').length) {
          var subMenu = $('#main-nav-bar .navbar-nav .sub-menu');
          subMenu.parent('li').children('a').append(function () {
              return '<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>';
          });
          var subNavToggler = $('#main-nav-bar .navbar-nav .sub-nav-toggler');
          subNavToggler.on('click', function () {
              var Self = $(this);
              Self.parent().parent().children('.sub-menu').slideToggle();
              return false;
          });

      };
  }

  /* ----- Tags Bar Code for job list 1 page ----- */
  $('.tags-bar > span i').on('click', function(){
      $(this).parent().fadeOut();
  });

  /* ----- This code for menu ----- */
  $(window).on('scroll', function() {
      if ($('.scroll-to-top').length) {
          var strickyScrollPos = 100;
          if ($(window).scrollTop() > strickyScrollPos) {
              $('.scroll-to-top').fadeIn(500);
          } else if ($(this).scrollTop() <= strickyScrollPos) {
              $('.scroll-to-top').fadeOut(500);
          }
      };
      if ($('.stricky').length) {
          var headerScrollPos = $('.header-navigation').next().offset().top;
          var stricky = $('.stricky');
          if ($(window).scrollTop() > headerScrollPos) {
              stricky.removeClass('slideIn animated');
              stricky.addClass('stricky-fixed slideInDown animated');
          } else if ($(this).scrollTop() <= headerScrollPos) {
              stricky.removeClass('stricky-fixed slideInDown animated');
              stricky.addClass('slideIn animated');
          }
      };
  });

  $(".mouse_scroll, .mouse_scroll.home8").on('click', function() {
      $('html, body').animate({
          scrollTop: $("#feature-property, #property-city").offset().top
      }, 1000);
  });
  /** Main Menu Custom Script End **/

  /* ----- Blog innerpage sidebar according ----- */
  $(document).on('ready', function() {
      $('.collapse').on('show.bs.collapse', function () {
          $(this).siblings('.card-header').addClass('active');
      });
      $('.collapse').on('hide.bs.collapse', function () {
          $(this).siblings('.card-header').removeClass('active');
      });

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
  });

  /* ----- Menu Cart Button Dropdown ----- */
  $(document).on('ready', function() {
      // Loop through each nav item
      $('.cart_btn').children('ul.cart').children('li').each(function(indexCount){
          // loop through each dropdown, count children and apply a animation delay based on their index value
          $(this).children('ul.dropdown_content').children('li').each(function(index){
              // Turn the index value into a reasonable animation delay
              var delay = 0.1 + index*0.03;
              // Apply the animation delay
              $(this).css("animation-delay", delay + "s")
          });
      });
  });

  /* Menu Search Popup */
  jQuery(document).ready(function($) {
      var wHeight = window.innerHeight;
      /* search bar middle alignment */
      $('#mk-fullscreen-searchform').css('top', wHeight / 2);
      /* reform search bar */
      jQuery(window).resize(function() {
          wHeight = window.innerHeight;
          $('#mk-fullscreen-searchform').css('top', wHeight / 2);
      });

      /* Search */
      $('#search-button, #search-button2').on('click', function() {
          console.log("Open Search, Search Centered");
          $("div.mk-fullscreen-search-overlay").addClass("mk-fullscreen-search-overlay-show");
      });
      $("button.mk-fullscreen-close").on('click', function() {
          console.log("Closed Search");
          $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
      });
  });

  /* ----- Mobile Nav ----- */
  $(function() {
      $('nav#menu').mmenu();
  });

  /* ----- Candidate SIngle Page Price Slider ----- */
  $(function() {
      if($('#slider-range').length) {
          $("#slider-range").slider({
              range: true,
              min: 50,
              max: 150,
              values: [50, 120],
              slide: function (event, ui) {
                  $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
              }
          });
          $("#amount").val("$" + $("#slider-range").slider("values", 0) +
              " - $" + $("#slider-range").slider("values", 1));
      }
  });

  /* ----- Employee List v1 page range slider widget ----- */

  $(document).on('ready', function() {
      var maxvalue = $( "#max_value" ).val();
      if($('.slider-range').length) {
          $(".slider-range").slider({
              range: true,
              min: 0,
              max: maxvalue,
              values: [0, maxvalue],
              slide: function (event, ui) {
                  $(".amount").val(ui.values[0]);
                  $(".amount2").val(ui.values[1]);
              }
          });
          $(".amount").change(function () {
              $(".slider-range").slider('values', 0, $(this).val());
          });
          $(".amount2").change(function () {
              $(".slider-range").slider('values', 1, $(this).val());
          });
      }
  });

  /* ----- Progress Bar ----- */
  if($('.progress-levels .progress-box .bar-fill').length){
      $(".progress-box .bar-fill").each(function() {
          var progressWidth = $(this).attr('data-percent');
          $(this).css('width',progressWidth+'%');
          $(this).children('.percent').html(progressWidth+'%');
      });
  }

  /* ----- Background Parallax ----- */
  var isMobile = {
      Android: function() {
          return navigator.userAgent.match(/Android/i);
      },
      BlackBerry: function() {
          return navigator.userAgent.match(/BlackBerry/i);
      },
      iOS: function() {
          return navigator.userAgent.match(/iPhone|iPad|iPod/i);
      },
      Opera: function() {
          return navigator.userAgent.match(/Opera Mini/i);
      },
      Windows: function() {
          return navigator.userAgent.match(/IEMobile/i);
      },
      any: function() {
          return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
      }
  };

  jQuery(document).on('ready',function(){
      jQuery(window).stellar({
          horizontalScrolling: false,
          hideDistantElements: true,
          verticalScrolling: !isMobile.any(),
          scrollProperty: 'scroll',
          responsive: true
      });
  });

  /* ----- MagnificPopup ----- */
  if (($(".popup-img").length > 0) || ($(".popup-iframe").length > 0) || ($(".popup-img-single").length > 0)) {
      $(".popup-img").magnificPopup({
          type:"image",
          gallery: {
              enabled: true,
          }
      });
      $(".popup-img-single").magnificPopup({
          type:"image",
          gallery: {
              enabled: false,
          }
      });
      $('.popup-iframe').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          preloader: false,
          fixedContentPos: false
      });
      $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
      });
  };

  $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
  })

  /* ----- Wow animation ----- */
  function wowAnimation() {
      var wow = new WOW({
          animateClass: 'animated',
          mobile: true, // trigger animations on mobile devices (default is true)
          offset:       0
      });
      wow.init();
  }

  /* ----- Date & time Picker ----- */
  if($('.datepicker').length){
      $('.datepicker').datetimepicker();
  }

  /* ----- Home Maximage Slider ----- */
  if($('#maximage').length){
      $('#maximage').maximage({
          cycleOptions: {
              fx:'fade',
              speed: 500,
              timeout: 20000,
              prev: '#arrow_left',
              next: '#arrow_right'
          },
          onFirstImageLoaded: function(){
              jQuery('#cycle-loader').hide();
              jQuery('#maximage').fadeIn('fast');
          }
      });
      // Helper function to Fill and Center the HTML5 Video
      jQuery('#html5video').maximage('maxcover');

      // To show it is dynamic html text
      jQuery('.in-slide-content').delay(2000).fadeIn();
  }

  /* ----- Slick Slider For Testimonial ----- */
  if($('.tes-for').length){
      $('.tes-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        autoplay: false,
        autoplaySpeed: 2000,
        asNavFor: '.tes-nav'
      });
      $('.tes-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.tes-for',
        dots: false,
        arrows: false,
        centerPadding: '1px',
        centerMode: true,
        focusOnSelect: true
      });
  }
 
  /*  Team-Slider-Owl-carousel  */
  if($('.feature_property_slider').length){
      $('.feature_property_slider').owlCarousel({
          loop:true,
          margin:30,
          dots:false,
          nav:true,
        //   rtl:bookingCore.rtl,
          autoplayHoverPause:false,
          autoplay: false,
          singleItem: true,
          smartSpeed: 1200,
          navText: [
            '<i class="flaticon-left-arrow"></i>',
            '<i class="flaticon-right-arrow"></i>'
          ],
          responsive: {
              0: {
                  items: 1,
                  center: false
              },
              480:{
                  items:1,
                  center: false
              },
              520:{
                  items:2,
                  center: false
              },
              600: {
                  items: 2,
                  center: false
              },
              768: {
                  items: 2
              },
              992: {
                  items: 3
              },
              1200: {
                  items: 4
              },
              1366: {
                  items: 4
              },
              1400: {
                  items: 4
              }
          }
      })
  }
//   testimonial slider

  if($('.testimonial-slider').length){
      $('.testimonial-slider').owlCarousel({
        //   loop:true,
          margin:30,
          dots:false,
          nav:true,
        //   rtl:bookingCore.rtl,
          autoplayHoverPause: true,
          autoplay: false,
          singleItem: true,
          smartSpeed: 1200,
          navText: [
            '<i class="flaticon-left-arrow"></i>',
            '<i class="flaticon-right-arrow"></i>'
          ],
          responsive: {
              0: {
                  items: 1,
                  center: false
              },
              480:{
                  items:1,
                  center: false
              },
              520:{
                  items:2,
                  center: false
              },
              600: {
                  items: 2,
                  center: false
              },
              768: {
                  items: 2
              },
              992: {
                  items: 3
              },
              1200: {
                  items: 3
              },
              1366: {
                  items: 3
              },
              1400: {
                  items: 3
              }
          }
      })
  }

  

  /*  Expert-Freelancer-Owl-carousel  */
  if ($(".slider-banner").length) {
      $(".slider-banner").owlCarousel({
          loop: true,
          items: 1,
          margin: 0,
          dots: true,
          nav: true,
        //   rtl:bookingCore.rtl,
          autoplay: true,
          //animateIn: 'slideInLeft',
          //animateOut: 'slideInLeft',
          animateOut: 'fadeOut',


          active: true,
          smartSpeed: 450,
          // autoplay: true
      });
      $(".banner-carousel-btn .left-btn").on("click", function() {
          $(".slider-banner").trigger("next.owl.carousel");
          return false;
      });
      $(".banner-carousel-btn .right-btn").on("click", function() {
          $(".slider-banner").trigger("prev.owl.carousel");
          return false;
      });
  }

  /* ----- Scroll To top ----- */
  function scrollToTop() {
      $(window).scroll(function(){
          if ($(this).scrollTop() > 600) {
              $('.scrollToHome').fadeIn();
          } else {
              $('.scrollToHome').fadeOut();
          }
      });

      //Click event to scroll to top
      $('.scrollToHome').on('click',function(){
          $('html, body').animate({scrollTop : 0},800);
          return false;
      });
  }

  /* ----- Mega Dropdown Content ----- */
  $(document).on('ready', function(){
      $("#show_advbtn, #show_advbtn2").on('click',function(){
          $(".dropdown-content").show();
      });
      $("#hide_advbtn, #hide_advbtn2").on('click',function(){
          $(".dropdown-content").hide();
      });
      $("#show_advbtn, #show_advbtn2").on('click',function(){
          $("body").addClass("mobile_ovyh");
      });
      $("#show_advbtn, #show_advbtn2").on('click',function(){
          $("body").removeClass("mobile_ovyh");
      });

      $('.property_select_price').on('click',function() {
          console.log(1)
          $(".property_select_price--slider").toggle();
      })
      // $("#prncgs").on('click',function(){
      //     $(".dd_content2").toggle();
      // });
      // $("#prncgs2").on('click',function(){
      //     $(".dd_content2").toggle();
      // });

      $(".filter_open_btn").on('click', function(){
          $(".sidebar_content_details.style3").addClass("sidebar_ml0");
      });

      $(".filter_closed_btn").on('click', function(){
          $(".sidebar_content_details.style3").removeClass("sidebar_ml0");
      });

      $(".filter_open_btn").on('click', function(){
          $("body").addClass("body_overlay");
      });

      $(".filter_closed_btn").on('click', function(){
          $("body").removeClass("body_overlay");
      });

      $(".overlay_close").on('click', function(){
          $(".white_goverlay").toggle(500);
      });

      $('.sticky-nav-tabs-container li').on('click', function(){
          $('.sticky-nav-tabs-container li').removeClass('active');
          $(this).addClass('active');
      });

  });

/* ======
 When document is ready, do
 ====== */
  $(document).on('ready', function() {
      // add your functions
      navbarScrollfixed();
      scrollToTop();
      wowAnimation();
      mobileNavToggle();


      // extending for text toggle
      $.fn.extend({
          toggleText: function(a, b){
              return this.text(this.text() == b ? a : b);
          }
      });
      if ($('.showFilter').length) {
          $('.showFilter').on('click', function () {
              $(this).toggleText('Show Filter', 'Hide Filter');
              $(this).toggleClass('flaticon-close flaticon-filter-results-button sidebarOpended sidebarClosed');
              $('.listing_toogle_sidebar.sidenav').toggleClass('opened');
              $('.body_content').toggleClass('translated');
          });
      }

      $.fn.extend({
          toggleText2: function(a, b){
              return this.text(this.text() == b ? a : b);
          }
      });

      if ($('.showBtns').length) {
          $('.showBtns').on('click', function() {
              $(this).toggleText2('Show Filter', 'Hide Filter');
              $(this).toggleClass('flaticon-close flaticon-filter-results-button sidebarOpended2 sidebarClosed2');
              $('.sidebar_content_details').toggleClass('is-full-width');
          });
      }

  });

/* ======
 When document is loading, do
 ====== */
  // window on Load function
  $(window).on('load', function() {
      // add your functions
      // counterNumber();
      preloaderLoad();

  });
  // window on Scroll function
  $(window).on('scroll', function() {
      // add your functions
  });


})(window.jQuery);

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <meta name="author" content="" />
        <title>StayTeller | Admin</title>
        <link href="{{ asset('css2/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css2/adminstyles.css')}}" rel="stylesheet" />
        <link href="{{ asset('css2/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css2/custom.css')}}" rel="stylesheet" />
        
    </head>
    <body class="sb-nav-fixed">
       @include('owner.layout.header')
       <div id="layoutSidenav">
        @include('owner.layout.sidebar')
            <div id="layoutSidenav_content">
                @yield('dynamic-content')
                @include('owner.layout.footer')
            </div>
        </div>
   
        
        <script src="{{ asset('js2/jquery-3.5.1.min.js')}} "></script>
        <script src="{{ asset('js2/bootstrap.min.js')}} "></script>
        <script src="{{ asset('js2/adminscripts.js')}} "></script>
        <script src="{{ asset('js2/bootstrap.bundle.min.js')}} "></script>
        <script src="{{ asset('js2/sweetalert.min.js')}} "></script>
        <script src="{{ asset('js2/custome.js')}} "></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script> --}}
    </body>
</html>
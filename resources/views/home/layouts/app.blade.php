<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{!empty($meta_title) ? $meta_title : ''}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(!empty($meta_keywords))
    <meta content="{{$meta_keywords}}" name="keywords">
    @endif

    @if(!empty($meta_description))
    <meta content="{{$meta_description}}" name="description">
    @endif

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('public/frontend/css/animate.css')}}">

    <link rel="stylesheet" href="{{ url('public/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('public/frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ url('public/frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ url('public/frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ url('public/frontend/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{ url('public/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ url('public/frontend/css/style.cs')}}s">
    @yield('style')
</head>
<body>


    @include('home.layouts._header');

    @yield('content')

    @include('home.layouts._footer');
    <!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ url('public/frontend/js/jquery.min.js')}}"></script>
<script src="{{ url('public/frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{ url('public/frontend/js/popper.min.j')}}s"></script>
<script src="{{ url('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ url('public/frontend/js/jquery.easing.1.3.js')}}"></script>
<script src="{{ url('public/frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ url('public/frontend/js/jquery.stellar.min.js')}}"></script>
<script src="{{ url('public/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ url('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ url('public/frontend/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ url('public/frontend/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ url('public/frontend/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ url('public/frontend/js/google-map.js')}}"></script>
<script src="{{ url('public/frontend/js/main.js')}}"></script>
@yield('script')

</body>
</html>

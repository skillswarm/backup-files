<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> Edge Job Portal |
          @if(Auth::guard('mentor')->check())
            Mentor
          @elseif(Auth::guard('skill_provider')->check())
            Skill Provider
          @endif
  </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/bootstrap-grid.css') }}">
	<link rel="stylesheet" href="{{ asset('EdgeJobPortal/icons.css') }}">
	<link rel="stylesheet" href="{{ asset('EdgeJobPortal/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/chosen.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/colors.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

  <link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('/')}}css/main.css" rel="stylesheet">
  <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  @stack('styles')
</head>

<body>

<div class="page-loading">
	<img src="{{ asset('EdgeJobPortal/loader.gif') }}" alt="" />
	<span>Skip Loader</span>
</div>

<div class="theme-layout" id="scrollup">
@include('partials.header2')

		@yield('content')

@include('partials.footer')
</div>

<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<script src="{{ asset('EdgeJobPortal/jquery.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/modernizr.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/script.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/bootstrap.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/wow.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/slick.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/parallax.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/select-chosen.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM&callback=initMap"type="text/javascript"></script> -->
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script> -->
<!-- <script src="{{ asset('EdgeJobPortal/maps2.js') }}" type="text/javascript"></script> -->

<script src="{{asset('/')}}js/jquery-2.1.4.min.js"></script>
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<!-- Owl carousel -->
<script src="{{asset('/')}}js/owl.carousel.js"></script>
<script src="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_assets/global/plugins/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ asset('/') }}admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- <script src="{{ asset('/') }}admin_assets/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script> -->
<!-- Revolution Slider -->
<!-- <script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script> -->
@stack('scripts')
</body>
</html>

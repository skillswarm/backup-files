
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Edge Job Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">
	<meta name="csrf-token" content="{!! csrf_token() !!}" />

	<!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/bootstrap-grid.css') }}">
	<link rel="stylesheet" href="{{ asset('EdgeJobPortal/icons.css') }}">
	<link rel="stylesheet" href="{{ asset('EdgeJobPortal/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/chosen.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/colors.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/bootstrap.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div class="page-loading">
		<img src="{{ asset('EdgeJobPortal/loader.gif') }}" alt="" />
		<span>Skip Loader</span>
	</div>

<div class="theme-layout" id="scrollup">
@include('partials.header')

		@yield('page_content')
		@yield('content')

@include('partials.footer')
</div>

@include('partials.login')
@include('partials.register')

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
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
<script src="{{ asset('EdgeJobPortal/maps2.js') }}" type="text/javascript"></script>

<script>
			$("#candidate-login").submit(function(e) {
					e.preventDefault();
					var form = $('#candidate-login');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
					      success : function ( response )
					      {
									window.location.href='/home';
					      },
					      error: function( response )
					      {
									console.log(response.responseText);
								 	var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
								          $('#'+key+'-error').html(value);
													$('#'+key+'-error').css({"color": "#a94442"});
								  });
					      }
						});
			});

			$("#employer-login").submit(function(e) {
					e.preventDefault();
					var form = $('#employer-login');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
								success : function ( response )
								{
									window.location.href='/company-home';
								},
								error: function( response )
								{
									console.log(response.responseText);
									var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
													$('#'+key+'-error-e').html(value);
													$('#'+key+'-error-e').css({"color": "#a94442"});
									});
								}
						});
			});

			$("#mentor-login").submit(function(e) {
					e.preventDefault();
					var form = $('#mentor-login');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
								success : function ( response )
								{
									window.location.href='/mentor/home';
								},
								error: function( response )
								{
									console.log(response.responseText);
									var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
													$('#'+key+'-error-m').html(value);
													$('#'+key+'-error-m').css({"color": "#a94442"});
									});
								}
						});
			});

			$("#s-provider-login").submit(function(e) {
					e.preventDefault();
					var form = $('#s-provider-login');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
								success : function ( response )
								{
									console.log(response);
									window.location.href='/skill-provider/home';
								},
								error: function( response )
								{
									console.log(response.responseText);
									var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
													$('#'+key+'-error-s').html(value);
													$('#'+key+'-error-s').css({"color": "#a94442"});
									});
								}
						});
			});

			$("#candidate-register").submit(function(e) {
					e.preventDefault();
					var form = $('#candidate-register');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
								success : function ( response )
								{
									window.location.href='/home';
								},
								error: function( response )
								{
									console.log(response.responseText);
									var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
													$('#'+key+'-can-error').html(value);
													$('#'+key+'-can-error').css({"color": "#a94442"});
									});
								}
						});
			});

			$("#employer-register").submit(function(e) {
					e.preventDefault();
					var form = $('#employer-register');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
								success : function ( response )
								{
									window.location.href='/company-home';
								},
								error: function( response )
								{
									console.log(response.responseText);
									var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
													$('#'+key+'-emp-error').html(value);
													$('#'+key+'-emp-error').css({"color": "#a94442"});
									});
								}
						});
			});

			$("#mentor-register").submit(function(e) {
					e.preventDefault();
					var form = $('#mentor-register');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
								success : function ( response )
								{
									window.location.href='/mentor/home';
								},
								error: function( response )
								{
									console.log(response.responseText);
									var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
													$('#'+key+'-men-error').html(value);
													$('#'+key+'-men-error').css({"color": "#a94442"});
									});
								}
						});
			});

			$("#s-provider-register").submit(function(e) {
					e.preventDefault();
					var form = $('#s-provider-register');

					$.ajax({
								url     : form.attr('action'),
								type    : form.attr('method'),
								data    : form.serialize(),
								success : function ( response )
								{
									window.location.href='/skill-provider/home';
								},
								error: function( response )
								{
									console.log(response.responseText);
									var obj = JSON.parse(response.responseText);
									$.each(obj.errors, function (key, value) {
													$('#'+key+'-sk-error').html(value);
													$('#'+key+'-sk-error').css({"color": "#a94442"});
									});
								}
						});
			});

			function checkUser(post_id)
			{
				var post_id = post_id;
				$.ajax({
		           type: "GET",
		           url: "{{ route('checkUser') }}",
							 data:{ 'post_id': post_id },
							 dataType: 'json',
		           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
										success: function(data) {
										console.log(data);
										if(data == 1 ) {
												$('#comment_box_'+post_id).show();
										}
										else if(data == 2) {
												alert("Your Profile is not verified!");
										}
										else if(data == 3) {
												alert("Access Denied!");
										}
										else if(data == 4) {
												alert("Please log into your account!");
										}
								}
		         });
			}

			function checkCommentingUser(comment_id)
			{
				var comment_id = comment_id;
				$.ajax({
							 type: "GET",
							 url: "{{ route('checkUser') }}",
							 data:{ 'post_id': comment_id },
							 dataType: 'json',
							 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
										success: function(data) {
										console.log(data);
										if(data == 1 ) {
												$('#comment_box_'+comment_id).show();
										}
										else if(data == 2) {
												alert("Your Profile is not verified!");
										}
										else if(data == 3) {
												alert("Access Denied!");
										}
										else if(data == 4) {
												alert("Please log into your account!");
										}
								}
						 });
			}

			function UserLikes(post_id,comment_id) {
				$.ajax({
							 type: "GET",
							 url: "{{ route('UserLikes') }}",
							 data:{ 'post_id': post_id ,'comment_id': comment_id },
							 dataType: 'json',
							 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
										success: function(data) {
										console.log(data+"s");
										if(data == 1 ) {
											$('#like-btn_'+post_id+'_'+comment_id).html('Unlike');
											$('#like-btn_'+post_id+'_'+comment_id).removeClass("float-right btn btn-outline-primary ml-2");
											$('#like-btn_'+post_id+'_'+comment_id).addClass("float-right btn text-white btn-danger");
										}
										else if(data == 5) {
												$('#like-btn_'+post_id+'_'+comment_id).html('Like');
												$('#like-btn_'+post_id+'_'+comment_id).removeClass("float-right btn text-white btn-danger");
												$('#like-btn_'+post_id+'_'+comment_id).addClass("float-right btn btn-outline-primary ml-2");
										}
										else if(data == 2) {
												alert("Your Profile is not verified!");
										}
										else if(data == 3) {
												alert("Access Denied!");
										}
										else if(data == 4) {
												alert("Please log into your account!");
										}
								}
						 });
			}

			function SaveComment(id) {
				var id = id;
				var text = $('#edit_comment_'+id).text();

				$.ajax({
							 type: "POST",
							 url: "{{ route('editComment') }}",
							 data:{ 'id': id ,'text': text },
							 headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
										success: function(data) {
										console.log(data);
										alert("Comment Updated");
										$('#save_cmt_'+id).text("Comment Updated");
								}
						 });
			}
</script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Edge Job Portal</title>
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
	<link rel="stylesheet" type="text/css" href="{{ asset('EdgeJobPortal/bootstrap.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="newbg">

	<div class="page-loading">
		<img src="{{ asset('EdgeJobPortal/loader.gif') }}" alt="" />
	</div>

<div class="theme-layout" id="scrollup">

@include('partials.header')

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec">
							<div class="new-slide-3">
								<img src="{{ asset('EdgeJobPortal/vector-4.png') }}">
							</div>
							<div class="job-search-sec">
								<div class="job-search" style="width: 75%;">
									<h3>The Easiest Way to Get Your New Job</h3>
									<span>Find Jobs, Employment & Career Opportunities</span>
										@include('includes.search_form')
									<div class="or-browser">
										<span>Browse job offers by</span>
										<a href="#" title="">Category</a>
									</div>
								</div>
							</div>
							<div class="scroll-to">
								<a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="scroll-here">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Popular Categories</h2>
						</div>
						<div class="cat-sec">
							<div class="row no-gape">
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<img src="{{ asset('EdgeJobPortal/cloud-computing.png') }}" style="height:100px;" />
											<span>Cloud Computing</span>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<img src="{{ asset('EdgeJobPortal/big-data.png') }}" style="height:100px;" />
											<span>Big Data - Hadoop</span>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<img src="{{ asset('EdgeJobPortal/data-science.png') }}" style="height:100px;" />
											<span>Data Science</span>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<img src="{{ asset('EdgeJobPortal/cyber-security.png') }}" style="height:100px;" />
											<span>Cyber Security</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="#" style="color: #f16522;border-color: #f16522;" >Browse All Categories</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block double-gap-top double-gap-bottom">
			<div style="background: url(EdgeJobPortal/resume-banner.jpg)" class="parallax scrolly-invisible"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-3">

					</div>
					<div class="col-lg-7">
						<div class="simple-text-block">
							<h3 style="text-align: justify;"><i>Make a Difference <br> with Your Online Resume!</i></h3>
							<span style="text-align: justify;font-family: sans-serif;">Your resume in minutes with SkillSwarm Resume Assistant!</span>
							<a href="#" style="background: #f16522;border: #f16522;">CREATE AN ACCOUNT</a>
						</div>
					</div>
					<div class="col-lg-3">

				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Featured Jobs</h2>
							<span style="font-family: sans-serif;color: #f16522;font-size: 18px;">Leading Employers already using SkillSwarm.</span>
						</div><!-- Heading -->
						<div class="job-listings-sec">
							<div class="job-listing">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l1.png') }}" alt="" /> </div>
									<h3><a href="#" title="">Web Designer / Developer</a></h3>
									<span>Massimo Artemisis</span>
								</div>
								<span class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</span>
								<span class="fav-job"><i class="la la-heart-o"></i></span>
								<span class="job-is ft">FULL TIME</span>
							</div><!-- Job -->
							<div class="job-listing">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l2.png') }}" alt="" /> </div>
									<h3><a href="#" title="">Marketing Director</a></h3>
									<span>Tix Dog</span>
								</div>
								<span class="job-lctn"><i class="la la-map-marker"></i>Rennes, France</span>
								<span class="fav-job"><i class="la la-heart-o"></i></span>
								<span class="job-is pt">PART TIME</span>
							</div><!-- Job -->
							<div class="job-listing">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l3.png') }}" alt="" /> </div>
									<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
									<span>StarHealth</span>
								</div>
								<span class="job-lctn"><i class="la la-map-marker"></i>London, United Kingdom</span>
								<span class="fav-job"><i class="la la-heart-o"></i></span>
								<span class="job-is ft">FULL TIME</span>
							</div><!-- Job -->
							<div class="job-listing">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l4.png') }}" alt="" /> </div>
									<h3><a href="#" title="">Application Developer For Android</a></h3>
									<span>Altes Bank</span>
								</div>
								<span class="job-lctn"><i class="la la-map-marker"></i>Istanbul, Turkey</span>
								<span class="fav-job"><i class="la la-heart-o"></i></span>
								<span class="job-is fl">FREELANCE</span>
							</div><!-- Job -->
							<div class="job-listing">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l5.png') }}" alt="" /> </div>
									<h3><a href="#" title="">Regional Sales Manager South east Asia</a></h3>
									<span>Vincent</span>
								</div>
								<span class="job-lctn"><i class="la la-map-marker"></i>Ajax, Ontario</span>
								<span class="fav-job"><i class="la la-heart-o"></i></span>
								<span class="job-is tp">TEMPORARY</span>
							</div><!-- Job -->
							<div class="job-listing">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="{{ asset('EdgeJobPortal/l6.png') }}" alt="" /> </div>
									<h3><a href="#" title="">Social Media and Public Relation Executive </a></h3>
									<span>MediaLab</span>
								</div>
								<span class="job-lctn"><i class="la la-map-marker"></i>Ankara / Turkey</span>
								<span class="fav-job"><i class="la la-heart-o"></i></span>
								<span class="job-is ft">FULL TIME</span>
							</div><!-- Job -->
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="#" style="color: #f16522;border-color: #f16522;" >Load more listings</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(EdgeJobPortal/happy-customers.png) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>Kind Words From Happy Candidates</h2>
							<span>What other people thought about the service provided by JobHunt</span>
						</div><!-- Heading -->
						<div class="reviews-sec" id="reviews-carousel">
							<div class="col-lg-6">
								<div class="reviews">
									<img src="{{ asset('EdgeJobPortal/r1.jpg') }}" alt="" />
									<h3>Augusta Silva <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div><!-- Reviews -->
							</div>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="{{ asset('EdgeJobPortal/r2.jpg') }}" alt="" />
									<h3>Ali Tufan <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div><!-- Reviews -->
							</div>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="{{ asset('EdgeJobPortal/r1.jpg') }}" alt="" />
									<h3>Augusta Silva <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div><!-- Reviews -->
							</div>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="{{ asset('EdgeJobPortal/r2.jpg') }}" alt="" />
									<h3>Ali Tufan <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div><!-- Reviews -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Companies We've Helped</h2>
							<span style="font-family: sans-serif">Some of the companies we've helped recruit excellent applicants over the years.</span>
						</div><!-- Heading -->
						<div class="comp-sec">
							<div class="company-img">
								<a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc1.jpg') }}" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc2.jpg') }}" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc3.jpg') }}" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc4.jpg') }}" alt="" /></a>
							</div><!-- Client  -->
							<div class="company-img">
								<a href="#" title=""><img src="{{ asset('EdgeJobPortal/cc5.jpg') }}" alt="" /></a>
							</div><!-- Client  -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section style="background-color: #00abcc;padding: 45px 0px 0px 0px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2 style="color: #ffff;">Quick Career Tips</h2>
							<span style="color: #ffff;">SkillSwarm communicates directly with Managers and Recruiters</span>
						</div>
					</div>
				</div>
			</div>
	</section>

	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(EdgeJobPortal/parallax3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			 <div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="blog-sec">
							<div class="row">
								<div class="col-lg-4">
									<div class="my-blog">
										<div class="blog-thumb">
											<a href="#" title=""><img src="{{ asset('EdgeJobPortal/b1.jpg') }}" alt="" /></a>
											<div class="blog-metas">
												<a href="#" title="">March 29, 2017</a>
												<a href="#" title="">0 Comments</a>
											</div>
										</div>
										<div class="blog-details">
											<h3><a href="#" title="">Attract More Attention Sales And Profits</a></h3>
											<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
											<a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my-blog">
										<div class="blog-thumb">
											<a href="#" title=""><img src="{{ asset('EdgeJobPortal/b2.jpg') }}" alt="" /></a>
											<div class="blog-metas">
												<a href="#" title="">March 29, 2017</a>
												<a href="#" title="">0 Comments</a>
											</div>
										</div>
										<div class="blog-details">
											<h3><a href="#" title="">11 Tips to Help You Get New Clients</a></h3>
											<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
											<a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="my-blog">
										<div class="blog-thumb">
											<a href="#" title=""><img src="{{ asset('EdgeJobPortal/b3.jpg') }}" alt="" /></a>
											<div class="blog-metas">
												<a href="#" title="">March 29, 2017</a>
												<a href="#" title="">0 Comments</a>
											</div>
										</div>
										<div class="blog-details">
											<h3><a href="#" title="">An Overworked Newspaper Editor</a></h3>
											<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
											<a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="simple-text">
							<h3>Got a question?</h3>
							<span>We're here to help. Check out our FAQs, send us an email or call us at +91 996 696 3275</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@include('partials.footer')
</div>

@include('partials.login')
@include('partials.register')

<script src="{{ asset('EdgeJobPortal/jquery.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/modernizr.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/script.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/bootstrap.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/wow.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/slick.min.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/parallax.js.download') }}" type="text/javascript"></script>
<script src="{{ asset('EdgeJobPortal/select-chosen.js.download') }}" type="text/javascript"></script>

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
</script>
@include('includes.country_state_city_js')
</body>
</html>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Zoom Id Pswd Manager &mdash; </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">	 -->
	<link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('air/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('air/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('air/css/bootstrap.css') }}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('air/css/flexslider.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('air/css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ asset('air/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
<body>
<div id="">
  <nav class="fh5co-nav" role="navigation">
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-xs-2">
            <div id="fh5co-logo"><a href="/">Zoom_Id_Pswd_Manager<span>.</span></a></div>
          </div>
          <div class="col-xs-10 text-right menu-1">
            <ul>
              <li class="active"><a href="/">Home</a></li>
              <!-- <li><a href="portfolio.html">Portfolio</a></li>
              <li class="has-dropdown">
                <a href="blog.html">Blog</a>
                <ul class="dropdown">
                  <li><a href="#">Web Design</a></li>
                  <li><a href="#">eCommerce</a></li>
                  <li><a href="#">Branding</a></li>
                  <li><a href="#">API</a></li>
                </ul>
              </li>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li> -->
              <li class="btn-cta"><a href="/login"><span>Login</span></a></li>
              <li class="btn-cta"><a href="/register"><span>Register</span></a></li>

            </ul>
          </div>
        </div>

      </div>
    </div>
  </nav>
<!-- <p>this is first page</p>
<a href="/login">Login</a>
<a href="/register">Register</a> -->

<main class="py-4">
    @yield('content')
</main>

</div>
<!-- jQuery -->
<script src="{{ asset('air/js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('air/js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('air/js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('air/js/jquery.waypoints.min.js') }}"></script>
<!-- Flexslider -->
<script src="{{ asset('air/js/jquery.flexslider-min.js') }}"></script>
<!-- Main -->
<script src="{{ asset('air/js/main.js') }}"></script>

</body>
</html>

<!DOCTYPE html>
<html class="no-js" lang="en_AU">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Laravel Shop online</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="fb:admins" content="" />
	<meta property="fb:app_id" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta property="og:image:alt" content="" />

	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:image:alt" content="" />
	<meta name="twitter:card" content="summary_large_image" />


	<link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/slick.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/slick-theme.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/video-js.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/style.css') }}">
    @stack('css')


	<link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">
	<link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
	<link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
	<link href="{{ asset('https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap') }}" rel="stylesheet">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.menu {
    position: relative;
}

.dropdown {
    position: relative;
}

.dropdown-btn {

    background-color: #333;

    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #333;
    color: #f7ca0d ;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    width: 300px;
}

.dropdown-content ul {
    color:white;
    list-style: none;
    margin: 0;
    padding: 0;
}

.dropdown-content li {
    color:white;
    position: relative;
}

.dropdown-content a {
    text-decoration: none;
    color: white;
    display: block;
    padding: 10px;
}

.dropdown-content a:hover {

    color:#f7ca0d;
    background-color: #333;
}

.sub-menu {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(168, 160, 160, 0.1);
    width: 300px;
    z-index: 1000;
}

.dropdown-content li:hover .sub-menu {
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.sub-menu h3 {
    padding: 10px;
    margin: 0;
    background-color: #f4f4f4;
    border-bottom: 1px solid #333;
}

.sub-menu ul {
    padding: 0;
    list-style: none;
}

.sub-menu ul li a {
    padding: 8px 10px;
    display: block;
    color: #333;
}

    </style>
</head>
<body data-instant-intensity="mousedown">




    @include('layouts.user.includes.search')


    @include('layouts.user.includes.header')
   



@yield('content')


<footer class="bg-dark mt-5">
	<div class="container pb-5 pt-3">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-card">
					<h3>Get In Touch</h3>
					<p>No dolore ipsum accusam no lorem. <br>
					123 Street, New York, USA <br>
					exampl@example.com <br>
					000 000 0000</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="footer-card">
					<h3>Important Links</h3>
					<ul>
						<li><a href="about-us.php" title="About">About</a></li>
						<li><a href="contact-us.php" title="Contact Us">Contact Us</a></li>
						<li><a href="#" title="Privacy">Privacy</a></li>
						<li><a href="#" title="Privacy">Terms & Conditions</a></li>
						<li><a href="#" title="Privacy">Refund Policy</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4">
				<div class="footer-card">
					<h3>My Account</h3>
					<ul>
						<li><a href="#" title="Sell">Login</a></li>
						<li><a href="#" title="Advertise">Register</a></li>
						<li><a href="#" title="Contact Us">My Orders</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright-area">
		<div class="container">
			<div class="row">
				<div class="col-12 mt-3">
					<div class="copy-right text-center">
						<p>© Copyright 2022 Amazing Shop. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/user/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/user/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/user/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('assets/user/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/user/js/custom.js') }}"></script>
@stack('js')
<script src="{{ asset('assets/user/js/custom.js') }}"></script>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html>

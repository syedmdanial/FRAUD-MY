<!DOCTYPE html>
<html lang="en">
<!-- homepage layout-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a scammers and report their cases">
	<meta name="author" content="Ansonika">
	<title>Fraud.my - Find easily a scammers and report their cases </title>

	<!-- Favicons-->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" >
	<link rel="fraud-icon" type="image/x-icon" href="{{ asset('img/apple-touch-icon-57x57-precomposed.png') }}">
	<link rel="fraud-icon" type="image/x-icon" sizes="72x72" href="{{ asset('img/fraud-icon-72x72-precomposed.png') }}">
	<link rel="fraud-icon" type="image/x-icon" sizes="114x114" href="{{ asset('img/fraud-icon-114x114-precomposed.png') }}">
	<link rel="fraud-icon" type="image/x-icon" sizes="144x144" href="{{ asset('img/fraud-icon-144x144-precomposed.png') }}">

	<!-- BASE CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/menu.css') }}" rel="stylesheet">
	<link href="{{ asset('css/vendors.css') }}" rel="stylesheet">
	<link href="{{ asset('css/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body>

	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->

	<div id="page">
		<header class="header_sticky">
			<a href="#menu" class="btn_mobile">
				<div class="hamburger hamburger--spin" id="hamburger">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<!-- /btn_mobile-->
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-6">
						<div id="logo_home">
							<h1><a href="/" title="Findfraud">Fraud</a></h1>
						</div>
					</div>
					<div class="col-lg-9 col-6">
						<ul id="top_access">
							<li><a href="/login"><i class="pe-7s-user"></i></a></li>
							@if (!Auth::check())
								<li><a href="/register"><i class="pe-7s-add-user"></i></a></li>
							@endif
						</ul>
						<nav id="menu" class="main-menu">
							<ul>
								<li>
									<span><a href="/">Home</a></span>
								</li>
								<li>
									<span><a href="/all">Scammers List</a></span>
								</li>
							</ul>
						</nav>
						<!-- /main-menu -->
					</div>
				</div>
			</div>
			<!-- /container -->
		</header>
		<!-- /header -->

	@yield('page')


	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="/" title="Fraud.my">
						<img src="{{ url('/') }}/img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="/contact">Contact us</a></li>
						<li><a href="/login">Login</a></li>
						<li><a href="/register">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact Us Directly</h5>
					<ul class="contacts">
						<li><a href="tel://60124080499"><i class="icon_mobile"></i> +60124080499</a></li>
						<li><a href="mailto:fraud.my@gmail.com"><i class="icon_mail_alt"></i> fraud.my@gmail.com</a></li>
					</ul>
					<div class="follow_us">
						<h5>Follow us</h5>
						<ul>
							<li><a href="https://www.facebook.com/syedmdanial.sd"><i class="social_facebook"></i></a></li>
							<li><a href="https://twitter.com/syedmdanial"><i class="social_twitter"></i></a></li>
							<!-- <li><a href="#0"><i class="social_linkedin"></i></a></li> -->
							<li><a href="https://www.instagram.com/syedmdanial/"><i class="social_instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">

				</div>
				<div class="col-md-4">
					<div id="copy">© 2018 Fraud.my</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->


	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('js/common_scripts.min.js') }}"></script>
	<script src="{{ asset('js/functions.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('assets/vendor/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.selectbox-0.2.js') }}"></script>
	<script src="{{ asset('assets/vendor/retina-replace.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.magnific-popup.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/admin.js') }}"></script>
	<!-- Custom scripts for this page-->
    <script src="{{ asset('assets/js/admin-charts-all.js') }}"></script>
    <script src="{{ asset('assets/js/datatable-custom.js') }}"></script>




</body>
</html>

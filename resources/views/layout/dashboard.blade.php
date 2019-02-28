<!DOCTYPE html>
<html lang="en">
<!-- Dashboard layout after login-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Find easily a scammers and report their cases">
  <meta name="author" content="Ansonika">
  <title>Fraud.my - Dashboard</title>

  <!-- Favicons-->
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img/apple-touch-icon-57x57-precomposed.png') }}">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72-precomposed.png') }}">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114-precomposed.png') }}">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('img/apple-touch-icon-144x144-precomposed.png') }}">

  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Icon fonts-->
  <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Main styles -->
  <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
  <!-- Your custom styles -->


</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="/"><img src="{{ asset('assets/img/logo.png') }}" data-retina="true" alt="" width="163" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        @if (auth()->user()->role == 1)  <!-- only if admin-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add user">
            <a class="nav-link" href="/user/new">
                <i class="fa fa-fw fa-plus-circle"></i>
                <span class="nav-link-text">Add user</span>
            </a>
        </li>
        @endif
		@if (auth()->user()->role == 1)   <!-- only if admin-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="View users">
            <a class="nav-link" href="/user/view">
                <i class="fa fa-fw fa-eye"></i>
                <span class="nav-link-text">View users</span>
            </a>
        </li>
        @endif
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report new scammer">
            <a class="nav-link" href="/scammer/new">
                <i class="fa fa-fw fa-plus-square"></i>
                <span class="nav-link-text">Report new scammer</span>
            </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Report existing scammer">
            <a class="nav-link" href="/scammer/list">
                <i class="fa fa-fw fa-flag"></i>
                <span class="nav-link-text">Report existing scammer</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">My profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProfile">
            <li>
              <a href="/user/profile/basic">Basic Info</a>
            </li>
			<li>
              <a href="/user/profile/password">Change Password</a>
            </li>
          </ul>
        </li>
        @if (auth()->user()->role == 1) <!-- only if admin-->
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="lists">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-server"></i>
            <span class="nav-link-text">Manage lists</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="/view/all/scammer">Scammers</a>
            </li>
			<li>
              <a href="/view/all/report">Reports</a>
            </li>
          </ul>
        </li>
        @endif
        @if (auth()->user()->role == 2)   <!-- only if user-->
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="submission">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">View my Submitted</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="/view/my/scammer">Scammers</a>
            </li>
			<li>
              <a href="/view/my/report">Reports</a>
            </li>
          </ul>
        </li>
        @endif
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2" method="get" action="/search">
                <div class="input-group">
                    <input class="form-control search-top" name="query" type="text" placeholder="Ex. Name, Account Bank ....">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  @yield('container')
  <!-- /Navigation-->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Fraud.my 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
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

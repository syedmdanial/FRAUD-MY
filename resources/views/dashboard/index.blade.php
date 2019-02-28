@extends('layout.dashboard')
<!-- View my dashboard page-->
@section('container')
<div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
          </ol>

            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-bar-chart"></i>Reported Cases Statistics</h2>
                </div>
                <canvas id="myBarChart" width="100" height="50"></canvas>
            </div>
          </div>
          <!-- /.container-fluid-->
           </div>
        <!-- /.container-wrapper-->
@endsection

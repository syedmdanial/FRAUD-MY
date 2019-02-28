@extends('layout.dashboard')
<!-- View change password page-->
@section('container')
<div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
        <li class="breadcrumb-item active">Change Password</li>
          </ol>
          @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <p>
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
          @endif
          @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <p>
                        {{ session()->get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
          @endif
          @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <p>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          @endif
        <form action="/user/profile/password" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-key"></i>Authentication</h2>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Old Password</label>
                                    <input type="password" name="oldpassword" required class="form-control" placeholder="Current Password">
                            </div>
                          </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password" required class="form-control" placeholder="Password (Required Minimum 6 Character)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" required class="form-control" placeholder="Password (Required Minimum 6 Character)">
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
                </div>
                <!-- /box_general-->
            <p><button type="submit" class="btn_1 medium">Save</button></p>
            </form>
          </div>
          <!-- /.container-fluid-->
           </div>
        <!-- /.container-wrapper-->
@endsection

@extends('layout.dashboard')
<!-- View add new user page-->
@section('container')
<div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add user</li>
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
        <form action="/user/new" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Basic Information</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                        <input type="text" name="username" required value="{{ old('username') }}" class="form-control" placeholder="Username (Unique with Minimum 3 Characters)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required value="{{ old('name') }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required value="{{ old('email') }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload Profile Picture</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose picture</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file-text"></i>User Level</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Roles</label>
                            <select name="role" class="form-control">
                                <option value="">Select roles</option>
                                <option value="1">Admin</option>
                                <option value="2">Normal User</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-map-marker"></i>Places</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea rows="5" name="address" class="form-control" style="height:100px;" placeholder="Address"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-key"></i>Authentication</h2>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" required class="form-control" placeholder="Password (Required Minimum 6 Character)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" required class="form-control" placeholder="Password (Required Minimum 6 Character)">
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
                </div>
                <!-- /box_general-->
            <p><button type="submit" class="btn_1 medium">Add</button></p>
            </form>
          </div>
          <!-- /.container-fluid-->
           </div>
        <!-- /.container-wrapper-->
@endsection

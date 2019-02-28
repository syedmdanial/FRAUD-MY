@extends('layout.dashboard')
<!-- View edit user page-->
@section('container')
<div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
        <li class="breadcrumb-item active">Edit User {{ $user->name }}</li>
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
        <form action="/user/edit/{{ $user->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-image"></i>Picture</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="{{ url('/') }}/{{ $user->picture }}" width="200px" height="200px" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Basic Information</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                        <input type="text" name="username" required value="{{ $user->username }}" class="form-control" placeholder="Username (Unique with Minimum 3 Characters)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required value="{{ $user->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required value="{{ $user->email }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Change Profile Picture</span>
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
                        <textarea rows="5" name="address" class="form-control" style="height:100px;" placeholder="Address">{{ $user->address }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->

            <p><button type="submit" class="btn_1 medium">Update</button></p>
            </form>
          </div>
          <!-- /.container-fluid-->
           </div>
        <!-- /.container-wrapper-->
@endsection

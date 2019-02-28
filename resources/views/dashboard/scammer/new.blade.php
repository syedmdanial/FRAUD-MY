@extends('layout.dashboard')
<!-- View submit new scammer page-->
@section('container')
<div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Report a new scammer (* is required)</li>
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
        <form action="/scammer/new" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_general padding_bottom">
                <div class="header_box version_2">

                    <h2><i class="fa fa-file"></i>Basic Information</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" name="name" required value="{{ old('name') }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username [Facebook/Lazada/Shopee/Mudah]">
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
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-university"></i>Bank Information</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bank Name</label>
                            <input type="text" name="bank_name" value="{{ old('bank_name') }}" class="form-control" placeholder="Maybank/Bank Islam/Cimb">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account Number</label>
                                <input type="text" name="bank_account" value="{{ old('bank_account') }}" class="form-control" placeholder="158234654136">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /box_general-->

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file-text"></i>Scammed Medium</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Platform*</label>
                            <select name="platform" class="form-control">
                                <option value="">Select platform</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Twitter">Twitter</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Mudah">Mudah</option>
                                <option value="Lazada">Lazada</option>
                                <option value="Shopee">Shopee</option>
                                <option value="Ebay">Ebay</option>
                                <option value="Lelong">Lelong</option>
                                <option value="Lowyat">Lowyat</option>
                                <option value="Carousell">Carousell</option>
                                <option value="Whatsapp">Whatsapp</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-info"></i>Additional Information</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount* (RM)</label>
                            <input type="text" name="amount" required value="{{ old('amount') }}" class="form-control" placeholder="RM">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date*</label>
                                <input type="date" name="date" required class="form-control" placeholder="Date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload Evidence</span>
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
                    <h2><i class="fa fa-sitemap"></i>Flow of the Scam</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Describe what happened</label>
                            <textarea rows="5" name="description" class="form-control" style="height:100px;" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->

            <p><button type="submit" class="btn_1 medium">Submit</button></p>
            </form>
          </div>
          <!-- /.container-fluid-->
           </div>
        <!-- /.container-wrapper-->
@endsection

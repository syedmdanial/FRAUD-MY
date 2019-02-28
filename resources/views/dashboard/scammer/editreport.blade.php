@extends('layout.dashboard')
<!-- View edit report page-->
@section('container')
<div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit report</li>
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
        <form action="/report/edit/{{ $report->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method('PUT')
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-image"></i>Evidence</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="{{ url('/') }}/{{ $report->picture }}" width="200px" height="200px" class="img-thumbnail">
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
                                <label>Name</label>
                            <input type="text" name="bank_name" required value="{{ $report->bank_name }}" class="form-control" placeholder="Maybank/Bank Islam/Cimb">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account</label>
                                <input type="text" name="bank_account" required value="{{ $report->bank_account }}" class="form-control" placeholder="158234654136">
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
                                <label>Amount (RM)</label>
                            <input type="text" name="amount" required value="{{ $report->amount }}" class="form-control" placeholder="RM">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" required class="form-control" value="{{ $report->date }}" placeholder="Date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
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
                            <textarea rows="5" name="description" class="form-control" style="height:100px;" placeholder="Description">{{ $report->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file-text"></i>Change Status</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Approved</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /box_general-->


            <p><button type="submit" class="btn_1 medium">Save</button></p>
            </form>
          </div>
          <!-- /.container-fluid-->
           </div>
        <!-- /.container-wrapper-->
@endsection

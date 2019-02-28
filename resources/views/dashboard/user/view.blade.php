@extends('layout.dashboard')

<!-- View user page-->
@section('container')

<div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
            <div class="box_general">
                <div class="header_box">
                    <h2 class="d-inline-block">User List</h2>
                </div>
                <div class="list_general">
                    <ul>
                        @foreach ($users as $user)
                            <li>
                                <figure><img src="{{ url('/') }}/{{ $user->picture }}" alt=""></figure>
                                <h4>{{ $user->name }}
                                    @if ($user->role == 1)
                                        <i class="cancel">Admin</i>
                                    @endif
                                    @if ($user->role == 2)
                                        <i class="approved">Normal User</i>
                                    @endif
                                </h4>
                                <ul class="booking_details">
                                    <li><strong>Username</strong>{{ $user->name }}</li>
                                    <li><strong>Email</strong>{{ $user->email }}</li>
                                    <li><strong>Phone Number</strong>{{ $user->phone }}</li>
                                    <li><strong>Address</strong>{{ $user->address }}</li>
                                </ul>
                                <ul class="buttons">
                                <li><a href="/user/edit/{{ $user->slug }}" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Edit</a></li>
                                <li><a data-toggle="modal" data-target="#modal_delete_{{ $user->id }}" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Delete</a></li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
          </div>
          <!-- /container-fluid-->
           </div>
        <!-- /container-wrapper-->
        @foreach ($users as $user)
                <div class="modal fade" id="modal_delete_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="#modal_delete_{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete {{ $user->name }} ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">Select "Delete" below if you are want to delete {{ $user->name }}</div>
                            <div class="modal-footer">
                            <form action="/user/delete/{{ $user->slug }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
        @endforeach

@endsection

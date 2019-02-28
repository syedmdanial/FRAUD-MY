@extends('layout.dashboard')
<!-- View manage list (scammers) page-->
@section('container')
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
            <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Scammers List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="list_scammer" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Bank Account</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Action</th>
                      <th>Reports</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($scammers as $scammer)
                        <tr>
                            <td>{{ $scammer->name }}</td>
                            <td>{{ $scammer->username }}</td>
                            <td>{{ $scammer->phone }}</td>
                            <td>{{ $scammer->email }}</td>
                            <td>
                                @foreach ($scammer->reports as $report)
                                  {{ $report->bank_account }} ({{ $report->bank_name}})
                                  <br /><hr />
                                @endforeach
                            </td>
                            <td>
                                @if ($scammer->status == 1)
                                  <span class="badge badge-success">Approved</span>
                                @endif
                                @if ($scammer->status == 2)
                                  <span class="badge badge-danger">Rejected</span>
                                @endif
                                @if ($scammer->status == 0)
                                  <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td><a href="/scammer/edit/{{ $scammer->slug }}" class="btn btn-sm btn-success">Edit</a></td>
                            <td><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{ $scammer->id }}" style="color: white;">Delete</a></td>
                            <td><a href="/report/{{ $scammer->slug }}" class="btn btn-sm btn-primary">Reports</a></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                @foreach ($scammers as $scammer)
                <div class="modal fade" id="modal_delete_{{ $scammer->id }}" tabindex="-1" role="dialog" aria-labelledby="#modal_delete_{{ $scammer->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete {{ $scammer->name }} ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">Select "Delete" below if you are want to delete {{ $scammer->name }}</div>
                            <div class="modal-footer">
                            <form action="/scammer/delete/{{ $scammer->slug }}" method="POST">
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
              </div>
            </div>
          </div>
          <!-- /tables-->
        </div>
          <!-- /container-fluid-->
    </div>
@endsection

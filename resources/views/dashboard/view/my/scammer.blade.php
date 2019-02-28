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
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /tables-->
        </div>
          <!-- /container-fluid-->
    </div>
@endsection

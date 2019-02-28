@extends('layout.dashboard')
<!-- View my submitted list (report) page-->
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
              <i class="fa fa-table"></i> Reports List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="list_scammer" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Platform</th>
                      <th>Amount</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($scammers as $scammer)
                    @foreach ($scammer->reports as $report)
                        <tr>
                            <td>{{ $scammer->name }}</td>
                            <td>{{ $report->medium }}</td>
                            <td>{{ $report->amount }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->date)->toFormattedDateString() }}</td>
                            <td>
                                @if ($report->status == 1)
                                  <span class="badge badge-success">Approved</span>
                                @endif
                                @if ($report->status == 2)
                                  <span class="badge badge-danger">Rejected</span>
                                @endif
                                @if ($report->status == 0)
                                  <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            @endforeach
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

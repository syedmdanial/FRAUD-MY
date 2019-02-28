@extends('layout.dashboard')

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
                      <th>Platform</th>
                      <th>Amount</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Evidence</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->medium }}</td>
                            <td>{{ $report->amount }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->date)->toFormattedDateString() }}</td>
                            <td><a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_view_{{ $report->id }}" style="color: white;">View</a></td>
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
                            <td><a href="/report/edit/{{ $report->id }}" class="btn btn-sm btn-success">Edit</a></td>
                            <td><a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{ $report->id }}" style="color: white;">Delete</a></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                @foreach ($reports as $report)
                <div class="modal fade" id="modal_delete_{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="#modal_delete_{{ $report->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete {{ $report->scammer->name }} ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">Select "Delete" below if you are want to delete {{ $report->scammer->name }}</div>
                            <div class="modal-footer">
                            <form action="/report/delete/{{ $report->id }}" method="POST">
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
                  @foreach ($reports as $report)
                  <div class="modal fade" id="modal_view_{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="#modal_delete_{{ $report->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Evidence for report {{ $report->scammer->name }}</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body"><center><img width="500" height="500" src="{{ url('/') }}/{{ $report->picture }}"></center></div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
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

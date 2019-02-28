@extends('layout.master')

<!-- search scammer page -->

@section('page')

	<main class="theia-exception">
            <div id="results">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="search_bar_list">
                                <form action="/search" method="get">
                                    <input type="text" name="query" class="form-control" placeholder="Ex. Name, Account Bank ....">
                                    <input type="submit" >
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /results -->


            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-lg-7">
                        @foreach ($scammers as $scammer)
                            @if ($scammer->status == 1)
                                <div class="strip_list wow fadeIn">
                                    <figure>
                                        <a href="/search/detail/{{ $scammer->slug }}"><img src="{{ url('/') }}/img/fraud.png" alt=""></a>
                                    </figure>
                                    <small>{{ $scammer->username }} &nbsp; <span class="badge badge-primary">Username</span></small>
                                    <h3>{{ $scammer->name }} &nbsp; <span class="badge badge-success">Name</span></h3>
                                    <p><button type="button" class="btn btn-md btn-danger">
                                            Cases <span class="badge badge-light">{{ $scammer->reports->where('status',1)->count()}}</span>
                                          </button></p>
                                    <ul>
                                            <li><a href="/dashboard" class="btn_listing">Report Scammer</a></li>
                                            <li></li>
                                        <li><a href="/search/detail/{{ $scammer->slug }}" >View Reports</a></li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                        @foreach ($reports as $report)
                            @if ($report->scammer->status == 1)
                                <div class="strip_list wow fadeIn">
                                    <figure>
                                        <a href="/search/detail/{{ $report->scammer->slug }}"><img src="{{ url('/') }}/img/fraud.png" alt=""></a>
                                    </figure>
                                    <small>{{ $report->scammer->username }} &nbsp; <span class="badge badge-primary">Username</span></small>
                                    <h3>{{ $report->scammer->name }} &nbsp; <span class="badge badge-success">Name</span></h3>
                                    <p><button type="button" class="btn btn-md btn-danger">
                                            Cases <span class="badge badge-light">{{ $report->scammer->reports->where('status',1)->count()}}</span>
                                          </button></p>
                                    <ul>
                                            <li><a href="/dashboard" class="btn_listing">Report Scammer</a></li>
                                            <li></li>
                                        <li><a href="/search/detail/{{ $report->scammer->slug }}" >View Reports</a></li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </main>
        <!-- /main -->

@endsection

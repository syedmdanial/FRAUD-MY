@extends('layout.master')

<!-- scammer details page -->

@section('page')

<main>

		<div class="container margin_60">
			<div class="row">
				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">Basic info</a></li>
								<li><a href="#sidebar"></a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									<div class="col-lg-5 col-md-4">
										<figure>
											<img src="{{ url('/') }}/img/fraud.png" alt="" class="img-fluid">
										</figure>
									</div>
									<div class="col-lg-7 col-md-8">
                                        <small>Username - {{ $scammer->username }}</small>
										<h1>{{ $scammer->name }}</h1>
										<ul class="contacts">
											<li>
                                                <h6>Bank Details</h6>
                                                @foreach ($scammer->reports as $report)
                                                {{ $report->bank_account }}  ({{ $report->bank_name }})
                                                <br />
                                                @endforeach
                                            </li>
                                            <li>
                                                <h6>Email</h6>
                                                {{ $scammer->email }}
                                                </li>
											<li>
												<h6>Phone</h6> <a href="tel://6{{ $scammer->phone }}">+6{{ $scammer->phone }}</a></li>
										</ul>
									</div>
								</div>
							</div>

							<hr>

                            @foreach ($scammer->reports->where('status',1) as $report)
                            <!-- /profile -->
							<div class="indent_title_in">
                                    <i class="pe-7s-news-paper"></i>
                                    <h3>Platform </h3>
                                    <p>{{ $report->medium }}.</p>
                                </div>
                                <div class="wrapper_indent">
                                    <p>{{ $report->description }}</p>
                                    <h6>Details</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <ul class="bullets">
                                                <li>Date - {{ \Carbon\Carbon::parse($report->date)->toFormattedDateString() }}</li>
                                                <li>Amount - RM {{ $report->amount }}</li>
                                                <li>Evidence - <a class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal_view_{{ $report->id }}" style="color: white;">View</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /row-->
                                </div>
                                <!-- /wrapper indent -->
                                <hr>
                            @endforeach
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->
			</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
    </main>
    @foreach ($scammer->reports->where('status',1) as $report)
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
	<!-- /main -->
@endsection

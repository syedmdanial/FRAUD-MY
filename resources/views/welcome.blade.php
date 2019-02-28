@extends('layout.master')

@section('page')

	<!-- welcome page (how to report) -->
	<main>
		<div class="hero_home version_1">
			<div class="content">
				<h3>Find a Scammer!</h3>
				<p>
					Look out for scammer's name, phone, bank details and more.
				</p>
				<form method="get" action="/search">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" name="query" class=" search-query" placeholder="Ex. Name, Account Bank ....">
							<input type="submit" class="btn_search" value="Search">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- /Hero -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Discover how <strong>to</strong> report a scammer!</h2>
				<p>Fraud.my allow you to report a scammer cases that might occur to you or not.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>Register in Fraud.my</h3>
						<p>Fill you details and get registered in Fraud.my</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3>View profile</h3>
						<p>Login to your dashboard to view features available offered by us.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3>Report a scammer</h3>
						<p>Feature that offered by us to you that become a victom of scammer.</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center"><a href="/login" class="btn_1 medium">Report Scammer</a></p>

		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Most Popular Platform Scammed</h2>
					<p>Graph shows the most popular platform the scammers choose to perform the crime</p>
				</div>
				<div id="reccomended" >
					<div class="box_general padding_bottom">
						<canvas id="myBarChart" width="100" height="50"></canvas>
					</div>
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->
	</main>
	<!-- /main content -->

@endsection

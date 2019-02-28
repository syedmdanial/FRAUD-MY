@extends('layout.master')

<!-- contact us page -->

@section('page')

<main>
		<div class="container margin_60_35">
			<div class="row">
                <div class="col-lg-2"></div>
				<div class=" col-lg-8 col-md-8">
					<div class="box_general">
						<h3>Contact us</h3>
						<p>
							Send feedback to me.
						</p>
						<div>
							<div id="message-contact"></div>
                            <form method="post" action="/contact" id="contactform">
                                @csrf
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" name="fname" required id="name_contact" name="name_contact" placeholder="First Name">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" name="lname" required id="lastname_contact" name="lastname_contact" placeholder="Last name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" id="email_contact" name="email" required name="email_contact" class="form-control" placeholder="Email">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" id="phone_contact" name="phone" required name="phone_contact" class="form-control" placeholder="Phone number">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea rows="5" id="message_contact" name="message" class="form-control" style="height:100px;" placeholder="Message!"></textarea>
										</div>
									</div>
								</div>
								<input type="submit" value="Submit" class="btn_1 add_top_20" id="submit-contact">
							</form>
						</div>
						<!-- /col -->
					</div>
				</div>
				<!-- /col -->
			</div>
			<!-- End row -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->

@endsection

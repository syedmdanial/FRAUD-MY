@extends('layout.master')

<!-- register page -->
@section('page')
<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="register">
                    <h1>Join the fight and help make Fraud.my bigger!</h1>
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
					<div class="row justify-content-center">
						<div class="col-md-5">
                            <form method="POST" action="/register">
                                @csrf
								<div class="box_form">
									<div class="form-group">
										<label>Username* (must be unique & more than 3 words)</label>
										<input type="text" class="form-control" value="{{ old('username') }}" required name="username" placeholder="Your username">
									</div>
									<div class="form-group">
										<label>Name*</label>
										<input type="text" class="form-control" value="{{ old('name') }}" required name="name" placeholder="Your name">
									</div>
									<div class="form-group">
										<label>Email* (must be unique)</label>
										<input type="email" class="form-control" value="{{ old('email') }}" required name="email" placeholder="Your email address">
                  </div>
                  <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Your phone">
                  </div>
                	<div class="form-group">
										<textarea rows="5" id="address" name="address" value="{{ old('address') }}" class="form-control" style="height:100px;" placeholder="Address"></textarea>
									</div>
									<div class="form-group">
										<label>Password* (must be 6 and above)</label>
										<input type="password" class="form-control" required name="password" id="password1" placeholder="Your password">
									</div>
									<div class="form-group">
										<label>Confirm password*</label>
										<input type="password" class="form-control" name="password_confirmation" required id="password2" placeholder="Confirm password">
									</div>
									<div id="pass-info" class="clearfix"></div>
									<div class="form-group text-center add_top_30">
										<input class="btn_1" type="submit" value="Submit">
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /register -->
			</div>
		</div>
	</main>
	<!-- /main -->
@endsection

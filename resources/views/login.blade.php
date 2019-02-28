@extends('layout.master')
<!-- login page -->
@section('page')

	<main>

		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login-2">
                    <h1>Login to Fraud.my!</h1>
                    @isset($err)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ $err }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     @endisset()
                    <form method="POST" action="/login">
                        @csrf
						<div class="box_form clearfix">
							<div class="box_login" style="width:100%">
								<div class="form-group">
									<input type="email" class="form-control"  name="email" placeholder="Your email address">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Your password">
								</div>
								<div class="form-group">
									<input class="btn_1" type="submit" value="Login">
								</div>
							</div>
						</div>
					</form>
					<p class="text-center link_bright">Do not have an account yet? <a href="/register"><strong>Register now!</strong></a></p>
				</div>
				<!-- /login -->
			</div>
		</div>
	</main>
	<!-- /main -->


@endsection

<!doctype html>
<html lang="en">
  <head>
  	<title>Doc Share Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="log/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">St John Ambulance Doc Share</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(log/images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								
			      	</div>
					<form method="POST" action="{{ route('login') }}" class="signin-form">						

						@if(Session::get('error'))
						<div class="alert alert-danger">
							{{ Session::get('error') }}
						</div>
						@endif

						@if(Session::has('success'))
							<div class="alert alert-success">{{Session::get('success')}}</div>
						@endif

						@if($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						
						@csrf
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
			      			<label class="form-control-placeholder" for="username">Username</label>

							  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>
						<div class="form-group">
							<input id="password-field" type="password" name="password" class="form-control" required>
							<label class="form-control-placeholder" for="password">Password</label>
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
						</div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="{{ route('password.request') }}">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not registered? <a data-toggle="tab" href="#signup">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="log/js/jquery.min.js"></script>
  <script src="log/js/popper.js"></script>
  <script src="log/js/bootstrap.min.js"></script>
  <script src="log/js/main.js"></script>

	</body>
</html>


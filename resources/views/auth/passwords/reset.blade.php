<!doctype html>
<html lang="en">
  <head>
  	<title>Doc Share Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- {{asset('dash/')}} -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('log/css/style.css')}}">

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
                                    <h3 class="mb-4">Reset Password</h3>
                                </div>								
                            </div>
							
                        <form method="POST" action="{{ route('password.update') }}" class="signin-form">
                            @csrf

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

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required>
                                <label class="form-control-placeholder" for="username">Email</label>

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
                                <input id="password-field" type="password" name="password_confirmation" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Confirm Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                    
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Reset Password</button>
                            </div>
                          
                        </form>
		          <p class="text-center">Remembered password? <a data-toggle="tab" href="{{ route('login') }}">Sign In</a></p>
		        </div>
		      </div>
			</div>
			</div>
		</div>
	</section>

	<script src="{{asset('log/js/jquery.min.js')}}"></script>
  <script src="{{asset('log/js/popper.js')}}"></script>
  <script src="{{asset('log/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('log/js/main.js')}}"></script>

	</body>
</html>


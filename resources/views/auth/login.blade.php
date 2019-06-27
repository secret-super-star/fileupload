@extends('layouts.auth')
@section('content')
<section class="material-half-bg">
	<div class="cover"></div>
</section>
<section class="login-content">
	<div class="logo">
		<h1>File Upload</h1>
	</div>
	<div class="login-box">
		<form class="login-form" action="{{ route('login') }}" method="post"  style="position:relative; ">
      @csrf
			@if ($message = Session::get('error'))
          <div class="alert alert-danger alert-dismissible" id="myAlert">
              <strong>Approve required.</strong>
          </div>
          <?php \Session::forget('error');?>
      @endif
			<h3 class="login-head">
				<i class="fa fa-lg fa-fw fa-user"></i>SIGN IN
			</h3>
			<div class="form-group">
				<label class="control-label">Email</label> <input id="email"
					type="email"
					class="form-control @error('email') is-invalid @enderror"
					name="email" value="{{ old('email') }}" required
					autocomplete="email" autofocus> @error('email') <span
					class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
				</span> @enderror
			</div>
			<div class="form-group">
				<label class="control-label">PASSWORD</label> <input id="password"
					type="password"
					class="form-control @error('password') is-invalid @enderror"
					name="password" required autocomplete="current-password">

				@error('password') <span class="invalid-feedback" role="alert"> <strong>{{
						$message }}</strong>
				</span> @enderror
			</div>


			<div class="form-group btn-container">
				<button class="btn btn-primary btn-block">
					<i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN
				</button>
			</div>

			<div class="form-group text-center mt-2">
				<p>Don't you have account? <a href="{{route('register')}}">Sign Up.</a></p>
			</div>

		</form>

	</div>
</section>
@endsection

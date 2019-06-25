@extends('layouts.auth')
@section('content')
<section class="material-half-bg">
	<div class="cover"></div>
</section>
<section class="login-content" style="min-height: 70vh;">
	<div class="logo mt-4">
		<h1>File Upload</h1>
	</div>
	<div class="login-box mb-4">
		<form class="login-form" action="{{ route('register') }}" method="post" style="position:relative; ">
      @csrf

			<h3 class="login-head">
				<i class="fa fa-lg fa-fw fa-user"></i>SIGN UP
			</h3>
      <div class="form-group">
				<label class="control-label">{{ __('Name') }}</label> <input id="name"
					type="text"
					class="form-control @error('name') is-invalid @enderror"
					name="name" value="{{ old('name') }}" required
					autocomplete="name" autofocus>
					@error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
			</div>
      <div class="form-group">
				<label class="control-label">{{ __('E-Mail Address') }}</label> <input id="email"
					type="email"
					class="form-control @error('email') is-invalid @enderror"
					name="email" value="{{ old('email') }}" required
					autocomplete="email" autofocus>
					@error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
			</div>
      <div class="form-group">
				<label class="control-label">{{ __('Password') }}</label> <input id="password"
					type="password"
					class="form-control @error('password') is-invalid @enderror"
					name="password" value="{{ old('password') }}" required
					autocomplete="password" autofocus>
					@error('password')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
			</div>
			<div class="form-group">
				<label class="control-label">{{ __('Confirm Password') }}</label> <input id="password-confirm"
					type="password"
					class="form-control"
					name="password_confirmation" value="{{ old('email') }}" required
					autocomplete="new-password" autofocus>
			</div>

			<div class="form-group btn-container">
				<button class="btn btn-primary btn-block">
					<i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP
				</button>
			</div>

			<div class="form-group text-center mt-2">
				<p>Do you have account? <a href="{{route('login')}}">Sign In.</a></p>
			</div>
		</form>

	</div>
</section>
@endsection

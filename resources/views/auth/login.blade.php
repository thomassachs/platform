@extends('layouts.app')

@section('content')

    	<!-- Signup Start -->
    	<div class="sign_in_up_bg">
    		<div class="container">
    			<div class="row justify-content-lg-center justify-content-md-center">
    				<div class="col-lg-12 mt-50">
    					<div class="main_logo25" id="logo">
    						<a href="/"><img src="images/logo.svg" alt=""></a>
    						<a href="/"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
    					</div>
    				</div>

    				<div class="col-lg-6 col-md-8">
    					<div class="sign_form">
    						<h2>Welcome Back</h2>
    						<p>Log In to Your Gamer Champ Account!</p>






    						<form method="POST" action="{{ route('login') }}">
                                @csrf
    							<div class="ui search focus mt-15">
                                    @error('email')
                                        <span class="" style="color:red;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    								<div class="ui left icon input swdh95">
    									<input class="prompt srch_explore @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" id="email" required="" maxlength="64" placeholder="Email Address" required autocomplete="email" autofocus>
    									<i class="uil uil-envelope icon icon2"></i>
    								</div>

    							</div>
    							<div class="ui search focus mt-15">
    								<div class="ui left icon input swdh95">
    									<input class="prompt srch_explore @error('password') is-invalid @enderror" type="password" name="password" value="" id="password" maxlength="64" placeholder="Password" required autocomplete="current-password">
    									<i class="uil uil-key-skeleton-alt icon icon2"></i>
    								</div>
                                    @error('password')
                                        <span class="" style="color:red;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    							</div>
    							<div class="ui form mt-30 checkbox_sign">
    								<div class="inline field">
    									<div class="ui checkbox mncheck">
    										<input type="checkbox" name="remember" id="remember" tabindex="0" class="hidden" {{ old('remember') ? 'checked' : '' }}>
    										<label for="remember">Remember Me</label>
    									</div>
    								</div>
    							</div>
    							<button class="login-btn" type="submit">Sign In</button>
    						</form>
                            @if (Route::has('password.request'))
                                <p class="sgntrm145">Or <a href="{{ route('password.request') }}">Forgot Password</a>.</p>
                            @endif
    						<p class="mb-0 mt-30 hvsng145">Don't have an account? <a href="/register">Sign Up</a></p>
    					</div>
    					<div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020 <strong>Gamer Champ</strong>. All Rights Reserved.</div>
    				</div>
    			</div>
    		</div>
    	</div>

@endsection

@extends('layouts.app')

@section('content')

    	<!-- Signup Start -->
    	<div class="sign_in_up_bg">
    		<div class="container">
    			<div class="row justify-content-lg-center justify-content-md-center">
    				<div class="col-lg-12">
    					<div class="main_logo25" id="logo">
    						<a href="/"><img src="images/logo.svg" alt=""></a>
    						<a href="/"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
    					</div>
    				</div>

    				<div class="col-lg-6 col-md-8">
    					<div class="sign_form">
    						<h2>Welcome to Gamer Champ</h2>
    						<p>Sign Up and Start Learning!</p>
    						<form method="POST" action="{{ route('register') }}">
                                @csrf
    							<div class="ui search focus">
    								<div class="ui left icon input swdh11 swdh19">
    									<input class="prompt srch_explore @error('name') is-invalid @enderror" type="text" name="name"  value="{{ old('name') }}" id="name" required autocomplete="name" autofocus maxlength="64" placeholder="Full Name">
                                        @error('name')
                                            <span class="" style="color:red;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
    								</div>
    							</div>
    							<div class="ui search focus mt-15">
    								<div class="ui left icon input swdh11 swdh19">
    									<input class="prompt srch_explore @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" id="email" required  autocomplete="email" maxlength="64" placeholder="Email Address">
                                        @error('email')
                                            <span class="" style="color:red;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
    								</div>
    							</div>
    							<div class="ui search focus mt-15">
    								<div class="ui left icon input swdh11 swdh19">
    									<input class="prompt srch_explore @error('password') is-invalid @enderror" type="password" name="password" value="" id="password" required="" maxlength="64" placeholder="Password" autocomplete="new-password">
    								</div>
                                    @error('password')
                                        <span class="" style="color:red;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    							</div>
    							<div class="ui search focus mt-15">
    								<div class="ui left icon input swdh11 swdh19">
    									<input class="prompt srch_explore" id="password-confirm" type="password" name="password_confirmation" value="" required="" maxlength="64" placeholder="Confirm Password" autocomplete="new-password">
    								</div>
    							</div>

    							<button class="login-btn" type="submit">Next</button>
    						</form>
    						<p class="sgntrm145">By signing up, you agree to our <a href="terms_of_use.html">Terms of Use</a> and <a href="terms_of_use.html">Privacy Policy</a>.</p>
    						<p class="mb-0 mt-30">Already have an account? <a href="/login">Log In</a></p>
    					</div>
    					<div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020 <strong>Cursus</strong>. All Rights Reserved.</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- Signup End -->

@endsection

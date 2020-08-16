<!-- Modal for becoming an instructor -->
<div class="modal fade" id="becomeInstructorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Become instructor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to teach people how to become better in a specific game?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nah i just missclicked</button>
        <a href="{{ url('/becomeinstructor') }}">
            <button type="button" class="btn btn-primary">Yes man!</button>
        </a>

      </div>
    </div>
  </div>
</div>
{{-- modal end --}}

<header class="header clearfix">
		<button type="button" id="toggleMenu" class="toggle_menu">
		  <i class='uil uil-bars'></i>
		</button>
		<button id="collapse_menu" class="collapse_menu">
			<i class="uil uil-bars collapse_menu--icon "></i>
			<span class="collapse_menu--label"></span>
		</button>
		<div class="main_logo" id="logo">
			<a href="/"><img src="{{ asset('images/logo.svg') }}" alt=""></a>
			<a href="/"><img class="logo-inverse" src="{{ asset('images/ct_logo.svg') }}" alt=""></a>
		</div>
		<div class="search120">
			<div class="ui search">
			  <div class="ui left icon input swdh10">
				<input class="prompt srch10" type="text" placeholder="Search for Tuts Videos, Tutors, Tests and more..">
				<i class='uil uil-search-alt icon icon1'></i>
			  </div>
			</div>
		</div>
		<div class="header_right">
			<ul>
                <!-- Authentication Links -->
                @if (Route::has('login'))

                    @auth

                        {{-- check if user is also an instructor --}}
                        @if(Auth::user()->instructor == 0)
                            <li >
                                <a href="" class="upload_btn" data-toggle="modal" data-target="#becomeInstructorModal">Become Instructor</a>
                            </li>

                        @elseif(Auth::user()->instructor == 1)
                            <li>
                                <a class="upload_btn" href="{{ url('/instructor') }}">Instructor</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/account') }}">Account</a>
                        </li>


                        {{-- account icon mit dropdown --}}
                        <li class="ui dropdown">
        					<a href="#" class="opts_account">
        						<img src="{{ asset('images/hd_dp.jpg') }}" alt="">
        					</a>
        					<div class="menu dropdown_account">
        						<div class="channel_my">
        							<div class="profile_link">
        								<img src="images/hd_dp.jpg" alt="">
        								<div class="pd_content">
        									<div class="rhte85">
        										<h6>Joginder Singh</h6>
        										<div class="mef78" title="Verify">
        											<i class='uil uil-check-circle'></i>
        										</div>
        									</div>
        									<span>gambol943@gmail.com</span>
        								</div>
        							</div>
        							<a href="my_instructor_profile_view.html" class="dp_link_12">View Instructor Profile</a>
        						</div>
        						<div class="night_mode_switch__btn">
        							<a href="#" id="night-mode" class="btn-night-mode">
        								<i class="uil uil-moon"></i> Night mode
        								<span class="btn-night-mode-switch">
        									<span class="uk-switch-button"></span>
        								</span>
        							</a>
        						</div>
        						<a href="instructor_dashboard.html" class="item channel_item">Cursus dashboard</a>
        						<a href="membership.html" class="item channel_item">Paid Memberships</a>
        						<a href="setting.html" class="item channel_item">Setting</a>
        						<a href="help.html" class="item channel_item">Help</a>
        						<a href="feedback.html" class="item channel_item">Send Feedback</a>
                                <a href="{{ route('logout') }}" class="item channel_item"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                     Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
        					</div>
        				</li>

                    @endauth

                @endif
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif


                @endguest

			</ul>
		</div>
	</header>
	<!-- Header End -->

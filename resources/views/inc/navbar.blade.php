<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if (Route::has('login'))

                    @auth

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/course/123') }}">My last Course</a>
                        </li>


                        {{-- check if user is also an instructor --}}
                        @if(Auth::user()->instructor == 0)
                            <li class="nav-item">
                                <a class="nav-link btn" data-toggle="modal" data-target="#exampleModal" >Become Instructor</a>
                            </li>

                            <!-- Modal for becoming an instructor -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        @elseif(Auth::user()->instructor == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/instructor') }}">Instructor</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/account') }}">Account</a>
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
    </div>
</nav>

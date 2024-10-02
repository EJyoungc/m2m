@extends('layouts.app2')

@section('login')
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a href="index.html" class="logo">
                    {{-- <img src="{{url('assets/images/imageedit_1_7402545364.png')}}" width="120" alt="" /> --}}
                    <img src="{{url('assets/images/gif/Logo.gif')}}" width="120" alt="" />
                </a>
                <p class="description">
                <h3 style="color:white">Login</h3>
                </p>
                <!-- progress bar indicator -->
                <div class="login-progressbar-indicator">
                    <h3>43%</h3>
                    <span>logging in...</span>
                </div>
            </div>
        </div>
        <div class="login-progressbar">
            <div></div>
        </div>
        <div class="login-form">
            <div class="login-content">
                @if (session('status'))
                    <div class="form-login-error">
                        <h3>Invalid login</h3>
                        <p>Enter <strong>demo</strong>/<strong>demo</strong> {{ session('status') }}</p>
                    </div>

                @endif

                <form method="POST" role="form" action="{{ route('login') }}" id="form_login">
                    @csrf
                    <div class="form-group @error('email') has-error @enderror">
                        <div class="input-group @error('email') validate-has-error @enderror ">
                            <div class="input-group-addon">
                                <i class="fa fa-at" aria-hidden="true"></i>
                            </div>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email"
                                placeholder="Email" autocomplete="off" />
                            @error('email') <label class="error" for="error">{{ $message }}</label> @enderror
                        </div>
                    </div>
                    <div class="form-group @error('password') has-error @enderror">
                        <div class="input-group @error('password') validate-has-error @enderror">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" autocomplete="off" />
                            @error('password') <label class="error" for="error">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <div class="">
                                <label>
                                    <input  type="checkbox" name="remember" >    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            Login In
                        </button>
                    </div>

                    <div class="form-group">

                    </div>


                </form>
                <div class="login-bottom-links">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link">Forgot your password?</a>
                    @endif

                    <br />
                    <a href="#">ToS</a> - <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
@endsection

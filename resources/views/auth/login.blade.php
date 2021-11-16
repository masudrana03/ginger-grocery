@extends('backend.layouts.app2')
@section('title', 'Sign In')

@section('content')
    <div class="main_content_iner" style="margin-top: 3%; padding: 30px; padding-top: 150px; padding-bottom: 150px;">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30" style="background-color: #FBF6F0;">
                        <div class="row justify-content-center">

                            <div class="col-lg-4">
                                <!-- sign_in  -->
                                <div class="modal-content cs_modal">
                                    <div class="modal-header justify-content-center theme_bg_1">
                                        <h5 class="modal-title text_white">Sign In</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <input type="text" class="form-control" placeholder="Enter your email"> --}}
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group cs_check_box">
                                                {{-- <input type="checkbox" id="check_box" class="common_checkbox"> --}}
                                                <input class="form-check-input common_checkbox" type="checkbox" name="remember" id="check_box" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="check_box">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>

                                            <button type="submit" class="btn_1 full_width text-center">Log in</button>
                                            <p>Need an account? <a  href="{{ route('register') }}"> Sign Up</a></p>
                                            <div class="text-center">
                                                {{-- <a href="#" data-toggle="modal" data-target="#forgot_password"
                                                    data-dismiss="modal" class="pass_forget_btn">Forget Password?</a> --}}
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link pass_forget_btn" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

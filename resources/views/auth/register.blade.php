@extends('backend.layouts.app2')
@section('title', 'Sign Up')

@section('content')

<div class="main_content_iner" style="margin-top: 3%; padding: 30px; padding-top: 4%; padding-bottom: 100px;">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30" style="background-color: #FBF6F0;">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <!-- sign_in  -->
                            <div class="modal-content cs_modal">
                                <div class="modal-header theme_bg_1 justify-content-center">
                                    <h5 class="modal-title text_white">Sign Up</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            {{-- <input type="text" class="form-control" placeholder="Full Name"> --}}
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <input type="text" class="form-control" placeholder="Enter your email"> --}}
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <input type="password" class="form-control" placeholder="Password"> --}}

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group cs_check_box">
                                            <input type="checkbox" id="check_box" class="common_checkbox">
                                            <label for="check_box">
                                                Keep me up to date
                                            </label>
                                        </div> --}}

                                        <button type="submit" class="btn_1 full_width text-center"> Sign Up</button>

                                        <p>Need an account? <a href="{{ route('login') }}">Log in</a></p>
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

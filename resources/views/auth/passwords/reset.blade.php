@extends('backend.layouts.app2')

@section('content')

<div class="main_content_iner" style="margin-top: 50px;">
    <div class="container-fluid p-0">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <!-- sign_in  -->
                            <div class="modal-content cs_modal">
                                <div class="modal-header theme_bg_1">
                                    <h5 class="modal-title text_white">Reset Password</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('admin.password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>

                                        <button type="submit" class="btn_1 full_width text-center">Reset Password</button>
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

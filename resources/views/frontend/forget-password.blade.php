@extends('frontend.layouts.app')
@section('title', 'Reset Password')


<style>
    .form-group .password_with_eye {
        width: 100%;
        display: inline-flex;
        overflow: hidden;

    }

    .form-group .eye-icon {

        position: absolute;
        margin-left: -40px;
        margin-top: 24px;
    }

</style>

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Reset password
            </div>
        </div>
    </div>
    @php
    $value = Cache::get('forget_user')->verify_otp ?? '';
    $email = Cache::get('forget_user')->email ?? '';
    @endphp

    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-3 col-md-8">
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h2 class="mb-5">Reset Account Password</h2>
                                        <p class="mb-30">Already have an account? <a
                                                href="{{ route('login') }}">login</a></p>
                                    </div>
                                    <form method="post" action="{{ route('user.password.reset') }}">
                                        @csrf
                                        <div class="form-group">
                                            {{-- <input type="text" required="" name="email" placeholder="Username or Email *" /> --}}
                                            <input id="email" type="hidden" class="form-control" name="email"
                                                value="{{ $email }}" readonly required autocomplete="email" autofocus
                                                placeholder="Enter your email">
                                        </div>
                                        <div class="form-group">
                                            {{-- <input type="text" required="" name="email" placeholder="Username or Email *" /> --}}
                                            <input id="otp" type="hidden" class="form-control" name="otp"
                                                value="{{ $value }}" readonly required autocomplete="otp" autofocus
                                                placeholder="Enter your otp">
                                        </div>

                                        <div class="form-group">
                                            <label>New Password <span class="required">*</span></label>
                                            {{-- <input required="" type="password" name="password" placeholder="Password" /> --}}
                                            <input id="password" type="password"
                                                class="form-control password_with_eye @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password" placeholder="Password">
                                            <i class="fa fa-eye-slash eye-icon" aria-hidden="true"></i>

                                            <div id="pass_available" class="mt-1"></div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password <span class="required">*</span></label>
                                            {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                            <input type="password" class="form-control password_with_eye"
                                                name="password_confirmation" id="repassword" required
                                                autocomplete="new-password" placeholder="Confirm Password">
                                            <div id="repass_available" class="mt-1"></div>
                                        </div>




                                        {{-- <div class="login_footer form-group">
                            <div class="chek-form">
                                <input type="text" required="" name="email" placeholder="Security code *" />
                            </div>
                            <span class="security-code">
                                <b class="text-new">8</b>
                                <b class="text-hot">6</b>
                                <b class="text-sale">7</b>
                                <b class="text-best">5</b>
                            </span>
                        </div> --}}

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up">Submit</button>
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

@endsection



<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}">
    $(document).ready(function() {
        $(".eye-icon").on('click', function(event) {
            event.preventDefault();
            if ($('.password_with_eye').attr("type") == "text") {
                $('.password_with_eye').attr('type', 'password');
                $('.eye-icon').addClass("fa-eye-slash");
                $('.eye-icon').removeClass("fa-eye");
            } else if ($('.password_with_eye').attr("type") == "password") {
                $('.password_with_eye').attr('type', 'text');
                $('.eye-icon').removeClass("fa-eye-slash");
                $('.eye-icon').addClass("fa-eye");
            }
        });
    });
</script>

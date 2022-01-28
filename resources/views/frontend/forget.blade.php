@extends('frontend.layouts.app')
@section('title', 'Forget Password')

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Find Account
            </div>
        </div>
    </div>
    @php
    $value = Cache::get('forget_user')->verify_otp ?? '';
    $email = Cache::get('forget_user')->email ?? '';
    @endphp

    @if ($value)
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
                                            <h1 class="mb-5">Your Account </h1>
                                            <p class="mb-30">Already have an account? <a
                                                    href="{{ route('login') }}">Login</a></p>
                                        </div>
                                        <form method="post" action="{{ route('user.forget') }}">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <input type="text" required="" name="email" placeholder="Username or Email *" /> --}}
                                                <input id="email" type="email" class="form-control" name="email"
                                                    value="{{ $email }}" readonly required autocomplete="email"
                                                    autofocus placeholder="Enter your email">
                                            </div>

                                            <div class="form-group">
                                                <div class="chek-form">
                                                    <input id="otp" type="text" class=" @error('otp') is-invalid @enderror"
                                                        required="" name="otp" placeholder="     Code *" />
                                                    @error('otp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                    <div id="otp_available" class="mt-1"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-heading btn-block hover-up">Submit</button>
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
    @else
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
                                            <h1 class="mb-5">Find your account </h1>
                                            <p class="mb-30">Already have an account? <a
                                                    href="{{ route('login') }}">Login</a></p>
                                        </div>
                                        <form method="post" action="{{ route('user.forget.otp') }}">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <input type="text" required="" name="email" placeholder="Username or Email *" /> --}}
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                                    placeholder="Enter your email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
                                                <button type="submit" class="btn btn-heading btn-block hover-up">Send
                                                    OTP</button>
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

    @endif


@endsection


<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script>
    $(document).ready(function() {

        $('#otp').on('keyup change', function() {
            let otp = $('#otp').val();
            // var pattern = /^[0-9]{6}$/;
            //  alert(pattern.test(otp));
            if (validate(otp)) {
                $('#otp_available').html(
                    `<span class="badge badge-success" style="color: #fff; font-size: 0.92em; background-color: #3bb77e;" >Please Submit Your OTP</span>`
                    )
            } else {
                $('#otp_available').html(
                    `<span class="badge badge-danger" style="color: #fff; text-align: center; font-size: 0.92em; background-color: #fdc040;" >Your OTP Must Be 6 Digit Number</span>`
                    )
            }
        })

        function validate(otp) {
            const re = /^[0-9]{6}$/;
            return re.test(otp);
        }

    });
</script>

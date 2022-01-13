@extends('frontend.layouts.app')
@section('title', 'Login')
<style>
.form-group .password_with_eye {
  width: 100%;
  display: inline-flex;
  overflow: hidden;
 
}

.form-group .eye-icon {
 
  position:absolute;
  margin-left: -40px;
  margin-top: 24px;
  
}

</style>
@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <img class="border-radius-15" src="{{ asset('assets/frontend/imgs/page/login-1.png') }}" alt="" />
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Login</h1>
                                    <p class="mb-30">Don't have an account? <a href="{{ route('register')}}">Create here</a></p>
                                </div>
                                <form method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        {{-- <input type="text" required="" name="email" placeholder="Username or Email *" /> --}}
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <input required="" type="password" name="password" placeholder="Your password *" /> --}}
                                        <input id="password" type="password" class="form-control password_with_eye" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        <i class="fa fa-eye-slash eye-icon" aria-hidden="true"></i>

                                            @error('password')
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
                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a class="text-muted" href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
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
        if($('.password_with_eye').attr("type") == "text"){
            $('.password_with_eye').attr('type','password');
            $('.eye-icon').addClass( "fa-eye-slash" );
            $('.eye-icon').removeClass( "fa-eye" );
        }else if($('.password_with_eye').attr("type") == "password"){
            $('.password_with_eye').attr('type', 'text');
            $('.eye-icon').removeClass( "fa-eye-slash" );
            $('.eye-icon').addClass( "fa-eye" );
        }
    });
});
</script>
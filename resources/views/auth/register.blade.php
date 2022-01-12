@extends('frontend.layouts.app')
@section('title', 'Register')

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
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Create an Account</h1>
                                    <p class="mb-30">Already have an account? <a href="{{ route( 'login' ) }}">Login</a></p>
                                </div>
                                {{-- @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach --}}
                                <form id="reg" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        {{-- <input type="text" required="" name="username" placeholder="Username" /> --}}
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        {{-- <input type="text" required="" name="email" placeholder="Email" /> --}}
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus> --}}
                                                <select name="country_id"
                                                class="form-control @error('country_id') is-invalid @enderror" style="height: 64px; font-size: 14px; font-weight: 600; color: #777777;">
                                                {{-- <option value="">Seclect Country</option> --}}
                                                @foreach ( $countries as $country )
                                                    <option value="{{$country->phonecode}}">{{$country->phonecode}} {{$country->iso}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="form-group">
                                        <input required="" type="password" name="password" placeholder="Confirm password" />
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div> --}}


                                    <div class="form-group">
                                        {{-- <input required="" type="password" name="password" placeholder="Password" /> --}}
                                        <input id="password" type="password" class="form-control password_with_eye @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                        <i class="fa fa-eye-slash eye-icon" aria-hidden="true"></i>

                                        <div id="pass_available" class="mt-1" ></div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                        <input type="password" class="form-control" name="password_confirmation" id="repassword" required autocomplete="new-password" placeholder="Confirm Password">
                                        <div id="repass_available" class="mt-1" ></div>
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
                                    {{-- <div class="payment_option mb-50">
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="" />
                                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">I am a customer</label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="" />
                                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">I am a vendor</label>
                                        </div>
                                    </div> --}}
                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                            <div id="terms"></div>
                                        </div>
                                        <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Terms &amp; Policy</a>
                                    </div>


                                    <div class="form-group mb-30">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                    </div>
                                    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <div class="card-login mt-115">
                            <a href="#" class="social-login facebook-login">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/logo-facebook.svg') }}" alt="" />
                                <span>Continue with Facebook</span>
                            </a>
                            <a href="#" class="social-login google-login">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/logo-google.svg') }}" alt="" />
                                <span>Continue with Google</span>
                            </a>
                            <a href="#" class="social-login apple-login">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/logo-apple.svg') }}" alt="" />
                                <span>Continue with Apple</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<style>
    .badge {
        white-space: normal !important;
    }
    .badge {
    display: inline-block;
    padding: 0.25em 0.4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

</style>


<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>

<script>
    // alert('dsdf');
//    $('#repassword').on('keyup change', function(){
//         let password = $('#password').val();
//         let repassword = $('#repassword').val();
//         if(password != repassword || password == ''){
//           $('#repass_available').html(`<span class="badge badge-danger">Password not matched</span>`)
//         }else{
//           $('#repass_available').html(`<span class="badge badge-success">Password matched</span>`)
//         }
//       })

$( document ).ready(function() {

    $('#exampleCheckbox12').click(function() {
        $('#exampleCheckbox12').val('checked');
    })

    $('#reg').on('submit', function(){
        let hasChecked = $('#exampleCheckbox12').val();

        if (hasChecked != 'checked'){
            $('#terms').html(`<span class="badge badge-danger" style="color: #fff; text-align: center; font-size: 0.92em;background-color: #fdc040;" >You must agree to terms & Policy for sign up.</span>`)
            return false;
        }
      })

    $('#password').on('keyup change', function(){
        let password = $('#password').val();
        if(validatePassword(password)){
          $('#pass_available').html(`<span class="badge badge-success" style="color: #fff; font-size: 0.92em; background-color: #3bb77e;" >Password acceptable</span>`)
        }else{
          $('#pass_available').html(`<span class="badge badge-danger" style="color: #fff; text-align: center; font-size: 0.92em; background-color: #fdc040;" >Password must contain at least 8 characters: <br> including at least 1 uppercase letter | 1 lowercase letter | 1 number  1 special character</span>`)
        }
      })




      $('#repassword').on('keyup change', function(){
        let password = $('#password').val();
        let repassword = $('#repassword').val();
        if(password != repassword || password == ''){
          $('#repass_available').html(`<span class="badge badge-danger" style="color: #fff; text-align: center; font-size: 0.92em; background-color: #fdc040;" >Password not matched</span>`)
        }else{
          $('#repass_available').html(`<span class="badge badge-success" style="color: #fff; font-size: 0.92em; background-color: #3bb77e;" >Password matched</span>`)
        }
      })


      function validatePassword(password) {
        const re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()+=-\?;,./{}|\":<>\[\]\\\' ~_]).{8,}/
        return re.test(password);
      }

});

</script>

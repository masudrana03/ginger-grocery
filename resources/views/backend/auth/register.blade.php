@extends('backend.layouts.app2')
@section('title', 'Sign Up')



@push('styles')
<style>
    .cs_modal .modal-body .form-group .password_with_eye {
    width: 100%;
    display: inline-flex;
    overflow: hidden;
   
}

.cs_modal .modal-body .form-group .eye-icon {
   
    position:absolute;
    margin-left: -40px;
    margin-top: 17px;
    
}
</style>   

@endpush



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
                                        <input id="type" type="hidden"  name="type" value="1">

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
                                        <div class="form-group" id="show-password">
                                            {{-- <input type="password" class="form-control" placeholder="Password"> --}}

                                            <input id="password" type="password" class="form-control password_with_eye @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                            <i class="fa fa-eye-slash eye-icon" aria-hidden="true"></i>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control password_with_eye" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                            {{-- <i class="fa fa-eye-slash eye-icon" aria-hidden="true"></i> --}}
                                        </div>
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone"  autofocus>
                                            
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

                                        <p>Need an account? <a href="{{ route('admin.login') }}">Log in </a></p>
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


@push('script')
<script>

 
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
@endpush


    

@extends('backend.layouts.app')
@section('title', 'General Settings')

@push('styles')
    <style>
        .password_with_eye {
            width: 100%;
            display: inline-flex;
            overflow: hidden;

        }

        .eye-icon {

            position: absolute;
            margin-left: -44px;
            margin-top: 13px;

        }

    </style>
@endpush

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Email Settings</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalCenter">Send Test Mail</button>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.settings.email.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="company_name">Mail Driver</label>
                                    <select name="mail_driver" onchange="mailDriverChange()"
                                        class="form-control @error('mail_driver') is-invalid @enderror" id="mail_driver"
                                        aria-describedby="emailHelp"
                                        value="{{ old('mail_driver') ?? settings('mail_driver') }}">
                                        <option value="smtp">SMTP</option>
                                    </select>
                                    @error('mail_driver')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="mail_host">
                                    <label for="mail_host">Mail Host</label>
                                    <input type="text" name="mail_host"
                                        class="form-control @error('mail_host') is-invalid @enderror"
                                        aria-describedby="emailHelp" placeholder="Mail Host"
                                        value="{{ old('mail_host') ?? settings('mail_host') }}">
                                    @error('mail_host')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="mail_port">
                                    <label for="mail_port">Mail Port</label>
                                    <input type="text" name="mail_port"
                                        class="form-control @error('mail_port') is-invalid @enderror"
                                        aria-describedby="emailHelp" placeholder="Mail Port"
                                        value="{{ old('mail_port') ?? settings('mail_port') }}">
                                    @error('mail_port')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="mail_user_name">
                                    <label for="mail_user_name">Username</label>
                                    <input type="text" name="mail_user_name"
                                        class="form-control @error('mail_user_name') is-invalid @enderror"
                                        aria-describedby="emailHelp" placeholder="Username"
                                        value="{{ old('mail_user_name') ?? settings('mail_user_name') }}">
                                    @error('mail_user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="mail_password">
                                    <label for="mail_password">Password</label>
                                    <input type="password" name="mail_password"
                                        class="form-control password_with_eye @error('mail_password') is-invalid @enderror"
                                        aria-describedby="emailHelp" placeholder="Passwod"
                                        value="{{ old('mail_password') ?? settings('mail_password') }}">


                                    <i class="fa fa-eye-slash eye-icon" aria-hidden="true"></i>

                                    @error('mail_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="mail_from">
                                    <label for="mail_from">Email From</label>
                                    <input type="text" name="mail_from"
                                        class="form-control @error('mail_from') is-invalid @enderror"
                                        aria-describedby="emailHelp" placeholder="Email From"
                                        value="{{ old('mail_from') ?? settings('mail_from') }}">
                                    @error('mail_from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="mail_from_name">
                                    <label for="mail_from_name">From Name</label>
                                    <input type="text" name="mail_from_name"
                                        class="form-control @error('mail_from_name') is-invalid @enderror"
                                        aria-describedby="emailHelp" placeholder="From Name"
                                        value="{{ old('mail_from_name') ?? settings('mail_from_name') }}">
                                    @error('mail_from_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="encryption">
                                    <label for="encryption">Encryption</label>
                                    <select name="encryption" class="form-control @error('encryption') is-invalid @enderror"
                                        aria-describedby="emailHelp" placeholder="Encryption"
                                        value="{{ old('encryption') ?? settings('encryption') }}">
                                        <option value="TLS" {{ settings('encryption') == 'tls' ? 'selected' : '' }}>TLS
                                        </option>
                                        <option value="SSL" {{ settings('encryption') == 'ssl' ? 'selected' : '' }}>SSL
                                        </option>
                                    </select>
                                    @error('encryption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.send_test_email') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sending Test Mail
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.send_test_email') }}" method="POST">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Test email">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // function mailDriverChange() {

        //     let mailDriver = $("#mail_driver").val();

        //     if (mailDriver == 'SendMail') {
        //         $("#mail_host").hide();
        //         $("#mail_port").hide();
        //         $("#mail_user_name").hide();
        //         $("#mail_password").hide();
        //         $("#encryption").hide();
        //     } else {
        //         $("#mail_host").show();
        //         $("#mail_port").show();
        //         $("#mail_user_name").show();
        //         $("#mail_password").show();
        //         $("#encryption").show();
        //     }
        // }
    </script>
@endpush
@push('script')
    <script>
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
@endpush

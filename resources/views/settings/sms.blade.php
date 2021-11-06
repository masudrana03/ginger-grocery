@extends('layouts.app')
@section('title', 'General Settings')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">SMS Settings</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('settings.email.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="company_name">SMS Driver</label>
                                    <select name="mail_driver" onchange="mailDriverChange()"
                                        class="form-control @error('mail_driver') is-invalid @enderror" id="mail_driver"
                                        aria-describedby="emailHelp"
                                        value="{{ old('mail_driver') ?? settings('mail_driver') }}">
                                        <option value="SMTP">One</option>
                                        <option value="SendMail">Two</option>
                                    </select>
                                    @error('mail_driver')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="mail_host">
                                    <label for="mail_host">Field One</label>
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    
@endpush

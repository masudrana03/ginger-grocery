@extends('backend.layouts.app')
@section('title', 'Social Media Settings')

@push('styles')
    <style>
        .nav-pills-custom .nav-link {
            position: relative;
        }

        .nav-pills-custom .nav-link.active {
            color: #3BB77E;
            background: #fff;
        }


        /* Add indicator arrow for the active tab */
        @media (min-width: 992px) {
            .nav-pills-custom .nav-link::before {
                content: '';
                display: block;
                border-top: 8px solid transparent;
                border-left: 10px solid #fff;
                border-bottom: 8px solid transparent;
                position: absolute;
                top: 50%;
                right: -10px;
                transform: translateY(-50%);
                opacity: 0;
            }
        }

        .nav-pills-custom .nav-link.active::before {
            opacity: 1;
        }

    </style>
@endpush

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Social Media Settings</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <!-- Demo header-->
                            <section class="py-5 header">
                                <div class="container py-4">
                                    {{-- <header class="text-center mb-5 pb-5 text-white">
                                        <h1 class="display-4">Bootstrap vertical tabs</h1>
                                        <p class="mb-1">Making advantage of Bootstrap 4 components, easily build
                                            an awesome tabbed interface.</p>
                                        <p class=">
                                            <a class="text-white" href="">
                                                <u></u>
                                            </a>
                                        </p>
                                    </header> --}}


                                    <div class="row">
                                        <div class="col-md-3">
                                            <!-- Tabs nav -->
                                            <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab"
                                                    data-toggle="pill" href="#v-pills-home" role="tab"
                                                    aria-controls="v-pills-home" aria-selected="true">
                                                    <span class="font-weight-bold">Google</span></a>

                                                <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab"
                                                    data-toggle="pill" href="#v-pills-messages" role="tab"
                                                    aria-controls="v-pills-messages" aria-selected="false">
                                                    <span class="font-weight-bold">Facebook</span></a>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <!-- Tabs content -->

                                            <div class="tab-content white_card_body" id="v-pills-tabContent">

                                                {{-- For First Nav Tab   --}}

                                                <div class="tab-pane fade shadow rounded bg-white show active p-5"
                                                    id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <h4 class="mb-4">Google</h4>
                                                    <hr>
                                                    <form action="{{ route('admin.settings.social.update') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="hidden" name="provider" value="google">
                                                            <label for="client_id">Google Client Id</label>
                                                            <input type="text" name="client_id"
                                                                class="form-control @error('client_id') is-invalid @enderror"
                                                                id="client_id" aria-describedby="emailHelp"
                                                                placeholder="Client Id" value="{{ old('client_id') ?? $google->client_id }}">
                                                            @error('client_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="client_secret">Google Client Secret</label>
                                                            <input type="text" name="client_secret"
                                                                class="form-control @error('client_secret') is-invalid @enderror"
                                                                id="client_secret" aria-describedby="emailHelp"
                                                                placeholder="Client Secret"
                                                                value="{{ old('client_secret') ?? $google->client_secret }}">
                                                            @error('client_secret')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="redirect_url">Google Redirect Url</label>
                                                            <input type="text" name="redirect_url"
                                                                class="form-control @error('redirect_url') is-invalid @enderror"
                                                                id="redirect_url" aria-describedby="emailHelp" readonly
                                                                placeholder="Client Secret"
                                                                value="{{ old('redirect_url') ?? $google->redirect_url  }}">
                                                            @error('redirect_url')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="body">Status</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $google->status == 'Active' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio1" value="Active">
                                                                <label class="form-check-label"
                                                                    for="inlineRadio1">Active</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $google->status == 'Inactive' ? 'checked' : '' }} name="status" class="form-check-input" type="radio"
                                                                    id="inlineRadio2" value="Inactive">
                                                                <label class="form-check-label"
                                                                    for="inlineRadio2">Inactive</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>

                                                {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile"
                                                    role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                    <h4 class="mb-4">paypal</h4>
                                                    <hr>
                                                    <form action="{{ route('admin.settings.payment.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="provider" value="paypal">
                                                        <div class="form-group">
                                                            <label for="client_key">Client Key</label>
                                                            <input type="text" name="client_key"
                                                                class="form-control @error('client_key') is-invalid @enderror"
                                                                id="client_key" aria-describedby="emailHelp"
                                                                placeholder="Client Key"
                                                                value="{{ old('client_key') ?? $paypal->client_secret }}">
                                                            @error('client_key')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="client_secret">Client Secret</label>
                                                            <input type="text" name="client_secret"
                                                                class="form-control @error('client_secret') is-invalid @enderror"
                                                                id="client_secret" aria-describedby="emailHelp"
                                                                placeholder="Client Secret"
                                                                value="{{ old('client_secret') ?? $paypal->client_secret }}">
                                                            @error('client_secret')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="body">Status</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $paypal->status == 'Active' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio1" value="Active">
                                                                <label class="form-check-label" for="inlineRadio1">Active</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $paypal->status == 'Inactive' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio2" value="Inactive">
                                                                <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="body">Platform</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $paypal->platform == 'Live' ? 'checked' : '' }} name="platform" class="form-check-input" type="radio" id="inlineRadio3" value="Live">
                                                                <label class="form-check-label" for="inlineRadio3">Live</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $paypal->platform == 'Sandbox' ? 'checked' : '' }} name="platform" class="form-check-input" type="radio" id="inlineRadio4" value="Sandbox">
                                                                <label class="form-check-label" for="inlineRadio4">Sandbox</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div> --}}


                                                {{-- For Second Nav Tab   --}}

                                                <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages"
                                                    role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                    <h4 class="mb-4">Facebook</h4>
                                                    <hr>
                                                    <form action="{{ route('admin.settings.social.update') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="hidden" name="provider" value="facebook">
                                                            <label for="client_id">Facebook Client Id</label>
                                                            <input type="text" name="client_id"
                                                                class="form-control @error('client_id') is-invalid @enderror"
                                                                id="client_id" aria-describedby="emailHelp"
                                                                placeholder="Client Id" value="{{ old('client_id') ?? $facebook->client_id }}">
                                                            @error('client_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="client_secret">Facebook Client Secret</label>
                                                            <input type="text" name="client_secret"
                                                                class="form-control @error('client_secret') is-invalid @enderror"
                                                                id="client_secret" aria-describedby="emailHelp"
                                                                placeholder="Client Secret"
                                                                value="{{ old('client_secret') ?? $facebook->client_secret }}">
                                                            @error('client_secret')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="redirect_url">Facebook Redirect Url</label>
                                                            <input type="text" name="redirect_url"
                                                                class="form-control @error('redirect_url') is-invalid @enderror"
                                                                id="redirect_url" aria-describedby="emailHelp" readonly
                                                                placeholder="Client Secret"
                                                                value="{{ old('redirect_url') ?? $facebook->redirect_url }}">
                                                            @error('redirect_url')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="body">Status</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $facebook->status == 'Active' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio1" value="Active">
                                                                <label class="form-check-label"
                                                                    for="inlineRadio1">Active</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input {{ $facebook->status == 'Inactive' ? 'checked' : '' }} name="status" class="form-check-input" type="radio"
                                                                    id="inlineRadio2" value="Inactive">
                                                                <label class="form-check-label"
                                                                    for="inlineRadio2">Inactive</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
@endsection

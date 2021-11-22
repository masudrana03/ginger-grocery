@extends('backend.layouts.app2')
@section('title', 'Install')

@section('content')
    <div class="main_content_iner" style="margin-top: 3%; padding: 30px; padding-top: 150px; padding-bottom: 150px;">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30" style="background-color: #FBF6F0;">
                        <div class="row justify-content-center">

                            <div class="col-lg-4">
                                <!-- sign_in  -->
                                <div class="modal-content cs_modal">
                                    <div class="modal-header justify-content-center theme_bg_1">
                                        <h5 class="modal-title text_white">Purchase Code</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <input type="text" class="form-control" placeholder="Enter your email"> --}}
                                                <input id="Codecanyon Username" type="Codecanyon Username" class="form-control @error('Codecanyon Username') is-invalid @enderror" name="Codecanyon Username" value="{{ old('Codecanyon Username') }}" required autocomplete="Codecanyon Username" autofocus placeholder="Enter your Codecanyon Username">

                                                @error('Codecanyon Username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                                                <input id="Purchase Code" type="Purchase Code" class="form-control @error('Purchase Code') is-invalid @enderror" name="Purchase Code" required autocomplete="current-Purchase Code" placeholder="Purchase Code">

                                                @error('Purchase Code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn_1 full_width text-center">Continue</button>
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

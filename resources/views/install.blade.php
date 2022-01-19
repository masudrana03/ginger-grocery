@extends('backend.layouts.app2')
@section('title', 'Install')

@section('content')
    <div class="main_content_iner" style="margin-top: 3%; padding: 30px; padding-top: 150px; padding-bottom: 150px;">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30" style="background-color: #eff3f7;">
                        <div class="row justify-content-center">

                            <div class="col-lg-4">
                                <!-- sign_in  -->
                                <div class="modal-content cs_modal">
                                    <div class="modal-header justify-content-center theme_bg_1">
                                        <h5 class="modal-title text_white">Purchase Code</h5>
                                    </div>
                                    <p class="modal-header justify-content-center" style="font-weight: 800; color: #4a4a4a; background-color: #FBF6F0;">Provide your codecanyon purchase code.</p>
                                    @if($errors->any())
                                    <h6 class="modal-header justify-content-center" style="font-weight: 800; color: #f3f3f3; background-color: #fd517d; padding-top: 10px; padding-bottom: 10px; font-size: 12px;">{{$errors->first()}}</h6>
                                    @endif
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('valideCodeCheck') }}">
                                            @csrf
                                            <div class="form-group">
                                                {{-- <input type="text" class="form-control" placeholder="Enter your email"> --}}
                                                <input id="Codecanyon Username" type="Codecanyon Username" class="form-control @error('Codecanyon Username') is-invalid @enderror" name="Username" value="{{ old('Username') }}" required autocomplete="Codecanyon Username" autofocus placeholder="Enter your Codecanyon Username">

                                                @error('Codecanyon Username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {{-- <input type="Purchase Code" class="form-control" placeholder="Purchase Code"> --}}
                                                <input id="Purchase Code" type="Purchase Code" class="form-control @error('Purchase Code') is-invalid @enderror" name="code" required autocomplete="current-Purchase Code" placeholder="Purchase Code">

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

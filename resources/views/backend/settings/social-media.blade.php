@extends('backend.layouts.app')
@section('title', 'General Settings')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Socail Media Link</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.settings.social.link.update') }}" method="POST">
                                {{-- <form action="{{ route('admin.settings.email.update') }}" method="POST"> --}}
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <label for="company_name">Facebook Link</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group" id="facebook-link">
                                            <input type="any" name="facebook_link"
                                                class="form-control @error('facebook_link') is-invalid @enderror"
                                                 placeholder="Facebook Url" value="{{ old('facebook_link') ?? settings('facebook_link') }}">

                                            @error('facebook_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <label for="company_name">Twitter Link</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group" id="twitter-link">
                                            <input type="text" name="twitter_link"
                                                class="form-control @error('twitter_link') is-invalid @enderror"
                                                 placeholder="Twitter Url" value="{{ old('twitter_link') ?? settings('twitter_link') }}"
                                                >
                                                {{--  --}}
                                            @error('twitter_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <label for="company_name">Instagram Link</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group" id="instagram-link">
                                            <input type="text" name="instagram_link"
                                                class="form-control @error('instagram_link') is-invalid @enderror"
                                                 placeholder="Instagram Url" value="{{ old('instagram_link') ?? settings('instagram_link') }}"
                                                >
                                                {{-- value="{{ old('facebook_link') ?? settings('facebook_link') }}" --}}
                                            @error('instagram_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <label for="company_name">Linkedin Link</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group" id="linkedin-link">
                                            <input type="text" name="linkedin_link"
                                                class="form-control @error('linkedin_link') is-invalid @enderror"
                                                 placeholder="Linkedin Url" value="{{ old('linkedin_link') ?? settings('linkedin_link') }}"
                                                >
                                                {{-- value="{{ old('facebook_link') ?? settings('facebook_link') }}" --}}
                                            @error('linkedin_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <label for="company_name">Youtube Link</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group" id="youtube-link">
                                            <input type="text" name="youtube_link"
                                                class="form-control @error('youtube_link') is-invalid @enderror"
                                                 placeholder="Youtube Url" value="{{ old('youtube_link') ?? settings('youtube_link') }}"
                                                >
                                                {{-- value="{{ old('facebook_link') ?? settings('facebook_link') }}" --}}
                                            @error('youtube_link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')
    <script>

    </script>
@endpush

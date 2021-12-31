@extends('backend.layouts.app')
@section('title', 'About Service Edit')

@push('styles')
    <style>
        .note-insert {
            display: none !important;
        }

    </style>
@endpush

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">About service Edit</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="{{ route('admin.about.service.index') }}" class="btn_1">Back</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="white_card_body">
                            <form action="{{ route('admin.about.service.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('patch') --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="service_section_tittle1">Title 01</label>
                                            <input type="text" name="service_section_tittle1"
                                                class="form-control @error('service_section_tittle1') is-invalid @enderror" id="service_section_tittle1"
                                                aria-describedby="emailHelp" placeholder="service_section_tittle1" value="{{ old('service_section_tittle1') ?? $aboutService->service_section_tittle1 }}">
                                            @error('service_section_tittle1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="service_section_description1">Description 01</label>
                                            <textarea rows="4" name="service_section_description1"
                                                class="form-control @error('service_section_description1') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="service_section_description1"
                                                >{{ old('service_section_description1') ?? $aboutService->service_section_description1 }}</textarea>
                                            @error('service_section_description1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="service_section_tittle5">Title 02</label>
                                            <input type="text" name="service_section_tittle2"
                                                class="form-control @error('service_section_tittle2') is-invalid @enderror" id="service_section_tittle2"
                                                aria-describedby="emailHelp" placeholder="service_section_tittle2" value="{{ old('service_section_tittle2') ?? $aboutService->service_section_tittle2 }}">
                                            @error('service_section_tittle2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="service_section_description2">Description 02</label>
                                            <textarea rows="4" name="service_section_description2"
                                                class="form-control @error('service_section_description2') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="service_section_description2"
                                                >{{ old('service_section_description2') ?? $aboutService->service_section_description2 }}</textarea>
                                            @error('service_section_description2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="service_section_tittle3">Title 03</label>
                                            <input type="text" name="service_section_tittle3"
                                                class="form-control @error('service_section_tittle3') is-invalid @enderror" id="service_section_tittle3"
                                                aria-describedby="emailHelp" placeholder="service_section_tittle3" value="{{ old('service_section_tittle3') ?? $aboutService->service_section_tittle3 }}">
                                            @error('service_section_tittle3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="service_section_description3">Description 03</label>
                                            <textarea rows="4" name="service_section_description3"
                                                class="form-control @error('service_section_description3') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="service_section_description3"
                                                >{{ old('service_section_description3') ?? $aboutService->service_section_description3 }}</textarea>
                                            @error('service_section_description3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="service_section_tittle4">Title 04</label>
                                            <input type="text" name="service_section_tittle4"
                                                class="form-control @error('service_section_tittle4') is-invalid @enderror" id="service_section_tittle4"
                                                aria-describedby="emailHelp" placeholder="service_section_tittle4" value="{{ old('service_section_tittle4') ?? $aboutService->service_section_tittle4 }}">
                                            @error('service_section_tittle4')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="service_section_description4">Description 04</label>
                                            <textarea rows="4" name="service_section_description4"
                                                class="form-control @error('service_section_description4') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="service_section_description4"
                                                >{{ old('service_section_description4') ?? $aboutService->service_section_description4 }}</textarea>
                                            @error('service_section_description1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="service_section_tittle5">Title 05</label>
                                            <input type="text" name="service_section_tittle5"
                                                class="form-control @error('service_section_tittle5') is-invalid @enderror" id="service_section_tittle5"
                                                aria-describedby="emailHelp" placeholder="service_section_tittle5" value="{{ old('service_section_tittle5') ?? $aboutService->service_section_tittle5 }}">
                                            @error('service_section_tittle5')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="service_section_description5">Description 05</label>
                                            <textarea rows="4" name="service_section_description5"
                                                class="form-control @error('service_section_description5') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="service_section_description5"
                                                >{{ old('service_section_description5') ?? $aboutService->service_section_description5 }}</textarea>
                                            @error('service_section_description5')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="service_section_tittle6">Title 06</label>
                                            <input type="text" name="service_section_tittle6"
                                                class="form-control @error('service_section_tittle6') is-invalid @enderror" id="service_section_tittle6"
                                                aria-describedby="emailHelp" placeholder="service_section_tittle6" value="{{ old('service_section_tittle6') ?? $aboutService->service_section_tittle6 }}">
                                            @error('service_section_tittle6')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="service_section_description6">Description 06</label>
                                            <textarea rows="4" name="service_section_description6"
                                                class="form-control @error('service_section_description6') is-invalid @enderror"
                                                aria-describedby="emailHelp" placeholder="service_section_description6"
                                                >{{ old('service_section_description6') ?? $aboutService->service_section_description6 }}</textarea>
                                            @error('service_section_description6')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

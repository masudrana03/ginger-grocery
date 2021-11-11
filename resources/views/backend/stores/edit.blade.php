@extends('backend.layouts.app')
@section('title', 'Edit Store')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Edit Store</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('stores.update', $store->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" placeholder="Name" value="{{ old('name') ?? $store->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" aria-describedby="emailHelp" placeholder="type" value="{{ old('type') ?? $store->type }}">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="file-upload-btn btn btn-secondary rounded-pill" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-cloud-upload-alt"></i> upload</button>
                                            <div class="image-upload-wrap" style="display: none;">
                                              <input class="file-upload-input " type='file' onchange="readURL(this);" accept="image/*" name="image" id="image" />
                                            </div>
                                            <div class="file-upload-content">
                                              <img class="file-upload-image" src="#" alt="your image" />
                                              <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                              </div>
                                            </div>
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

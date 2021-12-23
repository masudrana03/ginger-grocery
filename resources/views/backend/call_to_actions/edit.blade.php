@extends('backend.layouts.app')
@section('title', 'Edit Call To Action')

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
                                    <h3 class="m-0">Edit Call To Action</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.call_to_actions.update', $callToAction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="store">Store Name</label>
                                    <select name="store"
                                    class="form-control @error('store') is-invalid @enderror">
                                        <option value="">Select Store</option>
                                    @foreach ( $stores as $store )
                                        <option value="{{$store->id}}" {{ $store->id == $callToAction->store_id ? 'selected' : '' }} >{{$store->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('store')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="action_location">Action Location</label>
                                    <input subject="text" name="action_location" disabled
                                        class="form-control @error('action_location') is-invalid @enderror" id="action_location"
                                        aria-describedby="emailHelp" placeholder="Hear is your action location"
                                        value="{{ old('action_location') ?? $callToAction->action_location }}">
                                    @error('action_location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="action_tittle">Action Tittle</label>
                                    <input subject="text" name="action_tittle"
                                        class="form-control @error('action_tittle') is-invalid @enderror" id="action_tittle"
                                        aria-describedby="emailHelp" placeholder="Please write your tittle"
                                        value="{{ old('action_tittle') ?? $callToAction->action_tittle }}">
                                    @error('action_tittle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input {{ $callToAction->status == 'Active' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio1" value="Active">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input {{ $callToAction->status == 'Inactive' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio2" value="Inactive">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                    </div>
                                </div>
                                 {{-- <div class="form-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="image" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" id="image">
                                    </div>
                                </div> --}}

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

@push('script')

@endpush

@extends('backend.layouts.app')
@section('title', 'Create New Category')

@push('styles')
    <style>
        .image_container {
            height: 120px;
            width: 200px;
            border-radius: 6px;
            overflow: hidden;
            margin: 10px;
        }

        .image_container img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .image_container span {
            top: -6px;
            right: 8px;
            color: red;
            font-size: 28px;
            font-weight: normal;
            cursor: pointer;
        }

        .banner-image {
            min-width: 200px;
            min-width: 100px;
            max-width: 980px;
            max-height: 592px;
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
                                    <h3 class="m-0">Create New Banner</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        aria-describedby="emailHelp" placeholder="Title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Description</label>
                                    <textarea rows="3" name="body" class="form-control @error('body') is-invalid @enderror"
                                        id="body" aria-describedby="emailHelp"
                                        placeholder="Description">{{ old('body') }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input checked name="status" class="form-check-input" type="radio" id="inlineRadio1"
                                            value="Active">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="status" class="form-check-input" type="radio" id="inlineRadio2"
                                            value="Inactive">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                    </div>
                                </div>
                                {{-- <div class="row">
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
                                </div> --}}

                                {{-- single image upload code is here //safin --}}

                                <div class="form-group">
                                    <br> <small>This image size must be upto( 912px X 830px )</small>
                                    @if($errors->all())
                                    <h6 class="modal-header justify-content-start" style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 10px;  padding-bottom: 10px; font-size: 12px; max-width: 33%; border-radius: 5px;">{{$errors->first()}}</h6>
                                    @endif
                                    <div class="card shadow-sm w-100">
                                        <div class="card-header d-flex justify-content-start">
                                            <h4>Upload Banner Images</h4>

                                            <input type="file" name="image" id="image" accept="image/*"
                                                class="d-none " onchange="showImage(this)">
                                            <button class="btn btn-sm btn-primary ml-4" type="button"
                                                onclick="document.getElementById('image').click()">Select Image</button>
                                        </div>
                                        <div class="card-body d-flex flex-wrap justify-content-start" id="image-container">
                                            <img class="banner-image" id="thumbnil">
                                        </div>
                                    </div>
                                </div>
                                {{-- @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach --}}

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                {{-- single image upload code end here //safin --}}


                                {{-- <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div> --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        // image upload js code
        function showImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById('thumbnil');
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush

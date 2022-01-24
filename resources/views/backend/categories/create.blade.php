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

        .category-image {
            min-width: 200px;
            min-width: 100px;
            max-width: 400px;
            max-height: 280px;
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
                                    <h3 class="m-0">Create New Category</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.categories.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" aria-describedby="emailHelp" placeholder="Name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 80px X 80px )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 10px;  padding-bottom: 10px; font-size: 12px; max-width: 100%; border-radius: 5px;">
                                                    {{ $errors->first() }}</h6>
                                            @endif
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Category Images</h4>

                                                    <input type="file" name="image" id="image" accept="image/*"
                                                        class="d-none " onchange="showImage(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('image').click()">Select
                                                        Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start"
                                                    id="image-container">
                                                    <img class="category-image" id="thumbnil">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                                {{-- <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div> --}}
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

@extends('backend.layouts.app')
@section('title', 'General Settings')

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
                <div class="col-lg-8">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">General Settings</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.settings.general.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name"
                                        class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                                        aria-describedby="emailHelp" placeholder="Company Name"
                                        value="{{ old('company_name') ?? settings('company_name') }}">
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_address">Company Address</label>
                                    <textarea name="company_address"
                                        class="form-control @error('company_address') is-invalid @enderror"
                                        id="company_address" aria-describedby="emailHelp"
                                        placeholder="Company Address">{{ old('company_address') ?? settings('company_address') }}</textarea>
                                    @error('company_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" name="state"
                                        class="form-control @error('state') is-invalid @enderror" id="state"
                                        aria-describedby="emailHelp" placeholder="Company Name"
                                        value="{{ old('state') ?? settings('state') }}">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                        id="city" aria-describedby="emailHelp" placeholder="Company Name"
                                        value="{{ old('city') ?? settings('city') }}">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="currency" id="currency">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country"
                                        class="country form-control @error('country') is-invalid @enderror">
                                        <option value="">Seclect Country</option>
                                        @foreach ($countries as $country)
                                            <option data-id="{{ $country->currency_symbol }}"
                                                {{ settings('country') == $country->name ? 'selected' : '' }}
                                                value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        aria-describedby="emailHelp" placeholder="Company Phone"
                                        value="{{ old('phone') ?? settings('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="hot_number">Hot Number</label>
                                    <input type="text" name="hot_number"
                                        class="form-control @error('hot_number') is-invalid @enderror" id="hot_number"
                                        aria-describedby="emailHelp" placeholder="Company hot_number"
                                        value="{{ old('hot_number') ?? settings('hot_number') }}">
                                    @error('hot_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        aria-describedby="emailHelp" placeholder="Company Email"
                                        value="{{ old('email') ?? settings('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Logo Images</h4>

                                                    <input type="file" name="logo" id="logo" accept="image/*"
                                                        class="d-none " onchange="showLogo(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('logo').click()">Select
                                                        Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start"
                                                    id="image-container">
                                                    <img class="banner-image" id="thumbnil">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="logo">Logo</label><br>
                                            <button type="button" class="file-upload-btn btn btn-secondary rounded-pill"
                                                onclick="$('.file-upload-input').trigger( 'click' )"><i
                                                    class="fas fa-cloud-upload-alt"></i> upload</button>
                                            <div class="image-upload-wrap" style="display: none;">
                                                <input class="file-upload-input " type='file' onchange="readURL(this);"
                                                    accept="image/*" name="logo" id="image" />
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()"
                                                        class="remove-image">Remove <span class="image-title">Uploaded
                                                            Image</span></button>
                                                </div>
                                            </div>
                                        </div> --}}
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Favicon</h4>

                                                    <input type="file" name="favicon" id="favicon" accept="image/*"
                                                        class="d-none " onchange="showFavicon(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('favicon').click()">Select
                                                        Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start"
                                                    id="image-container">
                                                    <img class="banner-image" id="favicons">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="logo">Favicon</label><br>
                                            <button type="button" class="file-upload-btn btn btn-secondary rounded-pill"
                                                onclick="$('.file-upload-input').trigger( 'click' )"><i
                                                    class="fas fa-cloud-upload-alt"></i> upload</button>
                                            <div class="image-upload-wrap" style="display: none;">
                                                <input class="file-upload-input " type='file' onchange="readURL(this);"
                                                    accept="image/*" name="favicon" id="image" />
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()"
                                                        class="remove-image">Remove <span class="image-title">Uploaded
                                                            Image</span></button>
                                                </div>
                                            </div>
                                        </div> --}}
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="logo">Logo</label><br>
                                    <input type="file" name="logo" id="logo">
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="favicon">Favicon</label><br>
                                    <input type="file" name="favicon" id="favicon">
                                    @error('favicon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div> --}}
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
    <script type="text/javascript">
        $(".country").change(function() {
            var symbol = $(this).find(':selected').attr('data-id');
            $("#currency").val(symbol);
        });
        // image upload js code 
        function showLogo(fileInput) {
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


        function showFavicon(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById('favicons');
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

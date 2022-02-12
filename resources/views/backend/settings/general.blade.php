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
                <div class="col-lg-10">
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
                                        aria-describedby="emailHelp" placeholder="State Name"
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
                                        id="city" aria-describedby="emailHelp" placeholder="City Name"
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

                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Country
                                            Code
                                            <span class="required"></span></label>
                                        <select name="phone_code"
                                            class="select-two form-control @error('') is-invalid @enderror">
                                            @foreach ($countries as $countryName)
                                                <option
                                                    {{ $countryName->id == settings('phone_code') ? 'selected' : '' }}
                                                    value="{{ $countryName->id }}">
                                                    {{ $countryName->phone_code }}
                                                    {{ $countryName->iso2 }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror" id="phone"
                                            aria-describedby="emailHelp" placeholder="Phone Number "
                                            value="{{ old('phone') ?? settings('phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="news-flash">News Flash-1</label>
                                            <br><small>(Text must be within 60 character)</small>
                                            <input type="text" name="news_flash_one" required minlength="10" maxlength="60"
                                                class="form-control @error('email') is-invalid @enderror"
                                                aria-describedby="news_flash_one" placeholder="News Flash-1"
                                                value="{{ old('news_flash_one') ?? settings('news_flash_one') }}">
                                            @error('news_flash_two')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="news-flash">News Flash-2</label>
                                            <br><small>(Text must be within 60 character)</small>
                                            <input type="text" name="news_flash_two"
                                                class="form-control @error('email') is-invalid @enderror"
                                                aria-describedby="news_flash_two" placeholder="News Flash-2" required
                                                minlength="10" maxlength="60"
                                                value="{{ old('news_flash_two') ?? settings('news_flash_two') }}">
                                            @error('news_flash_two')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="news-flash">News Flash-3</label>
                                            <br><small>(Text must be within 60 character)</small>
                                            <input type="text" name="news_flash_three" required minlength="10"
                                                maxlength="60"
                                                class="form-control @error('news_flash_three') is-invalid @enderror"
                                                aria-describedby="news_flash_three" placeholder="News Flash-3"
                                                value="{{ old('news_flash_three') ?? settings('news_flash_three') }}">
                                            @error('news_flash_three')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 215px X 66px )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 8px;  padding-bottom: 8px; font-size: 12px; max-width: 35%; border-radius: 5px;">
                                                    {{ $errors->first('logo') }}</h6>
                                            @endif
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 500 x 600 )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 8px;  padding-bottom: 8px; font-size: 12px; max-width: 35%; border-radius: 5px;">
                                                    {{ $errors->first('favicon') }}</h6>
                                            @endif
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Down Nav Image</h4>

                                                    <input type="file" name="down_nav_image" id="navImg" accept="image/*"
                                                        class="d-none " onchange="showNavImg(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('navImg').click()">Select
                                                        Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start"
                                                    id="image-container">
                                                    <img class="banner-image" id="navs">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 16px X 16px )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 8px;  padding-bottom: 8px; font-size: 12px; max-width: 35%; border-radius: 5px;">
                                                    {{ $errors->first('favicon') }}</h6>
                                            @endif
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
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 32px X 32px )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 8px;  padding-bottom: 8px; font-size: 12px; max-width: 35%; border-radius: 5px;">
                                                    {{ $errors->first('mini_logos') }}</h6>
                                            @endif
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Admin sidebar mini logo</h4>

                                                    <input type="file" name="mini_logo" id="mini_logo" accept="image/*"
                                                        class="d-none " onchange="showMini_logo(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('mini_logo').click()">Select
                                                        Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start"
                                                    id="image-container">
                                                    <img class="banner-image" id="mini_logos">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 600px X 500px )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 8px;  padding-bottom: 8px; font-size: 12px; max-width: 35%; border-radius: 5px;">
                                                    {{ $errors->first('favicon') }}</h6>
                                            @endif
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Contact Page Image</h4>

                                                    <input type="file" name="contact_image" id="contact_image"
                                                        accept="image/*" class="d-none "
                                                        onchange="showContactImage(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('contact_image').click()">Select
                                                        Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start"
                                                    id="image-container">
                                                    <img class="banner-image" id="contact_images">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 600 x 500 )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 8px;  padding-bottom: 8px; font-size: 12px; max-width: 35%; border-radius: 5px;">
                                                    {{ $errors->first('mini_logos') }}</h6>
                                            @endif
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload login page Image</h4>

                                                    <input type="file" name="login_image" id="login_image" accept="image/*"
                                                        class="d-none " onchange="showLoginImage(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('login_image').click()">Select
                                                        Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start"
                                                    id="image-container">
                                                    <img class="banner-image" id="login_images">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br> <small>This image size must be upto ( 215px X 66px )</small>
                                            @if ($errors->all())
                                                <h6 class="modal-header justify-content-start"
                                                    style="font-weight: 800; color: #FFFFFF; background-color: #FDC040; padding-top: 8px;  padding-bottom: 8px; font-size: 12px; max-width: 35%; border-radius: 5px;">
                                                    {{ $errors->first('logo') }}</h6>
                                            @endif
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

                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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

        function showMini_logo(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById('mini_logos');
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

        function showLoginImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById('login_images');
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

        function showContactImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById('contact_images');
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

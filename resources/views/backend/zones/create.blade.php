@extends('backend.layouts.app')
@section('title', 'Create New Product')

@push('styles')
    <style>
        .note-insert {
            display: none !important;
        }
        .note-editable {
            height: 250px!important;
        }

    </style>
@endpush

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Create New Zone</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="Coordinates">Coordinates<small style="font-size: 12px"> ( draw your zone area on the map )</small></label>
                                    <textarea name="Coordinates"
                                        class="form-control @error('Coordinates') is-invalid @enderror" id="Coordinates"
                                        aria-describedby="emailHelp" placeholder="Coordinates" value="{{ old('Coordinates') }}"></textarea>
                                    @error('Coordinates')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Create New Zone</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="col-xl-12">
                                <div class="card_box box_shadow mb_30">
                                    <div class="white_box_tittle" style="padding: 20px !important">
                                        <div class="main-title2 ">
                                            <h5 class="mb-2 nowrap">Draw your zone area on the map</h5>
                                        </div>
                                    </div>
                                    <div class="box_body">
                                        <div id="map1" class="map-js-height"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="action-button-row" style="display: none;">
        <div class="form-group row">

            <div class="col-sm-2">
                <div class="form-group">
                    <button type="button" class="file-upload-btn btn btn-secondary rounded-pill" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-cloud-upload-alt"></i> upload</button>
                    <div class="image-upload-wrap" style="display: none;">
                      <input class="file-upload-input " type='file' onchange="readURL(this);" accept="image/*" name="image[]" />
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                      </div>
                    </div>
                  </div>
            </div>
            {{-- <div class="col-sm-3">
                <input type="file" name="image[]">
            </div> --}}
            <div class="col-sm-2">
                <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #884FFB"
                    class="fas fa-plus-circle addRow"></i>
                <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #884FFB"
                    class="fas fa-minus-circle removeRow"></i>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.single2').select2();

            let length = $('#inputFormRow').find(".form-group").length
            if (length === 1) {
                $('.removeRow').hide();
            }

            // add row
            $(document).on('click', '.addRow', function() {
                var html = $("#action-button-row").html();
                $('#inputFormRow').append(html);
                $(".removeRow").show();
            });

            // remove row
            $(document).on('click', '.removeRow', function() {
                var childRows = $(this).parents('#inputFormRow').find(".form-group").length;
                if (childRows > 1) $(this).closest('.form-group').remove();
                if (childRows == 2) $('.removeRow').hide();
            });

            $(document).on('click', '.save', function() {
                var oldValue = $('#inputFormRow').find(".form-group").length;

                if (oldValue > 1) {
                    $(".addRow").show();
                    $(".removeRow").show();
                }
            });
        });
    </script>
@endpush

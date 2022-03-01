@extends('backend.layouts.app')
@section('title', 'About')

@push('styles')
<style>
   .custom-img{
       left: 10px;
   }

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

         .banner-image{
             min-width: 200px;
             min-width:100px ;
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
                                    <h3 class="m-0">About Info</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.about.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="main_section_tittle">Tittle</label>
                                    <input type="text" name="main_section_tittle"
                                        class="form-control @error('main_section_tittle') is-invalid @enderror" id="main_section_tittle"
                                        aria-describedby="emailHelp" placeholder="About Main Tittle"
                                        value="{{ old('main_section_tittle') ?? $abouts->main_section_tittle }}">
                                    @error('main_section_tittle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="main_section_description">Description</label>
                                    <textarea rows="3" name="main_section_description"
                                        class="form-control @error('main_section_description') is-invalid @enderror" id="summernote"
                                        aria-describedby="emailHelp" placeholder="main_section_description"
                                        >{{ old('main_section_description') ?? $abouts->main_section_description }}</textarea>
                                    @error('description')
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
                                                        <h4>Upload Images</h4>

                                                            <input type="file" name="main_section_image" id="image" class="d-none " onchange="showImage(this)">
                                                            <button class="btn btn-sm btn-primary ml-4" type="button" onclick="document.getElementById('image').click()">Select Image</button>
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start" id="image-container">
                                                        <img class="banner-image" src='{{ asset('assets/img/uploads/abouts/'.$abouts->main_section_image) }}' id="thumbnil">
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

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
           function showImage(fileInput){
               var files = fileInput.files;
               for (var i = 0; i< files.length ; i++){
                   var file = files[i];
                   var imageType = /image.*/;
                   if (!file.type.match(imageType)) {
                    continue;
                    }
                    var img=document.getElementById('thumbnil');
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

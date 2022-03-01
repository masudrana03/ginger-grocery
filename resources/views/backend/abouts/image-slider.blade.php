@extends('backend.layouts.app')
@section('title', 'About Image slider')

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

         .banner-image{
             min-width: 200px;
             min-width:100px ;
             max-width: 980px;
             max-height: 592px;
         }
</style>
@endpush

@section('content')
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">About Image slider</h3>
                            </div>
                        </div>

                    </div>
                    <div class="white_card_body">
                        <div class="table-responsive">
                            <table class="table" id="brands">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $aboutsImage  as $items )
                                    <tr>
                                        <td>{{ $items->id }}</td>
                                        <td><img src='{{ asset('assets/img/uploads/abouts/'.$items ->image) }}' width='120' height='120'></td>
                                        <td><a href="#"><i class="fas fa-upload fa-2x" data-toggle="modal" onclick="getId({{ $items->id }})" data-target="#grid_modal"></i></a></td>
                                    </tr>
                                    @empty
                                    <p class="text-center">About Image not found!</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="grid_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Image Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="white_card_body">
                <form action="{{ route('admin.about.slider.update') }}" id="about-slider" method="POST"enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">About Slider Image</label><br>
                                <div class="form-group">
                                    <div class="card shadow-sm w-100">
                                        <div class="card-header d-flex justify-content-start">
                                                <h4>Upload Images</h4>

                                                    <input type="file" name="image" id="image" accept="image/*" class="d-none " onchange="showImage(this)">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button" onclick="document.getElementById('image').click()">Select Image</button>
                                        </div>
                                        <div class="card-body d-flex flex-wrap justify-content-start" id="image-container">
                                               <img class="banner-image"  id="thumbnil">
                                        </div>
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

@endsection


@push('script')
<script type="text/javascript">

    function getId(id) {
        document.getElementById("myid").value = id;
    }


    // image upload js code
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

    // function getUrl()
    // {
    //     document.getElementById("myForm").action = "";
    // }
</script>
@endpush



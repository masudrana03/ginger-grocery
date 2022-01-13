@extends('backend.layouts.app')
@section('title', 'Edit Call To Action')

@push('styles')
    <style>
        .note-insert {
            display: none !important;
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

                                
                                    <div class="form-group">
                                        <div class="card shadow-sm w-100">
                                            <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Action Images</h4>
                                                    
                                                        <input type="file" name="image" id="image" accept="image/*" class="d-none " onchange="showImage(this)">
                                                        <button class="btn btn-sm btn-primary ml-4" type="button" onclick="document.getElementById('image').click()">Select Image</button>
                                            </div>
                                            <div class="card-body d-flex flex-wrap justify-content-start" id="image-container">
                                                   <img class="banner-image" src="{{asset( 'assets/img/uploads/actions/thumbnail/' . $callToAction->image );}}" id="thumbnil"> 	  
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
<script type="text/javascript">
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
</script>

@endpush

@extends('backend.layouts.app')
@section('title', 'About Image slider')

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
                <form action="{{ route('admin.about.slider.update') }}" method="POST"
                {{-- <form id="myForm" method="POST" --}}
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Slider Image</label><br>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile02" required="" >
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        <input id="myid" name="id" class="form-control" hidden>
                                    </div>
                                </div>

                                {{-- <button type="button" class="file-upload-btn btn btn-secondary rounded-pill" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-cloud-upload-alt"></i> upload</button>
                                <div class="image-upload-wrap" style="display: none;">
                                    <input class="file-upload-input " type='file' onchange="readURL(this);" accept="image/*" name="main_section_image" id="main_section_image" />
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div> --}}
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


    // function getUrl()
    // {
    //     document.getElementById("myForm").action = "";
    // }
</script>
@endpush

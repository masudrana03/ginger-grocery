@extends('backend.layouts.app')
@section('title', 'Edit product')

@push('styles')
    <style>
        .note-insert {
            display: none !important;
        }

        .note-editable {
            height: 250px !important;
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
                                    <h3 class="m-0">Edit Product</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" aria-describedby="emailHelp" placeholder="Name"
                                        value="{{ old('name') ?? $product->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea type="text" name="excerpt"
                                        class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                                        aria-describedby="emailHelp"
                                        placeholder="Excerpt">{{ old('excerpt') ?? $product->excerpt }}</textarea>
                                    @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="5" name="description"
                                        class="form-control @error('description') is-invalid @enderror" id="summernote"
                                        aria-describedby="emailHelp"
                                        placeholder="Description">{{ old('description') ?? $product->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="attributes">Attributes</label>
                                    <textarea rows="3" name="attributes"
                                        class="form-control @error('attributes') is-invalid @enderror" id="attributes"
                                        aria-describedby="emailHelp"
                                        placeholder="Attributes">{{ old('attributes') ?? $product->attributes }}</textarea>
                                    @error('attributes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price"
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        aria-describedby="emailHelp" placeholder="price"
                                        value="{{ old('price') ?? $product->price }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="calories_per_serving">Calories Per Serving</label>
                                    <input type="number" name="calories_per_serving"
                                        class="form-control @error('calories_per_serving') is-invalid @enderror"
                                        id="calories_per_serving" aria-describedby="emailHelp"
                                        placeholder="Calories Per Serving"
                                        value="{{ old('calories_per_serving') ?? $product->calories_per_serving }}">
                                    @error('calories_per_serving')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fat_calories_per_serving">Fat Calories Per Serving</label>
                                    <input type="number" name="fat_calories_per_serving"
                                        class="form-control @error('fat_calories_per_serving') is-invalid @enderror"
                                        id="fat_calories_per_serving" aria-describedby="emailHelp"
                                        placeholder="Fat Calories Per Serving"
                                        value="{{ old('fat_calories_per_serving') ?? $product->fat_calories_per_serving }}">
                                    @error('fat_calories_per_serving')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand_id"
                                        class="single2 form-control @error('brand_id') is-invalid @enderror">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id"
                                        class="single2 form-control @error('category_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="types[]" class="single2 form-control @error('types') is-invalid @enderror"
                                        multiple="multiple">
                                        @foreach ($types as $type)
                                            <option
                                                @foreach ($product->types as $productType) {{ $productType->id == $type->id ? 'selected' : '' }} @endforeach
                                                value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('types')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select name="unit_id"
                                        class="single2 form-control @error('unit_id') is-invalid @enderror">
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                {{ $unit->id == $product->unit_id ? 'selected' : '' }}>
                                                {{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nutrition</label>
                                    <select name="nutritions[]"
                                        class="single2 form-control @error('nutritions') is-invalid @enderror"
                                        multiple="multiple">
                                        @foreach ($nutritions as $nutrition)
                                            <option
                                                @foreach ($product->nutritions as $productNutrition) {{ $productNutrition->id == $nutrition->id ? 'selected' : '' }} @endforeach
                                                value="{{ $nutrition->id }}">{{ $nutrition->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nutritions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Store</label>
                                    <select name="store_id"
                                        class="single2 form-control @error('store_id') is-invalid @enderror">
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}"
                                                {{ $store->id == $product->store_id ? 'selected' : '' }}>
                                                {{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label>Product Image</label>
                                <div id="inputFormRow">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="card shadow-sm w-100">
                                                <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Product Images</h4>
                                                    <input type="file"  id="image" name="files[]"  multiple
                                                        class="d-none " onchange="image_select()">
                                                    <button class="btn btn-sm btn-primary ml-4" type="button"
                                                        onclick="document.getElementById('image').click()">Select
                                                        Images</button>

                                                    {{-- <input type="file" name="images[]" id="images"
                                                        placeholder="Choose images" multiple> --}}
                                                </div>
                                                <div class="card-body d-flex flex-wrap justify-content-start images-preview-div"
                                                    id="container">

                                                    @foreach ($product->images as $productImg)
                                                    <div class="image_container d-flex justify-content-center position-relative">
                                                        <img src="{{ asset('assets/img/uploads/products/' .$productImg->image) }}" alt="Image">
                                                        
                                                        <span class="position-absolute" onclick="delete_image(this)">&times;</span>
                                                    </div>
                                                    @endforeach
                                                    <!-- Image will be show here-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="action-button-row" style="display: none;">
        <div class="form-group row">
            <div class="col-sm-3">
                <input type="file" name="image[]">
            </div>
            <div class="col-sm-2">
                <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #884FFB"
                    class="fas fa-plus-circle addRow"></i>
                <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #884FFB"
                    class="fas fa-minus-circle removeRow"></i>
                     <input type="file"  id="image" name="image[]" multiple="" style="display:none">

            </div>
        </div>
    </div> --}}
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

      
        var images = [];

        function image_select() {
            var image = document.getElementById('image').files;
            for (i = 0; i < image.length; i++) {
                if (check_duplicate(image[i].name)) {
                    images.push({
                        "name": image[i].name,
                        "url": URL.createObjectURL(image[i]),
                        "file": image[i],
                    })
                  //setValueToImageNameAttr(image[i].name);
                } else {
                    alert(image[i].name + " is already added to the list");
                }
            }

            //document.getElementById('form').reset();
            document.getElementById('container').innerHTML = image_show();
        }


        function image_show() {
            var image = "";
            images.forEach((i) => {
                image += `<div class="image_container d-flex justify-content-center position-relative">
      	  	  <img  src="` + i.url + `" alt="Image">

      	  	  <span class="position-absolute" onclick="delete_image(` + images.indexOf(i) + `)">&times;</span>
      	    </div>`;

            })
            return image;
        }

       

        function delete_image(e) {
            images.splice(e, 1);
            document.getElementById('container').innerHTML = image_show();
        }

        function check_duplicate(name) {
            var image = true;
            if (images.length > 0) {
                for (e = 0; e < images.length; e++) {
                    if (images[e].name == name) {
                        image = false;
                        break;
                    }
                }
            }
            return image;
        }
    </script>
@endpush

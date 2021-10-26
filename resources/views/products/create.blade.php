@extends('layouts.app')
@section('title', 'Create New Brand')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Create New Product</h3>
                                    <p>{{ session('errors') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="excerpt">Excerpt</label>
                                    <input type="text" name="excerpt"
                                        class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                                        aria-describedby="emailHelp" placeholder="Excerpt" value="{{ old('excerpt') }}">
                                    @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="5" name="description"
                                        class="form-control @error('description') is-invalid @enderror" id="description"
                                        aria-describedby="emailHelp" placeholder="Description"
                                        value="{{ old('description') }}"></textarea>
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
                                        aria-describedby="emailHelp" placeholder="Attributes"
                                        value="{{ old('attributes') }}"></textarea>
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
                                        aria-describedby="emailHelp" placeholder="price" value="{{ old('price') }}">
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
                                        placeholder="Calories Per Serving" value="{{ old('calories_per_serving') }}">
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
                                        value="{{ old('fat_calories_per_serving') }}">
                                    @error('fat_calories_per_serving')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand_id" class="single2 form-control @error('brand_id') is-invalid @enderror">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label >Category</label>
                                    <select name="category_id" class="single2 form-control @error('category_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select name="unit_id" class="single2 form-control @error('unit_id') is-invalid @enderror">
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Store</label>
                                    <select name="store_id" class="single2 form-control @error('store_id') is-invalid @enderror">
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('store_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select name="currency_id" class="single2 form-control @error('currency_id') is-invalid @enderror">
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('currency_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label>Product Image</label>
                                <div id="inputFormRow">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input type="file" name="image[]"
                                                class="@error('image') is-invalid @enderror">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #884FFB"
                                                class="fas fa-plus-circle addRow"></i>
                                            <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #884FFB"
                                                class="fas fa-minus-circle removeRow"></i>
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

    <div id="action-button-row" style="display: none;">
        <div class="form-group row">
            <div class="col-sm-3">
                <input type="file" name="image[]">
            </div>
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

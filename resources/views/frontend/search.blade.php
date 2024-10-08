@extends('frontend.layouts.app')
@section('title', $query .' | ')

@section('content')

    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">{{ $query }}</h1>
                        <div class="breadcrumb">
                            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> {{ $query }}
                        </div>
                    </div>
                    <div class="col-xl-9 text-end d-none d-xl-block">
                        {{-- <ul class="tags-list">
                        <li class="hover-up">
                            <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                        </li>
                        <li class="hover-up active">
                            <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                        </li>
                        <li class="hover-up">
                            <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Artichoke</a>
                        </li>
                        <li class="hover-up">
                            <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Celery</a>
                        </li>
                        <li class="hover-up mr-0">
                            <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Spinach</a>
                        </li>
                    </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ $products->count() }}</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @forelse ($products as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="#">
                                            <img class="default-img"
                                                src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image) }}"
                                                alt="" />
                                            <img class="hover-img"
                                                src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image) }}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="#"><i
                                                class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" data-id="{{ $product->id }}"
                                            class="action-btn compare-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                        {{-- <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a
                                            href="{{ route('categories', $product->category->slug) }}">{{ $product->category->name }}</a>
                                    </div>
                                    <h2><a href="{{ route('products', $product->id) }}">{{ $product->name }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a
                                                href="#">{{ $product->store->name }}</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span
                                                class="">{{ settings('currency') }}{{ $product->discount_price }}
                                            </span>
                                            @if ($product->discountable)
                                                <span
                                                    class="old-price">{{ settings('currency') }}{{ $product->price }}</span>
                                            @endif
                                        </div>
                                        <div class="add-cart">
                                            <input type="hidden" id="product-id" name="product_id"
                                                value="{{ $product->id }}">
                                            <a class="add" id="cart-btn" href="#" style=""><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            <small class="product-id"
                                                style="display: none;">{{ $product->id }}</small>
                                            <input style="display: none;" name="product_id" value="{{ $product->id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <!--end product card-->
                </div>
                <!--product grid-->
                {{-- <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div> --}}
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".compare-btn").click(function(event) {
                event.preventDefault();
                var id = $(this).attr("data-id");
                var url = "{!! route('compareProduct', ':id') !!}";
                url = url.replace(':id', id);
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        $('#compareProductOld').empty();
                        $('#compareProductNew').html(result);
                        //tata.success('Success!', 'Product added to compare list.');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".compare-btn-delete").click(function(event) {
                event.preventDefault();

                var id = $(this).attr("data-id");
                var url = "{!! route('removeCompareProduct', ':id') !!}";
                url = url.replace(':id', id);
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        $('#compareProductOld').empty();
                        $('#compareProductNew').html(result);
                        //tata.success('Success!', 'Product removed from compare list.');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                $.ajax({
                    method: 'GET',
                    url: "{!! route('removeCompareProduct2') !!}",
                    success: function(result) {
                        console.log(result);
                        $('#compareProductsOld').empty();
                        $('#compareProductsNew').html(result);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });
        });
    </script>
@endpush

@extends('frontend.layouts.app')
@section('title', $category->name)

@section('content')

    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-5">
                        <h1 class="mb-15">{{ $category->name }}</h1>
                        <div class="breadcrumb">
                            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> {{ $category->name }}
                        </div>
                    </div>
                    <div class="col-xl-7 text-end d-none d-xl-block">
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
                        <p>We found <strong class="text-brand">{{ $category->products()->count() }}</strong> items for
                            you!</p>
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
                                <ul class="sorting">
                                    <li><a class="sortById"
                                            href="{{ url('/categories?numeric_sort=2', [$category->slug]) }}">50</a>
                                    </li>
                                    <li><a class="sortById"
                                            href="{{ url('/categories?numeric_sort=3', [$category->slug]) }}">100</a>
                                    </li>
                                    <li><a class="sortById"
                                            href="{{ url('/categories?numeric_sort=5', [$category->slug]) }}">150</a>
                                    </li>
                                    <li><a class="sortById"
                                            href="{{ url('/categories?numeric_sort=7', [$category->slug]) }}">200</a>
                                    </li>
                                    <li><a class="sortById"
                                            href="{{ url('/categories?numeric_sort=all', [$category->slug]) }}">All</a>
                                    </li>


                                    {{-- <li><a class="{{ request()->get('numeric_sort') == '50' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=50',[$store->slug]) }}">50</a></li>
                            <li><a class="{{ request()->get('numeric_sort') == '100' ? 'active' : '' }}" href="{{ url('/vendor-details?numeric_sort=100',[$store->slug]) }}">100</a></li>
                            <li><a class="{{ request()->get('numeric_sort') == '150' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=150',[$store->slug]) }}">150</a></li>
                            <li><a class="{{ request()->get('numeric_sort') == '200' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=200',[$store->slug]) }}">200</a></li>
                            <li><a class="{{ request()->get('numeric_sort') == 'all' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=all',[$store->slug]) }}">All</a></li> --}}
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
                                <ul class="sorting">
                                    {{-- <li><a class="{{ request()->get('sort') == 'featured' ? 'active' : '' }}" href="{{ url('/vendor-details?sort=featured',[$store->id]) }}">Featured</a></li> --}}
                                    <li><a class="sortById"
                                            href="{{ url('/categories?sort=low_to_high', [$category->slug]) }}"
                                            data="low_to_high">Price:
                                            Low to High</a></li>
                                    <li><a class="sortById"
                                            href="{{ url('/categories?sort=high_to_low', [$category->slug]) }}"
                                            data="high_to_low">Price:
                                            High to Low</a></li>
                                    <li><a class="sortById"
                                            href="{{ url('/categories?sort=release', [$category->slug]) }}"
                                            data="release">Release
                                            Date</a></li>


                                    {{-- <li><a class="{{ request()->get('sort') == 'low_to_high' ? 'active' : '' }}"
                                        href="{{ url('/vendor-details?sort=low_to_high', [$store->slug]) }}">Price:
                                        Lowto High</a></li>
                                <li><a class="{{ request()->get('sort') == 'high_to_low' ? 'active' : '' }}"
                                        href="{{ url('/vendor-details?sort=high_to_low', [$store->slug]) }}">Price:
                                        High to Low</a></li>
                                <li><a class="{{ request()->get('sort') == 'release' ? 'active' : '' }}"
                                        href="{{ url('/vendor-details?sort=release', [$store->slug]) }}">Release
                                        Date</a></li> --}}
                                    {{-- <li><a href="#">Avg. Rating</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="oldSortDiv">

                    <div class="row product-grid">
                        @forelse ($categoryWise as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('products', $product->id) }}">
                                                @if (count($product->images) > 0)
                                                    <img class="default-img"
                                                        src="{{ asset('assets/img/uploads/products/' . $product->images()->first()->image) }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('assets/img/uploads/products/' . $product->images()->first()->image) }}"
                                                        alt="" />
                                                @else
                                                    <img class="default-img"
                                                        src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                                        alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn"
                                                href="{{ route('wishlist', $product->id) }}"><i
                                                    class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn"
                                                href="{{ route('compareProduct', $product->id) }}"><i
                                                    class="fi-rs-shuffle"></i></a>
                                            {{-- <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            {{-- <span class="hot">Hot</span> --}}
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a
                                                href="{{ route('categories', $category->slug) }}">{{ $category->name }}</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('products', $product->id) }}">{{ ucwords(strtolower(Str::limit($product->name, 25))) }}</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ $product->rating * 20 }}%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted">
                                                ({{ round($product->rating, 1) }})
                                            </span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="{{ route('vendor.details', $product->store->id) }}">{{ $product->store->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{ settings('currency') }}{{ $product->price }}</span>
                                                {{-- <span class="old-price">$32.8</span> --}}
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ route('cartById', $product->id) }}"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                {{-- <div class="add-cart">
                                    <a class="add" href="{{route('cartById', $product->id)}}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>

                                </div> --}}
                            </div>
                        @empty
                        @endforelse
                        <!--end product card-->
                    </div>

                    <!--product grid-->
                    <div id="pagination" class="pagination-area mt-20 mb-20">

                        {{ $categoryWise->links() }}
                    </div>

                </div>

                <div id="newSortDiv"> </div>

            </div>
        </div>
    </div>

@endsection


@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sortById').each(function() {
                var $this = $(this);
                $this.on('click', function() {
                    event.preventDefault();

                    var slug = "{{ $category->slug }}";
                    var url = $this.attr('href');
                    $('.sortById').removeClass('active');
                    $this.addClass('active');

                    fireAjax(url, slug);
                });

            });

            function fireAjax(url, slug) {
                $.ajax({
                    method: 'GET',
                    url: url,
                    type: 'get',
                    success: function(response) {
                        console.log(response);
                        $('#oldSortDiv').empty();
                        $('#newSortDiv').html(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // alert('hello Masud');

            $(document).on('click', '.page-item a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var url = "{{ url('/categories?page=', [$category->slug]) }}" + page;

                $.ajax({
                    url: url,
                    success: function(response) {
                        $('#oldSortDiv').empty();
                        $('#newSortDiv').html(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }

                });
            });

        });
    </script>
@endpush

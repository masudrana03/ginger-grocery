@extends('frontend.layouts.app')
@section('title', 'Vendor Details')

@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> {{ $store->name }}
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="archive-header-2 text-center pt-80 pb-50">
        <h1 class="display-2 mb-50">{{ $store->name }}</h1>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="sidebar-widget-2 widget_search mb-50">
                    <div class="search-form">
                        <form action="{{ route('vendor.details', $store->id) }}" method="get">
                            <input type="text" name="search" placeholder="Search in this store..." />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>We found <strong class="text-brand">{{ $store->products->count() }}</strong> items for you!</p>
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
                                <li><a class="{{ request()->get('numeric_sort') == '50' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=50',[$store->id]) }}">50</a></li>
                                <li><a class="{{ request()->get('numeric_sort') == '100' ? 'active' : '' }}" href="{{ url('/vendor-details?numeric_sort=100',[$store->id]) }}">100</a></li>
                                <li><a class="{{ request()->get('numeric_sort') == '150' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=150',[$store->id]) }}">150</a></li>
                                <li><a class="{{ request()->get('numeric_sort') == '200' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=200',[$store->id]) }}">200</a></li>
                                <li><a class="{{ request()->get('numeric_sort') == 'all' ? 'active' : '' }}"  href="{{ url('/vendor-details?numeric_sort=all',[$store->id]) }}">All</a></li>
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
                                {{-- <li><a class="{{ request()->get('sort') == 'featured' ? 'active' : '' }}" href="{{ url('/vendor-details?sort=featured',[$store->id]) }}">Featured</a></li> --}}
                                <li><a class="{{ request()->get('sort') == 'low_to_high' ? 'active' : '' }}" href="{{ url('/vendor-details?sort=low_to_high',[$store->id]) }}">Price: Low to High</a></li>
                                <li><a class="{{ request()->get('sort') == 'high_to_low' ? 'active' : '' }}" href="{{ url('/vendor-details?sort=high_to_low',[$store->id]) }}">Price: High to Low</a></li>
                                <li><a class="{{ request()->get('sort') == 'release' ? 'active' : '' }}" href="{{ url('/vendor-details?sort=release',[$store->id]) }}">Release Date</a></li>
                                {{-- <li><a href="#">Avg. Rating</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-grid">
                @forelse ( $vendorWise as $product )
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
                                <a aria-label="Add To Wishlist" class="action-btn" href="{{route('wishlist', $product->id)}}"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="{{route('compareProduct', $product->id)}}"><i class="fi-rs-shuffle"></i></a>
                                <!--<a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> -->
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                {{-- <span class="hot">Hot</span> --}}
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="{{ route('categories', $product->category->id )}}">{{ $product->category->name }}</a>
                            </div>
                            <h2><a href="{{route('products', $product->id)}}">{{ ucwords(strtolower(Str::limit($product->name, 20 ))) }}</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: {{ ($product->rating)*20 }}%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> ({{ round($product->rating , 1) }})</span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="{{route('shop.product', $product->id)}}">{{ $product->store->name }}</a></span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>{{ settings('currency') }}{{ $product->price }}</span>
                                    <span class="old-price">$32.8</span>
                                </div>
                                <div class="add-cart">
                                    <a class="add" href="{{route('cartById', $product->id)}}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!--end product card-->
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="#">
                                    <img class="default-img" src="{{ asset('assets/frontend/imgs/shop/product-3-1.jpg') }}" alt="" />
                                    <img class="hover-img" src="{{ asset('assets/frontend/imgs/shop/product-3-2.jpg') }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                {{-- <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="#">Snack</a>
                            </div>
                            <h2><a href="#">Angie’s Boomchickapop Sweet & Salty</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 85%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="#">StarKist</a></span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>$48.85</span>
                                    <span class="old-price">$52.8</span>
                                </div>
                                <div class="add-cart">
                                    <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
                {{-- <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="#">
                                    <img class="default-img" src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="" />
                                    <img class="hover-img" src="{{ asset('assets/frontend/imgs/shop/product-1-2.jpg') }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="#">Snack</a>
                            </div>
                            <h2><a href="#">Seeds of Change Organic Quinoe</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="#">NestFood</a></span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>$28.85</span>
                                    <span class="old-price">$32.8</span>
                                </div>
                                <div class="add-cart">
                                    <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end product card-->
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="#">
                                    <img class="default-img" src="{{ asset('assets/frontend/imgs/shop/product-10-1.jpg') }}" alt="" />
                                    <img class="hover-img" src="{{ asset('assets/frontend/imgs/shop/product-10-2.jpg') }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="#">Cream</a>
                            </div>
                            <h2><a href="#">Haagen-Dazs Caramel Cone Ice Cream</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 50%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (2.0)</span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="#">Tyson</a></span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>$22.85</span>
                                    <span class="old-price">$24.8</span>
                                </div>
                                <div class="add-cart">
                                    <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--end product card-->
            </div>
            <!--product grid-->
            <div class="pagination-area mt-20 mb-20">
                {{-- <nav aria-label="Page navigation example">
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
                </nav> --}}
                {{ $vendorWise->links() }}
            </div>
            {{-- <section class="section-padding pb-5">
                <div class="section-title">
                    <h3 class="">Deals Of The Day</h3>
                    <a class="show-all" href="#">
                        All Deals
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-cart-wrap style-2">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{ asset('assets/frontend/imgs/banner/banner-5.png') }}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="#">Seeds of Change Organic Quinoa, Brown</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="#">NestFood</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$32.85</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-cart-wrap style-2">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{ asset('assets/frontend/imgs/banner/banner-6.png') }}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="#">Perdue Simply Smart Organics Gluten</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="#">Old El Paso</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$24.85</span>
                                            <span class="old-price">$26.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                        <div class="product-cart-wrap style-2">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{ asset('assets/frontend/imgs/banner/banner-7.png') }}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="#">Signature Wood-Fired Mushroom</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (3.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="#">Progresso</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$12.85</span>
                                            <span class="old-price">$13.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                        <div class="product-cart-wrap style-2">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="{{ asset('assets/frontend/imgs/banner/banner-8.png') }}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="#">Simply Lemonade with Raspberry Juice</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (3.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="#">Yoplait</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>$15.85</span>
                                            <span class="old-price">$16.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!--End Deals-->
        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-store-info mb-30 bg-3 border-0">
                <div class="vendor-logo mb-30">
                    <img src="{{ asset('assets/img/uploads/stores/'.$store ->image) }}" alt="" />
                </div>
                <div class="vendor-info">
                    <div class="product-category">
                        <span class="text-muted">Since {{ $store->established_at }}</span>
                    </div>
                    <h4 class="mb-5"><a href="#" class="text-heading">{{ $store->name }}</a></h4>

                    <div class="product-rate-cover mb-15">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: {{ ($store->rating)*20 }}%"></div>
                        </div>
                        <span class="font-small ml-5 text-muted"> ({{ round($store->rating , 1) }})</span>
                    </div>

                    <div class="vendor-des mb-30">
                        <p class="font-sm text-heading">{{ $store->description }}</p>
                    </div>
                    <div class="follow-social mb-20">
                        <h6 class="mb-15">Follow Us</h6>
                        <ul class="social-network">
                            <li class="hover-up">
                                <a href="{{ $store->twitter_link }}">
                                    <img src="{{ asset('assets/frontend/imgs/theme/icons/social-tw.svg') }}" alt="" />
                                </a>
                            </li>
                            <li class="hover-up">
                                <a href="{{ $store->facebook_link }}">
                                    <img src="{{ asset('assets/frontend/imgs/theme/icons/social-fb.svg') }}" alt="" />
                                </a>
                            </li>
                            <li class="hover-up">
                                <a href="{{ $store->instagram_link }}">
                                    <img src="{{ asset('assets/frontend/imgs/theme/icons/social-insta.svg') }}" alt="" />
                                </a>
                            </li>
                            <li class="hover-up">
                                <a href="{{ $store->pinterest_link }}">
                                    <img src="{{ asset('assets/frontend/imgs/theme/icons/social-pin.svg') }}" alt="" />
                                </a>
                            </li>
                            <li class="hover-up">
                                <a href="{{ $store->youtube_link }}">
                                    <img src="{{ asset('assets/frontend/imgs/theme/icons/youtube-icon.png') }}" width="32" height="33" alt="" />
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="vendor-info">
                        <ul class="font-sm mb-20">
                            <li><img class="mr-5" src="{{ asset('assets/frontend/imgs/theme/icons/icon-location.svg') }}" alt="" /><strong>Address: <strong>Address: </strong> <span>{{ $store->address }}, {{ $store->city }} {{ $store->zip }}, {{ $store->country->name }}</span></li>
                            <li><img class="mr-5" src="{{ asset('assets/frontend/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Call Us:</strong><span> {{ $store->phone }}</span></li>
                        </ul>
                        <a href="tel:{{ $store->phone }}" class="btn btn-xs">Contact Seller <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Category</h5>
                <ul>
                    @php
                        $categoryIds = $store->products()->pluck('category_id')->unique();
                        // $categories = \App\Models\Category::find($categoryIds);
                        $categories = $categories->whereIn('id', $categoryIds);
                    @endphp
                    @forelse ( $categories as $category )
                        <li>
                            <a href="{{ route('categories', $category->id) }}">
                                {{-- <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}" alt="" /> --}}
                                @if ( $category->image )
                                        <a href="{{ route('categories', $category->id) }}">
                                            <img src="{{ asset( 'assets/img/uploads/categories/' . $category->image ) }}" alt="" />
                                        </a>
                                @else
                                        <a href="{{ route('categories', $category->id) }}">
                                            <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}" alt="" />
                                        </a>

                                @endif
                                {{ $category->name }}
                            </a>
                            <span class="count">{{ count($category->products) }}</span>
                        </li>
                    @empty
                        <li>
                            <a href="#">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}" alt="" />Clothing</a>
                                <span class="count">35</span>
                        </li>
                    @endforelse



                    {{-- <li>
                        <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}" alt="" />Clothing</a><span class="count">35</span>
                    </li>
                    <li>
                        <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-3.svg') }}" alt="" />Pet Foods </a><span class="count">42</span>
                    </li>
                    <li>
                        <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-4.svg') }}" alt="" />Baking material</a><span class="count">68</span>
                    </li>
                    <li>
                        <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-5.svg') }}" alt="" />Fresh Fruit</a><span class="count">87</span>
                    </li> --}}



                </ul>
            </div>
            <!-- Fillter By Price -->
            <div class="sidebar-widget price_range range mb-30">
                <h5 class="section-title style-1 mb-30">Fill by price</h5>
                <form action="{{ route('vendor.details',[$store->id]) }}" method="get" class="form-horizontal">
                    @csrf
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input"><span>Range:</span>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            <label class="fw-900">Nutrition</label>
                            <div class="custome-checkbox">

                                {{-- {{  $store->products->nutritions }} --}}
                                @foreach ( $nutritions  as $nutrition )

                                    <input class="form-check-input" type="checkbox" name="nutrition" id="exampleCheckbox1" value="{{ $nutrition->id }}" />
                                    <label class="form-check-label" for="exampleCheckbox1"><span>{{ $nutrition->name }} ( {{ count( $nutrition->products ) }} )</span></label>
                                    <br />

                                @endforeach
                                {{-- <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                                <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                                <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label> --}}
                            </div>
                            <label class="fw-900 mt-15">Brand</label>
                            <div class="custome-checkbox">
                                @foreach ( $brands as $brand )
                                    <input class="form-check-input" type="checkbox" name="brand" id="exampleCheckbox11" value="{{ $brand->id }}" />
                                    <label class="form-check-label" for="exampleCheckbox11"><span>{{ $brand->name }} ( {{ count( $brand->products ) }} )</span></label>
                                    <br />

                                @endforeach
                                {{-- <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label> --}}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</button>
                </form>
            </div>

            {{-- <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                <img src="{{ asset('assets/frontend/imgs/banner/banner-11.png') }}" alt="" />
                <div class="banner-text">
                    <span>Oganic</span>
                    <h4>
                        Save 17% <br />
                        on <span class="text-brand">Oganic</span><br />
                        Juice
                    </h4>
                </div>
            </div> --}}
        </div>
    </div>
</div>

@endsection

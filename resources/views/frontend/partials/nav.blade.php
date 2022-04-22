<style>
    .header-style-1.header-style-5 .main-menu>nav>ul>li>a,
    .cart-dropdown-wrap ul li .shopping-cart-delete a,
    .cart-dropdown-wrap ul li .shopping-cart-title h4 a,
    .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-button a,
    .product-cart-wrap .product-card-bottom .add-cart .add {
        text-decoration: none;
    }

    ul.lineup {
        /* width: 220px !important; */
        margin-right: 2px !important;
    }

    li.linelist {
        width: 244px !important;
        max-height: 100%;
    }

    li.linelist2 {
        width: 172px !important;
        max-height: 100%;
    }

    .profile-img {
        height: 40px;
        border-radius: 50%;

    }

    /* .header-action-2 .header-action-icon-2>a img {
        width: 100%;
        max-width: 40px !important;
    } */

    .header-action-2 .header-action-icon-2 .user-name {


        line-height: .5;
        display: inline-block;
        position: relative;
        margin-left: 0px !important;
    }


    /* span.lable {
        margin-top: 10px !important;
    } */

    .user-name {
        margin-top: 10px !important;
        font-size: 16px !important;
    }

</style>

<!-- Modal -->
{{-- <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="deal" style="background-image: url('assets/imgs/banner/popup-1.png')">
                        <div class="deal-top">
                            <h6 class="mb-10 text-brand-2">Deal of the Day</h6>
                        </div>
                        <div class="deal-content detail-info">
                            <h4 class="product-title"><a href="#" class="text-heading">Organic fruit for your family's health</a></h4>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="deal-bottom">
                            <p class="mb-20">Hurry Up! Offer End In:</p>
                            <div class="deals-countdown pl-5" data-countdown="2025/03/25 00:00:00">
                                <span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span>
                            </div>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 rates)</span>
                                </div>
                            </div>
                            <a href="#" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-2.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-1.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-3.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-4.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-5.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-6.jpg') }}"
                                        alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-7.jpg') }}"
                                        alt="product image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-4.jpg') }}"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-5.jpg') }}"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-6.jpg') }}"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-7.jpg') }}"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-8.jpg') }}"
                                        alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-9.jpg') }}"
                                        alt="product image" /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="#" class="text-heading">Seeds of Change Organic
                                    Quinoa, Brown</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i
                                            class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">GroceFusion</span>
                                    </li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header-area header-style-1 header-style-5 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="{{ route('about') }}">About Us</a></li>

                            @if (auth()->user())
                                <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                <li><a href="{{ route('user.orders') }}">My Orders</a></li>
                            @else
                                <li><a href="{{ route('login') }}">My Account</a></li>
                                <li><a href="{{ route('login') }}">Wishlist</a></li>
                                <li><a href="{{ route('login') }}">My Orders</a></li>
                            @endif
                            {{-- <li><a href="#">My Account</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">My Orders</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>{{ settings('news_flash_one') }}</li>
                                <li>{{ settings('news_flash_two') }}</li>
                                <li>{{ settings('news_flash_three') }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Need help? Call Us: <strong class="text-brand">
                                    {{ settings('hot_number') }}</strong></li>
                            {{-- <li>
                                    {{-- <a class="language-dropdown-active" href="#">English </a> --}}

                            {{-- <a class="language-dropdown-active" href="#">English <i
                                            class="fi-rs-angle-small-down"></i></a> --}}
                            {{-- <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/flag-fr.png') }}"
                                                    alt="" />Français</a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/flag-dt.png') }}"
                                                    alt="" />Deutsch</a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/flag-ru.png') }}"
                                                    alt="" />Pусский</a>
                                        </li>
                                    </ul> --}}
                            {{-- </li> --}}
                            {{-- <li>
                                    <a class="language-dropdown-active" href="#">USD <i
                                            class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/flag-fr.png') }}"
                                                    alt="" />INR</a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/flag-dt.png') }}"
                                                    alt="" />MBP</a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/imgs/theme/flag-ru.png') }}"
                                                    alt="" />EU</a>
                                        </li>
                                    </ul>
                                </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ url('/') }}"><img
                            src="{{ asset('assets/img/uploads/settings/logo/' . settings('logo')) }}"
                            alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form method="GET" action="#">
                            <select class="select-active" name="category_id">
                                <option>All Categories</option>
                                @forelse ($loadCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option> )
                                @empty
                                @endforelse
                            </select>
                            <input name="search" id="search-input" type="text" placeholder="Search for items..." />
                        </form>
                    </div>
                    <style>
                        .select2-selection__rendered {
                            padding-left: 0px !important;
                        }
                    </style>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#" id="zoneForm" method="get">
                                    <select name="zone_id" class="select-active zone-id">
                                        <option>Your Location</option>

                                        @foreach ($loadZones as $zone)
                                            <option class="zoneId" value="{{ $zone->id }}">
                                                {{ $zone->name }}
                                            </option>
                                        @endforeach

                                        {{-- <option> {{$zones->name}}</option> --}}

                                    </select>
                                </form>
                            </div>

                            @php
                                $productIds = cache('compareProducts');
                                $compareProduct = App\Models\Product::find($productIds) ?? [];
                            @endphp

                            <div class="header-action-icon-2" id="compareProductOld">
                                <a href="#">
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-compare.svg') }}" />
                                    <span class="pro-count blue">{{ count($compareProduct) }}</span>
                                </a>
                                <a href="{{ route('compare') }}"><span class="lable">Compare</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @forelse($compareProduct as $product)
                                            <li>
                                                <div class="shopping-cart-img">

                                                    @if ($product->featured_image)
                                                        <img src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image) }}"
                                                            alt="" />
                                                    @else
                                                        <img alt="Nest"
                                                            src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" />
                                                    @endif

                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a
                                                            href="{{ route('products', $product->slug) }}">{{ ucwords(strtolower(Str::limit($product->name, 18))) }}</a>
                                                    </h4>
                                                    <h4>{{ settings('currency') }}{{ $product->price }}
                                                    </h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a class="compare-btn-delete" href="#"
                                                        data-id="{{ $product->id }}"><i
                                                            class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        @empty
                                            <li>

                                                <div class="shopping-cart-title">
                                                    <h4>No Items</h4>
                                                </div>

                                            </li>
                                        @endforelse
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('compare') }}" class="outline">View
                                                Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="compareProductNew">

                            </div>
                            <div id="wishlistProductOld">

                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart.svg') }}" />
                                        <span
                                            class="pro-count blue">{{ auth()->user() && auth()->user()->savedProducts
                                                ? auth()->user()->savedProducts->count()
                                                : 0 }}</span>
                                    </a>
                                    <a href="{{ route('wishlist.index') }}"><span
                                            class="lable">Wishlist</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @forelse(auth()->user()->savedProducts ?? [] as $wishlistProduct)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="{{ route('products', $wishlistProduct->id) }}">
                                                            @if ($wishlistProduct->featured_image)
                                                                <img src="{{ asset('assets/img/uploads/products/featured/' . $wishlistProduct->featured_image) }}"
                                                                    alt="" />
                                                            @else
                                                                <img alt="Nest"
                                                                    src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" />
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a
                                                                href="{{ route('products', $wishlistProduct->slug) }}">{{ ucwords(strtolower(Str::limit($wishlistProduct->name, 18))) }}</a>
                                                        </h4>
                                                        <h4>{{ settings('currency') }}
                                                            {{ $wishlistProduct->price }}
                                                        </h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a class="wishlist-btn-delete" href="#"
                                                            data-id="{{ $wishlistProduct->id }}"><i
                                                                class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                            @empty
                                                <li>

                                                    <div class="shopping-cart-title">
                                                        <h4>No Items</h4>
                                                    </div>

                                                </li>
                                            @endforelse
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('wishlist.index') }}" class="outline">View
                                                    Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="wishlistProductNew">

                            </div>

                            {{-- <div class="header-action-icon-2" >
                                <a class="mini-cart-icon" href="#">
                                    <img alt="Nest"
                                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span id="cart-count"
                                        class="pro-count blue">{{ auth()->user() && auth()->user()->cart? auth()->user()->cart->products()->count(): 0 }}</span>
                                </a>
                                <a href="#"><span class="lable">Cart</span></a>

                            </div> --}}

                            <div id="new-cart">

                            </div>
                            @if (auth()->user())
                                @auth
                                    <div class="header-action-icon-2">
                                        <a href="{{ route('user.dashboard') }}">
                                            {{-- <img alt="Nest"
                                                src="{{ asset('assets/frontend/imgs/theme/icons/icon-user.svg') }}" /> --}}
                                            @if (auth()->user()->image)
                                                <img src="{{ asset('assets/img/uploads/users/' . auth()->user()->image) }}"
                                                    alt="" height="30" width="60"  style="border-radius: 50%"/>
                                            @else
                                                <img src="{{ asset('assets/frontend/imgs/avatar/avatar1.jpg') }}"
                                                    alt="Metrocery" />
                                            @endif
                                        </a>
                                        <a href="{{ route('user.dashboard') }}"><span
                                                class="lable user-name ">&nbsp;{{ auth()->user()->name }}</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('user.dashboard') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>My Account</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.track.orders') }}"><i
                                                            class="fi fi-rs-location-alt mr-10"></i>Track Order</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.orders') }}"><i
                                                            class="fi fi-rs-label mr-10"></i>My Orders</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('wishlist.index') }}"><i
                                                            class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();"><i
                                                            class="fi fi-rs-sign-out mr-10"></i>{{ __('Logout') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endauth
                            @else
                                <div class="header-action-icon-2">
                                    <a href="{{ route('login') }}">
                                        <img class="svgInject rounded-circle" alt="Account"
                                            src="{{ asset('assets/frontend/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="{{ route('login') }}"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="{{ route('login') }}"><i
                                                        class="fi fi-rs-user mr-10"></i>Login</a></li>
                                            <li><a href="{{ route('register') }}"><i
                                                        class="fi fi-rs-user-add mr-10"></i>Register</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ url('/') }}"><img
                            src="{{ asset('assets/img/uploads/settings/logo/' . settings('logo')) }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap  d-none d-lg-block" style=" ">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All
                            Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>

                        {{-- Working on this --}}

                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @forelse ($loadCategories->take(5) as $category)
                                        <li>
                                            <a href="{{ route('categories', $category->slug) }}">

                                                @if ($category->image)
                                                    <img src="{{ asset('assets/img/uploads/categories/' . $category->image) }}"
                                                        alt="" />
                                                @else
                                                    <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                        alt="" />
                                                @endif
                                                {{-- <img src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}"alt="" /> --}}
                                                {{ ucwords(strtolower($category->name)) }}
                                            </a>
                                        </li>
                                    @empty
                                        <li>
                                            <a href="#"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                    alt="" />Clothing & beauty</a>
                                        </li>
                                    @endforelse





                                    {{-- <li>
                                            <a href="#"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                    alt="" />Clothing & beauty</a>
                                        </li>
                                        <li>
                                            <a href="#"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/category-3.svg') }}"
                                                    alt="" />Pet Foods & Toy</a>
                                        </li>
                                        <li>
                                            <a href="#"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/category-4.svg') }}"
                                                    alt="" />Baking material</a>
                                        </li>
                                        <li>
                                            <a href="#"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/category-5.svg') }}"
                                                    alt="" />Fresh Fruit</a>
                                        </li> --}}
                                </ul>
                                <ul>
                                    @forelse ($loadCategories->skip(5)->take(5) as $category)
                                        <li>
                                            <a href="{{ route('categories', $category->slug) }}">

                                                @if ($category->image)
                                                    <img src="{{ asset('assets/img/uploads/categories/' . $category->image) }}"
                                                        alt="" />
                                                @else
                                                    <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                        alt="" />
                                                @endif
                                                {{-- <img src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}"alt="" /> --}}
                                                {{ ucwords(strtolower($category->name)) }}
                                            </a>
                                        </li>
                                    @empty
                                        <li>
                                            <a href="#"> <img
                                                    src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                    alt="" />Clothing & beauty</a>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none" id="more-category">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul class="lineup">
                                        @forelse ($loadCategories->skip(10)->take(3) as $category)
                                            <li class="linelist">
                                                <a href="{{ route('categories', $category->slug) }}"
                                                    style="line-height: 1.1;">

                                                    @if ($category->image)
                                                        <img src="{{ asset('assets/img/uploads/categories/' . $category->image) }}"
                                                            alt="" />
                                                    @else
                                                        <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                            alt="" />
                                                    @endif
                                                    {{-- <img src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}"alt="" /> --}}
                                                    {{ ucwords(strtolower($category->name)) }}
                                                </a>
                                            </li>
                                        @empty
                                            <li>
                                                <a href="#" style="line-height: 1.1;"> <img
                                                        src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                        alt="" />Clothing & beauty</a>
                                            </li>
                                        @endforelse





                                        {{-- <li>
                                                <a href="#"> <img
                                                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-1.svg') }}"
                                                        alt="" />Milks and Dairies</a>
                                            </li>
                                            <li>
                                                <a href="#"> <img
                                                        src="{{ asset('assets/frontend/imgs/theme/icons/icon-2.svg') }}"
                                                        alt="" />Clothing & beauty</a>
                                            </li> --}}
                                    </ul>
                                    <ul class="lineup">
                                        @forelse ($loadCategories->skip(13)->take(3) as $category)
                                            <li class="linelist2">
                                                <a href="{{ route('categories', $category->slug) }}"
                                                    style="line-height: 1.1;">

                                                    @if ($category->image)
                                                        <img src="{{ asset('assets/img/uploads/categories/' . $category->image) }}"
                                                            alt="" />
                                                    @else
                                                        <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                            alt="" />
                                                    @endif
                                                    {{-- <img src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}"alt="" /> --}}
                                                    {{ ucwords(strtolower($category->name)) }}
                                                </a>
                                            </li>
                                        @empty
                                            <li>
                                                <a href="#"> <img
                                                        src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                        alt="" />Clothing & beauty</a>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories moreless"><span class="icon"></span> <span
                                    class="heading-sm-1 more " style="cursor: pointer">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                {{-- <li class="hot-deals"><img
                                            src="{{ asset('assets/frontend/imgs/theme/icons/icon-hot.svg') }}"
                                            alt="hot deals" /><a href="#">Hot Deals</a></li> --}}
                                {{-- <li>
                                        <a class="active" href="{{url('/')}}">Home <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/')}}">Home 1</a></li>
                                            <li><a href="index-2.html">Home 2</a></li>
                                            <li><a href="index-3.html">Home 3</a></li>
                                            <li><a href="index-4.html">Home 4</a></li>
                                            <li><a href="index-5.html">Home 5</a></li>
                                            <li><a href="index-6.html">Home 6</a></li>
                                        </ul>
                                    </li> --}}
                                <li>
                                    <a class="active" href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">About</a>
                                </li>
                                {{-- <li>
                                        <a href="#">Shop</a>
                                    </li> --}}
                                {{-- <li>
                                        <a href="#">Shop <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Shop Grid – Right Sidebar</a></li>
                                            <li><a href="#">Shop Grid – Left Sidebar</a></li>
                                            <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                            <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                            <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                            <li>
                                                <a href="#">Single Product <i class="fi-rs-angle-right"></i></a>
                                                <ul class="level-menu">
                                                    <li><a href="#">Product – Right Sidebar</a></li>
                                                    <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                                    <li><a href="#">Product – No sidebar</a></li>
                                                    <li><a href="shop-product-vendor.html">Product – Vendor Info</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-filter.html">Shop – Filter</a></li>
                                            <li><a href="#">Shop – Wishlist</a></li>
                                            <li><a href="#">Shop – Cart</a></li>
                                            <li><a href="#">Shop – Checkout</a></li>
                                            <li><a href="#">Shop – Compare</a></li>
                                        </ul>
                                    </li> --}}
                                <li>
                                    <a href="{{ route('vendor.list') }}">Vendors</a>
                                    {{-- <ul class="sub-menu">
                                            <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                            <li><a href="{{ route('vendor.list') }}">Vendors List</a></li>
                                            <li><a href="#">Vendor Details</a></li>
                                            <li><a href="#">Vendor Details 02</a></li>
                                            <li><a href="#">Vendor Dashboard</a></li>
                                            <li><a href="#">Vendor Guide</a></li>
                                        </ul> --}}
                                </li>
                                {{-- <li class="position-static">
                                        <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Fruit & Vegetables</a>
                                                <ul>
                                                    <li><a href="#">Meat & Poultry</a></li>
                                                    <li><a href="#">Fresh Vegetables</a></li>
                                                    <li><a href="#">Herbs & Seasonings</a></li>
                                                    <li><a href="#">Cuts & Sprouts</a></li>
                                                    <li><a href="#">Exotic Fruits & Veggies</a></li>
                                                    <li><a href="#">Packaged Produce</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Breakfast & Dairy</a>
                                                <ul>
                                                    <li><a href="#">Milk & Flavoured Milk</a></li>
                                                    <li><a href="#">Butter and Margarine</a></li>
                                                    <li><a href="#">Eggs Substitutes</a></li>
                                                    <li><a href="#">Marmalades</a></li>
                                                    <li><a href="#">Sour Cream</a></li>
                                                    <li><a href="#">Cheese</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Meat & Seafood</a>
                                                <ul>
                                                    <li><a href="#">Breakfast Sausage</a></li>
                                                    <li><a href="#">Dinner Sausage</a></li>
                                                    <li><a href="#">Chicken</a></li>
                                                    <li><a href="#">Sliced Deli Meat</a></li>
                                                    <li><a href="#">Wild Caught Fillets</a></li>
                                                    <li><a href="#">Crab and Shellfish</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-34">
                                                <div class="menu-banner-wrap">
                                                    <a href="#"><img src="{{ asset('assets/frontend/imgs/banner/banner-menu.png') }}" alt="Nest" /></a>
                                                    <div class="menu-banner-content">
                                                        <h4>Hot deals</h4>
                                                        <h3>
                                                            Don't miss<br />
                                                            Trending
                                                        </h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-banner-discount">
                                                        <h3>
                                                            <span>25%</span>
                                                            off
                                                        </h3>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> --}}
                                {{-- <li>
                                        <a href="blog-category-grid.html">Blog <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                            <li><a href="blog-category-list.html">Blog Category List</a></li>
                                            <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                            <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                            <li>
                                                <a href="#">Single Post <i class="fi-rs-angle-right"></i></a>
                                                <ul class="level-menu level-menu-modify">
                                                    <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                                    <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                                    <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> --}}
                                {{-- <li>
                                        <a href="#">Pages <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="page-about.html">About Us</a></li>
                                            <li><a href="page-contact.html">Contact</a></li>
                                            <li><a href="#">My Account</a></li>
                                            <li><a href="page-login.html">Login</a></li>
                                            <li><a href="page-register.html">Register</a></li>
                                            <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="page-terms.html">Terms of Service</a></li>
                                            <li><a href="page-404.html">404 Page</a></li>
                                        </ul>
                                    </li> --}}
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                                @if (!auth()->user())
                                    <li>
                                        <a href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-headphone-white.svg') }}"
                        alt="hotline" />
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="#">
                                <img alt="Nest"
                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest"
                                    src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="Nest"
                                                    src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="Nest"
                                                    src="{{ asset('assets/frontend/imgs/shop/thumbnail-4.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('cart') }}">View cart</a>
                                        <a href="#">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="new-cart">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ url('/') }}"><img
                        src="{{ asset('assets/img/uploads/settings/logo/' . settings('logo')) }}" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{ url('/') }}">Home</a>
                            {{-- <ul class="dropdown">
                                    <li><a href="{{url('/')}}">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
                                    <li><a href="index-5.html">Home 5</a></li>
                                    <li><a href="index-6.html">Home 6</a></li>
                                </ul> --}}
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">shop</a>
                            <ul class="dropdown">
                                <li><a href="#">Shop Grid – Right Sidebar</a></li>
                                <li><a href="#">Shop Grid – Left Sidebar</a></li>
                                <li><a href="#">Shop List – Right Sidebar</a></li>
                                <li><a href="#">Shop List – Left Sidebar</a></li>
                                <li><a href="#">Shop - Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Product – Right Sidebar</a></li>
                                        <li><a href="#">Product – Left Sidebar</a></li>
                                        <li><a href="#">Product – No sidebar</a></li>
                                        <li><a href="#">Product – Vendor Infor</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Shop – Filter</a></li>
                                <li><a href="#">Shop – Wishlist</a></li>
                                <li><a href="{{ route('cart') }}">Shop – Cart</a></li>
                                <li><a href="#">Shop – Checkout</a></li>
                                <li><a href="#">Shop – Compare</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Vendors</a>
                            <ul class="dropdown">
                                <li><a href="#">Vendors Grid</a></li>
                                <li><a href="#">Vendors List</a></li>
                                <li><a href="#">Vendor Details 01</a></li>
                                <li><a href="#">Vendor Details 02</a></li>
                                <li><a href="#">Vendor Dashboard</a></li>
                                <li><a href="#">Vendor Guide</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Mega menu</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#">Blouses & Shirts</a></li>
                                        <li><a href="#">Hoodies & Sweatshirts</a></li>
                                        <li><a href="#">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Jackets</a></li>
                                        <li><a href="#">Casual Faux Leather</a></li>
                                        <li><a href="#">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Gaming Laptops</a></li>
                                        <li><a href="#">Ultraslim Laptops</a></li>
                                        <li><a href="#">Tablets</a></li>
                                        <li><a href="#">Laptop Accessories</a></li>
                                        <li><a href="#">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog-category-fullwidth.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="#">Blog Category Grid</a></li>
                                <li><a href="#">Blog Category List</a></li>
                                <li><a href="#">Blog Category Big</a></li>
                                <li><a href="#">Blog Category Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product Layout</a>#
                                    <ul class="dropdown">
                                        <li><a href="#">Left Sidebar</a></li>
                                        <li><a href="#">Right Sidebar</a></li>
                                        <li><a href="#">No Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Purchase Guide</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">404 Page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-pinterest-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2021 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>

<script>
    $(document).ready(function() {

        $(".zone-id").change(function() {
            var zoneId = this.value;
            var url = "{!! route('zone.filter', ':zoneId') !!}";
            url = url.replace(':zoneId', zoneId);

            $.ajax({
                method: 'GET',
                url: url,
                data: {
                    zone_id: zoneId,

                },
                success: function(result) {
                    // console.log(result);
                    $('#oldZoneWiseProduct').empty();
                    $('#newZoneWiseProduct').html(result);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>


{{-- <script>
    $(document).ready(function() {
        $(document).on("click", ".add-cart .add", function(event) {
            event.preventDefault();

            addCart(event.target);
        });
    });

    function addCart(node) {
        var closest_div = $(node).closest('.add-cart');
        var id = closest_div.find('.product-id').text();
        addToCartById(id);
    }

    function addToCartById(id) {
        var pid = id;
        var url = "{!! route('cartById', ':id') !!}";
        url = url.replace(':id', pid);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pid,
                quantity:1,

            },
            success: function(result) {
                tata.success('Success!', 'Product added to your cart.');
                alert('product added to cart');
                console.log(result);
                $('#old-cart').empty();
                $('#new-cart').html(result);
            },
            error: function(error) {
                if (error.status == 401) {
                    window.location.href = "/login";
                }
            }
        });
    }
</script> --}}


{{-- <script>
    $(document).ready(function() {
        // $(".del-cart .d-cart").on('click', function(event) {
            $(document).on("click", ".del-cart .d-cart", function(event) {
            event.preventDefault();
            deleteCart(event.target);
        });
    });

    function deleteCart(node) {
        var closest_div = $(node).closest('.del-cart');
        var id = closest_div.find('.del-product-id').text();
        deleteFromCartById(id);
    }

    function deleteFromCartById(id) {
        var pid = id;
        var url = "{!! route('cart.remove', ':id') !!}";
        url = url.replace(':id', pid);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pid,

            },
            success: function(result) {
                //console.log(result);
                $('#old-cart').empty();
                $('#new-cart').html(result);
            },
            error: function(error) {
                console.log(error);
            }
        });

    }
</script>


<script>
    $(document).on('click', '.ajax-product-remove', function() {

        var pro_div = $(this).closest(".product-modifiers");
        var pro_id = pro_div.find(".pro-id").val();
        var pd = pro_id;
        var url = "{!! route('cart.remove.div', ':id') !!}";
        url = url.replace(':id', pd);
        //deleteFromCartById(pd);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pd,
            },
            success: function(result) {
                $('#old-div').empty();
                $('#new-div').html(result);


            },
            error: function(error) {
                console.log(error);
            }
        });

    });
</script> --}}

<script>
    $(document).on('click', '.moreless', function() {
        let pre_text = $('.more').text();
        if (pre_text == "Show more...") {
            let new_text = "Show less...";
            $('.more').text(new_text);
        }
        if (pre_text == "Show less...") {
            let new_text = "Show more...";
            $('.more').text(new_text);
        }

    });
</script>

<script>
    $(document).on('click', '.moreless2', function() {
        let pre_text = $('.more2').text();
        if (pre_text == "Show more...") {
            let new_text = "Show less...";
            $('.more2').text(new_text);
        }
        if (pre_text == "Show less...") {
            let new_text = "Show more...";
            $('.more2').text(new_text);
        }

    });
</script>

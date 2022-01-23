@extends('frontend.layouts.app')
@section('title', 'Store')

@section('content')

<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h1 class="mb-15">{{$store->name}}</h1>
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Shop <span></span> {{$store->name}}
                    </div>
                </div>
                <div class="col-xl-9 text-end d-none d-xl-block">
                    <ul class="tags-list">
                        <li class="hover-up">
                            <a href="#"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                        </li>
                        <li class="hover-up active">
                            <a href="#"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                        </li>
                        <li class="hover-up">
                            <a href="#"><i class="fi-rs-cross mr-10"></i>Artichoke</a>
                        </li>
                        <li class="hover-up">
                            <a href="#"><i class="fi-rs-cross mr-10"></i>Celery</a>
                        </li>
                        <li class="hover-up mr-0">
                            <a href="#"><i class="fi-rs-cross mr-10"></i>Spinach</a>
                        </li>
                    </ul>
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
                    <p>We found <strong class="text-brand">29</strong> items for you!</p>
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
                @forelse( $storeWiseProduct as $product )
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="#">
                                    <img class="default-img" src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="" />
                                    <img class="hover-img" src="{{ asset('assets/frontend/imgs/shop/product-1-2.jpg') }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" href="{{route('wishlist', $product->id)}}"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="{{route('compareProduct', $product->id)}}"><i class="fi-rs-shuffle"></i></a>
                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="{{route('categories', $product->category->id)}}">{{$product->category->name}}</a>
                            </div>
                            <h2><a href="{{route('products', $product->id)}}">{{$product->name}}</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="#">{{$product->store->name}}</a></span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>{{ settings('currency') }}{{$product->price}}</span>
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

                @endforelse


                {{-- <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="#">
                                    <img class="default-img" src="{{ asset('assets/frontend//imgs/shop/product-1-1.jpg') }}" alt="" />
                                    <img class="hover-img" src="{{ asset('assets/frontend//imgs/shop/product-1-2.jpg') }}" alt="" />
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
                            <h2><a href="#">Seeds of Change Organic Quinoe Naturel</a></h2>
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
                </div> --}}
                <!--end product card-->
                {{-- <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="#">
                                    <img class="default-img" src="{{ asset('assets/frontend//imgs/shop/product-2-1.jpg') }}" alt="" />
                                    <img class="hover-img" src="{{ asset('assets/frontend//imgs/shop/product-2-2.jpg') }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="sale">Sale</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="#">Hodo Foods</a>
                            </div>
                            <h2><a href="#">All Natural Italian-Style Chicken Meatballs</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 80%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (3.5)</span>
                            </div>
                            <div>
                                <span class="font-small text-muted">By <a href="#">Stouffer</a></span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>$52.85</span>
                                    <span class="old-price">$55.8</span>
                                </div>
                                <div class="add-cart">
                                    <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--end product card-->
                {{-- <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                    <div class="product-cart-wrap">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="#">
                                    <img class="default-img" src="{{ asset('assets/frontend//imgs/shop/product-10-1.jpg') }}" alt="" />
                                    <img class="hover-img" src="{{ asset('assets/frontend//imgs/shop/product-10-2.jpg') }}" alt="" />
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
                            <a class="page-link" href=""><i class="fi-rs-arrow-small-left"></i></a>
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
                {{ $storeWiseProduct->links() }}
            </div>
            <section class="section-padding pb-5">
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
                                        <img src="{{ asset('assets/frontend//imgs/banner/banner-5.png') }}" alt="" />
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
                                        <img src="{{ asset('assets/frontend//imgs/banner/banner-6.png') }}" alt="" />
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
                                        <img src="{{ asset('assets/frontend//imgs/banner/banner-7.png') }}" alt="" />
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
                                        <img src="{{ asset('assets/frontend//imgs/banner/banner-8.png') }}" alt="" />
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
            </section>
            <!--End Deals-->
        </div>
    </div>
</div>

@endsection

<style>
    .product-cart-wrap .product-card-bottom .add-cart .add{
        text-decoration: none;
    }
</style>
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            @if (($search ?? false) == false)
            <h3>Popular Products</h3>
            @else
            <h3>Search Result</h3>
            @endif
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                        type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                @if (($search ?? false) == false)
                @forelse ($categoryProducts->random(6) as $category )
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-{{ $category->id }}" data-bs-toggle="tab"
                            data-bs-target="#tab-{{ $category->id }}" type="button" role="tab" style="padding-bottom: 8px; padding-left:5px;"
                            aria-controls="tab-{{ $category->id }}"
                            aria-selected="false">{{ $category->name }}</button>
                    </li>
                @empty
                @endforelse
                @endif
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @forelse ($categoryProducts as $category )
                        @forelse ($category->products->take(5) as $product)
                        {{-- @forelse ($category->products as $product) --}}
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
                                            {{-- <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                        </div>
                                        {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div> --}}
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a
                                                href="{{ route('categories', $category->id) }}">{{ $category->name }}</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('products', $product->id) }}">{{ ucwords(strtolower(Str::limit($product->name, 25 ))) }}</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ ($product->rating)*20 }}%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ round($product->rating , 1) }})</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="{{route('vendor.details',$product->store->id) }}">{{ $product->store->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{ settings('currency') }}{{ $product->price }}</span>
                                                {{-- <span class="old-price">$32.8</span> --}}
                                            </div>
                                            <div class="add-cart">
                                                <a class="add"
                                                    href="{{ route('cartById', $product->id) }}"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                        @empty
                            <h2>No Products found</h2>
                        @endforelse
                    @empty
                    <h2>No Products found</h2>
                    @endforelse
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one-->
            @forelse ($categories as $category )
                <div class="tab-pane fade" id="tab-{{ $category->id }}" role="tabpanel"
                    aria-labelledby="tab-{{ $category->id }}">
                    <div class="row product-grid-4">
                        @forelse ( $category->products()->take(10)->get() as $product )
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
                                                href="{{ route('wishlist', $product->id) }}"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="{{ route('compare', $product->id) }}"><i
                                                    class="fi-rs-shuffle"></i></a>
                                            {{-- <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                                        </div>
                                        {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div> --}}
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a
                                                href="{{ route('categories', $category->id) }}">{{ $category->name }}</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('products', $product->id) }}">{{ ucwords(strtolower(Str::limit($product->name, 25 ))) }}</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ ($product->rating)*20 }}%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ round($product->rating , 1) }})</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="{{route('vendor.details',$product->store->id) }}" >{{ $product->store->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{ settings('currency') }}{{ $product->price }}</span>
                                                {{-- <span class="old-price">$32.8</span> --}}
                                            </div>
                                            <div class="add-cart">
                                                <a class="add"
                                                    href="{{ route('cartById', $product->id) }}" style=""><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                        @empty
                        @endforelse
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two-->
            @empty
            @endforelse

        </div>
        <!--End tab-content-->
    </div>
</section>
<!--Products Tabs-->

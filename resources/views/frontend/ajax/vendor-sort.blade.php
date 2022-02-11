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
                <a aria-label="Add To Wishlist" class="action-btn"
                    href="{{ route('wishlist', $product->id) }}"><i
                        class="fi-rs-heart"></i></a>
                <a aria-label="Compare" class="action-btn"
                    href="{{ route('compareProduct', $product->id) }}"><i
                        class="fi-rs-shuffle"></i></a>
                <!--<a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> -->
            </div>
            <div class="product-badges product-badges-position product-badges-mrg">
                {{-- <span class="hot">Hot</span> --}}
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <a
                    href="{{ route('categories', $product->category->slug) }}">{{ $product->category->name }}</a>
            </div>
            <h2><a
                    href="{{ route('products', $product->id) }}">{{ ucwords(strtolower(Str::limit($product->name, 20))) }}</a>
            </h2>
            <div class="product-rate-cover">
                <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: {{ $product->rating * 20 }}%">
                    </div>
                </div>
                <span class="font-small ml-5 text-muted">
                    ({{ round($product->rating, 1) }})</span>
            </div>
            <div>
                <span class="font-small text-muted">By <a
                        href="{{ route('shop.product', $product->id) }}">{{ $product->store->name }}</a></span>
            </div>
            <div class="product-card-bottom">
                <div class="product-price">
                    <span>{{ settings('currency') }}{{ $product->price }}</span>
                    <span class="old-price">$32.8</span>
                </div>
                <div class="add-cart">
                    <a class="add" href="{{ route('cartById', $product->id) }}"><i
                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
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
                    <img class="default-img"
                        src="{{ asset('assets/frontend/imgs/shop/product-3-1.jpg') }}" alt="" />
                    <img class="hover-img"
                        src="{{ asset('assets/frontend/imgs/shop/product-3-2.jpg') }}" alt="" />
                </a>
            </div>
            <div class="product-action-1">
                <a aria-label="Add To Wishlist" class="action-btn" href="#"><i
                        class="fi-rs-heart"></i></a>
                <a aria-label="Compare" class="action-btn" href="#"><i
                        class="fi-rs-shuffle"></i></a>
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
                    <a class="add" href="#"><i class="fi-rs-shopping-cart mr-5"></i>Add
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforelse

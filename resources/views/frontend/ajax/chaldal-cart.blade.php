    <!-- Chaldal Card system  Start-->
    <div id="oldChaldalCart">
        <div class="col-lg-2 primary-sidebar chaldal" id="chaldal-cart">

            <div class="card-widget range mb-30">
                <button type="button" class="btn-close close-cross" id="cross-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <h5 class="section-title style-1 mb-30">Cart</h5>
                <div>
                    @foreach ((auth()->user()->cart->products) ?? [] as $product)
                        <div class="row mb-3 margin-minus20">
                            <a class="cart-cross" href="#"><i class="fi-rs-cross-small"></i></a>
                            <div class="col-md-5 col-xs-5 "><a href="#" class="d-block text-center"><img
                                        src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image) }}"
                                        alt="product-image" class="cart-product-image"></a></div>
                            <div class="col-md-7 col-xs-7 ps-0 margin-minus">
                                <span class="product-subtitle">Each units {{ settings('currency') }}{{ $product->price}} x {{ $product->quantity }}</span>
                                <a href="{{ route('products', $product->slug) }}" class="product-name">{{ ucwords(strtolower($product->name))}}</a>
                                <h6 class="price-title"><span class="price-font">{{ settings('currency') }}</span>{{ $product->price }} </h6>
                                <div class="cart-count">
                                    <div class="number">
                                        <span class="minus">-</span>
                                        <input type="text" class="open-font" value="1">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-details card-page">
                    <!-- <hr /> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-sub">Subtotal <span class="card-value">$ 59.99</span></h4>
                            <h4 class="card-tax">Tax <span class="card-value">$ 0.99</span></h4>
                            <h4 class="card-total">Total <span class="ms-auto">$ 60.99</span></h4>
                            <!-- <h5 class="bg-greylight p-4 rounded-6 mt-3 mb-3 w-100 fw-600 text-grey-500 font-xssss d-flex">Apply Promo Code : <span class="ms-auto fw-700 text-grey-900">2 Promos</span></h5> -->
                        </div>
                    </div>

                    <!-- <a href="#" class="w-100 bg-current text-white rounded-6 text-center btn" id="checkout">Checkout</a> -->
                    <a href="{{ route('checkout') }}" class="btn btn-sm btn-default">Checkout</a>
                </div>
            </div>
        </div>

        
    </div>
    {{-- <div id="newChaldalCart"> </div> --}}

    <!-- Chaldal Card system  End-->

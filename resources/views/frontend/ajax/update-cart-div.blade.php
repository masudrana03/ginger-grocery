<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Cart
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Your Cart</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are <span
                        class="text-brand">{{ auth()->user()->cart->products->count() }}</span> products in
                    your
                    cart</h6>
                {{-- <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear
                        Cart</a></h6> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="start pl-20">Image</th>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col" style="text-align:center; padding-right:30px;">Quantity</th>
                            <th scope="col" style="padding-right: 10px;">Subtotal</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>

                    <form id="cartForm">
                        @csrf
                        <tbody id="cartId">
                            @php
                                $total = 0;
                                $currency_symbol = settings('currency');
                            @endphp
                            @forelse ((auth()->user()->cart->products) ?? [] as $product)
                                <tr class="pt-30 product-modifiers " data-product-price="{{ $product->price }}">
                                    <td class="image product-thumbnail pt-10" style="padding-left: 1%;">

                                        @if (count($product->images) > 0)
                                            <img class="default-img"
                                                src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image)  }}"
                                                alt="" />
                                        @else
                                            <img class="default-img"
                                                src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                                alt="" />
                                        @endif

                                        {{-- <img src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="#"> --}}
                                    </td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                href="{{ route('products', $product->slug) }}">{{ ucwords(strtolower(Str::limit($product->name, 28))) }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating"
                                                    style="width:{{ $product->rating * 20 }}%">
                                                </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted">
                                                ({{ round($product->rating, 1) }})</span>
                                        </div>
                                    </td>

                                    <td class="custome-checkbox pl-30"></td>



                                    <td class="price" data-title="Price" id="td-padding-top">
                                        <h6 class="text-body">
                                            {{ settings('currency') }}{{ $product->price }}
                                        </h6>
                                    </td>

                                    <td>
                                        <div class="col-md-10 col-xs-10 d-lg-flex " id="td-padding-top">
                                            <input type="hidden" class="product-id" name="product_ids[]"
                                                value="{{ $product->id }}">
                                                <input type="button" value="-" class="qty-minus btn-cart"
                                                style="padding-left: 0px; padding-right: 0px; margin-right: 4px; background-color: #3BB77E;">
                                            <input type="text" name="qty[]" readonly type="number"
                                                value="{{ $product->quantity }}" max="10" min="1"
                                                class="qty update-qty" style="width: 70%;">
                                                <input type="button" value="+" class="qty-plus btn-cart"
                                                style="padding-left: 0px; padding-right: 0px; margin-left: 4px; background-color: #3BB77E;">
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price" id="td-padding-top">
                                        <h6 class="text-brand">
                                            {{ settings('currency') }}<span
                                                class="cart-subtotal">{{ $product->quantity * $product->price }}</span>
                                        </h6>
                                        <input class="d-none unit-price" value="{{ $product->price }}">
                                    </td>
                                    <td class="action text-center ajax-product-remove " data-title="Remove"
                                        id="td-padding-top"><i class="fi-rs-trash ajax-product-remove "></i>
                                      <input type="hidden" class="pro-id" value="{{$product->id}}" >
                                    </td>
                                </tr>
                                @php
                                    $total += $product->quantity * $product->price;
                                    $currency_symbol = settings('currency');
                                @endphp
                            @empty
                                <tr class="pt-30">
                                    <td class="image product-thumbnail pt-40"
                                        style="left: 32%; text-align: center; position: relative;">
                                        <h4 class="text-brand" style="color: #fdc040 !important;">No Product
                                            Found
                                        </h4>
                                    </td>
                                    <td class="action text-center" data-title="Remove">
                                        <a href="#" class="text-body"><i class=""></i></a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </form>


                </table>
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="cart-action d-flex justify-content-between mb-30">
                <a href="/" style="color: #fff;" class="btn "><i
                        class="fi-rs-arrow-left mr-10"></i>Continue
                    Shopping</a>
                {{-- <button onclick="submit()" class="btn ml-10"><i class="fi-rs-refresh ml-10"></i>Update
                    Cart</button> --}}
            </div>
        </div>



        <div class="col-lg-4">

            <div class="row">

                <div class="border p-md-4 cart-totals ">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                                @if (!session('totalAfterDiscount'))
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand text-end subtotal">0</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Tax</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-heading text-end tax">
                                                {{ settings('currency') }}{{ $totalTax }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                            <small>(Shipping fees not included)</small>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand text-end total">$12.31</h6>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand text-end subtotal">$12.31</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Tax</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end tax">{{ $totalTax }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Discount</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand text-end">{{ settings('currency') }}
                                                {{ session('discountAmount') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                            <small>(Shipping fees not included)</small>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand text-end total">{{ settings('currency') }}
                                                {{ session('totalAfterDiscount') }}</h6>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn mb-20 w-100">Proceed To CheckOut<i
                            class="fi-rs-sign-out ml-15"></i></a>
                </div>

            </div>

            <div class="row">

                <div class="border p-md-4 cart-totals  mt-4">

                    <h4 class="mb-10">Apply Coupon</h4>
                    <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                    <form method="post" action="/apply-promo">
                        @csrf
                        <div class="d-flex justify-content-between">
                            <input class="font-medium mr-15 coupon @error('code') is-invalid @enderror " name="code"
                                placeholder="Enter Your Code...">
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button class="btn"><i class="fi-rs-label mr-10"></i>Apply</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>



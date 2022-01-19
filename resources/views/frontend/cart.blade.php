@extends('frontend.layouts.app')
@section('title', 'Home')

<style>
    .btn-cart {
        background-color: #3BB77E;
        width: 100%;
        height: 40px;
        text-align: center;
        color: #fff;
        border-radius: 5px;


    }

.btn-cart:hover{
    background-color: #fdc040;
 }

.qty{
    height:40px;
    width:100%;
    border:1px #3BB77E solid ;
    text-align: center;
    font-size: 13px;
    background-color: transparent;
    }

#td-padding-top{
    padding-top:4%;
    padding-left:1.5%;

  } 

.product-name a:hover{
    text-decoration: none;
    
  }

 .btn-cart:hover {
    background-color: #fdc040;
  }

    .qty {
        height: 40px;
        width: 100%;
        border: 1px #3BB77E solid;
        text-align: center;
        font-size: 13px;
        background-color: transparent;

    }

</style>

@section('content')

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
                            class="text-brand">{{ auth()->user()->cart->products->count() }}</span> products in your
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

                        <form id="cartForm" method="POST" action="{{ route('cart.update') }}">
                            @csrf
                            <tbody id="cartId">
                                @php
                                    $total = 0;
                                    $currency_symbol = '$';
                                @endphp
                                @forelse ((auth()->user()->cart->products) ?? [] as $product)
                                    <tr class="pt-30 product-modifiers " data-product-price="{{ $product->price }}">
                                        <td class="image product-thumbnail pt-10" style="padding-left: 1%;">

                                            @if (count($product->images) > 0)
                                                <img class="default-img"
                                                    src="{{ asset('assets/img/uploads/products/' . $product->images()->first()->image) }}"
                                                    alt="" />
                                            @else
                                                <img class="default-img"
                                                    src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                                    alt="" />
                                            @endif

                                            {{-- <img src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="#"> --}}


                                        </td>
                                        <td class="product-des product-name" id="td-padding-top">
                                            <h6 class="mb-5"><a class="product-name mb-10 text-heading "
                                                    href="{{ route('products', $product->id) }}">{{ $product->name }}</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                        </td>

                                        <td class="custome-checkbox pl-30"></td>
                                       


                                        <td class="price" data-title="Price" id="td-padding-top">
                                            <h6 class="text-body">
                                                {{ $product->currency->symbol }}{{ $product->price }}
                                            </h6>
                                        </td>
                                        
                                        

                                        <td>
                                            <div class="col-md-10 col-xs-10 d-lg-flex " id="td-padding-top">
                                                <input type="hidden" name="productids[]" value="{{ $product->id }}">
                                                <input type="button" value="-" class="qty-minus btn-cart">
                                                <input type="text" name="qty[]" readonly type="number"
                                                    value="{{ $product->quantity }}" max="10" min="1"
                                                    class="qty update-qty">
                                                <input type="button" value="+" class="qty-plus btn-cart">
                                            </div>
                                        </td>
                                        <td class="price" data-title="Price" id="td-padding-top">
                                            <h6 class="text-brand">
                                                {{ $product->currency->symbol }}<span
                                                    class="cart-subtotal">{{ $product->quantity * $product->price }}</span>
                                            </h6>
                                            <input class="d-none unit-price" value="{{ $product->price }}">
                                        </td>
                                        <td class="action text-center" data-title="Remove" id="td-padding-top"><a
                                                href="{{ route('cart.remove', $product->id) }}" class="text-body"><i
                                                    class="fi-rs-trash"></i></a></td>
                                    </tr>
                                    @php
                                        $total += $product->quantity * $product->price;
                                        $currency_symbol = $product->currency->symbol;
                                    @endphp
                                @empty
                                    <tr class="pt-30">
                                        <td class="image product-thumbnail pt-40"
                                            style="left: 32%; text-align: center; position: relative;">
                                            <h4 class="text-brand" style="color: #fdc040 !important;">No Product Found
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
                    <a href="/" style="color: #fff;" class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continue
                        Shopping</a>
                    <button onclick="submit()" class="btn ml-10"><i class="fi-rs-refresh ml-10"></i>Update
                        Cart</button>
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
                                                <h6 class="text-heading text-end tax">
                                                    {{ $currency_symbol }}{{ $totalTax }}</h6>
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
                                                <h6 class="text-brand text-end">{{ $currency_symbol }}
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
                                                <h6 class="text-brand text-end total">{{ $currency_symbol }}
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

@endsection

<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var products = $(".product-modifiers");
        var subtotal = 0;
        var tax = "{{ $totalTax }}";

        for (var i = 0; i < products.length; i += 1) {
            subtotal += parseFloat($(products[i]).find(".cart-subtotal").text());
        }

        var symbol = "{{ $product->currency->symbol }}"
        $('.subtotal').text(symbol + subtotal);

        var totalAfterDiscount = '{{ Session::get('totalAfterDiscount') }}';
        var discountAmount = '{{ Session::get('discountAmount') }}';

        if (totalAfterDiscount) {
            subtotal = subtotal - parseFloat(discountAmount);
        }

        subtotal += parseFloat(tax);

        $('.tax').text(symbol + tax);
        $('.total').text(symbol + subtotal);
    });

    $(document).on('click', '.qty-plus', function() {

        var tax = "{{ $totalTax }}";
        var max = 10;
        var prev_val = parseInt($(this).prev().val());
        var ctr = $(this).closest(".product-modifiers");

        productPrice = parseFloat(ctr.data("product-price")),
            subtotalCtr = ctr.find(".cart-subtotal"),
            quantity = prev_val + 1
        subtotalPrice = quantity * productPrice;
        subtotalCtr.text(subtotalPrice);

        var products = $(".product-modifiers"),
            subtotal = 0;

        for (var i = 0; i < products.length; i += 1) {
            subtotal += parseFloat($(products[i]).find(".cart-subtotal").text());
            //subtotal += subtotal.toFixed(2);
        }
        var symbol = "{{ $product->currency->symbol }}"
        $('.subtotal').text(symbol + subtotal);
        $('.tax').text(symbol + tax);

        var totalAfterDiscount = '{{ Session::get('totalAfterDiscount') }}';
        var discountAmount = '{{ Session::get('discountAmount') }}';

        if (totalAfterDiscount) {
            subtotal = subtotal - parseFloat(discountAmount);
        }

        subtotal += tax;

        $('.total').text(symbol + subtotal);
        // -----------------------------------------

        if (prev_val < max) {
            prev_val = prev_val + 1;
            prev_val = $(this).prev().val(prev_val);
        }
    });

    $(document).on('click', '.qty-minus', function() {
        var tax = "{{ $totalTax }}";
        var min = 1;

        var prev_val = $(this).next().val();

        // -----------------------------------------
        var ctr = $(this).closest(".product-modifiers");
        productPrice = parseFloat(ctr.data("product-price")),
            subtotalCtr = ctr.find(".cart-subtotal"),
            quantity = prev_val - 1
        subtotalPrice = quantity * productPrice;
        subtotalCtr.text(subtotalPrice);

        var products = $(".product-modifiers"),
            subtotal = 0;

        for (var i = 0; i < products.length; i += 1) {
            subtotal += parseFloat($(products[i]).find(".cart-subtotal").text());
        }
        var symbol = "{{ $product->currency->symbol }}"
        $('.subtotal').text(symbol + subtotal);

        var totalAfterDiscount = '{{ Session::get('totalAfterDiscount') }}';
        var discountAmount = '{{ Session::get('discountAmount') }}';

        if (totalAfterDiscount) {
            subtotal = subtotal - parseFloat(discountAmount);
        }

        subtotal += tax;

        $('.tax').text(symbol + tax);
        $('.total').text(symbol + subtotal);
        // -----------------------------------------

        if ($(this).next().val() > min) {
            $(this).next().val(+$(this).next().val() - 1);
        }
    });

    function submit() {
        document.getElementById('cartForm').submit();
    }
</script>

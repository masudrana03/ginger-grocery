@extends('frontend.layouts.app')
@section('title', 'Checkout')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span
                            class="text-brand">{{ auth()->user()->cart ? auth()->user()->cart->products->count() : 0 }}</span> products in your
                        cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    <div class="col-lg-6">
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <form method="post" action="/apply-promo" class="apply-coupon">
                            @csrf
                            <div class="form-group">
                                <input class="@error('code') is-invalid @enderror" type="text" name="code"
                                    placeholder="Enter Coupon Code...">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn  btn-md" name="login">Apply Coupon</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form id="BillingForm" method="post" action="/place-order">
                        @csrf
                        <input id="paymentMethod" type="hidden" name="payment_method_id">
                        <div class="form-group">
                            <input type="text" required="" name="name" placeholder="Name *"
                                class="@error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" required="" placeholder="Address *"
                                class="@error('address') is-invalid @enderror">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-12">
                                <div class="custom_select">
                                    <select class="form-control select-active @error('country_id') is-invalid @enderror"
                                        name="country_id">
                                        <option value="">Select a country...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="state" placeholder="State / County *">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="city" placeholder="City / Town *" class="@error('city') is-invalid @enderror">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="zip" placeholder="Postcode / ZIP *" class="@error('zip') is-invalid @enderror">
                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="phone" placeholder="Phone *" class="@error('phone') is-invalid @enderror">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input required="" type="text" name="email" placeholder="Email address *" class="@error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Additional information"></textarea>
                        </div>
                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="differentaddress">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse"
                                            data-target="#collapseAddress" href="#collapseAddress"
                                            aria-controls="collapseAddress" for="differentaddress"><span>Ship to a different
                                                address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAddress" class="different_address collapse in">
                                <div class="form-group">
                                    <input type="text" required="" name="shipping_name" placeholder="Name *">
                                </div>

                                <div class="row shipping_calculator">
                                    <div class="form-group col-lg-12">
                                        <div class="custom_select w-100">
                                            <select class="form-control select-active" name="shipping_country_id">
                                                <option value="">Select a country...</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="shipping_address" required="" placeholder="Address *">
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="shipping_state" placeholder="State / County *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="shipping_city" placeholder="City / Town *">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="shipping_zip" placeholder="Postcode / ZIP *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="" type="text" name="shipping_phone" placeholder="Phone *">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @php
                                    $total = 0;
                                    $currency_symbol = '$';
                                @endphp
                                @forelse (auth()->user()->cart ? auth()->user()->cart->products : [] as $product)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="assets/imgs/shop/product-1-1.jpg"
                                                alt="#">
                                        </td>
                                        <td>
                                            <h6 class="w-160 mb-5"><a href="shop-product-full.html"
                                                    class="text-heading">{{ $product->name }}</a></h6></span>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">{{ $product->quantity }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">{{ $product->currency->symbol }}
                                                {{ $product->quantity * $product->price }}</h4>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $product->quantity * $product->price;
                                        $currency_symbol = $product->currency->symbol;
                                    @endphp
                                @empty
                                    <p>No product in your cart!</p>
                                @endforelse
                                @if (!session('totalAfterDiscount'))
                                    <tr>
                                        <td colspan="3">
                                            <h4 class="w-160 mb-5">Total</h4>
                                        </td>
                                        <td colspan="1">
                                            <h4 class="text-brand">{{ $currency_symbol }} {{ $total }}</h4>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="3">
                                            <h5 class="w-160 mb-5">Sub toal</h5>
                                        </td>
                                        <td colspan="1">
                                            <h5 class="text-brand">{{ $currency_symbol }} {{ $total }}</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h6 class="w-160 mb-5">Discount</h6>
                                        </td>
                                        <td colspan="1">
                                            <h6 class="text-brand">{{ $currency_symbol }}
                                                {{ session('discountAmount') }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h4 class="w-160 mb-5">Total</h4>
                                        </td>
                                        <td colspan="1">
                                            <h4 class="text-brand">{{ $currency_symbol }}
                                                {{ session('totalAfterDiscount') }}</h4>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        @foreach ($paymentMethods as $paymentMethod)
                            <div class="custome-radio">
                                <input name="payment_method_id" class="form-check-input payment-method" required=""
                                    type="radio" value="{{ $paymentMethod->id }}"
                                    onclick="doit({{ $paymentMethod->id }})"
                                    id="exampleRadios-{{ $paymentMethod->id }}"
                                    {{ $paymentMethod->provider == 'cash' ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleRadios-{{ $paymentMethod->id }}"
                                    data-bs-toggle="collapse" data-target="#bankTranfer"
                                    aria-controls="bankTranfer">{{ ucfirst($paymentMethod->provider) }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <button onclick="submit()" class="btn btn-fill-out btn-block mt-30">Place an Order<i
                            class="fi-rs-sign-out ml-15"></i></button>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    function doit(id) {
        document.getElementById("paymentMethod").value = id;
    }

    function submit() {
        document.getElementById('BillingForm').submit();
    }
</script>

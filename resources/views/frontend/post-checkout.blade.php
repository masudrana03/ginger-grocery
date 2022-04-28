<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <meta name="csrf-token" content="jzypd3gNwuzKregTqNItUCQtWUtVwhKiWCOyJBwq" /> --}}
    <title>
        Metrocery
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/checkout/favicon.svg') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/checkout/checkout.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- <link media="all" type="text/css" rel="stylesheet"
        href="{{ asset('assets/frontend/checkout/fontawesome.min.css') }}" /> --}}

    {{-- js link --}}

    <link href="https:://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https:://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


    <script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    {{-- js link --}}

    {{-- nest --}}


    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/frontend/checkout/front-theme.css') }}">

    <script src="{{ asset('assets/frontend/checkout/checkout.js ') }}" type="text/javascript"></script>


    {{-- nest --}}

</head>

<body class="checkout-page">
    <div class="checkout-content-wrap">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">

                        {{-- left side section --}}
                        <div class="col-lg-7 col-md-6 col-12 left">
                            <div class="checkout-logo">
                                <div class="container">

                                    {{-- image container --}}
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('assets/img/uploads/settings/logo/logo.png') }}"
                                            class="img-fluid" width="150" alt="Metrocery">
                                    </a>

                                    {{-- image container --}}

                                </div>
                            </div>

                            <hr />

                            <div class="thank-you">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                <div class="d-inline-block">
                                    <h3 class="thank-you-sentence">
                                        Your order is successfully placed
                                    </h3>
                                    <p>Thank you for purchasing our products!</p>
                                </div>
                            </div>

                            <div class="order-customer-info">
                                <h3>Customer information</h3>
                                <div class="" style="float :left;">
                                    <p>
                                        <span class="d-inline-block">Full name:</span>
                                    </p>
                                    <p>
                                        <span class="d-inline-block">Phone:</span>
                                    </p>
                                    <p>
                                        <span class="d-inline-block">Email:</span>
                                    </p>
                                    <p>
                                        <span class="d-inline-block">Address:</span>
                                    </p>
                                    <p>
                                        <span class="d-inline-block">Payment method:</span>
                                    </p>
                                    <p>
                                        <span class="d-inline-block">Payment status:</span>
                                    </p>
                                    <p>
                                        <span class="d-inline-block">Order status:</span>
                                    </p>
                                </div>

                                <div class="">
                                    <p>
                                        <span class="order-customer-info-meta">{{ $shipping_info->shipping->name }}</span>
                                    </p>
                                    <p>
                                        <span
                                            class="order-customer-info-meta">{{ $shipping_info->shipping->country->phone_code }}{{ $shipping_info->shipping->phone }}</span>
                                    </p>
                                    <p>
                                        <span class="order-customer-info-meta">
                                            <a href="#" class="__cf_email__">
                                                {{ $shipping_info->shipping->email }}
                                            </a>
                                        </span>
                                    </p>
                                    <p>
                                        <span class="order-customer-info-meta">
                                            {{ $shipping_info->shipping->address }},{{ $shipping_info->shipping->city }},
                                            {{ $shipping_info->shipping->zip }},{{ settings('country') }}
                                        </span>
                                    </p>

                                    {{-- <p>
                                        <span class="d-inline-block">Shipping method:</span>
                                        <span class="order-customer-info-meta">
                                            By Air
                                        </span>
                                    </p> --}}

                                    <p>
                                        <span class="order-customer-info-meta">
                                            {{ $shipping_info->paymentMethod->provider == 'cash' ? 'Cash In Delivery' : 'Bank Transfer' }}
                                        </span>
                                    </p>
                                    <p>
                                        <span class="order-customer-info-meta" style="text-transform: uppercase;">
                                            <span class="label-warning status-label">
                                                {{ $shipping_info->paymentStatus }}</span>
                                        </span>
                                    </p>
                                    <p>
                                        <span class="order-customer-info-meta" style="text-transform: uppercase;">
                                            <span class="label-warning status-label">
                                                {{ $shipping_info->status->name }}</span>
                                        </span>
                                    </p>

                                </div>
                            </div>

                            <a href="{{ url('/') }}" class="btn payment-checkout-btn">
                                Continue shopping
                            </a>

                        </div>
                        {{-- left side section --}}

                        {{-- right side section --}}

                        <div class="col-lg-5 col-md-6 right">
                            @forelse ($orders as $order)

                                <?php
                                $subTotal = 0;
                                $total = 0;
                                $shipping = 0;
                                $discount = 0;
                                $tax = 0;

                                foreach ($orders as $order) {
                                    $subTotal += $order->subtotal;
                                    $total += $order->total;
                                    $discount += $order->discount;
                                    $tax += $order->tax;
                                }

                                $grandSubtotal = 0 + $subTotal;
                                $grandTotal = 0 + $total;
                                $grandShipping = 0 + $order->shipping_cost;
                                $grandDiscount = 0 + $discount;
                                $grandTax = 0 + $tax;

                                ?>


                                <div class="pt-3 mb-4">
                                    <div class="align-items-center">
                                        <h6 class="d-inline-block" style="font-weight: 600">Invoice ID:
                                            {{ $order->invoice_id }}</h6>
                                    </div>
                                    <div class="checkout-success-products">

                                        {{-- useless div --}}
                                        {{-- <div class="row show-cart-row d-md-none p-2">
                                            <div class="col-9">
                                                <a class="show-cart-link" href="javascript:void(0);"
                                                    data-bs-toggle="collapse" data-bs-target="#cart-item-49">
                                                    Invoice ID: {{ $order->invoice_id }}
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="col-3">
                                                <p class="text-end mobile-total">$59.46</p>
                                            </div>
                                        </div> --}}
                                        {{-- useless div --}}

                                        <div id="cart-item" class="collapse collapse-products">
                                            {{-- each product details here --}}

                                            @foreach ($order->details as $product_details)
                                                <div class="row cart-item">
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="checkout-product-img-wrapper">
                                                            <img class="item-thumb img-thumbnail img-rounded"
                                                                src="{{ asset('assets/img/uploads/products/' . $product_details->product->images()->first()->image) }}"
                                                                alt="" />
                                                            <span
                                                                class="checkout-quantity">{{ $product_details->quantity }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5">
                                                        <p class="mb-0">
                                                            {{ $product_details->product->name }}
                                                        </p>
                                                        <p class="mb-0">
                                                            <a href="#"
                                                                style="color: rgb(59, 164, 80); text-decoration:none ">Vendor:{{ $product_details->product->store->name }}</a>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-4 float-end text-end">
                                                        <p>{{ settings('currency') }}{{ $product_details->product->price }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach


                                            {{-- each product details here --}}
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Subtotal:</p>
                                                </div>
                                                <div class="col-6 float-end">
                                                    <p class="price-text text-end">
                                                        {{ settings('currency') }}{{ $order->subtotal }}</p>
                                                </div>



                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-6">
                                                    <p>Shipping fee:</p>
                                                </div>
                                                <div class="col-6 float-end">
                                                    <p class="price-text text-end">
                                                        {{ settings('currency') }}{{ $order->shipping_cost }}</p>
                                                </div>
                                            </div> --}}
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Discount:</p>
                                                </div>
                                                <div class="col-6 float-end">
                                                    <p class="price-text text-end">
                                                        {{ settings('currency') }}{{ $order->discount }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Tax:</p>
                                                </div>
                                                <div class="col-6 float-end">
                                                    <p class="price-text text-end">
                                                        {{ settings('currency') }}{{ $order->tax }}</p>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Total:</p>
                                                </div>
                                                <div class="col-6 float-end">
                                                    <p class="total-text raw-total-text">
                                                        {{ settings('currency') }}{{ $order->total }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            @empty
                                <h2>No Product Found</h2>
                            @endforelse


                            <div class="bg-light p-3">
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Sub amount:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-end">{{ settings('currency') }}{{ $grandSubtotal }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Shipping fee:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-end">{{ settings('currency') }}{{ $grandShipping }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Tax:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-end">{{ settings('currency') }}{{ $grandTax }}</p>
                                    </div>
                                </div>
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Total amount:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="total-text raw-total-text text-end">
                                            {{ settings('currency') }}{{ $grandTotal }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- right side section --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('paymentSuccess'))
        <script>
            $(document).ready(function() {
                swal({
                    title: "<h2 style='color:#2bac6b'>" +
                        "Success !" +
                        "</h2>",
                    text: "Your order has been placed successfully",
                    imageUrl: "{{ asset('assets/frontend/imgs/swal-image/icon03.png') }}",
                    imageWidth: 200,
                    imageHeight: 220,
                    imageAlt: "Custom image",
                    confirmButtonText: "Continue Shopping",
                    confirmButtonColor: "#2bac6b",
                    width: 340,
                    padding: 40,
                }).then((result) => {
                    if (result.value) {
                        window.location =
                            "{{ route('index') }}";
                    }
                });
            })
        </script>
    @endif

    @if (session()->has('paymentFailed'))
        <script>
            $(document).ready(function() {
                swal({
                    title: "<h2 style='color:#E74141'>" +
                        "Failed !" +
                        "</h2>",
                    text: "Payment Failed",
                    imageUrl: "{{ asset('assets/frontend/imgs/swal-image/icon04.png') }}",
                    imageWidth: 200,
                    imageHeight: 220,
                    imageAlt: "Custom image",
                    confirmButtonText: "Continue Shopping",
                    confirmButtonColor: "#E74141",
                    width: 340,
                    padding: 40,
                }).then((result) => {
                    if (result.value) {
                        window.location =
                            "{{ route('index') }}";
                    }
                });
            })
        </script>
    @endif

    @if (session()->has('noProduct'))
        <script>
            $(document).ready(function() {
                swal({
                    title: "<h2 style='color:#E74141'>" +
                        "Failed !" +
                        "</h2>",
                    text: "Your cart is empty, please add product in your cart",
                    imageUrl: "{{ asset('assets/frontend/imgs/swal-image/icon04.png') }}",
                    imageWidth: 200,
                    imageHeight: 220,
                    imageAlt: "Custom image",
                    confirmButtonText: "Continue Shopping",
                    confirmButtonColor: "#E74141",
                    width: 340,
                    padding: 40,
                }).then((result) => {
                    if (result.value) {
                        window.location =
                            "{{ route('index') }}";
                    }
                });
            })
        </script>
    @endif
</body>

</html>

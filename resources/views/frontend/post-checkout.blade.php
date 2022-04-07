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

    {{-- js link --}}
    
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
    
    <script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
     
    {{-- js link --}}

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
                                <p>
                                    <span class="d-inline-block">Full name:</span>
                                    <span class="order-customer-info-meta">{{ $order->shipping->name }}</span>
                                </p>
                                <p>
                                    <span class="d-inline-block">Phone:</span>
                                    <span
                                        class="order-customer-info-meta">{{ $order->shipping->country->phone_code }}{{ $order->shipping->phone }}</span>
                                </p>
                                <p>
                                    <span class="d-inline-block">Email:</span>
                                    <span class="order-customer-info-meta">
                                        <a href="#" class="__cf_email__">
                                            {{ $order->shipping->email }}
                                        </a>
                                    </span>
                                </p>
                                <p>
                                    <span class="d-inline-block">Address:</span>
                                    <span class="order-customer-info-meta">
                                        {{ $order->shipping->address }},{{ $order->shipping->city }},
                                        {{ $order->shipping->zip }},{{ settings('country') }}
                                    </span>
                                </p>

                                {{-- <p>
                                    <span class="d-inline-block">Shipping method:</span>
                                    <span class="order-customer-info-meta">
                                        By Air
                                    </span>
                                </p> --}}

                                <p>
                                    <span class="d-inline-block">Payment method:</span>
                                    <span class="order-customer-info-meta">
                                        {{ $order->paymentMethod->provider == 'cash' ? 'Cash In Delivery' : 'Bank Transfer' }}
                                    </span>
                                </p>
                                <p>
                                    <span class="d-inline-block">Payment status:</span>
                                    <span class="order-customer-info-meta" style="text-transform: uppercase;">
                                        <span class="label-warning status-label"> {{ $order->paymentStatus }}</span>
                                    </span>
                                </p>
                                <p>
                                    <span class="d-inline-block">Order status:</span>
                                    <span class="order-customer-info-meta" style="text-transform: uppercase;">
                                        <span class="label-warning status-label"> {{ $order->status->name }}</span>
                                    </span>
                                </p>
                            </div>

                            <a href="{{ url('/') }}" class="btn payment-checkout-btn">
                                Continue shopping
                            </a>

                        </div>
                        {{-- left side section --}}

                        {{-- right side section --}}

                        <div class="col-lg-5 col-md-6 right">
                            <div class="pt-3 mb-4">
                                <div class="align-items-center">
                                    <h6 class="d-inline-block">Order number: #10000049</h6>
                                </div>
                                <div class="checkout-success-products">
                                    <div class="row show-cart-row d-md-none p-2">
                                        <div class="col-9">
                                            <a class="show-cart-link" href="javascript:void(0);"
                                                data-bs-toggle="collapse" data-bs-target="#cart-item-49">
                                                Order information #10000049
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <p class="text-end mobile-total">$59.46</p>
                                        </div>
                                    </div>
                                    <div id="cart-item-49" class="collapse collapse-products">
                                        <div class="row cart-item">
                                            <div class="col-lg-3 col-md-3">
                                                <div class="checkout-product-img-wrapper">
                                                    <img class="item-thumb img-thumbnail img-rounded"
                                                        src="https://nest.botble.com/storage/products/4-150x150.jpg"
                                                        alt="Foster Farms Takeout Crispy Classic(HS-150-A0)" />
                                                    <span class="checkout-quantity">1</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <p class="mb-0">
                                                    Foster Farms Takeout Crispy Classic
                                                </p>
                                                <p class="mb-0">
                                                    <small>(Boxes: 3 Boxes, Weight: 4KG)</small>
                                                </p>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-4 float-end text-end">
                                                <p>$54.05</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>Subtotal:</p>
                                            </div>
                                            <div class="col-6 float-end">
                                                <p class="price-text text-end">$54.05</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>Shipping fee:</p>
                                            </div>
                                            <div class="col-6 float-end">
                                                <p class="price-text text-end">$0.00</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>Discount:</p>
                                            </div>
                                            <div class="col-6 float-end">
                                                <p class="price-text text-end">$0.00</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p>Tax:</p>
                                            </div>
                                            <div class="col-6 float-end">
                                                <p class="price-text text-end">$5.41</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-6">
                                                <p>Total:</p>
                                            </div>
                                            <div class="col-6 float-end">
                                                <p class="total-text raw-total-text">$59.46</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="bg-light p-3">
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Sub amount:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-end">$176.99</p>
                                    </div>
                                </div>
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Shipping fee:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-end">$0.00</p>
                                    </div>
                                </div>
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Tax:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-end">$17.70</p>
                                    </div>
                                </div>
                                <div class="row total-price">
                                    <div class="col-6">
                                        <p>Total amount:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="total-text raw-total-text text-end">$194.69</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- right side section --}}
                        
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

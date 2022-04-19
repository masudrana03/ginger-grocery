<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    {{-- <meta charset="utf-8" />
        <title>Nest - Multipurpose eCommerce HTML Template</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" /> --}}
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/invoice/favicon.svg') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/invoice/main.css?v=4.1') }}" />
</head>

<body>
    <div class="invoice invoice-content invoice-2">
        <div class="back-top-home hover-up mt-30 ml-30">
            <a class="hover-up" href="{{ url('/') }}"><i class="fi-rs-home mr-5"></i> Homepage</a>
        </div>
        <div class="container" style="max-width: 100%;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner" style="background-color: white">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header"  >
                                <div class="row" style="display: inline-flex; width:80%; ">
                                    <div class="col-sm-6" style="width:65%; text-align:left;">
                                        <div class="invoice-numb">
                                            <h4 class="invoice-header-1 mb-10 mt-20">Invoice No: <span
                                                    class="text-brand">#{{ $order->invoice_id }}</span></h4>
                                            <h6 class="">Date: {{ $order->created_at->format('d M Y') }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" style="width:40%;" >
                                        <div class="invoice-name text-end" style="text-align:left;">
                                            <div class="logo" style="left: 75%;top: 36%;">
                                                <a href="{{ url('/') }}"><img
                                                        src="{{ asset('assets/img/uploads/settings/logo/' . settings('logo')) }}"
                                                        alt="logo" /></a>
                                                <p class="text-sm text-mutted">{{ settings('company_name') }}
                                                    ,<br>{{ settings('company_address') }},
                                                    <br>{{ settings('city') }}, {{ settings('zip') }},
                                                    {{ settings('country') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row" style="display: inline-flex; width:100%;" >
                                    <div class="col-sm-2 " style="width:50%;">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Order Information</h4>
                                            <p class="invoice-addr-1">
                                                <strong>Order status: {{ $order->status->name }}</strong> <br />
                                                <strong>Payment status: {{ $order->paymentStatus }}</strong> <br />
                                                <strong>Payment Method:
                                                    {{ $order->paymentMethod->provider == 'cash' ? 'Cash In Delivery' : 'Bank Transfer' }}</strong>
                                                <br />
                                            </p>
                                        </div>
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Customer Information</h4>
                                            <p class="text-sm text-mutted">
                                                <strong>{{ $order->user->name }}</strong>
                                                <br>{{ $order->user->phone_code }}{{ $order->user->phone }}<br>
                                                {{ settings('country') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" style="width:50%; text-align:left;">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Shipping Information</h4>
                                            <p class="invoice-addr-1">
                                                <strong>{{ $order->shipping->name }}</strong> <br />
                                            <p>{{ $order->shipping->email }}</p>
                                            <p>{{ $order->shipping->country->phone_code }}{{ $order->shipping->phone }}</p>
                                            {{ $order->shipping->address }}, <br />{{ $order->shipping->city }},
                                            {{ $order->shipping->zip }}, {{ settings('country') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center" style="background-color: white">
                                <h3 style="margin-bottom: 15px;">Order Details</h3>
                                <div class="table-responsive" style="margin-bottom: 50px;">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr>
                                                <th>Item Name</th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ( $order->details as $product )
                                                @php
                                                    $total = $product->product->discount_price * $product->quantity;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>{{ $product->product->name }} <small>Sold By: <a
                                                                        href="{{ route('vendor.details', $product->product->store->slug) }}">{{ $product->product->store->name }}</a></small></span>
                                                            {{-- <small>SKU: FWM15VKT</small> --}}
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        {{ settings('currency') }}{{ $product->product->discount_price }}
                                                    </td>
                                                    <td class="text-center">{{ $product->quantity }}</td>
                                                    <td class="text-right">
                                                        {{ settings('currency') }}{{ $total }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>No product found</span>
                                                            {{-- <small>SKU: FWM15VKT</small> --}}
                                                        </div>
                                                    </td>
                                                    <td class="text-center"> --- </td>
                                                    <td class="text-center"> --- </td>
                                                    <td class="text-right"> --- </td>
                                                </tr>
                                            @endforelse

                                            {{-- @php
                                                    $currency = ( $order->details as $product )
                                                @endphp --}}
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                                <td class="text-right">
                                                    {{ settings('currency') }}{{ $order->total }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Shipping</td>
                                                <td class="text-right">
                                                    {{ settings('currency') }}{{ $order->shipping_cost }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Tax</td>
                                                <td class="text-right">
                                                    {{ settings('currency') }}{{ $order->tax }}
                                                </td>
                                            </tr>
                                            @if ($order->discount)
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Discount</td>
                                                <td class="text-right">
                                                    {{ settings('currency') }}{{ $order->discount }}
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600"><h6>Grand Total</h6></td>
                                                <td class="text-right f-w-600">
                                                    <h6>{{ settings('currency') }}{{ $order->total }}</h6></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img
                                    src="{{ asset('assets/frontend/invoice/icon-print.svg') }}" alt="" /> Print </a>
                            {{-- <a id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img
                                    src="{{ asset('assets/frontend/invoice/icon-download.svg') }}" alt="" /> Download
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script data-cfasync="false" src="{{ asset('assets/frontend/invoice/email-decode.min.js') }}"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>

    <!-- Invoice JS -->
    <script src="{{ asset('assets/frontend/invoice/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/invoice/invoice.js') }}"></script>
</body>

</html>

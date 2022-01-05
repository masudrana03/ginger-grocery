
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
                <a class="hover-up" href="{{url('/')}}"><i class="fi-rs-home mr-5"></i> Homepage</a>
            </div>
            <div class="container" style="max-width: 100%;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-inner">
                            <div class="invoice-info" id="invoice_wrapper">
                                <div class="invoice-header">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="invoice-numb">
                                                <h4 class="invoice-header-1 mb-10 mt-20">Invoice No: <span class="text-brand">#{{ $order->invoice_id }}</span></h4>
                                                <h6 class="">Date: {{ $order->created_at->format('d M Y') }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="invoice-name text-end">
                                                <div class="logo" style="position: absolute;left: 75%;top: 36%;">
                                                    <a href="{{url('/')}}"><img src="{{ asset('assets/frontend/invoice/logo.svg') }}" alt="logo" /></a>
                                                    <p class="text-sm text-mutted">{{ settings('company_name') }} ,<br>{{ settings('company_address') }}, <br>{{ settings('city') }},  {{ settings('zip') }}, {{ settings('country') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-top">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-6">
                                            <div class="invoice-number">
                                                <h4 class="invoice-title-1 mb-10">Shipping To</h4>
                                                <p class="invoice-addr-1">
                                                    <strong>{{ $order->user->name }}</strong> <br />
                                                    {{ $order->shipping->address }} <br />
                                                    PO Box {{ $order->shipping->zip }}, {{ $order->shipping->city }}, <br />{{ $order->shipping->country->name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6" style="position: absolute; left: 67%;top: 41%;">
                                            <div class="invoice-number">
                                                <h4 class="invoice-title-1 mb-10">Bill To</h4>
                                                <p class="invoice-addr-1">
                                                    <strong>NestMart Inc</strong> <br />
                                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7012191c1c191e17303e1503043d1102045e131f1d">[email&#160;protected]</a> <br />
                                                    205 North Michigan Avenue, <br />Suite 810 Chicago, 60601, USA
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-9 col-md-6">
                                            <h4 class="invoice-title-1 mb-10">Due Date:</h4>
                                            <p class="invoice-from-1">30 November 2021</p>
                                        </div>
                                        <div class="col-lg-3 col-md-6" style="position: absolute;left: 67%; top: 57%;">
                                            <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                            <p class="invoice-from-1">Via Paypal</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-center">
                                    <div class="table-responsive">
                                        <table class="table table-striped invoice-table">
                                            <thead class="bg-active">
                                                <tr>
                                                    <th>Item Item</th>
                                                    <th class="text-center">Unit Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-right">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ( $order->details as $product )
                                                @php
                                                    $total =  $product->product->price*$product->quantity;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>{{ $product->product->name }}</span>
                                                            {{-- <small>SKU: FWM15VKT</small> --}}
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{ $product->product->currency->symbol }}{{ $product->product->price }}</td>
                                                    <td class="text-center">{{ $product->quantity }}</td>
                                                    <td class="text-right">{{ $product->product->currency->symbol }}{{ $total }}</td>
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
                                                    <td class="text-right">{{ $product->product()->first()->currency->symbol }}{{ $order->total }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">Tax</td>
                                                    <td class="text-right">---</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                                    <td class="text-right f-w-600">{{ $product->product()->first()->currency->symbol }}{{ $order->total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="invoice-bottom">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div>
                                                <h3 class="invoice-title-1">Important Note</h3>
                                                <ul class="important-notes-list-1">
                                                    <li>All amounts shown on this invoice are in US dollars</li>
                                                    <li>finance charge of 1.5% will be made on unpaid balances after 30 days.</li>
                                                    <li>Once order done, money can't refund</li>
                                                    <li>Delivery might delay due to some external dependency</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-offsite" style="position: absolute;top: 138%;left: 66%;">
                                            <div class="text-end">
                                                <p class="mb-0 text-13">Thank you for your business</p>
                                                <p><strong>{{ $order->user->name }}</strong></p>
                                                <div class="mobile-social-icon mt-50 print-hide">
                                                    <h6>Follow Us</h6>
                                                    <a href="#"><img src="{{ asset('assets/frontend/invoice/icon-facebook-white.svg') }}" alt="" /></a>
                                                    <a href="#"><img src="{{ asset('assets/frontend/invoice/icon-twitter-white.svg') }}" alt="" /></a>
                                                    <a href="#"><img src="{{ asset('assets/frontend/invoice/icon-instagram-white.svg') }}" alt="" /></a>
                                                    <a href="#"><img src="{{ asset('assets/frontend/invoice/icon-pinterest-white.svg') }}" alt="" /></a>
                                                    <a href="#"><img src="{{ asset('assets/frontend/invoice/icon-youtube-white.svg') }}" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-btn-section clearfix d-print-none">
                                <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img src="{{ asset('assets/frontend/invoice/icon-print.svg') }}" alt="" /> Print </a>
                                <a id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img src="{{ asset('assets/frontend/invoice/icon-download.svg') }}" alt="" /> Download </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vendor JS-->
        <script data-cfasync="false" src="{{ asset('assets/frontend/invoice/email-decode.min.js') }}"></script><script src="{{ asset('assets/frontend/invoice/modernizr-3.6.0.min.js') }}"></script>
        <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>

        <!-- Invoice JS -->
        <script src="{{ asset('assets/frontend/invoice/jspdf.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/invoice/invoice.js') }}"></script>
    </body>
</html>

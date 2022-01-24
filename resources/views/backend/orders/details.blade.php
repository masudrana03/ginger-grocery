@extends('backend.layouts.app')
@section('title', 'Invoice')

@push('styles')
    <style>
        #banners_previous {
            padding-right: 57px !important;
        }

        table tbody tr td {
            font-size: 14px !important;
            color: #212527 !important;
        }

        table tbody tr td a {
            color: #884FFB;
            font-size: 18px;
        }

    </style>
@endpush
@section('content')
    <div class="main_content_iner">
        <div class="container-fluid white_card" style="margin-bottom: 20px;">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Order Invoice</h3>
                            </div>
                            <div class="add_button ml-10">
                                <a href="{{ route('admin.orders.index') }}" class="btn_1">Back</a>
                                &nbsp;&nbsp;<button onclick="printDiv('printableArea')"
                                    class="white_btn3">Print</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid white_card" id="printableArea" style="padding: 50px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <img class="img-fluid mb-5 mh-70" width="100" alt="Logo"
                            src="{{ asset('assets/img/uploads/settings/logo/' . settings('logo')) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h5><b>Order Details :</b></h5>
                    <span>Invoice Id : </span>{{ $order->invoice_id }}<br>
                    <span>Order Date : </span>{{ $order->created_at->format('d-m-Y') }}<br>
                    <span>Order status : </span>{{ $order->status->name }}<br>
                    <span>Payment Status : {{ $order->paymentStatus }}</span><br>
                    {{-- <div class="status_btn_danger_b"> --}}
                    <span>Payment Method : </span>{{ $order->paymentMethod->provider == 'cash' ? 'Cash In Delivery' : 'Bank Transfet' }}<br>
                    <br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <h5>Customer Information :</h5>

                    <span>Name: </span>{{ $order->user->name }}<br>
                    <span>Email: </span>{{ $order->user->email }}<br>
                    <span>Phone: </span>{{ $order->user->phone }}<br>
                    <span>Country: </span>{{ settings('country') }}<br>

                </div>
                <div class="col-12 col-md-6">
                    <h5>Shipping Address :</h5>
                    <span>Name: </span>{{ $order->shipping->name }} <br>
                    <span>Email: </span>{{ $order->shipping->email }}<br>
                    <span>Phone: </span>{{ $order->shipping->phone }}<br>
                    <span>Address: </span> {{ $order->shipping->address }}<br>
                    <span>Country: </span>{{ settings('country') }}<br>
                    <span>City: </span>{{ $order->shipping->city }}<br>
                    <span>Zip: </span>{{ $order->shipping->zip }}<br>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <!-- Table -->
                    <div class="gd-responsive-table">
                        <table class="table my-4">
                            <thead>
                                <tr>
                                    <th width="50%" class="px-0 bg-transparent border-top-0">
                                        <span class="h6">Products</span>
                                    </th>
                                    <th class="px-0 bg-transparent border-top-0">
                                        <span class="h6">Quantity</span>
                                    </th>
                                    <th class="px-0 bg-transparent border-top-0 text-right">
                                        <span class="h6">Price</span>
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($order->details as $item)
                                    <tr>
                                        <td class="px-0">
                                            {{ $item->product->name }} | <small> Sold By: <a
                                            href="{{ route('vendor.details', $item->product->store->id) }}">{{ $item->product->store->name }}</a></small>
                                        </td>
                                        <td class="px-0">
                                            {{ $item->quantity }}
                                        </td>

                                        <td class="px-0 text-right">
                                            {{ settings('currency') }}{{ $item->product->price }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="padding-top-2x" colspan="5">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0 border-top border-top-2">
                                        <span class="text-muted">Shipping</span>
                                    </td>
                                    <td class="px-0 text-right border-top border-top-2" colspan="5">
                                        <span>
                                            {{ settings('currency') }}{{ $order->shipping_cost }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0 border-top border-top-2">
                                        <span class="text-muted">Tax</span>
                                    </td>
                                    <td class="px-0 text-right border-top border-top-2" colspan="5">
                                        <span>
                                            {{ settings('currency') }}{{ $order->tax }}
                                        </span>
                                    </td>
                                </tr>
                                @if ($order->discount)
                                <tr>
                                    <td class="px-0 border-top border-top-2">
                                        <span class="text-muted">Tax</span>
                                    </td>
                                    <td class="px-0 text-right border-top border-top-2" colspan="5">
                                        <span>
                                            {{ settings('currency') }}{{ $order->discount }}
                                        </span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="px-0 border-top border-top-2">

                                        <strong>Total amount</strong>
                                    </td>
                                    <td class="px-0 text-right border-top border-top-2" colspan="5">
                                        <span class="h3">
                                            {{ settings('currency') }}{{ $order->total }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush

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
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <!-- page title  -->
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_30 f_w_700 dark_text">Dashboard</h3>
                        <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Salessa </a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white_card">
                    <div class="white_card_header border_bottom_1px"><h4 class="card-title mb-0">Carts Details</h4></div>
                    <!--end white_card_header border_bottom_1px-->
                    <div class="card-body">
                        <div class="table-responsive shopping-cart">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Product</th>
                                        <th class="border-top-0">Quantity</th>
                                        <th class="border-top-0">attributes</th>
                                        {{-- <th class="border-top-0">Total</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->details as $item)
                                    <tr>
                                        <td>
                                            {{-- <img src="img/products/img-5.png" alt="" height="52" /> --}}
                                            <p class="d-inline-block align-middle mb-0 product-name f_s_16 f_w_600 color_theme2">{{ $item->product->name }}</p>
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->attributes }}</td>
                                        {{-- <td>$198</td> --}}
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td><h6>Total :</h6></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-dark"><strong>$496</strong></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <!--end re-table-->

                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
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

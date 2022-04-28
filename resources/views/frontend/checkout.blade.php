@extends('frontend.layouts.app')
@section('title', 'Checkout |')

@push('css')
    <style>
        span.checkout-quantity {
            position: absolute;
            background-color: #3BB77E;
            width: 25px;
            border-radius: 15px;
            text-align: center;
            color: white;
            top: 1px;
            right: 4px;
        }

        .calculate-total {
            left: 20px;
        }

        .calculate-total p {
            padding-bottom: 3px;
        }

        /* .checkout-total{
                                       display: flex;
                                       justify-content: flex-end;
                                   } */


        .calculate {
            text-align: right;
            padding-left: 50px;
        }



        .calculate p {
            padding-bottom: 3px;
        }

        .product-name p {
            font-size: 1em;

        }

        /* .form-group{
                                      height: 2%;
                                      padding-bottom:60px;
                                  } */

        .form-group input {
            background: #fff;
            border: 1px solid #ececec;
            height: 50px !important;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding-left: 10px;
            font-size: 13px !important;
            width: 100%;
        }

        .custom-select {
            font-size: 13px !important;
        }

        .form-group textarea {
            font-size: 13px !important;
        }

        .checkout-button {
            padding-bottom: 20px;
        }

        .form-check {
            margin-left: 30px;

        }

        .checkout-products-marketplace {
            margin-bottom: -2.2%;
        }

        textarea {
            min-height: 80px !important;
        }

        li.list-group-item {
            padding: 2px;
        }

        .pri {
            text-align: right;
            margin-top: 19px;

        }

        .address-checklist {
            padding-top: 10px;
        }

        .check-link {
            border-radius: 10px !important;
        }

        .total-amount {
            padding-right: 8%;
        }

        .alert-danger {
            width: 100% !important;
            border-radius: 10px !important;
            border-color: #ffd170 !important;
            background-color: #fff1d3 !important;
            text-align: center;
            font-size: 20px !important;
            color: #7c7c7c !important;
            position: relative !important;
            padding: 0.8rem !important;
            margin-bottom: 1rem !important;
            border: 1px solid transparent !important;
            font-weight: 700 !important;
        }

        .alert-success {
            width: 100% !important;
            border-radius: 10px !important;
            border-color: #3BB77E !important;
            background-color: #CDF0E0 !important;
            text-align: center;
            font-size: 20px !important;
            color: #7c7c7c !important;
            position: relative !important;
            padding: 0.8rem !important;
            margin-bottom: 1rem !important;
            border: 1px solid transparent !important;
            font-weight: 700 !important;
        }


        #custom .select2-container--default .select2-selection--single {

            height: 48px !important;
            width: 125px !important;
        }

        #custom .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 47px !important;
            text-align: center !important;
        }

        #custom .select2-container--default .select2-selection--single .select2-selection__arrow {
            right: 30px;
        }

    </style>
@endpush

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div id="oldCheckoutdiv">
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="heading-2 mb-10">Checkout</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span
                                class="text-brand">{{ auth()->user()->cart
                                    ? auth()->user()->cart->products->count()
                                    : 0 }}</span>
                            products in your
                            cart</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="row mb-20 ">

                        <h4 class="mt-20 mb-10">Saved Address</h4>

                        @forelse ($savedAddress as $address)
                            <div class="ml-20">
                                <div class="address-checklist" id="radioDiv">
                                    <input class="form-check-input checkaddress" type="radio" name="address1"
                                        value="{{ $address->id }}" />
                                    <label class="form-check-label "><span
                                            class="addName">{{ $address->address }},{{ $address->state }}</span></label>
                                    <br />
                                </div>
                            </div>
                        @empty
                            <label class="form-check-label" id="noAddress"><span>No address Found....</span></label>
                        @endforelse

                    </div>

                    <div class="row mb-10">
                        <div class="address-checklist ml-20">
                            <input class="form-check-input" type="checkbox" onclick="showDiv(this)" id="infoCheck" />
                            <label class="form-check-label" for=""><span>Add new address.</span></label>
                            <br />
                        </div>
                    </div>




                    <div class="row mb-10 mt-20" id="shipping-form">
                        <h4 class="mb-10">Shipping Details</h4>
                        <form id="BillingForm" method="post" action="/place-order">
                            @csrf
                            <input id="paymentMethod" type="hidden" name="payment_method_id">
                            <input id="addressId" type="hidden" name="address_id">

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
                                <input id="address" type="text" name="address" required="" placeholder="Address *"
                                    class="@error('address') is-invalid @enderror">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ">
                                <div class="col-md-12 mb-10">
                                    <select disabled class=" form-control  @error('country_id') is-invalid @enderror"
                                        name="country_id">
                                        <option value="">Select a country...</option>
                                        @foreach ($countries as $country)
                                            <option {{ settings('country') == $country->name ? 'selected' : '' }}
                                                value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input id="state" required="" type="text" name="state"
                                            placeholder="State / County *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input id="city" required="" type="text" name="city" placeholder="City / Town *"
                                            class="@error('city') is-invalid @enderror">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <input required="" id="zip-code" type="text" name="zip" placeholder="Postcode / ZIP *"
                                        class="@error('zip') is-invalid @enderror">
                                    @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group  col-lg-2 " id="custom">
                                    <select name="phone_code"
                                        class="select-two form-control @error('') is-invalid @enderror">
                                        @foreach ($countries as $countryName)
                                            <option value="{{ $countryName->id }}"
                                                {{ settings('country') == $countryName->name ? 'selected' : '' }}>
                                                {{ $countryName->phone_code }}
                                                {{ $countryName->iso2 }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-6" id="phone_code">
                                    <input required="" type="text" name="phone" placeholder="Phone *"
                                        class="@error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input required="" type="text" name="email" placeholder="Email address *"
                                    class="@error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- set primary address --}}

                            <div class="row">

                                <div class="form-check">
                                    <input class="form-check-input" name="is_primary" type="checkbox" value="1"
                                        id="primary-address">
                                    <label class="form-check-label" for="primary-address">
                                        Set as primary address
                                    </label>
                                </div>

                            </div>

                            {{-- set primary address --}}


                        </form>
                    </div>

                    <div class="row ">
                        <div>
                            <h4 class="mb-10 ">Payment Method</h4>
                        </div>

                        <div class="checkout-products-marketplace" style="margin-bottom:1%;">
                            <ul class="list-group">
                                @foreach ($paymentMethods as $paymentMethod)
                                    @if ($paymentMethod->provider == 'stripe' && (!$paymentMethod->client_key || !$paymentMethod->client_secret))
                                        @php
                                            continue;
                                        @endphp
                                    @endif
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" id="payMethod" type="radio"
                                                value="{{ $paymentMethod->id }}" name="payment_method"
                                                id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{ $paymentMethod->provider == 'stripe' ? 'Online Payment' : 'Cash on Delivery' }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-10 mt-10">
                        <div class="payment-logo d-flex">
                            <img class="mr-15"
                                src="{{ asset('assets/frontend/imgs/theme/icons/payment-paypal.svg') }}" alt="">
                            <img class="mr-15"
                                src="{{ asset('assets/frontend/imgs/theme/icons/payment-visa.svg') }}" alt="">
                            <img class="mr-15"
                                src="{{ asset('assets/frontend/imgs/theme/icons/payment-master.svg') }}" alt="">

                        </div>
                    </div>

                    <div class="row mb-10 mt-10">
                        <div class="container" id="error" style="display:none;">
                            <span style="color: crimson;font-size:medium;">Please Enter or Select an Address!!</span>
                        </div>
                    </div>

                    <div class="row mb-15 mt-10">
                        <div class="col-4" id="checkout">
                            {{-- <a  href="#" class="btn btn-lg check-link">Checkout</a> --}}
                            <button id="checkOutBtn" onclick="submitForm()"
                                class="btn btn-fill-out btn-block mt-30">Checkout<i
                                    class="fi-rs-sign-out ml-15"></i></button>
                        </div>
                    </div>

                    <div class="form-group" style="position: relative; left: 50%; width: 50%; top: -62px;">
                        <form class="apply-coupon">
                            @csrf
                            {{-- <input type="text" placeholder="Enter Coupon Code..."> --}}
                            <input class="@error('code') is-invalid @enderror " name="code" id="promoId"
                                placeholder="Enter Your Code...">
                            @error('code')
                                <span class="invalid-feedback" role="alert" style="position: absolute; top: 90%; left: 2%;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button class="btn  btn-md" id="promoCode">Apply Coupon</button>
                        </form>

                        {{-- <form method="post" action="/apply-promo">
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
                        </form> --}}

                        <div id="promoError" style="padding-top: 10px;"></div>
                    </div>

                </div>

                {{-- Checkout new page added --}}


                <div class="col-lg-5 mb-100" style="margin-top:7%;" id="oldCheckoutProducts">
                    <div class=" p-2 bg-light">
                        <p class="font-weight-bold mb-0">Product(s):</p>
                    </div>
                    @php
                        $grandSubtotal = 0;
                        $grandTotal = 0;
                        $shipping = 0;
                        $currency = settings('currency');
                    @endphp
                    @forelse (auth()->user()->cart ? auth()->user()->cart->products->groupBy('store_id') : [] as $key => $product)
                        <div class="checkout-products-marketplace" id="shipping-method-wrapper">
                            <div class="mt-2 bg-light mb-2">
                                @php
                                    $store = \App\Models\Store::find($key);
                                @endphp
                                <div class="p-2" style="background:#cdf0e0" ;>
                                    <img style="vertical-align: middle;"
                                        src="{{ asset('assets/img/uploads/stores/' . $store->image) }}"
                                        alt="Global Office" class="img-fluid rounded" width="30">
                                    <span>{{ $store->name }}</span>
                                </div>
                                @php
                                    $subtotal = 0;
                                    $total = 0;
                                @endphp
                                <div style="padding-left:3%;  padding-right:4%;">
                                    @foreach ($product as $item)
                                        @php
                                            $subtotal += $item->discount_price * $item->quantity;
                                        @endphp
                                        <div class="row cart-item mb-3">
                                            <div class="col-3" style="width: 14%">
                                                <div class="checkout-product-img-wrapper product-details"
                                                    style="padding-top: 5px;">
                                                    @if (count($item->images) > 0)
                                                        <img class="item-thumb img-thumbnail img-rounded"
                                                            src="{{ asset('assets/img/uploads/products/' . $item->images()->first()->image) }}"
                                                            alt="Angie’s Boomchickapop Sweet &amp; Salty Kettle Corn">
                                                    @else
                                                        <img src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                                            alt="" />
                                                    @endif
                                                    <span class="checkout-quantity">{{ $item->quantity }}</span>
                                                </div>
                                            </div>

                                            <div class="col-5 product-name" style="margin-top:2%">
                                                <p class="mb-0">{{ $item->name }}</p>
                                                {{-- <p class="mb-0">
                                                    (Boxes: 4 Boxes, Weight: 4KG)
                                                </p> --}}
                                            </div>

                                            <div class="col">
                                                <p class="pri">{{ $currency }}
                                                    {{ $item->discount_price * $item->quantity }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    @php
                                        $grandSubtotal += $subtotal;
                                    @endphp
                                </div>
                                <hr>
                                <div class="row checkout-total ">
                                    <div class="col-6 calculate-total">
                                        <p class="">Total:</p>
                                        {{-- <p class="">Shipping Fee:</p> --}}
                                        {{-- <p class="">Tax:</p> --}}
                                        {{-- <h5 class="">Total:</h5> --}}
                                    </div>

                                    <div class="col-6 calculate">
                                        <p class="total-amount"> {{ $currency }}{{ $subtotal }} </p>
                                        {{-- <p class="store-shipping total-amount" id="{{ $store->id }}"> {{ $currency }}0
                                        </p> --}}
                                        {{-- <p class="store-shipping" id=""> {{ $currency }}{{ $shipping }} </p> --}}
                                        {{-- <p class="total-amount"> {{ $currency }}{{ $tax }} </p> --}}
                                        {{-- <h5 class="total-amount"> {{ $currency }}{{ $subtotal }} --}}
                                        </h5>
                                    </div>
                                </div>
                                <br>
                                <hr>
                            </div>
                        </div>
                    @empty
                        <p
                            style="text-align: center; padding-top: 10px; padding-bottom: 10px; color: #fdc040; border: 20px;">
                            No
                            product in your cart!</p>
                    @endforelse



                    {{-- Total calculation for All shopping --}}
                    <div>
                        <h5 class="mb-30 pl-2">Total Amount:</h5>
                    </div>

                    <div class="row checkout-total ">

                        <div class="col-6 calculate-total">
                            <p class="">Subtotal:</p>
                            <p class="">Shipping Fee:</p>
                            <p class="">Tax:</p>
                            @if (session('totalAfterDiscount'))
                                <p>Promo Discount</p>
                            @endif
                            <h5 class="">Total:</h5>
                        </div>

                        @php
                            $tax = taxCalculator($grandSubtotal) ?? 0;
                        @endphp

                        <div class="col-6 calculate">
                            <p class="total-amount"> {{ $currency }}{{ $grandSubtotal }} </p>
                            <p class="total-amount"> {{ $currency }}{{ $shipping }} </p>
                            <p class="total-amount"> {{ $currency }}{{ $tax }} </p>
                            @if (session('totalAfterDiscount'))
                                <p class="total-amount discount">{{ $currency }}{{ session('discountAmount') }}</p>
                                <h5 class="total-amount grandTotal">
                                    {{ $currency }}{{ $shipping + $tax + $grandSubtotal - session('discountAmount') }}
                                </h5>
                            @else
                                {{-- <p class="total-amount discount">{{ $currency }}{{ session('discountAmount') }}</p> --}}
                                <h5 class="total-amount grandTotal">
                                    {{ $currency }}{{ $shipping + $tax + $grandSubtotal - session('discountAmount') }}
                                </h5>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 mb-100" style="margin-top:7%;" id="newCheckoutProducts">

                </div>
            </div>
        </div>
    </div>
    <div id="newCheckoutdiv"></div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $("#promoCode").click(function(event) {
                event.preventDefault();
                var promoId = $('#promoId').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: "{{ route('promo.code') }}",
                    type: 'post',
                    data: {
                        code: promoId,
                    },
                    success: function(response) {
                        if (response == '1') {
                            $('#promoError').html(
                                '<div class="alert alert-danger">Invalid promo code !</div>'
                            );
                            return;
                        }
                        if (response == '4') {
                            $('#promoError').html(
                                '<div class="alert alert-danger">Please enter your promo code</div>'
                            );
                            return;
                        }
                        if (response == '0') {
                            $('#promoError').html(
                                '<div class="alert alert-danger">No cart found</div>');
                            return;
                        }
                        if (response == '2') {
                            $('#promoError').html(
                                '<div class="alert alert-danger">Buy more products to get discount</div>'
                            );
                            return;
                        } else {
                            $('#promoError').html(
                                '<div class="alert alert-success">Promo code applied successfully</div>'
                            );
                            $('#oldCheckoutProducts').hide();
                            $('#newCheckoutProducts').html(response);
                        }

                    }
                });
            });

        });
    </script>


    <script>
        // function doit(id) {
        //     document.getElementById("paymentMethod").value = id;
        // }

        // function submit() {
        //     document.getElementById('BillingForm').submit();
        // }

        // onload function to check any address found or not

        function checkAddress() {

            let noAdd = document.getElementById('noAddress');
            let check = document.getElementById('infoCheck');
            let error = document.getElementsByName('error');
            let radioBtn = document.getElementsByName('address1');



            if (noAdd || error) {
                $('#shipping-form').show();
                check.checked = true;
            } else {

                check.checked = true;
                $('#shipping-form').hide();
            }
        }

        function showDiv(check) {

            let radioBtn = document.getElementsByName('address1');
            if (check.checked) {
                //shipForm.style.display = "block";
                $('#shipping-form').show();
                for (i = 0; i <= radioBtn.length; i++) {

                    radioBtn[i].checked = false;
                }

            } else {
                $('#shipping-form').hide();
                //document.getElementById('shipping-form').style.display = "none";
                for (i = 0; i <= radioBtn.length; i++) {

                    radioBtn[i].checked = false;
                }
            }

        }


        function submitForm() {

            //let fromSubmitBtn = document.getElementById('checkOutBtn');
            let addressHiddenId = document.getElementById('addressId');

            let payHiddenId = document.getElementById('paymentMethod');
            let valueFromPayMethod = document.getElementsByName('payment_method');
            // let valueFromRadio = document.getElementById('addressRadioBtn').value;
            let billForm = document.getElementById('BillingForm');
            let radioBtn = document.getElementsByName('address1');
            let check = document.getElementById('infoCheck');
            let radioDiv = document.getElementById('radioDiv');


            for (i = 0; i <= valueFromPayMethod.length; i++) {
                if (valueFromPayMethod[i].checked) {
                    let payValue = valueFromPayMethod[i].value;
                    if (radioDiv) {

                        for (j = 0; j <= radioBtn.length; j++) {
                            if (radioBtn[j].checked) {
                                addressHiddenId.value = radioBtn[j].value;
                                payHiddenId.value = payValue;
                                billForm.submit();
                            } else {
                                if (check.checked) {

                                    payHiddenId.value = payValue;
                                    billForm.submit();
                                } else {
                                    //alert("abcd");
                                    document.getElementById('error').style.display = "block";
                                }

                            }
                        }

                    } else {

                        if (check.checked) {

                            payHiddenId.value = payValue;
                            billForm.submit();
                        } else {

                            document.getElementById('error').style.display = "block";
                        }
                    }

                }
            }

        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //alert('starting');
            //$('#shipping-form').hide();

            // var sessionErrors = '{{ session()->has('errors') }}';

            // if (sessionErrors) {
            //     alert(sessionErrors)
            //     $('#shipping-form').show();
            // }

            $('.checkaddress').each(function() {
                var $this = $(this);
                $this.on('click', function() {
                    var addressId = $this.val();
                    //alert(addressId);
                    fireAjax(addressId, 1)
                });
            });

            $('#zip-code').on('keyup', function() {
                var address = $('#address').val();
                var state = $('#state').val();
                var city = $('#city').val();

                if (address == '' && city == '') {
                    alert('Please enter address and city first');
                }

                addressInfo = address + ' ' + state + ' ' + city;
                //alert(addressInfo);
                fireAjax(addressInfo)
            });
        });

        function fireAjax(address, id = 0) {
            $.ajax({
                method: 'GET',
                url: "{!! route('ajax.shipping.calculation') !!}",
                type: 'get',
                data: {
                    address: address,
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    $('#oldCheckoutProducts').hide();
                    $('#newCheckoutProducts').html(response);
                    //$('#app').html(response);
                }
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#infoCheck").prop("checked", true);
            $('.checkaddress').each(function() {
                $(this).on('click', function() {
                    $("#infoCheck").prop("checked", false);
                    $('#shipping-form').hide();
                });
            });

            // this code is For Cart price rendering.
            $(document).on('click', '.cart-cross', function() {
                checkoutRender();
            });

            // this code is For Cart price rendering.
            function checkoutRender() {
                var checkoutUrl = "{{ route('checkout') }}";
                if (window.location.href == checkoutUrl) {
                    $.ajax({
                        method: 'GET',
                        url: checkoutUrl,
                        success: function(result) {
                            $('#oldCheckoutdiv').empty();
                            $('#newCheckoutdiv').html(result);
                            console.log(result);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                };
            };


        });
    </script>
@endpush

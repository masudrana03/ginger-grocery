@extends('frontend.layouts.app')
@section('title', 'Checkout')

<style>
    span.checkout-quantity{
     position: absolute;
     background-color:#3BB77E;
     width: 25px;
     border-radius: 15px;
     text-align: center;
     color: white;
     top:1px;
     right:4px; 
    }
   .calculate-total{
       left:20px;
   }
  
   .calculate-total p{
       padding-bottom:3px;
   }
  
   /* .checkout-total{
       display: flex;
       justify-content: flex-end;
   } */
  
  
   .calculate{
      text-align: right;
      padding-left:50px;
   }
  
   
  
   .calculate p{
      padding-bottom:3px;
   }
  
   .product-name p{
      font-size: 1em;
      
   }
  
  /* .form-group{
      height: 2%;
      padding-bottom:60px;
  } */
  
  .form-group input {
      background: #fff;
      border: 1px solid #ececec;
      height:  50px !important;
      -webkit-box-shadow: none;
      box-shadow: none;
      padding-left: 10px;
      font-size: 13px !important;
      width: 100%;
  }
  
  .custom-select{
      font-size: 13px !important;
  }
  
  .form-group textarea{
      font-size: 13px !important;
  }
  
  .checkout-button{
      padding-bottom:20px;
  }
  
  .form-check{
      margin-left:30px;
      
  }
  
  .checkout-products-marketplace{
      margin-bottom: -2.2%;
  }
  
  textarea { 
      min-height: 138px !important;
  }
  
  li.list-group-item {
     padding:2px;
  }
  
  .pri{
      text-align: right;
      margin-top: 19px;
     
  }
  
   
  </style>

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
                <div class="row mb-50">
                </div>
                <div class="row mb-80">
                    <h4 class="mb-30">Shipping Details</h4>
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
                                    <select disabled class="form-control select-active @error('country_id') is-invalid @enderror"
                                        name="country_id">
                                        <option value="">Select a country...</option>
                                        @foreach ($countries as $country)
                                            <option {{ settings('country') == $country->name ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
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
                                    <input required="" type="text" name="city" placeholder="City / Town *"
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
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="zip" placeholder="Postcode / ZIP *"
                                    class="@error('zip') is-invalid @enderror">
                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
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

                        <div class="form-group">
                            <textarea style="min-height: 80px" rows="3" placeholder="Additional information"></textarea>
                        </div>

                        <div>
                            <h5 class="mb-30 pl-2">Payment Method:</h5>
                        </div>

                        <div class="checkout-products-marketplace" style="margin-bottom:1%;">
                            <ul class="list-group">
                                @foreach ($paymentMethods as $paymentMethod)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="{{ $paymentMethod->id }}"
                                                name="payment_method_id" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{ $paymentMethod->provider == 'stripe' ? 'Bank Transfer' :  'Cash on Delivery (COD)' }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="checkout-button" style="float: right; padding-top:15px;">
                            <button class="btn">Checkout</button>
                        </div>

                        {{-- <div class="ship_detail">
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
                            </div> --}}
                    </form>
                </div>


            </div>

            {{-- Checkout new page added --}}


            <div class="col-lg-5 mb-100" style="margin-top:7%;">

                <div class=" p-2 bg-light">
                    <p class="font-weight-bold mb-0">Product(s):</p>
                </div>
                @php
                    $grandSubtotal = 0;
                    $grandTotal = 0;
                    $grandTax = 0;
                    $grandShipping = 0;
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
                                    src="{{ asset('assets/img/uploads/stores/' . $store->image) }}" alt="Global Office"
                                    class="img-fluid rounded" width="30">
                                <span>{{ $store->name }}</span>
                            </div>
                            @php
                                $subtotal = 0;
                                $total = 0;
                                $tax = priceCalculator($product)['tax'] ?? 0;
                                $shipping = 0;
                            @endphp
                            <div class="p-2">
                                @foreach ($product as $item)
                                    @php
                                        $subtotal += $item->price;
                                        $grandSubtotal += $item->price;
                                    @endphp
                                    <div class="row cart-item mb-3">
                                        <div class="col-3" style="width: 14%">
                                            <div class="checkout-product-img-wrapper product-details">
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
                                            <p class="pri">{{ $currency }} {{ $item->price }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            @php
                                $shipping = shippingCalculator($subtotal, $store->id);
                                $grandShipping += $shipping;
                                $grandTax += $tax;
                            @endphp
                            <div class="row checkout-total ">
                                <div class="col-6 calculate-total">
                                    <p class="">Subtotal:</p>
                                    <p class="">Shipping Fee:</p>
                                    <p class="">Tex:</p>
                                    <h5 class="">Total:</h5>
                                </div>

                                <div class="col-6 calculate">
                                    <p class=""> {{ $currency }}{{ $subtotal }} </p>
                                    <p class=""> {{ $currency }}{{ $shipping }} </p>
                                    <p class=""> {{ $currency }}{{ $tax }} </p>
                                    <h5 class=""> {{ $currency }}{{ $subtotal + $shipping + $tax }}
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <hr>
                        </div>
                    </div>
                @empty
                    <p>No product in your cart!</p>
                @endforelse

                {{-- product2 --}}

                {{-- <div class="checkout-products-marketplace" id="shipping-method-wrapper">
                    <div class="mt-2 bg-light mb-2">

                        <div class="p-2" style="background:#cdf0e0" ;>
                            <img style="vertical-align: middle;" src="https://nest.botble.com/storage/stores/2.png"
                                alt="Global Office" class="img-fluid rounded" width="30">
                            <span>Shop Name</span>
                        </div>

                        <div class="p-2">
                            <div class="row cart-item">

                                <div class="col-3" style="width: 14%">
                                    <div class="checkout-product-img-wrapper product-details">
                                        <img class="item-thumb img-thumbnail img-rounded"
                                            src="https://nest.botble.com/storage/products/3-150x150.jpg"
                                            alt="Angie’s Boomchickapop Sweet &amp; Salty Kettle Corn">
                                        <span class="checkout-quantity">1</span>
                                    </div>
                                </div>


                                <div class="col-5 product-name" style="margin-top:2%">
                                    <p class="mb-0">Product b</p>
                                    <p class="mb-0">
                                        (Boxes: 4 Boxes, Weight: 4KG)
                                    </p>
                                </div>


                                <div class="col-4 text-end product-name price " style="margin-top:2%;">
                                    <p>$110.67</p>
                                </div>

                            </div>


                            <div class="row cart-item mt-3">

                                <div class="col-3" style="width: 14%">
                                    <div class="checkout-product-img-wrapper product-details">
                                        <img class="item-thumb img-thumbnail img-rounded"
                                            src="https://nest.botble.com/storage/products/3-150x150.jpg"
                                            alt="Angie’s Boomchickapop Sweet &amp; Salty Kettle Corn">
                                        <span class="checkout-quantity">1</span>
                                    </div>
                                </div>


                                <div class="col-5 product-name" style="margin-top:2%">
                                    <p class="mb-0">Product b</p>
                                    <p class="mb-0">
                                        <small>(Boxes: 4 Boxes, Weight: 4KG)</small>
                                    </p>
                                </div>


                                <div class="col-4 text-end product-name price" style="margin-top:2%; ">
                                    <p>$110.67</p>
                                </div>


                            </div>

                        </div>
                        <hr>

                        <div class="row checkout-total ">

                            <div class="col-6 calculate-total">
                                <p class="">Subtotal:</p>
                                <p class="">Shipping Fee:</p>
                                <p class="">Tex:</p>
                                <h5 class="">Total:</h5>
                            </div>

                            <div class="col-6 calculate">
                                <p class=""> $4785 </p>
                                <p class=""> $524 </p>
                                <p class=""> $758 </p>
                                <h5 class=""> $12453</h5>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                </div> --}}

                {{-- product-3 --}}


                {{-- <div class="checkout-products-marketplace" id="shipping-method-wrapper">
                    <div class="mt-2 bg-light mb-2">

                        <div class="p-2" style="background:#cdf0e0" ;>
                            <img style="vertical-align: middle;" src="https://nest.botble.com/storage/stores/2.png"
                                alt="Global Office" class="img-fluid rounded" width="30">
                            <span>Shop Name</span>
                        </div>

                        <div class="p-2">
                            <div class="row cart-item">

                                <div class="col-3" style="width: 14%">
                                    <div class="checkout-product-img-wrapper product-details">
                                        <img class="item-thumb img-thumbnail img-rounded"
                                            src="https://nest.botble.com/storage/products/3-150x150.jpg"
                                            alt="Angie’s Boomchickapop Sweet &amp; Salty Kettle Corn">
                                        <span class="checkout-quantity">1</span>
                                    </div>
                                </div>


                                <div class="col-5 product-name" style="margin-top:2%">
                                    <p class="mb-0">Product b</p>
                                    <p class="mb-0">
                                        (Boxes: 4 Boxes, Weight: 4KG)
                                    </p>
                                </div>


                                <div class="col-4 text-end product-name price " style="margin-top:2%;">
                                    <p>$110.67</p>
                                </div>

                            </div>


                            <div class="row cart-item mt-3">

                                <div class="col-3" style="width: 14%">
                                    <div class="checkout-product-img-wrapper product-details">
                                        <img class="item-thumb img-thumbnail img-rounded"
                                            src="https://nest.botble.com/storage/products/3-150x150.jpg"
                                            alt="Angie’s Boomchickapop Sweet &amp; Salty Kettle Corn">
                                        <span class="checkout-quantity">1</span>
                                    </div>
                                </div>


                                <div class="col-5 product-name" style="margin-top:2%">
                                    <p class="mb-0">Product b</p>
                                    <p class="mb-0">
                                        <small>(Boxes: 4 Boxes, Weight: 4KG)</small>
                                    </p>
                                </div>


                                <div class="col-4 text-end product-name price" style="margin-top:2%; ">
                                    <p>$110.67</p>
                                </div>


                            </div>

                        </div>
                        <hr>

                        <div class="row checkout-total ">
                            <div class="col-6 calculate-total">
                                <p class="">Subtotal:</p>
                                <p class="">Shipping Fee:</p>
                                <p class="">Tex:</p>
                                <h5 class="">Total:</h5>
                            </div>

                            <div class="col-6 calculate">
                                <p class=""> $4785 </p>
                                <p class=""> $524 </p>
                                <p class=""> $758 </p>
                                <h5 class=""> $6752</h5>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                </div> --}}


                {{-- Total calculation for All shopping --}}
                <div>
                    <h5 class="mb-30 pl-2">Total Amount:</h5>
                </div>
                <div class="row checkout-total ">

                    <div class="col-6 calculate-total">
                        <p class="">Subtotal:</p>
                        <p class="">Shipping Fee:</p>
                        <p class="">Tex:</p>
                        <h5 class="">Total:</h5>
                    </div>

                    <div class="col-6 calculate">
                        <p class=""> {{ $currency }}{{ $grandSubtotal }} </p>
                        <p class=""> {{ $currency }}{{ $grandShipping }} </p>
                        <p class=""> {{ $currency }}{{ $grandTax }} </p>
                        <h5 class="">{{ $currency }}{{ $grandShipping + $grandTax + $grandSubtotal }}
                        </h5>
                    </div>
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
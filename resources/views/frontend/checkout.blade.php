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
  


 



  

</style>

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
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

                        {{-- <form method="post" action="/apply-promo" class="apply-coupon">
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
                        </form> --}}
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

            {{-- Checkout new page added --}}

            <div class="col-lg-5" style="margin-top:7%;">

              <div class=" p-2 bg-light">
                <p class="font-weight-bold mb-0">Product(s):</p>
              </div>

              <div class="checkout-products-marketplace" id="shipping-method-wrapper">
                 <div class="mt-2 bg-light mb-2">

                    <div class="p-2" style="background:#cdf0e0";>
                        <img style="vertical-align: middle;" src="https://nest.botble.com/storage/stores/2.png" alt="Global Office" class="img-fluid rounded" width="30">
                        <span>Shop Name</span>
                    </div>
                           
                    <div class="p-2">
                        <div class="row cart-item" >

                            <div class="col-3" style="width: 14%">
                                <div class="checkout-product-img-wrapper product-details">
                                   <img class="item-thumb img-thumbnail img-rounded" src="https://nest.botble.com/storage/products/3-150x150.jpg" alt="Angie’s Boomchickapop Sweet &amp; Salty Kettle Corn">
                                   <span class="checkout-quantity">1</span>
                                </div>
                            </div>


                            <div class="col-5" style="margin-top:2%">
                              <p class="mb-0">Product b</p>
                              <p class="mb-0">
                                 <small>(Boxes: 4 Boxes, Weight: 4KG)</small>
                              </p>
                            </div>


                            <div class="col-4 text-end " style="margin-top:2%">
                               <p>$110.67</p>
                            </div>

                        </div>
                        <hr> 

                        <div class="row cart-item">

                            <div class="col-3" style="width: 14%">
                                <div class="checkout-product-img-wrapper product-details">
                                   <img class="item-thumb img-thumbnail img-rounded" src="https://nest.botble.com/storage/products/3-150x150.jpg" alt="Angie’s Boomchickapop Sweet &amp; Salty Kettle Corn">
                                   <span class="checkout-quantity">1</span>
                                </div>
                            </div>


                            <div class="col-5" style="margin-top:2%">
                              <p class="mb-0">Product b</p>
                              <p class="mb-0">
                                 <small>(Boxes: 4 Boxes, Weight: 4KG)</small>
                              </p>
                            </div>


                            <div class="col-4 text-end" style="margin-top:2%">
                               <p>$110.67</p>
                            </div>


                        </div>
                         
                    </div>
                    <hr> 
                    
                    <div class="row">
                       <div class="col-3">
                            <h6>
                                 Subtotal:
                            </h6>
                       </div>

                       <div class="col-3">
                           <h6>
                               Amount
                           </h6>
                       </div>
                    </div>

               </div>
                <hr>

                {{-- <div class="shipping-method-wrapper p-3">
                   <div class="payment-checkout-form">
                        <div class="mx-0">
                        <h6>Shipping method:</h6>
                        </div>   
                   </div>
               </div> --}}



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

<div class=" p-2 bg-light">
    <p class="font-weight-bold mb-0">Product(s)sss:</p>
</div>
@php
$grandSubtotal = 0;
$grandTotal = 0;
$currency = settings('currency');
@endphp
@forelse (auth()->user()->cart ? auth()->user()->cart->products->groupBy('store_id') : [] as $key => $product)
    <div class="checkout-products-marketplace" id="shipping-method-wrapper">
        <div class="mt-2 bg-light mb-2">
            @php
                $store = \App\Models\Store::find($key);
            @endphp
            <div class="p-2" style="background:#cdf0e0" ;>
                <img style="vertical-align: middle;" src="{{ asset('assets/img/uploads/stores/' . $store->image) }}"
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
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}" alt="" />
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
            <div class="row checkout-total ">
                <div class="col-6 calculate-total">
                    <p class="">Total:</p>
                    {{-- <p class="">Shipping Fee:</p> --}}
                    <p class="">Tax:</p>
                    {{-- <h5 class="">Total:</h5> --}}
                </div>

                <div class="col-6 calculate">
                    <p class="total-amount"> {{ $currency }}{{ $subtotal }} </p>
                    {{-- <p class="total-amount"> {{ $currency }}{{ $shipping }} </p> --}}
                    {{-- <p class="total-amount"> {{ $currency }}{{ $tax }} </p> --}}
                    {{-- <h5 class="total-amount"> {{ $currency }}{{ $subtotal }}
                    </h5> --}}
                </div>
            </div>
            <br>
            <hr>
        </div>
    </div>
@empty
    <p>No product in your cart!</p>
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
        <h5 class="">Total:</h5>
    </div>

    @php
        $shipping = shippingCalculator($subtotal, $shippingAddress) ?? 0;
        $tax = taxCalculator($grandSubtotal) ?? 0;
    @endphp

    <div class="col-6 calculate">
        <p class="total-amount"> {{ $currency }}{{ $grandSubtotal }} </p>
        <p class="total-amount"> {{ $currency }} {{ $shipping }}
        </p>
        <p class="total-amount"> {{ $currency }}{{ taxCalculator($grandSubtotal) ?? 0 }} </p>
        <h5 class="total-amount">{{ $currency }}{{ $shipping + $tax + $grandSubtotal }}
        </h5>
    </div>
</div>

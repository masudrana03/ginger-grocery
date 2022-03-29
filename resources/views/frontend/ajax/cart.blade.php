

<style>
    .btn-cart {
        background-color: #3BB77E;
        width: 100%;
        height: 40px;
        text-align: center;
        color: #fff;
        border-radius: 5px;


    }

    .btn-cart:hover {
        background-color: #fdc040;
    }

    .qty {
        height: 40px;
        width: 100%;
        border: 1px #3BB77E solid;
        text-align: center;
        font-size: 13px;
        background-color: transparent;
    }

    #td-padding-top {
        padding-top: 4%;
        padding-left: 1.5%;

    }

    .product-name a:hover {
        text-decoration: none;

    }

    .btn-cart:hover {
        background-color: #fdc040;
    }

    .qty {
        height: 40px;
        width: 100%;
        border: 1px #3BB77E solid;
        text-align: center;
        font-size: 13px;
        background-color: transparent;

    }

</style>

<div class="header-action-icon-2" >
    <a class="mini-cart-icon" href="{{ route('cart') }}">
        <img alt="Nest" src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
        <span
            class="pro-count blue">{{ auth()->user() && auth()->user()->cart? auth()->user()->cart->products()->count(): 0 }}</span>
    </a>
    <a href="{{ route('cart') }}"><span class="lable">Cart</span></a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @php
                $total = 0;
                $currency_symbol = '$';
            @endphp
            @forelse ((auth()->user()->cart->products) ?? [] as $product)
                <li>
                    <div class="shopping-cart-img">
                        <a href="{{ route('products', $product->id) }}">

                            @if ( $product->featured_image )
                                <img src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image)  }}"
                                    alt="" />

                            @else

                                <img alt="Nest" src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" />
                            @endif

                        </a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a
                                href="{{ route('products', $product->slug) }}">{{ ucwords(strtolower(Str::limit($product->name, 18))) }}</a>
                        </h4>
                        <h4><span>{{ $product->quantity }} ×
                            </span>{{ settings('currency') }}{{ $product->discount_price }}
                        </h4>
                    </div>
                    <div class="shopping-cart-delete del-cart">
                        <a class="d-cart" href="{{ route('cart.remove', $product->id) }}"><i
                                class="fi-rs-cross-small"></i></a>
                        <small class="del-product-id" style="display: none;">{{ $product->id }}</small>
                    </div>
                </li>
                @php
                    $total += $product->quantity * $product->price;
                    $currency_symbol = settings('currency');
                @endphp
            @empty
                <li>

                    <div class="shopping-cart-title">
                        <h4>No Items</h4>
                    </div>

                </li>
            @endforelse
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>{{ $currency_symbol }}{{ $total }}</span>
                </h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{ route('cart') }}" class="outline">View cart</a>
                <a href="{{ route('checkout') }}">Checkout</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".del-cart .d-cart").on('click', function(event) {
            event.preventDefault();
            deleteCart(event.target);
        });
    });

    function deleteCart(node) {
        var closest_div = $(node).closest('.del-cart');
        var id = closest_div.find('.del-product-id').text();
        deleteFromCartById(id);
    }

    function deleteFromCartById(id) {
        var pid = id;
        var url = "{!! route('cart.remove', ':id') !!}";
        url = url.replace(':id', pid);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pid,

            },
            success: function(result) {
                $('#old-cart').empty();
                $('#new-cart').html(result);
            },
            error: function(error) {
                console.log(error);
            }
        });

        var url2 = "{!! route('cart.remove.div', ':id') !!}";
        url2 = url2.replace(':id', pid);
        $.ajax({
            method: 'GET',
            url: url2,
            data: {
                id: pid,

            },
            success: function(result) {
                $('#old-div').empty();
                $('#new-div').html(result);

            },
            error: function(error) {
              console.log(error);
            }
        });
    }



</script>

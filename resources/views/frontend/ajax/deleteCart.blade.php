<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{route('cart')}}">
        <img alt="Nest" src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}" />
        <span class="pro-count blue">{{ auth()->user() && auth()->user()->cart ? auth()->user()->cart->products()->count() : 0 }}</span>
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

                            @if (count($product->images) > 0)

                                <img src="{{ asset( 'assets/img/uploads/products/' . $product->images()->first()->image) }}" alt="" />

                            @else

                                <img alt="Nest" src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" />

                            @endif

                        </a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a
                                href="{{ route('products', $product->id) }}">{{ ucwords(strtolower(Str::limit($product->name, 18 ))) }}</a>
                        </h4>
                        <h4><span>{{ $product->quantity }} ×
                            </span>{{ settings('currency') }}{{ $product->price }}
                        </h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="{{ route('cart.remove', $product->id) }}"><i class="fi-rs-cross-small"></i></a>
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
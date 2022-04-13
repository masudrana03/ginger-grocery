<div class="icon-bar" id="side-bar">
    <a href="#" class="facebook"><img alt="Nest"
            src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}"></a>
    <span>{{ $total }} items</span>
    <h6 style="color:#000">{{ settings('currency') }} {{ $subtotal+$tax }}</h6>
</div>

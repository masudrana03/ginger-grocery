
<div id="wishlistProductOld">

    <div class="header-action-icon-2">
        <a href="#">
            <img class="svgInject" alt="Nest"
                src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart.svg') }}" />
            <span
                class="pro-count blue">{{ auth()->user() && auth()->user()->savedProducts
                    ? auth()->user()->savedProducts->count()
                    : 0 }}</span>
        </a>
        <a href="{{ route('wishlist.index') }}"><span
                class="lable">Wishlist</span></a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @forelse( auth()->user()->savedProducts ?? [] as $wishlistProduct )
                    <li>
                        <div class="shopping-cart-img">
                            <a href="{{ route('products', $wishlistProduct->id) }}">
                                @if ( $wishlistProduct->featured_image )

                                    <img src="{{ asset('assets/img/uploads/products/featured/' . $wishlistProduct->featured_image ) }}" alt="" />

                                @else

                                    <img alt="Nest" src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" />

                                @endif
                            </a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a
                                    href="{{ route('products', $wishlistProduct->slug) }}">{{ ucwords(strtolower(Str::limit($wishlistProduct->name, 18 ))) }}</a>
                            </h4>
                            <h4>{{ settings('currency') }} {{ $wishlistProduct->price }}
                            </h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a class="wishlist-btn-delete" href="#" data-id="{{ $wishlistProduct->id }}"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                @empty
                    <li>

                        <div class="shopping-cart-title">
                            <h4>No Items</h4>
                        </div>

                    </li>
                @endforelse
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-button">
                    <a href="{{ route('wishlist.index') }}" class="outline">View
                        Wishlist</a>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="wishlistProductNew"></div>


<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".wishlist-btn-delete").click(function(event) {
            event.preventDefault();

        var id = $(this).attr("data-id");
        var url = "{!! route('wishlist.remove', ':id') !!}";
        url = url.replace(':id', id);

            $.ajax({
                method: 'GET',
                url: url,
                data: {
                    id: id,
                },
                success: function(result) {
                    $('#wishlistProductOld').empty();
                    $('#wishlistProductNew').html(result);
                    tata.success('Success!', 'Product removed from compare list.');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

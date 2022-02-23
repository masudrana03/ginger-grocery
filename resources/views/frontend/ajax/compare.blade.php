@php
    $productIds = cache('compareProducts');
    $compareProduct = App\Models\Product::find($productIds) ?? [];
@endphp
<div class="header-action-icon-2">
    <a href="#">
        <img class="svgInject" alt="Nest"
            src="{{ asset('assets/frontend/imgs/theme/icons/icon-compare.svg') }}" />
        <span class="pro-count blue">{{ count($compareProduct) }}</span>
    </a>
    <a href="{{ route('compare') }}"><span class="lable ml-0">Compare</span></a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @forelse( $compareProduct as $product )
                <li>
                    <div class="shopping-cart-img">

                        @if (count($product->images) > 0)

                            <img src="{{ asset( 'assets/img/uploads/products/' . $product->images()->first()->image) }}" alt="" />

                        @else

                            <img alt="Nest" src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" />

                        @endif

                    </div>
                    <div class="shopping-cart-title">
                        <h4><a
                                href="{{ route('products', $product->id) }}">{{ ucwords(strtolower(Str::limit($product->name, 18 ))) }}</a>
                        </h4>
                        <h4>{{ settings('currency') }}{{ $product->price }}
                        </h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a class="compare-btn-delete" href="#" data-id="{{ $product->id }}"><i class="fi-rs-cross-small"></i></a>
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
                <a href="{{ route('compare') }}" class="outline">View
                    Compare</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".compare-btn-delete").click(function(event) {
            event.preventDefault();
    
        var route = "{{ request()->route()->getName() }}";
    
        if (route == 'compare') {
            var id = $(this).attr("data-id");
        var url = "{!! route('removeCompareProduct', ':id') !!}";
        url = url.replace(':id', id);
            $.ajax({
                method: 'GET',
                url: url,
                data: {
                    id: id,
                },
                success: function(result) {
                    $('#compareProductOld').empty();
                    $('#compareProductNew').html(result);
                    tata.success('Success!', 'Product removed from compare list.');
                },
                error: function(error) {
                    console.log(error);
                }
            });
    
            $.ajax({
                method: 'GET',
                url: "{!! route('removeCompareProduct2') !!}",
                success: function(result) {
                    $('#compareProductsOld').empty();
                    $('#compareProductsNew').html(result);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            var id = $(this).attr("data-id");
            var url = "{!! route('removeCompareProduct', ':id') !!}";
            url = url.replace(':id', id);
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        id: id,
                    },
                    success: function(result) {
                        $('#compareProductOld').empty();
                        $('#compareProductNew').html(result);
                        tata.success('Success!', 'Product removed from compare list.');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    });
    </script>

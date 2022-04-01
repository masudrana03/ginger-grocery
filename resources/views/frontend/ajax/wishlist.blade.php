
<div id="oldWishlistProductTable">
    <div class="col-xl-10 col-lg-12 m-auto">
        <div class="mb-50">
            <h1 class="heading-2 mb-10">Your Wishlist</h1>
            <h6 class="text-body">There are <span class="text-brand">{{ count($wishlistProducts) }}</span>
                products in this list</h6>
        </div>
        <div class="table-responsive shopping-summery">
            <table class="table table-wishlist">
                <thead>
                    <tr class="main-heading">
                        <th class="custome-checkbox start pl-30">Image</th>
                        <th scope="col" colspan="1">Product</th>
                        <th scope="col" style="padding-left: 2%;">Price</th>
                        <th scope="col">Stock Status</th>
                        <th scope="col" style="padding-left: 2%;">Action</th>
                        <th scope="col" class="end">Remove</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($wishlistProducts as $item)
                        <tr class="pt-10">
                            <td class="image product-thumbnail pt-10" style="padding-left: 1%;">
                                @if ( $item->featured_image )
                                    <img class="default-img"
                                        src="{{ asset('assets/img/uploads/products/featured/' . $item->featured_image) }}"
                                        alt="" />
                                @else
                                    <img class="default-img"
                                        src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}" alt="" />
                                @endif
                            </td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10"
                                        href="{{ route('products', $item->slug) }}">{{ $item->name }}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: {{ $item->rating * 20 }}%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ({{ round($item->rating, 1) }})</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price" style="padding-left: 1%;">

                                @if ($item->discountable)
                                    <h4 class="text-brand">
                                        {{ settings('currency') }}{{ $item->discount_price }}</h4>
                                @else
                                    <h4 class="text-brand">{{ settings('currency') }}{{ $item->price }}</h4>
                                    </span>
                                @endif
                            </td>
                            <td class="text-left detail-info" data-title="Stock">
                                <span class="stock-status in-stock mb-0"> In Stock </span>
                            </td>
                            <td class="text-left" data-title="Cart">
                                {{-- <a class="btn btn-sm" href="{{ route('cartById', $item->id) }}">Add to cart</a> --}}

                                <div class="add-cart">
                                    <input type="hidden" id="product-id" name="product_id"
                                        value="{{ $item->id }}">
                                    <a class="add btn btn-sm" id="cart-btn" href="#" style=""><i
                                            class="fi-rs-shopping-cart mr-5"></i>Add to cart </a>
                                    <small class="product-id"
                                        style="display: none;">{{ $item->id }}</small>
                                    <input style="display: none;" name="product_id" value="{{ $item->id }}">

                                </div>

                            </td>
                            <td class="action text-left" data-title="Remove">
                                <a style="padding-left: 20%;" class="text-body wishlist-btn-delete" href="#" data-id="{{ $item->id }}"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr class="pt-30">
                            <td class="image product-thumbnail pt-40"
                                style="left: 32%; text-align: center; position: relative;">
                                <h4 class="text-brand" style="color: #fdc040 !important;">No Product Found</h4>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="#" class="text-body"><i class=""></i></a>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="newWishlistProductTable"></div>




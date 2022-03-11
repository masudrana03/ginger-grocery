<div class="row product-grid">
    @forelse ($categoryWise as $product)
        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
            <div class="product-cart-wrap mb-30">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <a href="{{ route('products', $product->slug) }}">
                            @if ( $product->featured_image )
                                <img class="default-img"
                                    src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image) }}"
                                    alt="" />
                                <img class="hover-img"
                                    src="{{ asset('assets/img/uploads/products/featured/' . $product->featured_image) }}"
                                    alt="" />
                            @else
                                <img class="default-img"
                                    src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}" alt="" />
                                <img class="hover-img"
                                    src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}" alt="" />
                            @endif
                        </a>
                    </div>
                    <div class="product-action-1">
                        <a aria-label="Add To Wishlist" class="action-btn"
                            href="{{ route('wishlist', $product->id) }}"><i class="fi-rs-heart"></i></a>
                        <a aria-label="Compare" data-id="{{ $product->id }}" class="action-btn compare-btn"
                            href="{{ route('compareProduct', $product->id) }}"><i class="fi-rs-shuffle"></i></a>
                        {{-- <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a> --}}
                    </div>
                    <div class="product-badges product-badges-position product-badges-mrg">
                        {{-- <span class="hot">Hot</span> --}}
                    </div>
                </div>
                <div class="product-content-wrap">
                    <div class="product-category">
                        <a href="{{ route('categories', $category->slug) }}">{{ $category->name }}</a>
                    </div>
                    <h2><a
                            href="{{ route('products', $product->slug) }}">{{ ucwords(strtolower(Str::limit($product->name, 25))) }}</a>
                    </h2>
                    <div class="product-rate-cover">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: {{ $product->rating * 20 }}%">
                            </div>
                        </div>
                        <span class="font-small ml-5 text-muted">
                            ({{ round($product->rating, 1) }})
                        </span>
                    </div>
                    <div>
                        <span class="font-small text-muted">By <a
                                href="{{ route('vendor.details', $product->store->slug) }}">{{ $product->store->name }}</a></span>
                        {{-- <span class="font-small text-muted">By <a
                                    href="{{ route('shop.product', $product->id) }}">{{ $product->store->name }}</a></span> --}}

                    </div>
                    <div class="product-card-bottom">
                        <div class="product-price">
                            <span class="">{{ settings('currency') }}{{ $product->discount_price }}
                            </span>
                            @if ($product->discountable)
                                <span
                                    class="old-price">{{ settings('currency') }}{{ $product->price }}</span>
                            @endif
                        </div>
                        <div class="add-cart">
                            <input type="hidden" id="product-id" name="product_id" value="{{ $product->id }}">
                            <a class="add" id="cart-btn" href="#" style=""><i
                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                            <small class="product-id" style="display: none;">{{ $product->id }}</small>
                            <input style="display: none;" name="product_id" value="{{ $product->id }}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
    <!--end product card-->
</div>

<!--product grid-->
<div id="pagination" class="pagination-area mt-20 mb-20">

    {{ $categoryWise->links() }}
</div>


<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".add-cart .add").on('click', function(event) {
            event.preventDefault();

            addCart(event.target);
        });
    });

    function addCart(node) {
        var closest_div = $(node).closest('.add-cart');
        var id = closest_div.find('.product-id').text();
        addToCartById(id);
    }

    function addToCartById(id) {
        var pid = id;
        var url = "{!! route('cartById', ':id') !!}";
        url = url.replace(':id', pid);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: pid,
                quantity:1,

            },
            success: function(result) {
                $('#old-cart').empty();
                $('#new-cart').html(result);
                //tata.success('Success!', 'Product added to your cart.');
            },
            error: function(error) {
                if (error.status == 401) {
                    window.location.href = "/login";
                }
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $(".compare-btn").click(function(event) {
            event.preventDefault();
            var id = $(this).attr("data-id");
            var url = "{!! route('compareProduct', ':id') !!}";
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
                    //tata.success('Success!', 'Product added to compare list.');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".compare-btn-delete").click(function(event) {
            event.preventDefault();

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
                    //tata.success('Success!', 'Product removed from compare list.');
                },
                error: function(error) {
                    console.log(error);
                }
            });
            $.ajax({
                method: 'GET',
                url: "{!! route('removeCompareProduct2') !!}",
                success: function(result) {
                    console.log(result);
                    $('#compareProductsOld').empty();
                    $('#compareProductsNew').html(result);
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });
    });
</script>

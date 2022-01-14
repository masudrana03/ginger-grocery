@extends('frontend.layouts.app')
@section('title', 'Product Wishlist')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span> Wishlist </span>
        </div>
    </div>
</div>
<div class="container mb-30 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="mb-50">
                <h1 class="heading-2 mb-10">Your Wishlist</h1>
                <h6 class="text-body">There are <span class="text-brand">{{ count($wishlistProducts) }}</span> products in this list</h6>
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
                        @forelse ( $wishlistProducts as $item )
                        <tr class="pt-10">
                            <td class="image product-thumbnail pt-10" style="padding-left: 1%;">
                                @if (count($item->images) > 0)
                                    <img class="default-img"
                                        src="{{ asset('assets/img/uploads/products/' . $item->images()->first()->image) }}"
                                        alt="" />
                                @else
                                    <img class="default-img"
                                        src="{{ asset('assets/frontend/imgs/shop/product-2-2.jpg') }}"
                                        alt="" />
                                @endif
                            </td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="{{ route('products', $item->id) }}">{{$item->name}}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h3 class="text-brand">{{$item->currency->symbol}}{{$item->price}}</h3>
                            </td>
                            <td class="text-left detail-info" data-title="Stock">
                                <span class="stock-status in-stock mb-0"> In Stock </span>
                            </td>
                            <td class="text-left" data-title="Cart">
                                <a class="btn btn-sm" href="{{ route('cartById', $item->id) }}">Add to cart</a>
                            </td>
                            <td class="action text-left" data-title="Remove">
                                <a style="padding-left: 20%;" href="{{route('wishlist.remove', $item->id)}}" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr class="pt-30">
                            <td class="image product-thumbnail pt-40" style="left: 32%; text-align: center; position: relative;">
                            <h4 class="text-brand" style="color: #fdc040 !important;" >No Product Found</h4>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="#" class="text-body"><i class=""></i></a>
                            </td>
                        </tr>
                        @endforelse
                        {{-- <tr class="pt-30">
                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                <label class="form-check-label" for="exampleCheckbox1"></label>
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="#">Field Roast Chao Cheese Creamy Original</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h3 class="text-brand">$2.51</h3>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <span class="stock-status in-stock mb-0"> In Stock </span>
                            </td>
                            <td class="text-right" data-title="Cart">
                                <button class="btn btn-sm">Add to cart</button>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr> --}}
                        {{-- <tr>
                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                                <label class="form-check-label" for="exampleCheckbox2"></label>
                            </td>
                            <td class="image product-thumbnail"><img src="assets/imgs/shop/product-2-1.jpg" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="#">Blue Diamond Almonds Lightly Salted</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h3 class="text-brand">$3.2</h3>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <span class="stock-status in-stock mb-0"> In Stock </span>
                            </td>
                            <td class="text-right" data-title="Cart">
                                <button class="btn btn-sm">Add to cart</button>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                                <label class="form-check-label" for="exampleCheckbox3"></label>
                            </td>
                            <td class="image product-thumbnail"><img src="assets/imgs/shop/product-3-1.jpg" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="#">Fresh Organic Mustard Leaves Bell Pepper</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h3 class="text-brand">$2.43</h3>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <span class="stock-status in-stock mb-0"> In Stock </span>
                            </td>
                            <td class="text-right" data-title="Cart">
                                <button class="btn btn-sm">Add to cart</button>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr> --}}
                        {{-- <tr>
                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox4" value="" />
                                <label class="form-check-label" for="exampleCheckbox4"></label>
                            </td>
                            <td class="image product-thumbnail"><img src="{{ asset('assets/frontend/imgs/shop/product-4-1.jpg') }}" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="#">Demo Product </a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h3 class="text-brand">$3.21</h3>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <span class="stock-status out-stock mb-0"> Out Stock </span>
                            </td>
                            <td class="text-right" data-title="Cart">
                                <button class="btn btn-sm btn-secondary">Contact Us</button>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr> --}}
                        {{-- <tr>
                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox5" value="" />
                                <label class="form-check-label" for="exampleCheckbox5"></label>
                            </td>
                            <td class="image product-thumbnail"><img src="assets/imgs/shop/product-5-1.jpg" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="#">Foster Farms Takeout Crispy Classic</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h3 class="text-brand">$3.17</h3>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <span class="stock-status in-stock mb-0"> In Stock </span>
                            </td>
                            <td class="text-right" data-title="Cart">
                                <button class="btn btn-sm">Add to cart</button>
                            </td>
                            <td class="action text-center" data-title="Remove">
                                <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






@endsection

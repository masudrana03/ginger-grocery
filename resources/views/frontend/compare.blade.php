@extends('frontend.layouts.app')
@section('title', 'Product Compare')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Shop <span></span> Compare
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <h1 class="heading-2 mb-10">Products Compare</h1>
            <h6 class="text-body mb-40">There are <span class="text-brand">3</span> products to compare</h6>
            <div class="table-responsive">
                <table class="table text-center table-compare">
                    <tbody>
                        <tr class="pr_image">
                            <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
                            <td class="row_img"><img src="{{ asset('assets/frontend/imgs/shop/product-2-1.jpg') }}" alt="compare-img" /></td>
                            <td class="row_img"><img src="{{ asset('assets/frontend/imgs/shop/product-1-1.jpg') }}" alt="compare-img" /></td>
                            {{-- <td class="row_img"><img src="{{ asset('assets/frontend/imgs/shop/product-3-1.jpg') }}" alt="compare-img" /></td> --}}
                        </tr>
                        <tr class="pr_title">
                            <td class="text-muted font-sm fw-600 font-heading">Name</td>
                            @foreach ($compareProduct as $product)
                            <td class="product_name">
                                <h6><a href="{{route('products', $product->id)}}" class="text-heading">{{$product->name}} - {{$product->store->name}}</a></h6>
                            </td>
                            @endforeach
                        </tr>
                        <tr class="pr_price">
                            <td class="text-muted font-sm fw-600 font-heading">Price</td>
                            @foreach ($compareProduct as $product)

                            <td class="product_price">
                                <h4 class="price text-brand">{{$product->currency->symbol}}{{$product->price}}</h4>
                            </td>
                            @endforeach
                        </tr>
                        <tr class="description">
                            <td class="text-muted font-sm fw-600 font-heading">Excerpt</td>
                            @foreach ($compareProduct as $product)
                            <td class="row_text font-xs">
                                <p class="font-sm text-muted">{{$product->excerpt}}</p>
                            </td>
                            @endforeach
                        </tr>
                        {{-- <tr class="pr_stock">
                            <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                            <td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td>
                            <td class="row_stock"><span class="stock-status out-stock mb-0">Out of stock</span></td>
                            <td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td>
                        </tr> --}}
                        <tr class="pr_weight">
                            <td class="text-muted font-sm fw-600 font-heading">Calories Per Serving</td>
                            @foreach ($compareProduct as $product)
                            <td class="row_weight">{{($product->calories_per_serving) ?? '0'}} Cal</td>
                            @endforeach
                        </tr>
                        <tr class="pr_weight">
                            <td class="text-muted font-sm fw-600 font-heading">Fat Calories Per Serving</td>
                            @foreach ($compareProduct as $product)
                            <td class="row_weight">{{($product->fat_calories_per_serving) ?? '0'}} Cal</td>
                            @endforeach
                        </tr>
                        <tr class="pr_dimensions">
                            <td class="text-muted font-sm fw-600 font-heading">Nutrition</td>
                            @foreach ($compareProduct as $product)
                            <td class="row_dimensions">
                                @foreach ($product->nutritions as $p )
                                <span>{{$p->name}}</span>,
                                @endforeach
                            </td>
                            @endforeach
                        </tr>
                        {{-- <tr class="pr_add_to_cart">
                            <td class="text-muted font-sm fw-600 font-heading">Buy now</td>
                            <td class="row_btn">
                                <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                            </td>
                            <td class="row_btn">
                                <button class="btn btn-sm btn-secondary"><i class="fi-rs-headset mr-5"></i>Contact Us</button>
                            </td>
                            <td class="row_btn">
                                <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                            </td>
                        </tr> --}}
                        <tr class="pr_remove text-muted">
                            <td class="text-muted font-md fw-600"></td>
                            <td class="row_remove">
                                <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                            </td>
                            <td class="row_remove">
                                <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                            </td>
                            {{-- <td class="row_remove">
                                <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

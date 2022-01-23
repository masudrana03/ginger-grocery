@extends('frontend.layouts.app')
@section('title', $product->name)



@section('content')

<style>
    .rating-s {
      top: -12px;
      display: flex;
      width: 100%;
      justify-content: flex-end;;
      overflow: hidden;
      flex-direction: row-reverse;
      height: 40px;
      position: relative;
    }

    .rating-0 {
      filter: grayscale(100%);
    }

    .rating-s > input {
      display: none;
    }

    .rating-s > label {
      cursor: pointer;
      width: 40px;
      height: 40px;
      margin-top: auto;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: center;
      background-size: 76%;
      transition: .3s;
    }

    .rating-s > input:checked ~ label,
    .rating-s > input:checked ~ label ~ label {
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
    }


    #rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
    #rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
    #rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
    #rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
    #rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }


    .comments-area .comment-list .single-comment:hover{
        transform: translateY(-0px);
        transition: 0s;
    }
    </style>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="{{route('categories', $product->category->id)}}">{{$product->category->name}}</a> <span></span> {{$product->name}}
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                {{-- <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-2.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-1.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-3.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-4.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-5.jpg') }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/frontend/imgs/shop/product-16-6.jpg') }}" alt="product image" />
                                </figure> --}}

                                @foreach ($product->images as $item)
                                <figure class="border-radius-10">
                                    <img src="{{ asset('assets/img/uploads/products/'.$item ->image) }}" alt="product image" />
                                </figure>
                                @endforeach

                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                {{-- <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}" alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-4.jpg') }}" alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-5.jpg') }}" alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-6.jpg') }}" alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-7.jpg') }}" alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-8.jpg') }}" alt="product image" /></div>
                                <div><img src="{{ asset('assets/frontend/imgs/shop/thumbnail-9.jpg') }}" alt="product image" /></div> --}}
                                @foreach ($product->images as $item)
                                <figure class="border-radius-10">
                                    <div><img src="{{ asset('assets/img/uploads/products/thumbnail/'.$item ->image) }}" alt="product image" /></div>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            {{-- <span class="stock-status out-stock"> Sale Off </span> --}}
                            <h2 class="title-detail">{{$product->name}}</h2>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        @php
                                           $productRatingCount = $productsRating->whereIn('product_id' ,$product->id)->sum('rating');
                                           $productRatingUser = $product->ratings->count();
                                           $productRatingAll = $product->ratings;
                                           $productRatingTotal = $productsRating->whereIn('product_id' ,$product->id)->count();
                                           $productRatingGrandTotal = $productRatingUser == 0 ? 0 : $productRatingCount/$productRatingUser;
                                        @endphp

                                        <div class="product-rating" style="width: {{ $productRatingGrandTotal*20 }}%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ({{ $productRatingTotal }} reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">{{ settings('currency') }}{{$product->price}}</span>
                                    {{-- <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span> --}}
                                </div>
                            </div>
                            <div class="short-desc mb-30">
                                <p class="font-lg">{{$product->excerpt}}</p>
                            </div>
                            {{-- <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Size / Weight: </strong>
                                <ul class="list-filter size-filter font-small">
                                    <li><a href="#">50g</a></li>
                                    <li class="active"><a href="#">60g</a></li>
                                    <li><a href="#">80g</a></li>
                                    <li><a href="#">100g</a></li>
                                    <li><a href="#">150g</a></li>
                                </ul>
                            </div> --}}
                            <div class="detail-extralink mb-50">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button  class="button button-add-to-cart" href="{{ route('cartById', $product->id) }}" ><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="{{ route('wishlist', $product->id) }}"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="{{ route('compare', $product->id) }}"><i class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>
                            {{-- <div class="font-xs">
                                <ul class="mr-50 float-start">
                                    <li class="mb-5">Type: <span class="text-brand">Organic</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                    <li>LIFE: <span class="text-brand">70 days</span></li>
                                </ul>
                                <ul class="float-start">
                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Snack</a>, <a href="#" rel="tag">Organic</a>, <a href="#" rel="tag">Brown</a></li>
                                    <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
                                </ul>
                            </div> --}}
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="product-info">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ $productRatingTotal }})</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            <div class="tab-pane fade show active" id="Description">
                                <div class="">
                                    {{$product->description}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Additional-info">
                                <table class="font-md">
                                    <tbody>
                                        <tr class="stand-up">
                                            <th>Stand Up</th>
                                            <td>
                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-wo-wheels">
                                            <th>Folded (w/o wheels)</th>
                                            <td>
                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-w-wheels">
                                            <th>Folded (w/ wheels)</th>
                                            <td>
                                                <p>32.5″L x 24″W x 18.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="door-pass-through">
                                            <th>Door Pass Through</th>
                                            <td>
                                                <p>24</p>
                                            </td>
                                        </tr>
                                        <tr class="frame">
                                            <th>Frame</th>
                                            <td>
                                                <p>Aluminum</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-wo-wheels">
                                            <th>Weight (w/o wheels)</th>
                                            <td>
                                                <p>20 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-capacity">
                                            <th>Weight Capacity</th>
                                            <td>
                                                <p>60 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="width">
                                            <th>Width</th>
                                            <td>
                                                <p>24″</p>
                                            </td>
                                        </tr>
                                        <tr class="handle-height-ground-to-handle">
                                            <th>Handle height (ground to handle)</th>
                                            <td>
                                                <p>37-45″</p>
                                            </td>
                                        </tr>
                                        <tr class="wheels">
                                            <th>Wheels</th>
                                            <td>
                                                <p>12″ air / wide track slick tread</p>
                                            </td>
                                        </tr>
                                        <tr class="seat-back-height">
                                            <th>Seat back height</th>
                                            <td>
                                                <p>21.5″</p>
                                            </td>
                                        </tr>
                                        <tr class="head-room-inside-canopy">
                                            <th>Head room (inside canopy)</th>
                                            <td>
                                                <p>25″</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_color">
                                            <th>Color</th>
                                            <td>
                                                <p>Black, Blue, Red, White</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_size">
                                            <th>Size</th>
                                            <td>
                                                <p>M, S</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="Vendor-info">
                                <div class="vendor-logo d-flex mb-30">
                                    <img src="{{ asset('assets/img/uploads/stores/'.$product->store->image) }}" alt="" style="max-width:40px;" />
                                    <div class="vendor-name ml-15">
                                        <h6>
                                            <a href="{{ route('vendor.details', $product->store->id) }}">{{ $product->store->name }}</a>
                                            @php
                                              $vendorRating      =  $product->store->rating;
                                              $vendorToralRating =  $product->store->totalRating;

                                            @endphp
                                        </h6>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ $vendorToralRating*20 }}%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ $productRatingTotal }} reviews )</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="contact-infor mb-50">
                                    <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-location.svg') }}" alt="" /><strong>Address: </strong> <span>{{ $product->store->address }}, {{ $product->store->state }}, {{ $product->store->city }}, {{ $product->store->zip }}, {{ ucwords(strtolower($product->store->country->name )) }}</span></li>
                                    <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Contact Seller:</strong><span> {{ $product->store->phone }}</span></li>
                                </ul>
                                <div class="d-flex mb-55">
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Rating</p>
                                        <h4 class="mb-0">92%</h4>
                                    </div>
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Ship on time</p>
                                        <h4 class="mb-0">100%</h4>
                                    </div>
                                    <div>
                                        <p class="text-brand font-xs">Chat response</p>
                                        <h4 class="mb-0">89%</h4>
                                    </div>
                                </div>
                                <p>{{ $product->store->description }}</p>
                            </div>
                            <div class="tab-pane fade" id="Reviews">
                                <!--Comments-->
                                <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">

                                                @forelse ( $productsRating->whereIn('product_id' ,$product->id) as $rating )
                                                    <div class="single-comment justify-content-between d-flex mb-30">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="{{ asset('assets/frontend/imgs/blog/author-2.png') }}" alt="" />
                                                                <a class="text-center" href="#" class="font-heading text-brand" >{{ $rating->user->name }}</a>
                                                            </div>

                                                            <div class="desc">
                                                                <div class="d-flex justify-content-between mb-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="font-xs text-muted">{{ $rating->created_at->diffForHumans() }}</span>
                                                                    </div>
                                                                    <div class="product-rate d-inline-block d-flex" style="position: absolute; left: 87%;">
                                                                        <div class="product-rating" style="width: {{ $rating->rating*2 }}0%"></div>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-10">{{ $rating->comment }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty

                                                @endforelse



                                                {{-- <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="{{ asset('assets/frontend/imgs/blog/author-3.png') }}" alt="" />
                                                            <a href="#" class="font-heading text-brand">Brenna</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="{{ asset('assets/frontend/imgs/blog/author-4.png') }}" alt="" />
                                                            <a href="#" class="font-heading text-brand">Gemma</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width: {{ $productRatingGrandTotal*20 }}%"></div>
                                                </div>
                                                <h6>{{ round($productRatingGrandTotal, 1) }} out of 5</h6>
                                            </div>
                                            <div class="progress">
                                                <span>5 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{ ($productRatingAll->where('rating','=',5)->count())*10 }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{ ($productRatingAll->where('rating','=',5)->count())*10 }}%</div>
                                            </div>

                                            <div class="progress">
                                                <span>4 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{ ($productRatingAll->where('rating','=',4)->count())*10 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ ($productRatingAll->where('rating','=',4)->count())*10 }}%</div>
                                            </div>
                                            <div class="progress">
                                                <span>3 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{ ($productRatingAll->where('rating','=',3)->count())*10 }}%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">{{ ($productRatingAll->where('rating','=',3)->count())*10 }}%</div>
                                            </div>
                                            <div class="progress">
                                                <span>2 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{ ($productRatingAll->where('rating','=',2)->count())*10 }}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">{{ ($productRatingAll->where('rating','=',2)->count())*10 }}%</div>
                                            </div>
                                            <div class="progress mb-30">
                                                <span>1 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{ ($productRatingAll->where('rating','=',1)->count())*10 }}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">{{ ($productRatingAll->where('rating','=',1)->count())*10 }}%</div>
                                            </div>
                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->
                                <div class="comment-form">
                                    <form class="form-contact comment_form"  action="{{ route('product.rating', $product->id) }}" method="post">
                                        @csrf
                                        <h4 class="mb-15" style ="padding-left: 10px;">Add a review</h4>
                                        <div class="rating-s">
                                            <input type="radio" name="rating" id="rating-5" onclick="addValue(5)">
                                            <label for="rating-5"></label>,
                                            <input type="radio" name="rating" id="rating-4" onclick="addValue(4)">
                                            <label for="rating-4"></label>
                                            <input type="radio" name="rating" id="rating-3" onclick="addValue(3)">
                                            <label for="rating-3"></label>
                                            <input type="radio" name="rating" id="rating-2" onclick="addValue(2)">
                                            <label for="rating-2"></label>
                                            <input type="radio" name="rating" id="rating-1" onclick="addValue(1)">
                                            <label for="rating-1"></label>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input type="hidden" name="rating" id="rating" >
                                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button button-contactForm">Submit Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-12">
                        <h2 class="section-title style-1 mb-30">Related products</h2>
                    </div>
                    <div class="col-12">
                        <div class="row related-products">
                            @forelse ($product->category->products()->take(4)->get() as $product)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('products', $product->id)}}" tabindex="0">
                                                <img class="default-img" src="{{ asset('assets/img/uploads/products/' . $product->images()->first()->image) }}" alt="" />
                                                <img class="hover-img" src="{{ asset('assets/img/uploads/products/' . $product->images()->first()->image) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            {{-- <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a> --}}
                                            <a aria-label="Add To Wishlist" href="{{ route('wishlist', $product->id) }}" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" href="{{ route('compare', $product->id) }}" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div> --}}
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{route('products', $product->id)}}" tabindex="0">{{$product->name}}</a></h2>
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 50%"></div>
                                        </div>

                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="{{route('vendor.details',$product->store->id) }}" >{{ $product->store->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{ settings('currency') }}{{ $product->price }}</span>
                                                {{-- <span class="old-price">$32.8</span> --}}
                                            </div>
                                            <div class="add-cart">
                                                <a class="add"
                                                    href="{{ route('cartById', $product->id) }}" style=""><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addValue(value) {
        $('#rating').val(value);
    }
</script>

@endsection






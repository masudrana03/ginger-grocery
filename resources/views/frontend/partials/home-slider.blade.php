<section class="home-slider position-relative mb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 d-none d-lg-flex">
                <div class="categories-dropdown-wrap style-2 font-heading mt-30">
                    <div class="d-flex categori-dropdown-inner">
                        <ul>

                            @forelse ( $categories->skip(0)->take(12) as $category )
                                <li>
                                    <a href="{{ route('categories', $category->slug) }}">

                                        @if ($category->image)

                                            <img src="{{ asset('assets/img/uploads/categories/' . $category->image) }}"
                                                alt="" />

                                        @else

                                            <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                alt="" />

                                        @endif
                                        {{-- <img src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}"alt="" /> --}}
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <a href="#"> <img
                                            src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                            alt="" />Clothing & beauty</a>
                                </li>
                            @endforelse




                            {{-- <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}" alt="" />Milks and Dairies</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}" alt="" />Clothing & beauty</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-3.svg') }}" alt="" />Pet Foods & Toy</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-4.svg') }}" alt="" />Baking material</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-5.svg') }}" alt="" />Fresh Fruit</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-6.svg') }}" alt="" />Wines & Drinks</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-7.svg') }}" alt="" />Fresh Seafood</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-8.svg') }}" alt="" />Fast food</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-9.svg') }}" alt="" />Vegetables</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-10.svg') }}" alt="" />Bread and Juice</a>
                            </li>
                            <li>
                                <a href="#"> <img src="{{ asset('assets/frontend/imgs/theme/icons/category-3.svg') }}" alt="" />Pet Foods & Toy</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="more_slide_open" style="display: none">
                        <div class="d-flex categori-dropdown-inner">
                            <ul>
                                @forelse ( $categories->skip(12) as $category )
                                    <li>
                                        <a href="{{ route('categories', $category->slug) }}">

                                            @if ($category->image)

                                                <img src="{{ asset('assets/img/uploads/categories/' . $category->image) }}"
                                                    alt="" />

                                            @else

                                                <img src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                    alt="" />

                                            @endif
                                            {{-- <img src="{{ asset('assets/frontend/imgs/theme/icons/category-1.svg') }}"alt="" /> --}}
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @empty
                                    <li>
                                        <a href="#"> <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons/category-2.svg') }}"
                                                alt="" />Clothing & beauty</a>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show
                            more...</span></div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-5 dot-style-1 dot-style-1-position-2">
                        @forelse ( $sliders as $slider )
                            <div class="single-hero-slider single-animation-wrap"
                                style="background-image: url({{ asset('assets/img/uploads/banners/' . $slider->image) }})">
                                <div class="slider-content">
                                    <h1 class="display-2"
                                        style="font-size: 36px!important; margin-bottom: 22px !important;">
                                        {{ $slider->title }}
                                    </h1>
                                    <p class="" style="font-size: 22px; margin-bottom: 40px !important;">
                                        {{ $slider->body }}</p>
                                    <form class="form-subcriber d-flex">
                                        <input type="email" placeholder="Your emaill address" />
                                        <button class="btn" type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="single-hero-slider single-animation-wrap"
                                style="background-image: url({{ asset('assets/frontend/imgs/slider/slider-8.png') }})">
                                <div class="slider-content">
                                    <h1 class="display-2 mb-40">
                                        Fresh Vegetables<br />
                                        Big discount
                                    </h1>
                                    <p class="mb-65">Save up to 50% off on your first order</p>
                                    <form class="form-subcriber d-flex">
                                        <input type="email" placeholder="Your emaill address" />
                                        <button class="btn" type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    @php
                        $actonRightOne = $callToActions->find(1);
                        $actonRightTwo = $callToActions->find(2);
                    @endphp
                    <div class="col-md-6 col-lg-12">
                        <div class="banner-img style-4 mt-30">
                            <img src="{{ asset('assets/img/uploads/actions/' . $actonRightOne->image) }}" alt="" />
                            <div class="banner-text">
                                <h4 class="mb-30">
                                    {{ $actonRightOne->action_tittle }}
                                </h4>
                                <a href="{{ route('vendor.details', $actonRightOne->store_id) }}"
                                    class="btn btn-xs mb-50">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="banner-img style-5 mt-5 mt-md-30">
                            <img src="{{ asset('assets/img/uploads/actions/' . $actonRightTwo->image) }}" alt="" />
                            <div class="banner-text" style="padding: 0px 70px!important; text-align: right;">
                                <h5 class="mb-20">
                                    {{ $actonRightTwo->action_tittle }}
                                </h5>
                                <a href="{{ route('vendor.details', $actonRightTwo->store_id) }}"
                                    class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End hero slider-->

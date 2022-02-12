<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') | {{ config('app.name', 'GroceFusion') }}</title>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/img/uploads/settings/favicon/' . settings('favicon')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font_awesome/css/all.min.css') }}" />

    {{-- bootstrap cdn link --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- datepicker jquery link -->
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> --}}
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}

    <!-- Template CSS -->

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css?v=3.2') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- datetime picker jquery --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link src="{{ asset('assets/tata_toster/index.js') }}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/select2.min.css')}}">

    <style>
        .tata-title,
        .tata-text {
            color: #fff !important;
        }

        .tata.success {
            background: #29A56C !important;
        }

        /* .material-icons{
            color: #FDC040!important;
        } */

    </style>

</head>

<body onload="checkAddress()">
    @include('frontend.partials.nav')
    <div id="app">


        @yield('content')
    </div>
    <footer class="main">
        <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
            <div class="container">
                @php
                    $actonFooter = $callToActions->find(6);
                @endphp
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative newsletter-inner">
                            <div class="newsletter-content">
                                <div class="row">
                                    <div class="col-5">
                                        <h2 class="mb-20">
                                            {{ $actonFooter->action_tittle }}
                                            {{-- {!!nl2br($actonFooter->action_tittle)!!}
                                            {!! nl2br(e($actonFooter->action_tittle))!!}. --}}
                                        </h2>
                                    </div>
                                </div>

                                <p class="mb-45">Start You'r Daily Shopping with <span
                                        class="text-brand">Binary Fusion</span></p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                            {{-- <img src="{{ asset('assets/frontend/imgs/banner/banner-9.png') }}" alt="newsletter" /> --}}
                            <img src="{{ asset('assets/img/uploads/actions/' . $actonFooter->image) }}"
                                alt="newsletter" />
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                            data-wow-delay="0">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-1.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Best prices & offers</h3>
                                <p>Orders $50 or more</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                            data-wow-delay=".1s">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-2.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Free delivery</h3>
                                <p>24/7 amazing services</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                            data-wow-delay=".2s">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-3.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Great daily deal</h3>
                                <p>When you sign up</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                            data-wow-delay=".3s">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-4.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Wide assortment</h3>
                                <p>Mega Discounts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                            data-wow-delay=".4s">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-5.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Easy returns</h3>
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                            data-wow-delay=".5s">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-6.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Safe delivery</h3>
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                            data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href="{{ url('/') }}" class="mb-15"><img style="width: 215px;"
                                        src="{{ asset('assets/img/uploads/settings/logo/' . settings('logo')) }}"
                                        alt="logo" /></a>
                                <p class="font-lg text-heading">Awesome grocery store website template</p>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-location.svg') }}"
                                        alt="" /><strong>Address: </strong> <span>{{ settings('company_address') }},
                                        {{ settings('city') }}, {{ settings('zip') }},
                                        {{ settings('country') }}</span></li>
                                <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-contact.svg') }}"
                                        alt="" /><strong>Call Us:</strong><span>(+88) -
                                        {{ settings('phone') }}</span></li>
                                <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-email-2.svg') }}"
                                        alt="" /><strong>Email:</strong><span> {{ settings('email') }}</span></li>
                                <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-clock.svg') }}"
                                        alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="widget-title">Company</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="#">Support Center</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="widget-title">Account</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            {{-- <li><a href="#">Sign In</a></li>
                            <li><a href="{{route('cart')}}">View Cart</a></li>
                            <li><a href="{{ route('wishlist.index') }}">My Wishlist</a></li>
                            <li><a href="">Track My Order</a></li>
                            <li><a href="#">Help Ticket</a></li>
                            <li><a href="#">Shipping Details</a></li>
                            <li><a href="{{route('compare')}}">Compare products</a></li> --}}

                            {{-- code from safin --}}

                            @if (auth()->user())
                                <li><a href="{{ route('user.dashboard') }} ">My Account</a></li>
                                <li><a href="{{ route('cart') }} ">View Cart</a></li>
                                <li><a href="{{ route('wishlist.index') }} ">Wishlist</a></li>
                                <li><a href="{{ route('compare') }} ">Compare products</a></li>
                                <li><a href="{{ route('user.track.orders') }}">Order Tracking</a></li>
                                <li><a href="#">Help Ticket</a></li>
                                <li><a href="#">Shipping Details</a></li>

                            @else
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="{{ route('cart') }}">View Cart</a></li>
                                <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                <li><a href="{{ route('compare') }}">Compare products</a></li>
                                <li><a href="{{ route('login') }}">Order Tracking</a></li>
                                <li><a href="#">Help Ticket</a></li>
                                <li><a href="#">Shipping Details</a></li>
                            @endif


                        </ul>
                    </div>

                    <!--

                     <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="widget-title">Corporate</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ route('login') }}">Become a Vendor</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Farm Business</a></li>
                            <li><a href="#">Farm Careers</a></li>
                            <li><a href="#">Our Suppliers</a></li>
                            <li><a href="#">Accessibility</a></li>
                            <li><a href="#">Promotions</a></li>
                        </ul>
                     </div>

                    -->

                    <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <h4 class="widget-title">Popular</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Milk & Flavoured Milk</a></li>
                            <li><a href="#">Butter and Margarine</a></li>
                            <li><a href="#">Eggs Substitutes</a></li>
                            <li><a href="#">Marmalades</a></li>
                            <li><a href="#">Sour Cream and Dips</a></li>
                            <li><a href="#">Tea & Kombucha</a></li>
                            <li><a href="#">Cheese</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                        data-wow-delay=".5s">
                        <h4 class="widget-title">Install App</h4>
                        <p class="">From App Store or Google Play</p>
                        <div class="download-app">
                            <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                                    src="{{ asset('assets/frontend/imgs/theme/app-store.jpg') }}" alt="" /></a>
                            <a href="#" class="hover-up mb-sm-2"><img
                                    src="{{ asset('assets/frontend/imgs/theme/google-play.jpg') }}" alt="" /></a>
                        </div>
                        <p class="mb-20">Secured Payment Gateways</p>
                        <img class=""
                            src="{{ asset('assets/frontend/imgs/theme/payment-method.png') }}" alt="" />
                    </div>
                </div>
        </section>
        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy;<?php echo date('Y'); ?> <strong class="text-brand">Binary
                            Fusion</strong> - All rights reserved</p>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                        <p>{{ settings('hot_number') }}<span>Working 8:00 - 22:00</span></p>
                    </div>
                    <div class="hotline d-lg-inline-flex">
                        <img src="{{ asset('assets/frontend/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                        <p>{{ settings('hot_number') }}<span>24/7 Support Center</span></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="https://www.facebook.com/binaryfusion"><img
                                src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img
                                src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img
                                src="{{ asset('assets/frontend/imgs/theme/icons/icon-pinterest-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-youtube-white.svg') }}"
                                alt="" /></a>
                    </div>
                    <p class="font-sm">Up to 15% discount on your first subscribe</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('assets/frontend/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    @stack('script')
    <script src="{{ asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/plugins/leaflet.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('assets/frontend/js/main.js?v=3.21') }}"></script>
    <script src="{{ asset('assets/frontend/js/shop.js?v=3.2') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/tata_toster/tata.js') }}"></script>

    <script>
        $(document).ready(function() {
            tata.success('Success!', 'Product added to your wishlist.');
            $('.select-two').select2();
        });
    </script>

    @if (session()->has('success'))
        <script>
            $(document).ready(function() {
                swal("Success!", "{{ session('success') }}", "success");
            })
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            $(document).ready(function() {
                swal("Ops!", "{{ session('error') }}", "error");
            })
        </script>
    @endif
    <script>
        let old_data = $('#app').html();
        let loading = `<section class="product-tabs section-padding position-relative">
     <div class="container">
     <div class="section-title style-2 wow animate__animated animate__fadeIn">
     <h3>Search Result . . .</h3>
     <p>loading . . .</p>
     </div>
     </div>
     </section>`;
        let category_id;
        $(function() {
            $('select').on('change', function() {
                category_id = $('#search-category-id').val();
            });

            $('#search-input').on('keyup', function() {
                let search = $('#search-input').val();
                if (search.length > 2) {
                    category_id = $('#search-category-id').val();
                    loadHome(search);
                    $('#app').html(loading);
                } else {
                    $('#app').html(old_data);
                }
            });
        });

        function loadHome(search, page = 1) {
            $.ajax({
                method: 'POST',
                url: "{!! route('index.part.ajax') !!}",
                data: {
                    search: search,
                    category_id: category_id,
                    page: page,
                },
                success: function(html) {
                    $('#app').html(html);

                    paginationClickEvent(search);

                    $('html, body').animate({
                        scrollTop: $("body").offset().top
                    }, 2000);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function paginationClickEvent(search) {
            $('.page-link').on('click', function(e) {
                e.preventDefault();
                let page = $(this).text();
                loadHome(search, page);
            });
        }
    </script>
    @yield('script')
</body>

</html>

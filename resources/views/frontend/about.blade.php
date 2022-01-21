@extends('frontend.layouts.app')
@section('title', 'About')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> About us 
        </div>
    </div>
</div>
<div class="page-content pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="row align-items-center mb-50">
                    <div class="col-lg-6">
                        <img src="{{ asset( 'assets/img/uploads/abouts/' .$about->main_section_image ) }}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                    </div>
                    <div class="col-lg-6">
                        <div class="pl-25">
                            <h2 class="mb-30">{{$about->main_section_tittle}}</h2>
                            <p class="mb-25">{!!$about->main_section_description!!}
                            <div class="carausel-3-columns-cover position-relative">
                                <div id="carausel-3-columns-arrows"></div>
                                <div class="carausel-3-columns" id="carausel-3-columns">
                                    @forelse ( $aboutImages as $aboutImage )
                                    <img src="{{ asset( 'assets/img/uploads/abouts/' .$aboutImage->image ) }}" alt="" />
                                    @empty
                                    <img src="{{ asset('assets/frontend/imgs/page/about-2.png') }}" alt="" />
                                    @endforelse
                                    {{-- <img src="{{ asset('assets/frontend/imgs/page/about-2.png') }}" alt="" /> --}}
                                    {{-- <img src="{{ asset('assets/frontend/imgs/page/about-3.png') }}" alt="" />
                                    <img src="{{ asset('assets/frontend/imgs/page/about-4.png') }}" alt="" />
                                    <img src="{{ asset('assets/frontend/imgs/page/about-2.png') }}" alt="" /> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="text-center mb-50">
                    <h2 class="title style-3 mb-40">What We Provide?</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-1.svg') }}" alt="" />
                                <h4>{{$aboutService->service_section_tittle1}}</h4>
                                <p>{{$aboutService->service_section_description1}}</p>
                                {{-- <a href="#">Read more</a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-2.svg') }}" alt="" />
                                <h4>{{$aboutService->service_section_tittle2}}</h4>
                                <p>{{$aboutService->service_section_description2}}</p>
                                {{-- <a href="#">Read more</a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-3.svg') }}" alt="" />
                                <h4>{{$aboutService->service_section_tittle3}}</h4>
                                <p>{{$aboutService->service_section_description3}}</p>
                                {{-- <a href="#">Read more</a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-4.svg') }}" alt="" />
                                <h4>{{$aboutService->service_section_tittle4}}</h4>
                                <p>{{$aboutService->service_section_description4}}</p>
                                {{-- <a href="#">Read more</a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-5.svg') }}" alt="" />
                                <h4>{{$aboutService->service_section_tittle5}}</h4>
                                <p>{{$aboutService->service_section_description5}}</p>
                                {{-- <a href="#">Read more</a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icon-6.svg') }}" alt="" />
                                <h4>{{$aboutService->service_section_tittle6}}</h4>
                                <p>{{$aboutService->service_section_description6}}</p>
                                {{-- <a href="#">Read more</a> --}}
                            </div>
                        </div>
                    </div>
                </section>
                <section class="row align-items-center mb-50">
                    <div class="row mb-50 align-items-center">
                        <div class="col-lg-7 pr-30">
                            <img src="{{ asset( 'assets/img/uploads/abouts/' .$about->section2_image1 ) }}" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" />
                        </div>
                        <div class="col-lg-5">
                            <h4 class="mb-20 text-muted">Our performance</h4>
                            <h1 class="heading-1 mb-40">{{ $about->section2_tittle }}</h1>
                            <p class="mb-30">{{ $about->section2_description }}</p>
                            {{-- <p>Pitatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia</p> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                            <h3 class="mb-30">Who we are</h3>
                            <p>{{ $about->who_description }}</p>
                        </div>
                        <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                            <h3 class="mb-30">Our history</h3>
                            <p>{{ $about->our_description }}</p>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="mb-30">Our mission</h3>
                            <p>{{ $about->mission_description }}</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="container mb-50 d-none d-md-block">
        <div class="row about-count">
            <div class="col-lg-1-5 col-md-6 text-center mb-lg-0 mb-md-5">
                <h1 class="heading-1"><span class="count">12</span>+</h1>
                <h4>Glorious years</h4>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><span class="count">36</span>+</h1>
                <h4>Happy clients</h4>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><span class="count">58</span>+</h1>
                <h4>Projects complete</h4>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><span class="count">24</span>+</h1>
                <h4>Team advisor</h4>
            </div>
            <div class="col-lg-1-5 text-center d-none d-lg-block">
                <h1 class="heading-1"><span class="count">26</span>+</h1>
                <h4>Products Sale</h4>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="mb-50">
                    <h2 class="title style-3 mb-40 text-center">Our Team</h2>
                    <div class="row">
                        <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                            <h6 class="mb-5 text-brand">Our Team</h6>
                            <h1 class="mb-30">Meet Our Expert Team</h1>
                            <p class="mb-30">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus.</p>
                            <p class="mb-30">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus.</p>
                            <a href="#" class="btn">View All Members</a>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="team-card">
                                        <img src="{{ asset('assets/frontend/imgs/page/about-6.png') }}" alt="" />
                                        <div class="content text-center">
                                            <h4 class="mb-5">Bulbul Ahmed</h4>
                                            <span>CEO & Founder</span>
                                            <div class="social-network mt-20">
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook-brand.svg') }}" alt="" /></a>
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter-brand.svg') }}" alt="" /></a>
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram-brand.svg') }}" alt="" /></a>
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-youtube-brand.svg') }}" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="team-card">
                                        <img src="{{ asset('assets/frontend/imgs/page/about-8.png') }}" alt="" />
                                        <div class="content text-center">
                                            <h4 class="mb-5">Christofar Nolan</h4>
                                            <span>Lead Engineer</span>
                                            <div class="social-network mt-20">
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook-brand.svg') }}" alt="" /></a>
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter-brand.svg') }}" alt="" /></a>
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram-brand.svg') }}" alt="" /></a>
                                                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-youtube-brand.svg') }}" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>



@endsection

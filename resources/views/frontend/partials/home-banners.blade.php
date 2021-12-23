<section class="banners mb-25">
    <div class="container">
        @php
        $actonBannerOne = $callToActions->find(3);
        $actonBannerTwo = $callToActions->find(4);
        $actonBannerThree = $callToActions->find(5);
        @endphp

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <img src="{{ asset( 'assets/img/uploads/actions/' .$actonBannerOne->image ) }}" alt="" />
                    <div class="banner-text">
                        <h4>
                            {{$actonBannerOne->action_tittle}}
                        </h4>
                        <a href="{{route('shop.product', $actonBannerOne->id)}}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <img src="{{ asset( 'assets/img/uploads/actions/' .$actonBannerTwo->image ) }}" alt="" />
                    <div class="banner-text">
                        <h4>
                            {{$actonBannerTwo->action_tittle}}
                        </h4>
                        <a href="{{route('shop.product', $actonBannerTwo->id)}}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-md-none d-lg-flex">
                <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <img src="{{ asset( 'assets/img/uploads/actions/' .$actonBannerThree->image ) }}" alt="" />
                    <div class="banner-text">
                        <h4>{{$actonBannerThree->action_tittle}}</h4>
                        <a href="{{route('shop.product', $actonBannerThree->id)}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End banners-->

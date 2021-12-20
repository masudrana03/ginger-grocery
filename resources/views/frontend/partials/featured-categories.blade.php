<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Featured Categories</h3>
                {{-- <ul class="list-inline nav nav-tabs links">
                    <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Cake & Milk</a></li>
                    <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Coffes & Teas</a></li>
                    <li class="list-inline-item nav-item"><a class="nav-link active" href="shop-grid-right.html">Pet Foods</a></li>
                    <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Vegetables</a></li>
                </ul> --}}
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @forelse ($categories as $category )
                <div class="card-2 bg-{{rand(9,15)}} wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="shop-grid-right.html"><img src="{{ asset('assets/frontend/imgs/shop/cat-13.png') }}" alt="" /></a>
                    </figure>
                    <h6><a href="shop-grid-right.html">{{$category->name}}</a></h6>
                    <span>{{$category->products()->count()}} items</span>
                </div>    
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
<!--End category slider-->
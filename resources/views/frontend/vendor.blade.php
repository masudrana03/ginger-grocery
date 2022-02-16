@extends('frontend.layouts.app')
@section('title', 'Vendor List')

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Vendors List
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="archive-header-2 text-center">
                <h1 class="display-2 mb-50">Vendors List</h1>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="sidebar-widget-2 widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search vendors (by name or ID)..." />
                                    <button type="submit"><i class="fi-rs-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-50">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We have <strong class="text-brand">{{ $stores->count() }}</strong> vendors now</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul class="sorting">

                                        <li><a class="sortById"
                                                href="{{ url('/vendor-list?numeric_sort=2') }}">50</a>
                                        </li>
                                        <li><a class="sortById"
                                                href="{{ url('/vendor-list?numeric_sort=3') }}">100</a>
                                        </li>
                                        <li><a class="sortById"
                                                href="{{ url('/vendor-list?numeric_sort=4') }}">150</a>
                                        </li>
                                        <li><a class="sortById"
                                                href="{{ url('/vendor-list?numeric_sort=5') }}">200</a>
                                        </li>
                                        <li><a class="sortById"
                                                href="{{ url('/vendor-list?numeric_sort=all') }}">All</a>
                                        </li>


                                        {{-- <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Mall</a></li>
                                        <li><a href="#">Featured</a></li>
                                        <li><a href="#">Preferred</a></li>
                                        <li><a href="#">Total items</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="oldSortDiv">

                <div class="row vendor-grid">
                    @forelse ($stores as $store)
                        <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                            <div class="vendor-wrap mb-40">
                                <div class="vendor-img-action-wrap">
                                    <div class="vendor-img">
                                        <a href="{{ route('vendor.details', $store->slug) }}">
                                            <img class="default-img"
                                                src="{{ asset('assets/img/uploads/stores/' . $store->image) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        {{-- <span class="hot">Mall</span> --}}
                                    </div>
                                </div>
                                <div class="vendor-content-wrap">
                                    <div class="d-flex justify-content-between align-items-end mb-30">
                                        <div>
                                            <div class="product-category">
                                                <span class="text-muted">Since {{ $store->established_at }}</span>
                                            </div>
                                            <h4 class="mb-5"><a
                                                    href="{{ route('vendor.details', $store->slug) }}">{{ $store->name }}</a>
                                            </h4>

                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating"
                                                        style="width: {{ $store->rating * 20 }}%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted">
                                                    ({{ round($store->rating, 1) }})
                                                </span>
                                            </div>
                                        </div>

                                        <div class="mb-10">
                                            <span class="font-small total-product">{{ $store->products->count() }}
                                                products</span>
                                        </div>
                                    </div>

                                    <div class="vendor-info mb-30">
                                        <ul class="contact-infor text-muted">
                                            <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-location.svg') }}"
                                                    alt="" /><strong>Address: </strong> <span>{{ $store->address }},<br>
                                                    {{ $store->city }} {{ $store->zip }}
                                                    {{ $store->country->name }}</span></li>
                                            <li><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-contact.svg') }}"
                                                    alt="" /><strong>Call Us:</strong><span> {{ $store->phone }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('vendor.details', $store->slug) }}" class="btn btn-xs">Visit
                                        Store <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 col-md-6 col-12 col-sm-6">
                            <div class="vendor-wrap mb-40">
                                <h1>No Vendor Found</h1>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div id="pagination" class="pagination-area mt-20 mb-20">
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul>
                    </nav> --}}
                    {{ $stores->links() }}
                </div>

            </div>

            <div id="newSortDiv"> </div>
        </div>
    </div>


@endsection


@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sortById').each(function() {
                var $this = $(this);
                $this.on('click', function() {
                    event.preventDefault();

                    var url = $this.attr('href');
                    $('.sortById').removeClass('active');
                    $this.addClass('active');

                    fireAjax(url);
                });

            });

            function fireAjax(url) {
                $.ajax({
                    method: 'GET',
                    url: url,
                    type: 'get',
                    success: function(response) {
                        console.log(response);
                        $('#oldSortDiv').empty();
                        $('#newSortDiv').html(response);
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // alert('hello Masud');

            $(document).on('click', '.page-item a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var url = "{{ url('/vendor-list?page=') }}" + page;

                $.ajax({
                    url: url,
                    success: function(response) {
                        console.log(response);
                        $('#oldSortDiv').empty();
                        $('#newSortDiv').html(response);
                    }
                });
            });

        });
    </script>

    {{-- <script type="text/javascript">
    $(document).ready(function() {
             alert('hello Masud');



        });
    </script> --}}
@endpush

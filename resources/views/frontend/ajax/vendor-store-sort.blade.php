

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
                <h2 style="text-align: center; padding-top: 10%;padding-bottom: 10%;">No Vendor Found</h2>
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

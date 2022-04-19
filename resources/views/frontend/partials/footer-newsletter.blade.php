<section class="newsletter mb-15 wow animate__animated animate__fadeIn" id="newsletterSection">
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


                                </h2>
                            </div>
                        </div>

                        <p class="mb-45">Start You'r Daily Shopping with <span
                                class="text-brand">{{ settings('company_name') }}</span></p>
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

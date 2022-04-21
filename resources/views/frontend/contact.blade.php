@extends('frontend.layouts.app')
@section('title', 'Contact |')
<style>
    /* .select2-container .select2-selection--single {
  box-sizing: border-box;
  cursor: pointer;
  display: block;
  height: 46px;
  user-select: none;
  -webkit-user-select: none;
}

.select2-container--default .select2-selection--single {
  background-color: #fff;
  border: 1px solid #d6dcdf8a;
  border-radius: 8px;
} */

.select2-container--default .select2-selection--single{
    width: 180px !important;
    height: 46px !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 43px !important;
    text-align: center !important;

}

.cart-dropdown-wrap.account-dropdown {
    z-index: 500;
}

</style>
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Contact
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        {{-- <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="row align-items-end mb-50">
                    <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                        <h4 class="mb-20 text-brand">How can help you ?</h4>
                        <h1 class="mb-30">Let us know how we can help you</h1>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <h5 class="mb-20">01. Visit Feedback</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <h5 class="mb-20">02. Employer Services</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <h5 class="mb-20 text-brand">03. Billing Inquiries</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="mb-20">04.General Inquiries</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div> --}}
        <section class="container mb-50 d-none d-md-block">
            <div class="border-radius-15 overflow-hidden">
                <div id="map-panes" class="leaflet-map"></div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row mb-60">
                            @forelse ( $contacts as $contacts )
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">{{ $contacts->name }}</h4>
                                    {{ $contacts->address }}<br />
                                    {{ $contacts->city }}, {{ $contacts->zip }}, USA<br />
                                    <abbr title="Phone">Phone :</abbr> {{ $contacts->phone }}<br />
                                    <abbr title="Email">Email :</abbr> {{ $contacts->email }}<br />
                                    <a
                                        class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i
                                            class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                            @empty
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Office</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, USA<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                                    <a
                                        class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i
                                            class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Office</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, USA<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                                    <a
                                        class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i
                                            class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Studio</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, USA<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                                    <a
                                        class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i
                                            class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mb-15 text-brand">Shop</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, USA<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                                    <a
                                        class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i
                                            class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                            @endforelse
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="contact-from-area padding-20-row-col">
                                    <h5 class="text-brand mb-10">Contact form</h5>
                                    <h2 class="mb-10">Drop Us a Line</h2>
                                    <p class="text-muted mb-30 font-sm">Your email address will not be published. Required
                                        fields are marked *</p>

                                    <form action="{{ route('frontend.contact.massage') }}" method="POST"
                                        enctype="multipart/form-data" class="contact-form-style mt-30" id="contact-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                                        aria-describedby="emailHelp" placeholder="Name"
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <input type="text" name="email"
                                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                                        aria-describedby="emailHelp" placeholder="email"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <select name="phone_code"
                                                    class="select-two phone-code  @error('phone_code') is-invalid @enderror"
                                                   >
                                                    @foreach ($countries as $country)
                                                        <option class="phone-code"
                                                            value="{{ $country->id }}">
                                                            {{ $country->phone_code }}
                                                            {{ $country->iso2 }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class=" col-md-9">
                                                <div class="input-style mb-20">
                                                    <input type="text" name="phone"
                                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                        aria-describedby="emailHelp" placeholder="phone"
                                                        value="{{ old('phone') }}">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12-6 col-md-12">
                                                <div class="input-style mb-20">
                                                    <input name="subject" placeholder="Subject" type="text"
                                                        value="{{ old('subject') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="textarea-style mb-30">
                                                    <textarea name="massage" placeholder="Message"
                                                        value="{{ old('massage') }}"></textarea>
                                                </div>
                                                <button class="submit submit-auto-width" type="submit">Send message</button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                            <div class="col-lg-4 pl-50 d-lg-block d-none" style="margin-top: 11%;">
                                <img class="border-radius-15"
                                    src="{{ asset('assets/img/uploads/settings/contactImage/' . settings('contact_image')) }}"
                                    alt="" />
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

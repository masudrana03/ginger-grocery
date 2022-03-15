@extends('frontend.layouts.app')
@section('title', 'User Account')


@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.dashboard') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.orders') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.track.orders') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Order
                                                Tracking</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.address') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('user.profile') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Account
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.change.password') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Change
                                                Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();"><i
                                                    class=" fi-rs-sign-out mr-10"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="account-detail" role="tabpanel"
                                        aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" name="enq"
                                                    action="{{ route('user.profile.update') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input required=""
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" type="text"
                                                                value="{{ old('name') ?? $user->name }}" />
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span
                                                                    class="required">*</span></label>
                                                            <input required=""
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" type="email"
                                                                value="{{ old('email') ?? $user->email }}" />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Phone Code<span class="required">*</span></label>
                                                            <select name="phone_code"
                                                                class="select-two form-control @error('phone_code') is-invalid @enderror"
                                                                style="height: 64px; font-size: 14px; font-weight: 600; color: #777777;">
                                                                @foreach ($countries as $country)
                                                                    <option
                                                                        {{ $country->phone_code == $user->phone_code ? 'selected' : '' }}
                                                                        value="{{ $country->id }}">
                                                                        {{ $country->phone_code }}
                                                                        {{ $country->iso2 }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-9">
                                                            <label>Phone <span class="required">*</span></label>
                                                            <input required=""
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                name="phone" type="text"
                                                                value="{{ old('phone') ?? $user->phone }}" />
                                                            @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            {{-- <p>Date: <input type="text" id="datepicker"></p> --}}

                                                            <label>Date of Birth <span
                                                                    class="required">*</span></label>
                                                            <input class=" @error('date_of_birth') is-invalid @enderror "
                                                                name="date_of_birth" id="datepicker" type="text"
                                                                value="{{ old('date_of_birth') ?? $user->date_of_birth }}" />
                                                            @error('date_of_birth')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit"
                                                                class="btn btn-fill-out submit font-weight-bold"
                                                                >Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@push('script')
    <script>
        $(function() {

            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                yearRange: "1971:2012"
            });
        });
    </script>
@endpush

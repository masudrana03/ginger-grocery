@extends('frontend.layouts.app')
@section('title', 'Address |')

<style>
    .modal-border {
        /* border:6px solid #abeecf !important; */
        border-radius: 3%;
    }

    .modal-button {
        border-radius: 13px;
    }

    .add-icon {
        font-size: 18px;
    }

    #custom .select2-container .select2-selection--single {
        height: 62px !important;
        width: 142px !important;
    }

    #custom.select2-container--default .select2-selection--single .select2-selection__rendered {
        color: rgb(134, 131, 131);
        line-height: 58px !important;
        text-align: center;
    }

    .address-section {
        display: inline;
        top: 10px;
    }

    input.primary-address {
        margin-top: 30px;
        margin-left: 6px;
    }

    .address-item {
        background-color: #cafce5;
        color: black;
        border-radius: 10px;
        max-width: 400px !important;
    }

    .add-btn {
        height: 30px !important;
        width: 80px !important;
        margin-top: 20px;
        padding: 0px !important;
        margin-left: 25px;
    }

    .add_more {
        margin-left: 150px;
    }

    .address-name {
        padding: 10px;
    }

</style>
<style>
    .avatar-section {
        display: block;
        margin-bottom: 15px;
        margin-left: 88px;
    }

    .user-info {
        margin-top: 25px;
        margin-left: 10px;
    }

    .user-name {
        font-size: 20px !important;
        font-weight: 500 !important;
        color: #54be8d
    }

    /* newcode  */
    .profilepic {
        position: relative;
        width: 125px;
        height: 125px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #053d23;
        border: 2px solid #54be8d;
    }

    .profilepic:hover .profilepic__content {
        opacity: 1;
    }

    .profilepic:hover .profilepic__image {
        opacity: .5;
    }

    .profilepic__image {
        object-fit: cover;
        opacity: 1;
        transition: opacity .2s ease-in-out;
    }

    .profilepic__content {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        opacity: 0;
        transition: opacity .2s ease-in-out;
    }

    .profilepic__icon {
        color: white;
        padding-bottom: 8px;
    }

    .fas {
        font-size: 20px;
    }

    .profilepic__text {
        text-transform: uppercase;
        font-size: 12px;
        width: 50%;
        text-align: center;
    }

    /* image upload  */
    .image_container {
        height: 120px;
        width: 200px;
        border-radius: 6px;
        overflow: hidden;
        margin: 10px;
    }

    .image_container img {
        height: 100%;
        width: auto;
        object-fit: cover;
    }

    .image_container span {
        top: -6px;
        right: 8px;
        color: red;
        font-size: 28px;
        font-weight: normal;
        cursor: pointer;
    }

    .profile-image {
        min-width: 200px;
        min-width: 100px;
        max-width: 980px;
        max-height: 592px;
    }

</style>

@section('content')


    <div id="old-sec">
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Address
                    </div>
                </div>
            </div>
            <div class="page-content pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 m-auto">

                            {{-- profile image --}}
                            <div class="row hover-div">
                                <div class="col-md-3 avatar-section">
                                    <div class="profilepic">
                                        @if (auth()->user()->image)
                                            <img class="profilepic__image"
                                                src="{{ asset('assets/img/uploads/users/' . $user->image) }}" width="160"
                                                height="160" alt="Profibild" />
                                        @else
                                            <img class="profilepic__image"
                                                src="{{ asset('assets/frontend/imgs/avatar/avatar1.jpg') }}" width="160"
                                                height="160" alt="Profibild" />
                                        @endif
                                        <div class="profilepic__content">
                                            <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                                            <span class="profilepic__text">Edit Profile</span>
                                        </div>
                                    </div>

                                    <div class="user-info">
                                        <span class="user-name">{{ $user->name }}</span> <br>
                                        <span class="user-email">{{ $user->email }}</span>
                                    </div>

                                </div>
                            </div>
                            {{-- profile image --}}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="dashboard-menu">
                                        <ul class="nav flex-column" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.dashboard') }}"
                                                    aria-selected="false"><i
                                                        class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.orders') }}"
                                                    aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.track.orders') }}"
                                                    aria-selected="false"><i
                                                        class="fi-rs-shopping-cart-check mr-10"></i>Order
                                                    Tracking</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="{{ route('user.address') }}"
                                                    aria-selected="false"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.profile') }}"
                                                    aria-selected="false"><i class="fi-rs-user mr-10"></i>Account
                                                    Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.change.password') }}"
                                                    aria-selected="false"><i class="fi-rs-key mr-10"></i>Change
                                                    Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
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
                                        <div class="tab-pane fade active show" id="address" role="tabpanel"
                                            aria-labelledby="address-tab">
                                            <div class="row">
                                                <div class="col-lg-8 ">
                                                    <div class="card">
                                                        <div class="card-header d-flex">
                                                            <h3 class="mb-0">Shipping Address</h3>
                                                        </div>
                                                        <div class="card-body p-4">
                                                            @forelse ($shippingAddresses ?? [] as $address)
                                                                {{-- saved address show here --}}

                                                                <div class="address-lists d-inline-flex">
                                                                    {{-- is primay address --}}

                                                                    @if ($address->is_primary == 1)
                                                                        <div class="address-item row mt-2"
                                                                            style="background-color:#2ab272;  border-radius:10px; ">
                                                                            <div class="col-lg-10 p-add">
                                                                                <p class="address-name"
                                                                                    style="color: white">
                                                                                    {{ $address->address }},{{ $address->state }},
                                                                                    {{ $address->city }},
                                                                                    {{ $address->zip }}
                                                                                    {{ settings('country') }}</p>
                                                                            </div>
                                                                            <div class="col-lg-2">

                                                                                <input
                                                                                    class="form-check-input primary-address"
                                                                                    data-id="{{ $address->id }}"
                                                                                    type="radio" checked
                                                                                    name="flexRadioDefault  "
                                                                                    id="{{ $address->id }}">
                                                                                <label class="form-check-label"
                                                                                    style="display:none"
                                                                                    for="{{ $address->id }}">

                                                                                </label>
                                                                            </div>


                                                                            {{-- is primay address --}}
                                                                        @else
                                                                            <div class="address-item row mt-2">
                                                                                <div class="col-lg-10 p-add">
                                                                                    <p class="address-name">
                                                                                        {{ $address->address }},{{ $address->state }},
                                                                                        {{ $address->city }},
                                                                                        {{ $address->zip }}
                                                                                        {{ settings('country') }}</p>
                                                                                </div>
                                                                                <div class="col-lg-2">

                                                                                    <input
                                                                                        class="form-check-input primary-address"
                                                                                        data-id="{{ $address->id }}"
                                                                                        type="radio" name="flexRadioDefault"
                                                                                        id="{{ $address->id }}">
                                                                                    <label class="form-check-label"
                                                                                        style="display:none"
                                                                                        for="{{ $address->id }}">

                                                                                    </label>
                                                                                </div>
                                                                    @endif

                                                                </div>

                                                                <div class="action-list d-inline-flex mx-3 my-4">
                                                                    {{-- <p>Edit</p> --}}

                                                                    <a class="edit-billing-address" href="#"
                                                                        onclick="openEditShippingModal({{ $address->id }})"
                                                                        data-toggle="modal">Edit</a>

                                                                    <a class="edit-billing-address mx-2" href="#"
                                                                        onclick="deleteAddress({{ $address->id }})"
                                                                        data-toggle="modal">Delete</a>

                                                                </div>

                                                                {{-- All hidden input field --}}
                                                                <div class="hidden-input">
                                                                    <input type="hidden" id="hidden_id"
                                                                        value="{{ $address->id }}">
                                                                </div>

                                                                <form id="delete-form-{{ $address->id }}"
                                                                    action="{{ route('user.delete.address', $address->id) }}"
                                                                    method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>
                                                                {{-- All hidden input field --}}

                                                        </div>




                                                        {{-- saved address show here --}}
                                                    @empty
                                                        <p>No shipping address found!</p>

                                                        <button class="btn add-billing-address cre-btn" id="shipping"
                                                            onclick="createModal('shipping')" style="color: white;">Create
                                                            Shipping Address</button>
                                                        @endforelse

                                                        {{-- add more button --}}

                                                        <div class="add_more">
                                                            <button class="add-btn btn add-billing-address " id="shipping"
                                                                onclick="createModal('shipping')" style="color: white;">Add
                                                                more</button>
                                                        </div>

                                                        {{-- add more button --}}

                                                        {{-- modal --}}

                                                        <div class="modal fade" id="editBillingModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-border">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">
                                                                            Edit Billing Address
                                                                        </h5>
                                                                        <button type="button" class="close modal-button"
                                                                            onclick="closeModal()"
                                                                            style="color: black; background-color:#fdc040;"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="billingEditForm" method="post"
                                                                        class="form-horizontal">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Name
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-bill-name"
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="name" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                    <input type="hidden"
                                                                                        id="addressTypeBill" name="type">

                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus> --}}
                                                                                        <label
                                                                                            class="pd-10">Country
                                                                                            Code
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <div id="custom">
                                                                                            <select name="phone_code"
                                                                                                class="select-country  phone-code form-control  @error('') is-invalid @enderror"
                                                                                                style="height: 64px; font-size: 14px; font-weight: 600; color: #777777; padding-left: 25%;">
                                                                                                {{-- <option value="">Seclect Country</option> --}}
                                                                                                @foreach ($countries as $countryName)
                                                                                                    <option
                                                                                                        class="phone-code"
                                                                                                        value="{{ $countryName->id }}">
                                                                                                        {{ $countryName->phone_code }}
                                                                                                        {{ $countryName->iso2 }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        <label class="pd-10">Phone
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <input id="edit-bill-phone"
                                                                                            type="text"
                                                                                            class="form-control @error('phone') is-invalid @enderror"
                                                                                            name="phone"
                                                                                            value="{{ old('phone') }}"
                                                                                            required autocomplete="phone"
                                                                                            placeholder="Phone Number"
                                                                                            autofocus>
                                                                                        @error('phone')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Email
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-bill-email"
                                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                                        name="email" type="text" />
                                                                                    @error('email')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <select name="country_id" id=""
                                                                                        class="form-control @error('country_id') is-invalid @enderror"
                                                                                        style="height: 64px; font-size: 14px; font-weight: 600; color: #777777;">
                                                                                        {{-- <option value="">Seclect Country</option> --}}
                                                                                        <option value="">Seclect Country
                                                                                        </option>
                                                                                        @foreach ($countries as $country)
                                                                                            <option
                                                                                                value="{{ $country->id }}">
                                                                                                {{ $country->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Address
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required=""
                                                                                        id="edit-bill-address"
                                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                                        name="address" type="text" />
                                                                                    @error('address')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label
                                                                                        class="pd-10">State<span
                                                                                            class="required"></span></label>
                                                                                    <input required="" id="edit-bill-state"
                                                                                        class="form-control @error('state') is-invalid @enderror"
                                                                                        name="state" type="text" />
                                                                                    @error('state')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="pd-10">City
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-bill-city"
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="city" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label class="pd-10">Zip Code
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-bill-zip"
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="zip" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                id="close" onclick="closeModal()"
                                                                                style="color: black; background-color:#fdc040;"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                style="padding: 10px 5%; border-radius: 6px;"
                                                                                class="btn">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal -->

                                                        {{-- modal for edit shipping address --}}
                                                        
                                                        <div class="modal fade" id="editShippingModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered "
                                                                role="document">
                                                                <div class="modal-content modal-border">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">
                                                                            Edit Shipping Address
                                                                        </h5>

                                                                        <button type="button" class="close modal-button"
                                                                            onclick="closeModal()" data-dismiss="modal"
                                                                            style="color: black; background-color:#fdc040;"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="shippingEditForm" method="post"
                                                                        class="form-horizontal">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Name
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-ship-name"
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="name" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                    <input type="hidden"
                                                                                        id="addressTypeShip" name="type">

                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus> --}}
                                                                                        <label
                                                                                            class="pd-10">Country
                                                                                            Code
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <div id="custom">
                                                                                            <select id="phoneCode"
                                                                                                name="phone_code"
                                                                                                class="select-country-code phone-code form-control @error('') is-invalid @enderror"
                                                                                                style="height: 64px; font-size: 14px; font-weight: 600; color: #777777; padding-left: 25%;">
                                                                                                @foreach ($countries as $countryName)
                                                                                                    <option
                                                                                                        value="{{ $countryName->phone_code }}">
                                                                                                        {{ $countryName->phone_code }}
                                                                                                        {{ $countryName->iso2 }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        <label class="pd-10">Phone
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <input id="edit-ship-phone"
                                                                                            type="text"
                                                                                            class="form-control @error('phone') is-invalid @enderror"
                                                                                            name="phone"
                                                                                            value="{{ old('phone') }}"
                                                                                            required autocomplete="phone"
                                                                                            placeholder="Phone Number"
                                                                                            autofocus>
                                                                                        @error('phone')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Email
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-ship-email"
                                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                                        name="email" type="text" />
                                                                                    @error('email')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <select disabled name="country_id" id=""
                                                                                        class="form-control @error('country_id') is-invalid @enderror"
                                                                                        style="height: 64px; font-size: 14px; font-weight: 600; color: #777777;">
                                                                                        <option value="">Seclect Country
                                                                                        </option>
                                                                                        @foreach ($countries as $country)
                                                                                            <option
                                                                                                {{ settings('country') == $country->name ? 'selected' : '' }}
                                                                                                value="{{ $country->id }}">
                                                                                                {{ $country->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Address
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required=""
                                                                                        id="edit-ship-address"
                                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                                        name="address" type="text" />
                                                                                    @error('address')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label
                                                                                        class="pd-10">State<span
                                                                                            class="required"></span></label>
                                                                                    <input required="" id="edit-ship-state"
                                                                                        class="form-control @error('state') is-invalid @enderror"
                                                                                        name="state" type="text" />
                                                                                    @error('state')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="pd-10">City
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-ship-city"
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="city" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label class="pd-10">Zip Code
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required="" id="edit-ship-zip"
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="zip" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row m-auto">

                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        name="is_primary" type="checkbox"
                                                                                        value="1" id="primary-address">
                                                                                    <label class="form-check-label"
                                                                                        for="primary-address">
                                                                                        Set as primary address
                                                                                    </label>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                onclick="closeModal()"
                                                                                style="color: black; background-color:#fdc040;"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                style="padding: 10px 5%; border-radius: 6px;"
                                                                                class="btn">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        

                                                        @if (Session::has('errors'))
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('#createModal').modal({
                                                                        show: true
                                                                    });
                                                                });
                                                            </script>
                                                        @endif

                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach

                                                        {{-- modal for create shipping address --}}

                                                        <div class="modal fade" id="createModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content modal-border rounded-3">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalTitle"></h5>
                                                                        <button type="button" class="close modal-button"
                                                                            data-dismiss="modal" onclick="closeModal()"
                                                                            style="color: black; background-color:#fdc040;"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="createAddressForm"
                                                                        action="{{ route('user.add.address') }}"
                                                                        method="POST" class="form-horizontal">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Name
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required=""
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="name" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                    <input type="hidden" id="addressType"
                                                                                        name="type">

                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus> --}}
                                                                                        <label
                                                                                            class="pd-10">Country
                                                                                            Code
                                                                                            <span
                                                                                                class="required">*</span>
                                                                                        </label>
                                                                                        <div id="custom">
                                                                                            <select name="phone_code"
                                                                                                class="select-country form-control @error('') is-invalid @enderror"
                                                                                                style="height: 64px; font-size: 14px; font-weight: 600; color: #777777; padding-left: 25%;">
                                                                                                {{-- <option value="">Seclect Country</option> --}}
                                                                                                @foreach ($countries as $countryName)
                                                                                                    <option
                                                                                                        class="phone-code"
                                                                                                        value="{{ $countryName->id }}">
                                                                                                        {{ $countryName->phone_code }}
                                                                                                        {{ $countryName->iso2 }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        <label class="pd-10">Phone
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <input id="phone" type="text"
                                                                                            class="form-control @error('phone') is-invalid @enderror"
                                                                                            name="phone"
                                                                                            value="{{ old('phone') }}"
                                                                                            required autocomplete="phone"
                                                                                            placeholder="Phone Number"
                                                                                            autofocus>
                                                                                        @error('phone')
                                                                                            <span class="invalid-feedback"
                                                                                                role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Email
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required=""
                                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                                        name="email" type="text" />
                                                                                    @error('email')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <select disabled name="country_id"
                                                                                        class="form-control @error('country_id') is-invalid @enderror"
                                                                                        style="height: 64px; font-size: 14px; font-weight: 600; color: #777777;">
                                                                                        <option value="">Seclect Country
                                                                                        </option>
                                                                                        @foreach ($countries as $country)
                                                                                            <option
                                                                                                {{ settings('country') == $country->name ? 'selected' : '' }}
                                                                                                value="{{ $country->id }}">
                                                                                                {{ $country->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label class="pd-10">Address
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required=""
                                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                                        name="address" type="text" />
                                                                                    @error('address')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label
                                                                                        class="pd-10">State<span
                                                                                            class="required"></span></label>
                                                                                    <input required=""
                                                                                        class="form-control @error('state') is-invalid @enderror"
                                                                                        name="state" type="text" />
                                                                                    @error('state')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="pd-10">City
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required=""
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="city" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-group col-md-6">
                                                                                    <label class="pd-10">Zip Code
                                                                                        <span
                                                                                            class="required">*</span></label>
                                                                                    <input required=""
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="zip" type="text" />
                                                                                    @error('name')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="row m-auto">

                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        name="is_primary" type="checkbox"
                                                                                        value="1" id="primary-address">
                                                                                    <label class="form-check-label"
                                                                                        for="primary-address">
                                                                                        Set as primary address
                                                                                    </label>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                onclick="closeModal()"
                                                                                style="color: black; background-color:#fdc040;"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn"
                                                                                style="font-size: 14px;font-weight: 700; padding: 12px 30px; border-radius: 4px;">Create
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                    {{-- <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                onclick="closeModal()"
                                                                                style="color: black; background-color:#fdc040;"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn">Save changes</button>
                                                                        </div> --}}
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
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="avatar-modal" tabindex="-1" aria-labelledby="avatar-modal-label"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="avatar-form" method="post" action="{{ route('user.update.profile.image') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="avatar-modal-label"><i
                                        class="til_img"></i><strong>Profile
                                        Image</strong></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="avatar-body">

                                    <div class="avatar-upload">
                                        <input class="avatar-src" name="avatar_src" type="hidden">
                                        <input class="avatar-data" name="avatar_data" type="hidden">

                                        <div class="card shadow-sm w-100">
                                            <div class="card-header d-flex justify-content-start">


                                                <input type="file" name="profile_image" id="login_image" accept="image/*"
                                                    class="d-none " onchange="showLoginImage(this)">
                                                <button class="btn btn-sm btn-primary ml-4" type="button"
                                                    onclick="document.getElementById('login_image').click()">Select
                                                    Image</button>
                                            </div>
                                            <div class="card-body d-flex flex-wrap mx-auto" id="image-container">
                                                @if (auth()->user()->image)
                                                    <div class="image-space w-100">
                                                        <img class="profile-image" width="500" height="500"
                                                            src="{{ asset('assets/img/uploads/users/' . $user->image) }}"
                                                            id="login_images">
                                                    </div>
                                                @else
                                                    <div class="image-space w-100">

                                                        <img class="profile-image" width="500" height="500"
                                                            src="{{ asset('assets/frontend/imgs/avatar/avatar1.jpg') }}"
                                                            alt="Metrocery" id="login_images" />
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-small btn-secondary" type="button" data-bs-dismiss="modal"
                                    aria-label="Close">Close</button>
                                <button class="btn btn-small btn-primary avatar-save" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="new-sec">

    </div>
@endsection


<style>
    .pd-10 {
        padding-left: 10px !important;
    }

</style>

<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
@push('script')
    <script>
        // Billing address modal
        let billAdd = @json($billingAddresses);
        let countries = @json($countries);
        // let countries = @json($countries);
        // function del(id) {
        //     alert('dscdcsd')
        //     $('#billingDeleteForm').attr('href',  '/user/address-delete/' + billingAddress.id);
        // }
        function deleteAddress(id) {
            document.getElementById('delete-form-' + id).submit();
        }

        function openEditBillingModal(id) {
            $('#addressTypeBill').val('billing')
            let billingAddress = billAdd.find(x => x.id == id);
            // Set edit form action url
            $('#billingEditForm').attr('action', '/user/address-update/' + billingAddress.id);
            // Set update row value
            $('#edit-bill-name').val(billingAddress.name);
            $('#edit-bill-phone').val(billingAddress.phone);
            $('#edit-bill-email').val(billingAddress.email);
            $('#edit-bill-address').val(billingAddress.address);
            $('#edit-bill-city').val(billingAddress.city);
            $('#edit-bill-state').val(billingAddress.state);
            $('#edit-bill-country').val(billingAddress.country.name);
            $('#edit-bill-zip').val(billingAddress.zip);
            // Open modal
            $('#editBillingModal').modal('show');
        }

        function closeModal() {
            $('#editBillingModal').modal('hide');
            $('#editShippingModal').modal('hide');
            $('#createModal').modal('hide');
        }
        //Shipping address modal
        let shippingAdd = @json($shippingAddresses);

        function openEditShippingModal(id) {
            $('#addressTypeShip').val('shipping')
            let shippingAddress = shippingAdd.find(x => x.id == id);
            $('#phoneCode').empty();
            $.each(countries, function(index, country) {
                $('#phoneCode').append('<option value="' + country.id + '">' + country.phone_code + country
                    .iso2 + '</option>');
            });
            $("#phoneCode option[value='" + shippingAddress.phone_code + "']").attr('selected', true);
            // Set edit form action url
            $('#shippingEditForm').attr('action', '/user/address-update/' + shippingAddress.id);
            // Set update row value
            $('#edit-ship-name').val(shippingAddress.name);
            $('#edit-ship-phone').val(shippingAddress.phone);
            $('#edit-ship-email').val(shippingAddress.email);
            $('#edit-ship-address').val(shippingAddress.address);
            $('#edit-ship-city').val(shippingAddress.city);
            $('#edit-ship-state').val(shippingAddress.state);
            // $('#edit-ship-country').val(shippingAddress.country.name);
            $('#edit-ship-zip').val(shippingAddress.zip);
            // Open modal
            $('#editShippingModal').modal('show');
        }

        function createModal(type) {
            if (type == "billing") {
                $('#addressType').val('billing')
                $('#ModalTitle').text("Create Billing Address")
                $('#createModal').modal('show');
            }
            if (type == "shipping") {
                $('#addressType').val('shipping')
                $('#ModalTitle').text("Create Shipping Address")
                $('#createModal').modal('show');
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            let address = $('.address_name').text();
            if (address == "") {
                $('#cre-icon').empty();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.select-country').select2({
                dropdownParent: $('#createModal')
            });
        });
        $(document).ready(function() {
            $('.select-country-code').select2({
                dropdownParent: $('#editShippingModal')
            });
        });
    </script>
@endpush
@push('script')
    <script>
        $(document).ready(function() {
            $('.profilepic__content').on('click', function() {
                $('#avatar-modal').modal('toggle');
            });


        });

        function showLoginImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById('login_images');
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.primary-address').on('click', function(event) {


                event.preventDefault();
                let id = $(this).attr('data-id');
                var url = "{!! route('set.primary.address', ':id') !!}";
                url = url.replace(':id', id);
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        id: id,
                    },
                    success: function(result) {

                        $('#old-sec').empty();
                        $('#new-sec').html(result);


                    },
                    error: function(error) {
                        //console.log(error);
                    }
                });
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        id: id,
                    },
                    success: function(result) {

                        $('#old-sec').empty();
                        $('#new-sec').html(result);


                    },
                    error: function(error) {
                        //console.log(error);
                    }
                });
            });
        });
    </script>
@endpush

@extends('frontend.layouts.app')
@section('title', 'User Account')

<style>

    .modal-border{
        /* border:6px solid #abeecf !important; */
        border-radius:3%;
    }


    .modal-button{
        border-radius:13px;
    }
</style>

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
                                            <a class="nav-link active" href="{{ route('user.address') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.profile') }}"
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
                                    <div class="tab-pane fade active show" id="address" role="tabpanel"
                                        aria-labelledby="address-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h3 class="mb-0">Billing Address</h3>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        @forelse ($billingAddresses ?? [] as $address)
                                                            <p>{{ $address->name }}</p>
                                                            <p>{{ $address->phone }}</p>
                                                            <p>{{ $address->email }}</p>
                                                            <address>
                                                                {{ $address->address }},
                                                            </address>
                                                            <p>{{ $address->state }}, {{ $address->city }},
                                                                {{ $address->zip }} ,</p>
                                                            <p>{{ $address->country->name }} .</p>
                                                            <div class="billing-button"
                                                                style="margin-left: 60%; margin-top:-30px;">
                                                                <button class="btn-success  edit-billing-address"
                                                                    onclick="openEditBillingModal({{ $address->id }})"
                                                                    style="color: white; background-color:#3BB77E; border-radius: 5px ; border:white"
                                                                    data-toggle="modal"
                                                                    data-target="#editCategoryModal">Edit</button>
                                                                    <button class="btn-danger"
                                                                    style="color: black; background-color:#fdc040; border-radius: 5px ; border:white; margin-left: 2%;"
                                                                    onclick="deleteAddress({{ $address->id }})">Delete</button>
                                                            </div>

                                                            <form id="delete-form-{{ $address->id }}"
                                                                action="{{ route('user.delete.address', $address->id) }}" method="POST"
                                                                style="display: none;">
                                                                @csrf
                                                            </form>
                                                            <hr>
                                                        @empty
                                                            <p>No Billing address address found!</p>
                                                            <button class="btn add-billing-address" id="billing"
                                                                onclick="createModal('billing')"
                                                                style="color: white;">Create Billing Address</button>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="mb-0">Shipping Address</h3>
                                                    </div>
                                                    <div class="card-body p-4">

                                                        @forelse ($shippingAddresses ?? [] as $address)

                                                            <p>{{ $address->name }}</p>
                                                            <p>{{ $address->phone }}</p>
                                                            <p>{{ $address->email }}</p>
                                                            <address>
                                                                {{ $address->address }},
                                                            </address>
                                                            <p>{{ $address->state }}, {{ $address->city }},
                                                                {{ $address->zip }} ,</p>
                                                            <p>{{ $address->country->name }} .</p>

                                                            <div class="billing-button"
                                                                style="margin-left: 60%; margin-top:-30px;">
                                                                <button class="btn-success  edit-billing-address"
                                                                    onclick="openEditShippingModal({{ $address->id }})"
                                                                    style="color: white; background-color:#3BB77E; border-radius: 5px ; border:white"
                                                                    data-toggle="modal">Edit</button>
                                                                <button class="btn-danger"
                                                                    style="color: black; background-color:#fdc040; border-radius: 5px ; border:white; margin-left: 2%;"
                                                                    onclick="deleteAddress({{ $address->id }})">Delete</button>
                                                            </div>

                                                            <form id="delete-form-{{ $address->id }}"
                                                                action="{{ route('user.delete.address', $address->id) }}" method="POST"
                                                                style="display: none;">
                                                                @csrf
                                                            </form>

                                                            <hr>
                                                        @empty
                                                            <p>No shipping address found!</p>
                                                            <button class="btn add-billing-address" id="shipping"
                                                                onclick="createModal('shipping')"
                                                                style="color: white;">Create Shipping Address</button>
                                                        @endforelse

                                                        {{-- modal --}}

                                                        <div class="modal fade" id="editBillingModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-border">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Edit Billing Address
                                                                        </h5>
                                                                        <button type="button" class="close modal-button"
                                                                            onclick="closeModal()"
                                                                            style="color: black; background-color:#fdc040;"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="billingEditForm" method="post" class="form-horizontal">
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
                                                                                    <input type="hidden" id="addressTypeBill" name="type">

                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus> --}}
                                                                                        <label class="pd-10">Country Code
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <select name=""
                                                                                            class="form-control @error('') is-invalid @enderror"
                                                                                            style="height: 64px; font-size: 14px; font-weight: 600; color: #777777; padding-left: 25%;">
                                                                                            {{-- <option value="">Seclect Country</option> --}}
                                                                                            @foreach ($countries as $countryName)
                                                                                                <option
                                                                                                    value="{{ $countryName->phonecode }}">
                                                                                                    {{ $countryName->phonecode }}
                                                                                                    {{ $countryName->iso }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        <label class="pd-10">Phone
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <input id="edit-bill-phone" type="text"
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
                                                                                    <input required="" id="edit-bill-address"
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
                                                                        <button type="submit" style="padding: 10px 5%; border-radius: 6px;" class="btn">Save changes</button>
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
                                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                                <div class="modal-content modal-border" >
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Edit Shipping Address
                                                                        </h5>
                                                                        <button type="button" class="close modal-button"
                                                                            onclick="closeModal()" data-dismiss="modal"
                                                                            style="color: black; background-color:#fdc040;"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="shippingEditForm" method="post" class="form-horizontal">
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
                                                                                    <input type="hidden" id="addressTypeShip" name="type">

                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus> --}}
                                                                                        <label class="pd-10">Country Code
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <select name=""
                                                                                            class="form-control @error('') is-invalid @enderror"
                                                                                            style="height: 64px; font-size: 14px; font-weight: 600; color: #777777; padding-left: 25%;">
                                                                                            {{-- <option value="">Seclect Country</option> --}}
                                                                                            @foreach ($countries as $countryName)
                                                                                                <option
                                                                                                    value="{{ $countryName->phonecode }}">
                                                                                                    {{ $countryName->phonecode }}
                                                                                                    {{ $countryName->iso }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="form-group">
                                                                                        {{-- <input required="" type="password" name="password" placeholder="Confirm password" /> --}}
                                                                                        <label class="pd-10">Phone
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <input id="edit-ship-phone" type="text"
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
                                                                                    <input required="" id="edit-ship-address"
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

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                onclick="closeModal()"
                                                                                style="color: black; background-color:#fdc040;"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit" style="padding: 10px 5%; border-radius: 6px;" class="btn">Save changes</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- modal for create shipping address --}}

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
                                                                                        <label class="pd-10">Country Code
                                                                                            <span
                                                                                                class="required">*</span></label>
                                                                                        <select name=""
                                                                                            class="form-control @error('') is-invalid @enderror"
                                                                                            style="height: 64px; font-size: 14px; font-weight: 600; color: #777777; padding-left: 25%;">
                                                                                            {{-- <option value="">Seclect Country</option> --}}
                                                                                            @foreach ($countries as $countryName)
                                                                                                <option
                                                                                                    value="{{ $countryName->phonecode }}">
                                                                                                    {{ $countryName->phonecode }}
                                                                                                    {{ $countryName->iso }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
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
                                                                                    <select name="country_id"
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

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                onclick="closeModal()"
                                                                                style="color: black; background-color:#fdc040;"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn"
                                                                                style="font-size: 14px;font-weight: 700; padding: 12px 30px; border-radius: 4px;">Save
                                                                                changes</button>
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
    </main>



@endsection


<style>
    .pd-10 {
        padding-left: 10px !important;
    }

</style>

<script>
    // Billing address modal

    let billAdd = @json($billingAddresses);
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
        $('#billingEditForm').attr('action',  '/user/address-update/' + billingAddress.id);

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


        //alert("dsjhsfgsj");
        let shippingAddress = shippingAdd.find(x => x.id == id);
        //alert(shippingAddress);

        // Set edit form action url
        $('#shippingEditForm').attr('action',  '/user/address-update/' + shippingAddress.id);

        // Set update row value
        $('#edit-ship-name').val(shippingAddress.name);
        $('#edit-ship-phone').val(shippingAddress.phone);
        $('#edit-ship-email').val(shippingAddress.email);
        $('#edit-ship-address').val(shippingAddress.address);
        $('#edit-ship-city').val(shippingAddress.city);
        $('#edit-ship-state').val(shippingAddress.state);
        $('#edit-ship-country').val(shippingAddress.country.name);
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

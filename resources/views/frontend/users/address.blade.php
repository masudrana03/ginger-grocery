@extends('frontend.layouts.app')
@section('title', 'User Account')



@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
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
                                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                                                    <div class="card-body mb-2">
                                                        @forelse ($billingAddresses ?? [] as $item)
                                                            <address>
                                                                {{ $item->address }}
                                                            </address>
                                                            <p>{{ $item->phone }}</p>
                                                            <p>{{ $item->city }}</p>
                                                            <p>{{ $item->country->name }}</p>
                                                            <p>{{ $item->zip }}</p>
                                                            <div class="billing-button" style="margin-left:80px; margin-top:-30px;">
                                                            <button class="btn-success  edit-billing-address" onclick="openEditBillingModal({{$item->id}})" style="color: white; background-color:#3BB77E; border-radius: 5px ; border:white" data-toggle="modal" data-target="#editCategoryModal">Edit</button>
                                                            <button class="btn-danger"  style="color: black; background-color:#fdc040; border-radius: 5px ; border:white" data-toggle="modal" data-target="#editCategoryModal">Delete</button>
                                                            </div>
                                                            <hr>
                                                            {{-- MODAL --}}


                                                        @empty
                                                            <p>No Billing address address found!</p>
                                                            <button class="btn add-billing-address"  style="color: white;">Create New</button>
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

                                                        @forelse ($shippingAddresses ?? [] as $item)

                                                            <address>
                                                                {{ $item->address }}
                                                            </address>
                                                            <p>{{ $item->phone }}</p>
                                                            <p>{{ $item->city }}</p>
                                                            <p>{{ $item->country->name }}</p>
                                                            <p>{{ $item->zip }}</p>
                                                            <a class="btn add-billing-address" style="color: white;">Edit</a>
                                                            <hr>
                                                        @empty
                                                            <p>No shipping address found!</p>
                                                            <button class="btn add-billing-address" data-toggle="modal" data-target="#createShippingModal" style="color: white; text-align:center;">Create New</button>
                                                        @endforelse

                                                     {{-- modal --}}

                                                        <div class="modal fade" id="editBillingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Billing Address</h5>
                                                                <button type="button" class="close" onclick="closeModal()" style="color: black; background-color:#fdc040;" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <form id="billingEditForm"  method="POST" class="form-horizontal">
                                                                    <div class="modal-body">
                                                                        <div class="form-group col-md-12">
                                                                            <label>Name <span class="required">*</span></label>
                                                                            <input required="" id="edit-bill-address"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                name="addresss" type="text"
                                                                                value="{{ old('name') ?? $item->address }}" />
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group col-md-12">
                                                                            <label>Phone <span class="required">*</span></label>
                                                                            <input required="" id="edit-bill-phone"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                name="phone" type="text"
                                                                                value="{{ old('name') ?? $item->phone }}" />
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group col-md-12">
                                                                            <label>City <span class="required">*</span></label>
                                                                            <input required="" id="edit-bill-city"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                name="city" type="text"
                                                                                value="{{ old('name') ?? $item->city }}" />
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group col-md-12">
                                                                            <label>Country <span class="required">*</span></label>
                                                                            <input required="" id="edit-bill-country"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                name="country" type="text"
                                                                                value="{{ old('name') ?? $item->country->name }}" />
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group col-md-12">
                                                                            <label>Zip Code <span class="required">*</span></label>
                                                                            <input required="" id="edit-bill-zip"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                name="zip" type="text"
                                                                                value="{{ old('name') ?? $item->zip }}" />
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" id="close" onclick="closeModal()" style="color: black; background-color:#fdc040;" data-dismiss="modal">Close</button>
                                                                <a type="button" href="#" class="btn">Save changes</a>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <!-- Modal -->


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


    {{-- modal for create shipping address --}}
    <div class="modal fade" id="createShippingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create Shipping Address</h5>
            <button type="button" class="close" data-dismiss="modal" style="color: black; background-color:#fdc040;" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="shippingEditForm"  method="POST" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label>Name <span class="required">*</span></label>
                        <input required="" id="edit-bill-address"
                            class="form-control @error('name') is-invalid @enderror"
                            name="addresss" type="text"
                             />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label>Phone <span class="required">*</span></label>
                        <input required="" id="edit-bill-phone"
                            class="form-control @error('name') is-invalid @enderror"
                            name="phone" type="text"
                            />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label>City <span class="required">*</span></label>
                        <input required="" id="edit-bill-city"
                            class="form-control @error('name') is-invalid @enderror"
                            name="city" type="text"
                             />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label>Country <span class="required">*</span></label>
                        <input required="" id="edit-bill-country"
                            class="form-control @error('name') is-invalid @enderror"
                            name="country" type="text"
                            />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label>Zip Code <span class="required">*</span></label>
                        <input required="" id="edit-bill-zip"
                            class="form-control @error('name') is-invalid @enderror"
                            name="zip" type="text"
                           />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </form>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="color: black; background-color:#fdc040;" data-dismiss="modal">Close</button>
            <a type="button" href="#" class="btn">Save changes</a>
            </div>
        </div>
        </div>
    </div>


@endsection

    <script>

        let billAdd = @json($billingAddresses);

        function openEditBillingModal(id) {


            let billingAddress = billAdd.find(x => x.id == id);

            // Set edit form action url
            //$('#billingEditForm').attr('action', app_url + '/billing/' + billingAddress.id);

            // Set update row value
            $('#edit-bill-address').val(billingAddress.address);
            $('#edit-bill-phone').val(billingAddress.phone);
            $('#edit-bill-city').val(billingAddress.city);
            $('#edit-bill-country').val(billingAddress.country.name);
            $('#edit-bill-zip').val(billingAddress.zip);

               // Open modal
            $('#editBillingModal').modal('show');

        }

        function closeModal(){
              $('#editBillingModal').modal('hide');
        }





    </script>



@extends('frontend.layouts.app')
@section('title', 'Orders |')
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
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Orders
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
                                            <a class="nav-link active" href="{{ route('user.orders') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.track.orders') }}"
                                                aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Order
                                                Tracking</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.address') }}"
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
                                    <div class="tab-pane fade active show">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Your Orders</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice ID</th>
                                                                <th>Vendor Name</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total Price</th>
                                                                <th>Invoice</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $item)
                                                                <tr>
                                                                    <td>{{ $item->invoice_id }}</td>
                                                                    <td>{{ $item->store->name }}</td>
                                                                    <td>{{ $item->created_at->format('F j, Y') }}</td>
                                                                    <td>{{ $item->status->name }}</td>
                                                                    <td>{{ settings('currency') }}{{ $item->total }}
                                                                    </td>
                                                                    <td><a href="{{ route('user.invoice', $item->id) }}"
                                                                            class="btn-small d-block">View</a></td>

                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
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
        <div class="modal fade" id="avatar-modal" tabindex="-1" aria-labelledby="avatar-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="avatar-form" method="post" action="{{ route('user.update.profile.image') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title" id="avatar-modal-label"><i class="til_img"></i><strong>Profile
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


@endsection

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
@endpush

{{-- @foreach ($orders as $item)
                                                        <tr>
                                                            <td>#{{ $item->invoice_id }}</td>
                                                            <td>{{ $item->created_at->format('F j, Y')}}</td>
                                                            <td>{{ $item->status->name}}</td>
                                                            <td>${{ $item->total }}</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        @endforeach --}}

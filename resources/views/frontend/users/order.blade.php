@extends('frontend.layouts.app')
@section('title', 'Orders')


@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Orders
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
                                            <a class="nav-link active" href="{{ route('user.orders') }}"
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
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orders as $item)
                                                                <tr>
                                                                    <td>#{{ $item->invoice_id }}</td>
                                                                    <td>{{ $item->created_at->format('F j, Y') }}</td>
                                                                    <td>{{ $item->status->name }}</td>
                                                                    <td>${{ $item->total }}</td>
                                                                    <td><a href="{{ route('user.invoice',$item->id )}}" class="btn-small d-block">View</a></td>
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
    </main>


@endsection



{{-- @foreach ($orders as $item)
                                                        <tr>
                                                            <td>#{{ $item->invoice_id }}</td>
                                                            <td>{{ $item->created_at->format('F j, Y')}}</td>
                                                            <td>{{ $item->status->name}}</td>
                                                            <td>${{ $item->total }}</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        @endforeach --}}

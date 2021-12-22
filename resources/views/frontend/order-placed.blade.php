@extends('frontend.layouts.app')
@section('title', 'Order Placed')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Checkout
                <span></span> Order Placed
            </div>
        </div>
    </div>

    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <p class="mb-20"><img src="assets/imgs/page/page-404.png" alt="" class="hover-up"></p>
                    <h1 class="display-2 mb-30">Congratulations!<br> Order Placed</h1>
                    <a class="btn btn-default submit-auto-width font-xs hover-up mt-30" href="/"><i class="fi-rs-home mr-5"></i> Back To Home Page</a>
                </div>
            </div>
        </div>
    </div>

@endsection

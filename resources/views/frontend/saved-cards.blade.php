@extends('frontend.layouts.app')
@section('title', 'Save cards')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Checkout
                <span></span> save cards
            </div>
        </div>
    </div>

    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <div class="design" style="width: 316px;">
                        <br><br>
                        <ul style="list-style: none;" >
                            @foreach($paymentMethods as $paymentMethod)
                            <li>
                                <input class="payment" type="radio" id="cardHolder-{{$paymentMethod->id}}"  name="fav_language" value="{{ $paymentMethod->id }}">
                                <label for="cardHolder-{{$paymentMethod->id}}">{{ $paymentMethod->billing_details->name}} {{ $paymentMethod->card->last4}}</label>
                               
                            </li>
                            @endforeach
                        </ul>
                        <button class="btn success btn-design" id="pay">Pay</button> &nbsp;  &nbsp;
                        <button class="btn success btn-design" id="new">Add new card </button>
                        <input type="hidden" id="invoiceId" value ="{{ $invoiceId }}" >
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>


document.getElementById("pay").onclick = function () {
    var invoiceId = document.getElementById("invoiceId").value;
    var paymentMethodId = $("input:radio.payment:checked").val();
    var url = "{{ route('payment_from_saved_card', [":invoiceId", ":paymentMethodId"]) }}";
    
    url = url.replace(':invoiceId', invoiceId);
    url = url.replace(':paymentMethodId', paymentMethodId);
    
    window.location.href=url;
};

document.getElementById("new").onclick = function () {
    var invoiceId = document.getElementById("invoiceId").value;
    var url = "{{ route('payment_from_card', ":invoiceId") }}";
    
    url = url.replace(':invoiceId', invoiceId);

    window.location.href=url;
};
    
</script>
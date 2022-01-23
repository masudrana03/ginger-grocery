{{-- @extends('frontend.layouts.app') --}}
@section('title', 'Order Placed')
<style>
    .mb-50 {
        margin-bottom: 50px;
    }

    .mt-50 {
        margin-top: 50px;
    }

    .card {
        margin: auto;
        width: 22%;
        padding: 3rem 3.5rem;
        box-shadow: 0 6px 20px 0 rgb(0 0 0 / 19%);
        background-color: #D8F1E5;
    }

    #card-header {
        font-weight: 500;
        font-size: 13px;
    }


    input {
        font-size: 13px;
        font-weight: 600;
        color: #000;
        width: 100%;
        min-width: unset;
        background-color: transparent;
        border-color: transparent;
        margin: 0
    }

    .btn {
        width: 100%;
        background-color: rgb(65, 202, 127);
        border-color: rgb(65, 202, 127);
        color: white;
        justify-content: center;
        padding: 2vh 0;
        margin-top: 1vh
    }

    .btn:focus {
        box-shadow: none;
        outline: none;
        box-shadow: none;
        color: white;
        -webkit-box-shadow: none;
        -webkit-user-select: none;
        transition: none
    }

    .btn:hover {
        color: white
    }

    input:focus::-webkit-input-placeholder {
        color: transparent
    }

    input:focus:-moz-placeholder {
        color: transparent
    }

    input:focus::-moz-placeholder {
        color: transparent
    }

    input:focus:-ms-input-placeholder {
        color: transparent
    }

</style>
<script src="https://js.stripe.com/v3/"></script>

{{-- @section('content') --}}
{{-- <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Payment
                <span></span> Stripe
            </div>
        </div>
    </div> --}}

<div class="card mb-50 mt-50">
    <!--<h3>Payment</h3>-->
    <br>
    <span id="card-header" style="" >Add new card:</span>
    <br>
    <input type="text" id="cardHolder" placeholder="Card holder name">
    <div class="cvc" id="card-element">

        <!-- Elements will create input elements here -->
    </div>

    <!-- We'll put the error messages in this element -->
    <div id="card-errors" role="alert"></div>

    <input type="checkbox" id="Save_card">
    <label style="font-size: 14px;" for="Save_card"> Save card for future use</label>
    <br><br>

    <button class="btn success btn-design" id="submit" onClick="submit()">Pay</button>
    <br><br>
</div>

{{-- <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <div class="container row">

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

{{-- @endsection --}}


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    var publishKey = "{{ $publishKey }}";
    var stripe = Stripe(publishKey);
    var elements = stripe.elements();

    var style = {
        base: {
            color: "#EF7922",
        }
    };

    var card = elements.create("card", {
        style: style
    });
    card.mount("#card-element");

    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    document.getElementById("submit").onclick = function() {
        this.disabled = true;

        var clientSecret = "{{ $clientSecret }}";
        stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: card,
                billing_details: {
                    name: document.getElementById('cardHolder').value
                }
            },
            setup_future_usage: 'off_session'
        }).then(function(result) {
            if (result.error) {
                // Show error to your customer
                console.log(result.error.message);
            } else {
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentMethodId = 'No';


                    if ($('#Save_card').is(":checked")) {
                        var paymentMethodId = result.paymentIntent.payment_method;
                    }

                    var invoiceId = "{{ $invoiceId }}";

                    var url = "{{ route('payment_success', [':invoiceId', ':paymentMethodId']) }}";
                    url = url.replace(':invoiceId', invoiceId);
                    url = url.replace(':paymentMethodId', paymentMethodId);

                    window.location.href = url;


                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback execution
                    // Set up a webhook or plugin to listen for the payment_intent.succeeded event
                    // to save the card to a Customer

                    // The PaymentMethod ID can be found on result.paymentIntent.payment_method
                }
            }
        });
    }
</script>

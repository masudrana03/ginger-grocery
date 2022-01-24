{{-- @extends('frontend.layouts.app') --}}
@section('title', 'Order Placed')
<script src="https://js.stripe.com/v3/"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

{{-- <style>
    .main-row{
       width: 50%;
       height: auto;
       box-shadow: 3px 3px 11px 8px #9de6bb !important;

    }

    .card-title-name{
       /* background-color: blue; */
       text-align: center;
       color: #38c172;
       margin-bottom: 15px;
   }
</style>
<div class="row  shadow-lg p-3 mb-5 bg-white rounded main-row">
    <div class="card">
        <div class="card-body">
            <div class="card-title card-title-name ">
                <h3>Payment</h3>
            </div>
    
            <div class="row">
                <input type="text" id="cardHolder" class="form-control" placeholder="Card holder name">
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
        </div>
    </div>
    
    
</div> --}}


{{-- safin code here  --}}
<style>

  .container{
     margin-top:110px;
     width: 40%; 
     min-width: 500px;
  }

   .card-title-name{
       /* background-color: blue; */
       text-align: center;
       color: #38c172;
   }

   .form-control{
       border-radius: 10px !important;
       margin-bottom: 15px;
   }


   .card{
       min-width: 100%;
       border: 1px transparent;
   }

   .main-row{
       width:100%;
       height: auto;
       box-shadow: 3px 3px 11px 8px #9de6bb !important;
       
       
   }

.btn-design{
    background-color: #38c172;
    color:white;
    font-size: 16px;
   
    text-decoration: none;
    border-radius: 15px;
    text-align: center;
    width: 50%;
    
   
    
}

.btn-design:hover{
    background-color: #d5d84d;
    color:rgb(12, 3, 3);
    font-size: 16px;
   
    text-decoration: none;
    border-radius: 15px;
    text-align: center;
    transition: 1.2s;
    width: 50%;
}



.btn{
    margin-left: 8vw;
}

.cvc{
    border: rgb(213 207 207) 1px solid;
    border-radius: 10px;
    height: 40px;
    align-items: baseline;
    padding-top: 10px;
    padding-left: 15px;
    
}

.row {
    --bs-gutter-x: 0.5rem !important;
}
  
</style>
  
<div class="container">
  <form action="#" method="post">
    <div class="row shadow-lg p-3 mb-5 bg-white rounded main-row">
        <div class="card" >
            <div class="card-body">
              <h3 class="card-title card-title-name">Payment Information</h5>

               <div class="row">
                <div class="form-group">
                    <label for="input" class="form-label">Card Holder Name</label>
                    <input type="text" id="cardHolder" name="card-holder-name" class="form-control" placeholder="ex: Jhon Doe" >
                </div>
               </div>

               

               <div class="row ">
                  <div class="col-12">
                    <label for="input" class="form-label">Card Information</label>
                    <div class="cvc" id="card-element">
                        <!-- Elements will create input elements here -->
                    </div>
                  </div>
               </div>

               <div class="row">
                <div id="card-errors" style="color:crimson"  role="alert"></div>
               </div>

               

               <div class="row mt-4 mb-3">
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="Save_card">
                        <label style="font-size: 14px;" for="Save_card"> Save card for future use</label>
                      </div>
                </div>
               </div>

               <div class="row ">
                 <div class="col-12">
                    <button class="btn success btn-design " id="submit" onClick="submit()">Pay</button>
                 </div>
               </div>
            </div>
        </div>
    </div>
  </form>   
</div>


{{-- safin code here  --}}


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
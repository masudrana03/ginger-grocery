<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Take payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<style>
    body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
    }

    * {
        box-sizing: border-box;
    }
    .container{
        display: flex;
        position: relative;
        justify-content: center;
    }

    .design{
        background-color: #FAFAFA;
        padding: 5px 20px 15px 20px;
        /*border: 1px solid lightgrey;*/
        border-radius: 3px;
    }
    .btn {
        border: none; /* Remove borders */
        color: rgb(255, 255, 255); /* Add a text color */
        padding-top: 8px; /* Add some padding */
        padding-bottom: 8px; /* Add some padding */
        padding-left: 24px;
        padding-right: 24px;
        cursor: pointer; /* Add a pointer cursor on mouse-over */
    }
    .btn:hover {
        background-color: #45a049;
    }
    .btn-design{
        border-radius: 4px;
    }

    .success {
        background-color: #EF7922;
        width: 100%;
    } /* Green */
    .success:hover {background-color: #D76C1E;}
    .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }
    input[type=text] {
        width: 100%;
        margin-bottom: 10px;
        padding: 6px;
        border: 1px solid #fff;
        border-radius: 3px;
    }
    .cvc{
        padding-bottom: 10px;
        padding-top: 5px;
    }
    #card-element{
        width: 100%;
        margin-bottom: 10px;
        padding: 6px;
        /* border: 1px solid #ccc; */
        border-radius: 3px;
        background: #ffffff;
    }
</style>
<body>
    <div class="container row">
        <div class="design" style="width: 316px;">
            <!--<h3>Payment</h3>-->
            <br><br>
            <input  type="text" id="cardHolder" placeholder="Card holder name">
            <div class="cvc" id="card-element">
                
                <!-- Elements will create input elements here -->
            </div>

            <!-- We'll put the error messages in this element -->
            <div id="card-errors" role="alert"></div><br>
            <button class="btn success btn-design" id="submit" onClick="submit()">Pay</button>
            <br><br>
        </div>
    </div>

    <script>
        var publishKey = "{{ $publish_key }}";
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

            var clientSecret = "{{ $client_secret }}";
            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: document.getElementById('cardHolder').value
                    }
                },
                setup_future_usage: 'off_session'
            }).then(function(result) { 
                var orderId = "{{ $orderId }}";
                if (result.error) {
                    // Show error to your customer
                    var url = "{{ route('stripe_payment_failed', ":orderId") }}";
                    url = url.replace(':orderId', orderId);
                    window.location.href = url;
                    console.log(result.error.message);
                } else {
                    if (result.paymentIntent.status === 'succeeded') {
                        var url = "{{ route('stripe_payment_success', ":orderId") }}";
                        url = url.replace(':orderId', orderId);
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
</body>

</html>

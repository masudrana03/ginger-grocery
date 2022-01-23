{{-- @extends('frontend.layouts.app')
{{-- @section('title', 'Save cards') --}}

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
          margin-left: 5vw;
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

      .card-info{
        list-style: none;
        margin-left: 9%;
        padding: 15px 6px 17px 18px;
      }
        
      </style>

<div class="container">
    
      <div class="row shadow-lg p-3 mb-5 bg-white rounded main-row">
          <div class="card" >
              <div class="card-body">
                <h3 class="card-title card-title-name">Payment Information</h5>
  
                 <div class="row">
                  <div class="form-group">
                      <label for="input" class="form-label"></label>
                      <ul class="card-info">
                        @foreach ($paymentMethods as $paymentMethod)
                        <li class="card-list">
                            <input class="payment" type="radio" id="cardHolder-{{ $paymentMethod->id }}" name="fav_language"
                                value="{{ $paymentMethod->id }}">
                            <label for="cardHolder-{{ $paymentMethod->id }}">{{ $paymentMethod->billing_details->name }}
                                {{ $paymentMethod->card->last4 }}</label>
                        </li>
                    @endforeach
                      </ul>
                  </div>
                </div>
  
                 <div class="row ">
                   <div class="col-6">
                    <button class="btn success btn-design" id="pay">Pay</button>
                   </div>

                   <div class="col-6">
                    <button class="btn success btn-design" id="new">Add new</button>
                    <input type="hidden" id="invoiceId" value="{{ $invoiceId }}">
                   </div>
                 </div>
              </div>
          </div>
      </div>
       
  </div>









{{-- <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row"> --}}
{{-- <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center"> --}}
{{-- <div class="design" style="width: 400px; margin: 0 auto;">
    <br><br>
    <ul style="list-style: none;">
        @foreach ($paymentMethods as $paymentMethod)
            <li>
                <input class="payment" type="radio" id="cardHolder-{{ $paymentMethod->id }}" name="fav_language"
                    value="{{ $paymentMethod->id }}">
                <label for="cardHolder-{{ $paymentMethod->id }}">{{ $paymentMethod->billing_details->name }}
                    {{ $paymentMethod->card->last4 }}</label>

            </li>
        @endforeach
    </ul>
    <button class="btn success btn-design" id="pay">Pay</button> &nbsp; &nbsp;
    <button class="btn success btn-design" id="new">Add new card </button>
    <input type="hidden" id="invoiceId" value="{{ $invoiceId }}">
</div> --}}
{{-- </div> --}}
{{-- </div>
        </div>
    </div> --}}

    {{-- design from safin --}}



{{-- @endsection --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    document.getElementById("pay").onclick = function() {
        var invoiceId = document.getElementById("invoiceId").value;
        var paymentMethodId = $("input:radio.payment:checked").val();
        var url = "{{ route('payment_from_saved_card', [':invoiceId', ':paymentMethodId']) }}";

        url = url.replace(':invoiceId', invoiceId);
        url = url.replace(':paymentMethodId', paymentMethodId);

        window.location.href = url;
    };

    document.getElementById("new").onclick = function() {
        var invoiceId = document.getElementById("invoiceId").value;
        var url = "{{ route('payment_from_card', ':invoiceId') }}";

        url = url.replace(':invoiceId', invoiceId);

        window.location.href = url;
    };
</script>

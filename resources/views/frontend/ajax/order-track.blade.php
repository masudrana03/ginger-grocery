

 <div class="col-md-12">
    {{-- <div class="login_wrap widget-taber-content p-30 background-white border-radius-10"> --}}
        <div class="content" style="width:100%; border-radius: 15px;">
            <div class="content1" style="background-color: #3bb77e; padding: 13px; border-radius: 10px;">
              <h4 style="font-size: 28px; padding: 10px; color: #fff; text-transform: uppercase;">Order Tracking : Order No</h4>
            </div>
            <div class="content2" style="background-color: #79d1a9; border-radius: 10px;" >
              <div class="content2-header1">
                <p>Shipped Via : <span>Ipsum Dolor</span></p>
              </div>
              <div class="content2-header1">
                <p>Status : <span>Checking Quality</span></p>
              </div>
              <div class="content2-header1">
                <p>Expected Date : <span style="">7-NOV-2015</span></p>
              </div>
              <div class="clear"></div>
            </div>
            <div class="content3">
              <div class="shipment">
                <div class="confirm">
                  <div class="imgcircle {{ in_array('Pending', $orderStatus) ? 'active' : '' }}">
                    <img src="{{ asset('assets/frontend/imgs/theme/confirm.png') }}" alt="confirm order">
                  </div>
                  <span class="line {{ $currentStatus != 'Pending' ? 'active' : 'deactivate' }}"></span>
                  <p>Confirmed Order</p>
                </div>
                <div class="process">
                  <div class="imgcircle {{ in_array('Processing', $orderStatus) ? 'active' : '' }}">
                    <img src="{{ asset('assets/frontend/imgs/theme/process.png') }}" alt="process order">
                  </div>
                  <span class="line {{ $currentStatus != 'Processing' ? 'active' : 'deactivate' }}"></span>
                  <p>Processing Order</p>
                </div>
                <div class="quality">
                  <div class="imgcircle {{ in_array('Product On The Way', $orderStatus) ? 'active' : '' }}">
                    <img src="{{ asset('assets/frontend/imgs/theme/quality.png') }}" alt="quality check">
                  </div>
                  <span class="line {{ $currentStatus != 'Product On The Way' ? 'active' : 'deactivate' }}"></span>
                  <p>On The Way</p>
                </div>
                <div class="dispatch">
                  <div class="imgcircle {{ in_array('Delivered', $orderStatus) ? 'active' : '' }}">
                    <img src="{{ asset('assets/frontend/imgs/theme/dispatch.png') }}" alt="dispatch product">
                  </div>

                  {{-- <span class="line "></span> --}}

                  <p>Delivered</p>
                </div>

                {{-- <div class="delivery">
                  <div class="imgcircle">
                    <img src="{{ asset('assets/frontend/imgs/theme/delivery.png') }}" alt="delivery">
                  </div>
                  <p>Product Delivered</p>
                </div> --}}

                <div class="clear"></div>
              </div>
            </div>
          </div>
    {{-- </div> --}}
</div>

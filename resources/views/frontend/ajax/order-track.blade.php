<div class="col-md-12">
    {{-- <div class="login_wrap widget-taber-content p-30 background-white border-radius-10"> --}}
    <div class="content" style="width:100%; border-radius: 15px;">
        <div class="content1" style="background-color: #3bb77e; padding: 13px; border-radius: 10px;">
            <h4 style="font-size: 28px; padding: 10px; color: #fff; text-transform: uppercase;">Order Tracking : Order
                No. {{ $order->invoice_id }}</h4>
        </div>
        <div class="content2" style="background-color: #79d1a9; border-radius: 10px;">
            <div class="content2-header1">
                <p>Sold By : <span> {{ $order->store->name }} </span></p>
            </div>
            <div class="content2-header1">
                <p>Status : <span>{{ $currentStatus }}</span></p>
            </div>
            <div class="content2-header1">
                <p>Created Date : <span style="">{{ $order->created_at->format('F j, Y') }}</span></p>
            </div>
            <div class="clear"></div>
        </div>

        {{--
          if any order option added,
          please added also hear with the order option name.
        --}}

        @php
            $status = ['Order Placed', 'Processing', 'Product On The Way', 'Delivered'];
            $img = ['confirm.png', 'process.png', 'quality.png', 'dispatch.png'];
            $class = ['confirm', 'process', 'quality', 'dispatch'];
            $complete = 1;
            $total = count($status) - 1;
        @endphp

        <div class="content3">
            <div class="shipment">

                @foreach ($status as $key => $status)

                @php
                    if ($currentStatus ==  $status) {
                        $complete = 0;
                    }
                @endphp

                    <div class="{{ $class[$key] }}">
                        @if($status == $currentStatus)
                        <div class="imgcircle {{ $key == $total ? 'active-step' : 'process-step'}}">
                            <img src="{{ asset('assets/frontend/imgs/theme/' . $img[$key]) }}" alt="confirm order">
                        </div>
                        <span class="line process-step {{ $key  == $total ? 'd-none' : '' }}"></span>
                        @else
                        <div class="imgcircle {{ $complete ==  1 ? 'active-step' : '' }}">
                            <img src="{{ asset('assets/frontend/imgs/theme/' . $img[$key]) }}" alt="confirm order">
                        </div>
                        <span class="line {{ $complete ==  1 ? 'active-step' : '' }} {{ $key  == $total ? 'd-none' : '' }}"></span>
                        @endif

                        <p>{{ $status }}</p>
                    </div>
                @endforeach

                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

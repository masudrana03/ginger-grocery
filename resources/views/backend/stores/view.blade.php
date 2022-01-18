@extends('backend.layouts.app')
@section('title', 'Store View')

@push('styles')
<style>
    table tbody tr td {
        font-size: 16px!important;
        color: #212527!important;
    }
    table tbody tr td a {
        color: #884FFB;
        font-size: 18px;
    }
    .total-payment1 .table tbody td,
    .total-payment1 table tbody td{
    padding: 14px 10px!important;;
    border-top: 0 !important;
    border-bottom: 1px solid #e4e8ec;
    border-radius: 10px !important;

    }

    .text-style{
        font-size: 14px!important;
        font-weight: 700 !important;
        color: #3d3d3d!important;
    }

    .custom_table{

    }
    .custom_table tr{

    }
    .custom_table tr td{

    }
    .custom_table tr td:first-child{
    color: #000;
    text-align: right;
    width: 25%;

    }
    .custom_table tr td:last-child{
    color: #000;
    width: 72%;
    }

    .mb-30{
        margin-top: 18px;
        padding-bottom: 30px;
    }

    .link{
        color: #084189!important;
        font-weight: bold;
        font-size: 12px;
    }

</style>
@endpush
@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Vendor Store Details</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="{{ route('admin.stores.index') }}" class="btn_1">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-30">
                            <div class="col-md-8">
                                <div class="total-payment total-payment1 p-3" style="border-radius: 15px; background-color: #f7fffb !important">
                                    <table class="table table-hover custom_table">
                                        <tbody>
                                            <tr>
                                                <td class="payment-title"><strong>Store Name :</strong></td>
                                                <td class="text-style">{{ $store->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Store Type :</strong></td>
                                                <td class="text-style">{{ $store->type }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Store Logo Image :</strong></td>
                                                <td class="text-dark "><img src="{{ asset('assets/img/uploads/stores/'.$store ->image) }} "style="border-radius: 5px;" alt="" width="150" height="150"></td>
                                            </tr>

                                            <tr>
                                                <td class="payment-title"><strong>Store Phone Number :</strong></td>
                                                <td class="text-style">{{ $store->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Established at :</strong></td>
                                                <td class="text-style">{{ $store->established_at }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Country Name :</strong></td>
                                                <td class="text-style">{{ $store->country ? $store->country->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Address :</strong></td>
                                                <td class="text-style">
                                                    address - {{ $store->address }}<br>
                                                    State   - {{ $store->state }}<br>
                                                    City    - {{ $store->city }}<br>
                                                    Zip     - {{ $store->zip }}<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Store Description :</strong></td>
                                                <td class="text-style">{{ $store->description }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Zone Name :</strong></td>
                                                <td class="text-style">{{ $store->zone ? $store->zone->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Social Links :</strong></td>
                                                <td class="text-style">
                                                    Facebook -  <a class="link" href="{{$store->facebook_link}}">{{$store->facebook_link}}</a> <br>
                                                    Instagram - <a class="link" href="{{$store->instagram_link}}">{{$store->instagram_link}}</a> <br>
                                                    Twitter  -  <a class="link" href="{{$store->twitter_link}}">{{$store->twitter_link}}</a> <br>
                                                    Youtube   - <a class="link" href="{{$store->youtube_link}}">{{$store->youtube_link}}</a> <br>
                                                    Pinterest - <a class="link" href="{{$store->pinterest_link}}">{{$store->pinterest_link}}</a> <br>
                                                </td>
                                                <a>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')


<script>
    // Dalivery Status Change
    function ChangeDeliveryManStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#deliveryManStatus-' + id).data('href');
                }
            });
        }
</script>

<script>
    // Dalivery Online Status Change
    function ChangeDeliveryManOnlineStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#deliveryManOnlineStatus-' + id).data('href');
                }
            });
        }
</script>
@endpush


@extends('backend.layouts.app')
@section('title', 'Contact View')

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
                                    <h3 class="m-0">Customer Contact Message</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="{{ route('admin.contact.massage') }}" class="btn_1">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-30">
                            <div class="col-md-8">
                                <div class="total-payment total-payment1 p-3" style="border-radius: 15px; background-color: #fbf6f0 !important;">
                                    <table class="table table-hover custom_table">
                                        <tbody>
                                            <tr>
                                                <td class="payment-title"><strong>Name :</strong></td>
                                                <td class="text-style">{{ $contact->name }}</td>
                                            </tr>

                                            <tr>
                                                <td class="payment-title"><strong>Phone :</strong></td>
                                                <td class="text-style">{{ $contact->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Email :</strong></td>
                                                <td class="text-style">{{ $contact->email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Subject :</strong></td>
                                                <td class="text-style">{{ $contact->subject }}</td>
                                            </tr>
                                            <tr>
                                                <td class="payment-title"><strong>Message :</strong></td>
                                                <td class="text-style">{{ $contact->massage }}</td>
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


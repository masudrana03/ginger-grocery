@extends('backend.layouts.app')
@section('title', 'Orders')
<style>
    .dataTables_wrapper{
         height: 100vh !important;
    }

</style>

@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0 ">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-1">
                                <div class="main-title">
                                    <h3 class="m-0">Orders</h3>
                                </div>
                                {{-- <div class="add_button ml-10">
                                    <a href="{{ route('admin.orders.create') }}" class="btn_1">Add New</a>
                                </div> --}}
                            </div>

                        </div>
                        <div class="white_card_body ">
                            <div class="table-responsive">
                                <table class="table" id="orders">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Invoice Id</th>
                                            <th>User</th>
                                            <th>Store</th>
                                            <th>Subtotal</th>
                                            <th>Discount</th>
                                            {{-- <th>Adjust</th> --}}
                                            <th>Total</th>
                                            <th>Payment Status</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        function deleteBrand(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>

    <script>
        // Banner Status Change
        function ChangeOrderStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#orderStatus-' + id).data('href');
                }
            });
        }
    </script>

    <script>
        // Banner Status Change
        function ChangePaymentStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#paymentStatus-' + id).data('href');
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#orders').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ $url }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "invoice_id"
                    },
                    {
                        "data": "user_id"
                    },
                    {
                        "data": "store_id"
                    },
                    {
                        "data": "subtotal"
                    },
                    {
                        "data": "discount"
                    },
                    // {
                    //     "data": "adjust"
                    // },
                    {
                        "data": "total"
                    },
                    {
                        "data": "payment_status"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "actions"
                    }
                ]

            });
        });
    </script>
@endpush

@extends('backend.layouts.app')
@section('title', 'Taxes')

@push('styles')
<style>
    #banners_previous {
        padding-right: 57px!important;
    }
    table tbody tr td {
        font-size: 14px!important;
        color: #212527!important;
    }
    table tbody tr td a {
        color: #884FFB;
        font-size: 18px;
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
                                    <h3 class="m-0">Taxes</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="{{ route('taxes.create') }}" class="btn_1">Add New</a>
                                </div>
                            </div>

                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="taxes">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Percentage</th>
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
    function deleteBanner(id) {
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
                  document.getElementById('delete-form-'+id).submit();
              }
            })
    }
</script>

<script>
    // Banner Status Change
    function ChangeBannerStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#bannerStatus-' + id).data('href');
                }
            });
        }
</script>

<script>
    $(document).ready(function () {
        $('#taxes').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('allTaxes') }}",
                     "dataType": "json",
                     "type": "GET",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "title" },
                { "data": "percentage" },
                { "data": "status" },
                { "data": "created_at" },
                { "data": "actions" }
            ]

        });
    });
</script>
@endpush


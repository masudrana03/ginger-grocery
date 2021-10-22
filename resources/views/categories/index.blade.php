@extends('layouts.app')
@push('styles')
<style>
    #categories_previous {
        padding-right: 57px!important;
    }
    table tbody tr td {
        font-size: 14px!important;
        color: #212527!important;
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
                                    <h3 class="m-0">Categories</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="{{ route('categories.create') }}" class="btn_1">Add New</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="categories">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Image</th>
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
    function deleteCategory(id) {
        Swal.fire({
            "title": "Are you sure?",
            "text": "You won't be able to revert this!",
            "type": 'warning',
            "showCancelButton": true,
            "confirmButtonColor": '#3085d6',
            "cancelButtonColor": '#d33',
            "confirmButtonText": 'Yes, delete it!',
            "cancelButtonText": 'No, cancel!',
            "confirmButtonClass": 'btn btn-success',
            "cancelButtonClass": 'btn btn-danger',
            "buttonsStyling": false,
            "reverseButtons": true,
            "timer":5000,
            "width":"32rem",
            "heightAuto":true,
            "padding":"1.25rem",
            "showConfirmButton":true,
            "showCloseButton":false,
            "icon":"warning"
            }).then((result) => {
              if (result.value) {
                  event.preventDefault();
                  document.getElementById('delete-form-'+id).submit();
              }
            })
    }
</script>

<script>
    $(document).ready(function () {
        $('#categories').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('allcategories') }}",
                     "dataType": "json",
                     "type": "GET",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "image" },
                { "data": "created_at" },
                { "data": "actions" }
            ]	 

        });
    });
</script>
@endpush


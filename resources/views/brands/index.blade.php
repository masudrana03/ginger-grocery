@extends('layouts.app')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Brands</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Brands</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="{{ route('brands.create') }}" class="btn_1">Add New</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                        <table class="table lms_table_active dataTable no-footer dtr-inline"
                                            id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                            style="width: 971px;">
                                            <thead>
                                                <tr role="row">
                                                    <th scope="col" class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 94px;" aria-sort="ascending"
                                                        aria-label="title: activate to sort column descending">Name</th>
                                      
                                                    <th scope="col" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 103px;"
                                                        aria-label="Status: activate to sort column ascending">Status</th>

                                                    <th scope="col" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 103px;"
                                                        aria-label="Status: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse ($brands as $brand)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $brand->name }}</td>
                                                        <td><a href="#" class="status_btn">Active</a></td>
                                                        <td>
                                                            <a href="{{ route('brands.edit', $brand->id) }}" class=""><i
                                                            class="far fa-edit"></i></a> 
                                                            <a href="#" class="" onclick="deleteBrand({{ $brand->id }})"><i
                                                            class="fas fa-trash"></i></a>
                                                            <form id="delete-form-{{ $brand->id }}" action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                        
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p style="text-align: center;">No data found!</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 11 entries</div>
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled"
                                                aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                                id="DataTables_Table_0_previous"><i class="ti-arrow-left"></i></a><span><a
                                                    class="paginate_button current" aria-controls="DataTables_Table_0"
                                                    data-dt-idx="1" tabindex="0">1</a><a class="paginate_button "
                                                    aria-controls="DataTables_Table_0" data-dt-idx="2"
                                                    tabindex="0">2</a></span><a class="paginate_button next"
                                                aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0"
                                                id="DataTables_Table_0_next"><i class="ti-arrow-right"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script type="text/javascript">
    function deleteBrand(id) {
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
@endpush


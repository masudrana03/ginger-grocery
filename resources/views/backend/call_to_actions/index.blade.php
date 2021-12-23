@extends('backend.layouts.app')
@section('title', 'Call To Action')

@push('styles')
<style>
    #brands_previous {
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
                                    <h3 class="m-0">Call To Action</h3>
                                </div>
                            </div>

                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="brands">
                                    <thead>
                                        <tr>
                                            <th>Store Name</th>
                                            <th>Action location</th>
                                            <th>Action tittle</th>
                                            <th>Action Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($callToActions as $action)
                                        @php
                                        $class = $action->status == 'Active' ? 'status_btn' : 'status_btn_danger';
                                        $updateStatus = route('admin.callToAction.update_status', $action->id );
                                        $img          = asset( 'assets/img/uploads/actions/thumbnail/' . $action->image );
                                        @endphp

                                        <tr>
                                            <td>{{$action->store->name}}</td>
                                            <td>{{$action->action_tittle}}</td>
                                            <td>{{$action->action_location}}</td>
                                            <td><img src='{{$img}}' width='60'></td>
                                            {{-- <td>{{$action->status}}</td> --}}
                                            <td>
                                                <a href='javascript:void(0)' data-href='{{$updateStatus}}' data-toggle='tooltip' title='Change status' class='{{$class}}' onclick='ChangeActionStatus({{$action->id}})' id='actionStatus-{{$action->id}}'>{{$action->status}}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.call_to_actions.edit', $action->id) }}"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <p class="text-center">No Call to Action found!</p>
                                        @endforelse
                                    </tbody>
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

<script>
    // Dalivery Status Change
    function ChangeActionStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#actionStatus-' + id).data('href');
                }
            });
        }
</script>
@endpush


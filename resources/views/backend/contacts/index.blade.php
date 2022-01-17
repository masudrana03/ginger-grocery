@extends('backend.layouts.app')
@section('title', 'Contact Us')

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

    .white_btn10{
        font-weight: 700;
    }
    .white_btn10:hover{
        color: #fff !important;
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
                                    <h3 class="m-0">Contact Information</h3>
                                </div>
                                {{-- <div style="margin-left: 64%!important;" class="add_button ml-10">
                                    <a href="#" class="btn_1">Add New</a>
                                </div> --}}
                                <div class="add_button">
                                    <a class="white_btn10 btn_1" href="{{ route('admin.contact.massage') }}" >Contact Massages <img src="{{ asset('assets/img/menu-icon/comments--v1.png') }}" alt=""> ( {{$contactMassage->count()}} ) </a>
                                </div>
                            </div>

                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="brands">
                                    <thead>
                                        <tr>
                                            <th>Tittle</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Address location</th>
                                            <th>City</th>
                                            <th>Zip</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ( $contactInfo as $info )
                                        <tr>
                                            <td>{{$info->name}}</td>
                                            <td>{{$info->phone}}</td>
                                            <td>{{$info->email}}</td>
                                            <td>{{$info->country_id}}</td>
                                            <td>{{$info->state}}</td>
                                            <td>{{$info->address}}</td>
                                            <td>{{$info->city}}</td>
                                            <td>{{$info->zip}}</td>
                                            
                                            {{-- <td>{{$action->status}}</td> --}}

                                            <td>
                                                <a href="{{ route('admin.contacts.edit', $info->id) }}"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <p class="text-center">No Info found!</p>
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


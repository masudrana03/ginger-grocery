@extends('backend.layouts.app')
@section('title', 'Email Templates')

@push('styles')
    <style>
        #brands_previous {
            padding-right: 57px !important;
        }

        table tbody tr td {
            font-size: 14px !important;
            color: #212527 !important;
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
                <div class="col-lg-8">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Points</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="brands">
                                    <thead>
                                        <tr>
                                            <th>Purchase Target</th>
                                            <th>Get Points</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($points as $point)
                                            <tr>
                                                <td>{{ $point->purchase_target }}</td>
                                                <td>{{ $point->points }}</td>
                                                <td><a href='javascript:void(0)'
                                                        data-href="{{ route('points.update_status', $point->id) }} "
                                                        data-toggle='tooltip' title='Change status'
                                                        class="{{ $point->status == 'Active' ? 'status_btn' : 'status_btn_danger' }}"
                                                        onclick='ChangePointStatus({{ $point->id }})'
                                                        id='pointStatus-{{ $point->id }}'>{{ $point->status }}</a></td>
                                                <td><a href="{{ route('points.edit', $point->id) }}"><i
                                                            class="fas fa-edit"></i></a></td>
                                            </tr>
                                        @empty
                                            <p class="text-center">No layalty card found!</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Points to money</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('points.settings.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="body">Do you want to use loyalty cart?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input {{ settings('loyalty_cart_status') == 'Yes' ? 'checked' : '' }} name="loyalty_cart_status" class="form-check-input" type="radio" id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input {{ settings('loyalty_cart_status') == 'No' ? 'checked' : '' }} name="loyalty_cart_status" class="form-check-input" type="radio" id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="loyalty_points">Points</label>
                                        <input type="text" name="loyalty_points"
                                            class="form-control @error('loyalty_points') is-invalid @enderror"
                                            id="loyalty_points" aria-describedby="emailHelp" placeholder="loyalty_points"
                                            value="{{ old('loyalty_points') ?? settings('loyalty_points') }}">
                                        @error('loyalty_points')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="loyalty_points_value">Money ($)</label>
                                        <input type="text" name="loyalty_points_value"
                                            class="form-control @error('loyalty_points_value') is-invalid @enderror"
                                            id="loyalty_points_value" aria-describedby="emailHelp"
                                            placeholder="loyalty_points_value"
                                            value="{{ old('loyalty_points_value') ?? settings('loyalty_points_value') }}">
                                        @error('loyalty_points_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Banner Status Change
        function ChangePointStatus(id) {
            Swal.fire({
                title: 'Are you sure to change?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = $('#pointStatus-' + id).data('href');
                }
            });
        }
    </script>
@endpush

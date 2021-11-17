@extends('backend.layouts.app')
@section('title', 'Edit Points')

@push('styles')
    <style>
        .note-insert {
            display: none !important;
        }

    </style>
@endpush

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Edit Points</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('points.update', $point->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="purchase_target">Purchase Target</label>
                                    <input purchase_target="text" name="purchase_target" class="form-control @error('purchase_target') is-invalid @enderror"
                                        id="purchase_target" aria-describedby="emailHelp" placeholder="purchase_target"
                                        value="{{ old('purchase_target') ?? $point->purchase_target }}">
                                    @error('purchase_target')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="points">Points</label>
                                    <input type="text" name="points"
                                        class="form-control @error('points') is-invalid @enderror" id="points"
                                        aria-describedby="emailHelp" placeholder="points"
                                        value="{{ old('points') ?? $point->points }}">
                                    @error('points')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="body">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input {{ $point->status == 'Active' ? 'checked' : '' }} name="status"
                                            class="form-check-input" type="radio" id="inlineRadio1" value="Active">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input {{ $point->status == 'Inactive' ? 'checked' : '' }} name="status"
                                            class="form-check-input" type="radio" id="inlineRadio2" value="Inactive">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
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

@endpush

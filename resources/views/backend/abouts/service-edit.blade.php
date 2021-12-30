@extends('backend.layouts.app')
@section('title', 'Edit Call To Action')

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
                <div class="col-lg-10">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">About service Edit</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.call_to_actions.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="store">Store Name</label>
                                    <select name="store"
                                    class="form-control @error('store') is-invalid @enderror">
                                        <option value="">Select Store</option>
                                    @foreach ( $stores as $store )
                                        <option value="{{$store->id}}" {{ $store->id == $callToAction->store_id ? 'selected' : '' }} >{{$store->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('store')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="action_location">Action Location</label>
                                    <input subject="text" name="action_location" disabled
                                        class="form-control @error('action_location') is-invalid @enderror" id="action_location"
                                        aria-describedby="emailHelp" placeholder="Hear is your action location"
                                        value="{{ old('action_location') ?? $callToAction->action_location }}">
                                    @error('action_location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="action_tittle">Action Tittle</label>
                                    <input subject="text" name="action_tittle"
                                        class="form-control @error('action_tittle') is-invalid @enderror" id="action_tittle"
                                        aria-describedby="emailHelp" placeholder="Please write your tittle"
                                        value="{{ old('action_tittle') ?? $callToAction->action_tittle }}">
                                    @error('action_tittle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

@extends('backend.layouts.app')
@section('title', 'Create New Shipping service')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Create New Shipping Service</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('admin.shipping_services.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        aria-describedby="emailHelp" placeholder="Title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="title">Shipping Type</label>
                                        <select class="form-control" name="type">
                                            <option value="Free">Free</option>
                                            <option value="Flat rate">Flat rate</option>
                                            <option value="Condition on purchase">Condition on purchase</option>
                                            <option value="Condition on distance">Condition on distance</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="title">Condition Start</label>
                                        <input type="number" name="from" class="form-control" id="price"
                                            aria-describedby="emailHelp" placeholder="Start">
                                    </div>
                                    <div class="col-3">
                                        <label for="title">Condition End</label>
                                        <input type="number" name="to" class="form-control" id="price"
                                            aria-describedby="emailHelp" placeholder="End">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Fee</label>
                                    <input type="number" name="price"
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        aria-describedby="emailHelp" placeholder="Fee" value="{{ old('price') ?? 0 }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input checked name="status" class="form-check-input" type="radio" id="inlineRadio1"
                                            value="Active">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input name="status" class="form-check-input" type="radio" id="inlineRadio2"
                                            value="Inactive">
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

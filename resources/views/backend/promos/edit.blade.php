@extends('backend.layouts.app')
@section('title', 'Edit Promo')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Edit Promo</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('promos.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" placeholder="Title" value="{{ old('title') ?? $promo->title }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type"
                                    class="form-control @error('type') is-invalid @enderror">
                                        <option value="amount" {{ $promo->type == 'amount' ? 'selected' : '' }}>Fixed Amount</option>
                                        <option value="percentage" {{ $promo->type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Code</label>
                                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" aria-describedby="emailHelp" placeholder="Code" value="{{ old('code') ?? $promo->code }}">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Limit</label>
                                    <input type="text" name="limit" class="form-control @error('limit') is-invalid @enderror" id="limit" aria-describedby="emailHelp" placeholder="Limit" value="{{ old('limit') ?? $promo->limit }}">
                                    @error('limit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input {{ $promo->status == 'Active' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio1" value="Active">
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input {{ $promo->status == 'Inactive' ? 'checked' : '' }} name="status" class="form-check-input" type="radio" id="inlineRadio2" value="Inactive">
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

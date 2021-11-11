@extends('layouts.app')
@section('title', 'Edit Email Template')

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
                                    <h3 class="m-0">Edit Email Template</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form action="{{ route('email_templates.update', $emailTemplate->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                                        id="type" aria-describedby="emailHelp" placeholder="type"
                                        value="{{ old('type') ?? $emailTemplate->type }}">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input subject="text" name="subject"
                                        class="form-control @error('subject') is-invalid @enderror" id="subject"
                                        aria-describedby="emailHelp" placeholder="subject"
                                        value="{{ old('subject') ?? $emailTemplate->subject }}">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body">Email Body</label>
                                    <textarea name="body" class="form-control @error('body') is-invalid @enderror"
                                        id="summernote"
                                        aria-describedby="emailHelp">{{ old('body') ?? $emailTemplate->body }}</textarea>
                                    @error('body')
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
                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Short Code Explanation</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">BB Code</th>
                                            <th scope="col">Meaning</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{user_name}</td>
                                            <td>Name of the customer</td>
                                        </tr>
                                        <tr>
                                            <td>{invoice_number}</td>
                                            <td>Invoice Number</td>
                                        </tr>
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
   
@endpush

@extends('backend.layouts.app')
@section('title', 'Email Templates')


@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Email Templates</h3>
                                </div>
                            </div>

                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="brands">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Subject</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($emailTemplates as $emailTemplate)
                                        <tr>
                                            <td>{{ $emailTemplate->type }}</td>
                                            <td>{{ $emailTemplate->subject }}</td>
                                            <td><a href="{{ route('admin.email_templates.edit', $emailTemplate->id) }}"><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                        @empty
                                        <p class="text-center">No email template found!</p>
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

@endpush


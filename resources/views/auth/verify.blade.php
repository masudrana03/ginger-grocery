@extends('frontend.layouts.app')

@push('css')
    <style>
        button.submit,
        button[type='submit'] {
            font-size: 14px;
            font-weight: 500;
            padding: 12px 24px;
            color: #ffffff;
            border: none;
            background-color: #3BB77E;
            border: 1px solid #29A56C;
            border-radius: 10px;
            margin-top: 2%;
        }

        .card {
            height: 32vh;
            box-shadow: 0 2px 10px 0 rgb(0 0 0 / 8%), 0 6px 17px 0 rgb(0 0 0 / 19%);
            border-radius: 10px;
        }
        .card .card-header {
            background-color: #fff2d6;
        }
        .btn-shadow{
            /* box-shadow: 2px -2px 12px 2px rgb(0 0 0 / 25%), 4px 0px 22px 2px rgb(0 0 0 / 8%); */
            box-shadow: 0px -3px 10px -5px rgb(0 0 0 / 2%), -8px -8px 14px 4px rgb(0 0 0 / 12%);
        }
        .contain{
            padding-top: 2%;
        }

    </style>
@endpush

@section('content')
    <div class="container contain">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Verify Your Email Address') }}</h4>
                    </div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                <h5>{{ __('A fresh verification link has been sent to your email address.') }}</h5>
                            </div>
                        @endif

                        <h5>{{ __('Before proceeding, please check your email for a verification link.') }}</h5>
                        <h5>{{ __('If you did not receive the email') }},</h5>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                            {{-- <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>. --}}

                            <button type="submit"
                                class="btn btn-shadow">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;
            var checkUrl = "{{ url('/email/verify') }}";

            if (currentUrl == checkUrl) {
                $('#newsletterSection').empty();
            }
        });
    </script>
@endpush

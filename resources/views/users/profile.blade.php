@extends('layouts.app')
@push('styles')

@endpush
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card">
                        {{-- <div class="card-header"><img class="img-fluid"
                                src="{{ asset('assets/img/profilebox/1.jpg') }}" alt="" data-original-title="" title="">
                        </div>
                        <div class="card-profile"><img class="rounded-circle"
                                src="{{ asset('assets/img/profilebox/7.jpg') }}" alt="" data-original-title="" title="">
                        </div> --}}
                        <div class="text-center profile-details">
                            <h4>{{ $user->name }}</h4><br>
                            {{-- <h6>Manager</h6> --}}
                            <a href="{{ route('users.edit', auth()->id()) }}" type="button" class="btn btn-primary mb-3">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-8 box-col-6">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{ $user->phone }}
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

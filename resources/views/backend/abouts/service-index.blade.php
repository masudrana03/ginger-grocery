@extends('backend.layouts.app')
@section('title', 'About Service')

@section('content')
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">About service</h3>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="{{ route('admin.about.service.edit') }}" class="btn_1">Edit</a>
                                </div>
                            </div>

                        </div>
                        <div class="white_card_body">
                            <div class="table-responsive">
                                <table class="table" id="brands">
                                    <thead>
                                        <tr>
                                            <th>Service Tittle</th>
                                            <th>Service Description</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>{{$aboutService->service_section_tittle1}}</td>
                                            <td>{{$aboutService->service_section_description1}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$aboutService->service_section_tittle2}}</td>
                                            <td>{{$aboutService->service_section_description2}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$aboutService->service_section_tittle3}}</td>
                                            <td>{{$aboutService->service_section_description3}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$aboutService->service_section_tittle4}}</td>
                                            <td>{{$aboutService->service_section_description4}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$aboutService->service_section_tittle5}}</td>
                                            <td>{{$aboutService->service_section_description5}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$aboutService->service_section_tittle6}}</td>
                                            <td>{{$aboutService->service_section_description6}}</td>
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

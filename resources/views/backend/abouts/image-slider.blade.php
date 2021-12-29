@extends('backend.layouts.app')
@section('title', 'About Image slider')

@section('content')
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">About Image slider</h3>
                            </div>
                        </div>

                    </div>
                    <div class="white_card_body">
                        <div class="table-responsive">
                            <table class="table" id="brands">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $aboutsImage  as $items )
                                    @php
                                        $img  = asset( 'assets/img/uploads/abouts' . $items ->image );
                                    @endphp
                                    <tr>
                                        <td>{{ $items->id }}</td>
                                        <td><img src='{{$img}}' width='60'></td>
                                        <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                    </tr>
                                    @empty
                                    <p class="text-center">About Image not found!</p>
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

@extends('frontend.layouts.app')
@section('title', 'Home')

@section('content')
<div id="app">
    @include('frontend.partials.home-slider')
    @include('frontend.partials.featured-categories')
    @include('frontend.partials.home-banners')
    @include('frontend.partials.popular-products')
</div>
{{-- @include('frontend.partials.best-sales') --}}


@endsection
@section('script')
<script>
   let old_data = $('#app').html();
   let loading = `<section class="product-tabs section-padding position-relative">
<div class="container">
<div class="section-title style-2 wow animate__animated animate__fadeIn">
<h3>Search Result . . .</h3>
<p>loading . . .</p>
</div>
</div>
</section>`;
    $(function (){
        $('#search-input').on('keyup', function () {
            let search = $('#search-input').val();
            if(search.length > 2){
                loadHome(search);
                $('#app').html(loading);
            }else{
                $('#app').html(old_data);
            }
        });
    });

    function loadHome(search, page = 1) {
        $.ajax({
            method: 'POST',
            url: "{!! route('index.part.ajax') !!}",
            data: {
                search: search,
                page: page,
            },
            success: function(html) {
                $('#app').html(html);

                paginationClickEvent(search);

                $('html, body').animate({
                    scrollTop: $("body").offset().top
                }, 2000);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function paginationClickEvent(search) {
        $('.page-link').on('click', function (e) {
            e.preventDefault();
            let page = $(this).text();
            loadHome(search, page);
        });
    }
</script>
    
@endsection
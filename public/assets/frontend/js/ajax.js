$(document).ready(function () {

    // wishlist ajax function start
    // wishlist add button start

    $(".wishlist-btn").click(function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");
        var url = "{!! route('wishlist', ':id') !!}";
        url = url.replace(':id', id);
        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: id,
            },
            success: function (result) {
                if (result == '401') {
                    window.location.href = "/login";
                } else {
                    $('#wishlistProductOld').empty();
                    $('#wishlistProductNew').html(result);
                    tata.success('Success!', 'Product added to wishlist.');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    // wishlist add button End


    // wishlist remove button start

    $(".wishlist-btn-delete").click(function (event) {
        event.preventDefault();

        var id = $(this).attr("data-id");
        var url = "{!! route('wishlist.remove', ':id') !!}";
        url = url.replace(':id', id);

        $.ajax({
            method: 'GET',
            url: url,
            data: {
                id: id,
            },
            success: function (result) {
                $('#wishlistProductOld').empty();
                $('#wishlistProductNew').html(result);
                tata.success('Success!', 'Product removed from wishlist.');

            },
            error: function (error) {
                console.log(error);
            }
        });
        $.ajax({
            method: 'GET',
            url: "{{ route('wishlistByDefaultId.remove') }}",
            success: function (result) {
                $('#oldWishlistProductTable').empty();
                $('#newWishlistProductTable').html(result);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

     // wishlist remove button End






































});

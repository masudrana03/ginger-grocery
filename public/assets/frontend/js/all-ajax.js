(function ($) {
    $(document).on("click", ".wishlist-btn", function () {
        event.preventDefault();
        // alert('ajax call');
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
                    tata.success('Success!', 'Product added to wishlist.');
                    $('#wishlistProductOld').empty();
                    $('#wishlistProductNew').html(result);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
})(jQuery);

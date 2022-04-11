(function ($) {
    ("use strict");


  //Chal-Dal JS all will be here for cart.

    $("#chaldal-cart").hide();
    $("#side-bar").hide();

    var widthAdd = $("#width-add");

    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });


    $(document).on('click', '.chaldal-add-card', function () {
        var $data = $(this).attr('data-id');
        $("#chaldal-cart").show();
        widthAdd.addClass('width-84');
        $("#side-bar").hide();
    });

    $(document).on('click', '#cross-close', function () {
        var $data = $(this).attr('data-id');
        $("#chaldal-cart").hide();
        widthAdd.removeClass('width-84');
        $("#side-bar").show();
    });

    $(document).on('click', '.icon-bar', function () {
        var $data = $(this).attr('data-id');
        widthAdd.addClass('width-84');
        $("#chaldal-cart").show();
        $("#side-bar").hide();
    });





})(jQuery);


(function ($) {
    ("use strict");


    //Chal-Dal JS all will be here for cart.

    $("#chaldal-cart").hide();
    $("#side-bar").hide();

    var widthAdd = $("#width-add");

    // $(document).on('click', '.minus', function () {
    //     var $input = $(this).parent().find('input');
    //     var count = parseInt($input.val()) - 1;
    //     count = count < 1 ? 1 : count;
    //     $input.val(count);
    //     $input.change();
    //     alert($input.val());
    //     return false;
    // });
    $(document).on('click', '.plus', function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    $(document).on('click', '.icon-bar', function () {
        widthAdd.addClass('width-84');
        $("#chaldal-cart").show();
        $("#side-bar").hide();
    });





})(jQuery);


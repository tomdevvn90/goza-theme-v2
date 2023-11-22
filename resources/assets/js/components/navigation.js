(function ($) {
    "use strict";

    //Toggle Menu
    const gozaToggleMenu = () => {
        $('.nav-link.dropdown-toggle').append('<span class="handle-sub"></span>');
        
        $(document).on('click', '.handle-sub', function (e) {
            e.preventDefault();
            e.stopPropagation();
            let el = $(this).closest('.menu-item');
            $(el).toggleClass('li-active');
            $(el).children('.sub-menu.dropdown-menu').slideToggle();
            $(el).find('.handle-sub').toggleClass('active');
        });

        const MENU_HAMBERGER = $('#goza-hamberger'),
            $body = $('body'),
            MENU_CLOSE = $('.off-canvas-menu-closed');

        MENU_HAMBERGER.click(function () {
            $body.addClass('--menu-open');
        });

        MENU_CLOSE.click(function () {
            $body.removeClass('--menu-open');
        });
    }

    $(window).on("load", function () {
        gozaToggleMenu();
    });

})(jQuery);
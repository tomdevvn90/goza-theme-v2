(function ($) {
    "use strict";

    const beMiniCartPopup = () => {

        const cart_icon            = $('.goza-header-cart-icon'),
              menu_mini_cart       = $('#menu-mini-cart'),
              menu_mini_cart_main  = menu_mini_cart.find('.menu-mini-cart__main'),
              menu_mini_cart_close = menu_mini_cart.find('.menu-cart__close-button');
        
        cart_icon.on('click', function (e) {
            e.preventDefault();
            menu_mini_cart.addClass('active');
        });

        menu_mini_cart.on('click', function (e) {
            if( !menu_mini_cart_main.is(e.target) && menu_mini_cart_main.has(e.target).length === 0 ){
                $(this).removeClass('active');
            }
        });

        menu_mini_cart_close.on('click', function (e) {
            e.preventDefault();
            menu_mini_cart.removeClass('active');
        });

    }

    $(document).ready(function () {

    });

    $(window).on("load", function () {
        beMiniCartPopup();
    });

})(jQuery);
(function ($) {
    "use strict";

    //Tab Panel
    const gozaTabPanel= () => {

        $(document).on('click', '.nav-tabs .tab-item', function (e) {
            e.preventDefault();
            let el = $(this).closest('li');
            let tab_panel = $( $(this).attr('href') );
            let el_sl = el.siblings();
            let tab_panel_sl = tab_panel.siblings();
            el.addClass('active');
            el_sl.removeClass('active');
            tab_panel.addClass('active');
            tab_panel_sl.removeClass('active');

        });
    }

    $(window).on("load", function () {
        gozaTabPanel();
    });

})(jQuery);
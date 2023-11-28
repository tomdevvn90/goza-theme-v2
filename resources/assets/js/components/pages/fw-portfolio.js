(function ($) {
    "use strict";

    const gzFilterFwPortfolio = () =>{
        const $btnFilter = $('.gz-fw-portfolio-filter-categorys--item > a')

        $btnFilter.click(function(e){
            e.preventDefault();
        
            $btnFilter.removeClass('active')
            $(this).addClass('active')

            let $dataFilter = $(this).data('filter')
            __ajax_filter($dataFilter)
            

            function __ajax_filter(val = {}) {
                try {
                    $.ajax({
                       type: "post",
                       url: php_data.ajax_url,
                       dataType: "json",
                       data: {
                            action: "gz_load_filter_fw_portfolio",
                            dataFilter : $dataFilter
                       },
                       success: function (response) {
                        if ( response.success ) {
                            $('.gz-fw-portfolio-filter--list-posts').html( response.data );
                        }
                       }
                    });
        
                 } catch (e) {
                    console.log(e);
                }
            }

        })
    }

    $(window).on("load", function () {
        gzFilterFwPortfolio()
    });

})(jQuery);
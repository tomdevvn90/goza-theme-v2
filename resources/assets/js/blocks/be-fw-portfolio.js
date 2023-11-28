(function ($) {
    "use strict";

    const beFilterFwPortfolio = () =>{
        const $btnFilter   = $('.be-fw-portfolio-block-categorys--item > a')
        const $btnLoadmore = $('.be-fw-portfolio-block--loadmore-btn')

        $btnLoadmore.click(function(e){
            e.preventDefault();

            let page     = $(this).data('page'),
                maxPage  = $(this).data('max-page'),
                term     = $(this).data('term'),
                loadmore = this.getAttribute('data-loadmore'),
                actioned = 'loadmore',
                postsPerPpage = $(this).parents('.be-fw-portfolio-block').data('posts-per-page'),
                order         = $(this).parents('.be-fw-portfolio-block').data('order'),
                orderby       = $(this).parents('.be-fw-portfolio-block').data('orderby');

            page = page + 1;
            __ajax_filter({page, maxPage, term, loadmore, actioned, postsPerPpage, order, orderby})     
            $(this).parents('.be-fw-portfolio-block').find('.be-fw-portfolio-block--loadmore-btn').attr('data-page', page);;

        })

        $btnFilter.click(function(e){
            e.preventDefault();
        
            $btnFilter.removeClass('active')
            $(this).addClass('active')

            let dataFilter = $(this).data('filter'),
                page       = 1,
                actioned   = 'filter',
                postsPerPpage = $(this).parents('.be-fw-portfolio-block').data('posts-per-page'),
                order         = $(this).parents('.be-fw-portfolio-block').data('order'),
                orderby       = $(this).parents('.be-fw-portfolio-block').data('orderby');
            
            $(this).parents('.be-fw-portfolio-block').find('.be-fw-portfolio-block--loadmore-btn').attr('data-term', dataFilter);
            
            __ajax_filter({dataFilter, page, actioned, postsPerPpage, order, orderby})

        })

        function __ajax_filter(val = {}) {
            try {
                $.ajax({
                   type: "post",
                   url: php_data.ajax_url,
                   dataType: "json",
                   data: {
                        action: "be_load_item_fw_portfolio",
                        ...val,
                   },
                   success: function (data) {
                        $('.be-fw-portfolio-block--list-posts').html( data.items);

                        if (data.hideLoadMore)
                            $btnLoadmore.hide();
                        else
                            $btnLoadmore.show();
                    }
                });
    
             } catch (e) {
                console.log(e);
            }
        }
    }

    $(window).on("load", function () {
        beFilterFwPortfolio()
    });

})(jQuery);
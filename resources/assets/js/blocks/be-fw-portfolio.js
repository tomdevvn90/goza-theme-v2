(function ($) {
    "use strict";

    const beFilterFwPortfolio = () =>{
        const $btnFilter   = $('.be-fw-portfolio-block-categorys--item > a')
        const $btnLoadmore = $('.be-fw-portfolio-block--loadmore-btn')
        const $result      = $('.be-fw-portfolio-block--list-posts');

        $btnLoadmore.click(function(e){
            e.preventDefault();

            let page     = this.getAttribute('data-page'),
                maxPage  = $(this).data('max-page'),
                term     = $(this).data('term'),
                actioned = 'loadmore',
                postsPerPpage = $(this).parents('.be-fw-portfolio-block').data('posts-per-page'),
                order         = $(this).parents('.be-fw-portfolio-block').data('order'),
                orderby       = $(this).parents('.be-fw-portfolio-block').data('orderby');
            
            __ajax_load_item({page, maxPage, term, actioned, postsPerPpage, order, orderby})     

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
            
            __ajax_load_item({dataFilter, page, actioned, postsPerPpage, order, orderby})

        })

        function __ajax_load_item(val = {}) {
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
                        
                        if(val.actioned == 'filter'){
                            $result.html( data.items);
                        }else{
                            let page = ++val.page
                            $result.append( data.items);
                            $btnLoadmore.attr('data-page', page);

                            setTimeout( function() {
                                $('html, body').stop().animate({scrollTop: $btnLoadmore.offset().top - 350}, 1000);
                            }, 500);
                        }    
                        
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
(function ($) {
    "use strict";

    const beTabFaqs = () =>{
        const $tabItem =  $('.be-tab-faqs-block--header li'),
              $btnFaq  =  $('.be-tab-faqs-block .item-faq--question')

        $tabItem.click(function(e){
            let $dataTab = $(this).data('tab')

            $(this).siblings().removeClass('active')
            $(this).addClass('active')

            $(this).parents('.be-tab-faqs-block').find('.tab-item').hide()
            $(this).parents('.be-tab-faqs-block').find(`.tab-item.${$dataTab}`).show()
        });

        $btnFaq.click(function(e){
            $(this).parent().siblings().find('.item-faq--answer').slideUp('slow')
            $(this).parent().find('.item-faq--answer').slideToggle('slow')

            $(this).parent().siblings().removeClass('active')
            $(this).parent().toggleClass('active')
        })
    }

    $(window).on("load", function () {
        beTabFaqs()
    });

})(jQuery);

(function ($) {
    "use strict";

    const beEventsListing = () =>{

        const $block = $('.be-events-listing-block');
		if ($block.length === 0) return;

        const $tplDefault = $('.be-events-listing-block.is-style-default');

        if($tplDefault.length > 0){
           
            $tplDefault.find('.item-event').first().removeClass('__hide');
            $tplDefault.find('.item-event').first().find('.item-event--excerpt').show('1000')

            $(document).on( 'click', '.item-event.__hide .item-event--icon-toggle', function(e){    
                e.preventDefault();

                $('.item-event').addClass('__hide')
                $('.item-event').find('.item-event--excerpt').hide('1000')

                $(this).parents('.item-event').removeClass('__hide')
                $(this).parents('.item-event').find('.item-event--excerpt').show('1000')
            })
        }
    }


    $(window).on("scroll", function () {

    });

    $(document).ready(function () {
        beEventsListing()
    })

})(jQuery);
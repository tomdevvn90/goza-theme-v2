
(function ($) {
    "use strict";

    const beHanldeEvent = () =>{

        const $block = $('.be-ss-upcoming-event-video--content-event-list-inner');
		if ($block.length === 0) return;

        $block.find('.item-event').first().removeClass('__hide');
        $block.find('.item-event').first().find('.item-event--excerpt').show('1000')

        $(document).on( 'click', '.item-event.__hide .item-event--icon-toggle', function(e){    
            e.preventDefault();

            $('.item-event').addClass('__hide')
            $('.item-event').find('.item-event--excerpt').hide('1000')

            $(this).parents('.item-event').removeClass('__hide')
            $(this).parents('.item-event').find('.item-event--excerpt').show('1000')
        })
    }

    $(document).ready(function () {
        beHanldeEvent()
    })

})(jQuery);
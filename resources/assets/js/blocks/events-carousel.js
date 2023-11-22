(function ($) {
    "use strict";

    const beEventsCarousel = () =>{

        const $block = $('.be-events-carousel');
		if ($block.length === 0) return;

        $block.each(function () {
            let $slider       = $(this).find('.be-events-carousel-inner'),
                $dataSlider   = $slider.data('carousel');
            
            let opt_df = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				autoplay: true,
				arrows: false,
                adaptiveHeight: true,
                fade: false,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 1
                      }
                    },
                  ]
			};
			$slider.slick(Object.assign({}, opt_df, $dataSlider));
        })
    }

    $(document).ready(function () {
        beEventsCarousel()
    })

})(jQuery);
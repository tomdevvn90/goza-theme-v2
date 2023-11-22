(function ($) {
    "use strict";

    const bePostsSlider = () =>{

        const $block = $('.be-post-slider-block');
		if ($block.length === 0) return;

        $block.each(function () {
            let $slider       = $(this).find('.be-post-slider-block-inner'),
                $dataSlider   = $(this).data('slider'),
                $style        = $(this).data('style'),
                $arrowTablet  = true,
                $arrowMobile  = false
            
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
                            arrows: $arrowTablet,
                            slidesToShow: 2
                      }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            arrows: $arrowMobile,
                            dots: true
                        }
                    },
                  ]
			};
			$slider.slick(Object.assign({}, opt_df, $dataSlider));
        })
    }

    $(document).ready(function () {
        bePostsSlider()
    })

})(jQuery);
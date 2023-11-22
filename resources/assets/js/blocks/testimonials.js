
(function ($) {
    "use strict";

    const beTestimonialCarousel = () => {

        const $block = $('.be-testimonials-block');
        if ($block.length === 0) return;

        $block.each(function () {
            let $carousel = $(this).find('.be-testimonials-block-carousel'),
                $dataCarousel = $(this).data('carousel'),
                $style = $(this).data('style'),
                $arrowTablet = true,
                $arrowMobile = false

            if ($style == 'is-style-default') {
                $arrowTablet = false
            }

            if ($style == 'is-style-2') {
                $arrowMobile = true
            }

            let opt_df = {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
                arrows: false,
                adaptiveHeight: false,
                fade: false,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: $arrowTablet,
                            slidesToShow: 1
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

            $carousel.slick(Object.assign({}, opt_df, $dataCarousel));
        })
    }

    const beSSTestimonials = () => {
        const $block = $('.be-section-w-testinials-block');
        if (!$block.length) return;

        $block.each(function () {
            let $carousel = $(this).find('.be-testimonials-list'),
                $dataCarousel = $(this).data('carousel');

            let opt_df = {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false, 
                autoplay: true,
                arrows: true,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>"
            };

            $carousel.slick(Object.assign({}, opt_df, $dataCarousel));
        })
    }

    $(document).ready(function () {
        beTestimonialCarousel();
        beSSTestimonials();
    })

})(jQuery);
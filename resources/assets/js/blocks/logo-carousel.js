jQuery(function ($) {
    "use strict";

    const GozaLogoCarousel = () => {
        const GozaLogoCarouselBlock = $('.goza-logo-carousel-block')
        if (!GozaLogoCarouselBlock.length) return;

        GozaLogoCarouselBlock.each(function () {
            const $self = $(this);
            const $carouselWrap = $self.find(".block-inner");
            let opt = $self.data("slider");
            // console.log(opt)

            let opt_df = {
                slidesToShow: 5,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
                arrows: false,
                infinite: true,
                prevArrow:"<button type='button' class='slick-arrows s-prev pull-left'></button>",
                nextArrow:"<button type='button' class='slick-arrows s-next pull-right'></button>",
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            };
            $carouselWrap.slick(Object.assign({}, opt_df, opt));
        });
    }

    $(document).ready(function () {
        GozaLogoCarousel();
    });

});
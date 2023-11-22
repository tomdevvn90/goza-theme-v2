(function ($) {
    "use strict";

    const beTestimonialSlider = () =>{

        const $testimonial = $('.be-ss-text-tsm-video .be-ss-text-tsm-video--testimonial-slider');
		if ($testimonial.length === 0) return;

        $testimonial.each(function () {
            const $dataSlider   = $(this).data('slider')

            let opt_df = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				autoplay: true,
				arrows: false,
                adaptiveHeight: true,
                fade: false,
                cssEase: 'linear',
			};

            $(this).slick(Object.assign({}, opt_df, $dataSlider));
        })
    }

    $(document).ready(function () {
        beTestimonialSlider()
    })

})(jQuery);
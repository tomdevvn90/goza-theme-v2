/**
 * Logo Carousel Wrap
 */

const GozaLogoCarousel = (props) => {
	// Setup the attributes
	const { attributes, setAttributes, className } = props;
	const { arrows, dots, infinite, speed, centerMode, autoplay, autoplaySpeed, slidesToShow, slidesToScroll, gap } = attributes
	let dataSlider = {
		slidesToShow: slidesToShow,
		slidesToScroll: slidesToScroll,
		arrows: arrows,
		dots: dots,
		infinite: infinite,
		speed: speed,
		centerMode: centerMode,
		autoplay: autoplay,
		autoplaySpeed: autoplaySpeed
	}
	return (
		<div className={['goza-logo-carousel-block', className].join(' ')} data-slider={JSON.stringify(dataSlider)} style={{ '--gap': gap }}>
			{props.children}
		</div>
	)
}

export default GozaLogoCarousel;
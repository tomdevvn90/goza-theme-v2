import GozaLogoCarousel from './block'
const Save = (props) => {
	const { attributes, setAttributes } = props
	const { images } = attributes
	return (
		<GozaLogoCarousel {...props}>
			<div className='block-inner goza-logo'>
				{images &&
					images.map((logo) => {
						return (
							<div className='goza-logo__item' key={logo.id}>
								<img src={logo.url} alt={logo.alt} id={logo.id} />
							</div>
						);
					})}
			</div>
		</GozaLogoCarousel>
	)
}

export default Save
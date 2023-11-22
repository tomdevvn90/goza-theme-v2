/**
 * Container wrapper
 */

// Setup the block
const { Component } = wp.element;

// Import block dependencies and components
import classnames from 'classnames';

/**
 * Create a Button wrapper Component
 */
export default class Container extends Component {
	constructor(props) {
		super(...arguments);
	}

	render() {
		// Setup the attributes
		const {
			attributes: {
				containerBackgroundColor,
				containerBgGradientColor,
				containerAlignment,
				containerPaddingTop,
				containerPaddingBottom,
				containerPaddingLeft,
				containerPaddingRight,
				containerMaxWidth,
				containerImgURL,
				focalPoint,
				containerImgAlt,
				opacityBg,
				videoURL,
				videoTitle,
				videoID
			},
		} = this.props;

		const styles = {
			textAlign: containerAlignment ? containerAlignment : undefined,
			'--paddingBottom': containerPaddingBottom.default,
			'--paddingBottomTablet': containerPaddingBottom.tablet,
			'--paddingBottomMobile': containerPaddingBottom.mobile,
			'--paddingTop': containerPaddingTop.default,
			'--paddingTopTablet': containerPaddingTop.tablet,
			'--paddingTopMobile': containerPaddingTop.mobile,
			'--paddingLeft': containerPaddingLeft.default,
			'--paddingLeftTablet': containerPaddingLeft.tablet,
			'--paddingLeftMobile': containerPaddingLeft.mobile,
			'--paddingRight': containerPaddingRight.default,
			'--paddingRightTablet': containerPaddingRight.tablet,
			'--paddingRightMobile': containerPaddingRight.mobile,
			backgroundColor: containerBgGradientColor ? '#FFF' : ''
		};

		const className = classnames(this.props.className, 'goza-block-container');

		return (
			<div
				style={styles}
				className={className ? className : undefined}
			>
				{(containerBackgroundColor || containerBgGradientColor) && (
					<div className='goza-container-bg goza-bg-color' style={{ background: containerBgGradientColor ? containerBgGradientColor : containerBackgroundColor ? containerBackgroundColor : '', opacity: opacityBg }}></div>
				)}

				{containerImgURL && !!containerImgURL.length && (
					<div className="goza-container-bg goza-bg-image">
						<img
							className="goza-container-image"
							src={containerImgURL}
							alt={containerImgAlt}
							style={{ 'objectPosition': focalPoint ? `${focalPoint.x * 100}% ${focalPoint.y * 100}%` : undefined }}
						/>
					</div>
				)}

				{videoURL && !!videoURL.length && (
					<div className="goza-container-bg goza-bg-video">
						<video autoPlay muted loop playsInline>
							<source src={videoURL} type="video/mp4" />
							Your browser does not support HTML5 video.
						</video>
						<span className='goza-container-bg-overlay'></span>
					</div>
				)}

				<div className="container" style={{ maxWidth: containerMaxWidth ? `${containerMaxWidth}px` : undefined }}>
					{this.props.children}
				</div>
			</div>
		);
	}
}
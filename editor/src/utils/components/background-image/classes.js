import { dimRatioToClass } from './shared';

/**
 * Background image classes.
 *
 * @param {Object} attributes
 */
function BackgroundImageClasses( attributes ) {
	return [
		attributes.backgroundDimRatio !== undefined &&
		100 !== attributes.backgroundDimRatio
			? 'goza-has-background-dim'
			: null,
		dimRatioToClass( attributes.backgroundDimRatio ),
		attributes.backgroundImgURL &&
		attributes.backgroundSize &&
		'no-repeat' === attributes.backgroundRepeat
			? 'goza-background-' + attributes.backgroundSize
			: null,
		attributes.backgroundImgURL && attributes.backgroundRepeat
			? 'goza-background-' + attributes.backgroundRepeat
			: null,
		attributes.hasParallax ? 'goza-has-parallax' : null,
	];
}

export default BackgroundImageClasses;

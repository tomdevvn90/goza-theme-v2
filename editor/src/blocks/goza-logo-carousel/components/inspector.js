
import { __ } from '@wordpress/i18n'
import { InspectorControls } from '@wordpress/block-editor';

import {
	PanelBody,
	RangeControl,
	ToggleControl,
	__experimentalNumberControl as NumberControl,
	TextControl
} from '@wordpress/components';

const Inspector = (props) => {
	const { setAttributes, attributes } = props
	const { arrows, dots, infinite, speed, autoplay, autoplaySpeed, centerMode, slidesToShow, slidesToScroll, gap } = attributes

	return (
		<InspectorControls>
			<PanelBody title="Slider Settings">
				<NumberControl
					label={__("slidesToShow", "goza")}
					isShiftStepEnabled={true}
					onChange={(vl) => setAttributes({ slidesToShow: vl })}
					shiftStep={1}
					value={slidesToShow}
				/>
				<NumberControl
					label={__("slidesToScroll", "goza")}
					isShiftStepEnabled={true}
					onChange={(vl) => setAttributes({ slidesToScroll: vl })}
					shiftStep={1}
					value={slidesToScroll}
				/>
				<TextControl
					label="Gap"
					value={gap}
					onChange={(value) => setAttributes({ gap: value })}
				/>
				<ToggleControl
					label={__("Arrows", "goza")}
					checked={arrows}
					onChange={() => setAttributes({ arrows: !arrows })}
				/>
				<ToggleControl
					label={__("Dots", "goza")}
					checked={dots}
					onChange={() => setAttributes({ dots: !dots })}
				/>
				<ToggleControl
					label={__("Infinite", "goza")}
					checked={infinite}
					onChange={() => setAttributes({ infinite: !infinite })}
				/>
				<ToggleControl
					label={__("centerMode", "goza")}
					checked={centerMode}
					onChange={() => setAttributes({ centerMode: !centerMode })}
				/>
				<ToggleControl
					label={__("Autoplay", "goza")}
					checked={autoplay}
					onChange={() => setAttributes({ autoplay: !autoplay })}
				/>
				<RangeControl
					label={__("Speed", "goza")}
					value={speed}
					onChange={(vl) => setAttributes({ speed: vl })}
					min={100}
					max={1000}
					step={100}
				/>
				<RangeControl
					label={__("Autoplay Speed", "goza")}
					value={autoplaySpeed}
					onChange={(vl) => setAttributes({ autoplaySpeed: vl })}
					min={100}
					max={5000}
					step={100}
				/>
			</PanelBody>
		</InspectorControls>
	)
}

export default Inspector
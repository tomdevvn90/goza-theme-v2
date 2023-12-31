/*
** Inspector
*/

// Setup the block
import { __ } from '@wordpress/i18n'

// Import block components
import { InspectorControls } from '@wordpress/block-editor'

// Import Inspector components
import {
	PanelBody,
	TextControl,
	ToggleControl
} from '@wordpress/components'

const Inspector = (props) => {

	const { attributes, setAttributes } = props;
	const { size } = attributes;

	const onChangeSize = (value, screen) => {
		let newSize = { ...size }
		newSize[screen] = value
		if (screen == 'default' && size.sync == true) {
			newSize.tablet = value
			newSize.mobile = value
		}
		setAttributes({ size: newSize })
	}

	const onChangeSizeResponsive = (value) => {
		let newSize = { ...size }
		newSize.sync = value
		setAttributes({ size: newSize })
	}

	return (
		<InspectorControls>
			<PanelBody title={__('Size')}>
				<TextControl
					help={__('Set size', 'goza')}
					value={size.default}
					onChange={(value) => {
						onChangeSize(value, 'default')
					}}
				/>
				{
					(() => {
						if (size.sync) return
						return (
							<div>
								<TextControl
									label={__('on Tablet (≦991px)', 'goza')}
									help={__('Set size for tablet', 'goza')}
									value={size.tablet}
									onChange={(value) => {
										onChangeSize(value, 'tablet')
									}}
								/>
								<TextControl
									label={__('on Mobile (≦767px)', 'goza')}
									help={__('Set size for mobile', 'goza')}
									value={size.mobile}
									onChange={(value) => {
										onChangeSize(value, 'mobile')
									}}
								/>
							</div>
						)
					})()

				}
				<ToggleControl
					label={__('Sync', 'goza')}
					help={__('Disable to custom size for each screen (Desktop, Tablet, Mobile)', 'goza')}
					checked={size.sync}
					onChange={onChangeSizeResponsive}
				/>
			</PanelBody>
		</InspectorControls>
	)
}

export default Inspector;
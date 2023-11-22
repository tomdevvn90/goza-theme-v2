
import {
	InspectorControls,
} from '@wordpress/block-editor'
import {
	ToggleControl, PanelBody, RangeControl, SelectControl, ColorPicker,
	__experimentalUnitControl as UnitControl
} from '@wordpress/components'

import { Fragment } from '@wordpress/element'
const Inspector = (props) => {
	const { attributes, setAttributes } = props
	const { colorBg, fullwidth, widthSep, heightSep, alignBlock } = attributes
	return (
		<InspectorControls>
			<Fragment>
				<PanelBody title='Settings'>
					<ToggleControl
						label="Fullwidth"
						checked={fullwidth}
						onChange={() => setAttributes({ fullwidth: !fullwidth })}
					/>
					{!fullwidth &&
						<SelectControl
							label="Alignment"
							value={alignBlock}
							options={[
								{ label: 'Left', value: 'left' },
								{ label: 'Center', value: 'center' },
								{ label: 'Right', value: 'right' },
							]}
							onChange={(value) => setAttributes({ alignBlock: value })}
						/>
					}

					{!fullwidth &&
						<UnitControl
							label="Width"
							onChange={(value) => setAttributes({ widthSep: value })}
							value={widthSep}
						/>
					}

					<RangeControl
						label="Height"
						value={heightSep}
						onChange={(value) => setAttributes({ heightSep: value })}
						min={0.5}
						step={0.5}
						max={100}
					/>
				</PanelBody>
				<PanelBody initialOpen={false}
					title='Color'>
					<ColorPicker
						color={colorBg}
						onChange={(value) =>
							setAttributes({ colorBg: value })
						}
						enableAlpha
					/>
				</PanelBody>
			</Fragment>
		</InspectorControls>
	)
}

export default Inspector
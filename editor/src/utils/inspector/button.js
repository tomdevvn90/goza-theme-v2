/**
 * Internal dependencies.
 */
import RenderSettingControl from '../../utils/components/settings/renderSettingControl';

const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { SelectControl, ToggleControl } = wp.components;
const { PanelColorSettings } = wp.blockEditor;

export default function ButtonSettings( props ) {
	const {
		enableButtonBackgroundColor,
		buttonBackgroundColor,
		onChangeButtonColor = () => {},
		enableButtonTextColor,
		buttonTextColor,
		onChangeButtonTextColor = () => {},
		enableButtonSize,
		buttonSize,
		onChangeButtonSize = () => {},
		enableButtonShape,
		buttonShape,
		onChangeButtonShape = () => {},
		enableButtonTarget,
		buttonTarget,
		onChangeButtonTarget = () => {},
	} = props;

	// Button size values
	const buttonSizeOptions = [
		{
			value: 'goza-button-size-small',
			label: __( 'Small', 'goza' ),
		},
		{
			value: 'goza-button-size-medium',
			label: __( 'Medium', 'goza' ),
		},
		{
			value: 'goza-button-size-large',
			label: __( 'Large', 'goza' ),
		},
		{
			value: 'goza-button-size-extralarge',
			label: __( 'Extra Large', 'goza' ),
		},
	];

	// Button shape
	const buttonShapeOptions = [
		{
			value: 'goza-button-shape-square',
			label: __( 'Square', 'goza' ),
		},
		{
			value: 'goza-button-shape-rounded',
			label: __( 'Rounded Square', 'goza' ),
		},
		{
			value: 'goza-button-shape-circular',
			label: __( 'Circular', 'goza' ),
		},
	];

	return (
		<Fragment>
			<RenderSettingControl id="gb_button_buttonOptions">
				{ false !== enableButtonTarget && (
					<ToggleControl
						label={ __(
							'Open link in new window',
							'goza'
						) }
						checked={ buttonTarget }
						onChange={ onChangeButtonTarget }
					/>
				) }
				{ false !== enableButtonSize && (
					<SelectControl
						selected={ buttonSize }
						label={ __( 'Button Size', 'goza' ) }
						value={ buttonSize }
						options={ buttonSizeOptions.map(
							( { value, label } ) => ( {
								value,
								label,
							} )
						) }
						onChange={ onChangeButtonSize }
					/>
				) }
				{ false !== enableButtonShape && (
					<SelectControl
						label={ __( 'Button Shape', 'goza' ) }
						value={ buttonShape }
						options={ buttonShapeOptions.map(
							( { value, label } ) => ( {
								value,
								label,
							} )
						) }
						onChange={ onChangeButtonShape }
					/>
				) }
				{ false !== enableButtonBackgroundColor && (
					<PanelColorSettings
						title={ __( 'Button Color', 'goza' ) }
						initialOpen={ false }
						colorSettings={ [
							{
								value: buttonBackgroundColor,
								onChange: onChangeButtonColor,
								label: __( 'Button Color', 'goza' ),
							},
						] }
					></PanelColorSettings>
				) }
				{ false !== enableButtonTextColor && (
					<PanelColorSettings
						title={ __( 'Button Text Color', 'goza' ) }
						initialOpen={ false }
						colorSettings={ [
							{
								value: buttonTextColor,
								onChange: onChangeButtonTextColor,
								label: __(
									'Button Text Color',
									'goza'
								),
							},
						] }
					></PanelColorSettings>
				) }
			</RenderSettingControl>
		</Fragment>
	);
}

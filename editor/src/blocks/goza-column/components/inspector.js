/**
 * Inspector Controls.
 */

/**
 * External dependencies.
 */
import map from 'lodash/map';
import columnLayouts from './column-layouts';
import Margin from './../../../utils/components/margin';
import Padding from './../../../utils/components/padding';
import BackgroundImagePanel from './../../../utils/components/background-image/inspector';
import RenderSettingControl from '../../../utils/components/settings/renderSettingControl';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { InspectorControls, PanelColorSettings, ContrastChecker } =
	wp.blockEditor;
const {
	PanelBody,
	RangeControl,
	ButtonGroup,
	Button,
	Tooltip,
	ToggleControl,
	SelectControl,
} = wp.components;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {
	render() {
		const {
			attributes,
			setAttributes,
			backgroundColor,
			setBackgroundColor,
			textColor,
			setTextColor,
		} = this.props;

		let selectedRows = 1;

		if ( attributes.columns ) {
			selectedRows = parseInt(
				attributes.columns.toString().split( '-' )
			);
		}

		/* CSS Units */
		const cssUnits = [
			{ value: 'px', label: __( 'Pixel (px)', 'goza-blocks' ) },
			{ value: '%', label: __( 'Percent (%)', 'goza-blocks' ) },
			{ value: 'em', label: __( 'Em (em)', 'goza-blocks' ) },
		];

		return (
			<InspectorControls key="inspector">
				{ attributes.layout && (
					/* Show the column settings once a layout is selected. */
					<PanelBody
						title={ __( 'General', 'goza-blocks' ) }
						initialOpen={ true }
						className="goza-column-select-panel"
					>
						<RenderSettingControl id="gb_column_columns">
							<RangeControl
								label={ __( 'Column Count', 'goza-blocks' ) }
								help={ __(
									"Note: Changing the column count after you've added content to the column can cause loss of content.",
									'goza-blocks'
								) }
								value={ attributes.columns }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										columns: value,
										layout: 'goza-' + value + '-col-equal',
									} )
								}
								min={ 1 }
								max={ 6 }
								step={ 1 }
							/>
						</RenderSettingControl>

						<hr />

						{ ( 2 === attributes.columns ||
							3 === attributes.columns ||
							4 === attributes.columns ) && (
							<Fragment>
								<RenderSettingControl id="gb_column_columnLayouts">
									<p>
										{ __(
											'Column Layout',
											'goza-blocks'
										) }
									</p>
									<ButtonGroup
										aria-label={ __(
											'Column Layout',
											'goza-blocks'
										) }
									>
										{ map(
											columnLayouts[ selectedRows ],
											( { name, key, icon } ) => (
												<Tooltip
													text={ name }
													key={ key }
												>
													<Button
														key={ key }
														className="goza-column-selector-button"
														isSmall
														onClick={ () => {
															setAttributes( {
																layout: key,
															} );
															this.setState( {
																selectLayout: false,
															} );
														} }
													>
														{ icon }
													</Button>
												</Tooltip>
											)
										) }
									</ButtonGroup>
									<p>
										<i>
											{ __(
												'Change the layout of your columns.',
												'goza-blocks'
											) }
										</i>
									</p>
									<hr />
								</RenderSettingControl>
							</Fragment>
						) }

						<RenderSettingControl id="gb_column_columnsGap">
							<RangeControl
								label={ __( 'Column Gap', 'goza-blocks' ) }
								help={ __(
									'Adjust the spacing between columns.',
									'goza-blocks'
								) }
								value={ attributes.columnsGap }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										columnsGap: value,
									} )
								}
								min={ 0 }
								max={ 10 }
								step={ 1 }
							/>
						</RenderSettingControl>

						<hr />

						<RenderSettingControl id="gb_column_columnMaxWidth">
							<RangeControl
								label={ __( 'Column Inner Max Width (px)' ) }
								help={ __(
									'Adjust the width of the content inside the container wrapper.',
									'goza-blocks'
								) }
								value={ attributes.columnMaxWidth }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										columnMaxWidth: value,
									} )
								}
								min={ 0 }
								max={ 2000 }
								step={ 1 }
							/>
						</RenderSettingControl>

						{ 0 < attributes.columnMaxWidth && (
							<RenderSettingControl id="gb_column_centerColumns">
								<ToggleControl
									label={ __(
										'Center Columns In Container',
										'goza-blocks'
									) }
									help={ __(
										'Center the columns in the container when max-width is used.',
										'goza-blocks'
									) }
									checked={ attributes.centerColumns }
									onChange={ () =>
										this.props.setAttributes( {
											centerColumns:
												! attributes.centerColumns,
										} )
									}
								/>
							</RenderSettingControl>
						) }

						<hr />

						<RenderSettingControl id="gb_column_responsiveToggle">
							<ToggleControl
								label={ __(
									'Responsive Columns',
									'goza-blocks'
								) }
								help={ __(
									'Columns will be adjusted to fit on tablets and mobile devices.',
									'goza-blocks'
								) }
								checked={ attributes.responsiveToggle }
								onChange={ () =>
									this.props.setAttributes( {
										responsiveToggle:
											! attributes.responsiveToggle,
									} )
								}
							/>
						</RenderSettingControl>
					</PanelBody>
				) }
				<RenderSettingControl id="gb_column_marginPadding">
					<PanelBody
						title={ __( 'Margin and Padding', 'goza-blocks' ) }
						initialOpen={ false }
					>
						<SelectControl
							label={ __( 'Margin Unit', 'goza-blocks' ) }
							help={ __(
								'Choose between pixel, percent, or em units.',
								'goza-blocks'
							) }
							options={ cssUnits }
							value={ attributes.marginUnit }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									marginUnit: value,
								} )
							}
						/>
						<ToggleControl
							label={ __( 'Sync Margin', 'goza-blocks' ) }
							help={ __(
								'Top and bottom margins will have the same value.',
								'goza-blocks'
							) }
							checked={ attributes.marginSync }
							onChange={ () =>
								this.props.setAttributes( {
									marginSync: ! attributes.marginSync,
								} )
							}
						/>

						{ ! attributes.marginSync ? (
							<Margin
								/* Margin top. */
								marginEnableTop={ true }
								marginTop={ attributes.marginTop }
								marginTopMin="0"
								marginTopMax="200"
								onChangeMarginTop={ ( marginTop ) =>
									setAttributes( { marginTop } )
								}
								/* Margin bottom. */
								marginEnableBottom={ true }
								marginBottom={ attributes.marginBottom }
								marginBottomMin="0"
								marginBottomMax="200"
								onChangeMarginBottom={ ( marginBottom ) =>
									setAttributes( { marginBottom } )
								}
							/>
						) : (
							<Margin
								/* Margin top/bottom. */
								marginEnableVertical={ true }
								marginVerticalLabel={ __(
									'Margin Top/Bottom',
									'goza-blocks'
								) }
								marginVertical={ attributes.margin }
								marginVerticalMin="0"
								marginVerticalMax="200"
								onChangeMarginVertical={ ( margin ) =>
									setAttributes( { margin } )
								}
							/>
						) }
						<hr />
						<SelectControl
							label={ __( 'Padding Unit', 'goza-blocks' ) }
							help={ __(
								'Choose between pixel, percent, or em units.',
								'goza-blocks'
							) }
							options={ cssUnits }
							value={ attributes.paddingUnit }
							onChange={ ( value ) =>
								this.props.setAttributes( {
									paddingUnit: value,
								} )
							}
						/>
						<ToggleControl
							label={ __( 'Sync Padding', 'goza-blocks' ) }
							help={ __(
								'Padding on all sides will have the same value.',
								'goza-blocks'
							) }
							checked={ attributes.paddingSync }
							onChange={ () =>
								this.props.setAttributes( {
									paddingSync: ! attributes.paddingSync,
								} )
							}
						/>
						{ ! attributes.paddingSync ? (
							<Padding
								/* Padding top. */
								paddingEnableTop={ true }
								paddingTop={ attributes.paddingTop }
								paddingTopMin="0"
								paddingTopMax="200"
								onChangePaddingTop={ ( paddingTop ) =>
									setAttributes( { paddingTop } )
								}
								/* Padding right. */
								paddingEnableRight={ true }
								paddingRight={ attributes.paddingRight }
								paddingRightMin="0"
								paddingRightMax="200"
								onChangePaddingRight={ ( paddingRight ) =>
									setAttributes( { paddingRight } )
								}
								/* Padding bottom. */
								paddingEnableBottom={ true }
								paddingBottom={ attributes.paddingBottom }
								paddingBottomMin="0"
								paddingBottomMax="200"
								onChangePaddingBottom={ ( paddingBottom ) =>
									setAttributes( { paddingBottom } )
								}
								/* Padding left. */
								paddingEnableLeft={ true }
								paddingLeft={ attributes.paddingLeft }
								paddingLeftMin="0"
								paddingLeftMax="200"
								onChangePaddingLeft={ ( paddingLeft ) =>
									setAttributes( { paddingLeft } )
								}
							/>
						) : (
							<Padding
								/* Padding. */
								paddingEnable={ true }
								padding={ attributes.padding }
								paddingMin="0"
								paddingMax="200"
								onChangePadding={ ( padding ) =>
									setAttributes( { padding } )
								}
							/>
						) }
					</PanelBody>
				</RenderSettingControl>

				<RenderSettingControl id="gb_column_colorSettings">
					<PanelColorSettings
						title={ __( 'Color', 'goza-blocks' ) }
						initialOpen={ false }
						colorSettings={ [
							{
								value: backgroundColor.color,
								onChange: setBackgroundColor,
								label: __(
									'Background Color',
									'goza-blocks'
								),
							},
							{
								value: textColor.color,
								onChange: setTextColor,
								label: __( 'Text Color', 'goza-blocks' ),
							},
						] }
					>
						<ContrastChecker
							{ ...{
								textColor: textColor.color,
								backgroundColor: backgroundColor.color,
							} }
						/>
					</PanelColorSettings>
				</RenderSettingControl>

				<RenderSettingControl id="gb_column_backgroundImagePanel">
					<BackgroundImagePanel
						{ ...this.props }
					></BackgroundImagePanel>
				</RenderSettingControl>
			</InspectorControls>
		);
	}
}

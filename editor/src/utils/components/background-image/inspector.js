/**
 * Background image inspector settings.
 */

const { __ } = wp.i18n;
const { Fragment, Component } = wp.element;
const {
	PanelBody,
	RangeControl,
	Button,
	ButtonGroup,
	FocalPointPicker,
	Icon,
	ToggleControl,
	SelectControl,
} = wp.components;
const { MediaUpload, MediaUploadCheck } = wp.blockEditor;

class BackgroundImagePanel extends Component {
	render() {
		const { attributes, setAttributes } = this.props;

		const backgroundRepeatOptions = [
			{ value: 'no-repeat', label: __( 'No Repeat', 'goza' ) },
			{ value: 'repeat', label: __( 'Repeat', 'goza' ) },
			{
				value: 'repeat-x',
				label: __( 'Repeat Horizontally', 'goza' ),
			},
			{
				value: 'repeat-y',
				label: __( 'Repeat Vertically', 'goza' ),
			},
		];

		const backgroundSizeOptions = [
			{ value: 'auto', label: __( 'Auto', 'goza' ) },
			{ value: 'cover', label: __( 'Cover', 'goza' ) },
			{ value: 'contain', label: __( 'Contain', 'goza' ) },
		];

		let backgroundSizeHelp;

		if ( 'cover' === attributes.backgroundSize ) {
			backgroundSizeHelp = __(
				'Scales the image as large as possible without stretching the image. Cropped either vertically or horizontally so that no empty space remains.',
				'goza'
			);
		}
		if ( 'contain' === attributes.backgroundSize ) {
			backgroundSizeHelp = __(
				'Scales the image as large as possible without cropping or stretching the image.',
				'goza'
			);
		}
		if ( 'auto' === attributes.backgroundSize ) {
			backgroundSizeHelp = __(
				'Scales the background image in the corresponding direction such that its intrinsic proportions are maintained.',
				'goza'
			);
		}

		return (
			<Fragment>
				<PanelBody
					title={ __( 'Background Image', 'goza' ) }
					initialOpen={ false }
				>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ ( img ) => {
								setAttributes( {
									backgroundImgURL: img.url,
								} );
							} }
							type="image"
							value={ attributes.backgroundImgURL }
							render={ ( { open } ) => (
								<div>
									<ButtonGroup className="goza-background-button-group">
										<Button
											className="goza-inspector-icon-button goza-background-add-button is-button is-default"
											label={ __(
												'Edit image',
												'goza'
											) }
											onClick={ open }
										>
											<Icon icon="format-image" />
											{ __(
												'Select Image',
												'goza'
											) }
										</Button>

										{ attributes.backgroundImgURL && (
											<Button
												className="goza-inspector-icon-button goza-background-remove-button is-button is-default"
												label={ __(
													'Remove Image',
													'goza'
												) }
												onClick={ () =>
													setAttributes( {
														backgroundImgURL: null,
													} )
												}
											>
												<Icon icon="dismiss" />
												{ __(
													'Remove',
													'goza'
												) }
											</Button>
										) }
									</ButtonGroup>
								</div>
							) }
						></MediaUpload>
					</MediaUploadCheck>

					{ attributes.backgroundImgURL && (
						<Fragment>
							<FocalPointPicker
								label={ __( 'Focal Point', 'goza' ) }
								url={ attributes.backgroundImgURL }
								value={ attributes.focalPoint }
								onChange={ ( value ) =>
									setAttributes( { focalPoint: value } )
								}
							/>

							<RangeControl
								label={ __(
									'Image Opacity',
									'goza'
								) }
								value={ attributes.backgroundDimRatio }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										backgroundDimRatio: value,
									} )
								}
								min={ 0 }
								max={ 100 }
								step={ 10 }
							/>

							<ToggleControl
								label={ __(
									'Fixed Background',
									'goza'
								) }
								checked={ attributes.hasParallax }
								onChange={ () => {
									setAttributes( {
										hasParallax: ! attributes.hasParallax,
										...( ! attributes.hasParallax
											? { focalPoint: undefined }
											: {} ),
									} );
								} }
							/>

							<SelectControl
								className="goza-inspector-help-text"
								label={ __(
									'Image Display',
									'goza'
								) }
								value={ attributes.backgroundSize }
								help={ backgroundSizeHelp }
								options={ backgroundSizeOptions }
								onChange={ ( value ) =>
									this.props.setAttributes( {
										backgroundSize: value,
									} )
								}
							/>

							{ 'cover' !== attributes.backgroundSize && (
								<SelectControl
									label={ __(
										'Image Repeat',
										'goza'
									) }
									value={ attributes.backgroundRepeat }
									options={ backgroundRepeatOptions }
									onChange={ ( value ) =>
										this.props.setAttributes( {
											backgroundRepeat: value,
										} )
									}
								/>
							) }
						</Fragment>
					) }
				</PanelBody>
			</Fragment>
		);
	}
}

export default BackgroundImagePanel;

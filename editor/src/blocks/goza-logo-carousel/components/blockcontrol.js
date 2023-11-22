import { __ } from '@wordpress/i18n'
import { MediaUpload, MediaUploadCheck, BlockControls, } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton, } from '@wordpress/components';
import { Fragment } from '@wordpress/element';

const GozaBlockControl = (props) => {
    const { attributes, setAttributes } = props
    const { images } = attributes

    return (
        <Fragment>
            {images && (
                <BlockControls>
                    <ToolbarGroup>
                        <MediaUploadCheck>
                            <MediaUpload
                                multiple={true}
                                onSelect={(media) =>
                                    setAttributes({
                                        images: media,
                                    })
                                }
                                gallery={true}
                                allowedTypes={['image']}
                                value={images.map((logo) => logo.id)}
                                render={({ open }) => {
                                    return (
                                        <ToolbarButton
                                            label={__('Edit Logos', 'goza')}
                                            onClick={open}
                                            icon="edit"
                                        />
                                    );
                                }}
                            />
                        </MediaUploadCheck>
                    </ToolbarGroup>
                </BlockControls>
            )}
        </Fragment>
    )
}

export default GozaBlockControl
import { __ } from "@wordpress/i18n";
import { BlockControls, BlockAlignmentToolbar } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton } from '@wordpress/components';

const GozaBlockControl = (props) => {

    const { attributes, setAttributes, clientId: blockID } = props
    const { id, align } = attributes

    return (
        <BlockControls>
            <BlockAlignmentToolbar value={align} onChange={(align) => setAttributes({ align: align })} />
            <ToolbarGroup>
                <ToolbarButton
                    label={__('Refresh this button when it conflict with other buttons styles', 'advanced-gutenberg')}
                    icon="update"
                    className="components-toolbar__control"
                    onClick={() => setAttributes({ id: 'advgbbutton-' + blockID })}
                />
            </ToolbarGroup>
        </BlockControls>
    )
}

export default GozaBlockControl;
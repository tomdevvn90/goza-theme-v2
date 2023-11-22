import { __ } from "@wordpress/i18n";
import { BaseControl, PanelBody, RangeControl, ToggleControl, SelectControl, ColorPalette } from '@wordpress/components';
import { InspectorControls, URLInput, PanelColorSettings } from "@wordpress/block-editor";
import { Fragment } from "@wordpress/element";

const listBorderStyles = [
    { label: __('None', 'goza'), value: 'none' },
    { label: __('Solid', 'goza'), value: 'solid' },
    { label: __('Dotted', 'goza'), value: 'dotted' },
    { label: __('Dashed', 'goza'), value: 'dashed' },
    { label: __('Double', 'goza'), value: 'double' },
    { label: __('Groove', 'goza'), value: 'groove' },
    { label: __('Ridge', 'goza'), value: 'ridge' },
    { label: __('Inset', 'goza'), value: 'inset' },
    { label: __('Outset', 'goza'), value: 'outset' },
];

const Inspector = (props) => {

    const { attributes, setAttributes, className } = props
    const {
        id, align, url, urlOpenNewTab, title, text, bgColor, textColor, textSize,
        marginTop, marginRight, marginBottom, marginLeft,
        paddingTop, paddingRight, paddingBottom, paddingLeft,
        borderWidth, borderColor, borderRadius, borderStyle,
        hoverTextColor, hoverBgColor, hoverShadowColor, hoverShadowH, hoverShadowV, hoverShadowBlur, hoverShadowSpread,
        hoverOpacity, transitionSpeed
    } = attributes;

    const isStyleOutlined = className.indexOf('-outlined') > -1;
    const isStyleWater = className.indexOf('-water') > -1;

    const hoverColorSettings = [
        {
            label: __('Background Color', 'goza'),
            value: hoverBgColor,
            onChange: (value) => setAttributes({ hoverBgColor: value }),
        },
        {
            label: __('Text Color', 'goza'),
            value: hoverTextColor,
            onChange: (value) => setAttributes({ hoverTextColor: value }),
        },
        {
            label: __('Shadow Color', 'goza'),
            value: hoverShadowColor,
            onChange: (value) => setAttributes({ hoverShadowColor: value }),
        },
    ];

    if (isStyleOutlined) {
        hoverColorSettings.shift();
    }

    return (
        <InspectorControls>
            <PanelBody title={__('Button link', 'goza')}>
                <BaseControl
                    label={[
                        __('Link URL', 'goza'),
                        (url && <a href={url || '#'} key="link_url" target="_blank" style={{ float: 'right' }}>
                            {__('Preview', 'goza')}
                        </a>)
                    ]}
                >
                    <URLInput
                        value={url}
                        onChange={(value) => setAttributes({ url: value })}
                        autoFocus={false}
                        isFullWidth
                        hasBorder
                    />
                </BaseControl>
                <ToggleControl
                    label={__('Open in new tab', 'goza')}
                    checked={!!urlOpenNewTab}
                    onChange={() => setAttributes({ urlOpenNewTab: !attributes.urlOpenNewTab })}
                />
            </PanelBody>
            <PanelBody title={__('Text/Color', 'goza')}>
                <RangeControl
                    label={__('Text size', 'goza')}
                    value={textSize || ''}
                    onChange={(size) => setAttributes({ textSize: size })}
                    min={10}
                    max={100}
                    beforeIcon="editor-textcolor"
                    allowReset
                />

            </PanelBody>
            {!isStyleOutlined && (
                <PanelColorSettings
                    title={__('Background Color', 'goza')}
                    colorSettings={[
                        {
                            label: __('Background Color', 'goza'),
                            value: bgColor,
                            onChange: (value) => setAttributes({ bgColor: value }),
                        }
                    ]}
                />
            )}
            <PanelColorSettings
                title={__('Text Color', 'goza')}
                colorSettings={[
                    {
                        label: __('Text Color', 'goza'),
                        value: textColor,
                        onChange: (value) => setAttributes({ textColor: value }),
                    }
                ]}
            />
            {!isStyleWater &&
                <PanelBody title={__('Border', 'goza')} initialOpen={false} >
                    <RangeControl
                        label={__('Border radius', 'goza')}
                        value={borderRadius || ''}
                        onChange={(value) => setAttributes({ borderRadius: value })}
                        min={0}
                        max={100}
                    />
                    <SelectControl
                        label={__('Border style', 'goza')}
                        value={borderStyle}
                        options={listBorderStyles}
                        onChange={(value) => setAttributes({ borderStyle: value })}
                    />
                    {borderStyle !== 'none' && (
                        <Fragment>
                            <PanelColorSettings
                                title={__('Border Color', 'goza')}
                                initialOpen={false}
                                colorSettings={[
                                    {
                                        label: __('Border Color', 'goza'),
                                        value: borderColor,
                                        onChange: (value) => setAttributes({ borderColor: value === undefined ? '#2196f3' : value }),
                                    },
                                ]}
                            />
                            <RangeControl
                                label={__('Border width', 'goza')}
                                value={borderWidth || ''}
                                onChange={(value) => setAttributes({ borderWidth: value })}
                                min={0}
                                max={100}
                            />
                        </Fragment>
                    )}
                </PanelBody>
            }

            <PanelBody title={__('Margin', 'goza')} initialOpen={false} >
                <RangeControl
                    label={__('Margin top', 'goza')}
                    value={marginTop || ''}
                    onChange={(value) => setAttributes({ marginTop: value })}
                    min={0}
                    max={100}
                />
                <RangeControl
                    label={__('Margin right', 'goza')}
                    value={marginRight || ''}
                    onChange={(value) => setAttributes({ marginRight: value })}
                    min={0}
                    max={100}
                />
                <RangeControl
                    label={__('Margin bottom', 'goza')}
                    value={marginBottom || ''}
                    onChange={(value) => setAttributes({ marginBottom: value })}
                    min={0}
                    max={100}
                />
                <RangeControl
                    label={__('Margin left', 'goza')}
                    value={marginLeft || ''}
                    onChange={(value) => setAttributes({ marginLeft: value })}
                    min={0}
                    max={100}
                />
            </PanelBody>
            <PanelBody title={__('Padding', 'goza')} initialOpen={false} >
                <RangeControl
                    label={__('Padding top', 'goza')}
                    value={paddingTop || ''}
                    onChange={(value) => setAttributes({ paddingTop: value })}
                    min={0}
                    max={100}
                />
                <RangeControl
                    label={__('Padding right', 'goza')}
                    value={paddingRight || ''}
                    onChange={(value) => setAttributes({ paddingRight: value })}
                    min={0}
                    max={100}
                />
                <RangeControl
                    label={__('Padding bottom', 'goza')}
                    value={paddingBottom || ''}
                    onChange={(value) => setAttributes({ paddingBottom: value })}
                    min={0}
                    max={100}
                />
                <RangeControl
                    label={__('Padding left', 'goza')}
                    value={paddingLeft || ''}
                    onChange={(value) => setAttributes({ paddingLeft: value })}
                    min={0}
                    max={100}
                />
            </PanelBody>
            <PanelBody title={__('Hover', 'goza')} initialOpen={false} >
                <PanelColorSettings
                    title={__('Color Settings', 'goza')}
                    initialOpen={false}
                    colorSettings={hoverColorSettings}
                />
                <PanelBody title={__('Shadow', 'goza')} initialOpen={false}  >
                    <RangeControl
                        label={__('Opacity (%)', 'goza')}
                        value={hoverOpacity}
                        onChange={(value) => setAttributes({ hoverOpacity: value })}
                        min={0}
                        max={100}
                    />
                    <RangeControl
                        label={__('Transition speed (ms)', 'goza')}
                        value={transitionSpeed || ''}
                        onChange={(value) => setAttributes({ transitionSpeed: value })}
                        min={0}
                        max={3000}
                    />
                    <RangeControl
                        label={__('Shadow H offset', 'goza')}
                        value={hoverShadowH || ''}
                        onChange={(value) => setAttributes({ hoverShadowH: value })}
                        min={-50}
                        max={50}
                    />
                    <RangeControl
                        label={__('Shadow V offset', 'goza')}
                        value={hoverShadowV || ''}
                        onChange={(value) => setAttributes({ hoverShadowV: value })}
                        min={-50}
                        max={50}
                    />
                    <RangeControl
                        label={__('Shadow blur', 'goza')}
                        value={hoverShadowBlur || ''}
                        onChange={(value) => setAttributes({ hoverShadowBlur: value })}
                        min={0}
                        max={50}
                    />
                    <RangeControl
                        label={__('Shadow spread', 'goza')}
                        value={hoverShadowSpread || ''}
                        onChange={(value) => setAttributes({ hoverShadowSpread: value })}
                        min={0}
                        max={50}
                    />
                </PanelBody>
            </PanelBody>
        </InspectorControls>
    )
}

export default Inspector;
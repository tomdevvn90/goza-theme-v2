import { __ } from "@wordpress/i18n";
import { RichText } from '@wordpress/block-editor';
import GozaBlockControl from './blockcontrol';
import { useEffect, Fragment } from "@wordpress/element";
import Inspector from "./inspector";

const Edit = (props) => {
    const { attributes, setAttributes, clientId, className, isSelected } = props
    const {
        id, align, url, urlOpenNewTab, title, text, bgColor, textColor, textSize,
        marginTop, marginRight, marginBottom, marginLeft,
        paddingTop, paddingRight, paddingBottom, paddingLeft,
        borderWidth, borderColor, borderRadius, borderStyle,
        hoverTextColor, hoverBgColor, hoverShadowColor, hoverShadowH, hoverShadowV, hoverShadowBlur, hoverShadowSpread,
        hoverOpacity, transitionSpeed
    } = attributes;

    useEffect(() => {
        setAttributes({ id: 'goza-btn-' + clientId });
    }, []);

    const isStyleWater = className.indexOf('-water') > -1;

    return (
        <Fragment>
            <GozaBlockControl  {...props} />
            <Inspector  {...props} />
            <div className={`${className}  ${id} align${align}`}>
                <div className='wp-block-goza-blocks-goza-button--inner'>
                    <RichText
                        tagName="span"
                        placeholder={__('Add text…', 'goza')}
                        value={text}
                        onChange={(value) => setAttributes({ text: value })}
                        allowedFormats={['bold', 'italic', 'strikethrough']}
                        isSelected={isSelected}
                        className={`wp-block-goza-button_link`}
                        keepPlaceholderOnFocus
                    />
                    {!!isStyleWater &&
                        <svg class="wgl-dashes inner-dashed-border animated-dashes"> <rect rx="0%" ry="0%">  </rect> </svg>
                    }
                </div>
            </div>
            <style>
                {`.${id} .wp-block-goza-blocks-goza-button--inner{
                        background-color: ${bgColor} !important;
                        margin: ${marginTop}px ${marginRight}px ${marginBottom}px ${marginLeft}px;
                        border-radius: ${borderRadius}px !important;
                        border-color: ${borderColor} !important;              
                        border-width: ${borderWidth}px !important;      
                        border-style: ${borderStyle} ${borderStyle !== 'none' && '!important'};
                        transition: all ${transitionSpeed}ms ease;
                        box-sizing: border-box;
                    }
                    .${id} .wp-block-goza-blocks-goza-button--inner :hover {                        
                        background-color: ${hoverBgColor} !important;
                        box-shadow: ${hoverShadowH}px ${hoverShadowV}px ${hoverShadowBlur}px ${hoverShadowSpread}px ${hoverShadowColor};                        
                        opacity: ${hoverOpacity / 100}
                    }
                    .${id} .wp-block-goza-button_link{
                        color: ${textColor} !important;
                        padding: ${paddingTop}px ${paddingRight}px ${paddingBottom}px ${paddingLeft}px;                    
                        font-size: ${textSize}px;                        
                        transition: all ${transitionSpeed}ms ease;
                    }
                    .${id} .wp-block-goza-blocks-goza-button--inner:hover .wp-block-goza-button_link{
                        color: ${hoverTextColor} !important;
                    }
                    .is-style-outlined.${id} .wp-block-goza-blocks-goza-button--inner{
                        border-color: ${textColor} !important;    
                    }
                    .is-style-ngo-dark.${id} .wp-block-goza-blocks-goza-button--inner:before, .is-style-ngo-dark.${id} .wp-block-goza-blocks-goza-button--inner:after{
                        transition: all ${transitionSpeed}ms ease;  
                    }
                    .is-style-wt-charity.${id} .wp-block-goza-blocks-goza-button--inner:after{
                        border-radius: ${borderRadius}px !important; 
                        background-color: ${hoverBgColor} !important;
                        box-sizing: border-box;
                    }
                    .is-style-wt-charity.${id} .wp-block-goza-blocks-goza-button--inner:hover .wp-block-goza-button_link{
                        border-color:${hoverBgColor} !important;
                    }
                    .is-style-charity-organization.${id} .wp-block-goza-blocks-goza-button--inner:before, .is-style-charity-organization.${id} .wp-block-goza-blocks-goza-button--inner:after{
                        background-color: ${hoverBgColor} !important;
                        transition: all ${transitionSpeed}ms ease;  
                    }
                    .is-style-charity-organization.${id} .wp-block-goza-blocks-goza-button--inner:hover{
                        background-color: ${bgColor} !important; 
                    }
                    `}
                    
            </style>
        </Fragment>
    )
}

export default Edit;
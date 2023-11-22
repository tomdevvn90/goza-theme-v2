import { RichText } from '@wordpress/block-editor';
import { Fragment  } from "@wordpress/element";

const Save = (props) => {
    const { attributes, className } = props
    const {
        id,
        align,
        url,
        urlOpenNewTab,
        title,
        text,
    } = attributes;

    const isStyleWater = className.indexOf('-water') > -1;

    return (
        <Fragment>
            <div className={`${className}  ${id} align${align}`}>
                <div className='wp-block-goza-blocks-goza-button--inner'>
                    <RichText.Content 
                        tagName="a"
                        className={`wp-block-goza-button_link`}
                        href={url || '#'}
                        title={title}
                        target={!urlOpenNewTab ? '_self' : '_blank'}
                        value={text}
                        rel="noopener noreferrer" 
                    />
                    {!!isStyleWater &&
                        <svg class="wgl-dashes inner-dashed-border animated-dashes"> <rect rx="0%" ry="0%">  </rect> </svg>
                    }
                </div>
            </div>
        </Fragment>
    )
}

export default Save;
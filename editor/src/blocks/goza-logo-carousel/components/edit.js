import { __ } from '@wordpress/i18n'
import GozaLogoCarousel from './block';
import GozaBlockControl from './blockcontrol';
import { Fragment } from '@wordpress/element';
import Inspector from './inspector';
import { MediaPlaceholder } from '@wordpress/block-editor';

const Edit = (props) => {
    const { attributes, setAttributes } = props
    const { images, dots, arrows } = attributes

    return (
        <Fragment>
            <GozaBlockControl {...props} />
            <Inspector {...props} />
            <GozaLogoCarousel {...props}>
                <div className='block-inner block-editor'>
                    {arrows &&
                        <button type="button" class="slick-arrows s-prev pull-left slick-arrow"></button>
                    } 

                    {images ? (
                        images.map((logo) => {
                            return (
                                <div className='goza-logo__item' key={logo.id}>
                                    <img src={logo.url} alt={logo.alt} id={logo.id} />
                                </div>
                            );
                        })
                    ) : (
                        <MediaPlaceholder
                            multiple={true}
                            onSelect={(media) =>
                                setAttributes({
                                    images: media,
                                })
                            }
                            onFilesPreUpload={(media) =>
                                setAttributes({
                                    images: media,
                                })
                            }
                            onSelectURL={false}
                            allowedTypes={['image']}
                            labels={__('Add Logos', 'goza')}
                        />
                    )}
                    {arrows &&
                        <button type="button" class="slick-arrows s-next pull-right slick-arrow"></button>
                    }
                </div>
                {dots &&
                    <ul class="slick-dots"><li><button type="button" id="slick-slide-control00"></button></li><li><button type="button" id="slick-slide-control01"></button></li></ul>
                }
            </GozaLogoCarousel>
        </Fragment>
    )
}

export default Edit;
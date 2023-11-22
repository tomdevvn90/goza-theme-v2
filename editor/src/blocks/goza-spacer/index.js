/**
 * BLOCK: Spacer
 */

// Import CSS
import './styles/style.scss'
import './styles/editor.scss'

// Import block dependencies and components
import Edit from './components/edit';
import Save from './components/save';

// Internationalization
import { __ } from '@wordpress/i18n'
// Register block
import { registerBlockType } from '@wordpress/blocks'

export default registerBlockType('goza-block/goza-spacer', {
	title: __('Spacer', 'goza'),
	icon: 'image-flip-vertical',
	category: 'goza-theme',
	keywords: [
		__('spacer', 'goza'),
		__('gap', 'goza'),
	],
	attributes: {
		size: {
			type: 'Object',
			default: {
				default: '10vh',
				tablet: '10vh',
				mobile: '10vh',
				sync: true,
			}
		}
	},
	/* Render the block in the editor. */
	edit: (props) => {
		return <Edit {...props} />;
	},
	/* Save the block markup. */
	save: (props) => {
		return <Save {...props} />;
	},
})

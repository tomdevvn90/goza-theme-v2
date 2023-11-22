/**
 * BLOCK: Blocks Container
 */

// Import block dependencies and components
import Inspector from './components/inspector';
import Container from './components/container';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { registerBlockType } = wp.blocks;

// Register editor components
const { InnerBlocks } = wp.blockEditor;

const blockAttributes = {
	containerPaddingTop: {
		type: 'Object',
		default: {
			default: '10vh',
			tablet: '10vh',
			mobile: '10vh',
			sync: true,
		}
	},
	containerPaddingBottom: {
		type: 'Object',
		default: {
			default: '10vh',
			tablet: '10vh',
			mobile: '10vh',
			sync: true,
		}
	},
	containerPaddingLeft: {
		type: 'Object',
		default: {
			default: '',
			tablet: '',
			mobile: '',
			sync: true,
		}
	},
	containerPaddingRight: {
		type: 'Object',
		default: {
			default: '',
			tablet: '',
			mobile: '',
			sync: true,
		}
	},
	containerWidth: {
		type: 'string',
	},
	containerMaxWidth: {
		type: 'number',
	},
	containerBackgroundColor: {
		type: 'string',
	},
	containerBgGradientColor: {
		type: 'string',
		default: ''
	},
	containerImgURL: {
		type: 'string',
		source: 'attribute',
		attribute: 'src',
		selector: 'img',
	},
	containerImgID: {
		type: 'number',
	},
	videoURL: {
		type: 'string',
	},
	videoTitle: {
		type: 'string',
	},
	videoID: {
		type: 'number',
	},
	containerImgAlt: {
		type: 'string',
		source: 'attribute',
		attribute: 'alt',
		selector: 'img',
	},
	focalPoint: {
		type: "object",
		default: { x: 0.5, y: 0.5 },
	},
	srcSet: {
		type: "string",
	},
	opacityBg: {
		type: 'number',
	},
	align: {
		type: 'string',
		default: 'full'
	}
};

class EditContainerBlock extends Component {
	render() {
		// Setup the attributes
		const {
			setAttributes,
		} = this.props;

		return [
			// Show the block controls on focus
			<Inspector key={'goza-container-inspector-' + this.props.clientId} {...{ setAttributes, ...this.props }} />,

			// Show the container markup in the editor
			<Container key={'goza-container-' + this.props.clientId} {...this.props}>
				<InnerBlocks />
			</Container>,
		];
	}
}

// Register the block
registerBlockType('goza-blocks/goza-container', {
	title: __('Container', 'goza'),
	description: __('Add a container block to wrap several blocks in a parent container.', 'goza'),
	icon: 'editor-table',
	category: 'goza-theme',
	keywords: [
		__('container', 'goza'),
		__('section', 'goza'),
		__('bph', 'goza'),
	],

	supports: {
		align: ['full']
	},

	attributes: blockAttributes,

	// Render the block components
	edit: EditContainerBlock,

	// Save the attributes and markup
	save(props) {
		// Save the block markup for the front end
		return (
			<Container {...props}>
				<InnerBlocks.Content />
			</Container>
		);
	}
});

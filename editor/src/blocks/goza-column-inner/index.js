/**
 * BLOCK: Goza Blocks Advanced Columns InnerBlocks.
 */

/**
 * Internal dependencies.
 */
import Edit from './components/edit';
import Save from './components/save';
import './styles/style.scss';
import './styles/editor.scss';
import BackgroundAttributes from './../../utils/components/background-image/attributes';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register advanced columns block.
 */
registerBlockType( 'goza-blocks/goza-column', {
	title: __( 'Column', 'goza-blocks' ),
	description: __( 'Add a pre-defined column layout.', 'goza-blocks' ),
	icon: 'editor-table',
	category: 'goza-theme',
	parent: [ 'goza-blocks/goza-columns' ],
	keywords: [
		__( 'column', 'goza-blocks' ),
		__( 'layout', 'goza-blocks' ),
		__( 'row', 'goza-blocks' ),
	],
	attributes: {
		...BackgroundAttributes,
		backgroundColor: {
			type: 'string',
		},
		customBackgroundColor: {
			type: 'string',
		},
		textColor: {
			type: 'string',
		},
		customTextColor: {
			type: 'string',
		},
		textAlign: {
			type: 'string',
		},
		marginSync: {
			type: 'boolean',
			default: false,
		},
		marginUnit: {
			type: 'string',
			default: 'px',
		},
		margin: {
			type: 'number',
			default: 0,
		},
		marginTop: {
			type: 'number',
			default: 0,
		},
		marginBottom: {
			type: 'number',
			default: 0,
		},
		paddingSync: {
			type: 'boolean',
			default: false,
		},
		paddingUnit: {
			type: 'string',
			default: 'px',
		},
		padding: {
			type: 'number',
			default: 0,
		},
		paddingTop: {
			type: 'number',
			default: 0,
		},
		paddingRight: {
			type: 'number',
			default: 0,
		},
		paddingBottom: {
			type: 'number',
			default: 0,
		},
		paddingLeft: {
			type: 'number',
			default: 0,
		},
		columnVerticalAlignment: {
			type: 'string',
		},
	},

	/* Render the block in the editor. */
	edit: ( props ) => {
		return <Edit { ...props } />;
	},

	/* Save the block markup. */
	save: ( props ) => {
		return <Save { ...props } />;
	}
} );

/* Add the vertical column alignment class to the block wrapper. */
const withClientIdClassName = wp.compose.createHigherOrderComponent(
	( BlockListBlock ) => {
		return ( props ) => {
			const blockName = props.block.name;

			if (
				'goza-blocks/goza-column' === blockName &&
				props.block.attributes.columnVerticalAlignment
			) {
				return (
					<BlockListBlock
						{ ...props }
						className={
							'goza-is-vertically-aligned-' +
							props.block.attributes.columnVerticalAlignment
						}
					/>
				);
			}
			return <BlockListBlock { ...props } />;
		};
	},
	'withClientIdClassName'
);

wp.hooks.addFilter(
	'editor.BlockListBlock',
	'goza-blocks/add-vertical-align-class',
	withClientIdClassName
);

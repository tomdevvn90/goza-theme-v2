/**
 * BLOCK: Goza Blocks Advanced Columns.
 */

/**
 * Components and dependencies.
 */
import Edit from './components/edit';
import Save from './components/save';
import BackgroundAttributes from './../../utils/components/background-image/attributes';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Register advanced columns block InnerBlocks.
 */
registerBlockType( 'goza-blocks/goza-columns', {
	title: __( 'Advanced Columns - Goza', 'goza-blocks' ),
	description: __( 'Add a pre-defined column layout.', 'goza-blocks' ),
	icon: 'editor-table',
	category: 'goza-theme',
	keywords: [
		__( 'column', 'goza-blocks' ),
		__( 'grid', 'goza-blocks' ),
		__( 'row', 'goza-blocks' ),
	],
	attributes: {
		...BackgroundAttributes,
		columns: {
			type: 'number',
		},
		layout: {
			type: 'string',
		},
		columnsGap: {
			type: 'number',
			default: 2,
		},
		align: {
			type: 'string',
		},
		responsiveToggle: {
			type: 'boolean',
			default: true,
		},
		marginSync: {
			type: 'boolean',
			default: false,
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
		marginUnit: {
			type: 'string',
			default: 'px',
		},
		paddingSync: {
			type: 'boolean',
			default: false,
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
		paddingUnit: {
			type: 'string',
			default: 'px',
		},
		textColor: {
			type: 'string',
		},
		customTextColor: {
			type: 'string',
		},
		backgroundColor: {
			type: 'string',
		},
		customBackgroundColor: {
			type: 'string',
		},
		columnMaxWidth: {
			type: 'number',
		},
		centerColumns: {
			type: 'boolean',
			default: true,
		},
	},

	/* Add alignment to block wrapper. */
	getEditWrapperProps( { align } ) {
		if (
			'left' === align ||
			'right' === align ||
			'full' === align ||
			'wide' === align
		) {
			return { 'data-align': align };
		}
	},

	/* Render the block components. */
	edit: ( props ) => {
		return <Edit { ...props } />;
	},

	/* Save the block markup. */
	save: ( props ) => {
		return <Save { ...props } />;
	},
} );

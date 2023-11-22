/**
 * BLOCK: Logo Carousel
 */

import "./styles/style.scss";
import "./styles/editor.scss";
import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";

//styles
import Edit from "./components/edit";
import Save from "./components/save";

const attr = {
	align: {
        type: 'string',
        default: ''
    },
	images: {
		"type": "array"
	},
	slidesToShow: {
		type: 'number',
		default: 5
	},
	slidesToScroll: {
		type: 'number',
		default: 1
	},
	arrows: {
		type: 'boolean',
		default: false
	},
	dots: {
		type: 'boolean',
		default: false
	},
	infinite: {
		type: 'boolean',
		default: true
	},
	speed: {
		type: 'number',
		default: 700
	},
	centerMode: {
		type: 'boolean',
		default: true
	},
	autoplay: {
		type: 'boolean',
		default: true
	},
	autoplaySpeed: {
		type: 'number',
		default: 3000
	},
	gap: {
		type: 'string',
		default: '20px'
	},
};

export default registerBlockType("goza-blocks/goza-logo-carousel", {
	title: __("Logo Carousel", "goza"),
	icon: "slides",
	category: "goza-theme",
	keywords: [__("logo", "goza"), __("carousel", "goza"), __("goza", "goza"), __("slider", "goza")],
	attributes: attr,
	supports: {
		// Declare support for specific alignment options.
		align: ['full' ]
	},
	/* Render the block in the editor. */
	edit: (props) => {
		return <Edit {...props} />;
	},
	/* Save the block markup. */
	save: (props) => {
		return <Save {...props} />;
	},
});

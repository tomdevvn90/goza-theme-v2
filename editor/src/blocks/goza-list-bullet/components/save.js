/**
 * Internal dependencies
 */
import Bullet from "./bullet";

/**
 * WordPress dependencies
 */


const Save = (props) => {
	const { attributes } = props;
	const { values, txtColor, spaceItem, column } = attributes;

	return (
		<Bullet {...props}>
			<div className={['inner-block', column ? 'column-2' : ''].join(' ')}
				style={(() => {
					return {
						'--textColor': txtColor,
						'--spaceItem': spaceItem,
					}
				})()}>
				<ul>
					{values}
				</ul>
			</div>
		</Bullet>

	)
}

export default Save;

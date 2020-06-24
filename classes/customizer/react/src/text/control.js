import TextComponent from './text-component.js';

export const TextControl = wp.customize.astraControl.extend( {
	renderContent: function renderContent() {
		let control = this;
	ReactDOM.render( <TextComponent control={ control } />, control.container[0] );
	}
} );

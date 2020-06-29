/* global wp */
import { Base } from './customizer.js';
import { BaseControl } from './base/control.js';
import { TextControl } from './text/control.js';
import { ColorControl } from './color/control.js';

wp.customize.controlConstructor.astra_text_control = TextControl;
wp.customize.controlConstructor.astra_color_control_new = ColorControl;

window.addEventListener( 'load', () => {
    // console.log('Working on Load');
} );

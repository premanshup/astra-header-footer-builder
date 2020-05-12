/* global wp */
import { Base } from './customizer.js';
import { BaseControl } from './base/control.js';
import { BuilderControl } from './layout-builder/control.js';

wp.customize.controlConstructor.astra_builder_control = BuilderControl;

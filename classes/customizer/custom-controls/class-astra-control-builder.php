<?php
/**
 * The blank customize control extends the WP_Customize_Control class.
 *
 * @package customizer-controls
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}


/**
 * Class Astra_Control_Builder
 *
 * @access public
 */
class Astra_Control_Builder extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'astra_builder_control';

	/**
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $default = array();

	/**
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $input_attrs = array();

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 */
	public function to_json() {
		parent::to_json();
		$this->json['default']     = $this->default;
		$this->json['input_attrs'] = $this->input_attrs;
	}
}
$wp_customize->register_control_type( 'Astra_Control_Builder' );

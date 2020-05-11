<?php
/**
 * Astra HFB Loader
 *
 * @package Astra HFB Loader
 */

/**
 * Load Header/Footer Builder.
 */
class Astra_Hfb_Loader {

    /**
	 * Holds theme settings array sections.
	 *
	 * @var the theme settings sections.
	 */
	public static $settings_sections = array(
		'header-builder',
		'header-logo',
		'header-button',
	);

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'customize_register', array( $this, 'add_hfb_control' ) );
        add_action( 'customize_register', array( $this, 'create_settings_array' ) );
    }

    public function add_hfb_control() {
        require_once ASTRA_HFB_DIR . '/classes/customizer/custom-controls/class-astra-control-blank.php';
    }

    public function create_settings_array() {
        // Load Settings files.
		foreach ( self::$settings_sections as $key ) {
			require_once ASTRA_HFB_DIR . '/classes/customizer/options/' . $key . '-options.php';
		}
    }
}

new Astra_Hfb_Loader();

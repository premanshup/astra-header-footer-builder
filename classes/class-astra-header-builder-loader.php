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
	 * Context for customizer controls.
	 *
	 * @var null
	 */
	private static $contexts = array();

    /**
     * Constructor
     */
    public function __construct() {
        add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
        add_action( 'customize_register', array( $this, 'add_hfb_custom_control' ) );
        add_action( 'customize_register', array( $this, 'settings_array' ) );
        add_filter( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_scripts' ) );
    }

    /**
     * Set Options Default Values
     *
     * @param  array $defaults  Astra options default value array.
     * @return array
     */
    public function theme_defaults( $defaults ) {
        // Header.
        $defaults['header_desktop_items'] = array(
            'top' => array(
                'top_left'         => array(),
                'top_left_center'  => array(),
                'top_center'       => array(),
                'top_right_center' => array(),
                'top_right'        => array(),
            ),
            'main' => array(
                'main_left'         => array( 'logo' ),
                'main_left_center'  => array(),
                'main_center'       => array(),
                'main_right_center' => array(),
                'main_right'        => array( 'navigation' ),
            ),
            'bottom' => array(
                'bottom_left'         => array(),
                'bottom_left_center'  => array(),
                'bottom_center'       => array(),
                'bottom_right_center' => array(),
                'bottom_right'        => array(),
            ),
        );
        return $defaults;
	}

    public function add_hfb_custom_control( $wp_customize ) {
        require_once ASTRA_HFB_DIR . 'classes/customizer/custom-controls/class-astra-control-blank.php';
        require_once ASTRA_HFB_DIR . 'classes/customizer/custom-controls/class-astra-control-builder.php';
    }

    public function settings_array( $wp_customize ) {
        // Load Settings files.
		foreach ( self::$settings_sections as $key ) {
			require_once ASTRA_HFB_DIR . 'classes/customizer/options/' . $key . '-options.php';
        }
        
        remove_action( 'customize_controls_print_footer_scripts', array( Astra_Customizer::get_instance(), 'print_footer_scripts' ) );
        add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_footer_scripts' ), 10 );
    }

    /**
	 * Get Customizer Control Contexts
	 *
	 * @access public
	 * @return array
	 */
	public static function get_control_contexts() {
		// Return contexts.
		return apply_filters( 'astra_theme_customizer_control_contexts', self::$contexts );
	}

    /**
	 * Enqueue Customizer scripts
	 *
	 * @access public
	 * @return void
	 */
	public function enqueue_customizer_scripts() {
        wp_enqueue_style( 'astra-hfb-customizer-styles', ASTRA_HFB_URI . 'assets/css/customizer.css', false, ASTRA_HFB_VERSION );
		// Enqueue Customizer script.
		$editor_dependencies = array(
			'jquery',
			'customize-controls',
			'wp-i18n',
			'wp-components',
			'wp-edit-post',
			'wp-element',
		);
		wp_enqueue_script( 'astra-hfb-customizer-controls', ASTRA_HFB_URI . 'assets/js/customizer.js', $editor_dependencies, ASTRA_HFB_VERSION, true );
		wp_enqueue_style( 'astra-hfb-customizer-controls', $path . 'react/build/controls.css', array( 'wp-components' ), ASTRA_HFB_VERSION );
		wp_localize_script(
			'astra-hfb-customizer-controls',
			'astraCustomizerControlsData',
			array(
				'contexts'  => self::get_control_contexts(),
				'choices'   => self::get_builder_choices(),
				'palette'   => kadence()->get_palette(),
				'gfontvars' => $google_font_variants,
				'cfontvars' => apply_filters( 'kadence_theme_custom_fonts', array() ),
			)
		);
    }
    
    /**
     * Print Footer Scripts
     *
     * @since 1.0.0
     * @return void
     */
    public function print_footer_scripts() {
        $output  = '<script type="text/javascript">';
        $output .= '
        wp.customize.bind(\'ready\', function() {
            wp.customize.control.each(function(ctrl, i) {
                var desc = ctrl.container.find(".customize-control-description");
                var astra_blank_ctrl = ctrl.container.hasClass(\'customize-control-astra_blank_control\');
                if(desc.length) {
                    if(astra_blank_ctrl) {
                        return;
                    } else {
                        var title 		= ctrl.container.find(".customize-control-title");
                        var li_wrapper 	= desc.closest("li");
                        var tooltip = desc.text().replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
                                return \'&#\'+i.charCodeAt(0)+\';\';
                            });
                        desc.remove();
                        li_wrapper.append(" <i class=\'ast-control-tooltip dashicons dashicons-editor-help\'title=\'" + tooltip +"\'></i>");
                    }
                }
            });
        });';
        $output .= '</script>';

        echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

new Astra_Hfb_Loader();

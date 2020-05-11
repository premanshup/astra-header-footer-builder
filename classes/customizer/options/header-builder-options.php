<?php
/**
 * Breadcrumbs Options for Astra theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 1.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Sanitizes Initial setup
 */
class Astra_Hfb_Configs extends Astra_Customizer_Config_Base {

	/**
	 * Register Astra-Breadcrumbs Settings.
	 *
	 * @param Array                $configurations Astra Customizer Configurations.
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @since 1.7.0
	 * @return Array Astra Customizer Configurations with updated configurations.
	 */
	public function register_configuration( $configurations, $wp_customize ) {

		$_configs = array(

			/*
			* Breadcrumb
			*/
			array(
				'name'               => 'section-header-builder',
				'type'               => 'section',
				'priority'           => 14,
				'title'              => __( 'Header Builder', 'astra' ),
				'description_hidden' => true,
				'description'        => $this->compontent_tabs()
			),

			/**
			 * Option: Breadcrumb Position
			 */
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[breadcrumb-position]',
				'default'  => 'none',
				'section'  => 'section-header-builder',
				'title'    => __( 'Position', 'astra' ),
				'type'     => 'control',
				'control'  => 'select',
				'priority' => 5,
				'choices'  => array(
					'none'                      => __( 'None', 'astra' ),
					'astra_masthead_content'    => __( 'Inside Header', 'astra' ),
					'astra_header_markup_after' => __( 'After Header', 'astra' ),
					'astra_entry_top'           => __( 'Before Title', 'astra' ),
				),
				'partial'  => array(
					'selector'            => '.ast-breadcrumbs-wrapper .ast-breadcrumbs .trail-items',
					'container_inclusive' => false,
				),
			),
		);

		return array_merge( $configurations, $_configs );

	}

	/**
	 * Register Astra-Breadcrumbs Settings.
	 *
	 * @param Array                $configurations Astra Customizer Configurations.
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @since 1.7.0
	 * @return Array Astra Customizer Configurations with updated configurations.
	 */
	public function compontent_tabs() {
		return '<div class="kadence-build-tabs nav-tab-wrapper wp-clearfix">
		<a href="#" class="nav-tab preview-desktop kadence-build-tabs-button" data-device="desktop">
			<span class="dashicons dashicons-desktop"></span>
			<span><?php esc_html_e( "Desktop", "astra" ); ?></span>
		</a>
		<a href="#" class="nav-tab preview-tablet preview-mobile kadence-build-tabs-button" data-device="tablet">
			<span class="dashicons dashicons-smartphone"></span>
			<span><?php esc_html_e( "Tablet / Mobile", "astra" ); ?></span>
		</a>
	</div>';
	}
	
}

new Astra_Hfb_Configs();

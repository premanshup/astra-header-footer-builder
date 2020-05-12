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

			/**
			 * Header Builder Main - Panel
			 */

			array(
				'name'     => 'panel-hfb',
				'type'     => 'panel',
				'priority' => 8,
				'title'    => __( 'Header Builder', 'astra' ),
			),

			/*
			* Header Builder - Section
			*/
			array(
				'name'               => 'section-header-builder',
				'type'               => 'section',
				'priority'           => 5,
				'panel'              => 'panel-hfb',
				'title'              => __( 'Header Builder', 'astra' ),
			),

			/*
			* Header Builder - Desktop/Mobile Buttons.
			*/
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[header_builder]',
				'section'  => 'section-header-builder',
				'control'  => 'astra_blank_control',
				'type'     => 'control',
				'priority' => 5,
				'description'  => $this->builder_tabs(),
			),

			/*
			* Header Builder - Desktop Items.
			*/
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[header_desktop_items]',
				'section'  => 'section-header-builder',
				'control'  => 'astra_builder_control',
				'type'     => 'control',
				'priority' => 5,
				'context'      => array(
					array(
						'setting' => '__device',
						'value'   => 'desktop',
					),
				),
				// 'choices'      => array(
				// 	'logo'          => array(
				// 		'name'    => esc_html__( 'Logo', 'kadence' ),
				// 		'section' => 'title_tagline',
				// 	),
				// 	'button'        => array(
				// 		'name'    => esc_html__( 'Button', 'kadence' ),
				// 		'section' => 'kadence_customizer_header_button',
				// 	),
				// ),
				'input_attrs'  => array(
					'group' => 'header_desktop_items',
					'rows'  => array( 'top', 'main', 'bottom' ),
					'zones' => array(
						'top' => array(
							'top_left'         => is_rtl() ? esc_html__( 'Top - Right', 'kadence' ) : esc_html__( 'Top - Left', 'kadence' ),
							'top_left_center'  => is_rtl() ? esc_html__( 'Top - Right Center', 'kadence' ) : esc_html__( 'Top - Left Center', 'kadence' ),
							'top_center'       => esc_html__( 'Top - Center', 'kadence' ),
							'top_right_center' => is_rtl() ? esc_html__( 'Top - Left Center', 'kadence' ) : esc_html__( 'Top - Right Center', 'kadence' ),
							'top_right'        => is_rtl() ? esc_html__( 'Top - Left', 'kadence' ) : esc_html__( 'Top - Right', 'kadence' ),
						),
						'main' => array(
							'main_left'         => is_rtl() ? esc_html__( 'Main - Right', 'kadence' ) : esc_html__( 'Main - Left', 'kadence' ),
							'main_left_center'  => is_rtl() ? esc_html__( 'Main - Right Center', 'kadence' ) : esc_html__( 'Main - Left Center', 'kadence' ),
							'main_center'       => esc_html__( 'Main - Center', 'kadence' ),
							'main_right_center' => is_rtl() ? esc_html__( 'Main - Left Center', 'kadence' ) : esc_html__( 'Main - Right Center', 'kadence' ),
							'main_right'        => is_rtl() ? esc_html__( 'Main - Left', 'kadence' ) : esc_html__( 'Main - Right', 'kadence' ),
						),
						'bottom' => array(
							'bottom_left'         => is_rtl() ? esc_html__( 'Bottom - Right', 'kadence' ) : esc_html__( 'Bottom - Left', 'kadence' ),
							'bottom_left_center'  => is_rtl() ? esc_html__( 'Bottom - Right Center', 'kadence' ) : esc_html__( 'Bottom - Left Center', 'kadence' ),
							'bottom_center'       => esc_html__( 'Bottom - Center', 'kadence' ),
							'bottom_right_center' => is_rtl() ? esc_html__( 'Bottom - Left Center', 'kadence' ) : esc_html__( 'Bottom - Right Center', 'kadence' ),
							'bottom_right'        => is_rtl() ? esc_html__( 'Bottom - Left', 'kadence' ) : esc_html__( 'Bottom - Right', 'kadence' ),
						),
					),
				),
			),

			/*
			* Header Layout - Section
			*/
			array(
				'name'               => 'section-header-layout',
				'type'               => 'section',
				'priority'           => 10,
				'panel'              => 'panel-hfb',
				'title'              => __( 'Layout', 'astra' ),
			),

			/**
			 * Option: Breadcrumb Position
			 */
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[breadcrumb-position]',
				'default'  => 'none',
				'section'  => 'section-header-layout',
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
	public function builder_tabs() {
		return '<div class="astra-ignore-desc kadence-build-tabs nav-tab-wrapper wp-clearfix">
			<a href="#" class="nav-tab preview-desktop kadence-build-tabs-button" data-device="desktop">
				<span class="dashicons dashicons-desktop"></span>
				<span>Desktop</span>
			</a>
			<a href="#" class="nav-tab preview-tablet preview-mobile kadence-build-tabs-button" data-device="tablet">
				<span class="dashicons dashicons-smartphone"></span>
				<span>Tablet / Mobile</span>
			</a>
		</div>
		<span class="button button-secondary kadence-builder-hide-button kadence-builder-tab-toggle"><span class="dashicons dashicons-no"></span>Hide</span>
		<span class="button button-secondary kadence-builder-show-button kadence-builder-tab-toggle"><span class="dashicons dashicons-edit"></span>Header Builder</span>';
	}
	
}

new Astra_Hfb_Configs();

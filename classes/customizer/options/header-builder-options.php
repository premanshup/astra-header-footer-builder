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

			/**
			 * Option: Astra Text React
			 */
			array(
				'name'     => ASTRA_THEME_SETTINGS . '[text-try]',
				'default'  => 'none',
				'section'  => 'section-header-layout',
				'label'    => __( 'Text Try', 'astra' ),
				'type'     => 'control',
				'control'  => 'astra_text_control',
				'priority' => 10,
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
		return '<div class="astra-ignore-desc astra-build-tabs nav-tab-wrapper wp-clearfix">
			<a href="#" class="nav-tab preview-desktop astra-build-tabs-button" data-device="desktop">
				<span class="dashicons dashicons-desktop"></span>
				<span>Desktop</span>
			</a>
			<a href="#" class="nav-tab preview-tablet preview-mobile astra-build-tabs-button" data-device="tablet">
				<span class="dashicons dashicons-smartphone"></span>
				<span>Tablet / Mobile</span>
			</a>
		</div>
		<span class="button button-secondary astra-builder-hide-button astra-builder-tab-toggle"><span class="dashicons dashicons-no"></span>Hide</span>
		<span class="button button-secondary astra-builder-show-button astra-builder-tab-toggle"><span class="dashicons dashicons-edit"></span>Header Builder</span>';
	}
	
}

new Astra_Hfb_Configs();

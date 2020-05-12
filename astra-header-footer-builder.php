<?php
/**
 * Plugin Name: Astra Header Builder React
 * Plugin URI: wpastra.com
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Premanshu Pandey
 * Author URI: wpastra.com
 */

if ( 'astra' !== get_template() ) {
	return;
}

define( 'ASTRA_HFB_VERSION', '1.0.0' );
define( 'ASTRA_HFB_FILE', __FILE__ );
define( 'ASTRA_HFB_DIR', plugin_dir_path( ASTRA_HFB_FILE ) );
define( 'ASTRA_HFB_URI', plugins_url( '/', ASTRA_HFB_FILE ) );

require_once ASTRA_HFB_DIR . 'classes/class-astra-header-builder-loader.php';

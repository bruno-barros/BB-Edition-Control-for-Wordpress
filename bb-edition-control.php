<?php
/**
 * Plugin BB Edition Control
 *
 * @package   BbEditionControl
 * @author    Bruno Barros <bruno@brunobarros.com>
 * @license   GPL-2.0+
 * @link      http://brunobarros.com
 * @copyright 2013 Bruno Barros
 *
 * @wordpress-plugin
 * Plugin Name:       BB Edition Control
 * Plugin URI:        http://www.brunobarros.com
 * Description:       Plugin para categorizar todo conteúdo em edições, como em um jornal.
 * Version:           1.0.0
 * Author:            Bruno Barros
 * Author URI:        http://brunobarros.com
 * Text Domain:       bb-edition-control
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * lê plugin
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/BbEditionControl.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'BbEditionControl', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'BbEditionControl', 'deactivate' ) );


add_action( 'plugins_loaded', array( 'BbEditionControl', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/BbEditionControlAdmin.php' );
	add_action( 'plugins_loaded', array( 'BbEditionControlAdmin', 'get_instance' ) );

}

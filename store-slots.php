<?php
/**
 * Plugin Name:       StoreSlotsT
 * Plugin URI:        https://github.com/Shahreyar46
 * Description:       StoreSlots is one of the top wp plugin for delivery & Takeaway products on schedule.
 * Version:           1.0.0
 * Author:            StoreSlots
 * Author URI:        https://github.com/Shahreyar46
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       store-slots
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


define(  'STORESLOTS_VERSION', '0.0.1' );
defined( 'STORESLOTS_PATH' ) or define( 'STORESLOTS_PATH', plugin_dir_path( __FILE__ ) );
defined( 'STORESLOTS_URL' ) or define( 'STORESLOTS_URL', plugin_dir_url( __FILE__ ) );
defined( 'STORESLOTS_BASE_FILE' ) or define( 'STORESLOTS_BASE_FILE', __FILE__ );
defined( 'STORESLOTS_BASE_PATH' ) or define( 'STORESLOTS_BASE_PATH', plugin_basename(__FILE__) );
defined( 'STORESLOTS_IMG_DIR' ) or define( 'STORESLOTS_IMG_DIR', plugin_dir_url( __FILE__ ) . 'assets/img/' );
defined( 'STORESLOTS_CSS_DIR' ) or define( 'STORESLOTS_CSS_DIR', plugin_dir_url( __FILE__ ) . 'assets/css/' );
defined( 'STORESLOTS_JS_DIR' ) or define( 'STORESLOTS_JS_DIR', plugin_dir_url( __FILE__ ) . 'assets/js/' );

require_once STORESLOTS_PATH . 'includes/StoreSlotsUtils.php';
require_once STORESLOTS_PATH . 'includes/StoreSlotsDB.php';
require_once STORESLOTS_PATH . 'backend/class-store-slots-ajax.php';
require_once STORESLOTS_PATH . 'backend/class-store-slots-admin.php';
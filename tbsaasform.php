<?php
/**
 * Plugin Name: The Booking Form
 * Plugin URI:	http://booking.drivenot.com
 * Description: Integration for WordPress of The Booking Form - transportation companies booking and dispatch system. Please use shortcode [transport-booking-form] in your Page content.
 * Author:	KANEV.COM
 * Author URI:	http://kanev.com
 * Version:		1.0.3
 * Text Domain: tbsaasform
 * Domain Path: /languages
 *
 * The Booking Form is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TBSAASFORM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( TBSAASFORM_PLUGIN_DIR . 'functions.php' );

add_action( 'plugins_loaded', 'init_tbsaasform' );
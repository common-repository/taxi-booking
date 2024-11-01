<?php 

/**
 * Init plugin
 *
 * @return void
 */
function init_tbsaasform()
{
    if ( is_admin() ) {
        add_action( 'admin_menu', 'tbsaasform_admin_menu' );
        add_action( 'admin_init', 'tbsaasform_option_form_handler' );
    } 
    else {
        add_shortcode( 'transport-booking-form', 'show_tbsaas_booking_form' );
    }        
}

/**
 * Show admin menu
 *
 * @return void
 */
function tbsaasform_admin_menu()
{
    add_menu_page( 'The Booking Form Page', 'The Booking Form', 'manage_options', 'tbsaasform', 'plugin_page' );
}

/**
 * Show Shortcode form
 *
 * @return void
 */
function plugin_page()
{
    $current_code = get_option( 'tbsaasform_iframe_code' );

    $template = __DIR__ . '/form.php';

    if ( file_exists( $template ) ) {
        include $template;
    }
}

/**
 * Handle the Shortcode form
 *
 * @return void
 */
function tbsaasform_option_form_handler()
{
    if ( empty( $_POST['submit_tbsaasform_shortcode'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'tbsaasform-shortcode' ) ) {
        wp_die( 'Something went wrong!' );
    }

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( "You are not authorized!" );
    }

    $opt_val = wp_kses( $_POST[ 'tbsaasform_iframe_code' ], array( 
        'a' => array(
            'href' => array(),
            'target' => array(),
            'style' => array(),
            'title' => array(),
        ),
        'iframe' => array(
            'src' => array(),
            'width' => array(),
            'height' => array(),
            'frameborder' => array(),
            'scrolling' => array(),
            'allow' => array(),
        ),
    ));

    // Save the posted value in the database
    update_option( 'tbsaasform_iframe_code', $opt_val );

    $redirect_url = admin_url( 'admin.php?page=tbsaasform&updated=true' );
    
    wp_redirect( $redirect_url );
    exit;
}

/**
 * Print the Booking form code
 *
 * @return string
 */
function show_tbsaas_booking_form() 
{
	$tbsaasform_iframe_code = get_option( 'tbsaasform_iframe_code' );
	
	return $tbsaasform_iframe_code;
}
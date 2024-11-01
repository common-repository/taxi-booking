<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php _e( 'The Booking Form Settings', 'tbsaasform' );?>
    </h1>

    <?php if ( !empty( $_GET['updated'] ) ) { ?>
        <div class="notice notice-success">
            <p><?php _e( 'Settings has been updated successfully!', 'tbsaasform' );?></p>
        </div>
    <?php } ?>

	<h4><?php _e( '1. Copy and Paste the Code for The Booking Form from booking.drivenot.com > My Company.', 'tbsaasform' );?></h4>
	
	<h4><?php _e( '2. Use shortcode [transport-booking-form] in your Page/Post content to display The Booking Form.', 'tbsaasform' );?></h4>

    <form action="" method="post" name="shortcode-form" id="shortcode-form" class="validate">
        <table class="form-table" role="presentation">
            <tbody>
                <tr class="form-field">
                    <td>
                        <textarea class="regular-text" name="tbsaasform_iframe_code"><?php echo esc_textarea( $current_code );?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <?php wp_nonce_field( 'tbsaasform-shortcode' );?>        
        <?php submit_button( __( 'Save Changes', 'tbsaasform' ), 'primary', 'submit_tbsaasform_shortcode' ); ?>
    </form>

</div>
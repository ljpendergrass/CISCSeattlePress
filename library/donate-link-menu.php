<?php
/** Step 2 */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_options_page( 'Donate Link Options', 'Donate Link', 'manage_options', 'donate-link-menu', 'donate_link_menu' );
}

/** Step 3. */
function donate_link_menu() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

  // varaibles for field and option names
  $opt_name = 'donate_link_url';
  $hidden_field_name = 'donate_submit_hidden';
  $data_field_name = 'donate_link_url';

  // Read in existing option value from database
  $opt_val = get_option( $opt_name );

  // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put a "settings saved" message on the screen
?>

<div class="updated"><p><strong><?php _e('Donate link updated.', 'donate-link-menu' ); ?></strong></p></div>

<?php

    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'CISC Donate Link', 'donate-link-menu' ) . "</h2>";

    // settings form

    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Donate Link URL: ", 'donate-link-menu' ); ?>
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">
</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>

<?php } ?>

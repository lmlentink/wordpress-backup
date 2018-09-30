<?php
# https://vedovini.net/2013/05/how-to-change-your-wordpress-password-when-you-lost-all-hopes/
define('WP_USE_THEMES', false);
require('wp-load.php');
#wp_set_password('', 1);

#https://wordpress.stackexchange.com/questions/53503/can-i-programmatically-login-a-user-without-a-password
$username = "lm";
$user = get_user_by('login', $username );

// Redirect URL //
if ( !is_wp_error( $user ) )
{
    wp_clear_auth_cookie();
    wp_set_current_user ( $user->ID );
    wp_set_auth_cookie  ( $user->ID );

    $redirect_to = user_admin_url();
    wp_safe_redirect( $redirect_to );
    exit();
}

?>


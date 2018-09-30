<?php
# https://vedovini.net/2013/05/how-to-change-your-wordpress-password-when-you-lost-all-hopes/
define('WP_USE_THEMES', false);
require('wp-load.php');
#wp_set_password('', 1);

#https://wordpress.stackexchange.com/questions/53503/can-i-programmatically-login-a-user-without-a-password
$username = "lm";
$user = get_user_by('login', $username );

clean_user_cache($user->ID);
wp_clear_auth_cookie();
wp_set_current_user($user->ID);
wp_set_auth_cookie($user->ID, true, false);
update_user_caches($user);



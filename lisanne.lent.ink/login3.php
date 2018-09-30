<?php
#https://cleverplugins.com/autologin-wordpress-php-script/
define('WP_USE_THEMES', false);
require('wp-load.php');

#require('wp-blog-header.php'); 
$user_login = 'admin'; 
$user = get_userdatabylogin($user_login);
$user_id = $user->ID; 
wp_set_current_user($user_id, $user_login);
wp_set_auth_cookie($user_id); 
do_action('wp_login', $user_login); 


<?php $table_prefix = 'wp_';
#if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') $_SERVER['HTTPS'] = 'on';
$_SERVER['HTTPS'] = 'on';
define('WP_HOME','https://juflisanne.nl');
define('WP_SITEURL','https://juflisanne.nl');
require_once(ABSPATH . 'wp-settings.php');


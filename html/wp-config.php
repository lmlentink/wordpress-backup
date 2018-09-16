<?php $table_prefix = 'wp_';
#if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') $_SERVER['HTTPS'] = 'on';
$_SERVER['HTTPS'] = 'on';
define('WP_HOME','https://lisanne.lent.ink');
define('WP_SITEURL','https://lisanne.lent.ink');
require_once(ABSPATH . 'wp-settings.php');

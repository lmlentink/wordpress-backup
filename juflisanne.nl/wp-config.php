<<<<<<< HEAD
<?php
define('DB_NAME', 'wordpress'); #getenv('WORDPRESS_DB_NAME'));
define('DB_USER', 'wordpress'); #getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST', 'wpdb:3306'); #getenv('WORDPRESS_DB_HOST'));

$table_prefix = 'wp_juf_';
$_SERVER['HTTPS'] = 'on';
define('WP_HOME','https://juflisanne.nl');
define('WP_SITEURL','https://juflisanne.nl');
#define( 'WP_DEBUG', true );
require_once(ABSPATH . 'wp-settings.php');
=======
<?php $table_prefix = 'wp_';
#if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') $_SERVER['HTTPS'] = 'on';
$_SERVER['HTTPS'] = 'on';
define('WP_HOME','https://juflisanne.nl');
define('WP_SITEURL','https://juflisanne.nl');
require_once(ABSPATH . 'wp-settings.php');

>>>>>>> 9e94c8a72000fafe46b447800c87a3500590576a

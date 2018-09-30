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

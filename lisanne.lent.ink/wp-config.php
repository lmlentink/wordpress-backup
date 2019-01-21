<?php
define('DB_NAME', 'wordpress'); #getenv('WORDPRESS_DB_NAME'));
define('DB_USER', 'wordpress'); #getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST', 'wpdb:3306'); #getenv('WORDPRESS_DB_HOST'));

$table_prefix = 'wp_li_';
$_SERVER['HTTPS'] = 'on';
define('WP_HOME','https://lisanne.lent.ink/');
define('WP_SITEURL','https://lisanne.lent.ink/');
#define('WP_DEBUG', true);
#define('WP_DEBUG_LOG', true);
#define('WP_DEBUG_DISPLAY', true);
require_once(ABSPATH . 'wp-settings.php');


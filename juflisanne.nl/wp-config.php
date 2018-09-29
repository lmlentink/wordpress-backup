<?php
$table_prefix = 'wp_';
ob_start();
$_SERVER['HTTPS'] = 'on';
define('WP_HOME','https://juflisanne.nl');
define('WP_SITEURL','https://juflisanne.nl');
#define('DB_FILE', '.ht.sqlite');
#define('DB_DIR', '/var/php/lisanne.lent.ink/wp-content/database/');
#define( 'WP_DEBUG', true );
require_once(ABSPATH . 'wp-settings.php');

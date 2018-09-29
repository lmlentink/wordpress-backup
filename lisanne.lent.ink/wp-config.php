<?php
$table_prefix = 'wp_';
$_SERVER['HTTPS'] = 'on';
define('WP_HOME','https://lisanne.lent.ink');
define('WP_SITEURL','https://lisanne.lent.ink');
#define('DB_FILE', '.ht.sqlite');
#define('DB_DIR', '/var/php/lisanne.lent.ink/wp-content/database/');
#define( 'WP_DEBUG', true );
require_once(ABSPATH . 'wp-settings.php');

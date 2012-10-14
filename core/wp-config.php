<?php
/**
 * The base configurations of the WordPress.
 *
 * Contents are in seperate file.
 */


if (file_exists(dirname(__FILE__) . '/wp-config-dev.php')) {
  include(dirname(__FILE__) . '/wp-config-dev.php');
  define('WP_LOCAL_DEV', true);
} else if (file_exists(dirname(__FILE__) . '/wp-config-prod.php')) {
  include(dirname(__FILE__) . '/wp-config-prod.php');
  define('WP_LOCAL_DEV', false);
}

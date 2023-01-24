<?php

/**
 * Plugin Name: Managed WP ImgIX
 * Version: 0.0.1
 * Description: Managed WordPress ImgIX integration
 * Author: Ryan Soury | Web Doodle
 * Author URI: https://www.webdoodle.com.au/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'MANAGED_IMGIX_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define( 'MANAGED_IMGIX_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ));

if(! get_option('WP_IMGIX_URL') || ! get_option('WP_IMGIX_SIGNING_TOKEN')) {
    update_option('WP_IMGIX_URL', 'SET-ME-UP');
    update_option('WP_IMGIX_SIGNING_TOKEN', 'SET-ME-UP');
}

require_once MANAGED_IMGIX_PLUGIN_DIR . 'vendor/wp-imgix/wp-imgix.php';

/*
 * Include helper functions
 */
require_once MANAGED_IMGIX_PLUGIN_DIR . 'includes/functions.php';

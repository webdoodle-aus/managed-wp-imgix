<?php

if (!function_exists('managed_wp_imgix_settings')) {
    /**
     * Managed WP ImgIX settings admin menu.
     */
    function managed_wp_imgix_settings()
    {
        require_once MANAGED_IMGIX_PLUGIN_DIR . 'pages/settings.php';
    }
}


if (!function_exists('managed_wp_imgix_home')) {
    /**
     * Managed WP ImgIX home admin menu.
     */
    function managed_wp_imgix_home()
    {
        require_once MANAGED_IMGIX_PLUGIN_DIR . 'pages/home.php';
    }
}

if (!function_exists('managed_wp_imgix_admin_menu')) {
    /**
     * Managed WP ImgIX admin menu and sub-menu registration.
     */
    function managed_wp_imgix_admin_menu() {
        add_menu_page(
            __( 'Managed WP ImgIX', 'managed-wp-imgix' ),
            __( 'Managed WP ImgIX', 'managed-wp-imgix' ),
            'manage_options',
            'managed-wp-imgix-home',
            'managed_wp_imgix_home',
            'dashicons-admin-tools'
        );

        add_submenu_page(
            'managed_wp_imgix_home',
            __( 'Setup Managed WP ImgIX', 'managed-wp-imgix' ),
            '',
            'manage_options',
            'managed-wp-imgix-settings',
            'managed_wp_imgix_settings',
            'display_my_submenu'
        );

    }
}


add_action( 'admin_menu', 'managed_wp_imgix_admin_menu' );

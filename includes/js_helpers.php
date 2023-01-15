<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('wp_head', 'managed_wp_imgix_js');
function managed_wp_imgix_js()
{
    ?>
    <script type="text/javascript">
        function handle_wp_imgix_settings_display() {
            let imgix_settings = document.getElementById('managed_wp_imgix_settings_section');
            imgix_settings.style.display = imgix_settings.style.display === 'none' ? '' : 'none';

        }

    </script>

    <?php
}

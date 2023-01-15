<?php

$show_success_msg = FALSE;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    update_option('wp_imgix_url', $_POST['wp_imgix_url']);
    update_option('wp_imgix_signing_token', $_POST['wp_imgix_signing_token']);

    // Success message
    $show_success_msg = TRUE;
}

?>
<div class="wrap">
    <form name="managed_wp_imgix" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?page=managed-wp-imgix-settings'); ?>">
        <h1 class="wp-heading-inline"><?php _e('Setup Managed WP ImgIX', 'managed-wp-imgix'); ?></h1>

        <?php if ($show_success_msg) { ?>
            <div class="updated">
                <p>
                    <?php _e('Settings saved successfully.', 'managed_wp_imgix'); ?>
                </p>
            </div>
        <?php } ?>

        <hr/>

        <input type="checkbox" name="handle_wp_imgix_settings_display" onclick="handle_wp_imgix_settings_display()">
        Already have ImgIX credentials?
        </input>


        <div id="managed_wp_imgix_settings_section" style="display: block">
            <table class="form-table" role="presentation">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="wp_imgix_url"><?php _e('WP_IMGIX_URL', 'managed-wp-imgix') ?>
                        </label>
                    </th>
                    <td>
                        <input
                                name="wp_imgix_url"
                                type="text"
                                id="wp_imgix_url"
                                value="<?php echo get_option('wp_imgix_url'); ?>"
                                class="regular-text"
                        >
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="wp_imgix_signing_token"><?php _e('WP_IMGIX_SIGNING_TOKEN', 'managed-wp-imgix') ?>
                        </label>
                    </th>
                    <td>
                        <input
                                name="wp_imgix_signing_token"
                                type="text"
                                id="wp_imgix_signing_token"
                                value="<?php echo get_option('wp_imgix_signing_token'); ?>"
                                class="regular-text"
                        >
                    </td>
                </tr>
                </tbody>

            </table>
            <br />
            <p class="submit">
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?page=managed-wp-imgix-home'); ?>">
                    <button class="button" type="button"><?php _e('Go Back', 'managed-wp-imgix') ?></button>
                </a>

                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'managed-wp-imgix') ?>">
            </p>
        </div>


    </form>

</div>

<footer style="position:absolute; padding-top: 500px">Powered by <a href="https://webdoodle.com.au/">Web Doodle</a></footer>

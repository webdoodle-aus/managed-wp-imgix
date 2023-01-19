<?php

$show_success_msg = FALSE;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    update_option('WP_IMGIX_URL', $_POST['WP_IMGIX_URL']);
    update_option('WP_IMGIX_SIGNING_TOKEN', $_POST['WP_IMGIX_SIGNING_TOKEN']);

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

        <?php
        $is_displayed = 'none';
        if(
                get_option('WP_IMGIX_SIGNING_TOKEN', 'managed-wp-imgix') ||
                get_option('WP_IMGIX_SIGNING_TOKEN', 'managed-wp-imgix')
        ){
            $is_displayed = 'block';
        }
        ?>

        <input type="checkbox" name="set_wp_imgix_settings" onclick="handle_wp_imgix_settings_display()">
        Already have ImgIX credentials?
        </input>


        <div id="managed_wp_imgix_settings_section" style="display: <?php echo $is_displayed ?>">
            <table class="form-table" role="presentation">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="WP_IMGIX_URL"><?php _e('WP_IMGIX_URL', 'managed-wp-imgix') ?>
                        </label>
                    </th>
                    <td>
                        <input
                                name="WP_IMGIX_URL"
                                type="url"
                                id="WP_IMGIX_URL"
                                value="<?php echo get_option('WP_IMGIX_URL'); ?>"
                                class="regular-text"
                        >
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="WP_IMGIX_SIGNING_TOKEN"><?php _e('WP_IMGIX_SIGNING_TOKEN', 'managed-wp-imgix') ?>
                        </label>
                    </th>
                    <td>
                        <input
                                name="WP_IMGIX_SIGNING_TOKEN"
                                type="text"
                                id="WP_IMGIX_SIGNING_TOKEN"
                                value="<?php echo get_option('WP_IMGIX_SIGNING_TOKEN'); ?>"
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

<script type="text/javascript">
    function handle_wp_imgix_settings_display() {
        let imgix_settings = document.getElementById('managed_wp_imgix_settings_section');
        imgix_settings.style.display = imgix_settings.style.display === 'none' ? '' : 'none';
    }
</script>

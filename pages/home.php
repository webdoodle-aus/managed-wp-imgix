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
    <h1 class="wp-heading-inline"><?php _e('Managed WP IMGIX', 'managed-wp-imgix'); ?></h1>
    <hr/>
    <p>
        ImgIX, the fastest and largest image delivery and optimisation network, is now available for WordPress websites.
    </p>

    <a href="https://imgix.com/" target="_blank">Learn more about ImgIX</a>

    <br>
    <p>Managed WP ImgIX is a Web Doodle service that delivers all the website speed improvements ImgIX offers, within a simple WordPress installation.</p>

    <a href="https://www.webdoodle.com.au/managed-wp-imgix" target="_blank">Learn more about Managed WP ImgIX</a>

    <br />
    <br />
    <p>Once you’ve reviewed both websites, get started by clicking the button below.</p>

    <?php
        $WEBSITE_URL = get_site_url();
        $IMAGE_COUNT = count((array)wp_count_attachments());
        $FORM_URL = 'https://docs.google.com/forms/d/e/1FAIpQLSfifujT5bIfdKrqlx6Ea6qvtvSiuvxB6-xRrn3WqC9GyUER8A/viewform?usp=pp_url&entry.2026955709='.$WEBSITE_URL.'&entry.1033632428='.$IMAGE_COUNT;
    ?>

    <a href="<?php echo $FORM_URL ?>" target="_blank">
        <button class="button button-primary"><?php _e('Setup Managed WP ImgIX', 'managed-wp-imgix') ?></button>
    </a>


    <form name="managed_wp_imgix" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?page=managed-wp-imgix-home'); ?>">

        <?php if ($show_success_msg) { ?>
            <div class="updated">
                <p>
                    <?php _e('Settings saved successfully.', 'managed_wp_imgix'); ?>
                </p>
            </div>
        <?php } ?>

        <?php
        $is_displayed = 'none';
        if(
            get_option('WP_IMGIX_URL') != 'SET-ME-UP' ||
            get_option('WP_IMGIX_SIGNING_TOKEN')  != 'SET-ME-UP'
        ){
            $is_displayed = 'block';
        }
        ?>
        <br />
        <br />

        <input type="checkbox" name="set_wp_imgix_settings" onclick="handle_wp_imgix_settings_display()" <?php if ($is_displayed == 'block') echo 'checked disabled'; ?>>
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
                                type="text"
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
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'managed-wp-imgix') ?>">
            </p>
        </div>


    </form>

</div>

<div class="alignleft" style="padding-top: 50px">Powered by <a href="https://webdoodle.com.au/" target="_blank">Web Doodle</a></div>

<script type="text/javascript">
    function handle_wp_imgix_settings_display() {
        let imgix_settings = document.getElementById('managed_wp_imgix_settings_section');
        imgix_settings.style.display = imgix_settings.style.display === 'none' ? '' : 'none';
    }
</script>

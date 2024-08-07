<?php
/*
 * Template name: Upload
 */
get_header();
$post = get_post();
$fields = get_fields($post->ID);
?>

<section class="upload">
    <div class="container">
        <?php if (!empty($fields['adv_link'])) { ?>
            <div class="upload_img">
                <form class="upload_img__form" enctype="multipart/form-data" novalidate>
                    <input type="file" class="file_upload">
                </form>
                <div class="cta__btn btn upload_img__btn" data-url="<?php echo esc_url($fields['adv_link']['url']); ?>">
                    <?php get_svg('upload'); ?>
                    <?php echo esc_html($fields['adv_link']['title'] ?? __('Upload Photo', DOMAIN)); ?>
                </div>
                <?php get_template_part_var('global/progress-bar'); ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php
get_footer();
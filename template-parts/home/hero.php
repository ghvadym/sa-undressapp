<?php
if (empty($fields)) {
    return;
}

$img = !empty($fields['hero_img']) ? wp_get_attachment_image($fields['hero_img'], 'full') : '';
?>

<section class="hero_section">
    <div class="container">
        <div class="cta__row">
            <div class="cta__content">
                <?php if (!empty($fields['hero_title'])) { ?>
                    <h1 class="cta__title">
                        <?php echo $fields['hero_title']; ?>
                    </h1>
                <?php } ?>
                <?php if (!empty($fields['hero_text'])) { ?>
                    <div class="cta__subtitle">
                        <?php echo $fields['hero_text']; ?>
                    </div>
                <?php } ?>
                <?php if (!empty($fields['hero_link']) && !empty($fields['hero_link']['url'])) { ?>
                    <div class="upload_img">
                        <form class="upload_img__form" enctype="multipart/form-data" novalidate>
                            <input type="file" class="file_upload">
                        </form>
                        <div class="cta__btn btn upload_img__btn" data-url="<?php echo esc_url($fields['hero_link']['url']); ?>">
                            <?php get_svg('upload'); ?>
                            <?php echo esc_html($fields['hero_link']['title'] ?? __('Upload Photo', DOMAIN)); ?>
                        </div>
                        <?php get_template_part_var('global/progress-bar'); ?>
                    </div>
                <?php } ?>
            </div>
            <?php if ($img) { ?>
                <div class="cta__img">
                    <?php echo $img; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
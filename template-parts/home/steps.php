<?php

$steps = $fields['steps_list'] ?? [];

if (empty($steps)) {
    return;   
}
?>

<section class="steps">
    <div class="container">
        <?php if (!empty($fields['steps_title'])) { ?>
            <h2 class="title_main">
                <?php echo $fields['steps_title']; ?>
            </h2>
        <?php } ?>
        <div class="steps_list">
            <?php foreach ($steps as $step) {
                $img = !empty($step['img']) ? wp_get_attachment_image($step['img'], 'full') : '';
                ?>
                <div class="article">
                    <div class="article__body">
                        <?php if ($img) { ?>
                            <div class="article__img">
                                <?php echo $img; ?>
                            </div>
                        <?php } ?>
                        <div class="article__content">
                            <?php _get_field($step['title'] ?? '', 'article__title', 'h3'); ?>
                            <?php if (!empty($step['text'])) { ?>
                                <div class="article__text">
                                    <?php echo $step['text']; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
        <?php if (!empty($fields['steps_btn'])) { ?>
                <div class="articles__btn">
                <?php echo link_html($fields['steps_btn'], 'btn') ?>
            </div>
        <?php } ?>
    </div>
</section>

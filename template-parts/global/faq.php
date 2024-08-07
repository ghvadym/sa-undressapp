<?php
if (empty($fields['faq'])) {
    return;
}
?>

<section class="faq_section">
    <div class="container-sm">
        <?php banner_field($banner ?? [], 'banner_full_width'); ?>
        <h2 class="title_main">
            <?php _e('FAQ', DOMAIN); ?>
        </h2>
    </div>
    <div class="container">
        <?php adv_banner_group($fields['adv_banner_2'] ?? [], $options['adv_banner_2'] ?? [], 'banner_full_width'); ?>
    </div>
    <div class="container-sm">
        <div class="faq__list">
            <?php foreach ($fields['faq'] as $i => $faqItem) { ?>
                <div class="faq__item">
                    <?php if ($faqItem['title']) { ?>
                        <h2 class="faq__title">
                            <?php echo esc_html($faqItem['title']); ?>
                        </h2>
                    <?php } ?>
                    <?php if ($faqItem['text']) { ?>
                        <div class="faq__text">
                            <?php echo $faqItem['text']; ?>
                        </div>
                    <?php } ?>
                </div>
                <?php
                if ($i === 2) {
                    adv_banner_group($fields['adv_banner_3'] ?? [], $options['adv_banner_3'] ?? [], 'banner_full_width');
                } else if ($i === 6) {
                    adv_banner_group($fields['adv_banner_4'] ?? [], $options['adv_banner_4'] ?? [], 'banner_full_width');
                } else if ($i === 10) {
                    adv_banner_group($fields['adv_banner_5'] ?? [], $options['adv_banner_5'] ?? [], 'banner_full_width');
                }
                ?>
            <?php } ?>
        </div>
    </div>
</section>


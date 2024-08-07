<?php

$steps = $fields['steps'] ?? [];

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
        <div class="articles">
            <?php foreach ($steps as $post) {
                get_template_part_var('cards/card-post', [
                    'post' => $post
                ]);
            } ?>
        </div>
    </div>
</section>

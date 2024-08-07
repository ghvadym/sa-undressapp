<?php

if (empty($post) || empty($fields)) {
    return;
}

$thumbnail = get_the_post_thumbnail($post, 'large');
$permalink = get_the_permalink($post);

$fanvueData = [
    'like'   => 'fanvue_likes_count',
    'photos' => 'fanvue_photos_count',
    'videos' => 'fanvue_videos_count'
];
?>

<div class="card">
    <?php if ($thumbnail) { ?>
        <?php if (!empty($gallery)) { ?>
            <a class="card__img" href="<?php echo $permalink; ?>">
                <?php echo $thumbnail ?>
            </a>
        <?php } else { ?>
            <div class="card__img">
                <?php echo $thumbnail ?>
            </div>
        <?php } ?>
    <?php } ?>
    <div class="card__body">
        <h3 class="card__title">
            <a href="<?php echo $permalink; ?>">
                <?php echo esc_html($post->post_title); ?>
            </a>
        </h3>
    </div>
</div>
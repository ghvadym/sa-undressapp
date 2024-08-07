<?php
get_header();
$post = get_post();
?>

<section class="page">
    <div class="container-sm">
        <h1>
            <?php echo esc_html($post->post_title); ?>
        </h1>
        <?php if ($post->post_content) { ?>
            <div class="text_block">
                <?php the_content(); ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php
get_footer();
<?php
/*
* Template name: Home
*/

get_header();

$post_id = get_the_ID();
$fields = get_fields($post_id);

get_template_part_var('home/hero', [
    'fields' => $fields
]);

get_template_part_var('home/steps', [
    'fields' => $fields
]);

get_template_part_var('global/faq', [
    'faq_list' => $fields['faq'] ?? [],
    'banner'   => $fields['bottom_adv_banner'] ?? []
]);

get_footer();

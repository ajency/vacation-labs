<?php

/*
Template Name: Themes Listing
 */
get_header();

//sorting  code start

if ($_REQUEST['order_by'] == 'title') {
    $args = array(
        'post_type'      => 'website_theme',
        'posts_per_page' => 4,
        'paged'          => $paged,
        'orderby'        => 'title',
        'order'          => 'ASC',
    );
} else if ($_REQUEST['order_by'] == 'recent') {
    $args = array(
        'post_type'      => 'website_theme',
        'posts_per_page' => 4,
        'paged'          => $paged,
    );
} else {
    //based on popularity
    $args = array(
        'post_type'      => 'website_theme',
        'posts_per_page' => 4,
        'orderby'        => 'meta_value_num',
        'meta_key'       => 'popularity',
    );
}

//sorting code end

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query = new WP_Query($args);
?>

<?php
/* Get Any Sections
================================================== */
echo get_template_part('functions/templates/sections'); ?>

<?php
templateThemeListing($query);

/* Get Footer
================================================== */
get_footer();?>
<?php
/**
 * Template Name:Theme Listing
 */

get_header();

$posts_per_page=6;
//sorting  code start
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($_REQUEST['order_by'] == 'title') {
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'orderby'        => 'title',
        'order'          => 'ASC',
    );
} else if ($_REQUEST['order_by'] == 'recent') {
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
    );
} else {
    //based on popularity
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'meta_value_num',
        'meta_key'       => '_popularity',
        'paged'          => $paged,
    );
}

//sorting code end


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

get_footer(); ?>



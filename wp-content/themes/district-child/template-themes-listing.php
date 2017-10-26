<?php

/*
Template Name: Themes Listing
 */
get_header();



/*$terms = get_terms();

foreach ( $terms as $term ) {
   echo $term->name.'<br />';
}*/

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query               = new WP_Query(array(
  'post_type' => 'website_theme',
   'posts_per_page' => 1,
   'meta_query' => false,
   'paged' => $paged,

 ));
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
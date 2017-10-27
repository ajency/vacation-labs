<?php

get_header();

$term = get_queried_object();
// echo "<pre>";
// print_r($term);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query               = new WP_Query(array(
  'post_type' => 'website_theme',
   'posts_per_page' => 4,
   'paged' => $paged,
   'tax_query' => array(
    array(
      'taxonomy' => 'travel-website-themes',
      'field'    => 'slug',
      'terms'    => $term->slug
    ),
  ),
 ));
?>

<?php
// print_r($query);
/* Get Any Sections
================================================== */
echo get_template_part('functions/templates/sections'); ?>

<?php
templateThemeListing($query);

/* Get Footer
================================================== */
get_footer(); ?>
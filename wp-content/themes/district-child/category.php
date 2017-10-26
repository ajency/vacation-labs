<?php

get_header();

$term = get_queried_object();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query               = new WP_Query(array(
  'post_type' => 'website_theme',
   'posts_per_page' => 1,
   'paged' => $paged,
   'cat' =>$term->term_id
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
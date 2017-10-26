<?php

/*
Template Name: Themes Listing
 */
get_header();

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

<script type="text/javascript">
	jQuery('body').on('click', '.filter-head a', function(e){
		e.preventDefault();
		jQuery('.filters-slide').removeClass('shown');
	});
	jQuery('body').on('click', '.toggle-filter', function(e){
		e.preventDefault();
		jQuery('.filters-slide').addClass('shown');
	});
</script>
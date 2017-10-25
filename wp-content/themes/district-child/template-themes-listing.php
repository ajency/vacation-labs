<?php

/*
Template Name: Themes Listing
 */
get_header();



/*$terms = get_terms();

foreach ( $terms as $term ) {
   echo $term->name.'<br />';
}*/


$query               = new WP_Query(array('post_type' => 'website_theme', 'posts_per_page' => -1,'meta_query' => false));
$website_themes_data = $query->posts;
?>

<?php
if (!empty($website_themes_data)) {
    foreach ($website_themes_data as $website_themes_val) {

      $post_id= $website_themes_val->ID;
      $theme_name= $website_themes_val->post_title;
      $theme_by=get_post_meta($post_id,'theme_by',true);
      $theme_url=get_post_meta($post_id,'theme_url',true);
      $popularity=get_post_meta($post_id,'popularity',true);
  
    }
}


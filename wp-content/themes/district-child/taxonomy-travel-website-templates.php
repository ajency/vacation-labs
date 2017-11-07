<?php

get_header();

$term = get_queried_object();
// echo "<pre>";
// print_r($term);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


//sorting  code start
$posts_per_page=6;
$custom_tax='travel-website-templates';

if ($_REQUEST['order_by'] == 'title') {
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => $custom_tax,
            'field'    => 'slug',
            'terms'    => $term->slug
          ),
        ),
    );
} else if ($_REQUEST['order_by'] == 'recent') {
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => $custom_tax,
            'field'    => 'slug',
            'terms'    => $term->slug
          ),
        ),
    );
} else {
    //based on popularity
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'meta_value_num',
        'meta_key'       => '_popularity',
         'paged'          => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => $custom_tax,
            'field'    => 'slug',
            'terms'    => $term->slug
          ),
        ),
    );
}

//sorting code end

$query               = new WP_Query($args);
?>

<?php
// print_r($query);
/* Get Any Sections
================================================== */
echo get_template_part('functions/templates/sections'); ?>

<?php

$t_id = $term->term_id;
$term_meta = get_option( "taxonomy_$t_id" ); 
$category_title=esc_attr( $term_meta['vl_title'] )==''?$term->name:esc_attr( $term_meta['vl_title'] );

$data=array('category_name' => $category_title,'category_desc' => $term->description);

templateThemeListing($query,$data);

/* Get Footer
================================================== */
get_footer(); ?>
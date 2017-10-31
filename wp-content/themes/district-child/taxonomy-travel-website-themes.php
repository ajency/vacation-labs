<?php

get_header();

$term = get_queried_object();
// echo "<pre>";
// print_r($term);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


//sorting  code start

if ($_REQUEST['order_by'] == 'title') {
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => 4,
        'paged'          => $paged,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'travel-website-themes',
            'field'    => 'slug',
            'terms'    => $term->slug
          ),
        ),
    );
} else if ($_REQUEST['order_by'] == 'recent') {
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => 4,
        'paged'          => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => 'travel-website-themes',
            'field'    => 'slug',
            'terms'    => $term->slug
          ),
        ),
    );
} else {
    //based on popularity
    $args = array(
        'post_type'      => 'travel-website-theme',
        'posts_per_page' => 4,
        'orderby'        => 'meta_value_num',
        'meta_key'       => '_popularity',
         'paged'          => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => 'travel-website-themes',
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
$data=array('category_name' => $term->name,'category_desc' => $term->description);
templateThemeListing($query,$data);

/* Get Footer
================================================== */
get_footer(); ?>
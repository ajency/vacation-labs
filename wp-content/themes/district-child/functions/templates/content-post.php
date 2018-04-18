<?php
$category = get_queried_object();
$catm= $category->term_id;
$args = array(
    'post_type' => 'post',
    'cat' => $catm,
    'posts_per_page' => 9,
);
$arr_posts = new WP_Query( $args ); ?>

<div class="container blog-sidebar">
  <!-- Ten Column Section -->
   <div class="homescreen-cards-position">

<?php
if ( $arr_posts->have_posts() ) :

    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <div class="related-article-card">
      <div class="cards-spacer">  <!-- WP Post Class -->
      <!-- Featured Image Area -->
      <div class="related-article-image" style="background-image:url('<?php the_post_thumbnail_url('medium'); ?>') !important">
        
      </div>
            <p class="colorfade-details-blue colorfade-margin">
        <?php
        $categories = get_the_category();
        $count_cat=0;
        foreach ($categories as $catVal) {
        $category_id = $catVal->cat_ID;
        // Get the URL of this category
        $category_link = get_category_link( $category_id );
        if($count_cat>0){
        echo "<span class='colorfade-details'>•</span>";
        }
        ?>
        <span class='<?php echo get_term_meta($category_id, "wpcf-css-property", true); ?> '>
          <a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $catVal->name ?>" class='<?php echo get_term_meta($category_id, "wpcf-css-property", true); ?> '><?php echo $catVal->name ?></a>
        </span>
        <?php
        $count_cat++;
        }
        ?>
      </p>
        <p class="related-article-cards-text proxima-font"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></a></p>
      </div>
      </div>

        <?php
    endwhile;
endif;?>
    <!-- Pagination
        ================================================== -->        
        <div class="pagination">
            <?php
                global $wp_query;
        
                $big = 999999999; // need an unlikely integer
        
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'add_args' => false
                ) );
            ?>   
            <div class="clear"></div>
        </div> 
        <!-- End pagination --> 
</div>
</div>
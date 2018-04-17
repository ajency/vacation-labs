














<div class="container blog-sidebar">
	<!-- Ten Column Section -->
	 <div class="homescreen-cards-position">

		<?php 
		if (!($ag_post['slide_number'] = of_get_option('of_thumbnail_number'))) $ag_post['slide_number'] = '6'; 
		$count = 0;
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		  $count++;
		$ag_post['video'] = get_post_meta($post->ID, 'ag_post_video', true);
		$ag_post['author'] = of_get_option('of_author_style');
		
		$ag_post['thumbsize'] = (of_get_option('of_post_crop')) ? of_get_option('of_post_crop') : 'post';

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
              <?php if ($count  == 2) : ?> <!-- box five and break div -->
              <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar1' ); ?>
<?php endif; ?>
          
      
        <?php endif; ?>
		 <?php if ($count  == 3) : ?> <!-- box five and break div -->
           <?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar2' ); ?>
      <?php endif; ?>
        <?php endif; ?>
            


		<?php endwhile; else: ?>
		<h4><?php _e('Sorry, no posts matched your criteria.', 'framework'); ?></h4>
		<?php endif; ?>
        
        <!-- Pagination
        ================================================== -->        
       
        <!-- End pagination --> 

	</div><!-- END Ten Column Section -->

	
</div><!-- END Container Home -->
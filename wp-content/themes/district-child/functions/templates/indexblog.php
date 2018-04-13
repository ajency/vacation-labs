














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
            <p class="colorfade-details-blue colorfade-margin">BOOKING ENGINE <span class="colorfade-details">•</span><span class="colorfade-details-green"> PAYMENTS</span></p>
             <p class="related-article-cards-text proxima-font"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
      </div>
      </div>
              <?php if ($count  == 2) : ?> <!-- box five and break div -->
             <div class="related-article-card blue-colorfade">
      <div class="cards-spacer">
        <p class="advertisement-card-text">Looking for a Travel Booking Engine?</p>
        <div class="dash-line"></div>
        <p class="blue-colorfade-card-price">Only ₹200<span>/month</span></p>
        <div class="blue-colorfade-image"></div><button class="btn btn-default blue-colorfade-getstarted-button" type="button">GET STARTED</button>
      </div>
    </div>
      
        <?php endif; ?>
		 <?php if ($count  == 3) : ?> <!-- box five and break div -->
           <div class="related-article-card twitter-card">
      <div class="cards-spacer">
        <p class="twitter-main-text">Like what you see?</p>
        <p class="twitter-sub-text">follow us on <span>Twitter</span> and get regular updates</p><button class="btn btn-default btn-block follow-btn" type="button"><span><i aria-hidden="true" class="fa fa-twitter"></i> FOLLOW</span></button>
        <p class="copyright-text">@vacationlabs</p>
      </div>
    </div>
      
        <?php endif; ?>
            


		<?php endwhile; else: ?>
		<h4><?php _e('Sorry, no posts matched your criteria.', 'framework'); ?></h4>
		<?php endif; ?>
        
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

	</div><!-- END Ten Column Section -->

	
</div><!-- END Container Home -->
 
 <div class="carousel slide" data-ride="carousel" id="myCarousel">
  <div class="carousel-inner" role="listbox">
    <?php $slider = new WP_Query( array( 'meta_key' => '_is_ns_featured_post', 'meta_value' => 'yes' ) );?>
     <?php
// Previous code here...
$i = 1;
while ( $slider->have_posts() ) :
    $slider->the_post();
         ?>

  <div class="item <?php if ($i == 1) echo 'active'; ?>">
        <div class="container homescreen-banner">
          <div class="col-md-6 homescreen-banner-background-image" style="background-image:url('<?php the_post_thumbnail_url('large'); ?>') !important"></div>
          <div class="col-md-6 homescreen-banner-text">
            <p class="homescreen-blog-details"><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?>

</p>
            <p class="homescreen-blog-heading"><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></a></p>
            <p class="homescreen-blog-description"> <?php the_excerpt(); ?></p>
          </div>
        </div>
        <div class="carousel-caption"></div>
      </div>

    <?php $i++; endwhile;
wp_reset_postdata();
?>
  </div>
    <div class="courousel-control">
      <!-- Left and right controls -->
       <a class="left-control" data-slide="prev" href="#myCarousel"><span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span></a> <a class="right-control pull-right" data-slide="next" href="#myCarousel"><span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span></a>
    </div>
  </div>
  <!-- end of the loop -->






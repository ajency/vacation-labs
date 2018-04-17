<?php get_header(); 

$pageID = get_option('page_for_posts');

/* Get Page Options Defined in functions.php
================================================== */
$ag_page = ag_get_page_variables($pageID); ?>

<!-- Blog Featured Post -->
  <?php 
  if($wp_query->query['pagename']=='blog' || is_blog ()){  // Load Blog page?>
   <?php echo get_template_part('templates/blog_featured_post_slider'); ?>
  <?php echo get_template_part('functions/templates/indexblog'); ?>

</div>
 <div class="border-listing"></div>
  <div class="text-center border-design">
    •
  </div>
   <div class="container">
    <div class="text-center">
      <div class="pagination">
        <div class="btn-group-lg" role="group">
          <a href="#"> <button class="btn btn-default" type="button">View all</button> </a>
        </div>
      </div>
    </div>
  </div>
  <?php }else{?>

<?php if (wp_title("",false)) : // If there's a page title ?>
  


<!-- End Blog Featured Post -->

<!-- Page Title -->
<div class="pagetitle" <?php echo ($ag_page['background_style']) ? $ag_page['background_style'] : '';?>>
    <div class="container verticalcenter">
        <div class="container_row">
        	<div class="verticalcenter cell">
                <div class="ten columns title">
                    <h1 <?php echo ($ag_page['page_title_color']) ? 'style="color: ' . $ag_page['page_title_color'] . ';"' : '' ?>><?php wp_title("",true); ?></h1>
                    <?php if ($ag_page['page_desc']) { ?> 
                        <h2 <?php echo ($ag_page['page_desc_color']) ? 'class="colored" style="color: ' . $ag_page['page_desc_color'] . ';"' : '' ?>><?php echo strip_tags ( apply_filters('the_content', $ag_page['page_desc'])); ?></h2>
                    <?php } ?>	
                </div>
            </div>
            <div class="verticalcenter cell">
            	<div class="six columns">
				   <?php echo $ag_page['button']; ?>
           		</div>
            </div>
            <div class="clear"></div>
        </div>
      </div>
</div>
<!-- END Page Title -->


<?php endif; ?>

<div class="clear"></div>

<!-- Page Content Area -->
<div class="pagecontent no-caption" <?php echo ($ag_page['page_content_color']) ? 'style="background:' . $ag_page['page_content_color'] . ';"' : '' ?>>
	<?php echo get_template_part('functions/templates/indexsidebar'); ?>    
</div>
<?php } ?>
<!-- END Page Content Area -->
<?php
/* Show Any Sections
================================================== */
echo get_template_part('functions/templates/sections'); ?>

<?php 
/* Get Footer
================================================== */
get_footer(); ?>
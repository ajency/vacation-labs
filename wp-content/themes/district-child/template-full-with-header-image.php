<?php 
/*
Template Name: Full Width Page with Big Header Image
*/
get_header(); 

$pageID = get_the_ID();

/* Get Page Options Defined in functions.php
================================================== */
$ag_page = ag_get_page_variables($pageID);
$heading_bg_color = get_post_meta($pageID, 'ag_page_heading_background_color', true);
$h1_styles = vl_util_css($ag_page['page_title_color'], 'color') . vl_util_css($heading_bg_color, 'background-color');
$h1_styles = $h1_styles ? "style='$h1_styles'" : '';

$h2_styles = vl_util_css($ag_page['page_desc_color'], 'color') . vl_util_css($heading_bg_color, 'background-color');
$h2_styles = $h1_styles ? "style='$h2_styles'" : '';
?>

<!-- Page Title -->
<div class="pagetitle big-header-image" <?php echo ($ag_page['background_style']) ? $ag_page['background_style'] : '';?>>
    <div class="container">
        <div class="container_row">
          <div class="sixteen columns title">
             <h1 <?php echo $h1_styles ?>><?php the_title(); ?></h1>
              <?php if ($ag_page['page_desc']) { ?> 
                  <h2 <?php echo $h2_styles ?>><?php echo strip_tags ( apply_filters('the_content', $ag_page['page_desc'])); ?></h2>
              <?php } ?> 
          </div>
          <div class="sixteen columns">
            <?php echo $ag_page['button']; ?>
          </div>
          <div class="clear"></div>
        </div>
      </div>
</div>
<!-- END Page Title -->

<div class="clear"></div>

<?php 
/* Loop Through The Content
================================================== */
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php if (get_the_content($pageID)) : ?>

    <!-- Page Content -->
    <div class="pagecontent" <?php echo ($ag_page['page_content_color']) ? 'style="background:' . $ag_page['page_content_color'] . ';"' : '' ?>>
        <div class="container">
            <div class="sixteen columns">
                <?php the_content(); ?>
            </div>      
        </div>
    </div>
    <!-- END Page Content -->

<?php endif; endwhile; endif; ?>


<div class="clear"></div>


<?php
/* Get Any Sections
================================================== */
echo get_template_part('functions/templates/sections'); ?>


<?php 
/* Get Footer
================================================== */
get_footer(); ?>
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
/* Get Any Sections
================================================== */
echo get_template_part('functions/templates/sections'); ?>

<div class="pagecontent">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-4 visible-sm visible-lg visible-md" style="padding-left: 6%;">
			    <!-- <span class="gw-menu-text" style="text-decoration: underline;">Navigation Menu</span>

			             -->

			    <div class="sidenav-trvl-thms">
			        <ul>
			            <li class="top-head">THEME CATEGORIES
			            </li>
                  <?php echo hierarchical_category_tree( 0 ); ?>
			          <!--  <li>
			                <span class="head-ul">Accomodation</span>
			                <ul>
			                    <li class="child active">
			                        <a href="javascript:void(0)">Single Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Multiple Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Bed and Breakfast</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Single Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Multiple Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Bed and Breakfast</a>
			                    </li>
			                </ul>
			            </li>

			            <li>
			                <span class="head-ul">Tour &amp; Activities</span>
			                <ul>
			                    <li class="child">
			                        <a href="javascript:void(0)">Single Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Multiple Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Bed and Breakfast</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Single Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Multiple Hotels</a>
			                    </li>

			                    <li class="child">
			                        <a href="javascript:void(0)">Bed and Breakfast</a>
			                    </li>
			                </ul>
			            </li>  -->
			        </ul>
			    </div>
			</div>

			<div class="col-md-9 col-xs-12 col-sm-8 main-cntent" style="padding-right: 6%;">
			    <div class="row" style="margin-top:30px;">
			        <div class="col-sm-12 col-xs-12 visible-xs">
			            <!-- <span class="">
	                        <h2 style="padding-top: 0;padding-bottom: 10px;">
	                            <a href="#" class="breadcrumb-norml">All Templates</a>
	                                 >
	                            <a href="#" class="breadcrumb-mdl"> Accomodation</a>
	                                 >
	                            <span class="breadcrumb-curr">  Breakfast</span>
	                        </h2>
	                    </span> -->

			            <ol class="breadcrumb">
			                <li class="breadcrumb-item">
			                    <a href="#">All Templates</a>
			                </li>

			                <li class="breadcrumb-item">
			                    <a href="#">Accomodation</a>
			                </li>

			                <li class="breadcrumb-item active">Bed &amp; Breakfast
			                </li>
			            </ol>
			        </div>
          
              <?php
          if (!empty($website_themes_data)) { 
          
            foreach ($website_themes_data as $website_themes_val) {
              $post_id= $website_themes_val->ID;
              $theme_name= $website_themes_val->post_title;
              $theme_by=get_post_meta($post_id,'theme_by',true);
              $theme_url=get_post_meta($post_id,'theme_url',true);
              $popularity=get_post_meta($post_id,'popularity',true);
              $description=$website_themes_val->post_excerpt;
              $featured_img= wp_get_attachment_url(get_post_thumbnail_id($post_id, '_thumbnail'));

              $post_categories=get_the_category($post_id);
            ?>
			        <div class="col-md-6 col-xs-12 col-sm-12 theme-card">
			            <div class="imgwrapper">
			                <div class="full-hover-border-effect">
			                    <div class="img-a">
			                        <a><!-- <img class="prem-img" src="./img/premium_badge.png" width="100"> -->
			                         <img class="img-responsive image actl-img" src="<?php echo $featured_img;?>"></a>
			                        <div class="overlay">
			                            <div class="text">
			                                <a class="button" href="./preview.html" rel="nofollow" target="_self"><span class="ag-button-inner">Preview</span></a><br>
			                                <a class="button transparent" href="#" rel="nofollow" target="_self"><span class="ag-button-inner">Select</span></a>
			                            </div>
			                        </div>
			                    </div>

			                    <h2 class="theme_name">
			                        <?php echo $theme_name; ?>
			                    </h2>

			                    <h3 class="author">
			                        By <?php echo $theme_by; ?>:
			                    </h3>

			                    <p>
			                       <?php echo $description; ?>
			                    </p>

			                    <p>
                            <?php
                            if (!empty($website_themes_data)) {
                              foreach ($post_categories as $cvalue) {
                                if($cvalue->parent!=0){                           

                            ?>
		                              <span class="badge first"><?php echo $cvalue->name; ?></span>
                              <?php
                                }  
                              }
                            }
                            ?>
			                    </p>

			                    <div class="full-overlay">
			                    </div>
			                </div>
			            </div>
			        </div>
              <?php
            }
          }
        ?>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php
/* Get Footer
================================================== */
get_footer(); ?>
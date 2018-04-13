<?php
/**
 * District Theme Header
 * @package WordPress
 * @subpackage 2winFactor
 * @since 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <title>
  <?php 
  /* Print the <title> tag based on what is being viewed
  ================================================== */ 
  	global $page, $paged;

  	wp_title( '|', true, 'right' );

  	// Add the blog name.
  	bloginfo( 'name' );

  	// Add the blog description for the home/front page.
  	$site_description = get_bloginfo( 'description', 'display' );
  	if ( $site_description && ( is_home() || is_front_page() ) )
  		echo " | $site_description";

  	// Add a page number if necessary:
  	if ( $paged >= 2 || $page >= 2 )
  		echo ' | ' . sprintf( __( 'Page %s', 'framework' ), max( $paged, $page ) );

  	?>
  </title>
  <?php 
  if($wp_query->query['pagename']=='blog' || is_blog ()){  // Load Blog page?>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo get_stylesheet_directory_uri();?>/styles/blog_home.css" rel="stylesheet">
  </head>
<!-- Menu Navigation -->
    <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> 
    
                <a  class="navbar-brand vl-logo" href="<?php bloginfo('url'); ?>">
                    <?php if ( $logo = of_get_option('of_logo') ) { ?>
                    <img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
                    <?php } else { bloginfo( 'name' );} ?>
                    </a> 
           
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <?php if ( has_nav_menu( 'main_nav_menu' ) ) { /* if menu location 'Main Navigation Menu' exists then use custom menu */ ?>
                   <?php wp_nav_menu( array('menu' => 'Main Navigation Menu', 'theme_location' => 'main_nav_menu', 'menu_class' => 'nav navbar-nav navbar-right')); ?>
                <?php } else { /* else use wp_list_pages */?>
                <ul class="nav navbar-nav navbar-right">
                    <?php wp_list_pages( array('title_li' => '','sort_column' => 'menu_order')); ?>
                </ul>
                <?php } ?> 
      </div>
    </div>
  </nav>
<!-- End Menu Navigation -->



<?php } else { ?>

<?php ag_load_fonts(); // Load Google Fonts defined in functions.php ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> <?php echo ( $lightbox_skin = of_get_option('of_prettyphoto_skin') ) ? 'data-lightbox="' . $lightbox_skin . '"' : '';?>>

<noscript>
  <div class="alert">
    <p><?php _e('Please enable javascript to view this site.', 'framework'); ?></p>
  </div>
</noscript>

<!-- Preload Images 
	================================================== -->
<div id="preloaded-images"> 
  <?php $templatedirectory = get_template_directory_uri(); ?>
  <img src="<?php echo $templatedirectory;?>/images/arrows-555555.png" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/bullet.png" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/navarrows.png" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/small-loading.gif" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/sprites-nivo.png" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/sprites-nivo-white.png" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/downarrow.png" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/rightarrow.png" width="1" height="1" alt="Image" /> 
  <img src="<?php echo $templatedirectory;?>/images/large_right.png" width="1" height="1" alt="Image" /> 
</div>

<!-- Begin Site
  ================================================== -->
<div class="sitecontainer">
<div class="container top-nav verticalcenter">
	<div class="container_row">
        <div class="cell verticalcenter">
        
        	<!-- Logo -->
            <div class="five columns" id="logo">
            <?php echo is_front_page() ? '<h1>' : '<h2>'; ?>
                <a href="<?php bloginfo('url'); ?>">
                    <?php if ( $logo = of_get_option('of_logo') ) { ?>
                    <img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
                    <?php } else { bloginfo( 'name' );} ?>
                    </a> 
             <?php echo is_front_page() ? '</h1>' : '</h2>'; ?> 
            </div>
            <!-- END Logo -->
            
        </div>
        <div class="cell verticalcenter">
        
        	<!-- Menu -->
            <div class="eleven columns" id="menu">
               <?php if ( has_nav_menu( 'main_nav_menu' ) ) { /* if menu location 'Main Navigation Menu' exists then use custom menu */ ?>
                   <?php wp_nav_menu( array('menu' => 'Main Navigation Menu', 'theme_location' => 'main_nav_menu', 'menu_class' => 'sf-menu')); ?>
                <?php } else { /* else use wp_list_pages */?>
                <ul class="sf-menu">
                    <?php wp_list_pages( array('title_li' => '','sort_column' => 'menu_order')); ?>
                </ul>
                <?php } ?> 
            </div>
            <!-- END Menu -->
            
        </div>
    </div>
    <div class="clear"></div>
    
    <!-- Mobile Navigation -->
    <div class="mobilenavcontainer"> 
        <?php $menutext = of_get_option('of_menu_text');
         if ($menutext == ''){ $menutext = __('Select a Page', 'framework'); } ?>
       <a id="jump" href="#mobilenav" class="scroll"><?php echo  $menutext; ?></a>
       <div class="clear"></div>
           <div class="mobilenavigation">
            <?php if ( has_nav_menu( 'main_nav_menu' ) ) { /* if menu location 'Top Navigation Menu' exists then use custom menu */ ?>
                    <?php wp_nav_menu( array('menu' => 'Main Navigation Menu', 'theme_location' => 'main_nav_menu', 'items_wrap' => '<ul id="mobilenav"><li id="back"><a href="#top" class="menutop">'. __('Hide Navigation', 'framework') . '</a></li>%3$s</ul>')); ?>
                <?php } else { /* else use wp_list_pages */?>
                    <ul class="sf-menu sf-vertical">
                        <?php wp_list_pages( array('title_li' => '','sort_column' => 'menu_order', )); ?>
                    </ul>
                <?php } ?>
            </div> 
        <div class="clear"></div>
      </div>
      <!-- END Mobile Navigation -->

<?php } //End of Condition ?>



</div>


<?php

function templateThemeListing($query){
    $website_themes_data = $query->posts;

    $sort_label=array('recent' => 'Recent','popular'=>'Popularity','title'=>'Name')

?>
    <div class="pagecontent bootstrap-content">
        <div class="container-fluid">
            <div class="row visible-md visible-sm visible-lg" style="background-color: #fafafa;padding-top: 15px; box-shadow: 1px 1px 5px 0 rgba(171, 166, 166, 0.5);">
                <div class="col-md-6 col-sm-6">
                <ol class="breadcrumb">
                  <?php
                     vacationLabBreadcrumbs();
                  ?>
                </ol>

                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="popover-holder" style="padding-bottom: 10px; font-style: normal;margin: 0;float: right; padding-right: 10%; font-size: 15px;">
                        <span tabindex="0" class="popover-toggle">
                            <span style="color:#757171;">Sort By : </span>
                            <span style="color:#0584ab;"><?php echo isset($_REQUEST['order_by'])?$sort_label[$_REQUEST['order_by']]:"Popularity"?></span>
                            <i class="arrow down"></i>
                        </span>
                        <div class="arrow"></div>
                        <ul id="" class="hide popover-content">
                            <li><a href="?order_by=popular" class="sortby-dropdwn" title="Popularity">Popularity</a></li>
                            <li><a href="?order_by=recent" class="sortby-dropdwn" title="Recent">Recent</a></li>
                            <li><a href="?order_by=title" class="sortby-dropdwn" title="Name">Name</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row visible-xs mobile-top-bar" style="background-color: #f0f0f0; ">
                <div class="col-sm-6 col-xs-6 toggle-filter" style="border-right: 1px solid #777;padding:  15px 0 !important;">

                    <a href="./filter.html" style="text-decoration: none !important;">
                        <div class="filter-icon"></div>
                        <span style="font-size: 14px; color:rgb(119,119,119); font-weight: 500;">Filter</span>
                        <!-- <span class="badge">5</span> -->
                    </a>

                </div>

                <div class="col-sm-6 col-xs-6 popover-holder" style="padding:  15px 0!important;cursor: pointer;" >
                    <div tabindex="0" class="popover-toggle">
                        <div class="sort-icon"></div>
                        <span style="font-size: 14px;font-weight: 500;margin-right: ">Sort</span>
                    </div>
                    <div class="arrow"></div>
                    <ul id="" class="hide popover-content">
                        <li><a href="#" class="sortby-dropdwn">Most Popular</a></li>
                        <li><a href="#" class="sortby-dropdwn">Most Recent</a></li>
                        <li><a href="#" class="sortby-dropdwn">Name <span>(Alphabetical)</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-4 visible-sm visible-lg visible-md" style="padding-left: 6%;">


                <div class="sidenav-trvl-thms">
                    <ul>
                        <li class="top-head">THEME CATEGORIES
                        </li>
                        <?php echo hierarchical_category_tree( 0 ); ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-xs-12 col-sm-8 main-cntent" style="padding-right: 6%;">
                <div class="row" style="margin-top:30px;">
                    <div class="col-sm-12 col-xs-12 visible-xs">

                        <ol class="breadcrumb">
                             <?php
                     vacationLabBreadcrumbs();
                  ?>
                            <!-- <li class="breadcrumb-item">
                                <a href="#">All Templates</a>
                            </li>

                            <li class="breadcrumb-item">
                                <a href="#">Accomodation</a>
                            </li>

                            <li class="breadcrumb-item active">Bed &amp; Breakfast
                            </li> -->
                        </ol>
                    </div>

                    <?php
                if (!empty($website_themes_data)) {

                  foreach ($website_themes_data as $website_themes_val) {
                    $post_id= $website_themes_val->ID;
                    $theme_name= $website_themes_val->post_title;
                    $theme_by=get_post_meta($post_id,'_theme_by',true);
                    $theme_url=get_post_meta($post_id,'_theme_url',true);
                    $popularity=get_post_meta($post_id,'_popularity',true);
                    $premium=get_post_meta($post_id,'_premium',true);
                    $description=$website_themes_val->post_excerpt;
                    // $featured_img= wp_get_attachment_url(get_post_thumbnail_id($post_id, '_thumbnail'));
                    $featured_img= wp_get_attachment_image_src(get_post_thumbnail_id($post_id, '_thumbnail'),'large')[0];

                    $post_categories=get_the_terms($post_id,'travel-website-themes');
                    $post_link= get_post_permalink( $post_id, false, false );
                  ?>
                    <div class="col-md-6 col-xs-12 col-sm-12 theme-card">
                        <div class="imgwrapper">
                            <div class="full-hover-border-effect">
                                <div class="img-a">
                                    <?php if($premium==1){
                                        ?>
                                    <div class="ribbon">
                                        <span>PREMIUM</span>
                                    </div>
                                    <?php } ?>
                                    <!-- <img class="prem-img" src="./img/premium_badge.png" width="100"> -->
                                     <img class="img-responsive image actl-img" src="<?php echo $featured_img;?>" alt="<? echo $theme_name; ?>">
                                    <div class="overlay">
                                        <div class="text">
                                            <a class="button" href="<?php echo  $post_link; ?>" rel="nofollow" target="_self"><span class="ag-button-inner">Preview</span></a><br>
                                            <a class="button transparent" href="#" rel="nofollow" target="_self"><span class="ag-button-inner">Select</span></a>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="theme_name">
                                    <a href="<?php echo  $post_link; ?>"><?php echo $theme_name; ?></a>
                                </h2>

                                <h3 class="author">
                                    By <?php echo $theme_by; ?>:
                                </h3>

                                <p>
                                   <?php echo $description; ?>
                                </p>

                                <p>
                                  <?php
                                  if (!empty($post_categories)) {
                                    foreach ($post_categories as $cvalue) {
                                      if($cvalue->parent!=0){

                                  ?>
                                        <span class="badge first"><a href="<?php echo get_category_link( $cvalue->term_id ) ?>" ><?php echo $cvalue->name; ?></a></span>
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
                <?php

                 if($query->have_posts()) :

                    $total_pages = $query->max_num_pages;

                    if ($total_pages > 1){

                        $current_page = max(1, get_query_var('paged'));

                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text'    => __('« prev'),
                            'next_text'    => __('next »'),
                        ));
                    }
                  endif;

                ?>
            </div>
          </div>
        </div>

    </div>

    <div class="bootstrap-content filters-slide">
        <div class="">
            <div class="filter-head">
                <div class="container-fluid mob-filter-headr">
                    <div style="padding: 0.8em 0;">
                        <div class="row filter-text">
                            <div class="col-sm-4 col-xs-4" style="text-align: left;"></div>
                            <div class="col-sm-4 col-xs-4" style="text-align: center; font-weight: bold;">Filters</div>
                            <div class="col-sm-4 col-xs-4" style="text-align: right;"><a href="#">Close</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-body">
                <div class="sidenav-trvl-thms">
                    <ul>
                        <li class="top-head">THEME CATEGORIES
                        </li>
                        <?php echo hierarchical_category_tree( 0 ); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery('body').on('click', '.filter-head a', function(e){
            e.preventDefault();
            jQuery('.filters-slide').removeClass('shown');
        });
        jQuery('body').on('click', '.toggle-filter', function(e){
            e.preventDefault();
            jQuery('.filters-slide').addClass('shown');
        });

        jQuery('body').on('click', '.popover-toggle', function() {
            jQuery(this).parent().toggleClass('active');
        });
        //Hide the dropdown when clicked off
        jQuery(document).on('click touchstart', function(event) {
          if (!jQuery(event.target).closest('.popover-holder').length) {
            // Hide the menus.
            jQuery('.popover-holder.active').removeClass('active');
          }
        });
    </script>
<?php
}
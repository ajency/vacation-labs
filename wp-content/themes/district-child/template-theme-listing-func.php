<?php

function templateThemeListing($query){
  $website_themes_data = $query->posts;
?>
    <div class="pagecontent bootstrap-content">
        <div class="container-fluid">
            <div class="row visible-md visible-sm visible-lg" style="background-color: #fafafa;padding-top: 15px; box-shadow: 1px 1px 5px 0 rgba(171, 166, 166, 0.5);">
                <div class="col-md-6 col-sm-6">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">All Templates</a></li>
                  <li class="breadcrumb-item"><a href="#">Accomodation</a></li>
                  <li class="breadcrumb-item active">Bed &amp; Breakfast</li>
                </ol>

                </div>
                <div class="col-md-6 col-sm-6">
                    <p style="padding-bottom: 10px; font-style: normal;margin: 0;float: right; padding-right: 10%; font-size: 15px;">
                        <span tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-style="mypops" id="Pops" style="" data-original-title="" title="">
                            <span style="color:#757171;">Sort By : </span>
                            <span style="color:#0584ab;">Most Popular</span>
                            <i class="arrow down"></i>
                        </span>
                    </p>
                    <div id="popover-content" class="hide" style="display: none">
                      <div>
                        <a href="#" class="sortby-dropdwn">Most Popular</a><br>
                        <a href="#" class="sortby-dropdwn">Most Recent</a><br>
                        <a href="#" class="sortby-dropdwn">Name <span>(Alphabetical)<span></span></span></a>
                      </div>
                    </div>
                </div>

            </div>
            <div class="row visible-xs mobile-top-bar" style="background-color: #f0f0f0; ">
                <div class="col-sm-6 col-xs-6 toggle-filter" style="border-right: 1px solid #777;padding:  15px 0 !important;">

                    <a href="./filter.html" style="text-decoration: none !important;">
                        <div class="filter-icon"></div>
                        <span style="font-size: 14px; color:rgb(119,119,119); font-weight: 500;">Filter</span>
                        <span class="badge">5</span>
                    </a>

                </div>

                <div class="col-sm-6 col-xs-6" style="padding:  15px 0!important;cursor: pointer;" id="Pops-mob" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-style="mypops" data-original-title="" title="">
                    <div class="sort-icon"></div>
                    <span style="font-size: 14px;font-weight: 500;margin-right: ">Sort</span>

                </div>
                <div id="popover-content" class="hide" style="display: none;">
                  <div>
                    <a href="#" class="sortby-dropdwn">Most Popular</a><br>
                    <a href="#" class="sortby-dropdwn">Most Recent</a><br>
                    <a href="#" class="sortby-dropdwn">Name <span>(Alphabetical)<span></span></span></a>
                  </div>
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
                                    <!-- <img class="prem-img" src="./img/premium_badge.png" width="100"> -->
                                     <img class="img-responsive image actl-img" src="<?php echo $featured_img;?>">
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
<?php
}
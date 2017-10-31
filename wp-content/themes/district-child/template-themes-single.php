<?php

/*
Template Name: Themes Single
 */

get_header();

$post_id=$_REQUEST['id'];

$theme_url=get_post_meta($post_id,'_theme_url',true);
?>

<div class="bootstrap-content preview-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 text-right go-back">
                <a href="/travel-website-theme">
                    <img alt="Go Back" src="http://akdesign.in/dev/vacationlabs/img/back_arrow.png">
                </a>
            </div>

            <div class="col-sm-12 col-md-3 logo" style="filter: brightness(0) invert(1);">
                <a href="#">
                    <img alt="Vacation Labs" src="http://www.vacationlabs.com/wp-content/uploads/2013/01/logo-250x291.png">
                </a>
            </div>

            <div class="col-md-4 text-center preview-title ">
                <h1 class=""><?php echo get_the_title($post_id); ?></h1>
            </div>

            <div class="col-md-4">
                <div class="row" style="margin-bottom: 0;">
                    <div class="col-md-7 visible-md-block visible-lg-block">
                        <div class="btn-group view-switcher" data-toggle="buttons">
                            <label class="btn btn-default desktop-btn active" id="Desktop">
                                <input type="radio" name="preview" id="Desktop" checked="" value="desktop">
                                <i class="fa fa-desktop" title="Desktop preview"></i>
                            </label>
                            <label class="btn btn-default tablet-btn" id="Tablet">
                                <input type="radio" name="preview" id="Tablet" value="tablet">
                                <i class="fa fa-tablet" title="Tablet preview"></i>
                            </label>
                            <label class="btn btn-default mobile-btn" id="Mobile">
                                <input type="radio" name="preview" id="Mobile"" value="mobile">
                                <i class="fa fa-mobile" title="Mobile preview"></i>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <a class="button center-block" href="#" rel="nofollow" style="width: 115px; display: block; margin:0.8em auto; background:white; color:#006ca9; padding:0 12px;line-height: 40px;font-size:18px;letter-spacing:0.6px" target="_self">
                            <span class="ag-button-inner">Select →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="preview-holder">
    <iframe src="<?php echo $theme_url;?>" frameborder="0" style="overflow: hidden;" width="100%;" height="100%" id="viewer" class="desktop"></iframe>
</div>

<style type="text/css">
    .page-template-template-themes-single .top-nav{
        display: none;
    }
</style>

<script type="text/javascript">
    jQuery('body').on('change', '[name="preview"]', function() {
        if (jQuery(this).is(':checked')){
            jQuery(this).parent().addClass('active')
            jQuery(this).parent().siblings().removeClass('active')
        }
        if (jQuery('input[name="preview"]:checked').val() == 'mobile'){
            jQuery('#viewer').addClass('mobile');
            jQuery('#viewer').removeClass('desktop tablet');
        } else if (jQuery('input[name="preview"]:checked').val() == 'tablet'){
            jQuery('#viewer').addClass('tablet');
            jQuery('#viewer').removeClass('desktop mobile');
        } else {
            jQuery('#viewer').addClass('desktop');
            jQuery('#viewer').removeClass('tablet mobile');
        }
    });
</script>

<?php

/* Get Footer
================================================== */

get_footer(); ?>



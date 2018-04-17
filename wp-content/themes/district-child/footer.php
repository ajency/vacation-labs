</div> <!-- End Site Container -->

<!-- Close Mainbody and Sitecontainer and start footer
  ================================================== -->
<div class="clear"></div>

 <?php 
  if($wp_query->query['pagename']=='blog' || is_blog ()){  // Load Blog page?>
 <div class="container-fluid">
    <div class="row footer">
      <div class="container">
        <div class="col-md-3 col-sm-6 col-xs-12">
         <?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Left') ) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
         <?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Left Center') ) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
         <?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Right Center') ) ?>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Right') ) ?>
        </div>
      </div>
    </div>
  </div>
<?php } else { ?>
<div id="footer">
    <div class="container clearfix">
            <div class="four columns"><?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Left') ) ?></div>
            <div class="four columns"><?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Left Center') ) ?></div>
            <div class="four columns"><?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Right Center') ) ?></div>
            <div class="four columns"><?php /* Widget Area */ if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Right') ) ?></div>
            <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<?php } //End of Condition ?>
<!-- Theme Hook -->

<?php 
  if($wp_query->query['pagename']=='blog' || is_blog ()){  // Load Blog page?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php }else{?>

  <?php wp_footer(); ?>
  <?php } ?>

</body>
</html>
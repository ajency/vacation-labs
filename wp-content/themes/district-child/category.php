<? get_header(); 
?>
<div class="pagetitle" <?php echo ($ag_page['background_style']) ? $ag_page['background_style'] : '';?>>
    <div class="container verticalcenter">
        <div class="container_row">
            <div class="verticalcenter cell">
                <div class="ten columns title">
                    <h1 <?php echo ($ag_page['page_title_color']) ? 'style="color: ' . $ag_page['page_title_color'] . ';"' : '' ?>><?php wp_title("",true); ?></h1>
                <?php if (category_description()) { ?> 
                    <h2 <?php echo ($ag_page['page_desc_color']) ? 'class="colored" style="color: ' . $ag_page['page_desc_color'] . ';"' : '' ?>><?php echo strip_tags (category_description()); ?> </h2>
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
 <?php echo get_template_part('functions/templates/content-post'); ?>

<?php get_footer(); ?>
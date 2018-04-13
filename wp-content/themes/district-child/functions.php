<?php
function vl_util_css($val, $property) {
  return ($val ? ($property . ': ' . $val . ';') : '');
}

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
    wp_enqueue_style( 'theme-page', get_stylesheet_directory_uri() . '/styles/themes-page.css',false,'1.1','all');
}

function district_child_footer_social_linkoffs() {
  // echo do_shortcode(file_get_contents('templates/footer_social_linkoffs.php', true));
}

function add_border_bottom_meta_to_section() {
  global $metaboxes;
  global $prefix;
  // $fields = $metaboxes['section_layout_box']['fields'];
  // array_splice($fields, count($fields)-2, 0,
  $metaboxes['section_layout_box']['fields'][$prefix . 'bottom_border'] = array(
    'title' => __('Section Bottom Border', 'framework'),
    'type' => 'radio',
    'description' => 'Do you want a thin gray border at the bottom of this section?',
    'std' => 'No',
    'options' => array('No','Yes'),
  );
}

function add_custom_css_classes_meta_to_section() {
  global $metaboxes;
  global $prefix;
  // $fields = $metaboxes['section_layout_box']['fields'];
  // array_splice($fields, count($fields)-2, 0,
  $metaboxes['section_layout_box']['fields'][$prefix . 'custom_css_classes'] = array(
    'title' => __('Custom CSS Class(es)', 'framework'),
    'type' => 'text',
    'description' => 'Do you want any custom CSS classes for this section?',
    'std' => '',
    'size' => 20
  );
}

function add_heading_background_color_to_page() {
  global $metaboxes;
  global $prefix;

  $metaboxes['page_title_box']['fields'][$prefix . 'page_heading_background_color'] = array(
    'title' => __('Heading background color', 'framework'),
    'type' => 'color',
    'description' => 'Optional. This is the heading\'s background color, NOT the entire header unit\'s background color.',
    'std' => '',
    'size' => 20
  );
}


function vl_box($atts, $content = null) {
  extract(shortcode_atts(array(
    'bgcolor' => '#fff',
    'class' => ''
  ), $atts));
  return "<div class='$class' style='background-color: $bgcolor;'>" . do_shortcode($content) . "</div>";
}

function vl_job_box($atts, $content = null) {
  return "<div class='job-box'>" . do_shortcode($content) . "</div>";
}

function vl_job_blurb($atts, $content = null) {
  return "<div class='job-blurb'>" . do_shortcode($content) . "</div>";
}

function vl_in_focus($atts, $content=null) {
  return '<div class="vl-in-focus">' . do_shortcode($content) . '</div>';
}


add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_footer', 'district_child_footer_social_linkoffs');

// 0 is the priority, because add_post_format_metabox at
// district/functions/customfields.php L#593 is run with the default priority
// of 10. This needs to run before that, as it modifies the global $metaboxes
// array
add_action('admin_init', 'add_border_bottom_meta_to_section', 0);
add_action('admin_init', 'add_custom_css_classes_meta_to_section', 0);
add_action('admin_init', 'add_heading_background_color_to_page', 0);

add_shortcode('vl_box', 'vl_box');
add_shortcode('vl_job_box', 'vl_job_box');
add_shortcode('vl_job_blurb', 'vl_job_blurb');
add_shortcode('vl_in_focus', 'vl_in_focus');



// register the custom post type
if ( ! function_exists('website_themes') ) {

// Register Custom Post Type
function website_themes() {

  $labels = array(
    'name'                  => _x( 'Travel website themes', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Travel website theme', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Travel Website Themes', 'text_domain' ),
    'name_admin_bar'        => __( 'Travel Website Themes', 'text_domain' ),
    'archives'              => __( 'Item Archives', 'text_domain' ),
    'attributes'            => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'All Items', 'text_domain' ),
    'add_new_item'          => __( 'Add New Item', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Item', 'text_domain' ),
    'edit_item'             => __( 'Edit Item', 'text_domain' ),
    'update_item'           => __( 'Update Item', 'text_domain' ),
    'view_item'             => __( 'View Item', 'text_domain' ),
    'view_items'            => __( 'View Items', 'text_domain' ),
    'search_items'          => __( 'Search Item', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'travel website theme', 'text_domain' ),
    'description'           => __( 'travel website themes', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail','custom-fields', 'post-formats', ),
    'taxonomies'            => array( 'travel-website-templates' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'rewrite' => array('with_front' => false)
  );
  register_post_type( 'travel-website-theme', $args );

}
add_action( 'init', 'website_themes', 0 );

}
add_action( 'init', 'build_taxonomies', 0 );
function build_taxonomies() {
    register_taxonomy(
    'travel-website-templates',
    'travel-website-theme',  // this is the custom post type(s) I want to use this taxonomy for
    array(
        'hierarchical' => true,
        'label' => 'Categories',
        'query_var' => true,
        'rewrite' => array('hierarchical' =>true,  'with_front' => false)
    )
);
}

/**
 * added to get categories in hierarchical order
 */
function hierarchical_category_tree( $cat ) {

  $next = get_terms('hide_empty=false&taxonomy=travel-website-templates&orderby=name&order=ASC&parent=' . $cat);
  $term = get_queried_object();

  if( $next ) :
    foreach( $next as $cat ) :
    if($cat->term_id==$term->term_id)
      echo '<ul><li class="active">';
    else
      echo '<ul><li class="">';

    echo '<a href="' . get_term_link( $cat->term_id ) . '" title='.$cat->name.'>'.$cat->name.' </a>  ';
    hierarchical_category_tree( $cat->term_id );
    endforeach;
  endif;

  echo '</li></ul>'; echo "\n";
}

/**
 * added to get pagination on category pages
 */
add_action( 'pre_get_posts', 'vacationlab_pre_get_posts' );
function vacationlab_pre_get_posts( $query )
{

    if ( ! $query->is_main_query() || $query->is_admin() )
      return false;
      // echo "<pre>";
      // print_r($query);

   if ( $query->is_tax() || $query->is_category()) {
        $query->set( 'post_type', 'travel-website-theme' );
        $query->set( 'posts_per_page', 1 );
    }
    return $query;
}

/**
 * Add meta box
 */
function theme_addition_details_add_meta_boxes( $post ){

  add_meta_box( 'theme_detail_meta_box', __( 'Theme Details', 'website_theme_example_plugin' ), 'website_theme_build_meta_box', 'travel-website-theme', 'normal', 'high' );
}

add_action( 'add_meta_boxes_travel-website-theme', 'theme_addition_details_add_meta_boxes' ,10,1);

/**
 *  meta box markup
 */
function website_theme_build_meta_box(){
  $post_id = get_the_ID();

    if (get_post_type($post_id) != 'travel-website-theme') {
        return;
    }

    $_popularity = get_post_meta($post_id, '_popularity', true);
    $_theme_by = get_post_meta($post_id, '_theme_by', true);
    $_theme_url = get_post_meta($post_id, '_theme_url', true);
    $_select_url = get_post_meta($post_id, '_select_url', true);
    $_premium = get_post_meta($post_id, '_premium', true);
    wp_nonce_field('premium_nonce_nonce_'.$post_id, 'premium_nonce');
    ?>
    <div class="misc-pub-section misc-pub-section-last">
        <label><?php _e('Popularity: '); ?><input type="number" value="<?php echo  $_popularity;?>" name="_popularity" /></label>
        <label><?php _e('Theme By: '); ?><input type="text" value="<?php echo  $_theme_by;?> " name="_theme_by" /></label>
        <label><?php _e('Theme Url: '); ?><input type="text" value="<?php echo  $_theme_url;?>" name="_theme_url" /></label>
        <label><?php _e('Select Url: '); ?><input type="text" value="<?php echo  $_select_url;?>" name="_select_url" /></label>
    </div>
    <div class="misc-pub-section misc-pub-section-last">
        <label><input type="checkbox" value="1" <?php checked($_premium, true, true); ?> name="_premium" /><?php _e('Premium'); ?></label>
    </div>
    <?php


}

/**
 * Saves a website theme build meta box.
 *
 * @param      <type>  $post_id  The post identifier
 */
function save_website_theme_build_meta_box( $post_id){
  if(isset($_REQUEST['post_type'])){
    if($_REQUEST['post_type']=='travel-website-theme'){

       $_popularity = ($_REQUEST['_popularity']!='')? $_REQUEST['_popularity'] : 0 ;
        update_post_meta( $post_id, '_popularity', $_popularity);

      if(isset($_REQUEST['_theme_by'])){
        update_post_meta( $post_id, '_theme_by',$_REQUEST['_theme_by']);
      }

      if(isset($_REQUEST['_theme_url'])){
        update_post_meta( $post_id, '_theme_url',$_REQUEST['_theme_url']);
      }
      if(isset($_REQUEST['_select_url'])){
        update_post_meta( $post_id, '_select_url',$_REQUEST['_select_url']);
      }
      if(isset($_REQUEST['_premium'])){
            update_post_meta( $post_id, '_premium',$_REQUEST['_premium']);
      }
      else{
         update_post_meta( $post_id, '_premium',0);
      }
    }
  }
}
add_action('save_post', 'save_website_theme_build_meta_box');

/**
 * Custom Taxonomy tree view fix
 */
add_filter( 'wp_terms_checklist_args', 'checked_not_ontop', 1, 2 );
function checked_not_ontop( $args, $post_id ) {
    if ( 'travel-website-theme' == get_post_type( $post_id ) && $args['taxonomy'] == 'travel-website-templates' )
        $args['checked_ontop'] = false;

    return $args;
}


//add custom taxomony field method
add_action( 'travel-website-templates_add_form_fields', 'ajency_taxonomy_add_new_meta_field', 10, 2 );
function ajency_taxonomy_add_new_meta_field() {
  ?>
  <div class="form-field">
    <label for="term_meta[vl_title]"><?php _e( 'Category Title'); ?></label>
    <input type="text" name="term_meta[vl_title]" id="term_meta[vl_title]" value="">
    <p class="description"><?php _e( 'The Title is how it appears on your site'); ?></p>
  </div>
<?php
}


// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
  if ( isset( $_POST['term_meta'] ) ) {
    $t_id = $term_id;
    $term_meta = get_option( "taxonomy_$t_id" );
    $cat_keys = array_keys( $_POST['term_meta'] );
    foreach ( $cat_keys as $key ) {
      if ( isset ( $_POST['term_meta'][$key] ) ) {
        $term_meta[$key] = $_POST['term_meta'][$key];
      }
    }
    update_option( "taxonomy_$t_id", $term_meta );
  }
}
add_action( 'edited_travel-website-templates', 'save_taxonomy_custom_meta', 10, 2 );
add_action( 'create_travel-website-templates', 'save_taxonomy_custom_meta', 10, 2 );

//edit custom taxomony field method
function ajency_taxonomy_edit_meta_field($term) {

  $t_id = $term->term_id;
  $term_meta = get_option( "taxonomy_$t_id" ); ?>
  <tr class="form-field">
  <th scope="row" valign="top"><label for="term_meta[vl_title]"><?php _e( 'Category Title' ); ?></label></th>
    <td>
      <input type="text" name="term_meta[vl_title]" id="term_meta[vl_title]" value="<?php echo esc_attr( $term_meta['vl_title'] ) ? esc_attr( $term_meta['vl_title'] ) : ''; ?>">
      <p class="description"><?php _e( 'The Title is how it appears on your site' ); ?></p>
    </td>
  </tr>
<?php
}
add_action( 'travel-website-templates_edit_form_fields', 'ajency_taxonomy_edit_meta_field', 10, 2 );

function mg_travel_template_pagination_rewrite() {
  add_rewrite_rule('travel-website-templates/page/?([0-9]{1,})/?$', 'index.php?pagename=travel-website-templates&paged=$matches[1]', 'top');
}
add_action('init', 'mg_travel_template_pagination_rewrite');

/* add_filter( 'posts_request', 'dump_request' );

function dump_request( $input ) {
    echo "sairaj";
    var_dump($input);

    return $input;
}*/
function is_blog () {


  if(is_category() || 
    (( is_archive() || is_author() || is_single() || is_tag()) && 'post' == get_post_type())
    )
    return true;
  else 
    return false;
}
include 'template-theme-listing-func.php';
include 'breadcrumbs.php';

// Register sidebar for repeated widgets
function register_custom_sidebar() {

    register_sidebar(array(
        'name' => "CTAs — Home",
        'id' => 'widgets_home',
        'description' => "Widgets will be displayed after every 3rd post",
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'register_custom_sidebar');

// Return dom node from other document as html string
function return_dom_node_as_html($element) {

    $newdoc = new DOMDocument();
    $newdoc->appendChild($newdoc->importNode($element, TRUE));

    return $newdoc->saveHTML();
}
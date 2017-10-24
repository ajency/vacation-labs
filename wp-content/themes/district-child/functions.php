<?
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
?>
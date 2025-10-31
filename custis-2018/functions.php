<?php

require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Resources

// enqueue the child theme stylesheet
function wp_schools_enqueue_scripts() {
//wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' )  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);

// Queue parent style followed by child/customized style
add_action( 'wp_enqueue_scripts', 'custis_enqueue_styles', PHP_INT_MAX);

function custis_enqueue_styles() {
    wp_enqueue_style( 'postali-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/css/generated/styles.css', null, null, 'all', array( 'postali-style' ) );
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/css/stylesheets/slick.css', null, null, 'all' );
    wp_register_script('slick_scripts', get_stylesheet_directory_uri() . '/js/slick.min.js',array('jquery'), null, true); 
    wp_enqueue_script('slick_scripts');
    wp_register_script('slick_scripts2', get_stylesheet_directory_uri() . '/js/slick-custom.js',array('jquery'), null, true); 
    wp_enqueue_script('slick_scripts2'); 
    // Enqueue Google Fonts
    // wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:600,700,900|Muli:400,400i,700,900,900i', null, null, 'all');
    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@0,100..900;1,100..900&display=swap', array() );
    wp_enqueue_style('google-fonts');

    // Enqueue javascript
    wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr.min.js', array( 'jquery' ), null, true );
    // Enqueue these files only on the front-page
    if( is_front_page() )
    {
    wp_register_script('homepage-scripts', get_stylesheet_directory_uri() . '/js/homepage-scripts.js',array('jquery'), null, true); 
    wp_enqueue_script('homepage-scripts'); 
    }
}


// Widget Logic Conditionals (ancestor) 
function is_tree( $pid ) {
global $post;

if ( is_page($pid) )
return true;

$anc = get_post_ancestors( $post->ID );
foreach ( $anc as $ancestor ) {
if( is_page() && $ancestor == $pid ) {
return true;
}
}
return false;
}

// User role edits
add_filter( 'user_has_cap',
function( $caps ) {
    if ( ! empty( $caps['edit_pages'] ) )
        $caps['manage_options'] = true;
    return $caps;
} );

// Add ability to add SVG to Wordpress Media Library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Add shortcode for embedding custom menus in page content
function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');


//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// Shortcode for Yoast breadcrumbs 
function surbma_yoast_breadcrumb_shortcode_init() {
    load_plugin_textdomain( 'surbma-yoast-breadcrumb-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'surbma_yoast_breadcrumb_shortcode_init' );

function surbma_yoast_breadcrumb_shortcode_shortcode( $atts ) {
    extract( shortcode_atts( array(
        "before" => '<p id="breadcrumbs">',
        "after" => '</p>'
    ), $atts ) );

    $wpseo_internallinks = get_option( 'wpseo_internallinks' );

    if ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] == 1 ) {
        return yoast_breadcrumb( $before, $after, false );
    }
    elseif ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] != 1 ) {
        return __( '<p>Please enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
    }
    else {
        return __( '<p>Please install <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO by Yoast</a> plugin and enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
    }
}
add_shortcode( 'yoast-breadcrumb', 'surbma_yoast_breadcrumb_shortcode_shortcode' );

// Shortcode for adding default sidebar to page content
function sidebar_sc( $atts ) {
    ob_start();
    dynamic_sidebar('SidebarPage');
    $html = ob_get_contents();
    ob_end_clean();
    return '
    <aside class="practice_area_sidebar">'.$html.'</aside>';
    }

    add_shortcode('sidebar', 'sidebar_sc');


// Remove Wordpress Emoji Javascript call
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
 
// ACF Options Page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme Customizations',
        'menu_title'    => 'Theme Customizations',
        'menu_slug'     => 'theme-customizations',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));


}

// Custom Navigation using wp_menus
function custis_register_nav_menus() {
  register_nav_menus(
    array(
        'primary-nav' => __( 'Primary Navigation', 'custis' ),
        'mobile-nav' => __( 'Mobile Navigation', 'custis' ),
        'footer-nav' => __( 'Footer Navigation', 'custis' )
    )
  );
}
add_action( 'init', 'custis_register_nav_menus' );

//Comment form empty H3 fix
function my_comment_form_before() {
    ob_start();
}
add_action( 'comment_form_before', 'my_comment_form_before' );

function my_comment_form_after() {
    $html = ob_get_clean();
    $html = preg_replace(
        '/<h3 id="reply-title"(.*)>(.*)<\/h3>/',
        '<p id="reply-title"\1>\2</p>',
        $html
    );
    echo $html;
}
add_action( 'comment_form_after', 'my_comment_form_after' );

function postali_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

/**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );
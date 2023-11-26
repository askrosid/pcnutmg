<?php
/*----------------------------------------------------------*/
/* Enqueue Styles
/*----------------------------------------------------------*/
function pcnu_enqueue_styles(){
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), false, 'all' );
    wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css', array(), false, 'all' );
    wp_enqueue_style( 'tailwind-style', get_stylesheet_directory_uri() . '/assets/css/output.css', array(), false, 'all' );
    wp_enqueue_style( 'main-style', get_stylesheet_uri(), array('tailwind-style'), "1.0.0", 'all' );
}
add_action('wp_enqueue_scripts', 'pcnu_enqueue_styles');
/*----------------------------------------------------------*/
/* Enqueue Scripts
/*----------------------------------------------------------*/
function pcnu_enqueue_scripts(){
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-3.6.3.min.js', array(), null, true );
    wp_enqueue_script( 'slick-script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'main-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'pcnu_enqueue_scripts');
/*----------------------------------------------------------*/
/* Adds new body classes
/*----------------------------------------------------------*/
add_filter('body_class', 'add_browser_classes');
function add_browser_classes( $classes ){
    // WordPress global variables with browser information
    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;

    if( $is_chrome ) {
        $classes[] = 'chrome';
    }
    elseif( $is_gecko ){
        $classes[] = 'gecko';
    } 
    elseif( $is_opera ) {
        $classes[] = 'opera';
    }
    elseif( $is_safari ) {
        $classes[] = 'safari';
    }
    elseif( $is_IE ) {
        $classes[] = 'internet-explorer';
    }
    return $classes;
}
/*----------------------------------------------------------*/
/* Theme Supports
/*----------------------------------------------------------*/
function pcnu_setup() {
    // Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );

    // Enable support for post thumbnails and featured images.
    add_theme_support( 'post-thumbnails' );

    // Adds <title> tag support
    add_theme_support( 'title-tag' );

    // Add custom-logo support
    add_theme_support( 'custom-logo' );

    // Add widgets support
    add_theme_support( 'widgets' );

    // Add custom navigation menus.
    register_nav_menus( array(
        'header-menu'   => __( 'Menu Header', 'pcnu' ),
        'informasi' => __( 'Menu Informasi', 'pcnu' )
    ) );
}
add_action( 'after_setup_theme', 'pcnu_setup' );
/*----------------------------------------------------------*/
/* Add Meta Description
/*----------------------------------------------------------*/
function pcnu_meta_description() {
    global $post;
    if ( is_singular() ) {
        $des_post = strip_tags( $post->post_content );
        $des_post = strip_shortcodes( $post->post_content );
        $des_post = str_replace( array("\n", "\r", "\t"), ' ', $des_post );
        $des_post = mb_substr( $des_post, 0, 300, 'utf8' );
        echo '<meta name="description" content="' . esc_attr( $des_post ) . '">' . "\n";
    }
    if ( is_home() ) {
        echo '<meta name="description" content="Website Resmi PCNU Temanggung sebagai media online untuk menyampaikan informasi seputar Islam, NU, Berita Temanggung, Berita Jawa Tengah dan artikel bermanfaat.">' . "\n";
    }
    if ( is_category() ) {
        $des_cat = strip_tags(category_description());
        echo '<meta name="description" content="' . esc_attr( $des_cat ) . '">' . "\n";
    }
    if ( is_tag() ) {
        $des_tag = strip_tags(tag_description());
        echo '<meta name="description" content="' . esc_attr( $des_tag ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'pcnu_meta_description');
/*----------------------------------------------------------*/
/* Filter Latest Posts
/*----------------------------------------------------------*/
function filter_latest_posts() {
    $catSlug = $_POST['category'];

    $ajaxposts = new WP_Query(
        array(
               'post_type'          => 'post',
               'post_status'        => 'publish',
               'posts_per_page'     => 9,
               'category_name'      => $catSlug,
               'orderby'            => 'date',
               'order'              => 'DESC'
            )
    );
    $response = '';

    if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part( 'parts/latestpost', 'withfilter' );
        endwhile;
    } else {
        $response = 'empty';
    }
    echo $response;
    exit;
    }
add_action('wp_ajax_filter_latest_posts', 'filter_latest_posts');
add_action('wp_ajax_nopriv_filter_latest_posts', 'filter_latest_posts');
/*----------------------------------------------------------*/
/* Filter Posts Lainnya
/*----------------------------------------------------------*/
function filter_posts_lainnya() {
    $catSlug = $_POST['category'];

    $ajaxposts = new WP_Query(
        array(
               'post_type'          => 'post',
               'post_status'        => 'publish',
               'posts_per_page'     => 4,
               'category_name'      => $catSlug,
               'orderby'            => 'rand',
               'order'              => 'DESC'
            )
    );
    $response = '';

    if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part( 'parts/latestpost', 'withfilter' );
        endwhile;
    } else {
        $response = 'empty';
    }
    echo $response;
    exit;
    }
add_action('wp_ajax_filter_posts_lainnya', 'filter_posts_lainnya');
add_action('wp_ajax_nopriv_filter_posts_lainnya', 'filter_posts_lainnya');
/* ------------------------------------------------------------------------- *
* WordPress Dynamic XML Sitemap
/* ------------------------------------------------------------------------- */
add_action("publish_post", "pcnu_create_sitemap");
add_action("publish_page", "pcnu_create_sitemap");
function pcnu_create_sitemap() {
$postsForSitemap = get_posts(array(
'numberposts' => -1,
'orderby' => 'modified',
'post_type' => array('post','page'),
'order' => 'DESC'
));
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
$sitemap .= '<?xml-stylesheet type="text/xsl" href="sitemap-style.xsl"?>';
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach($postsForSitemap as $post) {
setup_postdata($post);
$postdate = explode(" ", $post->post_modified);
$sitemap .= '<url>'.
'<loc>'. get_permalink($post->ID) .'</loc>'.
'<priority>1</priority>'.
'<lastmod>'. $postdate[0] .'</lastmod>'.
'<changefreq>daily</changefreq>'.
'</url>';
}
$sitemap .= '</urlset>';
$fp = fopen(ABSPATH . "sitemap.xml", 'w');
fwrite($fp, $sitemap);
fclose($fp);
}
?>
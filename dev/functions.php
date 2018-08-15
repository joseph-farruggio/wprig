<?php
/**
 * WP Rig functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wprig
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wprig_setup()
{
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on wprig, use a find and replace
    * to change 'wprig' to the name of your theme in all the template files.
    */
    load_theme_textdomain('wprig', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support('title-tag');

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
        'primary' => esc_html__('Primary', 'wprig'),
        )
    );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support(
        'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background', apply_filters(
            'wprig_custom_background_args', array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo', array()
    );

    // Custom Alt Logo
    function bizrocket_customizer_setting($wp_customize)
    {
        // add a setting 
        $wp_customize->add_setting('bizrocket_alt_logo');
        // Add a control to upload the hover logo
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize, 'bizrocket_alt_logo', array(
                'label' => 'Alternate Logo',
                'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
                'settings' => 'bizrocket_alt_logo',
                'priority' => 8 // show it just below the custom-logo
                )
            )
        );
    }
        
    add_action('customize_register', 'bizrocket_customizer_setting');

    /**
     * Add support for wide aligments.
     *
     * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
     */
    add_theme_support('align-wide');

    /**
     * Add support for block color palettes.
     *
     * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
     */
    add_theme_support(
        'editor-color-palette', array(
        array(
        'name'  => __('Dusty orange', 'wprig'),
        'slug'  => 'dusty-orange',
        'color' => '#ed8f5b',
        ),
        array(
        'name'  => __('Dusty red', 'wprig'),
        'slug'  => 'dusty-red',
        'color' => '#e36d60',
        ),
        array(
        'name'  => __('Dusty wine', 'wprig'),
        'slug'  => 'dusty-wine',
        'color' => '#9c4368',
        ),
        array(
        'name'  => __('Dark sunset', 'wprig'),
        'slug'  => 'dark-sunset',
        'color' => '#33223b',
        ),
        array(
        'name'  => __('Almost black', 'wprig'),
        'slug'  => 'almost-black',
        'color' => '#0a1c28',
        ),
        array(
        'name'  => __('Dusty water', 'wprig'),
        'slug'  => 'dusty-water',
        'color' => '#41848f',
        ),
        array(
        'name'  => __('Dusty sky', 'wprig'),
        'slug'  => 'dusty-sky',
        'color' => '#72a7a3',
        ),
        array(
        'name'  => __('Dusty daylight', 'wprig'),
        'slug'  => 'dusty-daylight',
        'color' => '#97c0b7',
        ),
        array(
        'name'  => __('Dusty sun', 'wprig'),
        'slug'  => 'dusty-sun',
        'color' => '#eee9d1',
        ),
        ) 
    );

    /**
     * Optional: Disable custom colors in block color palettes.
     *
     * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
     *
     * add_theme_support( 'disable-custom-colors' );
     */

    /**
     * Optional: Add AMP support.
     *
     * Add built-in support for the AMP plugin and specific AMP features.
     * Control how the plugin, when activated, impacts the theme.
     *
     * @link https://wordpress.org/plugins/amp/
     */
    add_theme_support(
        'amp', array(
        'comments_live_list' => true,
        ) 
    );

}
add_action('after_setup_theme', 'wprig_setup');

/**
 * Set the embed width in pixels, based on the theme's design and stylesheet.
 *
 * @param  array $dimensions An array of embed width and height values in pixels (in that order).
 * @return array
 */
function wprig_embed_dimensions( array $dimensions )
{
    $dimensions['width'] = 720;
    return $dimensions;
}
add_filter('embed_defaults', 'wprig_embed_dimensions');

/**
 * Register Google Fonts
 */
function wprig_fonts_url()
{
    $fonts_url = '';

    /**
     * Translator: If Montserrat Sans does not support characters in your language, translate this to 'off'.
     */
    $montserrat = esc_html_x('on', 'Montserrat font: on or off', 'wprig');
    /**
     * Translator: If Comfortaa does not support characters in your language, translate this to 'off'.
     */
    $Comfortaa = esc_html_x('on', 'Comfortaa font: on or off', 'wprig');

    $font_families = array();

    if ('off' !== $montserrat ) {
        $font_families[] = 'Montserrat:200,300,400,600';
    }

    if ('off' !== $Comfortaa ) {
        $font_families[] = 'Comfortaa:400,700';
    }

    if (in_array('on', array( $montserrat, $Comfortaa )) ) {
        $query_args = array(
        'family' => urlencode(implode('|', $font_families)),
        'subset' => urlencode('latin,latin-ext'),
        );

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);

}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param  array  $urls          URLs to print for resource hints.
 * @param  string $relation_type The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function wprig_resource_hints( $urls, $relation_type )
{
    if (wp_style_is('biz_rocket-fonts', 'queue') && 'preconnect' === $relation_type ) {
        $urls[] = array(
        'href' => 'https://fonts.gstatic.com',
        'crossorigin',
        );
    }

    return $urls;
}
add_filter('wp_resource_hints', 'wprig_resource_hints', 10, 2);

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function wprig_gutenberg_styles()
{
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('biz_rocket-fonts', wprig_fonts_url(), array(), null);

    // Enqueue main stylesheet.
    wp_enqueue_style('biz_rocket-base-style', get_theme_file_uri('/css/editor-styles.css'), array(), '20180514');
}
add_action('enqueue_block_editor_assets', 'wprig_gutenberg_styles');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wprig_widgets_init()
{
    register_sidebar(
        array(
        'name'          => esc_html__('Sidebar', 'wprig'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'wprig'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) 
    );
}
add_action('widgets_init', 'wprig_widgets_init');

/**
 * Enqueue styles.
 */
function wprig_styles()
{
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('biz_rocket-fonts', wprig_fonts_url(), array(), null);

    // Enqueue main stylesheet.
    wp_enqueue_style('biz_rocket-base-style', get_stylesheet_uri(), array(), '20180514');
    wp_enqueue_style('biz_rocket-theme-style', get_theme_file_uri('/css/theme.css'), array(), '20180810');

    // Register component styles that are printed as needed.
    //wp_register_style('biz_rocket-comments', get_theme_file_uri('/css/comments.css'), array(), '20180514');
    // wp_register_style('biz_rocket-sidebar', get_theme_file_uri('/css/sidebar.css'), array(), '20180514');
    // wp_register_style('biz_rocket-widgets', get_theme_file_uri('/css/widgets.css'), array(), '20180514');
    wp_register_style('biz_rocket-content', get_theme_file_uri('/css/content.css'), array(), '20180514');
    wp_register_style('biz_rocket-front-page', get_theme_file_uri('/css/front-page.css'), array(), '20180808');
    wp_register_style('biz_rocket-contact-page', get_theme_file_uri('/css/contact-page.css'), array(), '20180808');
    wp_register_style('biz_rocket-landing-page', get_theme_file_uri('/css/landing-page.css'), array(), '20180808');
    
}
add_action('wp_enqueue_scripts', 'wprig_styles');

/**
 * Enqueue scripts.
 */
function wprig_scripts()
{

    // If the AMP plugin is active, return early.
    if (wprig_is_amp() ) {
        return;
    }

    wp_deregister_script( 'jquery' ); 
    // Enqueue the navigation script.
    // wp_enqueue_script('biz_rocket-navigation', get_theme_file_uri('/js/navigation.js'), array(), '20180809', false);
    // wp_script_add_data('biz_rocket-navigation', 'async', true);
    // wp_localize_script(
    //     'biz_rocket-navigation', 'wprigScreenReaderText', array(
    //     'expand'   => __('Expand child menu', 'wprig'),
    //     'collapse' => __('Collapse child menu', 'wprig'),
    //     )
    // );

    
    

    // wp_enqueue_script('vendor-micromodal', 'https://unpkg.com/micromodal/dist/micromodal.min.js', array(), '20180716', false);
    // wp_script_add_data('vendor-micromodal', 'defer', true);

    // wp_enqueue_script('bizrocket-modal', get_theme_file_uri('/js/modals.js'), array(), '20180809', false);
    // wp_script_add_data('bizrocket-modal', 'async', true);

    // wp_enqueue_script('bizrocket-woopra-indentify', get_theme_file_uri('/js/woopra-indentify.js'), array(), '20180809', false);
    // wp_script_add_data('bizrocket-woopra-indentify', 'async', true);

    // Enqueue skip-link-focus script.
    // wp_enqueue_script('biz_rocket-skip-link-focus-fix', get_theme_file_uri('/js/skip-link-focus-fix.js'), array(), '20180809', false);
    // wp_script_add_data('biz_rocket-skip-link-focus-fix', 'defer', true);

    // wp_enqueue_script('bizrocket-smooth-scroll', get_theme_file_uri('/js/smooth-scroll.js'), array(), '20180809', false);
    // wp_script_add_data('bizrocket-smooth-scroll', 'async', true);

    wp_enqueue_script('bizrocket-vue-instance', 'https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js', array(), '2.5.3', true);
    wp_enqueue_script('bizrocket-vue-axios', 'https://unpkg.com/axios/dist/axios.min.js', array(), '2.5.3', true);
    wp_enqueue_script('bizrocket-vue-smooth-scroll', 'https://cdn.jsdelivr.net/npm/vue-scrollto', array(), '2.5.3', true);
    wp_enqueue_script( 'bizrocket-qs-js', 'https://unpkg.com/qs@6.5.1/dist/qs.js', array(), '6.5.1', true );
    //wp_enqueue_script('bizrocket-vue-instance', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.min.js', array(), '2.5.3', true);
    // wp_script_add_data('bizrocket-vue-instance', 'async', true);

    wp_enqueue_script('bizrocket-js', get_theme_file_uri('/js/main.js'), array(), '20180812', true);
    // wp_script_add_data('bizrocket-js', 'async', true);

    wp_localize_script( 'bizrocket-js', 'WPURLS', array( 
        'site_url' => get_site_url(),
        'templateDirectory' => get_template_directory_uri()
    ));
    

    // Enqueue comment script on singular post/page views only.
    if (is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }

}
add_action('wp_enqueue_scripts', 'wprig_scripts');

/**
 * Custom responsive image sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/pluggable/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Optional: Add theme support for lazyloading images.
 *
 * @link https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
 */
// require get_template_directory() . '/pluggable/lazyload/lazyload.php';

add_filter('body_class', 'featured_image_body_class');
function featured_image_body_class( $classes )
{
 
    if (has_post_thumbnail() ) {
        $classes[] = 'has-featured-image';
    }
     
    return $classes;
}

// Combine Social Links from Customizer into an array
function social_links_list()
{
    global $social_links;
    $social_links = array();
    
    if(get_theme_mod('social_links_facebook')) {
        $social_links['facebook'] = array (
        'url' => get_theme_mod('social_links_facebook'),
        'icon' => 'fab fa-facebook'
        );        
    }

    if(get_theme_mod('social_links_twitter')) {
        $social_links['twitter'] = array (
        'url' => get_theme_mod('social_links_twitter'),
        'icon' => 'fab fa-twitter'
        );        
    }

    if(get_theme_mod('social_links_linkedin')) {
        $social_links['linkedin'] = array (
        'url' => get_theme_mod('social_links_linkedin'),
        'icon' => 'fab fa-linkedin'
        );        
    }

    foreach($social_links as $link):
        echo '<li><a href="'. $link['url'] .'" target="_blank"><i class="'. $link['icon'] .'"></i></a></li>';
    endforeach;
}

if(function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(
        array(
        'page_title'     => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
        )
    );
}


/**
 * Templates and Page IDs without editor
 */
function ea_disable_editor( $id = false )
{
    $excluded_templates = array(
    'landing-page.php',
    'dev/landing-page.php',
    'front-page.php',
    );
    $excluded_ids = array(
    // get_option( 'page_on_front' )
    );
    if(empty($id) ) {
        return false;
    }
    $id = intval($id);
    $template = get_page_template_slug($id);
    return in_array($id, $excluded_ids) || in_array($template, $excluded_templates);
}

function get_menu() {
    # Change 'menu' to your own navigation slug.
    return wp_get_nav_menu_items('primary-navigation');
}

add_action( 'rest_api_init', function () {
        register_rest_route( 'myroutes', '/menu', array(
        'methods' => 'GET',
        'callback' => 'get_menu',
    ) );
} );
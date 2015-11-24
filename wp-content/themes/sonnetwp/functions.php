<?php
/**
 * Sonnet functions and definitions
 *
 * @package Sonnet
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
global $post;
show_admin_bar(0);
add_image_size("portfolio-thumb", "577", "500", true);
add_image_size("portfolio-items", "1200", "800", true);
add_image_size("team_thumb", "200", "400", true);
add_image_size("team_big", "618", "419");
add_image_size("news_thumb", "111", "111",true);
add_image_size("testimonial_thumb", "96", "84",true);
add_image_size("feature_thumb", "452", "375",true);
if (!isset($content_width))
    $content_width = 640; /* pixels */

if (!function_exists('sonnet_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function sonnet_setup()
    {

        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on Sonnet, use a find and replace
         * to change 'sonnet' to the name of your theme in all the template files
         */
        load_theme_textdomain('sonnet', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for Post Thumbnails on posts and pages
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'sonnet'),
        ));

        /**
         * Enable support for Post Formats
         */
        add_theme_support('post-formats', array( 'quote'));
        add_theme_support("post-thumbnails");
        /**
         * Setup the WordPress core custom background feature.
         */
        add_theme_support('custom-background', apply_filters('sonnet_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
endif; // sonnet_setup
add_action('after_setup_theme', 'sonnet_setup');


/**
 * Register widgetized area and update sidebar with default widgets
 */
function sonnet_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'sonnet'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'sonnet_widgets_init');

/**
 * Enqueue scripts and styles
 */
function sonnet_scripts()
{
    wp_enqueue_script("jquery");
    wp_enqueue_style('sonnet-style', get_stylesheet_uri());
    wp_enqueue_style('css2', get_template_directory_uri() . "/css/bootstrap.css");
    wp_enqueue_style('css3', get_template_directory_uri() . "/css/bootstrap-theme.css");
    wp_enqueue_style('css1', get_template_directory_uri() . "/css/bootstrap-reset.css");
    wp_enqueue_style('css6', get_template_directory_uri() . "/css/jquery.bxslider.css");
    wp_enqueue_style('css66', get_template_directory_uri() . "/css/jquery.fancybox.css");
    wp_enqueue_style('css7', get_template_directory_uri() . "/css/owl.carousel.css");
    wp_enqueue_style('css8', get_template_directory_uri() . "/css/owl.theme.css");
    wp_enqueue_style('css9', get_template_directory_uri() . "/css/style-responsive.css");
    wp_enqueue_style('css41', get_template_directory_uri() . "/css/animate.css");
    wp_enqueue_style('css42', get_template_directory_uri() . "/css/megafolio-style.css");
    wp_enqueue_style('css43', get_template_directory_uri() . "/css/ccpreview.css");
    wp_enqueue_style('css44', get_template_directory_uri() . "/megafolio/css/settings.css");
    wp_enqueue_style('css44', get_template_directory_uri() . "/megafolio/css/settings.css");
    wp_enqueue_style('css4', get_template_directory_uri() . "/css/style.css");
    wp_enqueue_style('css45', get_template_directory_uri() . "/css/style-responsive.css");
    wp_enqueue_style('css5', get_template_directory_uri() . "/css/icon-hover-component.css");
    wp_enqueue_style('font1', "//fonts.googleapis.com/css?family=Allura");
    wp_enqueue_style('font2', "//fonts.googleapis.com/css?family=Lato:100,300,400");
    wp_enqueue_style('font3', "//fonts.googleapis.com/css?family=Lato:100,300,400");
    wp_enqueue_style('fa', "//netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css");

    wp_enqueue_script('sonnet-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('sonnet-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('sonnet-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20120202');
    }

    wp_enqueue_script('js0', '//code.jquery.com/jquery-migrate-1.2.1.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js1', get_template_directory_uri() . '/js/bootstrap.js', array(), '20120206', true);
	wp_enqueue_script( 'mjs', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '20120206', false );
    wp_enqueue_script('js3', get_template_directory_uri() . '/js/jquery.appear.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js4', get_template_directory_uri() . '/js/jquery.bxslider.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js5', get_template_directory_uri() . '/js/jquery.easing.min.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js6', get_template_directory_uri() . '/js/jquery.fancybox.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js7', get_template_directory_uri() . '/js/jquery.localscroll-1.2.7-min.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js8', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js9', get_template_directory_uri() . '/js/jquery.scrollTo.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js10', get_template_directory_uri() . '/js/link-hover.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js11', get_template_directory_uri() . '/js/owl.carousel.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js14', get_template_directory_uri() . '/js/scripts.js', array("jquery"), '20120207', true);
    wp_enqueue_script('js15', get_template_directory_uri() . '/megafolio/js/jquery.themepunch.plugins.min.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js16', get_template_directory_uri() . '/megafolio/js/jquery.themepunch.megafoliopro.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js18', get_template_directory_uri() . '/js/hoverIntent.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js19', get_template_directory_uri() . '/js/superfish.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js17', get_template_directory_uri() . '/js/html5shiv.js', array("jquery"), '20120206', true);
    wp_enqueue_script('js20', get_template_directory_uri() . '/js/respond.min.js', array("jquery"), '20120206', true);


}

add_action('wp_enqueue_scripts', 'sonnet_scripts');
function add_bootstrap()
{
    wp_enqueue_style('bs-css', "//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css");
    wp_enqueue_script('bs-js', "//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js", array("jquery"), null, true);

}

/**
 * Implement the Custom Header feature.
 */

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function sonnet_custom_posts()
{

    $labels1 = array(
        'name' => _x('Stories', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('Story', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('Story', 'sonnet'),
        'parent_item_colon' => __('Parent Story:', 'sonnet'),
        'all_items' => __('All Stories', 'sonnet'),
        'view_item' => __('View Story', 'sonnet'),
        'add_new_item' => __('Add New Story', 'sonnet'),
        'add_new' => __('New Story', 'sonnet'),
        'edit_item' => __('Edit Story', 'sonnet'),
        'update_item' => __('Update Story', 'sonnet'),
        'search_items' => __('Search Stoies', 'sonnet'),
        'not_found' => __('No story found', 'sonnet'),
        'not_found_in_trash' => __('No stories found in Trash', 'sonnet'),
    );
    $args1 = array(
        'label' => __('Story', 'sonnet'),
        'description' => __('Story', 'sonnet'),
        'labels' => $labels1,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/story.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('story', $args1);

    $labels2 = array(
        'name' => _x('Features', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('Feature', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('Features', 'sonnet'),
        'parent_item_colon' => __('Parent Feature:', 'sonnet'),
        'all_items' => __('All Features', 'sonnet'),
        'view_item' => __('View Feature', 'sonnet'),
        'add_new_item' => __('Add New Feature', 'sonnet'),
        'add_new' => __('New Feature', 'sonnet'),
        'edit_item' => __('Edit Feature', 'sonnet'),
        'update_item' => __('Update Feature', 'sonnet'),
        'search_items' => __('Search Features', 'sonnet'),
        'not_found' => __('No Feature found', 'sonnet'),
        'not_found_in_trash' => __('No Features found in Trash', 'sonnet'),
    );
    $args2 = array(
        'label' => __('Feature', 'sonnet'),
        'description' => __('Feature', 'sonnet'),
        'labels' => $labels2,
        'supports' => array('title', 'thumbnail', 'editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/feature.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('feature', $args2);

    $labels3 = array(
        'name' => _x('Team Members', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('Team Member', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('Team Members', 'sonnet'),
        'parent_item_colon' => __('Parent Team Member:', 'sonnet'),
        'all_items' => __('All Team Members', 'sonnet'),
        'view_item' => __('View Team Member', 'sonnet'),
        'add_new_item' => __('Add New Team Member', 'sonnet'),
        'add_new' => __('New Team Member', 'sonnet'),
        'edit_item' => __('Edit Team Member', 'sonnet'),
        'update_item' => __('Update Team Member', 'sonnet'),
        'search_items' => __('Search Team Members', 'sonnet'),
        'not_found' => __('No Team Member found', 'sonnet'),
        'not_found_in_trash' => __('No Team Members found in Trash', 'sonnet'),
    );
    $args3 = array(
        'label' => __('Team Member', 'sonnet'),
        'description' => __('Team Member', 'sonnet'),
        'labels' => $labels3,
        'supports' => array('title', 'editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/team.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('team', $args3);

    $labels4 = array(
        'name' => _x('Sections', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('Section', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('Sections', 'sonnet'),
        'parent_item_colon' => __('Parent Section:', 'sonnet'),
        'all_items' => __('All Sections', 'sonnet'),
        'view_item' => __('View Section', 'sonnet'),
        'add_new_item' => __('Add New Section', 'sonnet'),
        'add_new' => __('New Section', 'sonnet'),
        'edit_item' => __('Edit Section', 'sonnet'),
        'update_item' => __('Update Section', 'sonnet'),
        'search_items' => __('Search Sections', 'sonnet'),
        'not_found' => __('No Section found', 'sonnet'),
        'not_found_in_trash' => __('No Sections found in Trash', 'sonnet'),
    );
    $args4 = array(
        'label' => __('Section', 'sonnet'),
        'description' => __('Section', 'sonnet'),
        'labels' => $labels4,
        'supports' => array('title', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/section.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('section', $args4);

    $labels5 = array(
        'name' => _x('Services', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('Service', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('Services', 'sonnet'),
        'parent_item_colon' => __('Parent Service:', 'sonnet'),
        'all_items' => __('All Services', 'sonnet'),
        'view_item' => __('View Service', 'sonnet'),
        'add_new_item' => __('Add New Service', 'sonnet'),
        'add_new' => __('New Service', 'sonnet'),
        'edit_item' => __('Edit Service', 'sonnet'),
        'update_item' => __('Update Service', 'sonnet'),
        'search_items' => __('Search Services', 'sonnet'),
        'not_found' => __('No Service found', 'sonnet'),
        'not_found_in_trash' => __('No Services found in Trash', 'sonnet'),
    );
    $args5 = array(
        'label' => __('Service', 'sonnet'),
        'description' => __('Service', 'sonnet'),
        'labels' => $labels5,
        'supports' => array('title', 'editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/service.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('service', $args5);

    $labels6 = array(
        'name' => _x('News', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('News', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('News', 'sonnet'),
        'parent_item_colon' => __('Parent News:', 'sonnet'),
        'all_items' => __('All News', 'sonnet'),
        'view_item' => __('View News', 'sonnet'),
        'add_new_item' => __('Add New News', 'sonnet'),
        'add_new' => __('New News', 'sonnet'),
        'edit_item' => __('Edit News', 'sonnet'),
        'update_item' => __('Update News', 'sonnet'),
        'search_items' => __('Search News', 'sonnet'),
        'not_found' => __('No News found', 'sonnet'),
        'not_found_in_trash' => __('No News found in Trash', 'sonnet'),
    );
    $args6 = array(
        'label' => __('News', 'sonnet'),
        'description' => __('News', 'sonnet'),
        'labels' => $labels6,
        'supports' => array('title', 'editor','thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/news.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('news', $args6);

    $labels7 = array(
        'name' => _x('Testimonials', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('Testimonial', 'sonnet'),
        'parent_item_colon' => __('Parent Testimonial:', 'sonnet'),
        'all_items' => __('All Testimonial', 'sonnet'),
        'view_item' => __('View Testimonial', 'sonnet'),
        'add_new_item' => __('Add New Testimonial', 'sonnet'),
        'add_new' => __('New Testimonial', 'sonnet'),
        'edit_item' => __('Edit Testimonial', 'sonnet'),
        'update_item' => __('Update Testimonial', 'sonnet'),
        'search_items' => __('Search Testimonial', 'sonnet'),
        'not_found' => __('No Testimonial found', 'sonnet'),
        'not_found_in_trash' => __('No Testimonial found in Trash', 'sonnet'),
    );
    $args7 = array(
        'label' => __('Testimonial', 'sonnet'),
        'description' => __('Testimonial', 'sonnet'),
        'labels' => $labels7,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/testimonial.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('testimonial', $args7);

    $labels8 = array(
        'name' => _x('Pricing tables', 'Post Type General Name', 'sonnet'),
        'singular_name' => _x('Pricing table', 'Post Type Singular Name', 'sonnet'),
        'menu_name' => __('Pricing tables', 'sonnet'),
        'parent_item_colon' => __('Parent Pricing table:', 'sonnet'),
        'all_items' => __('All Pricing tables', 'sonnet'),
        'view_item' => __('View Pricing table', 'sonnet'),
        'add_new_item' => __('Add New Pricing table', 'sonnet'),
        'add_new' => __('New Pricing table', 'sonnet'),
        'edit_item' => __('Edit Pricing table', 'sonnet'),
        'update_item' => __('Update Pricing table', 'sonnet'),
        'search_items' => __('Search Pricing tables', 'sonnet'),
        'not_found' => __('No Pricing table found', 'sonnet'),
        'not_found_in_trash' => __('No Pricing tables found in Trash', 'sonnet'),
    );
    $args8 = array(
        'label' => __('Pricing table', 'sonnet'),
        'description' => __('Pricing table', 'sonnet'),
        'labels' => $labels8,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/pricingtable.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('pricingtable', $args8);
}

// Hook into the 'init' action
add_action('init', 'sonnet_custom_posts', 0);

////Allow attachments plugin for posts
define('ATTACHMENTS_DEFAULT_INSTANCE', false); // disable the Settings screen


/** icons metabox for features **/
function sonnet_featured_icon_metaboxes($meta_boxes)
{
    $prefix = '_sonnet_'; // Prefix for all fields
    $meta_boxes[] = array(
        'id' => 'sectionorder',
        'title' => 'Section Order',
        'pages' => array('section'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => 'Hide in Menubar',
                'id' => $prefix . 'section_menu_hide',
                'type' => 'checkbox'
            ),
            array(
                'name' => 'Section Order',
                'id' => $prefix . 'section_order',
                'type' => 'text'
            ),
            array(
                'name' => 'Section Type',
                'id' => $prefix . 'section_type',
                'type' => 'select',
                'options' => array(
                    array("name" => "Stories", "value" => 1),
                    array("name" => "Features", "value" => 2),
                    array("name" => "Portfolio", "value" => 3),
                    array("name" => "Quote", "value" => 4),
                    array("name" => "About Us", "value" => 5),
                    array("name" => "Team", "value" => 6),
                    array("name" => "Services", "value" => 7),
                    array("name" => "Subscription", "value" => 8),
                    array("name" => "Testimonial", "value" => 9),
                    array("name" => "Pricing", "value" => 10),
                    array("name" => "Clients", "value" => 11),
                    array("name" => "Contact Us", "value" => 12),
                    array("name" => "News", "value" => 13),
                    array("name" => "Banner", "value" => 14),
                    array("name" => "Blank", "value" => 15),
                )
            ),
            array(
                'name' => 'Section Menu Title',
                'id' => $prefix . 'section_menu',
                'type' => 'text'
            ),

            array(
                'name' => 'Section Tagline',
                'id' => $prefix . 'section_content',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Section Background Image',
                'id' => $prefix . 'section_bg',
                'type' => 'file',
                'std' => '#ffffff'
            ),
            array(
                'name' => 'Section Background Color',
                'id' => $prefix . 'section_color',
                'type' => 'colorpicker',
                'std' => '#ffffff'
            ),

            array(
                'name' => 'Section Title Color',
                'id' => $prefix . 'section_title_color',
                'type' => 'colorpicker',
                'std' => '#6e6e6e'
            ),
            array(
                'name' => 'Section Text Color',
                'id' => $prefix . 'section_text_color',
                'type' => 'colorpicker',
                'std' => '#6e6e6e'
            ),

        ),
    );


    $meta_boxes[] = array(
        'id' => 'team_settings',
        'title' => 'Team Member Properties',
        'pages' => array('team'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Animation Style',
                'id' => $prefix . 'tm_animation',
                'type' => 'select',
                'options'=>array(
                    array("name"=>"No Animation","value"=>''),
                    array("name"=>"Animate from left","value"=>'animated animate-from-left'),
                    array("name"=>"Animate from right","value"=>'animated animate-from-right'),
                    array("name"=>"Animate from top","value"=>'animated animate-from-top'),
                    array("name"=>"Animate from bottom","value"=>'animated animate-from-bottom'),

                )
            ),
            array(
                'name' => 'Designation',
                'id' => $prefix . 'tm_designation',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Style',
                'id' => $prefix . 'tm_style',
                'type' => 'text'
            ),
            array(
                'name' => 'Thumbnail',
                'id' => $prefix . 'tm_thumb',
                'type' => 'file'
            ),
            array(
                'name' => 'Photo',
                'id' => $prefix . 'tm_photo',
                'type' => 'file'
            ),
            array(
                'name' => 'Facebook',
                'id' => $prefix . 'tm_facebook',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Linkedin',
                'id' => $prefix . 'tm_linkedin',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Twitter',
                'id' => $prefix . 'tm_twitter',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Github',
                'id' => $prefix . 'tm_github',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Pinterest',
                'id' => $prefix . 'tm_pinterest',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Dribbble',
                'id' => $prefix . 'tm_dribbble',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Google+',
                'id' => $prefix . 'tm_google',
                'type' => 'text_medium'
            ),
        ),
    );

    $meta_boxes[] = array(
        'id' => 'aboutusdetails',
        'title' => 'About Us Extra',
        'pages' => array('section'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => 'Headline',
                'id' => $prefix . 'section_headline',
                'type' => 'text'
            ),
            array(
                'name' => 'Details',
                'id' => $prefix . 'section_details',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Show Skills',
                'id' => $prefix . 'skill_show',
                'type' => 'checkbox'
            ),
            array(
                'name' => 'Skill 1 Title',
                'id' => $prefix . 'skill_1_title',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Skill 1 Percentage',
                'id' => $prefix . 'skill_1_percentage',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Skill 2 Title',
                'id' => $prefix . 'skill_2_title',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Skill 2 Percentage',
                'id' => $prefix . 'skill_2_percentage',
                'type' => 'text_medium'
            ),array(
                'name' => 'Skill 3 Title',
                'id' => $prefix . 'skill_3_title',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Skill 3 Percentage',
                'id' => $prefix . 'skill_3_percentage',
                'type' => 'text_medium'
            ),array(
                'name' => 'Skill 4 Title',
                'id' => $prefix . 'skill_4_title',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Skill 4 Percentage',
                'id' => $prefix . 'skill_4_percentage',
                'type' => 'text_medium'
            ),array(
                'name' => 'Skill 5 Title',
                'id' => $prefix . 'skill_5_title',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Skill 5 Percentage',
                'id' => $prefix . 'skill_5_percentage',
                'type' => 'text_medium'
            ),
        )
    );



    $meta_boxes[] = array(
        'id' => 'testimonial',
        'title' => 'Testimonial Details',
        'pages' => array('testimonial'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Endorsed By',
                'id' => $prefix . 'testimonial_endorser',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Designation ',
                'id' => $prefix . 'testimonial_designation',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Photo ',
                'id' => $prefix . 'testimonial_thumbnail',
                'type' => 'file'
            ),
            array(
                'name' => 'Testimonial',
                'id' => $prefix . 'testimonial_text',
                'type' => 'textarea_small'
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'storydetails',
        'title' => 'Story Options',
        'pages' => array('story'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Order',
                'id' => $prefix . 'story_order',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Animation Style',
                'id' => $prefix . 'story_animation',
                'type' => 'select',
                'options'=>array(
                    array("name"=>"No Animation","value"=>''),
                    array("name"=>"Animate from left","value"=>'animated animate-from-left'),
                    array("name"=>"Animate from right","value"=>'animated animate-from-right'),
                    array("name"=>"Animate from top","value"=>'animated animate-from-top'),
                    array("name"=>"Animate from bottom","value"=>'animated animate-from-bottom'),

                )
            ),
            array(
                'name' => 'Upload Icon',
                'id' => $prefix . 'story_icon',
                'type' => 'file',
            ),
            array(
                'name' => 'Icon Background Color',
                'id' => $prefix . 'story_icon_bg_color',
                'type' => 'colorpicker',
                'std'=>'#c8f0e9'
            ),
            array(
                'name' => 'Details',
                'id' => $prefix . 'story_details',
                'type' => 'wysiwyg'
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'portfolioquotes',
        'title' => 'Portfolio Tags',
        'pages' => array('section'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(

            array(
                'name' => 'Show quote below portfolio',
                'id' => $prefix . 'quote_display',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Quote Text',
                'id' => $prefix . 'quote',
                'type' => 'textarea_code',
            ),
            array(
                'name' => 'Quote Background Image',
                'id' => $prefix . 'quote_bg',
                'type' => 'file',
            ),
            array(
                'name' => 'Tag Text Color',
                'id' => $prefix . 'portfolio_tag_text_color',
                'type' => 'colorpicker',
                'std' => '#ffffff',
            ),
            array(
                'name' => 'Tag Hover Text Color',
                'id' => $prefix . 'portfolio_tag_text_hover_color',
                'type' => 'colorpicker',
                'std' => '#067fa2',
            ),
            array(
                'name' => 'Tag Background Color',
                'id' => $prefix . 'portfolio_tag_bg_color',
                'type' => 'colorpicker',
                'std'=>'#0094bf'
            ),
            array(
                'name' => 'Tag Hover Background Color',
                'id' => $prefix . 'portfolio_tag_bg_hover_color',
                'type' => 'colorpicker',
                'std'=>'#23D3FB'
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'pricingtabledetals',
        'title' => 'Pricing Table',
        'pages' => array('pricingtable'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Featured',
                'id' => $prefix . 'pricing_featured',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Order',
                'id' => $prefix . 'pricing_order',
                'type' => 'text_medium',
            ),
            array(
                'name' => 'Price',
                'id' => $prefix . 'pricing_price',
                'type' => 'text_medium',
            ),
            array(
                'name' => 'Table Elements (One in each line)',
                'id' => $prefix . 'pricing_elements',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Button text',
                'id' => $prefix . 'pricing_button',
                'type' => 'text_medium',
                'std'=>"Get Now"

            ),
            array(
                'name' => 'Button link',
                'id' => $prefix . 'pricing_button_link',
                'type' => 'text_medium',
                'std'=>"#"
            ),
            array(
                'name' => 'Animation Style',
                'id' => $prefix . 'pricing_animation',
                'type' => 'select',
                'options'=>array(
                    array("name"=>"No Animation","value"=>''),
                    array("name"=>"Animate from left","value"=>'animated animate-from-left'),
                    array("name"=>"Animate from right","value"=>'animated animate-from-right'),
                    array("name"=>"Animate from top","value"=>'animated animate-from-top'),
                    array("name"=>"Animate from bottom","value"=>'animated animate-from-bottom'),

                )
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'featuredetails',
        'title' => 'Feature Details',
        'pages' => array('feature'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'order',
                'id' => $prefix . 'feature_order',
                'type' => 'text',
            ),
            array(
                'name' => 'Show Button',
                'id' => $prefix . 'feature_display_button',
                'type' => 'checkbox',
                'std' => 'Read More',
            ),
            array(
                'name' => 'Button Text',
                'id' => $prefix . 'feature_button_text',
                'type' => 'text_medium',
                'std' => 'Read More',
            ),
            array(
                'name' => 'Button Link',
                'id' => $prefix . 'feature_button_link',
                'type' => 'text',
                'std' => '',
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'quotedetails',
        'title' => 'Quote Details',
        'pages' => array('section'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Show Button',
                'id' => $prefix . 'quote_display_button',
                'type' => 'checkbox',
                'std' => 'Purchase Now',
            ),
            array(
                'name' => 'Button Text',
                'id' => $prefix . 'quote_button_text',
                'type' => 'text_medium',
                'std' => 'Read More',
            ),
            array(
                'name' => 'Button Link',
                'id' => $prefix . 'quote_button_link',
                'type' => 'text',
                'std' => '',
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'storysectiondetails',
        'title' => 'Story Section Button Details',
        'pages' => array('section'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Show Button',
                'id' => $prefix . 'story_display_button',
                'type' => 'checkbox',
                'std' => 'Read More',
            ),
            array(
                'name' => 'Section Text',
                'id' => $prefix . 'story_section_text',
                'type' => 'text_medium',
                'std' => 'Is your mind already made up? Fantastic!',
            ),array(
                'name' => 'Button Text',
                'id' => $prefix . 'story_button_text',
                'type' => 'text_medium',
                'std' => 'Read More',
            ),
            array(
                'name' => 'Button Link',
                'id' => $prefix . 'story_button_link',
                'type' => 'text',
                'std' => '',
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'subscriptiondetails',
        'title' => 'Subscription Details',
        'pages' => array('section'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Email Field Id',
                'id' => $prefix . 'subscription_email_id',
                'type' => 'text',
            ),
            array(
                'name' => 'Form Submit Url',
                'id' => $prefix . 'subscription_form_url',
                'type' => 'text',
            ),
        )
    );


    $meta_boxes[] = array(
        'id' => 'newsdetails',
        'title' => 'News Colors',
        'pages' => array('section'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Title Color',
                'id' => $prefix . 'news_title_color',
                'type' => 'colorpicker',
                'std' => '#ecaf69',
            ),
            array(
                'name' => 'Text Color',
                'id' => $prefix . 'news_text_color',
                'type' => 'colorpicker',
                'std' => '#9a9986',
            ),
            array(
                'name' => 'Background Color',
                'id' => $prefix . 'news_bg_color',
                'type' => 'colorpicker',
                'std' => '#fffff',
            )
        )
    );

    $meta_boxes[] = array(
        'id' => 'postdetails',
        'title' => 'Post Customization',
        'pages' => array('post'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Override color codes even if alternate view is enabled',
                'id' => $prefix . 'post_override',
                'type' => 'colorpicker',
                'std' => '#ffffff',
            ),
            array(
                'name' => 'Background Color',
                'id' => $prefix . 'post_bg_color',
                'type' => 'colorpicker',
                'std' => '#ffffff',
            ),
            array(
                'name' => 'Text Color',
                'id' => $prefix . 'post_text_color',
                'type' => 'colorpicker',
                'std' => '#6e6e6e',
            ),
            array(
                'name' => 'Title Color',
                'id' => $prefix . 'post_title_color',
                'type' => 'colorpicker',
                'std' => '#bdbdbd',
            ),
//            array(
//                'name' => 'Title Hover Color',
//                'id' => $prefix . 'post_title_hover_color',
//                'type' => 'colorpicker',
//                'std' => '#fc665d',
//            ),
            array(
                'name' => 'Date Color',
                'id' => $prefix . 'post_date_color',
                'type' => 'colorpicker',
                'std' => '#bdbdbd',
            )

        )
    );

    $meta_boxes[] = array(
        'id' => 'servicedetails',
        'title' => 'Service Details',
        'pages' => array('service'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Order',
                'id' => $prefix . 'service_order',
                'type' => 'text_small',
                'std'=>0,
            ),
            array(
                'name' => 'Service Icon',
                'id' => $prefix . 'service_icon',
                'type' => 'select',
                'options' => array(

                    array('name'=>'fa-geometry', 'value'=>'fa-geometry'  ),
                    array('name'=>'fa-iris', 'value'=>'fa-iris'  ),
                    array('name'=>'fa-facial', 'value'=>'fa-facial'  ),
                    array('name'=>'fa-fingerprint', 'value'=>'fa-fingerprint'  ),
                    array('name'=>'fa-dna', 'value'=>'fa-dna'  ),
                    array('name'=>'fa-adjust', 'value'=>'fa-adjust'  ),
                    array('name'=>'fa-adn', 'value'=>'fa-adn'  ),
                    array('name'=>'fa-align-center', 'value'=>'fa-align-center'  ),
                    array('name'=>'fa-align-justify', 'value'=>'fa-align-justify'  ),
                    array('name'=>'fa-align-left', 'value'=>'fa-align-left'  ),
                    array('name'=>'fa-align-right', 'value'=>'fa-align-right'  ),
                    array('name'=>'fa-ambulance', 'value'=>'fa-ambulance'  ),
                    array('name'=>'fa-anchor', 'value'=>'fa-anchor'  ),
                    array('name'=>'fa-android', 'value'=>'fa-android'  ),
                    array('name'=>'fa-angle-double-down', 'value'=>'fa-angle-double-down'  ),
                    array('name'=>'fa-angle-double-left', 'value'=>'fa-angle-double-left'  ),
                    array('name'=>'fa-angle-double-right', 'value'=>'fa-angle-double-right'  ),
                    array('name'=>'fa-angle-double-up', 'value'=>'fa-angle-double-up'  ),
                    array('name'=>'fa-angle-down', 'value'=>'fa-angle-down'  ),
                    array('name'=>'fa-angle-left', 'value'=>'fa-angle-left'  ),
                    array('name'=>'fa-angle-right', 'value'=>'fa-angle-right'  ),
                    array('name'=>'fa-angle-up', 'value'=>'fa-angle-up'  ),
                    array('name'=>'fa-apple', 'value'=>'fa-apple'  ),
                    array('name'=>'fa-archive', 'value'=>'fa-archive'  ),
                    array('name'=>'fa-arrow-circle-down', 'value'=>'fa-arrow-circle-down'  ),
                    array('name'=>'fa-arrow-circle-left', 'value'=>'fa-arrow-circle-left'  ),
                    array('name'=>'fa-arrow-circle-o-down', 'value'=>'fa-arrow-circle-o-down'  ),
                    array('name'=>'fa-arrow-circle-o-left', 'value'=>'fa-arrow-circle-o-left'  ),
                    array('name'=>'fa-arrow-circle-o-right', 'value'=>'fa-arrow-circle-o-right'  ),
                    array('name'=>'fa-arrow-circle-o-up', 'value'=>'fa-arrow-circle-o-up'  ),
                    array('name'=>'fa-arrow-circle-right', 'value'=>'fa-arrow-circle-right'  ),
                    array('name'=>'fa-arrow-circle-up', 'value'=>'fa-arrow-circle-up'  ),
                    array('name'=>'fa-arrow-down', 'value'=>'fa-arrow-down'  ),
                    array('name'=>'fa-arrow-left', 'value'=>'fa-arrow-left'  ),
                    array('name'=>'fa-arrow-right', 'value'=>'fa-arrow-right'  ),
                    array('name'=>'fa-arrow-up', 'value'=>'fa-arrow-up'  ),
                    array('name'=>'fa-arrows', 'value'=>'fa-arrows'  ),
                    array('name'=>'fa-arrows-alt', 'value'=>'fa-arrows-alt'  ),
                    array('name'=>'fa-arrows-h', 'value'=>'fa-arrows-h'  ),
                    array('name'=>'fa-arrows-v', 'value'=>'fa-arrows-v'  ),
                    array('name'=>'fa-asterisk', 'value'=>'fa-asterisk'  ),
                    array('name'=>'fa-backward', 'value'=>'fa-backward'  ),
                    array('name'=>'fa-ban', 'value'=>'fa-ban'  ),
                    array('name'=>'fa-bar-chart-o', 'value'=>'fa-bar-chart-o'  ),
                    array('name'=>'fa-barcode', 'value'=>'fa-barcode'  ),
                    array('name'=>'fa-bars', 'value'=>'fa-bars'  ),
                    array('name'=>'fa-beer', 'value'=>'fa-beer'  ),
                    array('name'=>'fa-bell', 'value'=>'fa-bell'  ),
                    array('name'=>'fa-bell-o', 'value'=>'fa-bell-o'  ),
                    array('name'=>'fa-bitbucket', 'value'=>'fa-bitbucket'  ),
                    array('name'=>'fa-bitbucket-square', 'value'=>'fa-bitbucket-square'  ),
                    array('name'=>'fa-bold', 'value'=>'fa-bold'  ),
                    array('name'=>'fa-bolt', 'value'=>'fa-bolt'  ),
                    array('name'=>'fa-book', 'value'=>'fa-book'  ),
                    array('name'=>'fa-bookmark', 'value'=>'fa-bookmark'  ),
                    array('name'=>'fa-bookmark-o', 'value'=>'fa-bookmark-o'  ),
                    array('name'=>'fa-briefcase', 'value'=>'fa-briefcase'  ),
                    array('name'=>'fa-btc', 'value'=>'fa-btc'  ),
                    array('name'=>'fa-bug', 'value'=>'fa-bug'  ),
                    array('name'=>'fa-building-o', 'value'=>'fa-building-o'  ),
                    array('name'=>'fa-bullhorn', 'value'=>'fa-bullhorn'  ),
                    array('name'=>'fa-bullseye', 'value'=>'fa-bullseye'  ),
                    array('name'=>'fa-calendar', 'value'=>'fa-calendar'  ),
                    array('name'=>'fa-calendar-o', 'value'=>'fa-calendar-o'  ),
                    array('name'=>'fa-camera', 'value'=>'fa-camera'  ),
                    array('name'=>'fa-camera-retro', 'value'=>'fa-camera-retro'  ),
                    array('name'=>'fa-caret-down', 'value'=>'fa-caret-down'  ),
                    array('name'=>'fa-caret-left', 'value'=>'fa-caret-left'  ),
                    array('name'=>'fa-caret-right', 'value'=>'fa-caret-right'  ),
                    array('name'=>'fa-caret-square-o-down', 'value'=>'fa-caret-square-o-down'  ),
                    array('name'=>'fa-caret-square-o-left', 'value'=>'fa-caret-square-o-left'  ),
                    array('name'=>'fa-caret-square-o-right', 'value'=>'fa-caret-square-o-right'  ),
                    array('name'=>'fa-caret-square-o-up', 'value'=>'fa-caret-square-o-up'  ),
                    array('name'=>'fa-caret-up', 'value'=>'fa-caret-up'  ),
                    array('name'=>'fa-certificate', 'value'=>'fa-certificate'  ),
                    array('name'=>'fa-chain-broken', 'value'=>'fa-chain-broken'  ),
                    array('name'=>'fa-check', 'value'=>'fa-check'  ),
                    array('name'=>'fa-check-circle', 'value'=>'fa-check-circle'  ),
                    array('name'=>'fa-check-circle-o', 'value'=>'fa-check-circle-o'  ),
                    array('name'=>'fa-check-square', 'value'=>'fa-check-square'  ),
                    array('name'=>'fa-check-square-o', 'value'=>'fa-check-square-o'  ),
                    array('name'=>'fa-chevron-circle-down', 'value'=>'fa-chevron-circle-down'  ),
                    array('name'=>'fa-chevron-circle-left', 'value'=>'fa-chevron-circle-left'  ),
                    array('name'=>'fa-chevron-circle-right', 'value'=>'fa-chevron-circle-right'  ),
                    array('name'=>'fa-chevron-circle-up', 'value'=>'fa-chevron-circle-up'  ),
                    array('name'=>'fa-chevron-down', 'value'=>'fa-chevron-down'  ),
                    array('name'=>'fa-chevron-left', 'value'=>'fa-chevron-left'  ),
                    array('name'=>'fa-chevron-right', 'value'=>'fa-chevron-right'  ),
                    array('name'=>'fa-chevron-up', 'value'=>'fa-chevron-up'  ),
                    array('name'=>'fa-circle', 'value'=>'fa-circle'  ),
                    array('name'=>'fa-circle-o', 'value'=>'fa-circle-o'  ),
                    array('name'=>'fa-clipboard', 'value'=>'fa-clipboard'  ),
                    array('name'=>'fa-clock-o', 'value'=>'fa-clock-o'  ),
                    array('name'=>'fa-cloud', 'value'=>'fa-cloud'  ),
                    array('name'=>'fa-cloud-download', 'value'=>'fa-cloud-download'  ),
                    array('name'=>'fa-cloud-upload', 'value'=>'fa-cloud-upload'  ),
                    array('name'=>'fa-code', 'value'=>'fa-code'  ),
                    array('name'=>'fa-code-fork', 'value'=>'fa-code-fork'  ),
                    array('name'=>'fa-coffee', 'value'=>'fa-coffee'  ),
                    array('name'=>'fa-cog', 'value'=>'fa-cog'  ),
                    array('name'=>'fa-cogs', 'value'=>'fa-cogs'  ),
                    array('name'=>'fa-columns', 'value'=>'fa-columns'  ),
                    array('name'=>'fa-comment', 'value'=>'fa-comment'  ),
                    array('name'=>'fa-comment-o', 'value'=>'fa-comment-o'  ),
                    array('name'=>'fa-comments', 'value'=>'fa-comments'  ),
                    array('name'=>'fa-comments-o', 'value'=>'fa-comments-o'  ),
                    array('name'=>'fa-compass', 'value'=>'fa-compass'  ),
                    array('name'=>'fa-compress', 'value'=>'fa-compress'  ),
                    array('name'=>'fa-credit-card', 'value'=>'fa-credit-card'  ),
                    array('name'=>'fa-crop', 'value'=>'fa-crop'  ),
                    array('name'=>'fa-crosshairs', 'value'=>'fa-crosshairs'  ),
                    array('name'=>'fa-css3', 'value'=>'fa-css3'  ),
                    array('name'=>'fa-cutlery', 'value'=>'fa-cutlery'  ),
                    array('name'=>'fa-desktop', 'value'=>'fa-desktop'  ),
                    array('name'=>'fa-dot-circle-o', 'value'=>'fa-dot-circle-o'  ),
                    array('name'=>'fa-download', 'value'=>'fa-download'  ),
                    array('name'=>'fa-dribbble', 'value'=>'fa-dribbble'  ),
                    array('name'=>'fa-dropbox', 'value'=>'fa-dropbox'  ),
                    array('name'=>'fa-eject', 'value'=>'fa-eject'  ),
                    array('name'=>'fa-ellipsis-h', 'value'=>'fa-ellipsis-h'  ),
                    array('name'=>'fa-ellipsis-v', 'value'=>'fa-ellipsis-v'  ),
                    array('name'=>'fa-envelope', 'value'=>'fa-envelope'  ),
                    array('name'=>'fa-envelope-o', 'value'=>'fa-envelope-o'  ),
                    array('name'=>'fa-eraser', 'value'=>'fa-eraser'  ),
                    array('name'=>'fa-eur', 'value'=>'fa-eur'  ),
                    array('name'=>'fa-exchange', 'value'=>'fa-exchange'  ),
                    array('name'=>'fa-exclamation', 'value'=>'fa-exclamation'  ),
                    array('name'=>'fa-exclamation-circle', 'value'=>'fa-exclamation-circle'  ),
                    array('name'=>'fa-exclamation-triangle', 'value'=>'fa-exclamation-triangle'  ),
                    array('name'=>'fa-expand', 'value'=>'fa-expand'  ),
                    array('name'=>'fa-external-link', 'value'=>'fa-external-link'  ),
                    array('name'=>'fa-external-link-square', 'value'=>'fa-external-link-square'  ),
                    array('name'=>'fa-eye', 'value'=>'fa-eye'  ),
                    array('name'=>'fa-eye-slash', 'value'=>'fa-eye-slash'  ),
                    array('name'=>'fa-facebook', 'value'=>'fa-facebook'  ),
                    array('name'=>'fa-facebook-square', 'value'=>'fa-facebook-square'  ),
                    array('name'=>'fa-fast-backward', 'value'=>'fa-fast-backward'  ),
                    array('name'=>'fa-fast-forward', 'value'=>'fa-fast-forward'  ),
                    array('name'=>'fa-female', 'value'=>'fa-female'  ),
                    array('name'=>'fa-fighter-jet', 'value'=>'fa-fighter-jet'  ),
                    array('name'=>'fa-file', 'value'=>'fa-file'  ),
                    array('name'=>'fa-file-o', 'value'=>'fa-file-o'  ),
                    array('name'=>'fa-file-text', 'value'=>'fa-file-text'  ),
                    array('name'=>'fa-file-text-o', 'value'=>'fa-file-text-o'  ),
                    array('name'=>'fa-files-o', 'value'=>'fa-files-o'  ),
                    array('name'=>'fa-film', 'value'=>'fa-film'  ),
                    array('name'=>'fa-filter', 'value'=>'fa-filter'  ),
                    array('name'=>'fa-fire', 'value'=>'fa-fire'  ),
                    array('name'=>'fa-fire-extinguisher', 'value'=>'fa-fire-extinguisher'  ),
                    array('name'=>'fa-flag', 'value'=>'fa-flag'  ),
                    array('name'=>'fa-flag-checkered', 'value'=>'fa-flag-checkered'  ),
                    array('name'=>'fa-flag-o', 'value'=>'fa-flag-o'  ),
                    array('name'=>'fa-flask', 'value'=>'fa-flask'  ),
                    array('name'=>'fa-flickr', 'value'=>'fa-flickr'  ),
                    array('name'=>'fa-floppy-o', 'value'=>'fa-floppy-o'  ),
                    array('name'=>'fa-folder', 'value'=>'fa-folder'  ),
                    array('name'=>'fa-folder-o', 'value'=>'fa-folder-o'  ),
                    array('name'=>'fa-folder-open', 'value'=>'fa-folder-open'  ),
                    array('name'=>'fa-folder-open-o', 'value'=>'fa-folder-open-o'  ),
                    array('name'=>'fa-font', 'value'=>'fa-font'  ),
                    array('name'=>'fa-forward', 'value'=>'fa-forward'  ),
                    array('name'=>'fa-foursquare', 'value'=>'fa-foursquare'  ),
                    array('name'=>'fa-frown-o', 'value'=>'fa-frown-o'  ),
                    array('name'=>'fa-gamepad', 'value'=>'fa-gamepad'  ),
                    array('name'=>'fa-gavel', 'value'=>'fa-gavel'  ),
                    array('name'=>'fa-gbp', 'value'=>'fa-gbp'  ),
                    array('name'=>'fa-gift', 'value'=>'fa-gift'  ),
                    array('name'=>'fa-github', 'value'=>'fa-github'  ),
                    array('name'=>'fa-github-alt', 'value'=>'fa-github-alt'  ),
                    array('name'=>'fa-github-square', 'value'=>'fa-github-square'  ),
                    array('name'=>'fa-gittip', 'value'=>'fa-gittip'  ),
                    array('name'=>'fa-glass', 'value'=>'&#xf042; fa-glass'  ),
                    array('name'=>'fa-globe', 'value'=>'fa-globe'  ),
                    array('name'=>'fa-google-plus', 'value'=>'fa-google-plus'  ),
                    array('name'=>'fa-google-plus-square', 'value'=>'fa-google-plus-square'  ),
                    array('name'=>'fa-h-square', 'value'=>'fa-h-square'  ),
                    array('name'=>'fa-hand-o-down', 'value'=>'fa-hand-o-down'  ),
                    array('name'=>'fa-hand-o-left', 'value'=>'fa-hand-o-left'  ),
                    array('name'=>'fa-hand-o-right', 'value'=>'fa-hand-o-right'  ),
                    array('name'=>'fa-hand-o-up', 'value'=>'fa-hand-o-up'  ),
                    array('name'=>'fa-hdd-o', 'value'=>'fa-hdd-o'  ),
                    array('name'=>'fa-headphones', 'value'=>'fa-headphones'  ),
                    array('name'=>'fa-heart', 'value'=>'fa-heart'  ),
                    array('name'=>'fa-heart-o', 'value'=>'fa-heart-o'  ),
                    array('name'=>'fa-home', 'value'=>'fa-home'  ),
                    array('name'=>'fa-hospital-o', 'value'=>'fa-hospital-o'  ),
                    array('name'=>'fa-html5', 'value'=>'fa-html5'  ),
                    array('name'=>'fa-inbox', 'value'=>'fa-inbox'  ),
                    array('name'=>'fa-indent', 'value'=>'fa-indent'  ),
                    array('name'=>'fa-info', 'value'=>'fa-info'  ),
                    array('name'=>'fa-info-circle', 'value'=>'fa-info-circle'  ),
                    array('name'=>'fa-inr', 'value'=>'fa-inr'  ),
                    array('name'=>'fa-instagram', 'value'=>'fa-instagram'  ),
                    array('name'=>'fa-italic', 'value'=>'fa-italic'  ),
                    array('name'=>'fa-jpy', 'value'=>'fa-jpy'  ),
                    array('name'=>'fa-key', 'value'=>'fa-key'  ),
                    array('name'=>'fa-keyboard-o', 'value'=>'fa-keyboard-o'  ),
                    array('name'=>'fa-krw', 'value'=>'fa-krw'  ),
                    array('name'=>'fa-laptop', 'value'=>'fa-laptop'  ),
                    array('name'=>'fa-leaf', 'value'=>'fa-leaf'  ),
                    array('name'=>'fa-lemon-o', 'value'=>'fa-lemon-o'  ),
                    array('name'=>'fa-level-down', 'value'=>'fa-level-down'  ),
                    array('name'=>'fa-level-up', 'value'=>'fa-level-up'  ),
                    array('name'=>'fa-lightbulb-o', 'value'=>'fa-lightbulb-o'  ),
                    array('name'=>'fa-link', 'value'=>'fa-link'  ),
                    array('name'=>'fa-linkedin', 'value'=>'fa-linkedin'  ),
                    array('name'=>'fa-linkedin-square', 'value'=>'fa-linkedin-square'  ),
                    array('name'=>'fa-linux', 'value'=>'fa-linux'  ),
                    array('name'=>'fa-list', 'value'=>'fa-list'  ),
                    array('name'=>'fa-list-alt', 'value'=>'fa-list-alt'  ),
                    array('name'=>'fa-list-ol', 'value'=>'fa-list-ol'  ),
                    array('name'=>'fa-list-ul', 'value'=>'fa-list-ul'  ),
                    array('name'=>'fa-location-arrow', 'value'=>'fa-location-arrow'  ),
                    array('name'=>'fa-lock', 'value'=>'fa-lock'  ),
                    array('name'=>'fa-long-arrow-down', 'value'=>'fa-long-arrow-down'  ),
                    array('name'=>'fa-long-arrow-left', 'value'=>'fa-long-arrow-left'  ),
                    array('name'=>'fa-long-arrow-right', 'value'=>'fa-long-arrow-right'  ),
                    array('name'=>'fa-long-arrow-up', 'value'=>'fa-long-arrow-up'  ),
                    array('name'=>'fa-magic', 'value'=>'fa-magic'  ),
                    array('name'=>'fa-magnet', 'value'=>'fa-magnet'  ),
                    array('name'=>'fa-mail-reply-all', 'value'=>'fa-mail-reply-all'  ),
                    array('name'=>'fa-male', 'value'=>'fa-male'  ),
                    array('name'=>'fa-map-marker', 'value'=>'fa-map-marker'  ),
                    array('name'=>'fa-maxcdn', 'value'=>'fa-maxcdn'  ),
                    array('name'=>'fa-medkit', 'value'=>'fa-medkit'  ),
                    array('name'=>'fa-meh-o', 'value'=>'fa-meh-o'  ),
                    array('name'=>'fa-microphone', 'value'=>'fa-microphone'  ),
                    array('name'=>'fa-microphone-slash', 'value'=>'fa-microphone-slash'  ),
                    array('name'=>'fa-minus', 'value'=>'fa-minus'  ),
                    array('name'=>'fa-minus-circle', 'value'=>'fa-minus-circle'  ),
                    array('name'=>'fa-minus-square', 'value'=>'fa-minus-square'  ),
                    array('name'=>'fa-minus-square-o', 'value'=>'fa-minus-square-o'  ),
                    array('name'=>'fa-mobile', 'value'=>'fa-mobile'  ),
                    array('name'=>'fa-money', 'value'=>'fa-money'  ),
                    array('name'=>'fa-moon-o', 'value'=>'fa-moon-o'  ),
                    array('name'=>'fa-music', 'value'=>'fa-music'  ),
                    array('name'=>'fa-outdent', 'value'=>'fa-outdent'  ),
                    array('name'=>'fa-pagelines', 'value'=>'fa-pagelines'  ),
                    array('name'=>'fa-paperclip', 'value'=>'fa-paperclip'  ),
                    array('name'=>'fa-pause', 'value'=>'fa-pause'  ),
                    array('name'=>'fa-pencil', 'value'=>'fa-pencil'  ),
                    array('name'=>'fa-pencil-square', 'value'=>'fa-pencil-square'  ),
                    array('name'=>'fa-pencil-square-o', 'value'=>'fa-pencil-square-o'  ),
                    array('name'=>'fa-phone', 'value'=>'fa-phone'  ),
                    array('name'=>'fa-phone-square', 'value'=>'fa-phone-square'  ),
                    array('name'=>'fa-picture-o', 'value'=>'fa-picture-o'  ),
                    array('name'=>'fa-pinterest', 'value'=>'fa-pinterest'  ),
                    array('name'=>'fa-pinterest-square', 'value'=>'fa-pinterest-square'  ),
                    array('name'=>'fa-plane', 'value'=>'fa-plane'  ),
                    array('name'=>'fa-play', 'value'=>'fa-play'  ),
                    array('name'=>'fa-play-circle', 'value'=>'fa-play-circle'  ),
                    array('name'=>'fa-play-circle-o', 'value'=>'fa-play-circle-o'  ),
                    array('name'=>'fa-plus', 'value'=>'fa-plus'  ),
                    array('name'=>'fa-plus-circle', 'value'=>'fa-plus-circle'  ),
                    array('name'=>'fa-plus-square', 'value'=>'fa-plus-square'  ),
                    array('name'=>'fa-plus-square-o', 'value'=>'fa-plus-square-o'  ),
                    array('name'=>'fa-power-off', 'value'=>'fa-power-off'  ),
                    array('name'=>'fa-print', 'value'=>'fa-print'  ),
                    array('name'=>'fa-puzzle-piece', 'value'=>'fa-puzzle-piece'  ),
                    array('name'=>'fa-qrcode', 'value'=>'fa-qrcode'  ),
                    array('name'=>'fa-question', 'value'=>'fa-question'  ),
                    array('name'=>'fa-question-circle', 'value'=>'fa-question-circle'  ),
                    array('name'=>'fa-quote-left', 'value'=>'fa-quote-left'  ),
                    array('name'=>'fa-quote-right', 'value'=>'fa-quote-right'  ),
                    array('name'=>'fa-random', 'value'=>'fa-random'  ),
                    array('name'=>'fa-refresh', 'value'=>'fa-refresh'  ),
                    array('name'=>'fa-renren', 'value'=>'fa-renren'  ),
                    array('name'=>'fa-repeat', 'value'=>'fa-repeat'  ),
                    array('name'=>'fa-reply', 'value'=>'fa-reply'  ),
                    array('name'=>'fa-reply-all', 'value'=>'fa-reply-all'  ),
                    array('name'=>'fa-retweet', 'value'=>'fa-retweet'  ),
                    array('name'=>'fa-road', 'value'=>'fa-road'  ),
                    array('name'=>'fa-rocket', 'value'=>'fa-rocket'  ),
                    array('name'=>'fa-rss', 'value'=>'fa-rss'  ),
                    array('name'=>'fa-rss-square', 'value'=>'fa-rss-square'  ),
                    array('name'=>'fa-rub', 'value'=>'fa-rub'  ),
                    array('name'=>'fa-scissors', 'value'=>'fa-scissors'  ),
                    array('name'=>'fa-search', 'value'=>'fa-search'  ),
                    array('name'=>'fa-search-minus', 'value'=>'fa-search-minus'  ),
                    array('name'=>'fa-search-plus', 'value'=>'fa-search-plus'  ),
                    array('name'=>'fa-share', 'value'=>'fa-share'  ),
                    array('name'=>'fa-share-square', 'value'=>'fa-share-square'  ),
                    array('name'=>'fa-share-square-o', 'value'=>'fa-share-square-o'  ),
                    array('name'=>'fa-shield', 'value'=>'fa-shield'  ),
                    array('name'=>'fa-shopping-cart', 'value'=>'fa-shopping-cart'  ),
                    array('name'=>'fa-sign-in', 'value'=>'fa-sign-in'  ),
                    array('name'=>'fa-sign-out', 'value'=>'fa-sign-out'  ),
                    array('name'=>'fa-signal', 'value'=>'fa-signal'  ),
                    array('name'=>'fa-sitemap', 'value'=>'fa-sitemap'  ),
                    array('name'=>'fa-skype', 'value'=>'fa-skype'  ),
                    array('name'=>'fa-smile-o', 'value'=>'fa-smile-o'  ),
                    array('name'=>'fa-sort', 'value'=>'fa-sort'  ),
                    array('name'=>'fa-sort-alpha-asc', 'value'=>'fa-sort-alpha-asc'  ),
                    array('name'=>'fa-sort-alpha-desc', 'value'=>'fa-sort-alpha-desc'  ),
                    array('name'=>'fa-sort-amount-asc', 'value'=>'fa-sort-amount-asc'  ),
                    array('name'=>'fa-sort-amount-desc', 'value'=>'fa-sort-amount-desc'  ),
                    array('name'=>'fa-sort-asc', 'value'=>'fa-sort-asc'  ),
                    array('name'=>'fa-sort-desc', 'value'=>'fa-sort-desc'  ),
                    array('name'=>'fa-sort-numeric-asc', 'value'=>'fa-sort-numeric-asc'  ),
                    array('name'=>'fa-sort-numeric-desc', 'value'=>'fa-sort-numeric-desc'  ),
                    array('name'=>'fa-spinner', 'value'=>'fa-spinner'  ),
                    array('name'=>'fa-square', 'value'=>'fa-square'  ),
                    array('name'=>'fa-square-o', 'value'=>'fa-square-o'  ),
                    array('name'=>'fa-stack-exchange', 'value'=>'fa-stack-exchange'  ),
                    array('name'=>'fa-stack-overflow', 'value'=>'fa-stack-overflow'  ),
                    array('name'=>'fa-star', 'value'=>'fa-star'  ),
                    array('name'=>'fa-star-half', 'value'=>'fa-star-half'  ),
                    array('name'=>'fa-star-half-o', 'value'=>'fa-star-half-o'  ),
                    array('name'=>'fa-star-o', 'value'=>'fa-star-o'  ),
                    array('name'=>'fa-step-backward', 'value'=>'fa-step-backward'  ),
                    array('name'=>'fa-step-forward', 'value'=>'fa-step-forward'  ),
                    array('name'=>'fa-stethoscope', 'value'=>'fa-stethoscope'  ),
                    array('name'=>'fa-stop', 'value'=>'fa-stop'  ),
                    array('name'=>'fa-strikethrough', 'value'=>'fa-strikethrough'  ),
                    array('name'=>'fa-subscript', 'value'=>'fa-subscript'  ),
                    array('name'=>'fa-suitcase', 'value'=>'fa-suitcase'  ),
                    array('name'=>'fa-sun-o', 'value'=>'fa-sun-o'  ),
                    array('name'=>'fa-superscript', 'value'=>'fa-superscript'  ),
                    array('name'=>'fa-table', 'value'=>'fa-table'  ),
                    array('name'=>'fa-tablet', 'value'=>'fa-tablet'  ),
                    array('name'=>'fa-tachometer', 'value'=>'fa-tachometer'  ),
                    array('name'=>'fa-tag', 'value'=>'fa-tag'  ),
                    array('name'=>'fa-tags', 'value'=>'fa-tags'  ),
                    array('name'=>'fa-tasks', 'value'=>'fa-tasks'  ),
                    array('name'=>'fa-terminal', 'value'=>'fa-terminal'  ),
                    array('name'=>'fa-text-height', 'value'=>'fa-text-height'  ),
                    array('name'=>'fa-text-width', 'value'=>'fa-text-width'  ),
                    array('name'=>'fa-th', 'value'=>'fa-th'  ),
                    array('name'=>'fa-th-large', 'value'=>'fa-th-large'  ),
                    array('name'=>'fa-th-list', 'value'=>'fa-th-list'  ),
                    array('name'=>'fa-thumb-tack', 'value'=>'fa-thumb-tack'  ),
                    array('name'=>'fa-thumbs-down', 'value'=>'fa-thumbs-down'  ),
                    array('name'=>'fa-thumbs-o-down', 'value'=>'fa-thumbs-o-down'  ),
                    array('name'=>'fa-thumbs-o-up', 'value'=>'fa-thumbs-o-up'  ),
                    array('name'=>'fa-thumbs-up', 'value'=>'fa-thumbs-up'  ),
                    array('name'=>'fa-ticket', 'value'=>'fa-ticket'  ),
                    array('name'=>'fa-times', 'value'=>'fa-times'  ),
                    array('name'=>'fa-times-circle', 'value'=>'fa-times-circle'  ),
                    array('name'=>'fa-times-circle-o', 'value'=>'fa-times-circle-o'  ),
                    array('name'=>'fa-tint', 'value'=>'fa-tint'  ),
                    array('name'=>'fa-trash-o', 'value'=>'fa-trash-o'  ),
                    array('name'=>'fa-trello', 'value'=>'fa-trello'  ),
                    array('name'=>'fa-trophy', 'value'=>'fa-trophy'  ),
                    array('name'=>'fa-truck', 'value'=>'fa-truck'  ),
                    array('name'=>'fa-try', 'value'=>'fa-try'  ),
                    array('name'=>'fa-tumblr', 'value'=>'fa-tumblr'  ),
                    array('name'=>'fa-tumblr-square', 'value'=>'fa-tumblr-square'  ),
                    array('name'=>'fa-twitter', 'value'=>'fa-twitter'  ),
                    array('name'=>'fa-twitter-square', 'value'=>'fa-twitter-square'  ),
                    array('name'=>'fa-umbrella', 'value'=>'fa-umbrella'  ),
                    array('name'=>'fa-underline', 'value'=>'fa-underline'  ),
                    array('name'=>'fa-undo', 'value'=>'fa-undo'  ),
                    array('name'=>'fa-unlock', 'value'=>'fa-unlock'  ),
                    array('name'=>'fa-unlock-alt', 'value'=>'fa-unlock-alt'  ),
                    array('name'=>'fa-upload', 'value'=>'fa-upload'  ),
                    array('name'=>'fa-usd', 'value'=>'fa-usd'  ),
                    array('name'=>'fa-user', 'value'=>'fa-user'  ),
                    array('name'=>'fa-user-md', 'value'=>'fa-user-md'  ),
                    array('name'=>'fa-users', 'value'=>'fa-users'  ),
                    array('name'=>'fa-video-camera', 'value'=>'fa-video-camera'  ),
                    array('name'=>'fa-vimeo-square', 'value'=>'fa-vimeo-square'  ),
                    array('name'=>'fa-vk', 'value'=>'fa-vk'  ),
                    array('name'=>'fa-volume-down', 'value'=>'fa-volume-down'  ),
                    array('name'=>'fa-volume-off', 'value'=>'fa-volume-off'  ),
                    array('name'=>'fa-volume-up', 'value'=>'fa-volume-up'  ),
                    array('name'=>'fa-weibo', 'value'=>'fa-weibo'  ),
                    array('name'=>'fa-wheelchair', 'value'=>'fa-wheelchair'  ),
                    array('name'=>'fa-windows', 'value'=>'fa-windows'  ),
                    array('name'=>'fa-wrench', 'value'=>'fa-wrench'  ),
                    array('name'=>'fa-xing', 'value'=>'fa-xing'  ),
                    array('name'=>'fa-xing-square', 'value'=>'fa-xing-square'  ),
                    array('name'=>'fa-youtube', 'value'=>'fa-youtube'  ),
                    array('name'=>'fa-youtube-play', 'value'=>'fa-youtube-play'  ),
                    array('name'=>'fa-youtube-square', 'value'=>'fa-youtube-square'  ),
                )
            ),
            array(
                'name' => 'Animation Style',
                'id' => $prefix . 'service_animation',
                'type' => 'select',
                'options'=>array(
                    array("name"=>"No Animation","value"=>''),
                    array("name"=>"Animate from left","value"=>'animated animate-from-left'),
                    array("name"=>"Animate from right","value"=>'animated animate-from-right'),
                    array("name"=>"Animate from top","value"=>'animated animate-from-top'),
                    array("name"=>"Animate from bottom","value"=>'animated animate-from-bottom'),

                )
            ),
        )
    );
    return $meta_boxes;
}

add_filter('cmb_meta_boxes', 'sonnet_featured_icon_metaboxes');


// Initialize the metabox class
add_action('init', 'sonnet_initialize_cmb_meta_boxes', 9999);
function sonnet_initialize_cmb_meta_boxes()
{
    if (!class_exists('cmb_Meta_Box')) {
        require_once('libs/cmb/init.php');
    }
}

function sonnet_admin_load_scripts($hook)
{

    if ($hook != 'post.php' && $hook != 'post-new.php' && $hook != 'edit.php')
        return;

    wp_enqueue_script('custom-js', get_template_directory_uri() . "/js/sonnet-admin.js","2.1");
    wp_enqueue_style('fa-admin','//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
}

add_action('admin_enqueue_scripts', 'sonnet_admin_load_scripts');

/* Example */

function get_custom_posts($type, $limit = 20, $meta_order_key = "_sonnet_section_order", $order = "ASC")
{
    //wp_reset_postdata();
    $args = array(
        "posts_per_page" => $limit,
        "post_type" => $type,
        "orderby" => "meta_value_num",
        "order" => "ASC",
        "meta_key" => $meta_order_key
    );
    $custom_posts = get_posts($args);
//    echo "<pre>";
//    (print_r($custom_posts));
//    echo "</pre>";
    return $custom_posts;
}

function get_section_template($section_type)
{
    $sections = array(
        1 => "stories",
        2 => "features",
        3 => "portfolio",
        4 => "quote",
        5 => "aboutus",
        6 => "team",
        7 => "services",
        8 => "subscriptions",
        9 => "testimonials",
        10 => "pricing",
        11 => "clients",
        12 => "contact",
        13 => "news",
        14 => "banner",
        15 => "blank"
    );
    $template = $sections[$section_type];
    if ($template) return $template;
    return false;
}

function sonnet_connection_types()
{
    p2p_register_connection_type(array(
        'name' => 'page_to_sections',
        'from' => 'page',
        'to' => 'section'
    ));
}

add_action('p2p_init', 'sonnet_connection_types');


/**
 *  Attachments for Portfolio
 */

function sonnet_portfolio($attachments)
{
    $fields = array(
        array(
            'name' => 'title', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Title (optional)', 'attachments'), // label to display
        ),
        array(
            'name' => 'tags', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Comma separated tags (optional)', 'attachments'), // label to display
        ),

        array(
            'name' => 'class', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Class', 'attachments'), // label to display
        ),
    );

    $args = array(

        'label' => 'Portfolio Items',

        'post_type' => array('section'),

        'position' => 'advanced',

        'priority' => 'high',


        'filetype' => array("image"), // no filetype limit

        'append' => true,

        'button_text' => __('Attach Images', 'attachments'),

        'fields' => $fields,

    );



    $attachments->register('sonnet_portfolio', $args); // unique instance name
}

add_action('attachments_register', 'sonnet_portfolio');


function sonnet_clients($attachments)
{
    $fields = array(
        array(
            'name' => 'title', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Title', 'attachments'), // label to display
        ),
        array(
            'name' => 'link', // unique field name
            'type' => 'text', // registered field type
            'label' => __('External Link', 'attachments'), // label to display
        ),
        array(
            'name' => 'class', // unique style
            'type' => 'text', // registered field type
            'label' => 'Class', 'attachments')
    );

    $args = array(

        // title of the meta box (string)
        'label' => 'Client Logos',

        // all post types to utilize (string|array)
        'post_type' => array('section'),

        // meta box position (string) (normal, side or advanced)
        'position' => 'advanced',

        // meta box priority (string) (high, default, low, core)
        'priority' => 'high',

        'filetype' => array("image"), // no filetype limit

        'append' => true,

        // text for 'Attach' button in meta box (string)
        'button_text' => __('Attach Images', 'attachments'),

        'fields' => $fields,

    );


    $attachments->register('sonnet_clients', $args); // unique instance name
}

add_action('attachments_register', 'sonnet_clients');

/**
 * Add extra column for sections
 */

// ADD NEW COLUMN
function sonnet_section_columns_head($defaults)
{
    $new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['title'] = __('Title', 'column name');
    $new_columns['section_order'] = "Section Order";
    $new_columns['date'] = __('Date', 'column name');
    return $new_columns;
}

// SHOW THE FEATURED IMAGE
function sonnet_section_columns_content($column_name, $ID)
{
    if ($column_name == 'section_order') {
        $order = get_post_meta($ID, "_sonnet_section_order", true);
        if ($order) {
            echo "<input onkeyup='addSectionOrder(\"{$ID}\",this)' type='text' value='{$order}'/>";
        } else {
            echo 0;
        }
    }
}

add_action( 'wp_ajax_nopriv_sendmail', 'sendmail' );
add_action( 'wp_ajax_sendmail', 'sendmail' );
add_action( 'wp_ajax_orderchange', 'orderchange' );

function orderchange(){
    $id = $_POST['id'];
    $neworder = $_POST['order'];
    update_post_meta($id,"_sonnet_section_order",$neworder);
}

function sendmail(){
    global $sonnetwp;
    $receiver = $sonnetwp['contact_receiver'];
    $prefix = $sonnetwp['contact_subject_prefix'];
    $message = $sonnetwp['contact_message'];
    if(!$message) $message = "Your mesage was successfully sent";
    $headers = "From: {$_REQUEST['name']} <{$_REQUEST['email']}> \n";
    //print_r($_REQUEST);
    $res = wp_mail($receiver,$prefix.$_POST['subject'],$_POST['message'],$headers);
    echo $message;
    die();
}

add_filter('manage_section_posts_columns', 'sonnet_section_columns_head');
add_action('manage_section_posts_custom_column', 'sonnet_section_columns_content', 10, 2);

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/admin.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/admin.php' );
}

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'                  => 'Attachments', // The plugin name
            'slug'                  => 'attachments', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/attachments.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Visual Composer', // The plugin name
            'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/js_composer.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Manual Image Crop', // The plugin name
            'slug'                  => 'manual-image-crop', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/manual-image-crop.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Posts 2 Posts', // The plugin name
            'slug'                  => 'posts-to-posts', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/posts-to-posts.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Wordpress Importer', // The plugin name
            'slug'                  => 'wordpress-importer', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/wordpress-importer.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => 'Zilla Shortcodes', // The plugin name
            'slug'                  => 'zilla-shortcodes', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/zilla-shortcodes.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),


    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'sonnetwp';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );

    tgmpa( $plugins, $config );

}

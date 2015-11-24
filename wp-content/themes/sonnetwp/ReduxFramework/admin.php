<?php

/**
	ReduxFramework Sample Config File
	For full documentation, please visit http://reduxframework.com/docs/
**/


/**
 
	Most of your editing will be done in this section.

	Here you can override default values, uncomment args and change their values.
	No $args are required, but they can be overridden if needed.
	
**/
$args = array();


// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name'); 
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','redux-framework-demo' ), $ct->display('Name') );

?>
<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
	<?php if ( $screenshot ) : ?>
		<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
		<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
			<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
	<?php endif; ?>

	<h4>
		<?php echo $ct->display('Name'); ?>
	</h4>

	<div>
		<ul class="theme-info">
			<li><?php printf( __('By %s','redux-framework-demo'), $ct->display('Author') ); ?></li>
			<li><?php printf( __('Version %s','redux-framework-demo'), $ct->display('Version') ); ?></li>
			<li><?php echo '<strong>'.__('Tags', 'redux-framework-demo').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
		</ul>
		<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
		<?php if ( $ct->parent() ) {
			printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
				__( 'http://codex.wordpress.org/Child_Themes','redux-framework-demo' ),
				$ct->parent()->display( 'Name' ) );
		} ?>
		
	</div>

</div>

<?php
$item_info = ob_get_contents();
    
ob_end_clean();

$sampleHTML = '';
if( file_exists( dirname(__FILE__).'/info-html.html' )) {
	/** @global WP_Filesystem_Direct $wp_filesystem  */
	global $wp_filesystem;
	if (empty($wp_filesystem)) {
		require_once(ABSPATH .'/wp-admin/includes/file.php');
		WP_Filesystem();
	}  		
	$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
}

// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = true;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'sonnetwp';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = true;


// Set the icon for the system info tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['system_info_icon'] = 'info-sign';

// Set the class for the system info tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
//$args['system_info_icon_class'] = 'icon-large';

$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the starting tab for the option panel.
// Default: '0';
//$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
//$args['admin_stylesheet'] = 'standard';

// Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
    'link' => 'http://twitter.com/themebucket',
    'title' => 'Follow me on Twitter', 
    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
);
//$args['share_icons']['linked_in'] = array(
//    'link' => 'http://www.linkedin.com/profile/view?id=52559281',
//    'title' => 'Find me on LinkedIn',
//    'img' => ReduxFramework::$_url . 'assets/img/social/LinkedIn.png'
//);

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';


// Set a custom menu icon.
//$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('Sonnet Admin', 'redux-framework-demo');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('Options', 'redux-framework-demo');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'redux_options';

$args['default_show'] = true;
$args['default_mark'] = '*';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';

// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

// Set a custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';

// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
    
// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
$args['help_tabs'][] = array(
    'id' => 'redux-opts-1',
    'title' => __('Theme Information 1', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);
$args['help_tabs'][] = array(
    'id' => 'redux-opts-2',
    'title' => __('Theme Information 2', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);

// Set the help sidebar for the options page.                                        
$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');


// Add HTML before the form.
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	//$args['intro_text'] = sprintf( __('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
} else {
	$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
}

// Add content after the form.
$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo');

// Set footer/credit line.
//$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'redux-framework-demo');


$sections = array();              

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) :
	
  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
  	$sample_patterns = array();

    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
      	$name = explode(".", $sample_patterns_file);
      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
      }
    }
  endif;
endif;


$sections[] = array(
	'title' => __('Banner Settings', 'redux-framework-demo'),
//	'header' => __('Welcome to the Simple Options Framework Demo', 'redux-framework-demo'),
//	'desc' => __('Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at: <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>', 'redux-framework-demo'),
	'icon_class' => 'icon-large',
    'icon' => 'el-icon-home',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
	'fields' => array(
        array(
            'id'=>'theme_logo',
            'type' => 'media',
            'url'=> true,
            'preview'=> true,
            'title' => __('Logo', 'redux-framework-demo'),
//			'compiler' => 'true',
//			'desc'=> __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
            'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),
            'default'=>array('url'=>''),
        ),
		
		array(
			'id'=>'banner_file',
			'type' => 'media', 
			'url'=> true,
            'preview'=> true,
            'title' => __('Banner Image', 'redux-framework-demo'),
//			'compiler' => 'true',
//			'desc'=> __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
			'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),
			'default'=>array('url'=>''),
			),

        array(
            'id'=>'banner_text_1',
            'type' => 'text',
            'title' => __('Banner Text - First Line', 'redux-framework-demo'),
//            'subtitle' => __('Banner Text - First Line', 'redux-framework-demo'),
        ),
        array(
            'id'=>'banner_text_2',
            'type' => 'text',
            'title' => __('Banner Text - Second Line', 'redux-framework-demo'),
//            'subtitle' => __('Banner Text - Second Line', 'redux-framework-demo'),
        ),
        array(
            'id'=>'banner_text_3',
            'type' => 'text',
            'title' => __('Banner Text - Third Line', 'redux-framework-demo'),
//            'subtitle' => __('Banner Text - Third Line', 'redux-framework-demo'),
        ),
        array(
            'id'=>'button_text',
            'type' => 'text',
            'title' => __('Button Text', 'redux-framework-demo'),
        ),
		),
	);


$sections[] = array(
	'type' => 'divide',
);


$sections[] = array(
	'icon' => 'el-icon-cogs',
	'icon_class' => 'icon-large',
    'title' => __('Blog Settings', 'redux-framework-demo'),
	'fields' => array(
        array(
            'id'=>'blog_header_bg_color',
            'type' => 'color',
            'title' => __('Blog Header Background Color', 'redux-framework-demo'),
            'default'=>'#dd7bd0'
        ),

        array(
            'id'=>'blog_alternate_view',
            'type' => 'checkbox',
            'title' => __('Enable alternate colored posts in blog', 'redux-framework-demo'),
        ),
	)
);
$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('Contact Settings', 'redux-framework-demo'),
    'fields' => array(
        array(
            'id'=>'contact_receiver',
            'type' => 'text',
            'title' => __('Contact Mail Receiver', 'redux-framework-demo'),
            'default'=>'admin@yourdomain.com'
        ),
        array(
            'id'=>'contact_subject_prefix',
            'type' => 'text',
            'title' => __('Contact Form Subject Prefix', 'redux-framework-demo'),
            'default'=>'Contact: '
        ),
        array(
            'id'=>'contact_message',
            'type' => 'text',
            'title' => __('Contact form popup message', 'redux-framework-demo'),
            'default'=>'Your message was successfully sent'
        ),
    )
);

$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('404 Settings', 'redux-framework-demo'),
    'fields' => array(
        array(
            'id'=>'settings_404_heading',
            'type' => 'text',
            'title' => __('404  Title', 'redux-framework-demo'),
            'default'=>'Whoops'
        ),
        array(
            'id'=>'settings_404_subheading',
            'type' => 'text',
            'title' => __('404 Sub Title', 'redux-framework-demo'),
            'default'=>'BAD TRIP, MAN!'
        ),
        array(
            'id'=>'settings_404_text',
            'type' => 'text',
            'title' => __('404 Text', 'redux-framework-demo'),
            'default'=>'The page you are looking for doesn’t exit.'
        ),
    )
);

$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('Footer Settings', 'redux-framework-demo'),
    'fields' => array(
        array(
            'id'=>'footer_logo',
            'type' => 'media',
            'url'=> true,
            'preview'=> true,
            'title' => __('Footer Image/Logo', 'redux-framework-demo'),
//			'compiler' => 'true',
//			'desc'=> __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
            'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),
            'default'=>array('url'=>''),
        ),
        array(
            'id'=>'footer_text_left',
            'type' => 'editor',
            'title' => __('Left side footer text', 'redux-framework-demo'),
        ),
        array(
            'id'=>'footer_text_right',
            'type' => 'editor',
            'title' => __('Right side footer text', 'redux-framework-demo'),
        ),
    )
);

$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('Social Settings', 'redux-framework-demo'),
    'fields' => array(
        array(
            'id'=>'social_facebook',
            'type' => 'text',
            'title' => __('Facebook URL', 'redux-framework-demo'),
        ),
        array(
            'id'=>'social_github',
            'type' => 'text',
            'title' => __('Github URL', 'redux-framework-demo'),
        ),array(
            'id'=>'social_twitter',
            'type' => 'text',
            'title' => __('Twitter URL', 'redux-framework-demo'),
        ),array(
            'id'=>'social_pinterest',
            'type' => 'text',
            'title' => __('Pinterest URL', 'redux-framework-demo'),
        ),array(
            'id'=>'social_googleplus',
            'type' => 'text',
            'title' => __('GooglePlus URL', 'redux-framework-demo'),
        ),array(
            'id'=>'social_dribbble',
            'type' => 'text',
            'title' => __('Dribbble URL', 'redux-framework-demo'),
        ),array(
            'id'=>'social_flickr',
            'type' => 'text',
            'title' => __('Flickr URL', 'redux-framework-demo'),
        ),

    )
);

$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('Extra Settings', 'redux-framework-demo'),
    'fields' => array(
        array(
            'id'=>'sidebar_off',
            'type' => 'checkbox',
            'title' => __('Turn Sidebar Off', 'redux-framework-demo'),
        ),array(
            'id'=>'custom_css',
            'type' => 'textarea',
            'title' => __('Custom CSS, include &lt;style>&lt;/style> tag', 'redux-framework-demo'),
        ),
        array(
            'id'=>'google_analytics_code',
            'type' => 'textarea',
            'title' => __('Google analytics code to place in header, include &lt;script>&lt;/script> tag', 'redux-framework-demo'),
        ),
    )
);

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config







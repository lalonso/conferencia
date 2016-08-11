<?php
/**
 * Eventiz functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WpOpal
 * @subpackage Eventiz
 * @since Eventiz 1.0
 */
define( 'EVENTIZTHEME_VERSION', '1.0' );
define( 'PBR_THEME_URI', get_template_directory_uri() );
define( 'PBR_THEME_DIR', get_template_directory() );
define( 'PBR_THEME_TEMPLATE_DIR', PBR_THEME_URI.'page-templates/' );

/**
 * Set up the content width value based on the theme's design.
 *
 * @see eventiz_fnc_content_width()
 *
 * @since Eventiz 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Eventiz only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'eventiz_fnc_setup' ) ) :
/**
 * Eventiz setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Eventiz 1.0
 */
function eventiz_fnc_setup() {

	/*
	 * Make Eventiz available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Eventiz, use a find and
	 * replace to change 'eventiz' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'eventiz', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', eventiz_fnc_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );

	add_image_size( 'post-fullwidth', 1038, 9999, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Main menu', 'eventiz' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'eventiz_fnc_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	
	// add support for display browser title
	add_theme_support( 'title-tag' );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	eventiz_fnc_get_load_plugins();

}
endif; // eventiz_fnc_setup
add_action( 'after_setup_theme', 'eventiz_fnc_setup' );

/**
 * batch including all files in a path.
 *
 * @param String $path : PATH_DIR/*.php or PATH_DIR with $ifiles not empty
 */
function eventiz_pbr_includes( $path, $ifiles=array() ){

    if( !empty($ifiles) ){
         foreach( $ifiles as $key => $file ){
            $file  = $path.'/'.$file; 
            if(is_file($file)){
                require($file);
            }
         }   
    }else {
        $files = glob($path);
        foreach ($files as $key => $file) {
            if(is_file($file)){
                require($file);
            }
        }
    }
}

/**
 * Get Theme Option Value.
 * @param String $name : name of prameters 
 */
function eventiz_fnc_theme_options($name, $default = false) {
  
    // get the meta from the database
    $options = ( get_option( 'pbr_theme_options' ) ) ? get_option( 'pbr_theme_options' ) : null;

    
   
    // return the option if it exists
    if ( isset( $options[$name] ) ) {
        return apply_filters( 'pbr_theme_options_$name', $options[ $name ] );
    }
    if( get_option( $name ) ){
        return get_option( $name );
    }
    // return default if nothing else
    return apply_filters( 'pbr_theme_options_$name', $default );
}

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Eventiz 1.0
 */
function eventiz_fnc_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'eventiz_fnc_content_width' );


/**
 * Require function for including 3rd plugins
 *
 */
eventiz_pbr_includes(  get_template_directory() . '/inc/plugins/*.php' );

function eventiz_fnc_get_load_plugins(){

	$plugins[] =(array(
		'name'                     => 'MetaBox', // The plugin name
	    'slug'                    => 'meta-box', // The plugin slug (typically the folder name)
	    'required'                => true, // If false, the plugin is only 'recommended' instead of required
	));

	$plugins[] =(array(
		'name'                     => 'cmb2', // The plugin name
	    'slug'                    	=> 'cmb2', // The plugin slug (typically the folder name)
	    'required'                	=> true, // If false, the plugin is only 'recommended' instead of required
	));

	$plugins[] =(array(
		'name'                     	=> 'WooCommerce', // The plugin name
	    'slug'                    	=> "woocommerce", // The plugin slug (typically the folder name)
	    'required'                	=> true, // If false, the plugin is only 'recommended' instead of required
	));

	$plugins[] =(array(
		'name'                     	=> 'opalsingleevent', // The plugin name
	    'slug'                    	=> 'opalsingleevent', // The plugin slug (typically the folder name)
	    'required'                	=> true, // If false, the plugin is only 'recommended' instead of required
	    'source'				   	=> 'http://www.wpopal.com/thememods/opalsingleevent.zip'
	));


	$plugins[] =(array(
		'name'                     	=> 'MailChimp', // The plugin name
	    'slug'                    	=> 'mailchimp-for-wp', // The plugin slug (typically the folder name)
	    'required'                	=>  true
	));

	$plugins[] =(array(
		'name'                     	=> 'Contact Form 7', // The plugin name
	    'slug'                    	=> 'contact-form-7', // The plugin slug (typically the folder name)
	    'required'                	=> true, // If false, the plugin is only 'recommended' instead of required
	));

	$plugins[] =(array(
		'name'                     	=> 'WPBakery Visual Composer', // The plugin name
	    'slug'                    	=> "js_composer", // The plugin slug (typically the folder name)
	    'required'                	=> true,
	    'source'				   	=> 'http://www.wpopal.com/thememods/js_composer.zip' 
	));

	$plugins[] =(array(
		'name'                     	=> 'Revolution Slider', // The plugin name
        'slug'                   	=> "revslider", // The plugin slug (typically the folder name)
        'required'               	=> true ,
        'source'				   	=> 'http://www.wpopal.com/thememods/revslider.zip'
	));

	$plugins[] =(array(
		'name'                     	=> 'Wpopal Framework For Themes', // The plugin name
        'slug'                   	=> 'pbrthemer', // The plugin slug (typically the folder name)
        'required'               	=> true ,
        'source'				   	=>  'http://www.wpopal.com/themeframework/pbrthemer.zip'
	));


	$plugins[] =(array(
		'name'                     => 'Google Web Fonts Customizer', // The plugin name
        'slug'                   => 'google-web-fonts-customizer-gwfc', // The plugin slug (typically the folder name)
        'required'               => false ,
	));

	tgmpa( $plugins );
}

/**
 * Register three Eventiz widget areas.
 *
 * @since Eventiz 1.0
 */
function eventiz_fnc_registart_widgets_sidebars() {
	 
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Sidebar Default', 'eventiz' ),
		'id'            => 'sidebar-default',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Topbar' , 'eventiz'),
			'id'            => 'topbar',
			'description'   => esc_html__( 'Appears in the end of footer section of the site.', 'eventiz'),
			'before_widget' => '<aside id="%1$s" class="widget-footer clearfix %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title hide"><span>',
			'after_title'   => '</span></h3>',
		));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Newsletter' , 'eventiz'),
		'id'            => 'newsletter',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));
	
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Left Sidebar' , 'eventiz'),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style  clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));
	register_sidebar(
	array(
		'name'          => esc_html__( 'Right Sidebar' , 'eventiz'),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Blog Left Sidebar' , 'eventiz'),
		'id'            => 'blog-sidebar-left',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Blog Right Sidebar', 'eventiz'),
		'id'            => 'blog-sidebar-right',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));

	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 1' , 'eventiz'),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 2' , 'eventiz'),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 3' , 'eventiz'),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 4' , 'eventiz'),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'eventiz'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));
}
add_action( 'widgets_init', 'eventiz_fnc_registart_widgets_sidebars' );

/**
 * Register Lato Google font for Eventiz.
 *
 * @since Eventiz 1.0
 *
 * @return string
 */
function eventiz_fnc_font_url() {
	 
	$fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lora = _x( 'on', 'Hind font: on or off', 'eventiz' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'eventiz' );
 
    if ( 'off' !== $lora || 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $lora ) {
            $font_families[] = 'Playfair+Display:400,400italic,700italic,700';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Ubuntu:400,300,500,700';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 		
 		 
 		$protocol = is_ssl() ? 'https:' : 'http:';
        $fonts_url = add_query_arg( $query_args, $protocol .'//fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Eventiz 1.0
 */
function eventiz_fnc_scripts() {
	// Add Lato font, used in the main stylesheet
	wp_enqueue_style( 'eventiz-google-fonts', eventiz_fnc_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '3.0.3' );

	if(isset($_GET['pbr-skin']) && $_GET['pbr-skin']) {
		$currentSkin = $_GET['pbr-skin'];
	}else{
		$currentSkin = str_replace( '.css','', eventiz_fnc_theme_options('skin','default') );
	}
	if( is_rtl() ){
		if( !empty($currentSkin) && $currentSkin != 'default' ){ 
			wp_enqueue_style( 'eventiz-'.$currentSkin.'-style', get_template_directory_uri() . '/css/skins/rtl-'.$currentSkin.'/style.css' );
		}else {
			// Load our main stylesheet.
			wp_enqueue_style( 'eventiz-style', get_template_directory_uri() . '/css/rtl-style.css' );
		}
	}
	else {
		if( !empty($currentSkin) && $currentSkin != 'default' ){ 
			wp_enqueue_style( 'eventiz-'.$currentSkin.'-style', get_template_directory_uri() . '/css/skins/'.$currentSkin.'/style.css' );
		}else {
			// Load our main stylesheet.
			wp_enqueue_style( 'eventiz-style', get_template_directory_uri() . '/css/style.css' );
		}	
	}	
	

 	
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20130402' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

 
	wp_enqueue_script( 'functions-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.js', array( 'jquery' ), '20150315', true );

	wp_localize_script( 'functions-script', 'eventizAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

	wp_enqueue_script('prettyphoto-js', get_template_directory_uri().'/js/jquery.prettyPhoto.js');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css' );

}
add_action( 'wp_enqueue_scripts', 'eventiz_fnc_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Eventiz 1.0
 */
function eventiz_fnc_admin_fonts() {
	wp_enqueue_style( 'eventiz-admin-fonts', eventiz_fnc_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'eventiz_fnc_admin_fonts' );


/**
 * Implement rick meta box for post and page, custom post types. These 're used with metabox plugins
 */
if( is_admin() ){
	eventiz_pbr_includes(  get_template_directory() . '/inc/admin/function.php' );
	eventiz_pbr_includes(  get_template_directory() . '/inc/admin/metabox/*.php' );
}
eventiz_pbr_includes(  get_template_directory() . '/inc/classes/*.php' );
eventiz_pbr_includes(  get_template_directory() . '/inc/*.php' );
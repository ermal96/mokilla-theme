<?php
/**
 * Mokilla functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mokilla
 */

if ( ! function_exists( 'mokilla_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mokilla_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mokilla, use a find and replace
		 * to change 'mokilla' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mokilla', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-primary' => esc_html__( 'Primary Menu', 'mokilla' ),
			)
		);

		register_nav_menus(
			array(
				'menu-side' => esc_html__( 'Side Menu', 'mokilla' ),
			)
		);

		register_nav_menus(
			array(
				'menu-mini' => esc_html__( 'Mini Menu', 'mokilla' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mokilla_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'mokilla_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mokilla_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mokilla_content_width', 640 );
}

add_action( 'after_setup_theme', 'mokilla_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mokilla_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mokilla' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mokilla' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'mokilla_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mokilla_scripts() {
	wp_enqueue_style(
		'mokilla-style',
		get_stylesheet_uri(),
		array(),
		filemtime(get_template_directory() . '/style.css')
	);
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script(
		'mokilla-scripts',
		get_template_directory_uri() . '/js/side-menu.js',
		array(
			'jquery',
			'customize-preview'
		),
		filemtime(get_template_directory() .  '/js/side-menu.js'),
		true
	);
	wp_localize_script(
		'mokilla-scripts',
		'mkwpAjax',
		array(
			'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			'security' => wp_create_nonce( 'mkwp-special-string-for%ajax' ),
		)
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'mokilla_scripts' );

function mokilla_blocks_editor_style() {
	wp_register_style(
		'mokilla-blocks-editor-theme',
		get_template_directory_uri() . '/editor.css',
		array(),
		filemtime(get_template_directory() . '/editor.css')
	);
	wp_enqueue_style( 'mokilla-blocks-editor-theme' );
}

add_action( 'enqueue_block_editor_assets', 'mokilla_blocks_editor_style' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Security matters.
 */
add_filter( 'the_generator', '__return_empty_string' );

/**
 * Helpers.
 */
function mokilla_mime_types( $mimes ) {
	// add the possibility to upload svg via the media uploader.
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'mokilla_mime_types' );

if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/**
 * Development Helpers.
 */
/* HEARTBEAT SHUT DOWN!!! */
/* add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {
	wp_deregister_script('heartbeat');
} */

/* function id_WPSE_114111() {
	 $screen = get_current_screen();
    echo "<pre>";
    var_dump($screen);
	echo "</pre>";
 
}
add_action( 'admin_notices', 'id_WPSE_114111' ); */

function mokilla_modify_footer() {
	echo 'Engineered by <a href="mailto:v.serxhio@gmail.com">Serxhio Vrapi</a>';
}

add_filter( 'admin_footer_text', 'mokilla_modify_footer' );

/**
* Include classes with Composer.
*/
require_once 'vendor/autoload.php';
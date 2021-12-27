<?php
/**
 * Lee-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lee-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'lee_site_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lee_site_setup() {
		/*
		* Internal definitions.
		*/
		require_once get_parent_theme_file_path( '/inc/lee-theme-define.php' );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lee-theme, use a find and replace
		 * to change 'lee-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lee-theme', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'lee-theme' ),
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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'lee_site_custom_background_args',
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
add_action( 'after_setup_theme', 'lee_site_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lee_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lee_theme_content_width', 1200 );
}
add_action( 'after_setup_theme', 'lee_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lee_site_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lee-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lee-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lee_site_widgets_init' );

// add_action( 'admin_init', 'lee_theme_script' );

// function lee_theme_script() {
// 	wp_register_script(
// 		'lee-theme-script',
// 		get_template_directory_uri() . '/js/navigation.js',
// 		array( 'jquery' ),
// 		_S_VERSION,
// 		false
// 	);
// }


/**
 * Enqueue scripts and styles.
 */
function lee_site_scripts() {
	// Bootstrap
	wp_enqueue_style( 'lee-theme-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), _S_VERSION );

	// Theme styles.
	wp_enqueue_style( 'lee-theme-style', get_theme_file_uri( 'assets/css/style.css' ), array(), _S_VERSION );

	wp_enqueue_style( 'lee-theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Grechen+Fuemen&family=Lato:wght@400;700&family=Open+Sans&display=swap', array(), _S_VERSION, false );

	wp_enqueue_script( 'lee-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lee_site_scripts' );
/**
 * Enqueues styles for the block-based editor.
 */
function lee_theme_block_editor_scripts() {
	// Scripts.
	wp_enqueue_script( 'lee-theme-editor', get_theme_file_uri( './js/theme-editor.js' ), array( 'wp-blocks', 'wp-dom' ), _S_VERSION, true );
}
add_action( 'enqueue_block_editor_assets', 'lee_theme_block_editor_scripts' );

/**
 * Enqueues styles for the block-based editor.
 */
function lee_site_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'lee-site-editor-style', get_theme_file_uri( 'assets/css/editor.css' ), array(), _S_VERSION );
}
add_action( 'enqueue_block_editor_assets', 'lee_site_editor_styles' );

/**
 * Creating a function to create Project CPT
 */
function lee_theme_project_post_type() {
	// Set UI labels for Custom Post Type.
	$labels = array(
		'name'               => _x( 'Paintings', 'Post Type General Name', 'lee-theme' ),
		'singular_name'      => _x( 'Painting', 'Post Type Singular Name', 'lee-theme' ),
		'menu_name'          => __( 'Paintings', 'lee-theme' ),
		'parent_item_colon'  => __( 'Parent painting', 'lee-theme' ),
		'all_items'          => __( 'All paintings', 'lee-theme' ),
		'view_item'          => __( 'View painting', 'lee-theme' ),
		'add_new_item'       => __( 'Add New painting', 'lee-theme' ),
		'add_new'            => __( 'Add New', 'lee-theme' ),
		'edit_item'          => __( 'Edit painting', 'lee-theme' ),
		'update_item'        => __( 'Update painting', 'lee-theme' ),
		'search_items'       => __( 'Search paintings', 'lee-theme' ),
		'not_found'          => __( 'Not Found', 'lee-theme' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'lee-theme' ),
	);

	// Set other options for Custom Post Type.
	$args = array(
		'label'               => __( 'Paintings', 'lee-theme' ),
		'description'         => __( 'Paintings', 'lee-theme' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor.
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		// 'taxonomies'          => array( 'genres' ),

		/*
		* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 2,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
		'menu_icon'           => 'dashicons-art',
	);

	// Registering your Custom Post Type.
	register_post_type( 'paintings', $args );
}

/*
	*	Hook into the 'init' action so that the function
	* Containing our post type registration is not
	* unnecessarily executed.
	*/
add_action( 'init', 'lee_theme_project_post_type', 0 );

/**
 * These 2 filters and 1 function move the built in WordPress admin pages to
 * the top so they don't get pushed down the menu every time a new plugin is installed.
 * Activates the 'menu_order' filter and then hooks into 'menu_order'
 */
add_filter(
	'custom_menu_order',
	function() {
		return true;
	}
);
add_filter( 'menu_order', 'lee_theme_menu_order' );

/**
 * Filters WordPress' default menu order
 *
 * @param array $menu_order order of menu items.
 */
function lee_theme_menu_order( $menu_order ) {
	// define your new desired menu positions here
	// for example, move 'upload.php' to position #9 and built-in pages to position #1.
	$new_positions = array(
		'edit.php' => 5,  // Posts.
	);
	/**
	 * helper function to move an element inside an array.
	 */
	function move_element( &$array, $a, $b ) {
		$out = array_splice( $array, $a, 1 );
		array_splice( $array, $b, 0, $out );
	}
	// traverse through the new positions and move.
	// the items if found in the original menu_positions.
	foreach ( $new_positions as $value => $new_index ) {
		if ( array_search( $value, $menu_order, true ) === $current_index ) {
			move_element( $menu_order, $current_index, $new_index );
		}
	}
	return $menu_order;
};

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
 * Align wide and full support.
 */
add_theme_support( 'align-wide' );
add_theme_support( 'align-full' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



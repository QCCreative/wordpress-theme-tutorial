<?php
//* Functions to include scripts and styles

function demotheme_scripts_n_styles() {
	// Load our main stylesheet.
	wp_enqueue_style( 'demotheme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'demotheme_scripts_n_styles' );

//* Main Stylesheet (not for IE)
function no_ie_css(){ ?>
<!--[if (!IE)]> -->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri() . '?v=' . filemtime( get_stylesheet_directory() . '/style.css' ); ?>" />
<!-- <![endif]-->
<?php } 
add_action( 'wp_head', 'no_ie_css' );


function register_my_menu() {
  register_nav_menu('extra-header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'My Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

function exclude_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '-1,-1347' );
    }
}
add_action( 'pre_get_posts', 'exclude_category' );
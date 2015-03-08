<?php

add_action( 'init', 'create_custom_post_types' );
function create_custom_post_types() {
	register_post_type( 'gce_resource',
		array(
			'labels' => array(
				'name' => __( 'Resources' ),
				'singular_name' => __( 'Resource' )
			),
			'public' => true,
			'has_archive' => true,
			'supports'	=> array('title', 'editor', 'excerpt', 'thumbnail'),
			'rewrite' => array( 'slug' => 'resources', 'with_front' => false ),
		)
	);

	register_taxonomy(
		'gce_resource_category',
		'gce_resource',
		array(
			'label' => __( 'Resource Categories' ),
			'hierarchical' => true,
			'show_ui'=>true,
			'rewrite' => array(	'slug' => 'resource-categories', // This controls the base slug that will display before each term
					            'with_front' => false, // Don't display the category base before "/locations/"
					            'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
					        ),

		)
	);
}

add_theme_support('html5');

add_theme_support( 'genesis-footer-widgets', 4 );

add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'site-inner',
	'footer-widgets',
	'footer'
) );

//* Setup Theme CSS and JS
function gcebushing_scripts() {
	wp_enqueue_style('googlefonts', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700');
	wp_enqueue_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
}
add_action( 'wp', 'gcebushing_scripts' );

add_theme_support( 'post-thumbnails' );

function gce_site_title() {
	?>
	<a href="/" id="gcelogo">gce Engineering Systems: Bushings</a>
	<a id="gce-main-site" href="//www.gcebushing.com">Go to Main Site &raquo;</a>
	<?php
}

function custom_genesis_layout() {

	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_header', 'genesis_do_nav', 12 );

	remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
	add_action( 'genesis_footer', 'genesis_footer_widget_areas', 5 );

	remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
	remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
	add_action( 'genesis_site_title', 'gce_site_title' );
}
add_action( 'genesis_before', 'custom_genesis_layout' );




function single_post_featured_image() {	
	if ( ! is_singular( 'post' ) )
		return;
	
	$img = genesis_get_image( array( 'format' => 'html', 'size' => genesis_get_option( 'image_size' ), 'attr' => array( 'class' => 'post-image' ) ) );
	printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
}
add_action( 'genesis_entry_content', 'single_post_featured_image', 8 );

add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
if ( !is_page() ) {
	$post_info = '[post_date] [post_edit]';
	return $post_info;
}}

require_once( 'custom-fields.php' );

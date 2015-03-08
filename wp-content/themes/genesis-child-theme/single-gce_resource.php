<?php

function gce_resource_category_layout() {
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
}
add_action( 'genesis_before', 'gce_resource_category_layout' );

//* Add landing body class to the head
add_filter( 'body_class', 'gce_add_body_class' );
function gce_add_body_class( $classes ) {

	$classes[] = 'gce_resource';
	return $classes;

}

//* Run the Genesis loop
genesis();
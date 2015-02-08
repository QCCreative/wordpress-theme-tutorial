<?php
//* Functions to include scripts and styles

function demotheme_scripts_n_styles() {
	// Load our main stylesheet.
	wp_enqueue_style( 'demotheme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'demotheme_scripts_n_styles' );
<?php

if ( !function_exists( 'favicon_link' ) ) {

	function favicon_link() {
		echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
	}

}
add_action( 'wp_head', 'favicon_link' );

//[currentyear]
if ( !function_exists( 'currentyear_func' ) ) {

	function currentyear_func() {
		return date( 'Y' );
	}

}
add_shortcode( 'currentyear', 'currentyear_func' );

<?php 



function eventiz_google_fonts_customizer( $wp_customize ){

	$wp_customize -> add_section( 'typography_options', array(
		'title' => esc_html__( 'Typography Options', 'eventiz' ),
		'description' => esc_html__('Modify Fonts','eventiz'),
		'priority' => 6
	));
}
add_action( 'customize_register', 'eventiz_google_fonts_customizer' );
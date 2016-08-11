<?php

 /**
  * Register Woocommerce Vendor which will register list of shortcodes
  */
function eventiz_fnc_init_vc_vendors(){
	
	$vendor = new Eventiz_VC_News();
	add_action( 'vc_after_set_mode', array(
		$vendor,
		'load'
	), 99 );


	$vendor = new Eventiz_VC_Theme();
	add_action( 'vc_after_set_mode', array(
		$vendor,
		'load'
	), 99 );

	$vendor = new Eventiz_VC_Elements();
	add_action( 'vc_after_set_mode', array(
		$vendor,
		'load'
	), 99 );

	
}
add_action( 'after_setup_theme', 'eventiz_fnc_init_vc_vendors' , 99 );   

/**
 * Add parameters for row
 */
function eventiz_fnc_add_params(){

	/**
	*	Remove parameters for vc
	*/

	vc_remove_param('vc_tta_tour', 'style');
	vc_remove_param('vc_tta_tour', 'shape');
	vc_remove_param('vc_tta_tour', 'color');
	vc_remove_param('vc_tta_tour', 'spacing');
	vc_remove_param('vc_tta_tour', 'gap');
	vc_remove_param('vc_tta_tour', 'no_fill_content_area');
	vc_remove_param('vc_tta_tour', 'controls_size');
	vc_remove_param('vc_tta_tour', 'pagination_style');
	vc_remove_param('vc_tta_tour', 'pagination_color');
	vc_remove_param('vc_tta_tour', 'alignment');

	vc_add_param( 'vc_tta_tour', array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Style display", 'eventiz'),
	    "param_name" => "style_display",
	    "value" => array(
	        esc_html__('Default', 'eventiz') => 'default'
	    )
	));

 	/**
	 * add new params for row
	 */
	vc_add_param( 'vc_row', array(
	    "type" => "checkbox",
	    "heading" => esc_html__("Parallax", 'eventiz'),
	    "param_name" => "parallax",
	    "value" => array(
	        'Yes, please' => true
	    )
	));
	vc_add_param( 'vc_row', array(
	    "type" => "checkbox",
	    "heading" => esc_html__("Add wrapper inner", 'eventiz'),
	    "param_name" => "wrapper_inner",
	    "value" => array(
	        'Yes, please' => true
	    )
	));


	$row_class =  array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Background Styles', 'eventiz' ),
        'param_name' => 'bgstyle',
        'description'	=> esc_html__('Use Styles Supported In Theme, Select No Use For Customizing on Tab Design Options','eventiz'),
        'value' => array(
			esc_html__( 'No Use', 'eventiz' ) => '',
			esc_html__( 'Background Color Primary', 'eventiz' ) => 'bg-primary',
			esc_html__( 'Background Color Info', 'eventiz' ) 	  => 'bg-info',
			esc_html__( 'Background Color Danger', 'eventiz' )  => 'bg-danger',
			esc_html__( 'Background Color Warning', 'eventiz' ) => 'bg-warning',
			esc_html__( 'Background Color Success', 'eventiz' ) => 'bg-success',
			esc_html__( 'Background Color Theme', 'eventiz' )   => 'bg-theme',
		   esc_html__( 'Background  version 1', 'eventiz' )   => 'bg-style-v1',
		   esc_html__( 'Background  version 2', 'eventiz' )   => 'bg-style-v2',
		   esc_html__( 'Background  version 3', 'eventiz' )   => 'bg-style-v3',
        )
    ) ;

	vc_add_param( 'vc_row', $row_class );
	vc_add_param( 'vc_row_inner', $row_class );
 

	 vc_add_param( 'vc_row', array(
	     "type" => "dropdown",
	     "heading" => esc_html__("Is Boxed", 'eventiz'),
	     "param_name" => "isfullwidth",
	     "value" => array(
	     				esc_html__('Yes, Boxed', 'eventiz') => '1',
	     				esc_html__('No, Wide', 'eventiz') => '0'
	     			)
	));

	vc_add_param( 'vc_row', array(
	    "type" => "textfield",
	    "heading" => esc_html__("Icon", 'eventiz'),
	    "param_name" => "icon",
	    "value" => '',
		'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'eventiz' )
						. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
						. esc_html__( 'here to see the list, and use class icons-lg, icons-md, icons-sm to change its size', 'eventiz' ) . '</a>'
	));
	// add param for image elements

	 vc_add_param( 'vc_single_image', array(
	     "type" => "textarea",
	     "heading" => esc_html__("Image Description", 'eventiz'),
	     "param_name" => "description",
	     "value" => "",
	     'priority'	
	));
}
add_action( 'after_setup_theme', 'eventiz_fnc_add_params', 99 );
 
 /** 
  * Replace pagebuilder columns and rows class by bootstrap classes
  */
function eventiz_wpo_change_bootstrap_class( $class_string,$tag ){
 
	if ($tag=='vc_column' || $tag=='vc_column_inner') {
		$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
		$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
		$class_string = preg_replace('/vc_col-(\w)/', 'col-$1', $class_string);
		$class_string = str_replace('wpb_column', '', $class_string);
		$class_string = str_replace('vc_column_container', '', $class_string);
		$class_string = str_replace('column_container', '', $class_string);
	}
	return $class_string;
}

add_filter( 'vc_shortcodes_css_class', 'eventiz_wpo_change_bootstrap_class',10,2);


vc_add_shortcode_param('wpo_datepicker', 'eventiz_fnc_datepicker_settings_field', get_template_directory_uri().'/js/custom-admin.js');
function eventiz_fnc_datepicker_settings_field( $settings, $value ) {

	return '<div class="wpo_datetimepicker_block">'             
					.'<input id="input_datetime" name="' . esc_attr( $settings['param_name'] ) . '" class="input_datetime wpb_vc_param_value wpb-textinput ' .              
					esc_attr( $settings['param_name'] ) . ' ' .              
					esc_attr( $settings['type'] ) . '_field" type="text" value="' . esc_attr( $value ) . '" />
            </div>';
}

add_action( 'init', 'eventiz_fnc_date_picker' );
function eventiz_fnc_date_picker() {
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
}

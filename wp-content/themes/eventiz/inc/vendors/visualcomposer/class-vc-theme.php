<?php 

class Eventiz_VC_Theme implements Vc_Vendor_Interface {

	public function load(){
		/*********************************************************************************************************************
		 *  Vertical menu
		 *********************************************************************************************************************/
		$option_menu  = array(); 
		if( is_admin() ){
			$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
		    $option_menu = array('---Select Menu---'=>'');
		    foreach ($menus as $menu) {
		    	$option_menu[$menu->name]=$menu->term_id;
		    }
		}    
		vc_map( array(
		    "name" => esc_html__("PBR Quick Links Menu",'eventiz'),
		    "base" => "pbr_quicklinksmenu",
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    'description'	=> esc_html__( 'Show Quick Links To Access', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"value" => 'Quick To Go'
				),
		    	array(
					"type" => "dropdown",
					"heading" => esc_html__("Menu", 'eventiz'),
					"param_name" => "menu",
					"value" => $option_menu,
					"description" => esc_html__("Select menu.", 'eventiz')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));
		 
 
		/******************************
		 * Our Team
		 ******************************/
		vc_map( array(
		    "name" => esc_html__("PBR Our Team Grid Style",'eventiz'),
		    "base" => "pbr_team",
		    "class" => "",
		    "description" => 'Show Personal Profile Info',
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"value" => '',
						"admin_label" => true
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Photo", 'eventiz'),
					"param_name" => "photo",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Job", 'eventiz'),
					"param_name" => "job",
					"value" => 'CEO',
					'description'	=>  ''
				),

				array(
					"type" => "textarea",
					"heading" => esc_html__("information", 'eventiz'),
					"param_name" => "information",
					"value" => '',
					'description'	=> esc_html__('Allow  put html tags', 'eventiz')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Phone", 'eventiz'),
					"param_name" => "phone",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Google Plus", 'eventiz'),
					"param_name" => "google",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Facebook", 'eventiz'),
					"param_name" => "facebook",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Twitter", 'eventiz'),
					"param_name" => "twitter",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Pinterest", 'eventiz'),
					"param_name" => "pinterest",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Linked In", 'eventiz'),
					"param_name" => "linkedin",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'eventiz'),
					"param_name" => "style",
					'value' 	=> array( 'circle' => esc_html__('circle', 'eventiz'), 'vertical' => esc_html__('vertical', 'eventiz') , 'horizontal' => esc_html__('horizontal', 'eventiz') ),
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));
	 
		/******************************
		 * Our Team
		 ******************************/
		vc_map( array(
			"name" => esc_html__("PBR Our Team List Style",'eventiz'),
			"base" => "pbr_team_list",
			"class" => "",
			"description" => esc_html__('Show Info In List Style', 'eventiz'),
			"category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"value" => '',
						"admin_label" => true
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Photo", 'eventiz'),
					"param_name" => "photo",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Phone", 'eventiz'),
					"param_name" => "phone",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Job", 'eventiz'),
					"param_name" => "job",
					"value" => 'CEO',
					'description'	=>  ''
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__("Information", 'eventiz'),
					"param_name" => "content",
					"value" => '',
					'description'	=> esc_html__('Allow  put html tags', 'eventiz')
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__("Blockquote", 'eventiz'),
					"param_name" => "blockquote",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Email", 'eventiz'),
					"param_name" => "email",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Facebook", 'eventiz'),
					"param_name" => "facebook",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Twitter", 'eventiz'),
					"param_name" => "twitter",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Linked In", 'eventiz'),
					"param_name" => "linkedin",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'eventiz'),
					"param_name" => "style",
					'value' 	=> array( 'circle' => esc_html__('circle', 'eventiz'), 'vertical' => esc_html__('vertical', 'eventiz') , 'horizontal' => esc_html__('horizontal', 'eventiz') ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)

		   )
		));
	 
		/* Heading Text Block
		---------------------------------------------------------- */
		vc_map( array(
			'name'        => esc_html__( 'PBR Widget Heading','eventiz'),
			'base'        => 'pbr_title_heading',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'eventiz'),
			'description' => esc_html__( 'Create title for one Widget', 'eventiz' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Widget title', 'eventiz' ),
					'param_name' => 'title',
					'value'       => esc_html__( 'Title', 'eventiz' ),
					'description' => esc_html__( 'Enter heading title.', 'eventiz' ),
					"admin_label" => true
				),
				array(
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Title Color', 'eventiz' ),
				    'param_name' => 'font_color',
				    'description' => esc_html__( 'Select font color', 'eventiz' )
				),
				 
				array(
					"type" => "textarea",
					'heading' => esc_html__( 'Description', 'eventiz' ),
					"param_name" => "descript",
					"value" => '',
					'description' => esc_html__( 'Enter description for title.', 'eventiz' )
			    ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'eventiz' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
				)
			),
		));
		
		/* Heading Text Block
		---------------------------------------------------------- */
		vc_map( array(
			'name'        => esc_html__( 'PBR Banner CountDown','eventiz'),
			'base'        => 'pbr_banner_countdown',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'eventiz'),
			'description' => esc_html__( 'Show CountDown with banner', 'eventiz' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Widget title', 'eventiz' ),
					'param_name' => 'title',
					'value'       => esc_html__( 'Title', 'eventiz' ),
					'description' => esc_html__( 'Enter heading title.', 'eventiz' ),
					"admin_label" => true
				),

				array(
					"type" => "attach_image",
					"description" => esc_html__("If you upload an image, icon will not show.", 'eventiz'),
					"param_name" => "image",
					"value" => '',
					'heading'	=> esc_html__('Image', 'eventiz' )
				),

				array(
				    'type' => 'textfield',
				    'heading' => esc_html__( 'Date Expired', 'eventiz' ),
				    'param_name' => 'input_datetime',
				    'description' => esc_html__( 'Select font color', 'eventiz' ),
				),
				 
				array(
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Title Color', 'eventiz' ),
				    'param_name' => 'font_color',
				    'description' => esc_html__( 'Select font color', 'eventiz' ),
				    'class'	=> 'hacongtien'
				),
				 
				array(
					"type" => "textarea",
					'heading' => esc_html__( 'Description', 'eventiz' ),
					"param_name" => "descript",
					"value" => '',
					'description' => esc_html__( 'Enter description for title.', 'eventiz' )
			    ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'eventiz' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
				),


				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Text Link', 'eventiz' ),
					'param_name' => 'text_link',
					'value'		 => 'Find Out More',
					'description' => esc_html__( 'Enter your link text', 'eventiz' )
				),


				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Link', 'eventiz' ),
					'param_name' => 'link',
					'value'		 => 'http://',
					'description' => esc_html__( 'Enter your link to redirect', 'eventiz' )
				)
			),
		));

		/*------------------ Brands ----------------------------*/
		vc_map( array(
		    "name" => esc_html__("PBR Brands Carousel",'eventiz'),
		    "base" => "pbr_brands",
		    'description'=>'Show Brand Logos, Manufacture Logos',
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"value" => '',
				),

				array(
					"type" => "textarea",
					"heading" => esc_html__('Description', 'eventiz'),
					"param_name" => "descript",
					"value" => ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Number of brands to show", 'eventiz'),
					"param_name" => "number",
					"value" => '6'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns count', 'eventiz' ),
					'param_name' => 'columns_count',
					'value' => array(
						esc_html__( '2 Items', 'eventiz' ) => 2,
						esc_html__( '3 Items', 'eventiz' ) => 3,
						esc_html__( '4 Items', 'eventiz' ) => 4,
						esc_html__( '6 Items', 'eventiz' ) => 6,
					),
					'std' => 6
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));

		/*------------------ Brands Grid ----------------------------*/
		vc_map( array(
		    "name" => esc_html__("PBR Brands Grid",'eventiz'),
		    "base" => "pbr_brands_grid",
		    'description'=>'Show Brand Logos, Manufacture Logos',
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"value" => '',
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Number of brands to show", 'eventiz'),
					"param_name" => "number",
					"value" => '6'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Columns count', 'eventiz' ),
					'param_name' => 'columns_count',
					'value' => array(
						esc_html__('2 Items', 'eventiz' ) => 2,
						esc_html__('3 Items', 'eventiz' ) => 3,
						esc_html__('4 Items', 'eventiz' ) => 4,
						esc_html__('6 Items', 'eventiz' ) => 6,
					),
					'std' => 6
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));
	
	}
}
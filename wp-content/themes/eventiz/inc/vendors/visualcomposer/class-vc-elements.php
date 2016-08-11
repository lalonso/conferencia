<?php 

class Eventiz_VC_Elements implements Vc_Vendor_Interface {

	public function load(){ 
		
		/*********************************************************************************************************************
		 *  Our Service
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Featured Box",'eventiz'),
		    "base" => "pbr_featuredbox",
		
		    "description"=> esc_html__('Decreale Service Info', 'eventiz'),
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
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Title Color', 'eventiz' ),
				    'param_name' => 'title_color',
				    'description' => esc_html__( 'Select font color', 'eventiz' )
				),

		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Sub Title", 'eventiz'),
					"param_name" => "subtitle",
					"value" => '',
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Icon Position", 'eventiz'),
					"param_name" => "position",
					'value' 	=> array(
						esc_html__('Top Center', 'eventiz') => 'top-center', 
						esc_html__('Top Left', 'eventiz') => 'top-left', 
						esc_html__('Top Left v2', 'eventiz') => 'top-left v2',
						esc_html__('Top Left v3', 'eventiz') => 'top-left v3',
						esc_html__('Top Left v4', 'eventiz') => 'top-left v4',
						esc_html__('Top Right', 'eventiz') => 'top-right', 
						esc_html__('Right', 'eventiz') => 'right',  
					),
					'std' => ''
				),
			 	array(
					"type" => "textfield",
					"heading" => esc_html__("FontAwsome Icon", 'eventiz'),
					"param_name" => "icon",
					"value" => 'fa fa-gear',
					'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'eventiz' )
									. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
									. esc_html__( 'here to see the list', 'eventiz' ) . '</a>'
				),
				array(
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Icon Color', 'eventiz' ),
				    'param_name' => 'color',
				    'description' => esc_html__( 'Select font color', 'eventiz' )
				),	

				array(
					"type" => "attach_image",
					"heading" => esc_html__("Photo", 'eventiz'),
					"param_name" => "photo",
					"value" => '',
					'description'	=> ''
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Text style', 'eventiz' ),
					'param_name' => 'text_style',
					'value' => array(
						esc_html__( 'Dark', 'eventiz' ) => 'dark',
						esc_html__( 'Light', 'eventiz' ) => 'light-style',
					),
					'std' => 'nostyle',
				),

				array(
					"type" => "textarea",
					"heading" => esc_html__("information", 'eventiz'),
					"param_name" => "information",
					"value" => 'Your Description Here',
					'description'	=> esc_html__('Allow  put html tags', 'eventiz' )
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));
		 
	   /*********************************************************************************************************************
		* Pricing Table
		*********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Pricing",'eventiz'),
		    "base" => "pbr_pricing",
		    "description" => esc_html__('Make Plan for membership', 'eventiz' ),
		    "class" => "",
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
					"type" => "textfield",
					"heading" => esc_html__("Price", 'eventiz'),
					"param_name" => "price",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Currency", 'eventiz'),
					"param_name" => "currency",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Period", 'eventiz'),
					"param_name" => "period",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Subtitle", 'eventiz'),
					"param_name" => "subtitle",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Is Featured", 'eventiz'),
					"param_name" => "featured",
					'value' 	=> array(  esc_html__('No', 'eventiz') => 0,  esc_html__('Yes', 'eventiz') => 1 ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Skin", 'eventiz'),
					"param_name" => "skin",
					'value' 	=> array(  esc_html__('Skin 1', 'eventiz') => 'v1',  esc_html__('Skin 2', 'eventiz') => 'v2', esc_html__('Skin 3', 'eventiz') => 'v3' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Box Style", 'eventiz'),
					"param_name" => "style",
					'value' 	=> array( 'boxed' => esc_html__('Boxed', 'eventiz')),
				),

				array(
					"type" => "textarea_html",
					"heading" => esc_html__("Content", 'eventiz'),
					"param_name" => "content",
					"value" => '',
					'description'	=> esc_html__('Allow  put html tags', 'eventiz')
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Title", 'eventiz'),
					"param_name" => "linktitle",
					"value" => 'SignUp',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Link", 'eventiz'),
					"param_name" => "link",
					"value" => 'http://yourdomain.com',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   	)
		));
 		

 		/*********************************************************************************************************************
		 *  PBR Counter
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Counter",'eventiz'),
		    "base" => "pbr_counter",
		    "class" => "",
		    "description"=> esc_html__('Counting number with your term', 'eventiz'),
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"value" => '',
					"admin_label"	=> true
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__("Description", 'eventiz'),
					"param_name" => "description",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Number", 'eventiz'),
					"param_name" => "number",
					"value" => ''
				),

			 	array(
					"type" => "textfield",
					"heading" => esc_html__("FontAwsome Icon", 'eventiz'),
					"param_name" => "icon",
					"value" => '',
					'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'eventiz' )
									. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
									. esc_html__( 'here to see the list', 'eventiz' ) . '</a>'
				),

				array(
					"type" => "attach_image",
					"description" => esc_html__("If you upload an image, icon will not show.", 'eventiz'),
					"param_name" => "image",
					"value" => '',
					'heading'	=> esc_html__('Image', 'eventiz' )
				),

				array(
					"type" => "colorpicker",
					"heading" => esc_html__("Text Color", 'eventiz'),
					"param_name" => "text_color",
					'value' 	=> '',
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   	)
		));

			/**
			 * ------------ Heading -----------------------
			*/
			vc_map( array(
				'name'        => esc_html__( 'PBR Block Heading','eventiz'),
				'base'        => 'pbr_block_heading',
				"class"       => "",
				"category" => esc_html__('PBR Widgets', 'eventiz'),
				'description' => esc_html__( 'Create Block Heading with info + icon', 'eventiz' ),
				"params"      => array(
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Block Heading Title', 'eventiz' ),
						'param_name' => 'title',
						'value'       => '',
						'description' => esc_html__( 'Enter heading title.', 'eventiz' ),
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading'     => esc_html__( 'Sub Heading Title', 'eventiz' ),
						'param_name'  => 'subheading',
						'value'       => '',
						'description' => esc_html__( 'Enter Sub heading title.', 'eventiz' ),
						"admin_label" => true
					),
					array(
						"type" => "textarea_html",
						'heading' => esc_html__( 'Description', 'eventiz' ),
						"param_name" => "content",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'eventiz' )
				    ),
				 	array(
		               'type' => 'dropdown',
		               'heading' => esc_html__( 'Heading Style Version', 'eventiz' ),
		               'param_name' => 'heading_style',
		               'value' => array(
		                  esc_html__( 'Version 1', 'eventiz' ) => 'v1',
		                  esc_html__( 'Version 2', 'eventiz' ) => 'v2', 
		               )
		            ),
				 	array(
		               'type' => 'dropdown',
		               'heading' => esc_html__( 'Color Style', 'eventiz' ),
		               'param_name' => 'color_style',
		               'value' => array(
		                  esc_html__( 'Dark Style (Default)', 'eventiz' ) => '',
		                  esc_html__( 'Light Style', 'eventiz' ) => 'light-style',
		               )
		            ),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'eventiz' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
					)
				),
			));

		/**
		 * ------------ Countdown -----------------------
		*/
		vc_map( array(
			'name'        => esc_html__( 'PBR Block Countdown','eventiz'),
			'base'        => 'pbr_block_countdown',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'eventiz'),
			'description' => esc_html__( 'Create Block Countdown', 'eventiz' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Block Heading Title', 'eventiz' ),
					'param_name' => 'title',
					'value'       => '',
					'description' => esc_html__( 'Enter heading title.', 'eventiz' ),
					"admin_label" => true
				),
				array(
					'type' => 'wpo_datepicker',
					'heading'     => esc_html__( 'Date', 'eventiz' ),
					'param_name'  => 'date_comingsoon',
					'value'       => '',
					'description' => esc_html__( 'Enter Sub heading title.', 'eventiz' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Link title', 'eventiz' ),
					'param_name' => 'link_title',
					'value'       => '',
					'description' => esc_html__( 'Enter link title.', 'eventiz' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Link Url', 'eventiz' ),
					'param_name' => 'link_url',
					'value'       => '',
					'description' => esc_html__( 'Enter link url.', 'eventiz' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'eventiz' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
				)
			),
		)); 

		/**
		 * Block hover
		 */
		vc_map( array(
			'name'        => esc_html__( 'PBR Block Hover','eventiz'),
			'base'        => 'pbr_block_hover',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'eventiz'),
			'description' => esc_html__( 'Create Block Hover with info + image', 'eventiz' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Block Heading Title', 'eventiz' ),
					'param_name' => 'title',
					'value'       => '',
					'description' => esc_html__( 'Enter heading title.', 'eventiz' ),
					"admin_label" => true
				),
				array(
					"type" => "attach_image",
					'heading' => esc_html__( 'Icon', 'eventiz' ),
					"param_name" => "icon",
					"value" => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'icon font', 'eventiz' ),
					'param_name' => 'icon_font',
					'value'       => '',
					'description' => esc_html__( 'Icon font for block hover.', 'eventiz' ),
				),
				array(
					"type" => "textarea",
					'heading' => esc_html__( 'Content', 'eventiz' ),
					"param_name" => "content",
					"value" => '',
					'description' => esc_html__( 'Enter Content for block hover.', 'eventiz' )
			    ),
				array(
					"type" => "attach_image",
					'heading' => esc_html__( 'Image', 'eventiz' ),
					"param_name" => "photo",
					"value" => ''
			    ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Style display', 'eventiz'),
					'param_name' => 'style_class',
					'value' => array(esc_html__('default', 'eventiz')=> '', esc_html__('Style version 1', 'eventiz')=> 'style-1')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'eventiz' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
				)
			),
		));

		/**
		 * Call to action
		 */
		vc_map( array(
			'name'        => esc_html__( 'PBR Call to action','eventiz'),
			'base'        => 'pbr_cta',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'eventiz'),
			'description' => esc_html__( 'Create Block Call to action', 'eventiz' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title Top', 'eventiz' ),
					'param_name' => 'top_title',
					'value'       => '',
					'description' => esc_html__( 'Enter title top.', 'eventiz' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Block Heading Title', 'eventiz' ),
					'param_name' => 'title',
					'value'       => '',
					'description' => esc_html__( 'Enter heading title.', 'eventiz' ),
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Sub title', 'eventiz' ),
					"param_name" => "sub_title",
					"value" => '',
					'description' => esc_html__( 'Enter Sub title for block hover.', 'eventiz' )
			    ),
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Link Url', 'eventiz' ),
					"param_name" => "link_url",
					"value" => '',
				),
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Link Title', 'eventiz' ),
					"param_name" => "link_title",
					"value" => '',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Style display', 'eventiz'),
					'param_name'=> 'style',
					'value' => array(
						 esc_html__('Light style', 'eventiz') => 'light-style',
						esc_html__('Dark style', 'eventiz') => 'dark-style',
					),
					'std' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'eventiz' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
				)
			),
		));

		 /* Testimonials
		 **********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Testimonials Carousel",'eventiz'),
		    "base" => "pbr_testimonials_carousel",
		    'description'=> esc_html__('Play Testimonials In Carousel', 'eventiz'),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => '',
						"admin_label" => true
				),

		    	array(
	               'type' => 'dropdown',
	               'heading' => esc_html__( 'Title font size', 'eventiz' ),
	               'param_name' => 'size',
	               'value' => array(
	                    esc_html__( 'Large', 'eventiz' ) 		=> 'font-size-lg',
	                    esc_html__( 'Medium', 'eventiz' ) 		=> 'font-size-md',
	                    esc_html__( 'Small', 'eventiz' ) 		=> 'font-size-sm',
	                    esc_html__( 'Extra small', 'eventiz' ) => 'font-size-xs'
	                )
	            ),

	            array(
	                'type' => 'dropdown',
	                'heading' => esc_html__( 'Title Alignment', 'eventiz' ),
	                'param_name' => 'alignment',
	                'value' => array(
	                    esc_html__( 'Align left', 'eventiz' ) 		=> 'separator_align_left',
	                    esc_html__( 'Align center', 'eventiz' ) 	=> 'separator_align_center',
	                    esc_html__( 'Align right', 'eventiz' ) 	=> 'separator_align_right'
	                )
	            ),
	            array(
					"type" => "textfield",
					"heading" => esc_html__("Number", 'eventiz'),
					"param_name" => "number",
					"value" => '9',
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Columns", 'eventiz'),
					"param_name" => "columns",
					"value" => array(5, 4, 3, 2, 1),
					'std' => 3
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Skin", 'eventiz'),
					"param_name" => "skin",
					"value" => array(
						esc_html__('Style v1', 'eventiz')	=> 'v1',		
					),
					"admin_label" => true,
					"description" => esc_html__("Select Skin layout.", 'eventiz')
				),
				 array(
	                'type' => 'dropdown',
	                'heading' => esc_html__( 'Display Pagination', 'eventiz' ),
	                'param_name' => 'pagination',
	                'value' => array(
	                	esc_html__( 'Enable', 'eventiz' ) 	=> 'true',
	                  esc_html__( 'Disable', 'eventiz' ) 		=> 'false',
	                )
	            ),
				  array(
	                'type' => 'dropdown',
	                'heading' => esc_html__( 'Display Arrow', 'eventiz' ),
	                'param_name' => 'arrow',
	                'value' => array(
	                	esc_html__( 'Enable', 'eventiz' ) 	=> 'true',
	                  esc_html__( 'Disable', 'eventiz' ) 		=> 'false',
	                )
	            ),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));

		/* Accommodation
		**********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Contact Information",'eventiz'),
		    "base" => "pbr_contact_information",
		    'description'=> esc_html__('Diplay Contact information', 'eventiz'),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => '',
						"admin_label" => true
				),
				array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Content', 'eventiz' ),
                'param_name' => 'content',
                'value' => '',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Address', 'eventiz' ),
                'param_name' => 'address',
                'value' => '',
            ),
            array(
					"type" => "textfield",
					"heading" => esc_html__("Phone", 'eventiz'),
					"param_name" => "phone",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Email", 'eventiz'),
					"param_name" => "email",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));

		/* element coming soon
		***************************************************************************************************/ 
		vc_map( array(
			'name'        => esc_html__('PBR Coming soon','eventiz'),
			'base'        => 'pbr_coming_soon',
			"class"       => "",
			"style" 	  	  => "",
			"category"    => esc_html__('PBR Widgets', 'eventiz'),
			'description' => esc_html__('Create Element Coming soon', 'eventiz' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'eventiz' ),
					'param_name' => 'title',
					'value'       => esc_html__('', 'eventiz' ),
					'description' => esc_html__('Enter heading title.', 'eventiz' ),
					"admin_label" => true
				),
				array(
				    'type' => 'wpo_datepicker',
				    'heading' => esc_html__('Date coming soon', 'eventiz' ),
				    'param_name' => 'date_comingsoon',
				    'description' => esc_html__('Enter Date Coming soon', 'eventiz' )
				),
				array(
					"type" => "textarea",
					'heading' => esc_html__('Description', 'eventiz' ),
					"param_name" => "description",
					"value" => '',
					'description' => esc_html__('Enter description for title.', 'eventiz' )
			    ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Extra class name', 'eventiz' ),
					'param_name' => 'el_class',
					'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'eventiz'),
					"param_name" => "style",
					'value' 	=> array( 
						'style 1' => esc_html__('countdown-v1', 'eventiz'), 
						'style 2' => esc_html__('countdown-v2', 'eventiz') ),
				)
			),
		));

		/* speakers
		***************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Speakers Carousel",'eventiz'),
		    "base" => "pbr_speakers",
		    'description'=> esc_html__('Diplay Speakers Carousel', 'eventiz'),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => '',
						"admin_label" => true
				),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Number', 'eventiz' ),
                'param_name' => 'number',
                'value' => '',
            ),
            array(
					"type" => "dropdown",
					"heading" => esc_html__("Columns", 'eventiz'),
					"param_name" => "columns",
					"value" => array(6, 5, 4, 3, 2),
			),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));

		/* speakers
		***************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Speakers Grid",'eventiz'),
		    "base" => "pbr_speakers_grid",
		    'description'=> esc_html__('Diplay Speakers Grid', 'eventiz'),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => '',
						"admin_label" => true
				),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Number', 'eventiz' ),
                'param_name' => 'number',
                'value' => '',
            ),
            array(
					"type" => "dropdown",
					"heading" => esc_html__("Columns", 'eventiz'),
					"param_name" => "columns",
					"value" => array(6, 5, 4, 3, 2),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style Display", 'eventiz'),
					"param_name" => "style",
					"value" => array(
						esc_html__('Style Default', 'eventiz') => 'style-default',
						esc_html__('Style version 2', 'eventiz') => 'style-2'
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));

		/* Twitter
		***************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Twitter",'eventiz'),
		    "base" => "pbr_twitter",
		    'description'=> esc_html__('Diplay Twitter', 'eventiz'),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => ''
				),
				
	            array(
	                'type' => 'textfield',
	                'heading' => esc_html__( 'Twitter widget id', 'eventiz' ),
	                'param_name' => 'twidget_id',
	                'value' => '681414676190605312',
	                'description'	=> esc_html__( 'Please go to the page https://twitter.com/settings/widgets/new, then create a widget, and get data-widget-id to input in this param.', 'eventiz' )
	            ),
	            array(
					"type" => "textfield",
					"heading" => esc_html__( 'Number', 'eventiz'),
					"param_name" => "number",
					"description" => esc_html__( 'If the param is empty or equal 0, the widget will show scrollbar when more items. Or you can input number from 1-20. Default NULL.', 'eventiz'),
					"value" => '2',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Username', 'eventiz'),
					"param_name" => "username",
					"value" => 'wordpress',
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( 'Border Color', 'eventiz'),
					"param_name" => "border_color",
					"value" => '',
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( 'Link Color', 'eventiz'),
					"param_name" => "link_color",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Width', 'eventiz'),
					"param_name" => "width",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Height', 'eventiz'),
					"param_name" => "height",
					"value" => '',
				),
				array(
					"type" => "checkbox",
					"heading" => esc_html__( 'Show Replies', 'eventiz'),
					"param_name" => "show_replies",
					"value" => '1',
				),
				array(
					"type" => "checkbox",
					"heading" => esc_html__( 'Show Header', 'eventiz'),
					"param_name" => "show_header",
					"value" => '0',
				),
				array(
					"type" => "checkbox",
					"heading" => esc_html__( 'Show Footer', 'eventiz'),
					"param_name" => "show_footer",
					"value" => '0',
				),
				array(
					"type" => "checkbox",
					"heading" => esc_html__( 'Show Border', 'eventiz'),
					"param_name" => "show_border",
					"value" => '0',
				),
				array(
					"type" => "checkbox",
					"heading" => esc_html__( 'Show scrollbar', 'eventiz'),
					"param_name" => "show_scrollbar",
					"value" => '1',
				),


				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));
	
		/* Gallery
		***************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Gallery",'eventiz'),
		    "base" => "pbr_gallery",
		    'description'=> esc_html__('Diplay Gallery Grid', 'eventiz'),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'eventiz'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => '',
						"admin_label" => true
				),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Number', 'eventiz' ),
                'param_name' => 'number',
                'value' => '',
            ),
            array(
					"type" => "dropdown",
					"heading" => esc_html__("Columns", 'eventiz'),
					"param_name" => "columns",
					"value" => array(6, 4, 3, 1),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'eventiz'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
				)
		   )
		));

		vc_map( array(
	    	"name" => esc_html__("PBR Sponsors",'eventiz'),
	    	"base" => "pbr_sponsors",
	    	'description'=> esc_html__('Diplay Sponsors', 'eventiz'),
	    	"category" => esc_html__('PBR Widgets', 'eventiz'),
	    	"params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'eventiz'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => '',
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Photo", 'eventiz'),
					"param_name" => "image",
					"value" => '',
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__("content", 'eventiz'),
					"param_name" => "content",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Website", 'eventiz'),
					"param_name" => "link",
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
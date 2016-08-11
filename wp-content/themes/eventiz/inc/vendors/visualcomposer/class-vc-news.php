<?php 
class Eventiz_VC_News implements Vc_Vendor_Interface  {
	
	public function load(){
		 
		$newssupported = true; 
 
			/**********************************************************************************
			 * Front Page Posts
			 **********************************************************************************/

			/****/
			vc_map( array(
				'name' => esc_html__( '(News) Categories Tab Post', 'eventiz' ),
				'base' => 'pbr_categorytabpost',
				'icon' => 'icon-wpb-application-icon-large',
				"category" => esc_html__('PBR News', 'eventiz'),
				'description' => esc_html__( 'Create Post having blog styles', 'eventiz' ),
				 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'eventiz' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'eventiz' ),
						"admin_label" => true
					),
					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'eventiz' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'eventiz' )
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Number Main Posts", 'eventiz'),
						"param_name" => "num_mainpost",
						"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
						"std" => 1
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'eventiz' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'eventiz' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'eventiz' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
					)
				)
			) );
			

			$layout_image = array(
				esc_html__('Grid', 'eventiz')             => 'grid-1',
				esc_html__('List', 'eventiz')             => 'list-1',
				esc_html__('List not image', 'eventiz')   => 'list-2',
			);
			
			vc_map( array(
				'name' => esc_html__( '(News) Grid Posts', 'eventiz' ),
				'base' => 'pbr_gridposts',
				'icon' => 'icon-wpb-news-2',
				"category" => esc_html__('PBR News', 'eventiz'),
				'description' => esc_html__( 'Post having news,managzine style', 'eventiz' ),
			 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'eventiz' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'eventiz' ),
						"admin_label" => true
					),
					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'eventiz' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'eventiz' )
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Show Pagination Links', 'eventiz' ),
						'param_name' => 'show_pagination',
						'description' => esc_html__( 'Enables to show paginations to next new page.', 'eventiz' ),
						'value' => array( esc_html__( 'Yes, please', 'eventiz' ) => 'yes' )
					),

					array(
						"type" => "dropdown",
						"heading" => esc_html__("Grid Columns", 'eventiz'),
						"param_name" => "grid_columns",
						"value" => array( 1 , 2 , 3 , 4 , 6),
						"std" => 3
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'eventiz' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'eventiz' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'eventiz' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
					)
				)
			));

			//-----------------------
			vc_map( array(
				'name' => esc_html__( 'PBR List Posts', 'eventiz' ),
				'base' => 'pbr_listposts',
				'icon' => 'icon-wpb-news-2',
				"category" => esc_html__('PBR News', 'eventiz'),
				'description' => esc_html__( 'Post having news,managzine style', 'eventiz' ),
			 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'eventiz' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'eventiz' ),
						"admin_label" => true
					),
					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'eventiz' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'eventiz' )
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Show Pagination Links', 'eventiz' ),
						'param_name' => 'show_pagination',
						'description' => esc_html__( 'Enables to show paginations to next new page.', 'eventiz' ),
						'value' => array( esc_html__( 'Yes, please', 'eventiz' ) => 'yes' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'eventiz' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'eventiz' )
					),
					array(
 						'type' 		=> 'dropdown',
 						'heading'	=> esc_html__('Layout display', 'eventiz'),
 						'param_name'	=> 'layout',
 						'value'		=> array(esc_html__('Style v1 (no image)','eventiz')=> 'single-v1', esc_html__('Style v2','eventiz')=>'_single-v2')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'eventiz' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
					)
				)
			) );
		 

			/**********************************************************************************
			 * Slideshow Post Widget Gets
			 **********************************************************************************/
				vc_map( array(
					'name' => esc_html__( '(News) Slideshow Post', 'eventiz' ),
					'base' => 'pbr_slideshopbrst',
					'icon' => 'icon-wpb-news-slideshow',
					"category" => esc_html__('PBR News', 'eventiz'),
					'description' => esc_html__( 'Play Posts In slideshow', 'eventiz' ),
					 
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Widget title', 'eventiz' ),
							'param_name' => 'title',
							'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'eventiz' ),
							"admin_label" => true
						),
						array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Heading Description', 'eventiz' ),
							'param_name' => 'descript',
							"value" => ''
						),

						array(
							'type' => 'loop',
							'heading' => esc_html__( 'Grids content', 'eventiz' ),
							'param_name' => 'loop',
							'settings' => array(
								'size' => array( 'hidden' => false, 'value' => 10 ),
								'order_by' => array( 'value' => 'date' ),
							),
							'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'eventiz' )
						),

						array(
							"type" => "dropdown",
							"heading" => esc_html__("Layout", 'eventiz' ),
							"param_name" => "layout",
							"value" => array( esc_html__('Default Style', 'eventiz' ) => 'blog'  ,  esc_html__('Special Style 1', 'eventiz' ) => 'style1' ,  esc_html__('Special Style 2', 'eventiz' ) => 'style2' ),
							"std" => 3
						),

						array(
							"type" => "dropdown",
							"heading" => esc_html__("Grid Columns", 'eventiz'),
							"param_name" => "grid_columns",
							"value" => array( 1 , 2 , 3 , 4 , 6),
							"std" => 3
						),
						array(
							'type' => 'checkbox',
							'heading' => esc_html__( 'Show Pagination Links', 'eventiz' ),
							'param_name' => 'show_pagination',
							'description' => esc_html__( 'Enables to show paginations to next new page.', 'eventiz' ),
							'value' => array( esc_html__( 'Yes, please', 'eventiz' ) => 'yes' )
						),

						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Thumbnail size', 'eventiz' ),
							'param_name' => 'thumbsize',
							'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'eventiz' )
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Extra class name', 'eventiz' ),
							'param_name' => 'el_class',
							'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
						)
					)
			));

			//-------------- PBR Stick posts ---------
			vc_map( array(
				'name' => esc_html__( 'PBR Stick Posts', 'eventiz' ),
				'base' => 'pbr_stickposts',
				'icon' => 'icon-wpb-news-2',
				"category" => esc_html__('PBR News', 'eventiz'),
				'description' => esc_html__( 'Post having news, managzine style', 'eventiz' ),
			 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'eventiz' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'eventiz' ),
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Sub title', 'eventiz' ),
						'param_name' => 'subtitle',
						'description' => esc_html__( 'Enter text which will be used as widget sub title. Leave blank if no title is needed.', 'eventiz' ),
					),
					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'eventiz' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'eventiz' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'eventiz' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'eventiz' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'eventiz' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'eventiz' )
					)
				)
			) );
 
	}
}
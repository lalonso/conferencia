<?php 
if( class_exists("WPBakeryShortCode") ){
	/**
	 * Class Eventiz_VC_Woocommerces
	 *
	 */
	class Eventiz_VC_Woocommerce  implements Vc_Vendor_Interface  {

		/**
		 * register and mapping shortcodes
		 */
		 
		public function product_category_field_search( $search_string ) {
			$data = array();
			$vc_taxonomies_types = array('product_cat');
			$vc_taxonomies = get_terms( $vc_taxonomies_types, array(
				'hide_empty' => false,
				'search' => $search_string
			) );
			if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
				foreach ( $vc_taxonomies as $t ) {
					if ( is_object( $t ) ) {
						$data[] = vc_get_term_object( $t );
					}
				}
			}
			return $data;
		}
		

		public function product_category_render($query) {  
			$category = get_term_by('id', (int)$query['value'], 'product_cat');
			if ( ! empty( $query ) && !empty($category)) {
				$data = array();
				$data['value'] = $category->term_id;
				$data['label'] = $category->name;
				return ! empty( $data ) ? $data : false;
			}
			return false;
		}

		/**
		 * register and mapping shortcodes
		 */
		public function load(){  

			$shortcodes = array( 'pbr_categoriestabs', 'pbr_products', 'pbr_products_collection' ); 

			foreach( $shortcodes as $shortcode ){
				add_filter( 'vc_autocomplete_'. $shortcode .'_categories_callback', array($this, 'product_category_field_search'), 10, 1 );
			 	add_filter( 'vc_autocomplete_'. $shortcode .'_categories_render', array($this, 'product_category_render'), 10, 1 );
			}


			$order_by_values = array(
				'',
				esc_html__( 'Date', 'eventiz' ) => 'date',
				esc_html__( 'ID', 'eventiz' ) => 'ID',
				esc_html__( 'Author', 'eventiz' ) => 'author',
				esc_html__( 'Title', 'eventiz' ) => 'title',
				esc_html__( 'Modified', 'eventiz' ) => 'modified',
				esc_html__( 'Random', 'eventiz' ) => 'rand',
				esc_html__( 'Comment count', 'eventiz' ) => 'comment_count',
				esc_html__( 'Menu order', 'eventiz' ) => 'menu_order',
			);

			$order_way_values = array(
				'',
				esc_html__( 'Descending', 'eventiz' ) => 'DESC',
				esc_html__( 'Ascending', 'eventiz' ) => 'ASC',
			);
			$product_categories_dropdown = array(''=> esc_html__('None', 'eventiz') );
			$block_styles = eventiz_fnc_get_widget_block_styles();
			
			$product_columns_deal = array(1, 2, 3, 4);

			if( is_admin() ){
					$args = array(
						'type' => 'post',
						'child_of' => 0,
						'parent' => '',
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false,
						'hierarchical' => 1,
						'exclude' => '',
						'include' => '',
						'number' => '',
						'taxonomy' => 'product_cat',
						'pad_counts' => false,

					);

					$categories = get_categories( $args );
					eventiz_fnc_woocommerce_getcategorychilds( 0, 0, $categories, 0, $product_categories_dropdown );
					
			}
		    vc_map( array(
		        "name" => esc_html__("PBR Product Deals",'eventiz'),
		        "base" => "pbr_product_deals",
		        "class" => "",
		    	"category" => esc_html__('PBR Woocommerce','eventiz'),
		    	'description'	=> esc_html__( 'Display Product Sales with Count Down', 'eventiz' ),
		        "params" => array(
		            array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Title','eventiz'),
		                "param_name" => "title",
		            ),

		             array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),

		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Extra class name", 'eventiz'),
		                "param_name" => "el_class",
		                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
		            ),
		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Number items to show", 'eventiz'),
		                "param_name" => "number",
		                'std' => '1',
		                "description" => esc_html__("", 'eventiz')
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Columns count",'eventiz'),
		                "param_name" => "columns_count",
		                "value" => $product_columns_deal,
		                'std' => '2',
		                "description" => esc_html__("Select columns count.",'eventiz')
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Layout",'eventiz'),
		                "param_name" => "layout",
		                "value" => array(esc_html__('Carousel', 'eventiz') => 'carousel', esc_html__('Grid', 'eventiz') =>'grid' ),
		                "admin_label" => true,
		                "description" => esc_html__("Select columns count.",'eventiz')
		            )
		        )
		    ));
		   

			vc_map( array(
		        "name" => esc_html__("PBR Timing Deals",'eventiz'),
		        "base" => "pbr_timing_deals",
		        "class" => "",
		    	"category" => esc_html__('PBR Woocommerce','eventiz'),
		    	'description'	=> esc_html__( 'Display Product Sales with Count Down', 'eventiz' ),
		        "params" => array(
		            array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Title','eventiz'),
		                "param_name" => "title",
		                "admin_label" => true
		            ),
		             array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),
		             array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Desciption','eventiz'),
		                "param_name" => "description",
		                "admin_label" => false
		            ),
		             array(
					    'type' => 'textfield',
					    'heading' => esc_html__( 'End Date', 'eventiz' ),
					    'param_name' => 'input_datetime',
					    'description' => esc_html__( 'Enter Date Count down', 'eventiz' ),
					    "value" => ""

					),
		             array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Columns count",'eventiz'),
		                "param_name" => "columns_count",
		                "value" => array(6,5,4,3,2,1),
		                "admin_label" => false,
		                "description" => esc_html__("Select columns count.",'eventiz')
		            ),

		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Extra class name", 'eventiz'),
		                "param_name" => "el_class",
		                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
		            )

		            
		        )
		    ));
	 
		    //// 
		    vc_map( array(
		        "name" => esc_html__( "PBR Products On Sale", 'eventiz' ),
		        "base" => "pbr_products_onsale",
		        "class" => "",
		    	"category" => esc_html__( 'PBR Woocommerce', 'eventiz' ),
		    	'description'	=> esc_html__( 'Display Products Sales With Pagination', 'eventiz' ),
		        "params" => array(
		            array(
		                "type" 		  => "textfield",
		                "class" 	  => "",
		                "heading" 	  => esc_html__( 'Title','eventiz' ),
		                "param_name"  => "title",
		                "admin_label" => true
		            ),
		             array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),
		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Number items to show", 'eventiz'),
		                "param_name" => "number",
		                'std' => '9',
		                "description" => esc_html__("", 'eventiz'),
		                  "admin_label" => true
		            ),
		             array(
		                "type" 		  => "dropdown",
		                "heading" 	  => esc_html__( "Columns count",'eventiz' ),
		                "param_name"  => "columns_count",
		                "value" 	  => array(6,5,4,3,2,1),
		                "admin_label" => false,
		                "description" => esc_html__( "Select columns count.",'eventiz' )
		            ),

		            array(
		                "type" 		  => "textfield",
		                "heading" 	  => esc_html__( "Extra class name", 'eventiz' ),
		                "param_name"  => "el_class",
		                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'eventiz')
		            )
		        )
		    ));
		  
			/**
			 * pbr_productcategory
			 */
		 

			$product_layout = array('Grid'=>'grid','List'=>'list','Carousel'=>'carousel', 'Special'=>'special', 'List-v1' => 'list-v1');
			$product_type = array('Best Selling'=>'best_selling','Featured Products'=>'featured_product','Top Rate'=>'top_rate','Recent Products'=>'recent_product','On Sale'=>'on_sale','Recent Review' => 'recent_review' );
			$product_columns = array(6 ,5 ,4 , 3, 2, 1);
			$show_tab = array(
			                array('recent', esc_html__('Latest Products', 'eventiz')),
			                array( 'featured_product', esc_html__('Featured Products', 'eventiz' )),
			                array('best_selling', esc_html__('BestSeller Products', 'eventiz' )),
			                array('top_rate', esc_html__('TopRated Products', 'eventiz' )),
			                array('on_sale', esc_html__('Special Products', 'eventiz' ))
			            );

			vc_map( array(
			    "name" => esc_html__("PBR Product Category",'eventiz'),
			    "base" => "pbr_productcategory",
			    "class" => "",
			 "category" => esc_html__('PBR Woocommerce','eventiz'),
			     'description'=> esc_html__( 'Show Products In Carousel, Grid, List, Special','eventiz' ), 
			    "params" => array(
			    	array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__('Title', 'eventiz'),
						"param_name" => "title",
						"value" =>''
					),
					 array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),
			    	array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__('Category', 'eventiz'),
						"param_name" => "category",
						"value" => $product_categories_dropdown,
						"admin_label" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style",'eventiz'),
						"param_name" => "style",
						"value" => $product_layout
					),
					array(
						"type"        => "attach_image",
						"description" => esc_html__("Upload an image for categories", 'eventiz'),
						"param_name"  => "image_cat",
						"value"       => '',
						'heading'     => esc_html__('Image', 'eventiz' )
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number of products to show",'eventiz'),
						"param_name" => "number",
						"value" => '4'
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Columns count",'eventiz'),
						"param_name" => "columns_count",
						"value" => array(6, 5, 4, 3, 2, 1),
						"admin_label" => true,
						"description" => esc_html__("Select columns count.",'eventiz')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Icon",'eventiz'),
						"param_name" => "icon"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Block Styles",'eventiz'),
						"param_name" => "block_style",
						"value" => $block_styles,
						"admin_label" => true,
						"description" => esc_html__("Select columns count.",'eventiz')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name",'eventiz'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'eventiz')
					)
			   	)
			));
			 
			vc_map( array(
			    "name" => esc_html__("PBR Products Category Index",'eventiz'),
			    "base" => "pbr_productcategory_index",
			    "class" => "",
				 "category" => esc_html__('PBR Woocommerce','eventiz'),
			     'description'=> esc_html__( 'Show Products In Carousel, Grid, List, Special','eventiz' ), 
			    "params" => array(
			    	array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__('Title', 'eventiz'),
						"param_name" => "title",
						"value" =>''
					),

					 array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),
			    	array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__('Category', 'eventiz'),
						"param_name" => "category",
						"value" => $product_categories_dropdown,
						"admin_label" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style",'eventiz'),
						"param_name" => "style",
						"value" => $product_layout
					),
					array(
						"type"        => "attach_image",
						"description" => esc_html__("Upload an image for categories", 'eventiz'),
						"param_name"  => "image_cat",
						"value"       => '',
						'heading'     => esc_html__('Image', 'eventiz' )
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number of products to show",'eventiz'),
						"param_name" => "number",
						"value" => '4'
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Columns count",'eventiz'),
						"param_name" => "columns_count",
						"value" => array(6, 5, 4, 3, 2, 1),
						"admin_label" => true,
						"description" => esc_html__("Select columns count.",'eventiz')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Block Styles",'eventiz'),
						"param_name" => "block_style",
						"value" => $block_styles,
						"admin_label" => true,
						"description" => esc_html__("Select columns count.",'eventiz')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Icon",'eventiz'),
						"param_name" => "icon",
						'value'	=> 'fa-gear'
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name",'eventiz'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'eventiz')
					)
			   	)
			));
			 
			/**
			* pbr_category_filter
			*/
		 
	 

			/**
			 * pbr_products
			 */
		 
			/**
			 * pbr_all_products
			 */
		 
			vc_map( array(
				"name"     => esc_html__("PBR Product Categories List",'eventiz'),
				"base"     => "pbr_category_list",
				"class"    => "",
				"category" => esc_html__('PBR Woocommerce','eventiz'),
				'description' => esc_html__( 'Show Categories as menu Links', 'eventiz' ),
				"params"   => array(
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__('Title', 'eventiz'),
					"param_name" => "title",
					"value"      => '',
				),
				 array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Show post counts', 'eventiz' ),
					'param_name' => 'show_count',
					'description' => esc_html__( 'Enables show count total product of category.', 'eventiz' ),
					'value' => array( esc_html__( 'Yes, please', 'eventiz' ) => 'yes' )
				),
				array(
					"type"       => "checkbox",
					"heading"    => esc_html__("show children of the current category",'eventiz'),
					"param_name" => "show_children",
					'description' => esc_html__( 'Enables show children of the current category.', 'eventiz' ),
					'value' => array( esc_html__( 'Yes, please', 'eventiz' ) => 'yes' )
				),
				array(
					"type"       => "checkbox",
					"heading"    => esc_html__("Show dropdown children of the current category ",'eventiz'),
					"param_name" => "show_dropdown",
					'description' => esc_html__( 'Enables show dropdown children of the current category.', 'eventiz' ),
					'value' => array( esc_html__( 'Yes, please', 'eventiz' ) => 'yes' )
				),

				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Extra class name",'eventiz'),
					"param_name"  => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'eventiz')
				)
		   	)
		));
	 


		/**
		 * pbr_all_products
		 */
		 
		vc_map( array(
				'name' => esc_html__( 'PBR Product categories ', 'eventiz' ),
				'base' => 'pbr_special_product_categories',
				'icon' => 'icon-wpb-woocommerce',
				'category' => esc_html__( 'PBR Woocommerce', 'eventiz' ),
				'description' => esc_html__( 'Display product categories in carousel and sub categories', 'eventiz' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Per page', 'eventiz' ),
						'value' => 12,
						'param_name' => 'per_page',
						'description' => esc_html__( 'How much items per page to show', 'eventiz' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Columns', 'eventiz' ),
						'value' => 4,
						'param_name' => 'columns',
						'description' => esc_html__( 'How much columns grid', 'eventiz' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'eventiz' ),
						'param_name' => 'orderby',
						'value' => $order_by_values,
						'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'eventiz' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order way', 'eventiz' ),
						'param_name' => 'order',
						'value' => $order_way_values,
						'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'eventiz' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Category', 'eventiz' ),
						'value' => $product_categories_dropdown,
						'param_name' => 'category',
						"admin_label" => true,
						'description' => esc_html__( 'Product category list', 'eventiz' ),
					),
				)
			) );
	
		/**
		 * pbr_productcats_tabs
		 */
		$sortby = array(
            array('recent_product', esc_html__('Latest Products', 'eventiz')),
            array('featured_product', esc_html__('Featured Products', 'eventiz' )),
            array('best_selling', esc_html__('BestSeller Products', 'eventiz' )),
            array('top_rate', esc_html__('TopRated Products', 'eventiz' )),
            array('on_sale', esc_html__('Special Products', 'eventiz' )),
            array('recent_review', esc_html__('Recent Products Reviewed', 'eventiz' ))
        );
        $layout_type = array(
        	esc_html__('Carousel', 'eventiz') => 'carousel',
        	esc_html__('Grid', 'eventiz') => 'grid'
    	);
	


		/**
		 * pbr_productcats_tabs
		 */
		vc_map( array(
				'name' => esc_html__( 'Product Categories Tabs ', 'eventiz' ),
				'base' => 'pbr_productcats_tabs',
				'icon' => 'icon-wpb-woocommerce',
				'category' => esc_html__( 'PBR Woocommerce', 'eventiz' ),
				'description' => esc_html__( 'Display product categories in carousel and sub categories', 'eventiz' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Per page', 'eventiz' ),
						'value' => 12,
						'param_name' => 'per_page',
						'description' => esc_html__( 'How much items per page to show', 'eventiz' ),
					),
					array(
						"type"        => "attach_image",
						"description" => esc_html__("Upload an image for categories (190px x 190px)", 'eventiz'),
						"param_name"  => "image_cat",
						"value"       => '',
						'heading'     => esc_html__('Image', 'eventiz' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Columns', 'eventiz' ),
						'value' => 3,
						'param_name' => 'columns',
						'description' => esc_html__( 'How much columns grid', 'eventiz' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'eventiz' ),
						'param_name' => 'orderby',
						'std' => 'date',
						'value' => $order_by_values,
						'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'eventiz' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order way', 'eventiz' ),
						'param_name' => 'order',
						'std' => 'DESC',
						'value' => $order_way_values,
						'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'eventiz' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Category', 'eventiz' ),
						'value' => $product_categories_dropdown,
						"admin_label" => true,
						'param_name' => 'category',
						'description' => esc_html__( 'Product category list', 'eventiz' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Layout Type', 'eventiz' ),
						'param_name' => 'layout_type',
						'std' => 'carousel',
						'value' => $layout_type,
						'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'eventiz' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
					),
				)
			) );
		 
		/**
		 * pbr_productcats_normal
		 */

		vc_map( array(
				'name' => esc_html__( 'Product Categories Style 1 ', 'eventiz' ),
				'base' => 'pbr_productcats_normal',
				'icon' => 'icon-wpb-woocommerce',
				'category' => esc_html__( 'PBR Woocommerce', 'eventiz' ),
				'description' => esc_html__( 'Display product categories in carousel and sub categories', 'eventiz' ),

				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Per page', 'eventiz' ),
						'value' => 12,
						'param_name' => 'per_page',
						'description' => esc_html__( 'How much items per page to show', 'eventiz' ),
						
					),
					array(
						"type"        => "attach_image",
						"description" => esc_html__("Upload an image for categories (190px x 190px)", 'eventiz'),
						"param_name"  => "image_cat",
						"value"       => '',
						'heading'     => esc_html__('Image', 'eventiz' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Image Float', 'eventiz' ),
						'param_name' => 'image_float',
						'value' => array( esc_html__('Left','eventiz') =>'pull-left', esc_html__('Right','eventiz') =>'pull-right' ),
						'description' =>  esc_html__( 'Display banner image on left or right', 'eventiz' ),
						'std' => 'pull-left'
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Columns', 'eventiz' ),
						'value' => 3,
						'param_name' => 'columns',
						'description' => esc_html__( 'How much columns grid', 'eventiz' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'eventiz' ),
						'param_name' => 'orderby',
						'value' => $order_by_values,
						'std' => 'date',
						'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'eventiz' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order way', 'eventiz' ),
						'param_name' => 'order',
						'value' => $order_way_values,
						'std' => 'DESC',
						'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'eventiz' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Category', 'eventiz' ),
						'value' => $product_categories_dropdown,
						'param_name' => 'category',
						'description' => esc_html__( 'Product category list', 'eventiz' ),'admin_label'	=> true
					),
					array(
					"type"        => "textfield",
					"heading"     => esc_html__("Extra class name",'eventiz'),
					"param_name"  => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'eventiz')
				)
				)
			) );
			
			vc_map( array(
			    "name" => esc_html__("PBR Products Collection",'eventiz'),
			    "base" => "pbr_products_collection",
			    'description'=> esc_html__( 'Show products as bestseller, featured in block', 'eventiz' ),
			    "class" => "",
			   	"category" => esc_html__('PBR Woocommerce','eventiz'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title",'eventiz'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => ''
					),
					 array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),
					array(
					    'type' => 'autocomplete',
					    'heading' => esc_html__( 'Categories', 'eventiz' ),
					    'value' => '',
					    'param_name' => 'categories',
					    "admin_label" => true,
					    'description' => esc_html__( 'Select Categories', 'eventiz' ),
					    'settings' => array(
					     'multiple' => true,
					     'unique_values' => true,
					     // In UI show results except selected. NB! You should manually check values in backend
					    ),
				   	),
			    	array(
						"type" => "dropdown",
						"heading" => esc_html__("Type",'eventiz'),
						"param_name" => "type",
						"value" => $product_type,
						"admin_label" => true,
						"description" => esc_html__("Select columns count.",'eventiz')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Number Main Posts", 'eventiz'),
						"param_name" => "num_mainpost",
						"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
						"std" => 1
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Columns count",'eventiz'),
						"param_name" => "columns_count",
						"value" => $product_columns,
						"admin_label" => true,
						"description" => esc_html__("Select columns count.",'eventiz')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number of products to show",'eventiz'),
						"param_name" => "number",
						"value" => '4'
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name",'eventiz'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'eventiz')
					)
			   	)
			));

			//Woocommerce ticket
			vc_map( array(
			    "name" => esc_html__("PBR Ticket Grid",'eventiz'),
			    "base" => "pbr_ticket_grid",
			    'description'=> esc_html__( 'Show tickets grid in block', 'eventiz' ),
			    "class" => "",
			    "category" => esc_html__('PBR Woocommerce','eventiz'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title",'eventiz'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => ''
					),
					 array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title','eventiz'),
		                "param_name" => "subtitle",
		            ),
					array(
					    'type' => 'autocomplete',
					    'heading' => esc_html__( 'Categories', 'eventiz' ),
					    'value' => '',
					    'param_name' => 'categories',
					    "admin_label" => true,
					    'description' => esc_html__( 'Select Categories', 'eventiz' ),
					    'settings' => array(
					     'multiple' => true,
					     'unique_values' => true,
					    ),
				   	),
			    	array(
						"type" => "dropdown",
						"heading" => esc_html__("Type",'eventiz'),
						"param_name" => "type",
						"value" => $product_type,
						"admin_label" => true,
						"description" => esc_html__("Select tickets type.",'eventiz')
					),
					array(
						"type" => "dropdown",
						"heading"	=> esc_html__("Order", 'eventiz'),
						"param_name"	=> 'order',
						"value" => array(
							'DESC' => 'DESC', 'ASC' => 'ASC'
						),
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Columns count",'eventiz'),
						"param_name" => "columns_count",
						"value" => $product_columns,
						"admin_label" => true,
						"description" => esc_html__("Select columns count.",'eventiz')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number of products to show",'eventiz'),
						"param_name" => "number",
						"value" => '4'
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name",'eventiz'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'eventiz')
					)
			   )
			));

		}
	}	

	/**
	  * Register Woocommerce Vendor which will register list of shortcodes
	  */
	function eventiz_fnc_init_vc_woocommerce_vendor(){

		$vendor = new Eventiz_VC_Woocommerce();
		add_action( 'vc_after_set_mode', array(
			$vendor,
			'load'
		) );

	}
	add_action( 'after_setup_theme', 'eventiz_fnc_init_vc_woocommerce_vendor' , 9 );   
}		
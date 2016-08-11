<?php  
 
eventiz_pbr_includes( vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php') );

class WPBakeryShortCode_PBR_Listposts extends WPBakeryShortCode_VC_Posts_Grid {

}
class WPBakeryShortCode_PBR_Gridposts extends WPBakeryShortCode_VC_Posts_Grid {

}
class WPBakeryShortCode_PBR_Frontpageposts extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_PBR_Frontpageposts2 extends WPBakeryShortCode_VC_Posts_Grid {

}


class WPBakeryShortCode_PBR_Frontpageposts3 extends WPBakeryShortCode_VC_Posts_Grid {

}


 class WPBakeryShortCode_PBR_Frontpageposts4 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_PBR_Frontpageposts9 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_PBR_Frontpageposts12 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_PBR_Frontpageposts13 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_PBR_Frontpageposts14 extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_PBR_StickPosts extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_PBR_block_heading extends WPBakeryShortCode{

}
class WPBakeryShortCode_PBR_block_countdown extends WPBakeryShortCode{

}
//class WPBakeryShortCode_PBR_brands extends WPBakeryShortCode{
//
//}
class WPBakeryShortCode_PBR_brands_grid extends WPBakeryShortCode{

}
class WPBakeryShortCode_PBR_Counter extends WPBakeryShortCode {

	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->jsCssScripts();
	}

	public function jsCssScripts() {

		wp_register_style('counterup_js',get_template_directory_uri().'/js/jquery.counterup.min.js',array(),false,true);
	 
	}
}

class WPBakeryShortCode_PBR_Frontpageblog extends WPBakeryShortCode_VC_Posts_Grid {}

/**
 * Elements
 */
class WPBakeryShortCode_Pbr_featuredbox  extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_pricing 	 extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_inforbox 	 extends WPBakeryShortCode {}

/**
 * Themes
 */
class WPBakeryShortCode_Pbr_title_heading   extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_Team extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_team_list extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_verticalmenu extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_banner_countdown extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_block_hover extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_cta extends WPBakeryShortCode {}


class WPBakeryShortCode_Pbr_speakers extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_speakers_grid extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_coming_soon extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_twitter extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_contact_information extends  WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_Gallery extends  WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_Sponsors extends  WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_Testimonials_Carousel extends  WPBakeryShortCode {}

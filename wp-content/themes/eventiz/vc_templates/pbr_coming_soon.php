<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support   * @support  http://www.wpopal.com/questions/
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$timestamp = strtotime($date_comingsoon);
if( $timestamp < time())
    return;
?>

<div class="widget countdown pbr-coming-soon <?php echo esc_attr($style); ?> <?php echo esc_attr($el_class); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>
   <div class="coming-soon-time">
        <div class="pts-countdown clearfix" data-countdown="countdown"
            data-date="<?php echo date('m',$timestamp).'-'.date('d',$timestamp).'-'.date('Y',$timestamp).'-'. date('H',$timestamp) . '-' . date('i',$timestamp) . '-' .  date('s',$timestamp) ; ?>">
        </div>
    </div>
    <?php if($description){ ?>
        <div class="description-countdown">
            <?php echo trim( $description ); ?>
        </div>
    <?php } ?>
    <div class="page-action">
        <a href="javascript: history.go(-1)"><i class="fa fa-angle-left"></i><?php esc_html_e('Go back to previous page', 'eventiz'); ?></a>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Return to homepage', 'eventiz'); ?><i class="fa fa-angle-right"></i></a>
    </div>
</div>
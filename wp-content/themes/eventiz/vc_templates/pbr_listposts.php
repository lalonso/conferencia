<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();

$layout = 'single-v1';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
if(is_front_page()){
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
else{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args['paged'] = $paged; 
$loop = new WP_Query($args);
$posts_per_page = $args['posts_per_page'];
?>

<section class="widget widget-style pbr-list-posts layout-<?php echo esc_attr($layout); ?>  <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
    <?php
        if( !empty($title) ){ ?>
            <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.esc_attr( $alignment ); ?>">
                <span><?php echo trim($title); ?></span>
            </h3>
        <?php }
    ?>
    <?php if($loop->have_posts()): ?>
        <div class="widget-content"> 
        <?php $_count =0; ?>
            
             
            <div class="posts-list">
                <?php 
                    $i =0; while($loop->have_posts()){  $loop->the_post(); ?>
                    <?php get_template_part( 'vc_templates/post/' . $layout) ?>   
                <?php } ?>
            </div>
        </div>
        <?php if( isset($show_pagination) && $show_pagination ): ?>
        <div class="w-pagination"><?php eventiz_fnc_pagination_nav( $posts_per_page, $loop->found_posts, $loop->max_num_pages ); ?></div>
        <?php endif ; ?>
    <?php endif; ?>
</section>
<?php wp_reset_postdata(); ?>
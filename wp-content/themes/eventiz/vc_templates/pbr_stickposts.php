<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;

$loop = new WP_Query($args);
$posts_per_page = $args['posts_per_page'];
?>

<section class="widget space-0 widget-style pbr-stickposts <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
    <div class="widget-content bg-none"> 
        <div class="row">
        <?php if($loop->have_posts()): ?>    
            <?php $_count = 0; while($loop->have_posts()){  $loop->the_post(); ?>
                <?php if($_count == 0){ ?>
                    <div class="post post-first pull-right col-sm-6 col-xs-12">
                        <div class="image content-inner">
                            <?php the_post_thumbnail( 'full' ); ?>
                            <div class="post-content">
                                <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></div>
                                <div class="meta entry-meta">
                                    <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
                                    <span class="meta-sep"> / </span>
                                    <span class="author"><?php esc_html_e('by', 'eventiz'); the_author_posts_link(); ?></span>
                                </div>
                                <div class="readmore"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more' , 'eventiz' ); ?></a></div>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <?php if($_count==1){ ?>
                        <div class="posts-list-small pull-left col-sm-6 col-xs-12">
                         <?php
                            if($title!=''){ ?>
                            <div class="heading heading-v1 space-10">
                                <div class="heading-inner"> 
                                      <h2><?php echo trim($title); ?></h2>
                                      <?php if( $subtitle ){ ?>
                                         <small class="subheading"> <?php echo trim($subtitle); ?></small>
                                      <?php } ?>
                                </div>
                            </div>        
                            <?php }
                        ?>
                    <?php } ?>
                        <div class="post clearfix space-20">
                            <div class="left"><?php the_post_thumbnail( 'full' ); ?></div>
                            <div class="right">
                                <div class="clearfix">
                                    <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></div>
                                    <div class="meta entry-meta">
                                        <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
                                        <span class="meta-sep"> / </span>
                                        <span class="author"><?php esc_html_e('by', 'eventiz'); the_author_posts_link(); ?></span>
                                    </div>
                                    <div class="readmore"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'eventiz' ); ?></a></div>
                                </div>
                            </div>
                        </div>    
                    <?php if($_count==$loop->found_posts){ echo ' </div>'; } ?>    
                <?php } ?>
            <?php $_count++; } ?>
        <?php endif; ?>
        </div>   
    </div>
</section>
<?php wp_reset_postdata(); ?>
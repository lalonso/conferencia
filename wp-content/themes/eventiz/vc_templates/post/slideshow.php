<?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>
<article class="post">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                    <?php the_post_thumbnail( $thumbsize );?>
                </a>
                <!-- vote    -->
                <?php do_action('eventiz_show_rating') ?>
            </figure>
        <?php
    }
    ?>
     <h4 class="entry-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <div class="entry-content">
        <div class="entry-content-inner clearfix">
            <div class="entry-meta">
                <div class="entry-category hidden">
                    <?php the_category(); ?>
                </div>
            
                <ul class="entry-comment list-inline hidden">
                    <li class="comment-count">
                        <?php comments_popup_link(esc_html__(' 0 ', 'eventiz'), esc_html__(' 1 ', 'eventiz'), esc_html__(' % ', 'eventiz')); ?>
                    </li>
                </ul>

                 <div class="entry-create">
                    <span class="author"><?php esc_html_e('By', 'eventiz'); the_author_posts_link(); ?></span>
                    <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
                </div>
            </div>
            <p class="entry-description"><?php echo eventiz_fnc_excerpt(10,'...'); ?></p>
        </div>
    </div>

</article>
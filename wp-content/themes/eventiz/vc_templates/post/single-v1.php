<?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>
<article class="post">
  <?php
  if ( has_post_thumbnail() ) {
      ?>
          <figure class="entry-thumb hidden">
              <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                  <?php the_post_thumbnail( $thumbsize ); echo trim($thumbsize); ?>
              </a>
              <!-- vote    -->
              <?php do_action('eventiz_fnc_rating') ?>
          </figure>
      <?php
  }
  ?>
  <div class="entry-content">
      <?php if (get_the_title()) { ?>
          <h5 class="entry-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h5>
      <?php  } ?>
      <div class="entry-meta clearfix">
          <div class="entry-date pull-left">
              <span><?php the_time( 'M d, Y' ); ?></span>
          </div>
          <span class="meta-sep pull-left"> / </span>
          <span class="author pull-left"><?php esc_html_e('by', 'eventiz'); the_author_posts_link(); ?></span>
          <span class="meta-sep pull-left hidden"> / </span>
          <div class="entry-category pull-left hidden">
            <?php esc_html_e('in', 'eventiz'); the_category(); ?>
          </div>
      </div>
      <div class="entry-excerpt hidden">
        <?php echo eventiz_fnc_excerpt(30,'...');; ?>
      </div>
  </div>
</article>
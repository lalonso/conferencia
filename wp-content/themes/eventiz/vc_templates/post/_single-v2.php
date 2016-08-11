 <?php $thumbsize = isset($thumbsize)? $thumbsize : 'small';?>
 <?php
  $post_category = "";
  $categories = get_the_category();
  $separator = ' ';
  $output = '';
  if($categories){
    foreach($categories as $category) {
      $output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'eventiz' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
    }
  $post_category = trim($output, $separator);
  }  

  $rightcolclass = '12';    
?>
<article class="post single-v2 clearfix">
  <div class="row"> 
   
      <?php if ( has_post_thumbnail() ) { $rightcolclass = '5';  ?>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 no-padding">
              <figure class="entry-thumb">
                  <div class="created">
                    <span class="date"><?php the_time( 'd' ) ?></span>
                    <span class="year"><?php the_time( 'M Y' ) ?></span>
                  </div>
                  <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                      <?php the_post_thumbnail( $thumbsize );?>
                  </a>
                  <!-- vote    -->
                  <?php do_action('eventiz_show_rating') ?>
                   <div class="category-highlight hidden">
                      <?php echo trim($post_category); ?>
                  </div>
              </figure>
          </div>
      <?php } ?>
  
    <div class="col-lg-<?php echo trim($rightcolclass); ?> col-md-<?php echo trim($rightcolclass); ?> col-sm-<?php echo trim($rightcolclass); ?> col-xs-12 no-padding">
      <div class="post-content">
        <div class="post-heading">
          <h4 class="entry-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h4>
          <div class="entry-meta clearfix">
              <div class="entry-date pull-left">
                  <span><?php the_time( 'M d, Y' ); ?>
              </div>
              <span class="meta-sep pull-left"> / </span>
              <span class="author pull-left"><?php esc_html_e('by', 'eventiz'); the_author_posts_link(); ?></span>
              <span class="meta-sep pull-left"> / </span>
              <div class="entry-category pull-left">
                <?php esc_html_e('in', 'eventiz'); the_category(); ?>
              </div>
          </div>
        </div>
        <div class="entry-description"><?php echo eventiz_fnc_excerpt(125,'...');; ?></div>
        <div class="readmore"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Read more', 'eventiz') ?></a></div>
      </div>  
    </div>
  </div>
</article>
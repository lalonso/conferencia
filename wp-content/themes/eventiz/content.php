<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WpOpal
 * @subpackage Eventiz
 * @since Eventiz 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
      <div class="created">
         <span class="date"><?php the_time( 'd' ) ?></span>
         <span class="year"><?php the_time( 'M Y' ) ?></span>
      </div>
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && eventiz_fnc_categorized_blog() ) : ?>
		<?php
			endif;
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;
		?>
		<div class="entry-meta clearfix">
            <span class="author pull-left"><?php esc_html_e('by', 'eventiz'); the_author_posts_link(); ?></span>
            <span class="meta-sep pull-left"> / </span>
            <div class="entry-category pull-left">
              <?php esc_html_e('in', 'eventiz'); the_category(); ?>
            </div>
            <span class="meta-sep pull-left">  &nbsp;&nbsp;/ </span>
            <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span class="comments-link pull-left"><span class="fa fa-comment-o"></span> <?php comments_popup_link( esc_html__( 'Leave a comment', 'eventiz' ), esc_html__( '1 Comment', 'eventiz' ), esc_html__( '% Comments', 'eventiz' ) ); ?></span>
				<?php endif; ?>

				<?php edit_post_link( esc_html__( 'Edit', 'eventiz' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .entry-meta -->

	</header><!-- .entry-header -->
	<?php eventiz_fnc_post_thumbnail(); ?>

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				esc_html__( 'Continue reading', 'eventiz') .' %s <span class="meta-nav">&rarr;</span>',
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'eventiz' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->

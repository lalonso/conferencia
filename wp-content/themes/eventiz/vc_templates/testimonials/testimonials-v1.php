<div class="testimonials-body testimonials-v1">
   <span class="icon"><img src="<?php echo (get_template_directory_uri() . '/images/icon-testimonial.png') ?>" alt="testimonials"></span>
   <div class="testimonials-profile"> 
     <div class="testimonial-avatar">
         <?php the_post_thumbnail('widget') ?>
      </div>
      <div class="testimonial-meta">
         <h4 class="name"> <?php the_title(); ?></h4>
         <div class="job"><?php the_excerpt(); ?></div>
      </div> 
   </div> 
   <div class="testimonials-quote clearfix"><?php the_content() ?></div>
</div>
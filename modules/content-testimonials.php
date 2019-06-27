<?php 

$args = array(
  'post_type' => 'testimonials',
  'orderby' => 'rand',
  'posts_per_page' => 1
);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ): ?>

  <section class="module testimonial">

    <h4 class="contain">

      <?php the_sub_field('section_title') ?> 

    </h4>

    <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>

      <div class="contain-small holder">

        <blockquote>

          <h5>

            <?php the_field('quote'); ?>
              
          </h5>

        </blockquote>

        <p>~ <?php the_field('name') ?></p>

      </div>

    <?php endwhile; ?> 
    
  </section>

<?php endif; wp_reset_postdata(); ?>






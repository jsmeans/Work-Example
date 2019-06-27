<h2 class="title-area contain">Current Promotions</h2>

<section class="promo-slider contain">

<?php $args = array(
  'post_type' => 'promos',
  'posts_per_page' => 9
);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ): ?>

  <div class="promo-img">

    <div class="bg-slider">

        <div class='slider'>

          <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>

            <div class='bg-image'>

              <?php the_post_thumbnail(); ?>

              <div class = 'caption'>
              
              </div>

            </div>

          <?php endwhile; ?>

        </div>

      </div>

  </div>

  <?php 

  endif; wp_reset_postdata(); 

  $the_query = new WP_Query( $args );
  // The Loop
  if ( $the_query->have_posts() ): 

  $i=1;

  ?>

    <div class="list-container">
      
      <div class="promo-list">

        <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?> 
         
          <div class='button'>

            <a href="<?php the_permalink(); ?>" class="project-link">

              <div class="title-box">

                <div class="num">0<?php echo $i; ?></div>

                <div class="title">

                  <h2><?php the_title(); ?></h2>

                </div>

              </div>

              <div class="line"></div>

            </a> 

          </div>
            
          <?php $i++;  endwhile; wp_reset_postdata(); ?>
      
      </div>

    </div>

  <?php endif; ?>

</section>
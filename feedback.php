<?php /*Template Name: feedback */ 
?><?php 

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ): ?>

       

    

      <?php if(get_sub_field('section_title')) : ?>

        <div class="section-header">

          <h2><?php the_sub_field('section_title'); ?></h2>

        </div>

      <?php endif; ?>

      <div class="articles">

        <?php while ( $the_query->have_posts() ): $the_query->the_post(); 

          $headerImage = get_the_post_thumbnail_url();
          $categories = get_the_category();
          $separator = ' ';
          $output = '';
          if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                  $output .=  $category->name . $separator;
              }
              $category = trim( $output, $separator );
          }
        ?>

          <article>

            <a class="article" href="<?php the_permalink(); ?>">

              <div class="link-box">

                <div class="img">

                  <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $imageAlt ?>">

                </div>

                <div class="text-box">

                  <h5 class="card-text"><?php the_title(); ?></h5>

                  <p><?php the_excerpt(); ?></p>

                </div>

              </div>

            </a>
            
          </article>

        <?php endwhile; ?> 

      </div>

    </div>

  </section>

 <?php endif; wp_reset_postdata();?>

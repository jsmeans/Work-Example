<?php 

$category = get_sub_field('cat');

$args = array(
  'post_type' => 'post',
  'cat'  => $category,
  'posts_per_page' => 3
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ): ?>

  <section class="module posts">

    <div class="contain">

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

             
            <div class="img">
              <img src="<?php echo $headerImage ?>" alt="<?php echo $imageAlt ?>">
            </div>
         

            

            
              
            

        <div class="text-box">

              
              <div class="card-text">

                

                <h4 class="card-title"><?php the_title(); ?></h4>
                <div class="post-info">
                  <p class="time" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></p> 
                  <p class="cats"> / <?php echo $category?></p>
                </div>
                

              </div>

       </div>

            </a>
            
          </article>

        <?php endwhile; ?> 

      </div>

    </div>

  </section>

<?php endif; wp_reset_postdata(); ?>






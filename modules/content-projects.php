<?php 

$category = get_sub_field('cat');

$args = array(
  'post_type' => 'projects',
  'cat'  => $category,
  'posts_per_page' => 4
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

        ?>

          <article>

            <a href="<?php the_permalink(); ?>">

              <div class="img-holder">

                <img src="<?php echo $headerImage ?>">

                <?php 

                  $taxonomy = 'category';  

                  $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

                  $separator = ', ';
                     
                  if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) 

                  {
                   
                    $term_ids = implode( ',' , $post_terms );
                 
                    $terms = get_the_category_by_ID($term_ids);

                    print_r($terms);

                    $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

                  } 

                ?>

                <div class="cats"><?php  echo $terms; ?></div>

              </div>
              
              <div class="info">
                
                <h4><?php the_title(); ?></h4>
                
                <?php the_excerpt(); ?>
                
              </div>

            </a>
            
          </article>

        <?php endwhile; ?> 

      </div>

    </div>

  </section>

<?php endif; wp_reset_postdata(); ?>






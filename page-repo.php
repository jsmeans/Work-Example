<?php /*Template Name: Repo Page */ get_header(); 
  $headerArray = get_field('header_image');
  $imageAlt = esc_attr($headerArray['alt']); 
  $imageURL = esc_url($headerArray['url']); 
  $imageThumbURL = esc_url($headerArray['sizes']['thumbnail']); 
?>
<header>

  <div class="hero-image">

    <img src="<?php echo $imageURL; ?>">

    <div class="text-box">

      <div class="header-text">

        <h1><?php the_field('header_text'); ?></h1>

        <?php if(get_field('add_button')==true): ?>

        <div class="button">

          <a href="<?php the_field('page_link'); ?>"><?php the_field('button_text'); ?></a>

        </div>

      <?php endif; ?>  

      </div>

    </div>
    
  </div>
  
</header>

  <section id='repo-page'>
    
    <div class="flex-box contain">

      <?php 

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => 'repo' 
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
  <?php else: ?>

    <h2 class="no-repo">There are no repossessed vehicles available at this time. Check back later!</h2>

  <?php endif; wp_reset_postdata();?>

    </div>

  </section>

<?php get_footer(); ?>
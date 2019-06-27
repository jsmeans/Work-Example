<?php /*Template Name: Careers Page */ get_header(); ?>

<div id="blog-header" class="modular">
  <?php
    $categories = get_the_category();
     
    if ( ! empty( $categories ) ) {
        $category = $categories[0]->name;   
    }
    $headerArray = get_the_post_thumbnail();
    $imageAlt = esc_attr($imageArray['alt']); 
    $imageURL = esc_url($imageArray['url']); 
    $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
    the_post();
  ?>
  <div class="single-header-image">
    <?php echo $headerArray; ?>
    <h1><?php the_title(); ?></h1>
  </div>
  
  
</div>

<section id='careers-page'>
<div class="contain-small">
  <?php the_content(); ?>
</div>
  



    <?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category_name'=>'careers'
  );

  $the_query = new WP_Query( $args );

  // The Loop
  if ( $the_query->have_posts() ): ?>

    <section class="contain">

          <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?> 


           <article class="post-link">

              <div class="img-box">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a> 
              </div>

              <!-- <div class='date'>

                <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a> 

              </div> -->

              <div class='title'>

                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 

              </div>
              
              <!-- <div class='author'>

                <a href="<?php the_permalink(); ?>">Written By: <?php the_author(); ?></a> 

              </div> -->
              
            </article>
            
              

          <?php endwhile; ?>

      </section>

    <?php endif; ?>

</section>
<?php get_template_part('content','footer' ); ?>
<?php get_footer(); ?>
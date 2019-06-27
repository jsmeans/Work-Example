<?php /*Template Name: Blog Page */ get_header(); 
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

<section id='news-page'>

  <div class="featured contain">

    <?php 

    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 1,
    );

    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ):
      $firstPost = array(); 
     ?>

    <div class="featured-article">

      <?php while ( $the_query->have_posts() ): $the_query->the_post(); 
        $firstPost[] = $post->ID;
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
        $date = get_the_date();
        $timestamp = strtotime($date);
        $dayOfWeek = date("l", $timestamp);
        $date = new DateTime($date);
      ?>

      

        <a class="top-article" href="<?php the_permalink(); ?>">
          <div class="link-box" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

            <div class="pulled-quote">

              <?php the_field('featured_quote'); ?>

            </div>

            

          </div>
          <div class="text-box">

            <h2 class="featured-title"><?php the_title(); ?></h2>
            
            <div class="post-info">
              <p class="time" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo $dayOfWeek; ?>, <?php echo $date->format('M j Y'); ?></p> 
            </div>

            <p><?php the_excerpt(); ?></p>

          </div>

          

        </a>
        
      <?php endwhile; ?> 

    </div>

    <?php endif; wp_reset_postdata();?>

  </div>

  <div class="flex-box contain">

    <?php 

    $args2 = array(
      'post_type' => 'post',
      'posts_per_page' => 8,
      'post__not_in' => $firstPost
    );

    $the_query = new WP_Query( $args2 );

    if ( $the_query->have_posts() ): ?>

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

     
<article class="article" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
        <a class="link-box" href="<?php the_permalink(); ?>">

            <div class="text-box">

              <h5 class="card-text"><?php the_title(); ?></h5>

             

            </div>

        </a>
        </article>
     

      <?php endwhile; ?> 

    </div>

    <?php endif; wp_reset_postdata();?>

  </div>

</section>

<?php get_footer(); ?>
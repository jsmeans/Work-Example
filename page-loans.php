<?php /*Template Name: Loans Page */ get_header(); 
  $headerArray = get_field('header_image');
  $imageAlt = esc_attr($headerArray['alt']); 
  $imageURL = esc_url($headerArray['url']); 
  $imageThumbURL = esc_url($headerArray['sizes']['thumbnail']); 
?>
<header>

  <div class="hero-image">

    <?php if(get_field('header_image')): ?>

    <img src="<?php echo $imageURL; ?>">

    <?php else: ?>

      <?php the_post_thumbnail(); ?> 

    <?php endif; ?>

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

<div id="primary" class="page loans contain">

  <main id="main" class="site-main " role="main">

    <?php

      if( have_posts() ): while ( have_posts() ) : the_post(); ?>

        <div id="content"><h1><?php the_title(); ?></h1> <?php the_field('intro_text'); ?> </div>

     <?php endwhile; endif;

    ?>

    <?php get_sidebar('calculator'); ?>

  </main>
 
</div>

  <?php 

    if( have_rows('modules') ):

      while ( have_rows('modules') ) : the_row();

        $layout = get_row_layout();      

        get_template_part('modules/content',  $layout );     

      endwhile;

    endif;
     
  ?>



<?php 







get_footer(); ?>
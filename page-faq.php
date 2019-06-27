<?php /* Template Name: FAQ Page */ get_header(); 
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

<main id="faq-page" class="modular">
  
  <?php 

    if( have_rows('question_group') ):

      while ( have_rows('question_group') ) : the_row();?> 


        <section class="rate-group contain">
          <div class="rate-group-title">
            <h3>
              <?php the_sub_field('group_title'); ?>
            </h3>
           
            <div class="rate-trigger"><span></span></div>
        </div>
        <div class="rates">
          <?php the_sub_field('answer');?>
        </div>
        </section>

        

      <?php endwhile;

    endif;
     
  ?>

</main>

<?php get_footer(); ?>

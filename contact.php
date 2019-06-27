<?php /* Template Name: Contact Page */ get_header(); 
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
<div class="quick-contact contain-small">
  <div class="numbers"><h4>Main Branch & NW Branch </h4><a class="contact-info" href="tel:14052301328">405.230.1328</a></div>
  <div class="numbers"><h4>Chickasha Branch</h4><a class="contact-info" href="tel:14052220012">405.222.0012</a></div>
  <div class="numbers"><h4>Tri-City Branch</h4><a class="contact-info" href="tel:14053923400">405.392.3400</a></div>
  <div class="numbers"><h4>Toll Free</h4><a class="contact-info" href="tel:18008318932">800.831.8932</a></div>
  <div class="numbers"><h4>Touch-Tone Teller</h4><a class="contact-info" href="tel:14054880651">405.488.0651</a></div>
</div>

<main id="page" class="modular">
  
  <?php 

    if( have_rows('modules') ):

      while ( have_rows('modules') ) : the_row();

        $layout = get_row_layout();      

        get_template_part('modules/content',  $layout );     

      endwhile;

    endif;
     
  ?>

</main>

<?php get_footer(); ?>

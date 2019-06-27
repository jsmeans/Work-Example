
<section class="module slider">

 <?php if( have_rows('iosslider') ):?>
<div class="finance-slider contain-small">
  <div class="slider">

    <?php while ( have_rows('iosslider') ) : the_row();?>
      <?php 

      $video = get_sub_field('the_video');
      $image = get_sub_field('placeholder_image');

      ?>
    <div class='item'>

      

       

          <a href="<?php echo $video ?>" class="davideo" style="background-image:url(<?php echo $image ?>);">

            

            <div class="overlay"></div>

          </a>

       

      

    </div>

    <?php endwhile; ?>

  </div>
  <div class='prevButton'></div>
  
  <div class='nextButton'></div>
  </div>

  
<?php endif; wp_reset_postdata(); ?>
</section>
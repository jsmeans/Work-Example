<section class="module featured">

  <div class="img-box">

    <?php if( get_sub_field( 'image' ) ) :

      $imageArray = get_sub_field('image');
      $imageAlt = esc_attr($imageArray['alt']); 
      $imageURL = esc_url($imageArray['url']);
      ?>

      <img src="<?php echo $imageURL ?>" alt="<?php echo $imageAlt ?>">
      
    <?php endif; ?>

  </div>

  

</section>
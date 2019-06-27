<section class="module image-blocks">
  
  <?php if( have_rows('image_block') ): ?>          

    <?php while ( have_rows('image_block') ) : the_row();
      $imageArray = get_sub_field('image'); 
      $imageAlt = esc_attr($imageArray['alt']); 
      $imageURL = esc_url($imageArray['url']); 
      $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
    ?>
    <div class="block">

      <div class="img-block contain">

        

            <?php 

              if (get_sub_field('side_content')== 'video'): 

              $video = get_sub_field('video');

              $vimage = get_sub_field('video_placeholder');

              ?>
              <div class="vid-box">
          
              <div class="vid-wrap">

              <div class="contain-small">

                <a href="<?php echo $video ?>" class="davideo">

                  <img src="<?php echo $vimage ?>">

                  <div class="overlay"></div>

                </a>

              </div>

            <?php elseif (get_sub_field('side_content')== 'img'): ?>
              <div class="img-box">
          
          <div class="img-wrap">

              <img class="lazy" src="<?php echo get_template_directory_uri(); ?>/img/placeholder.png" data-src="<?php echo $imageURL ?>" alt="<?php echo $imageAlt ?>">

            <?php endif; ?>
            

          </div>

        </div>

        <div class="text-box">
          
          <div class="text-wrap">

            <h3><?php the_sub_field('block_title'); ?></h3>

            <div class="section-desc">

              <?php the_sub_field('block_desc'); ?>

            </div>

            <?php if(get_sub_field('add_link')==true):?>

              <a href="<?php the_sub_field('link'); ?>" class="button">

                <h4>Find Out More</h4>

              </a> 

            <?php endif; ?>

          </div>

        </div>  

      </div>        
    </div>
    <?php endwhile;

  endif; ?>

</section>
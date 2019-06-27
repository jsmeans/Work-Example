<section id="important-links" class="module buttons">

    <div class="contain">

      <?php if(get_sub_field('section_title')) : ?>

        <div class="section-header">

          <h2><?php the_sub_field('section_title'); ?></h2>

        </div>

      <?php endif; ?>
      <?php if(get_sub_field('section_desc')) : ?>

        <div class="section-desc">

          <?php the_sub_field('section_desc'); ?>

        </div>

      <?php endif; ?>
      <?php 

  if( have_rows('buttons') ): ?>
      
    <div class="buttons-container">

      <?php while ( have_rows('buttons') ) : the_row();

        $button = get_sub_field('button');

        $imageArray = $button['image'];

        $imageAlt = esc_attr($imageArray['alt']); 

        $imageURL = esc_url($imageArray['url']); 

        $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
        
      ?>
      

          
          <div class="link-box">
            <a class="button" href="<?php echo $button['link']; ?>">
              
                
                <div class="text-box">
                  <h5 class="button-text"><?php echo $button['title']; ?></h5>
                  
                </div>
            
            </a>
            <p><?php echo $button['text']; ?></p>
          </div>
            
            
         

        <?php endwhile; ?> 

      </div>

    </div>

  

<?php endif; wp_reset_postdata(); ?>

</section>




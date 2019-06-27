<section class="module small-blocks">

    <div class="contain">

      <?php if(get_sub_field('section_title')) : ?>

        <div class="section-header">

          <h2><?php the_sub_field('section_title'); ?></h2>

        </div>

      <?php endif; ?>
      <?php 

  if( have_rows('card_link') ): ?>
      
    
      <div class="articles">

      <?php while ( have_rows('card_link') ) : the_row();

        $card = get_sub_field('card');

        $imageArray = $card['image'];

        $imageAlt = esc_attr($imageArray['alt']); 

        $imageURL = esc_url($imageArray['url']); 

        $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
        
      ?>
      

          <article>

            <a class="article" href="<?php echo $card['link']; ?>">
<div class="link-box">
              <div class="img">
                <img src="<?php echo $imageURL ?>" alt="<?php echo $imageAlt ?>">
              </div>
              <div class="text-box">
                <h5 class="card-text"><?php echo $card['title']; ?></h5>
                <p><?php echo $card['text']; ?></p>
              </div>
              </div>
            </a>
            
          </article>

        <?php endwhile; ?> 

      </div>

    </div>

  

<?php endif; wp_reset_postdata(); ?>

</section>




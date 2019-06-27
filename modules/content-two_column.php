<section class="module two-column">

  <div class="contain">

    

  
      <div class="header-text">
        <?php if( get_sub_field( 'section_heading' ) ) : ?>
          <h3 class="header"><?php the_sub_field('section_heading'); ?></h3>
        <?php endif; ?>
        <?php if( get_sub_field( 'sub_heading' ) ) : ?>
          <p class="header"><?php the_sub_field('sub_heading'); ?></p>
        <?php endif; ?>
      </div>
      
 
      
    <div class="text-box">

      <div class="content-box left">

        <?php the_sub_field('content_area_left'); ?>

      </div>
      
      <div class="content-box right">

        <?php the_sub_field('content_area_right'); ?>

      </div>

    </div>

  </div>

  

</section>
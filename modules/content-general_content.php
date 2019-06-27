<section class="module general">

  <div class="contain-small">

    

    <div class="text-box">
      
        <?php if( get_sub_field( 'section_heading' ) ) : ?>
          <div class="header-text">
            <h2 class="header"><?php the_sub_field('section_heading'); ?></h2>
          </div>
        <?php endif; ?>
        <?php if( get_sub_field( 'sub_heading' ) ) : ?>
          <p class="sub-header"><?php the_sub_field('sub_heading'); ?></p>
        <?php endif; ?>
      
      
    </div>
      
    <div class="text-box">

      <div class="content-box">

        <?php the_sub_field('content_area'); ?>

      </div>

    </div>

  </div>

  

</section>
<section class="module intro">

  <div class="intro-holder contain">

    

    <div class="text-box">
      <div class="header-text">
        <?php if( get_sub_field( 'header_text' ) ) : ?>
          <h2 class="header"><?php the_sub_field('header_text'); ?></h2>
        <?php endif; ?>
        <?php if( get_sub_field( 'sub_heading' ) ) : ?>
          <h3 class="sub-header"><?php the_sub_field('sub_heading'); ?></h3>
        <?php endif; ?>
      </div>
      
    </div>
      
    <div class="text-box">

      <div class="content-box">

        <?php the_sub_field('content'); ?>

      </div>

    </div>

  </div>
  
</section>

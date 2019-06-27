<section class="module logos" style="background-image: url(<?php the_sub_field('bg_image'); ?>)">

  <div class=" contain-small section-header">

    <h3><?php the_sub_field('section_heading') ?></h3>

    <p><?php the_sub_field('sub_heading') ?></p>

  </div>

  <?php if(have_rows('logo_section')) : ?>

    <?php $i = 0; ?>

    <?php while(have_rows('logo_section')) : the_row(); ?>

      <?php $i++; ?>

    <?php endwhile; ?>

  <?php endif; ?>

  <?php $ie =  str_repeat("1fr ", $i); ?>

  <?php if( have_rows('logo_section') ): ?> 

    <div class="contain logo-container" style="grid-template-columns: <?php echo $ie ?>; -ms-grid-columns: <?php echo $ie ?>;">

      <?php while ( have_rows('logo_section') ) : the_row();?>

        <section > 
          
          <div class="logo-holder">

            <img src="<?php the_sub_field('logo'); ?>"> 

          </div>
           
        </section>

      <?php endwhile; ?>
      
    </div>

  <?php else : endif; ?>       

</section>

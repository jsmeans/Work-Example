<section class="module columns" style="background-image: url(<?php the_sub_field('bg_image'); ?>)">


  <?php if(have_rows('content_blocks')) : ?>
    <?php $i = array(); ?>
    <?php while(have_rows('content_blocks')) : the_row(); ?>
      <?php $width = get_sub_field('content_width'); 
      array_push($i, $width); ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php if( have_rows('content_blocks') ): ?>          

    <div class="contain-small column-blocks" style="grid-template-columns: <?php echo implode(' ',$i) ?>">
      <?php while ( have_rows('content_blocks') ) : the_row();?>
        <section class="column"> 
          <?php if(get_sub_field('title')) : ?>
            <div class="column-header">
              <h2><?php the_sub_field('title'); ?></h2>
            </div>
          <?php endif; ?>
          <div class="column-content">
            <?php the_sub_field('content'); ?>       
          </div>
           
        </section>
      <?php endwhile; ?>
    </div>

  <?php else : endif; ?>       

</section>

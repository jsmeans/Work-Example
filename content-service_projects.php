<article class="post-link">        
  <?php 
  $rand =  mt_rand(1,100);
  if($rand > 60 && $used==false): ?> 
    <div class="img-box">
      <img src="<?php the_post_thumbnail_url(); $used=true; ?>">
    </div>
  <?php endif; ?>
  <div class='title'>
    <h3>Project</h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </div>
  <div>
    <?php the_excerpt(); ?>
  </div>
</article>
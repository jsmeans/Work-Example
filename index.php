<?php get_header(); ?>

<div class="single-header-image contain">
    <?php echo $headerArray; ?>
    <h1 style="text-align:center;">SEARCH: <?php the_title(); ?></h1>
  </div>
  
  
</div>

  <section id='news-page'>
    
    <div class="flex-box">

<?php if (have_posts()){ ?>

<section class="contain">
  <?php while (have_posts()){the_post();?>
     <article class="post-link">

              <div class="img-box">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a> 
              </div>

              <div class='date'>

                <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a> 

              </div>

              <div class='title'>

                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 

              </div>
              
              <div class='author'>

                <a href="<?php the_permalink(); ?>">Written By: <?php the_author(); ?></a> 

              </div>
              
            </article>
  <?php }?>
</section>
  <?php } wp_reset_postdata(); ?>

</div>
</section>

<? get_footer(); ?>

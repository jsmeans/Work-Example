<?php /*Template Name: Projects Page */ get_header(); ?>

<div id="archive" class="main-content contain">

  

  <div class="content">
                      
      <div class="">
          
          <div class="articles">
              
              <?php $args = array(
                'post_type' => 'post',
                'category_name'  => $category,
                'posts_per_page' => -1,
                'post__not_in' => array($postID)
              );
              $the_query = new WP_Query( $args );

              // The Loop
              if ( $the_query->have_posts() ): while ( $the_query->have_posts() ): $the_query->the_post(); $headerImage = get_the_post_thumbnail_url();?>
                
                      
              <article>

                <a class="article" href="<?php the_permalink(); ?>">

                  <div class="link-box">

                    <div class="img">

                      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $imageAlt ?>">

                    </div>

                    <div class="text-box">

                      <h5 class="card-text">

                        <?php the_title(); ?>

                        </h5>

                      <p><?php the_excerpt(); ?></p>

                    </div>

                  </div>
                  
                </a>
                
              </article>
                 
          
              <?php endwhile; ?>
              
              <?php else : ?>

              <article class="no-posts">

                  <h1>No posts were found.</h1>

              </article>
              
              <?php endif; ?>
              
          </div>
          
      </div>

  
      <div class="article-nav">
          
          <p class="article-nav-next pull-right"><?php previous_posts_link(__('Newer Posts »')); ?></p>
          
          <p class="article-nav-prev pull-left"><?php next_posts_link(__('« Older Posts')); ?></p>
          
      </div>
      
   

  </div><!-- END MAIN-CONTENT -->
  <div class="archive-sidebar">
    <?php get_sidebar('projects'); ?>
  </div>     
  
        
</div>      
    

<?php get_footer(); ?>
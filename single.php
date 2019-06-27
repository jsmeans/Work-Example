<?php get_header(); ?>

  <article id="blog-single" class="modular">
    <?php
      $categories = get_the_category();
      $separator = ' ';
      $output = '';
      if ( ! empty( $categories ) ) {
          foreach( $categories as $category ) {
              $output .=  $category->name . $separator;
          }
          $category = trim( $output, $separator );
      }

      $headerArray = get_the_post_thumbnail();
      $imageAlt = esc_attr($imageArray['alt']); 
      $imageURL = esc_url($imageArray['url']); 
      $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
      the_post();
    ?>
    <script type="application/ld+json">
        { 
        "@context": "http://schema.org", 
        "@type": "BlogPosting",
        "headline": "<?php the_title(); ?>",
        "image": "<?php the_post_thumbnail_url(); ?>",
        "genre": "finance", 
        "keywords": "<?php echo $category ?>", 
        "url": "<?php the_permalink(); ?>",
        "datePublished": "<?php the_date(); ?>",
        "dateModified": "2019-01-04",
        "description": "<?php echo strip_tags( get_the_excerpt() ); ?>",
        "articleBody": "<?php echo strip_tags( get_the_content() ); ?>",
        "author": {
          "@type": "Person",
          "name": "<?php the_author(); ?>"
        },
        "publisher": {
          "@type": "Organization",
          "name": "Focus Federal Credit Union",
          "logo": {
            "@type": "ImageObject",
            "name": "Focus Federal Credit Union",
            "width": "600",
            "height": "60",
            "url": "https://beyondtheory.us/wp-content/uploads/2019/01/bt-logo-amp.png"
        }
        },
        "mainEntityOfPage": "Advertising"
      }
    </script>
   
      <?php $headerArray = get_field('header_image');
  $imageAlt = esc_attr($headerArray['alt']); 
  $imageURL = esc_url($headerArray['url']); 
  $imageThumbURL = esc_url($headerArray['sizes']['thumbnail']); 
  $date = get_the_date();
  $timestamp = strtotime($date);
  $dayOfWeek = date("l", $timestamp);
  $date = new DateTime($date);
?>
<header>

  <div class="hero-image">
    <img src="<?php echo $imageURL; ?>">
    <div class="text-box">
      <div class="header-text">
        
        <?php if(get_field('add_button')==true): ?>
        <div class="button">

          <a href="<?php the_field('page_link'); ?>"><?php the_field('button_text'); ?></a>
        </div>
      <?php endif; ?>  
      </div>
    </div>
  </div>
  
</header>
    
    <div class="post-container  contain">

      <section class="content">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="post-info">
          <p class="time" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo $dayOfWeek; ?>, <?php echo $date->format('M j Y'); ?></p> 
        </div>
       <?php 

        if( have_rows('modules') ):

          while ( have_rows('modules') ) : the_row();

            $layout = get_row_layout();      

            get_template_part('modules/content',  $layout );     

          endwhile;
        else:
          the_content();
        endif;
         
      ?>
      </section>
      
      <?php get_sidebar(); ?> 
      
    </div>
  </article>


<?php get_footer(); ?>

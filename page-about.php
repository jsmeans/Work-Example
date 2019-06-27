<?php /*Template Name: About Page */ get_header(); 
  $headerArray = get_field('header_image');
  $imageAlt = esc_attr($headerArray['alt']); 
  $imageURL = esc_url($headerArray['url']); 
  $imageThumbURL = esc_url($headerArray['sizes']['thumbnail']); 
?>

<header>

  <div class="hero-image">

    <?php if(get_field('header_image')): ?>

    <img src="<?php echo $imageURL; ?>">

    <?php else: ?>

      <?php the_post_thumbnail(); ?> 

    <?php endif; ?>

    <div class="text-box">

      <div class="header-text">

        <h1><?php the_field('header_text'); ?></h1>

        <?php if(get_field('add_button')==true): ?>

          <div class="button">

            <a href="<?php the_field('page_link'); ?>"><?php the_field('button_text'); ?></a>

          </div>

        <?php endif; ?>  

      </div>

    </div>

  </div>
  
</header>
<main id="about-page">
  

<?php if( have_rows('about_section') ): ?>
      
    <div class="section-container">

      <?php while ( have_rows('about_section') ) : the_row();

        $section = get_sub_field('section');

        $imageArray = $section['image'];

        $imageAlt = esc_attr($imageArray['alt']); 

        $imageURL = esc_url($imageArray['url']); 

        $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
        
        $imagePlacement = get_sub_field('image_placement');

        if ($imagePlacement == 'left' || $imagePlacement == 'right') : 
          if ($imagePlacement == 'left') {
             $flex = 'row';
           }elseif($imagePlacement == 'right'){
            $flex = 'row-reverse';
           } ?>
      <section class="about-section contain" style="flex-direction:<?php echo $flex; ?> ">

        <div class="image-group">
          <img src="<?php echo $imageURL ?>">
          
          <div class="image-border"></div>

        </div>
        <div class="text-box">
          
            
              
              <div class="text-container">
                <h2 class="quote-text">"<?php echo $section['title']; ?>"</h2>
                
              </div>
          
          
          <div class="sub-copy"><?php echo $section['sub_copy']; ?></div>
          <div class="image-title">
            <h4><?php echo $section['employee_name']; ?> - <?php echo $section['job_title']; ?><br><?php echo $section['location']; ?></h4>
          </div>
        </div>
            
      </section>
      <?php else: ?>
         
        <section class="about-section contain">
          <div class="text-box left">
            <h2 class="quote-text">"<?php echo $section['title']; ?>"</h2>
          </div>
          
        <div class="image-group">
          <img src="<?php echo $imageURL ?>">
          
          <div class="image-border"></div>

        </div>
        <div class="text-box right">
          
          <div class="sub-copy"><?php echo $section['sub_copy']; ?></div>
          <div class="image-title">
            <h4><?php echo $section['employee_name']; ?> - <?php echo $section['job_title']; ?><br><?php echo $section['location']; ?></h4>
          </div>
        </div>
            
      </section>
         
<?php endif; ?>
        <?php endwhile; ?> 

      </div>

    </div>

  

<?php endif; wp_reset_postdata(); ?>
</main>
<?php get_footer(); ?>
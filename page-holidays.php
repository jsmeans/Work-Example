<?php /*Template Name: Holiday Closings Page */ get_header(); 
  $headerArray = get_field('header_image');
  $imageAlt = esc_attr($headerArray['alt']); 
  $imageURL = esc_url($headerArray['url']); 
  $imageThumbURL = esc_url($headerArray['sizes']['thumbnail']); 
?>
<header>

  <div class="hero-image">
    <img src="<?php echo $imageURL; ?>">
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
<main id="holiday-closings" class="contain-small">
  <h2>All branches will be closed the following holidays.</h2>
<?php 
  $meta_query = array(
    array(
      'key' => 'date',
      'value' => date('Ymd'),
      
      'compare' => '>=',
    )
  );      
  $args = array(
    'post_type' => 'holidays',
    'orderby' => 'meta_value_num',
    'meta_key' => 'date',
    'order' => 'ASC',
    'posts_per_page' => '115',
    'meta_query' => $meta_query
  );
  $get_posts = null;
  $get_posts = new WP_Query();
  $get_posts->query($args);
  if($get_posts->have_posts()) : ?>

   <?php while($get_posts->have_posts()) : 
      $get_posts->the_post(); 
      $date = get_field('date');
      $timestamp = strtotime($date);
      $dayOfWeek = date("l", $timestamp);
      $date = new DateTime($date);
      ?>

  <div class="holiday"> 
    <div class="img-box" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
      
    </div>
    
    <div class="text-box">
      <h4><?php the_title(); ?></h4>
      <p class="holiday-date"><?php echo $dayOfWeek; ?>, <?php echo $date->format('M j Y'); ?></p>
      <?php the_content(); ?>
    </div>
    
  
  
  
  
  </div>
  

<?php
  endwhile;
  endif;
  wp_reset_postdata();
?>  
</main>


<?php get_footer(); ?>
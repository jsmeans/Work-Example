 <section class="sidebar">
  <?php 
$categories = get_the_category();
 
if ( ! empty( $categories ) ) {
    $category = $categories[0]->slug;
    $cat_name = $categories[0]->name;
}
$postID = get_the_ID();

$args = array(
  'post_type' => 'post',
  'category_name'  => $category,
  'posts_per_page' => 4,
  'post__not_in' => array($postID)
);
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ): ?>
 
  <h2>Read more about <?php echo $cat_name; ?></h2>
  <?php while ( $the_query->have_posts() ): $the_query->the_post(); $headerImage = get_the_post_thumbnail_url();?>
    
    <a href="<?php the_permalink(); ?>">

      <div class="img-holder">

        <img src="<?php echo $headerImage ?>">
        
        <div class="info">
          
          <h3><?php the_title(); ?></h3>
          
        </div>

      </div>

    </a>

  <?php endwhile; ?>
  
<?php endif; wp_reset_postdata(); ?>
<section class="cat-list">
  <h4>News Categories</h4>
  <?php
    $categories = get_categories('exclude=1&title_li=');
    foreach ($categories as $cat) {
      
        echo "<div class='cat'><h5><a href=\"". get_category_link($cat->term_id) ."\">".$cat->cat_name."</a></h5>
              <span>".$cat->category_description."(".$cat->category_count.")</span></div>";
    }
  ?>
</section>

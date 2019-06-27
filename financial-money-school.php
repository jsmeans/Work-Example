<?php /*Template Name: Financial Education & Money School Page */ get_header(); 
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

<main id="education-page" class="modular">
  <section id="featured" class="contain">
    <?php $args = array(
      'post_type' => 'post',
      'category_name'=> 'financial',
      'posts_per_page' => 3
    );

    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ): ?>
      <div class="slider">
        <div class="articles">

      <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
        <?php 

          $postID = get_sub_field('choose_post'); 

          $headerImage = get_the_post_thumbnail_url($postID);
          $categories = get_the_category($postID);
          $separator = ' ';
          $output = '';
          if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                  $output .=  $category->name . $separator;
              }
              $category = trim( $output, $separator );
          }
        ?>
        <article>

          <a class="article" href="<?php the_permalink(  $postID ); ?>">

            <div class="img">
              <img src="<?php echo $headerImage ?>" alt="<?php echo $imageAlt ?>">
            </div>
          
            <div class="text-box">

              <div class="card-text">

                <h4 class="card-title"><?php echo get_the_title($postID); ?></h4>

                <div class="post-info">
                  <p class="time" datetime="<?php echo get_the_date('c',$postID); ?>" itemprop="datePublished"><?php echo get_the_date('',$postID); ?></p> 
                  <p class="cats"> / <?php echo $category?></p>
                </div>

              </div>

            </div>

          </a>
              
        </article>

      <?php endwhile; ?>
    </div>
    <?php endif; ?>
    </section>

    <section id="tips_events" class="contain">

      <div class="money_tips">
        
        <div id="log_complete"></div>
        <div class="corner-bg"><img src="<?php echo get_template_directory_uri(); ?>/img/money_101.png"></div>
      </div>
      <div class="money_events">
      <div class="event-section-title">
        <h3>Upcoming MoneySchool Events</h3>
      </div>
      <div class="events">
        <?php 
        $args = array(
          'post_status'=>'publish',
          'post_type'=>'tribe_events',
          'posts_per_page'=>10,
          //order by startdate from newest to oldest
          'meta_key'=>'_EventStartDate',
          'orderby'=>'_EventStartDate',
          'order'=>'ASC',
          //required in 3.x
          'eventDisplay'=>'custom',
          //query events by category
          
        );
        $get_posts = null;
        $get_posts = new WP_Query();
        $get_posts->query($args);
        if($get_posts->have_posts()) : 
          while($get_posts->have_posts()) : 
            $get_posts->the_post(); ?>

        <div class="single-event"> 
          <h4><?php the_title(); ?></h4>

        
        <?php if (tribe_get_start_date() !== tribe_get_end_date() ) { ?>
          <?php echo tribe_get_start_date(); ?> - <?php echo tribe_get_end_date(); ?>
        <?php } else { ?>
          <?php echo tribe_get_start_date(); ?>
        <?php } ?>
        
        <?php the_content(); ?>
        </div>
        

      <?php
        endwhile;
        endif;
        wp_reset_postdata();
      ?>
      </div>

      </div>
    </section>
  <?php 

	  if( have_rows('modules') ):

	    while ( have_rows('modules') ) : the_row();

	      $layout = get_row_layout();      

	      get_template_part('modules/content',  $layout );     

	    endwhile;

	  endif;
	   
  ?>

<section id="calculators">
   
   <div class="calculator contain-small">
     <h3>Calculate your loan payments</h3>
     <p>Use this tool to get an idea of your estimated monthly payment on your Focus FCU loan.</p>
    <div class="form">
      <div class="input-holder">
        <div class="loan-inputs">
          <label for="loan-amount" class="loan-amount">Loan Amount:</label>
          <input type="text" class="amount" value="10,000" id="loan-amount">
        </div>
        <div class="loan-inputs">
          <label for="loan-rate" class="loan-rate">Loan Rate:</label>
          <input type="text" class="rate" value="4.95%" id="loan-rate">
        </div>
        <div class="loan-inputs">
          <label for="loan-term" class="loan-term">Loan Term:</label>
          <input type="text" class="term" value="120m" id="loan-term">
        </div>
      </div>
      <div class="result-holder">
        <div class="results">
        
        </div>
      </div>
      </div>
      <div class="disclaimer">
        <div class="dis-trigger"><img src="<?php echo get_template_directory_uri(); ?>/img/info.png"></div>
        
          <div class="dis-info" style="display:none;">
          <p>* Information and interactive calculators are made available to you as self-help tools for your independent use and are not intended to provide investment advice. We cannot and do not guarantee their applicability or accuracy in regard to your individual circumstances. All examples are hypothetical and are for illustrative purposes. We encourage you to seek personalized advice from qualified professionals regarding all personal finance issues.</p>
  
          
          </div>
      </div>
    
    </div>
  </section>
  <section id="cta-financial">

    <div class="lp-header-image" style="background-image:url(<?php the_field('finance_bg_image'); ?>); ">

      <div class="overlay">

        <div class="left"></div>

        <div class="img-object">
          
        </div>

      </div>

      <div class="text-wrap">

        <div class="text-box">

          <h2><?php the_field('finance_cta_heading'); ?></h2>

          <p><?php the_field('sub_heading'); ?></p>

          <a href="<?php the_field('finance_link_url'); ?>" class="button"><?php the_field('finance_link_text'); ?></a>

        </div> 

      </div>

    </div>

  </section>

</main>

<?php get_footer(); ?>
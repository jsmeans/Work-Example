<?php date_default_timezone_set("America/Chicago"); ?>

<!doctype html>

<html lang="en" class="no-js">

	<head>

		<meta charset="utf-8">

		<!-- Meta -->

		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<?php get_template_part('schema', 'main');?>
		
		<?php wp_head(); ?>

	</head>  
		
	<body onunload="">
    <?php 
  $meta_query = array(
    array(
      'key' => 'date',
      'value' => date('Ymd'),
      
      'compare' => '=',
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
    <div style="background-color: #c22032;position:fixed;bottom:0;left:0;width: 100vw;z-index: 42; text-align: center; padding:4px 0; font-size: 22px; color: white;-webkit-transition: all 0.5s; transition: all 0.5s;">All Branches are closed today, <?php echo $dayOfWeek; ?>, <?php echo $date->format('M j Y'); ?>, for <?php the_title(); ?>.</div>
  <?php endwhile; else: ?>

<div style="background-color: #c22032;position:fixed;bottom:0;left:0;width:100vw; z-index: 42; text-align: center; padding:4px 0; font-size: 22px; color: white;-webkit-transition: all 0.5s; transition: all 0.5s;">*Get the brand NEW Focus FCU mobile app now! <a style="color:white; text-decoration: underline;" href="<?php echo home_url(); ?>/services/mobile-banking/">Click here</a>
<div class="close-holiday" style="position: absolute;top: -10px;right: 10px;line-height: 19px;text-shadow: 0px 0px 6px #000000;"><li class="fa fa-close"></li></div>		
</div>
		<script	type="text/javascript">
      jQuery(".close-holiday").click(function(e){jQuery(this).parent().get(0).style.left = '100vw'; sessionStorage.setItem('seen',true);});
			let seen = sessionStorage.getItem('seen')
			if(!seen) {
				jQuery(".close-holiday").parent().get(0).style.display = "block";
			}
      </script>
<?php endif; wp_reset_postdata();?>
		<nav class="navbar">  

			<div class=logo-wrap>
        
        <svg version="1.1" class="svg-banner"
           xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
           x="0px" y="0px" width="175px" height="50px" style="enable-background:new 0 0 233 197.1;"
           xml:space="preserve">
        
        
        <polygon class="banner" points="233,125 0,170 0,0 233,0 "/>
        </svg>

				<a href="<?php echo home_url(); ?>" class="logo">

					<?php 

						$custom_logo_id = get_theme_mod( 'custom_logo' );

						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

					?>

					<!-- <img src="<?php echo $image[0]; ?>">  -->

          <?php include('logo.php'); ?>  

				</a>

			</div>

			<?php main_nav(); ?>
      <div class="nav-trigger"><span></span></div>
			<div class="login"><a href="#">My Account</a></div>
  		
      <div class="login-container">
        <div class="member-login">
          <div class="member-form">
            <form method="POST" action="https://my.focusok.com/login" autocomplete="off"> <label>
              Username
              <input type="text" name="username" spellcheck="off" autocorrect="off" autocapitalize="off" required>

              </label>

              <button class="g-button left" type="submit">Sign in</button><button class="g-button right" ><a href="https://my.focusok.com/enroll">Enroll</a></button> </form>
          </div>
        </div>
        <div class="login-links">
          
          <a href="https://my.focusok.com/forgot">Forgot Your Password?</a>
          <a href="https://my.focusok.com/enroll">First Time User?</a>
        </div>
        <?php 
          $post_ID = get_field('featured_post', 'option');
          $featured_post = get_post( $post_ID, ARRAY_A );
          $title = $featured_post['post_title'];
          $featured_date = $featured_post['post_date'];
          $featured_excerpt = $featured_post['post_excerpt'];
          $headerImage = get_the_post_thumbnail_url($post_ID);
           ?>

          <a class="article" href="<?php the_permalink($post_ID); ?>">
            <div class="img">
              <img src="<?php echo $headerImage ?>" alt="<?php echo $imageAlt ?>">
            </div>
            <div class="text-box">
              <div class="card-text">
                <h5 class="card-title"><?php echo $title; ?></h5>
                <p><?php echo $featured_excerpt; ?></p>

              </div>
            </div>
          </a>
        </div>
      </nav>
			

	 
		
		

 

<header id="landing-header">

    <div class="lp-header-image">

      <?php $headerArray = get_the_post_thumbnail(); ?>

      <?php echo $headerArray; ?>

      <div class="overlay">

        <div class="left"></div>

        <div class="img-object"></div>

      </div>

      <div class="text-wrap">

        <div class="text-box">

          <h1><?php the_title(); ?></h1>

          <h5>GET A FREE ESTIMATE NOW FROM THE SALAZAR FAMILY</h5>

          <a href="<?php echo home_url(); ?>/estimate" class="button">Get an estimate</a>

        </div> 

      </div>

    </div>

</header>
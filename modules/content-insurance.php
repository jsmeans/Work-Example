<section id="insurance">

    <div class="estimate-header-image">

      <?php $headerArray = get_the_post_thumbnail(); ?>

      <?php echo $headerArray; ?>
      <div class="overlay-bg"></div>
      <div class="overlay">
        <div class="image-holder active" data-option="1">
          <img src="<?php echo get_template_directory_uri(); ?>/img/caller.png">
        </div>
        <div class="image-holder" data-option="2">
          <img src="<?php echo get_template_directory_uri(); ?>/img/inspector.png">
        </div>
        <div class="image-holder" data-option="3">
          <img src="<?php echo get_template_directory_uri(); ?>/img/handshaker.png">
        </div>
        <div class="image-holder" data-option="4">
          <img src="<?php echo get_template_directory_uri(); ?>/img/negotiator.png">
        </div>
        <div class="image-holder" data-option="5">
          <img src="<?php echo get_template_directory_uri(); ?>/img/repairer.png">
        </div>
        <div class="angle"></div>

      

      <div class="text-wrap">

        <div class="text-box active" data-option="1">

          <h3>Call <?php the_field('company_name', 'option'); ?> before contacting your Insurance Claims Department. We’ll assist you with the inspection and document evidence of damage.</h3>
          
        </div>
        <div class="text-box" data-option="2">

          <h3>Once one of our project manager’s has completed their inspection, we’ll guide through the process of contacting your insurance company and filing a claim.</h3>
          
        </div> 
        <div class="text-box" data-option="3">

          <h3>Your <?php the_field('company_name', 'option'); ?> Representative will meet with the adjuster to assist in their inspection and determining the overall scope of repair.</h3>
          
        </div> 
        <div class="text-box" data-option="4">

          <h3>Scope of repairs and associated pricing are finalized between the adjuster and <?php the_field('company_name', 'option'); ?>. Any discrepancies between estimates will be negotiated on your behalf.</h3>
          
        </div> 
        <div class="text-box" data-option="5">

          <h3><?php the_field('company_name', 'option'); ?> will swiftly complete your repairs and send your insurance company necessary documentation once your project is complete.</h3>
          
        </div> 
        <div class="text-box">

          <h3>Find out more about how we help you navigate the insurance process. We are here to help!</h3>
          
        </div>  
      </div>
    </div>
      </div>
      <form class="insurance-form">
        <ul>
          <li class="insurance-select active" data-option="1">
            <h3>1. Call Us First <span><img src="<?php echo get_template_directory_uri(); ?>/img/call.png"></span></h3>
          </li>
          <li class="insurance-select" data-option="2">
            <h3>2. We Do the inspection<span><img src="<?php echo get_template_directory_uri(); ?>/img/inspect.png"></span></h3>
          </li>
          <li class="insurance-select" data-option="3">
            <h3>3. We meet with your adjuster<span><img src="<?php echo get_template_directory_uri(); ?>/img/handshake.png"></span></h3>
          </li>
          <li class="insurance-select" data-option="4">
            <h3>4. We help you negotiate<span><img src="<?php echo get_template_directory_uri(); ?>/img/negotiate.png"></span></h3>
          </li>
          <li class="insurance-select" data-option="5">
            <h3>5. We do the repairs<span><img src="<?php echo get_template_directory_uri(); ?>/img/repair.png"></span></h3>
          </li>
        </ul>
        <?php the_field('form_field'); ?>

      </form>
    

</section>
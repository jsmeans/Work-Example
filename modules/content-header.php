
<div id="page-header">

  <div class="header-image">

    <?php $headerArray = get_the_post_thumbnail(); ?>

    <?php echo $headerArray; ?>

    <div class="overlay">
    </div>

    <div class="text-wrap contain">

      <div class="text-box">

        <h1><?php the_field('header_text'); ?></h1>

        <h5></h5>

        

      </div> 

    </div>

  </div>

</div>

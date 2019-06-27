<?php 

$video = get_sub_field('the_video');
$image = get_sub_field('placeholder_image');

?>

<section class="module video">

  <div class="contain-small">

    <a href="<?php echo $video ?>" class="davideo">

      <img src="<?php echo $image ?>">

      <div class="overlay"></div>

    </a>

  </div>

</section>

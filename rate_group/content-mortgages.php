<?php if( have_rows('options') ): ?>
    
    <div class="rates mortgages">

      <div class="rate-block" >

        <h3 class="card-title">Product</h3>
        <h3 class="card-term">Rate</h3>
        <h3 class="card-rate">
          Annual Percentage Rate
          <div class="as-low-as">As Low As</div>
        </h3>

      </div>

      <?php while ( have_rows('options') ) : the_row(); 
        $loanType = get_sub_field('selected');
        $rateChoice = get_field( $loanType , 'option');
        $rate = $rateChoice['rate'];
        $APR = $rateChoice['apr'];
        $loanTitle = $rateChoice['title'];
      ?>

        

          <div class="rate-block" >

            <p class="card-title"><?php echo $loanTitle ?></p>
            <p class="card-term"><?php echo $rate; ?><sup>%</sup></p>
            <p class="card-rate"><?php echo $APR ?><sup>%</sup><span> APR</span></p>

          </div>

      <?php endwhile; ?>
      <div class="disclaimer">
        <div class="dis-trigger"><img src="<?php echo get_template_directory_uri(); ?>/img/info.png"></div>
        <?php $disclaimer = get_field( 'mortgage_disclaimer' , 'option');
              $disInfo = $disclaimer['disclaimer'];
              $disDate = $disclaimer['date'];
         ?>
         <div class="dis-info" style="display:none;">

          <?php if($disInfo){?>
            <?php echo $disInfo; ?>
          <?php } ?>

          <?php if($disDate){?>
            <p>Rate effective as of <?php echo $disDate; ?></p>
          <?php } ?>
         </div>
      </div>
    </div>
      <?php endif;?>
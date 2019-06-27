<?php if( have_rows('options') ): ?>
    
    <div class="rates mortgages">

      <div class="rate-block" >
            <p class="card-title">Product</p>
            <div class="rate-table-x">
              <h4 class="test">LTV 0 - 80</h4>
              <div class="the-rates">
                <p class="card-term">Rate</p>
                <p class="card-rate">APR</p>
              </div>
              
            </div>
            <div class="rate-table-x">
              <h4>LTV 81 - 90</h4>
              <div class="the-rates">
                <p class="card-term">Rate</p>
                <p class="card-rate">APR</p>
              </div>
            </div>
            <div class="rate-table-x">
              <h4>LTV 91 - 95</h4>
              <div class="the-rates">
                <p class="card-term">Rate</p>
                <p class="card-rate">APR</p>
              </div>
            </div>
          </div>

      <?php while ( have_rows('options') ) : the_row(); 
        $loanType = get_sub_field('selected');
        $rateChoice = get_field( $loanType , 'option');
        $loanTitle = $rateChoice['title'];


        if( have_rows( $loanType , 'option') ):
          while( have_rows( $loanType , 'option') ): the_row();
            $ltv80 = get_sub_field('ltv_0_to_80','option');
            $rate1 = $ltv80['rate'];
            $APR1 = $ltv80['apr'];

            $ltv90 = get_sub_field('ltv_81_to_90','option');
            $rate2 = $ltv90['rate'];
            $APR2 = $ltv90['apr'];

            $ltv95 = get_sub_field('ltv_91_to_95','option');
            $rate3 = $ltv95['rate'];
            $APR3 = $ltv95['apr'];

          endwhile;
        endif;
        
      ?>

        

          <div class="rate-block" >
            <p class="card-title"><?php echo $loanTitle ?></p>
            <div class="rate-table">
              <p class="card-term"><?php echo $rate1; ?><sup>%</sup></p>
              <p class="card-rate"><?php echo $APR1 ?><sup>%</sup><span> APR</span></p>
            </div>
            <div class="rate-table">
              <p class="card-term"><?php echo $rate2; ?><sup>%</sup></p>
              <p class="card-rate"><?php echo $APR2 ?><sup>%</sup><span> APR</span></p>
            </div>
            <div class="rate-table">
              <p class="card-term"><?php echo $rate3; ?><sup>%</sup></p>
              <p class="card-rate"><?php echo $APR3 ?><sup>%</sup><span> APR</span></p>
            </div>
          </div>

      <?php endwhile; ?>
      <div class="disclaimer">
        <div class="dis-trigger"><img src="<?php echo get_template_directory_uri(); ?>/img/info.png"></div>
        <?php $disclaimer = get_field( '2nd_mortgage_disclaimer' , 'option');
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
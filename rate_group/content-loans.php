<?php if( have_rows('loan_options') ): ?>
    
    <div class="rates loan">

      <div class="rate-block" >

        <h3 class="card-title">Product</h3>
        <h3 class="card-term">Term</h3>
        <h3 class="card-rate">
          Annual Percentage Rate
          <div class="as-low-as">As Low As</div>
        </h3>

      </div>

      <?php while ( have_rows('loan_options') ) : the_row(); 
        $loanType = get_sub_field('selected');
        $rateChoice = get_field( $loanType , 'option');
        $rate = $rateChoice['rate'];
        $term = strlen($rateChoice['term'])>0?$rateChoice['term'].' mos':'N/A';
        $date = $rateChoice['date'];
        $loanTitle = $rateChoice['title'];
      ?>

        

          <div class="rate-block" >

            <p class="card-title"><?php echo $loanTitle ?></p>
            <p class="card-term"><?php echo $term ?></p>
            <p class="card-rate">
              <?php echo $rate; ?><sup>%</sup>
              <span> APR</span>
            </p>

          </div>

      <?php endwhile; ?>
      <div class="disclaimer">
        <div class="dis-trigger"><img src="<?php echo get_template_directory_uri(); ?>/img/info.png"></div>
        <?php $disclaimer = get_field( 'loan_disclaimer' , 'option');
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
          <?php if (get_sub_field('add_extra_disclaimer') == true) :
            $disExtra = get_sub_field('extra_disclaimer'); ?>
            <div style="display: inline-block;position: absolute;z-index: 20;padding: 0 10px;left: 20px;top: -20px;">
              <?php echo $disExtra; ?>
            </div>
          <?php endif; ?>
      </div>
    </div>
      <?php endif;?>
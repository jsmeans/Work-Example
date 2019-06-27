<section class="module rate-cards">

  <?php 
$i = 0;
if( have_rows('choose_rates') ): 
    
  while ( have_rows('choose_rates') ) : the_row(); 
    $i++;
  endwhile;
  if ($i==1) {
    $numCards = 'one';
  }elseif($i==2){
    $numCards = 'two';
  }elseif($i==3){
    $numCards = 'three';
  }else{
    $numCards = 'four';
  }
  
endif;
  $testing = get_sub_field('rate_picker'); 

  $rateChoice = get_field( 'loans' , 'option');

  $rate = $rateChoice[$testing];
  if(get_field('rates_section_heading')): ?>
  <h2><?php the_field('rates_section_heading'); ?></h2>
<?php endif; ?>
  <?php if( have_rows('choose_rates') ): ?>
      
    <div class="block-holder contain">

      

      <?php while ( have_rows('choose_rates') ) : the_row(); 

        $typeSelect = get_sub_field('select'); 

        if ($typeSelect == 'Loans'):
          $loanType = get_sub_field('loans');
          $rateChoice = get_field( $loanType , 'option');
          $rate = $rateChoice['rate'];
          $date = $rateChoice['date'];
          $term = $rateChoice['term'];
          $loanTitle = $rateChoice['title'];
          ?>

          <div class="card-block <?php echo $numCards?>" >

          

              <div class="text-box">

                <div class="card-text">

                  <h3 class="card-title"><?php the_sub_field('loan_type'); ?></h3>

                  <p class="card-brow">as low as:</p>

                  <p class="card-rate"><?php echo $rate; ?><sup>%</sup><span> APR</span></p>

                  

                </div>
                
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
                </div>
              

              </div>

          

          </div>

        <?php elseif ($typeSelect == 'Mortgages'):
          $loanType = get_sub_field('mortgages');
          $rateChoice = get_field( $loanType , 'option');
          $rate = $rateChoice['rate'];
          $term = $rateChoice['term'];
          $loanTitle = $rateChoice['title'];
          ?>

          <div class="card-block <?php echo $numCards?>">
            
          

              <div class="text-box">

                <div class="card-text">

                  <h3 class="card-title"><?php the_sub_field('loan_type'); ?></h3>

                  <p class="card-brow">as low as:</p>

                  <p class="card-rate"><?php echo $rate; ?><sup>%</sup><span> APR</span></p>

                  

                </div>

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

        

          </div>

        <?php elseif ($typeSelect == 'Savings'):
          $loanType = get_sub_field('savings');
          $rateChoice = get_field( $loanType , 'option');
          $rate = $rateChoice['dividend_rate'];
          $apy = $rateChoice['apy'];
          $loanTitle = $rateChoice['title'];
          ?>

          <div class="card-block <?php echo $numCards?>">
            
          

              <div class="text-box">

                <div class="card-text">
                  <h3 class="card-title"><?php the_sub_field('loan_type'); ?></h3>
                  <p class="card-brow">Dividend Rate:</p>

                  

                  <p class="card-rate"><?php echo $rate; ?><sup>%</sup><span> APY</span></p>

                 

                </div>

                <div class="disclaimer">
                  <div class="dis-trigger"><img src="<?php echo get_template_directory_uri(); ?>/img/info.png"></div>
                  <?php $disclaimer = get_field( 'savings_disclaimer' , 'option');
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

           

          </div>

        <?php elseif ($typeSelect == 'Certificates'):
          $loanType = get_sub_field('certificates');
          $rateChoice = get_field( $loanType , 'option');
          $rate = $rateChoice['dividend_rate'];
          $apy = $rateChoice['apy'];
          $loanTitle = $rateChoice['title'];
          ?>

          <div class="card-block <?php echo $numCards?>">
            
          

              <div class="text-box">

                <div class="card-text">
                  <h3 class="card-title"><?php the_sub_field('loan_type'); ?></h3>
                  <p class="card-brow">Dividend Rate:</p>

                  

                  <p class="card-rate"><?php echo $rate; ?><sup>%</sup><span> APY</span></p>

                 

                </div>

                <div class="disclaimer">
                  <div class="dis-trigger"><img src="<?php echo get_template_directory_uri(); ?>/img/info.png"></div>
                  <?php $disclaimer = get_field( 'savings_disclaimer' , 'option');
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

           

          </div>

        <?php endif; ?>


         
      <?php endwhile; ?>

    </div>
  <div class="cta-box">
    <a class="button" href="/rates/">See All Rates</a>
  </div>
   <?php  endif; ?> 
</section>
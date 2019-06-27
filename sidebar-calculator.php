<section id="sidebar">
<?php 
  $typeSelect = get_field('loan_type'); 

  if ($typeSelect == 'Loans'):
    $picker = get_field('rate_picker'); 
    $rateChoice = get_field( $picker , 'option');
    $rate = $rateChoice['rate'];
    $term = $rateChoice['term'];
    $loanTitle = $rateChoice['title'];
    $loanAmount = '$30,000';
    $disclaimer = get_field( 'loan_disclaimer' , 'option');
    $disInfo = $disclaimer['disclaimer'];
    $disDate = $disclaimer['date'];
    elseif($typeSelect == 'Mortgages'):
    $picker = get_field('mortgage_type'); 
    $rateChoice = get_field( $picker , 'option');
    $rate = $rateChoice['apr'];
    $term = $rateChoice['term'].'y';
    $loanTitle = $rateChoice['title'];
    $loanAmount = '$100,000';
    $disclaimer = get_field( 'mortgage_disclaimer' , 'option');
    $disInfo = $disclaimer['disclaimer'];
    $disDate = $disclaimer['date'];
    elseif($typeSelect == '2_mort'):
    $picker = get_field('2nd_mortgages'); 
    $rateChoice = get_field( $picker , 'option');
    $rate = $rateChoice['rate'];
    $term = $rateChoice['term'];
    $loanTitle = $rateChoice['title'];
    $disclaimer = get_field( '2nd_mortgage_disclaimer' , 'option');
    $disInfo = $disclaimer['disclaimer'];
    $disDate = $disclaimer['date'];
    elseif($typeSelect == 'Savings'):
    $picker = get_field('savings'); 
    $rateChoice = get_field( $picker , 'option');
    $rate = $rateChoice['rate'];
    $term = $rateChoice['term'];
    $loanTitle = $rateChoice['title'];
    $disclaimer = get_field( 'savings_disclaimer' , 'option');
    $disInfo = $disclaimer['disclaimer'];
    $disDate = $disclaimer['date'];
    elseif($typeSelect == 'Certificates'):
    $picker = get_field('certificates'); 
    $rateChoice = get_field( $picker , 'option');
    $rate = $rateChoice['dividend_rate'];
    $APY = $rateChoice['apy'];
    $deposit = $rateChoice['minimum_deposit'];
    $disclaimer = get_field( 'certificates_disclaimer' , 'option');
    $disInfo = $disclaimer['disclaimer'];
    $disDate = $disclaimer['date'];
  endif;
?>

  <div class="super">
    <?php the_field('rate_type'); ?> Rates as low as:
  </div>
  <h3 class="featured-rate"><?php echo $rate; ?>% <span>APR</span></h3>
  <div class="calculator">
    <h3>Calculate Your <?php the_field('rate_type'); ?> payment.</h3>
  <div class="form">
    <div class="loan-inputs">
      <label for="loan-amount" class="loan-amount">Loan Amount:</label>
      <input type="text" class="amount" value="<?php echo $loanAmount; ?>" id="loan-amount">
    </div>
    <div class="loan-inputs">
      <label for="loan-rate" class="loan-rate">Loan Rate:</label>
      <input type="text" class="rate" value="<?php echo $rate; ?>%" id="loan-rate">
    </div>
    <div class="loan-inputs">
      <label for="loan-term" class="loan-term">Loan Term:</label>
      <input type="text" class="term" value="<?php echo $term; ?>" id="loan-term">
    </div>
    <div class="results">
      
    </div>
    <div class="disclaimer">
      <div class="dis-trigger"><img src="<?php echo get_template_directory_uri(); ?>/img/info.png"></div>
      
       <div class="dis-info" style="display:none;">
        <p>* Information and interactive calculators are made available to you as self-help tools for your independent use and are not intended to provide investment advice. We cannot and do not guarantee their applicability or accuracy in regard to your individual circumstances. All examples are hypothetical and are for illustrative purposes. We encourage you to seek personalized advice from qualified professionals regarding all personal finance issues.</p>

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
</section>
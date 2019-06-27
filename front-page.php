<?php /*Template Name: Front Page */ get_header(); 
  $headerArray = get_field('header_image');
  $imageAlt = esc_attr($headerArray['alt']); 
  $imageURL = esc_url($headerArray['url']); 
  $imageThumbURL = esc_url($headerArray['sizes']['thumbnail']); 
?>
<header>

  <div class="hero-image">
    <img src="<?php echo $imageURL; ?>">
    <div class="text-box">
      <div class="header-text">
        <h1><?php the_field('header_text'); ?></h1>
        <?php if(get_field('add_button')==true): ?>
        <div class="button">

          <a href="<?php the_field('page_link'); ?>"><?php the_field('button_text'); ?></a>
        </div>
      <?php endif; ?>  
      </div>
    </div>
  </div>
  
</header>

<main id="frontpage" class="fp">
  
  <section class="fp small-blocks">

    <div class="contain">

      <!-- <?php if(get_field('intro_section_title')) : ?>

        <div class="section-header">

          <h2><?php the_field('intro_section_title'); ?></h2>

        </div>

      <?php endif; ?> -->
      <?php 

  if( have_rows('small_card_links') ): ?>
      
    
      <div class="articles">

      <?php while ( have_rows('small_card_links') ) : the_row();

        $card = get_sub_field('card');

        $imageArray = $card['image'];

        $imageAlt = esc_attr($imageArray['alt']); 

        $imageURL = esc_url($imageArray['url']); 

        $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
        

      ?>
      

          <article>

            <a class="article" href="<?php echo $card['link']; ?>">

              <div class="img">
                <div class="bg-img" style="background-image:url(<?php echo $imageURL ?>;" ></div>
              </div>
              <div class="text-box">
                <h5 class="card-text"><?php echo $card['title']; ?></h5>
                <p><?php echo $card['text']; ?></p>
              </div>
              
            </a>
            
          </article>

        <?php endwhile; ?> 

      </div>

    </div>

  

<?php endif; ?>

</section>
<!-- <section class="fp quick" style="background-image: url(<?php the_sub_field('bg_image'); ?>)">

  <div class=" contain-small section-header">

    <h3><?php the_field('quick_section_heading') ?></h3>

    

  </div>

  <?php if(have_rows('quick_section')) : ?>

    <?php $i = 0; ?>

    <?php while(have_rows('quick_section')) : the_row(); ?>

      <?php $i++; ?>

    <?php endwhile; ?>

  <?php endif; ?>

 

  <?php if( have_rows('quick_section') ): ?> 

    <div class="contain logo-container" >

      <?php while ( have_rows('quick_section') ) : the_row();?>

        <section class="link-box" style="width:calc(100% / <?php echo $i; ?>);"> 
          <a href="<?php the_sub_field('link_url'); ?>">
            <div class="logo-holder" >

              <img src="<?php the_sub_field('icon'); ?>"> 
              <h5><?php the_sub_field('link_text'); ?></h5>
            </div>
            
         </a>
        </section>

      <?php endwhile; ?>
      
    </div>

  <?php else : endif; ?>       

</section> -->
<section class="fp card-blocks">

    <div class="contain">

      <?php if(get_sub_field('section_title')) : ?>

        <div class="section-header">

          <h2><?php the_sub_field('section_title'); ?></h2>

        </div>

      <?php endif; ?>
      <?php 

  if( have_rows('card_link') ): ?>
      
    
      <div class="articles">

      <?php while ( have_rows('card_link') ) : the_row();

        $card = get_sub_field('card');

        $imageArray = $card['image'];

        $imageAlt = esc_attr($imageArray['alt']); 

        $imageURL = esc_url($imageArray['url']); 

        $imageThumbURL = esc_url($imageArray['sizes']['thumbnail']); 
        
      ?>
      

          <article>

            <a class="article" href="<?php echo $card['link']; ?>">
<div class="link-box">
              <div class="img">
                <img src="<?php echo $imageURL ?>" alt="<?php echo $imageAlt ?>">
              </div>
              <div class="text-box">
                <h5 class="card-text"><?php echo $card['title']; ?></h5>
                <?php if ($card['excerpt']) :?>
                  <p><?php echo $card['excerpt']; ?></p>
                <?php endif;?>
              </div>
              </div>
            </a>
            
          </article>

        <?php endwhile; ?> 

      </div>

    </div>

  

<?php endif; wp_reset_postdata(); ?>

</section>
<section class="fp rate-cards">

  <?php 
$i = 0;
if( have_rows('fp_choose_rates') ): 
    
  while ( have_rows('fp_choose_rates') ) : the_row(); 
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
  $testing = get_field('rate_picker'); 

  $rateChoice = get_field( 'loans' , 'option');

  $rate = $rateChoice[$testing];
  if(get_field('rates_section_heading')): ?>
  <h3><?php the_field('rates_section_heading'); ?></h3>
<?php endif; ?>
  <?php if( have_rows('fp_choose_rates') ): ?>
      
    <div class="block-holder contain">

      

      <?php while ( have_rows('fp_choose_rates') ) : the_row(); 

        $typeSelect = get_sub_field('select'); 

        if ($typeSelect == 'Loans'):
          $loanType = get_sub_field('loans');
          $rateChoice = get_field( $loanType , 'option');
          $rate = $rateChoice['rate'];
          $term = $rateChoice['term'];
          $loanTitle = $rateChoice['title'];
          ?>

          <div class="card-block <?php echo $numCards?>" >
            

              <div class="text-box">

                <div class="card-text">

                  <h3 class="card-title"><?php the_sub_field('loan_title'); ?></h3>

                  <p class="card-brow">as low as:</p>

                  <p class="card-rate"><?php echo $rate; ?><sup>%</sup><span> APR</span></p>

                  

                </div>
                
              </div>


          </div>

        <?php elseif ($typeSelect == 'Mortgages'):
          $loanType = get_sub_field('mortgages');
          $rateChoice = get_field( $loanType , 'option');
          $rate = $rateChoice['apr'];
          $term = $rateChoice['term'];
          $loanTitle = $rateChoice['title'];
          ?>

          <div class="card-block <?php echo $numCards?>">
            
           

              <div class="text-box">

                <div class="card-text">

                  <h3 class="card-title"><?php the_sub_field('loan_title'); ?></h3>

                  <p class="card-brow">as low as:</p>

                  <p class="card-rate"><?php echo $rate; ?><sup>%</sup><span> APR</span></p>

                  

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
                  <h3 class="card-title"><?php the_sub_field('loan_title'); ?></h3>
                  <p class="card-brow">Dividend Rate:</p>

                  

                  <p class="card-rate"><?php echo $rate; ?><sup>%</sup><span> APY</span></p>

                 

                </div>
                
              </div>

           

          </div>

        <?php endif; ?>


         
      <?php endwhile; ?>

    </div>
  <div class="cta-box">
    <a class="button" href="/rates">See All Rates</a>
  </div>
  <?php  endif; ?>   
  
</section>

<section class="fp principles ">
  
  
</section>

<section class="fp logos" style="background-image: url(<?php the_sub_field('bg_image'); ?>)">

  <div class=" contain-small section-header">

    <h3><?php the_field('section_heading') ?></h3>

    
  </div>

  <?php if(have_rows('logo_section')) : ?>

    <?php $i = 0; ?>

    <?php while(have_rows('logo_section')) : the_row(); ?>

      <?php $i++; ?>

    <?php endwhile; ?>

  <?php endif; ?>

  <?php if( have_rows('logo_section') ): ?> 

    <div class="contain logo-container">

      <?php while ( have_rows('logo_section') ) : the_row();?>

        <a href="<?php the_sub_field('link'); ?>" target="_blank"> 
          
          <div class="logo-holder">

            <img src="<?php the_sub_field('logo'); ?>"> 

          </div>
           
        </a>

      <?php endwhile; ?>
      
    </div>

  <?php else : endif; ?>       

</section>

<section class="fp principles" id="landing-header">
<?php $number = mt_rand(1,5); ?>
  <div class="lp-header-image" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/principle-bg-<?php echo $number; ?>.jpg">

    <div class="overlay">

      <div class="left"></div>

      <div class="img-object">
        
      </div>

    </div>

    <div class="text-wrap">

      <div class="text-box">

        
        <div class="contain-small">
          <img src="<?php echo get_template_directory_uri(); ?>/img/principle-<?php echo $number; ?>.png">
        </div>

      </div> 

    </div>

  </div>

</section>


</main>
  

<?php get_footer(); ?>

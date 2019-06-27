<?php /*Template Name: Locations Page */ get_header(); ?>

  <style>
  /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map_canvas {
        height: 100%;
        position: absolute;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;

        margin: 0;
        padding: 0;
      }
    </style>
    <header>
    <div class="hero-image">
      <div id="map_canvas"></div>
    </div>
  </header>
  <main id="locations"> 
   
    <section class="module small-blocks">

    <div class="contain">

     

       
    
      <div class="articles">

        <div class="locations">
          <article>

            <a class="map-link" href="#" data-lat="35.477808" data-lon="-97.504542">
              <div class="link-box">
                <div class="img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/main.jpg" alt="<?php echo $imageAlt ?>">
                </div>
                <div class="text-box">
                  <h5 class="card-text">Main Branch</h5>
                  <p>420 N.E. 10th Street, Oklahoma City, OK 73104</p>


                </div>
              </div>
            </a>
            
          </article>
          <div class="info">
            <p><span>Phone</span>: <a class="contact-info" href="tel:14052301328">405.230.1328</a></p>

            <p><span>Toll Free:</span> <a class="contact-info" href="tel:18008318932">800.831.8932</a></p>

            <p><span>Fax:</span> 405.488.2818</p>

            <p><span>Lobby Hours:</span> Mon. – Fri. 8:30AM to 5:00PM<br>

            <p><span>Drive-thru Hours:</span> Mon. – Fri. 7:30AM to 6:00PM and Sat. 9:00AM to 12:00PM</p>
          </div>
        </div>
         <div class="locations">
           <article>

            <a class="map-link" href="#" data-lat="35.604943" data-lon="-97.621196">
              <div class="link-box">
                <div class="img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/northwest.jpg" alt="<?php echo $imageAlt ?>">
                </div>
                <div class="text-box">
                  <h5 class="card-text">Northwest Branch</h5>
                  <p>13325 N. MacArthur Blvd, Suite 1, Oklahoma City, OK 73142</p>


                </div>
              </div>
            </a>
            
          </article>
          <div class="info">
            <p><span>Phone:</span> <a class="contact-info" href="tel:14052301328">405.230.1328</a></p>

            <p><span>Fax:</span> <a class="contact-info" href="tel:14052301328">405.721.8178</a></p>

            <p><span>Lobby Hours:</span> Mon. – Fri. 9:00AM to 4:30PM and Sat. 9:00AM to 12:00PM</p>

            <p><span>Drive-thru Hours:</span> Mon. – Fri. 8:00AM to 5:30PM and Sat. 9:00AM to 12:00PM</p>
          </div>
        </div>
        <div class="locations">
           <article>

            <a class="map-link" href="#" data-lat="35.032135" data-lon="-97.933476">
              <div class="link-box">
                <div class="img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/chickasha.jpg" alt="<?php echo $imageAlt ?>">
                </div>
                <div class="text-box">
                  <h5 class="card-text">Chickasha Branch</h5>
                  <p>1804 S. First Street,
Chickasha, OK 73018</p>


                </div>
              </div>
            </a>
            
          </article>
          <div class="info">
            <p><span>Phone:</span> <a class="contact-info" href="tel:14052220012">405.222.0012</a></p>

            <p><span>Fax:</span> <a class="contact-info" href="tel:14052220114">405.222.0114</a></p>

            <p><span>Lobby Hours:</span> Mon. – Fri. 9:00AM to 5:00PM, closed Saturdays</p>

            <p><span>Drive-thru Hours:</span> Mon. – Fri. 8:00AM to 6:00PM and Saturdays 9:00AM to 12:00PM</p>
          </div>
        </div>
        <div class="locations">
           <article>

            <a class="map-link" href="#" data-lat="35.291763" data-lon="-97.61213">
              <div class="link-box">
                <div class="img">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/tricity.jpg" alt="<?php echo $imageAlt ?>">
                </div>
                <div class="text-box">
                  <h5 class="card-text">Tri-City Branch</h5>
                  
                  <p>1097 NW 32nd Street, Newcastle, OK 73065</p>

                </div>
              </div>
            </a>
            
          </article>
          <div class="info">
            <p><span>Phone:</span> <a class="contact-info" href="tel:14053923400">405.392.3400</a></p>

            <p><span>Fax:</span> <a class="contact-info" href="tel:14053925049">405.392.5049</a></p>

            <p><span>Lobby Hours:</span> Mon. – Fri. 9:00AM to 5:00PM, closed Saturdays</p>

            <p><span>Drive-thru Hours:</span> Mon. – Fri. 8:00AM to 6:00PM and Saturdays 9:00AM to 12:00PM</p>
          </div>
        </div>
        

      </div>

    </div>
</section>
	  
  <?php 

	  if( have_rows('modules') ):

	    while ( have_rows('modules') ) : the_row();

	      $layout = get_row_layout();      

	      get_template_part('modules/content',  $layout );     

	    endwhile;

	  endif;
	   
  ?>

</main>
<?php get_footer(); ?>
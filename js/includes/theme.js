jQuery(document).ready(function($){
$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
        window.location.reload() 
    }
});
   // Trigger Mobile Menu 
  $('.nav-trigger').click(function(){
    
    
    if($(this).hasClass('active')){
      $('.nav-trigger').removeClass('active');
      $('.sub-nav-trigger').removeClass('active');
      $('.sub-nav-trigger-1').removeClass('active');
      $('#main-menu').removeClass('active');
      $('.topnav').removeClass('active outLeft');
      $('.dropdown-menu').removeClass('active');
      $('.in-dropdown').removeClass('active');
      $('.lvl0').removeClass('open');
      $('.lvl1').removeClass('open');
    }else{
      $('.nav-trigger').addClass('active');
      $('#main-menu').addClass('active');
      $('.topnav').addClass('active');
    }
  });
  $('.sub-nav-trigger').click(function(){
    var activeLink = $(this);

    if($(this).hasClass('active')){
      activeLink.removeClass('active');
      $('.lvl0.open').addClass('close');
      $('.dropdown-menu.active').queue(function () {
        $(this).removeClass('active').delay(500).queue(function () {
            $('.lvl0.open').removeClass('close open');
            $(activeLink).parents('.topnav').toggleClass('outLeft');
            
            $(this).dequeue();
        }).dequeue()
      });
      if ($('.in-dropdown').hasClass('active')) {
        $('.lvl1.open').removeClass('open');
        $('.in-dropdown.active').queue(function () {
          $(this).removeClass('active').delay(500).queue(function () {
              $('.lvl0.open').removeClass('close open');
              $(activeLink).parents('.dropdown-menu').toggleClass('active');
              $(activeLink).parents('.topnav').toggleClass('outLeft');
              $('.sub-nav-trigger-1.active').removeClass('active');
              $(this).dequeue();
          }).dequeue();
        });
      }
    }else{
      activeLink.addClass('active');
      $('.topnav').queue(function () {
        $(this).addClass('outLeft').delay(500).queue(function () {
            $(activeLink).parent().toggleClass('open');
            $(activeLink).next('.dropdown-menu').toggleClass('active');
            $(this).dequeue();
        }).dequeue()
      });
    }
    
  });
  
  $('.sub-nav-trigger-1').click(function(){
    var activeLink = $(this);
    
    if($(this).hasClass('active')){
      activeLink.toggleClass('active');
      $('.lvl1.open').addClass('close');
      $('.in-dropdown.active').queue(function () {
        $(this).removeClass('active').delay(500).queue(function () {
            $(activeLink).parents('.dropdown-menu').toggleClass('active');
            $('.lvl1.open').removeClass('close open');
            $(this).dequeue();
        }).dequeue();
      });
    }else{

      var activeLink = $(this);
      var menumarker = $(this).parents('.dropdown-menu');
      $(menumarker).queue(function () {
        activeLink.addClass('active');
        $(this).toggleClass('active').delay(500).queue(function () {
            $(activeLink).parent().toggleClass('open');
            $(activeLink).next('.nav-holder-2').find('.in-dropdown').toggleClass('active');
            $(this).dequeue();
        }).dequeue();
      });
    }
    
  });
  
$('.rate-group-title').click(function(e){
  e.preventDefault();
  $(this).siblings('.rates').slideToggle('');
  $(this).parent('.rate-group').toggleClass('selected');
});
$('.dis-trigger').click(function(e){
  e.preventDefault();
  $(this).siblings('.dis-info').slideToggle('');
  
});
$('.login').click(function(e){
  e.preventDefault();
  $(this).siblings('.login-container').toggleClass('open');
  
});
$('#change-it-up').click(function(e){
  e.preventDefault();
  var $selected = $('.option-1');
  var toggleWidth = $selected.width() === 0 ? "200px" : "0";
  var toggleHeight = $selected.height() === 0 ? "200px" : "0";
  $selected.animate({height: toggleHeight, width: toggleWidth}, 1000);
});
if ( $('#services-single').length ) {
    
    $(window).on('load', function() {

      window.setTimeout( 

        function() {  
             $('.content-box').addClass('load');
        },  
        1000
    );

  });
} 
if($('#services-page').length && $(window).width()<768){
window.red = {
    ui: {
        widgets: {
            Dropdown: function(e) {
                var $ = jQuery;
                var element = $(e);
                    element.addClass('red_ui_widgets_Dropdown');
                
                
                if (element.length != 1) {
                    throw new Error('red.ui.widgets.Dropdown manages one element');
                }

                var $placeHolder = element.children('.placeholder');
                var $default = $placeHolder.html();

                
                $('.options li[rel]', element).click(function() {
                    $li = $(this);
                    $li.siblings().removeClass('selected');
                    $li.toggleClass('selected');
                    if ($li.hasClass('selected')) {
                        $placeHolder.html($li.html());
                    } else {
                        $placeHolder.html($default);
                    }
                });

                element.click(function() {
                    $('.options', $('.select').not(element).not('.box').css({
                        zIndex: 1
                    })).fadeOut();
                    $('.options', element).fadeToggle();
    
                    if (('.options', element).is(':visible')) {
                        element.css({
                            zIndex: 1000
                        });
                        $('.options', element).css({
                            zIndex: 1000
                        });
                    } else {
                        element.css({
                            zIndex: 1
                        });
                        $('.options', element).css({
                            zIndex: 1
                        });
                    }
                });
                
                this.val = function(newval) {
                    if (typeof newVal == 'undefined') {
                        var val = [];
                        element.children('.options').children('.selected').each(function() {
                            val.push($(this).attr('rel'));
                        });
                        return val;
                    } else if (typeof newVal == 'Array') {
                        element.children('.options').removeClass('selected');
                        for (var i = 0; i < newVal.length; i++) {
                            var rel = newVal[i];
                            element.children('.options[rel=' + rel + ']').addClass('selected');
                        }
                    } else {
                        throw new Error('val() expects either no argument or an Array of item values to be selected.');
                    }
                };
                            
                return this;
            }
            
                            
                
           
        }
    }
};


// get some variables

var single = new red.ui.widgets.Dropdown('#single');
}




var open = $('.service-button');

open.click(function(e){
  e.preventDefault();
  var category = $(this).data('service');
  var $selectService = $('.service.col-1');
  var toggleHeight = $selectService.height();
  $('body').css('overflow', 'hidden');
  $('.service.col-1').animate({top: -toggleHeight}, 300,function(){serviceLoader(category);});
  $('.service.col-2').animate({top: '100vh'}, 300);
  $('.service.col-3').animate({top: -toggleHeight}, 300);

});

function serviceLoader(catchoice){

  var toggleHeight = $('.service.col-2').height();
  var category = $(this).data('service');

  $.ajax({
    url: ajax_bt.ajax_url,
    type: 'POST',
    data: {
      action : 'add_the_cat',
      category : catchoice
    },
    cache: false,
  beforeSend: function() {
    $('body').css('overflow', 'hidden');
  },
    success: function(data)
      {
                //Hide loader here
        $('#services-page .flex-box').html(data);
        $('.service.col-1').animate({top: 0}, 300, function(){$('body').css('overflow', 'initial');});
        $('.service.col-2').css('top', -toggleHeight).animate({top: 0}, 300, function(){$('body').css('overflow', 'initial');});
        $('.service.col-3').animate({top: 0}, 300, function(){$('body').css('overflow', 'initial');});
        // console.log('done');
      }

    })
  }

  $('.trigger').click(function(){
    $(this).toggleClass('active');
    $('#mobile-menu').toggle();
    $(this).parent().toggleClass('active');
    $('.mobile-nav').toggleClass('active');
  });

  $('#mobile-menu').find('.has-sub').click(function(){
    $(this).parent().find('ul').toggleClass('active');
    
  });

  $('.davideo').magnificPopup({

   // child items selector, by clicking on it popup will open
    type: 'iframe',
    
    iframe: {
    markup: '<div class="mfp-iframe-scaler">'+
                '<div class="mfp-close"></div>'+
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                '<div class="mfp-title">Some caption</div>'+
              '</div>',
    patterns: {
      youtube: {
        index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

        id: 'v=', // String that splits URL in a two parts, second part should be %id%
        // Or null - full URL will be returned
        // Or a function that should return %id%, for example:
        // id: function(url) { return 'parsed id'; }

        src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
      },
      vimeo: {
        index: 'vimeo.com/',
        id: '/',
        src: '//player.vimeo.com/video/%id%?autoplay=1'
      },
      gmaps: {
        index: '//maps.google.',
        src: '%id%&output=embed'
      }

      // you may add here more sources

    },

    srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
  }
  });

    $(".lazy").Lazy({
        scrollDirection: 'vertical',
        
        
        visibleOnly: true,
        onError: function(element) {
            // console.log('error loading ' + element.data('src'));
          },
        beforeLoad: function(element) {
            // called before an elements gets handled
        },
        afterLoad: function(element) {
            $(element).addClass('loaded');

        },
        onFinishedAll: function() {
            // called once all elements was handled
        }
    });


  $('.bg-slider').iosSlider({
    scrollbar: false,
    snapToChildren: true,
    desktopClickDrag: false,
    infiniteSlider: true,
    snapSlideCenter: true,
    autoSlide: true,
    onSliderLoaded: doubleSlider2Load,
    onSlideChange: doubleSlider2Load

  });
  
  $('.promo-list .button').each(function(i) {
  
    $(this).hover( function() {

      $('.bg-slider').iosSlider('goToSlide', i+1);
      
    });
  
  });

  $('.finance-slider').iosSlider({
    scrollbar: true,
    snapToChildren: true,
    desktopClickDrag: true,
    scrollbarMargin: '5px 40px 0 40px',
    scrollbarBorderRadius: 0,
    scrollbarHeight: '2px',
    navPrevSelector: $('.prevButton'),
    navNextSelector: $('.nextButton')
    
  });
  
  function doubleSlider2Load(args) {
    
    //currentSlide = args.currentSlideNumber;
    
    
    /* update indicator */
    $('.promo-list .button').removeClass('selected');
    $('.promo-list .button:eq(' + (args.currentSlideNumber-1) + ')').addClass('selected');
    // $('.focal-slider').iosSlider('update');
    // $('.bg-slider').iosSlider('goToSlide', args.currentSlideNumber);
  }

  
    $("#projects-single").find('.header-image').removeClass('grayscale');
 
    $("#work-page").show("slide", { direction: "left" }, 10000);
 
    $("a.transition").click(function(event){
        event.preventDefault();
        linkLocation = this.href;
        $('.prevButton').animate({left: '-200%'}, 400);
        $('.nextButton').animate({right: '-200%'}, 400);
        $('.focal-container').animate({left: '-200%'}, 400, function(){
          $('.bg-slider img').animate({padding: 0,opacity: 1}, 200,function(){
            
        window.location = linkLocation;
   
          });
        });
         
    
});
    
$(".calculator").accrue({
  mode: "basic",
  operation: "keyup",
  default_values: {
    amount: "$7,500",
    rate: "7%",
    rate_compare: "1.49%",
    term: "36m",
  },
  field_titles: {
    amount: "Loan Amount",
    rate: "Rate (APR)",
    rate_compare: "Comparison Rate",
    term: "Term"
  },
  button_label: "Calculate",
  field_comments: {
    amount: "",
    rate: "",
    rate_compare: "",
    term: "Format: 12m, 36m, 3y, 7y"
  },
  response_output_div: ".results",
  response_basic: 
    '<p>Estimated Monthly Payment *</p><div class="amount">$%payment_amount%</div>',
    
  response_compare: "Save $%savings% in interest!",
  error_text: "Please fill in all fields.",
  callback: function ( elem, data ){}
});

$(".calculator-amortization").accrue({
  mode: "amortization"
});
    
$(document).ready(function() {
if($('#map_canvas').length){
  (function() {
      var bounds = new google.maps.LatLngBounds();
      // map options
      var options = {
          zoom: 10,
          center: {lat: 35.502059, lng: -97.556776}, // centered US
          mapTypeId: google.maps.MapTypeId.TERRAIN,
          disableDefaultUI: true,
          mapTypeControl: false
      };
      // Multiple Markers
      var markers = [
          ['Main Branch', 35.477808, -97.504542],
          ['NW OKC Branch', 35.604943, -97.621196],
          ['Chickasha Branch', 35.032135, -97.933476],
          ['Newcastle Branch', 35.291763, -97.612130],
      ];
      // init map
      var map = new google.maps.Map(document.getElementById('map_canvas'), options);

      for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

  })();
}
});


var mapInit = $('.map-link');

mapInit.click(function(e){
  e.preventDefault();
  var lat = $(this).data('lat');
  var lon = $(this).data('lon');
  map = new google.maps.Map(document.getElementById('map_canvas'), {
      center: {lat: lat, lng: lon},
      zoom: 19,
      mapTypeId: google.maps.MapTypeId.HYBRID,
      disableDefaultUI: true,
    });
  marker = new google.maps.Marker({
    position: {lat: lat, lng: lon},
    map: map,
  });
  if($(window).width()<768){
    $(this).closest('.locations').find('.info').slideToggle();
  }
});

function get_money101(){
    
    $.ajax({
        type: "POST",
        url: ajax_bt.ajax_url,
        data: {
          action : 'money101'
        },
        success: function(data)
      {
                //Hide loader here
        $('#log_complete').html(data);
        
        console.log('done');
      }
    }).complete(function(){
        setTimeout(function(){get_money101();}, 10000);
    });

   
}
$(function(){
    // get_fb_success();
    get_money101();
});

});

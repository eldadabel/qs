var wasInitialized = false, stellalrIsActive;
modalCategory = null;
modalAction = null;
modalLabel = null;

function sendGAevent(eventCategory, eventAction, eventLabel, eventValue) {
  ga('send', 'event', eventCategory, eventAction, eventLabel, eventValue);
}

function addGAtriggers() {
  jQuery('.bloghome .mainBanner').click(function(){
    sendGAevent('banner', 'click','bloghome', null);
  });

  jQuery('.post .widget_sp_image-image-link').click(function(){
    sendGAevent('banner', 'click', 'posttopright', null);
  });

  jQuery('.formbox #mc-embedded-subscribe').click(function(){
    sendGAevent('signup', 'newsletter', 'posttopright', null);
  });
}



function loader() {
  if (wasInitialized) {
      return;
  }

  if (jQuery('body').hasClass('methodology') == false) {
    jQuery('body').addClass('loaded');
    wasInitialized = true;
  } else {
    var video = document.getElementById("methodVideo");

    video.addEventListener('loadeddata', function() {
       jQuery('body').addClass('loaded');
        wasInitialized = true;
    }, false);
  }
}





function movieJump($this){
  var button = $this,
  movie = jQuery('.method-movie')[0],
  moviePosition = button.attr('data-movie-position'),
  moviePlayTime = button.attr('data-movie-playtime');
  
  movie.currentTime = moviePosition;
  movie.play();
  
  setTimeout(function(){
    movie.pause();
  },moviePlayTime);
}

function homeTopBanner(){
	var $windowWidth = jQuery(window).width();
	var $windowHeight = jQuery(window).height();

	jQuery('.fullHeight').height($windowHeight);
}
function masonryLayout() {
  jQuery('.boxes').masonry('reloadItems');  
  jQuery('.boxes').masonry('layout');  
}

function toggleNavigation() {
  var $this = jQuery(this);
  var $navigation = jQuery('.navigation');
  if  ($navigation.hasClass('active')) {
   $navigation.fadeOut();
   $navigation.removeClass('active');
   jQuery('.navigation .inside-wrap .navlist').toggleClass('scaled');
   jQuery('.navigation .inside-wrap').toggleClass('scrolly');
   jQuery('.header.blog').toggleClass('navopen');
   // jQuery('.logo').toggleClass('showlogo');
   jQuery('.blognavbtn').removeClass('change2');
   jQuery('.blog .header.active').removeClass('change3');
 }else {
   $navigation.addClass('active');
   $navigation.fadeIn();
   jQuery('.navigation .inside-wrap .navlist').toggleClass('scaled');
   jQuery('.navigation .inside-wrap').toggleClass('scrolly');
   jQuery('.header.blog').toggleClass('navopen');
   jQuery('.blognavbtn').addClass('change2');
   jQuery('.blog .header.active').addClass('change3');
   // jQuery('.logo').toggleClass('showlogo');
 }
}

function toggleHeader(){
	var $header = jQuery('.header');
  var $blogNav = jQuery(' .blog-nav');
  var $categoryHeader = jQuery('.category .header.blog');
	var $windowScroll = jQuery(window).scrollTop();
  var scrollTrigger = 100;

	if(jQuery('body').hasClass('header-stick')){
		$header.addClass('active');
	}else {
		if ($windowScroll > scrollTrigger) {
     $header.addClass('active');
     $blogNav.addClass('active');
     $blogNav.addClass('fixed2');
     $categoryHeader.addClass('active3');
   }else {
     $header.removeClass('active');
     $blogNav.removeClass('active');
     $blogNav.removeClass('fixed2');
     $categoryHeader.removeClass('active3');
   }
 }

}


function triggerSliders(){
   jQuery('#culture-slider1').royalSlider({
      loop: true,
      keyboardNavEnabled: true,
      controlsInside: true,
      imageScaleMode: 'fill',
      arrowsNav:true,
      arrowsNavAutoHide: true,
      autoScaleSlider: false, 
      autoHeight: false,
      controlNavigation: 'bullets',
      thumbsFitInViewport: false,
      navigateByClick: false,
      startSlideId: 0,
      slidesSpacing:0,
      transitionType:'fade',
      fadeinLoadedSlide:true,
      transitionSpeed:600,
      globalCaption: false,
      imgWidth: 2000,
      imgHeight: 1158,
      autoPlay: {
        enabled: true,
        pauseOnHover: false,
        delay: 1000
      }
   });
   
   jQuery('#content-slider').royalSlider({
    autoHeight: true,
    arrowsNav:false,
    controlsInside: true,
    fadeinLoadedSlide: false,
    controlNavigationSpacing: 0,
    controlNavigation: 'bullets',
    imageScaleMode: 'none',
    transitionType:'fade',
    imageAlignCenter:false,
    loop: true,
    loopRewind: true,
    numImagesToPreload: 6,
    keyboardNavEnabled: true,
    usePreloader: false,
    autoPlay: {
    enabled: true,
    pauseOnHover: true,
    delay: 12000
    }
  });

  jQuery('#full-width-slider').royalSlider({
      loop: false,
      arrowsNav:true,
      keyboardNavEnabled: true,
      controlsInside: true,
      imageScaleMode: 'fill',
      autoScaleSlider: true, 
      controlNavigation:'none',
      autoHeight: true,
      thumbsFitInViewport: false,
      navigateByClick: true,
      startSlideId: 0,
      navigateByClick:false,
      autoHideArrows:false,
      arrowsNavAutoHide:false,
      transitionType:'fade',
      fadeinLoadedSlide:true,
      transitionSpeed:300,
      globalCaption: false,
      keyboardNavEnabled: false,
      autoScaleSliderWidth:516,
      autoScaleSliderHeight:588,
      updateSliderSize:true,
      autoPlay: {
        pauseOnHover:false,
        // autoplay options go gere
        enabled: false
      }
});

}


function modalBoxOpen($this) {

  var $dataWindow = $this.attr('data-window'),
  $modalWindow = jQuery('#'+$dataWindow);

  jQuery('body').addClass('noscroll');

  $modalWindow.fadeIn().addClass('active');
  jQuery('.close-modal').on('click',function(){
   $modalWindow.fadeOut();
   jQuery('body').removeClass('noscroll');
 });
}

function openHiddenContent(){
  var $this = jQuery(this);
  var $button = $this;
  var $questionsWrap = $this.parent();
  var $cross = $this.find('.cross');
  var $answer = $questionsWrap.find('.answer');
  var $windowScroll = jQuery(window).scrollTop();
  var $old_active = jQuery('.questions-wrap .active');

  console.log($questionsWrap);

  if(!$button.is('.active')){
   $old_active.next(".answer").slideUp(400);
   $old_active.find('.cross').toggleClass('rotate');
   $old_active.removeClass('active');
   $cross.toggleClass('rotate');
   $button.addClass('active');
   $answer.slideDown(400,function(){
    jQuery('html , body').animate({
      scrollTop:$questionsWrap.offset().top-80},400);
  });	
 }else {
   $cross.toggleClass('rotate');
   $button.removeClass('active');
   $answer.slideUp(400,function(){
     jQuery('html , body').animate({
       scrollTop:$questionsWrap.offset().top-80},400);
   });
 }
}


function touchCheck() {
  var $windowWidth = jQuery(window).width();

  if (Modernizr.touch) {   
    jQuery('.platform-banner .floating-content').css({
      'background-attachment' : 'initial',
      'background-position' : 'center'
    });


  }else { 
    if (!Modernizr.touch && $windowWidth > 1040) {
      stellalrIsActive = true;
      jQuery.stellar({
       responsive:true,
       horizontalScrolling: false
     });   

    }   
  }
}

function killStellar() {

  var $windowWidth = jQuery(window).width();

  if ($windowWidth < 1040) {
    if (stellalrIsActive == true) {
     jQuery(window).data('plugin_stellar').destroy();
     stellalrIsActive = false;
   }

 } else { 

  if (stellalrIsActive == false) {
    jQuery.stellar({
      horizontalScrolling: false,
      responsive:true,
      verticalOffset: 0,
      horizontalOffset: 0
    });

    jQuery(window).data('plugin_stellar').init();
    stellalrIsActive = true;
  }
}
}


function openVideo (){

  jQuery('.play_btn').on('click', function(event){
    event.preventDefault();

    var $playButton = jQuery(this),
    $id = $playButton.attr('data-video'),
    $videoWrapper = jQuery('#' + $id),
    $videoIframe = $videoWrapper.find('#video')[0],
    $body = jQuery('body'),
    $closeButton = jQuery('.closingXWrapper'),
    $player = $f($videoIframe);

    $videoWrapper.css({
      "display" : "block"
    });

    $body.addClass('noscroll');
    $player.api('play');

    $closeButton.on('click', function(event){
      event.preventDefault();
      $videoWrapper.css({
        "display" : "none"
      });
      $body.removeClass('noscroll');
      $player.api('pause');
    });
  });
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};




jQuery(document).ready(function($){

  addGAtriggers();

  var hash = window.location.hash;
  if (hash != undefined && hash != "" && $( ".blog-grid" ).length > 0)
  {
    var dest = Math.ceil($(hash).offset().top  - $(".blog-grid").offset().top + 130 + window.innerWidth / 22 );
    setTimeout(function(){
      window.scrollTo(0, dest);
    },500);
    
  }


setTimeout(function(){
loader();
}, 7000);

  jQuery('.movie-trigger').on('click',function(e){
      e.preventDefault();
      var $this = jQuery(this);
      movieJump($this);
  });





  jQuery(window).on('resize', function(){
    killStellar();
    setTimeout(function(){
      jQuery.stellar('refresh');
    },1000);

    // function doesn't exist
    //fullHeight();
  });


  jQuery('.boxes').masonry({
          // options
          itemSelector: '.item',
          columnWidth:  '.item',
          percentPosition: true,
          gutter: '.gutter-sizer'
  });
  imagesLoaded('.boxes', masonryLayout);


  jQuery('.blognavbtn').on('click',function(){
    jQuery('body').toggleClass('noscroll');
    jQuery('.blognavbtn').toggleClass('clickedd');
    jQuery('.blog-nav').toggleClass('showw');
  });

  jQuery('.blognav-xbtn').on('click',function(){
    jQuery('body').toggleClass('noscroll');
    jQuery('.blognavbtn').toggleClass('clickedd');
    jQuery('.blog-nav').toggleClass('showw');
  });

  jQuery('.navBtn').on('click',function(){

    jQuery('body').toggleClass('noscroll');
    jQuery('.blognavbtn').toggleClass('clickedd');
    jQuery('.blog-nav').toggleClass('showw');

    /*
    jQuery('body').toggleClass('noscroll');
    jQuery('.burgWrapper').toggleClass('clicked');
    jQuery('.header.active').toggleClass('bkgcolor');
    jQuery('.category .header, .blog .header').toggleClass('showfixed');
    jQuery('.blognavbtn').addClass('change2');
    jQuery('.blog .header.active').addClass('change3');
    
    toggleNavigation();
    */
  });

  jQuery('.home .navBtn').on('click',function(){

    jQuery('body').toggleClass('noscroll');
    jQuery('.blognavbtn').toggleClass('clickedd');
    jQuery('.blog-nav').toggleClass('showw');

    
    jQuery('body').toggleClass('noscroll');
    jQuery('.burgWrapper').toggleClass('clicked');
    jQuery('.header.active').toggleClass('bkgcolor');
    jQuery('.category .header, .blog .header').toggleClass('showfixed');
    jQuery('.blognavbtn').addClass('change2');
    jQuery('.blog .header.active').addClass('change3');
    
    toggleNavigation();
 
  });

  jQuery('.modalBoxOpen').on('click',function(e){
    e.preventDefault();

    modalCategory = jQuery(this).attr('data-modal-category');
    modalAction = jQuery(this).attr('data-modal-action');
    modalLabel = jQuery(this).attr('data-modal-label');

    var $this = jQuery(this);
    modalBoxOpen($this);
  });

  jQuery('body .questions-wrap').on('click','.question',openHiddenContent);


  jQuery(window).on('resize', function(){
    homeTopBanner();
  });

  jQuery(window).on('scroll',function(){
    toggleHeader();

    var scroll = jQuery(window).scrollTop();
    if(scroll>=100) {
       jQuery('.blog-nav').addClass('fixed');
       jQuery('.header.blog').addClass('active2');
       jQuery('.blognavbtn').addClass('change');
    }else {
     jQuery('.header.blog').removeClass('active2');
     jQuery('.blog-nav').removeClass('fixed');
     jQuery('.blognavbtn').removeClass('change');
    }
  });



  jQuery(window).load(function(){
        touchCheck();
        loader();
        setTimeout(function(){
          jQuery('.boxes').masonry('reloadItems'); 
          jQuery('.boxes').masonry('layout'); 
        },1000);
  });

  triggerSliders();
  homeTopBanner();
  toggleHeader();
  openVideo();


jQuery(".linkable").each(function(){
  if($(this).find('.theLink').length != 0) {
    $(this).click(function() {
       window.location = $(this).find('.theLink').attr('href');
    });
  }
});

(function($) {

    jQuery.fn.visible = function(partial) {

        var $t = jQuery(this),
              $w = jQuery(window),
              viewTop = $w.scrollTop(),
              viewBottom = viewTop + $w.height(),
              _top = $t.offset().top,
              _bottom = _top + $t.height(),
              compareTop = partial === true ? _bottom : _top,
              compareBottom = partial === true ? _top : _bottom;

      return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

    };
      
  })(jQuery);

  var win = jQuery(window);
  var allMods = jQuery(".story-module");

  // Already visible modules
  allMods.each(function(i, el) {
    var el = jQuery(el);
    if (el.visible(true)) {
        el.addClass("already-visible"); 
    } 
  });

  win.scroll(function(event) {
    allMods.each(function(i, el) {
                 var el = jQuery(el);
      if (el.visible(true)) {
            el.addClass("come-in"); 
      } 
     });
  });


  var win = jQuery(window);
  var qMods = jQuery(".q-mode");

  // Already visible modules
  qMods.each(function(i, el) {
    var el = jQuery(el);
    if (el.visible(true)) {
        el.addClass("already-visible"); 
    } 
  });

  win.scroll(function(event) {
    qMods.each(function(i, el) {
                 var el = jQuery(el);
      if (el.visible(true)) {
            el.addClass("zoom-in"); 
      } 
     });
  });
  
  if ( jQuery('.state1').length ) {
     var waypoint = new Waypoint({
              element: jQuery('.state1'),
              handler: function(direction) {
               console.log(direction+"1");
                     if(direction === 'down') {
                       jQuery('.platform-banner.methodology .q-pic').removeClass('zoom-in');
                     }else {

                     }
              }
     });
  }

// Fix size of articles in blog home

if ( jQuery('.bloghome').length || jQuery('.post').length) {
  resizeBlogPosts();
  window.addEventListener("resize", resizeBlogPosts, false);

}

function resizeBlogPosts() {
  console.log("resize");
  var currentRow = [];
  var currentY = 0;
  var currentMaxHeight = 0;

  jQuery('.regular').each(function(){
    $(this).height("auto");
  });

  jQuery('.regular').each(function(){
    if (currentY == 0){ // PUSH THE FIRST ONE
      currentY = $(this).offset().top;
    }

    if ($(this).offset().top == currentY) {
      if ($(this).height() > currentMaxHeight) {
        currentMaxHeight = $(this).height();
      }
      currentRow.push($(this));
    } else {
      matchPostsHeights();

      currentY = $(this).offset().top;
      currentMaxHeight = $(this).height();
    }



  });

  matchPostsHeights();

  function matchPostsHeights() {
    if (currentRow.length > 0) {
        for (var i=0; i<currentRow.length; i++) {
          currentRow[i].height(currentMaxHeight);
        }

        currentRow = [];
      }
  }
}



});



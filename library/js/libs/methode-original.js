

$(document).ready(function(){

var scrollMachine = new function(){

  var $slides = $('.dots ul li').length;
  var activeDot = $('.dots ul li.active');
  var $windowWidth = $(window).width();
  var movieTimer;


  // make this machine work for mouse wheel events

  $('#scene').on('mousewheel', function(event, delta) {
            event.preventDefault();

            var winHeight = $(window).height();
            var $scrollTop = $(window).scrollTop();

            clearTimeout($.data(this, 'timer'));
            $.data(this, 'timer', setTimeout(function() {

                if (event.deltaY > 0 ){
                 // user is scrolling up
                    if($scrollTop==0){
                         if(activeDot.is(':first-child')){
                          return false
                         }else{
                            activeDot.removeClass('active').prev().addClass('active');
                            activeDot = $('.dots ul li.active');
                            scrollMachine.changeSlide(activeDot);
                         }
                    }else{
                      $('html, body').animate({scrollTop : 0},400);
                    }
                  
                }else {
                   // user is scrolling down
                        if(activeDot.is(':last-child')){
                           $('html, body').animate({scrollTop : winHeight},400);
                         }else{
                          activeDot.removeClass('active').next().addClass('active');
                          activeDot = $('.dots ul li.active');
                          scrollMachine.changeSlide(activeDot);
                        }
                }

            }, 250));
  });

   //make this machine work for swipe also

   if(Modernizr.touch && $windowWidth > 960){
            $("#scene").swipe({
            swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
                    var winHeight = $(window).height();
                    var $scrollTop = $(window).scrollTop();

                    clearTimeout($.data(this, 'timer'));
                    $.data(this, 'timer', setTimeout(function() {

                        if (direction == 'up'){
                                if(activeDot.is(':last-child')){
                                   $('html, body').animate({scrollTop : winHeight},400);
                                 }else{
                                  activeDot.removeClass('active').next().addClass('active');
                                  activeDot = $('.dots ul li.active');
                                  scrollMachine.changeSlide(activeDot);
                                }
                        }else {
                                if($scrollTop==0){
                                     if(activeDot.is(':first-child')){
                                      return false
                                     }else{
                                        activeDot.removeClass('active').prev().addClass('active');
                                        activeDot = $('.dots ul li.active');
                                        scrollMachine.changeSlide(activeDot);
                                     }
                                }else{
                                  $('html, body').animate({scrollTop : 0},400);
                                }
                        }

                    }, 50));

            },
            threshold:0,
            fingers:'all'
          });
  }

   

  $('.dots li').on('click',function(){
    activeDot.removeClass('active');
    activeDot = $(this);
    activeDot.addClass('active');
    scrollMachine.changeSlide(activeDot);
  });

  $('.scroll-btn').on('click', function(){
       var winHeight = $(window).height();
       var CurrentActiveDot = activeDot;
       if(activeDot.is(':last-child')){
            console.log('last child')
            $('html, body').animate({scrollTop : winHeight},400);
        }else{
          activeDot.removeClass('active');
          activeDot = CurrentActiveDot.next('li');
          activeDot.addClass('active');
          scrollMachine.changeSlide(activeDot);
        }

  });


  this.changeSlide = function(activeDot){

    var button = activeDot;
    var slider = $(".royalSlider").data('royalSlider');
    console.log(slider);
    movie = $('.methode-movie')[0],
    moviePosition = button.attr('data-movie-position'),
    moviePlayTime = button.attr('data-movie-playtime');
    slide = button.attr('data-slide');

    console.log(button +' position '+moviePosition + '\n playtime '+moviePlayTime);
    movie.currentTime = moviePosition;
    movie.play();
    slider.goTo(slide);
    movieTimer = setTimeout(function(){
        movie.pause();
        clearTimeout(movieTimer);
      },moviePlayTime);
  };

};

});



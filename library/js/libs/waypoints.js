jQuery(document).ready(function($){


    var waypoint = new Waypoint({
           element: $('.state1'),
           handler: function(direction) {
            console.log(direction+"1");
                  if(direction === 'down') {
                    $('.txt.num1').css({'opacity' : '1'});
                    $('.txt.num2').css({'opacity' : '0'});
                    $('.txt.num3').css({'opacity' : '0'});

                  }else {
                    $('.txt.num1').css({'opacity' : '0'});
                  }
           }
    });

    var waypoint = new Waypoint({
           element: $('.state2'),
           handler: function(direction) {
            console.log(direction+"2");
                  if(direction === 'down') {
                    $('.txt.num1').css({'opacity' : '0'});
                    $('.txt.num2').css({'opacity' : '1'});
                    $('.txt.num3').css({'opacity' : '0'});

                  }else {
                    $('.txt.num1').css({'opacity' : '1'});
                    $('.txt.num2').css({'opacity' : '0'});
                  }
           }
    });

    var waypoint = new Waypoint({
           element: $('.state3'),
           handler: function(direction) {
            console.log(direction+"3");
                  if(direction === 'down') {
                    $('.txt.num2').css({'opacity' : '0'});
                    $('.txt.num3').css({'opacity' : '1'});
                    $('.txt.num4').css({'opacity' : '0'});

                  }else {
                    $('.txt.num2').css({'opacity' : '1'});
                    $('.txt.num3').css({'opacity' : '0'});
                  }
           }
    });

    var waypoint = new Waypoint({
           element: $('.state4'),
           handler: function(direction) {
                  if(direction === 'down') {
                    $('.txt.num3').css({'opacity' : '0'});
                    $('.txt.num4').css({'opacity' : '1'});
                    $('.txt.num5').css({'opacity' : '0'});

                  }else {
                    $('.txt.num3').css({'opacity' : '1'});
                    $('.txt.num4').css({'opacity' : '0'});
                  }
           }
    });

    var waypoint = new Waypoint({
           element: $('.state5'),
           handler: function(direction) {
                  if(direction === 'down') {
                    $('.txt.num4').css({'opacity' : '0'});
                    $('.txt.num5').css({'opacity' : '1'});
                    $('.txt.num6').css({'opacity' : '0'});

                  }else {
                    $('.txt.num4').css({'opacity' : '1'});
                    $('.txt.num5').css({'opacity' : '0'});
                  }
           }
    });

    var waypoint = new Waypoint({
           element: $('.state6'),
           handler: function(direction) {
                  if(direction === 'down') {
                    $('.txt.num5').css({'opacity' : '0'});
                    $('.txt.num6').css({'opacity' : '1'});
                    $('.txt.num7').css({'opacity' : '0'});

                  }else {
                    $('.txt.num5').css({'opacity' : '1'});
                    $('.txt.num6').css({'opacity' : '0'});
                  }
           }
    });

    var waypoint = new Waypoint({
           element: $('.state7'),
           handler: function(direction) {
                  if(direction === 'down') {
                    $('.txt.num6').css({'opacity' : '0'});
                    $('.txt.num7').css({'opacity' : '1'});
                    // $('.mainfloatbox').css({'position' : 'static'});

                  }else {
                    $('.txt.num6').css({'opacity' : '1'});
                    $('.txt.num7').css({'opacity' : '0'});
                  }
           }
    });

    var waypoint = new Waypoint({
           element: $('.state8'),
           handler: function(direction) {
                  if(direction === 'down') {
                    $('.txt.num7').css({'opacity' : '1'});
                    $('.txt.num8').css({'opacity' : '1'});
                    $('.mainfloatbox').css({'opacity' : '1'});

                  }else {
                    $('.txt.num7').css({'opacity' : '1'});
                    $('.mainfloatbox').css({'opacity' : '1'});
                  }
           }
    });

    $(window).on('resize', function(){
                  Waypoint.refreshAll();
     });



	triggerSliders();
	homeTopBanner();
	toggleHeader();
	

});
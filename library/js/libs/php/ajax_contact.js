
  jQuery(document).ready(function($) {

		// any form with ajax_contact will be dynamic.
		$('#form_contact').submit(function(e) {
	
			var thisform = $(this),
                submitBtn = thisform.find('button[type="submit"]'),
                loader = $('.ajax-loader'),
                isAjax = thisform.data('ajax') != false;

			var errorsClass = $(this).attr("data-errorsClass");
			var successClass = $(this).attr("data-successClass");                        
	
			$('.'+errorsClass).remove();
			var hasError = false;

			if(!hasError) {
                
                if (! isAjax){
                    thisform.slideUp("fast", function() {				   
                        $(this).before('<div class="'+successClass+'">' + QS_DATA.thank_you_message + '</div>');
                    });
                    
                    return true;
                    
                }
                else {
                
                    e.preventDefault();
                    var formInput = $(this).serialize();
                    
                    submitBtn.attr('disabled', true);
                    loader.fadeIn();

                    console.log("here");
                    $.post(QS_DATA.theme_url + '/library/js/libs/php/form_contact.php',formInput, function(data){
                        console.log(data);
                        
                        submitBtn.removeAttr('disabled');
                        loader.fadeOut();

                        if(data == 'sent')
                        {
                            thisform.slideUp("fast", function() {				   
                                $(this).before('<div class="'+successClass+'">' + QS_DATA.thank_you_message_ajax + '</div>');
                            });
                        }
                        else
                        {
                            thisform.parent().append('<div class="'+errorsClass+'">'+data+'</div>');
                        }


                    });
			     }
            }

            return false;	
		});


		$('.career_contact1').submit(function(e) {
			e.preventDefault();
			var thisform = $(this),
                submitBtn = thisform.find('button[type="submit"]'),
                loader = $('.ajax-loader');

			var errorsClass = $(this).attr("data-errorsClass");
			var successClass = $(this).attr("data-successClass");
	
			$('.'+errorsClass).remove();
			var hasError = false;

			if(!hasError) {
				var formInput = new FormData(this);
                
                submitBtn.attr('disabled', true);
                loader.fadeIn();

				console.log("here");
                $.ajax({
                    url: QS_DATA.theme_url + '/library/js/libs/php/career1_contact.php',
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        console.log(data);

                        submitBtn.removeAttr('disabled');
                        loader.fadeOut();
                        
                        if(data == 'sent')
                        {
                            thisform.slideUp("fast", function() {				   
                                $(this).before('<p class="'+successClass+'"><strong>Thanks!</strong> Your email has been delivered.</p>');
                            });
                        }
                        else
                        {
                            thisform.parent().append('<p class="'+errorsClass+'">'+data+'</p>');
                        }
                    },
                    error: function(){} 	        
		
		        });
			}
			return false;	
		});

		$('.career_contact2').submit(function(e) {
			e.preventDefault();
			var thisform = $(this);

			var errorsClass = $(this).attr("data-errorsClass");
			var successClass = $(this).attr("data-successClass");
	
			$('.'+errorsClass).remove();
			var hasError = false;

			if(!hasError) {
				var formInput = $(this).serialize();

				console.log("here");
				$.post(QS_DATA.theme_url + '/library/js/libs/php/career2_contact.php',formInput, function(data){
					console.log(data);
					
					if(data == 'sent')
					{
						thisform.slideUp("fast", function() {				   
							$(this).before('<p class="'+successClass+'"><strong>Thanks!</strong> Your email has been delivered.</p>');
						});
					}
					else
					{
						thisform.parent().append('<p class="'+errorsClass+'">'+data+'</p>');
					}


				});
			}
			return false;	
		});

		$('.career_contact3').submit(function(e) {
			e.preventDefault();
			var thisform = $(this);

			var errorsClass = $(this).attr("data-errorsClass");
			var successClass = $(this).attr("data-successClass");
	
			$('.'+errorsClass).remove();
			var hasError = false;

			if(!hasError) {
				var formInput = $(this).serialize();

				console.log("here");
				$.post(QS_DATA.theme_url + '/library/js/libs/php/career3_contact.php',formInput, function(data){
					console.log(data);
					
					if(data == 'sent')
					{
						thisform.slideUp("fast", function() {				   
							$(this).before('<p class="'+successClass+'"><strong>Thanks!</strong> Your email has been delivered.</p>');
						});
					}
					else
					{
						thisform.parent().append('<p class="'+errorsClass+'">'+data+'</p>');
					}


				});
			}
			return false;	
		});



});

jQuery(document).ready(function($){$("#form_contact").submit(function(e){var t=$(this),a=t.find('button[type="submit"]'),s=$(".ajax-loader"),r=0!=t.data("ajax"),n=$(this).attr("data-errorsClass"),o=$(this).attr("data-successClass");$("."+n).remove();var i=!1;if(!i){if(!r)return t.slideUp("fast",function(){$(this).before('<div class="'+o+'">'+QS_DATA.thank_you_message+"</div>")}),!0;e.preventDefault();var l=$(this).serialize();a.attr("disabled",!0),s.fadeIn(),console.log("here"),$.post(QS_DATA.theme_url+"/library/js/libs/php/form_contact.php",l,function(e){console.log(e),a.removeAttr("disabled"),s.fadeOut(),"sent"==e?t.slideUp("fast",function(){$(this).before('<div class="'+o+'">'+QS_DATA.thank_you_message_ajax+"</div>")}):t.parent().append('<div class="'+n+'">'+e+"</div>")}),sendGAevent(modalCategory,modalAction,modalLabel,"1")}return!1}),$(".career_contact1").submit(function(e){e.preventDefault();var t=$(this),a=t.find('button[type="submit"]'),s=$(".ajax-loader"),r=$(this).attr("data-errorsClass"),n=$(this).attr("data-successClass");$("."+r).remove();var o=!1;if(!o){var i=new FormData(this);a.attr("disabled",!0),s.fadeIn(),console.log("here"),$.ajax({url:QS_DATA.theme_url+"/library/js/libs/php/career1_contact.php",type:"POST",data:new FormData(this),contentType:!1,cache:!1,processData:!1,success:function(e){console.log(e),a.removeAttr("disabled"),s.fadeOut(),"sent"==e?t.slideUp("fast",function(){$(this).before('<p class="'+n+'"><strong>Thanks!</strong> Your email has been delivered.</p>')}):t.parent().append('<p class="'+r+'">'+e+"</p>")},error:function(){}})}return!1}),$(".career_contact2").submit(function(e){e.preventDefault();var t=$(this),a=$(this).attr("data-errorsClass"),s=$(this).attr("data-successClass");$("."+a).remove();var r=!1;if(!r){var n=$(this).serialize();console.log("here"),$.post(QS_DATA.theme_url+"/library/js/libs/php/career2_contact.php",n,function(e){console.log(e),"sent"==e?t.slideUp("fast",function(){$(this).before('<p class="'+s+'"><strong>Thanks!</strong> Your email has been delivered.</p>')}):t.parent().append('<p class="'+a+'">'+e+"</p>")})}return!1}),$(".career_contact3").submit(function(e){e.preventDefault();var t=$(this),a=$(this).attr("data-errorsClass"),s=$(this).attr("data-successClass");$("."+a).remove();var r=!1;if(!r){var n=$(this).serialize();console.log("here"),$.post(QS_DATA.theme_url+"/library/js/libs/php/career3_contact.php",n,function(e){console.log(e),"sent"==e?t.slideUp("fast",function(){$(this).before('<p class="'+s+'"><strong>Thanks!</strong> Your email has been delivered.</p>')}):t.parent().append('<p class="'+a+'">'+e+"</p>")})}return!1})});
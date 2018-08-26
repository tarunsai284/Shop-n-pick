
$(document).ready(function()
			{
				var rotation = 0;
				jQuery.fn.rotate = function(degrees) {
					$(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
								 '-moz-transform' : 'rotate('+ degrees +'deg)',
								 '-ms-transform' : 'rotate('+ degrees +'deg)',
								 'transform' : 'rotate('+ degrees +'deg)'});
				};

				setInterval(function() {
					rotation += 1;
					$(".rotdiv").rotate(rotation);
				},1);
			});

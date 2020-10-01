<script src="{{ asset('webasset/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('webasset/js/easing.min.js')}}"></script>
<script src="{{ asset('webasset/js/hoverIntent.js')}}"></script>
<script src="{{ asset('webasset/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{ asset('webasset/js/jquery-ui.js')}}"></script>
<script src="{{ asset('webasset/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset('webasset/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('webasset/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('webasset/js/jquery.tabs.min.js')}}"></script>
<script src="{{ asset('webasset/js/mail-script.js')}}"></script>
<script src="{{ asset('webasset/js/main.js')}}"></script>
<script src="{{ asset('webasset/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('webasset/js/superfish.min.js')}}"></script>
<script src="connect.facebook.net/en_US/all.js"></script>



<!-- select search  -->

   
  
 <script type="text/javascript">function add_chatinline(){var hccid=17729003;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
<!--Select date-->
<script>
    $('#refresh').click(function() {

        $.ajax({
            type: 'GET',
            url: "{{route('refreshcaptcha')}}",

            success: function(data) {

                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
<script>




	$('.dateselect').datepicker({
		format: 'mm/dd/yyyy',
		// startDate: '-3d'
	});
</script>

<!--Counter-->
<script>
	 $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
	$('.counter').each(function() {
		var $this = $(this),
			countTo = $this.attr('data-count');

		$({
			countNum: $this.text()
		}).animate({
				countNum: countTo
			},

			{

				duration: 4000,
				easing: 'linear',
			
				refreshInterval:'300',
				step: function() {
					$this.text(Math.floor(this.countNum));
				},
				complete: function() {
					$this.text(this.countNum);
					//alert('finished');
				}

			});



	});
} 
    });
</script>

<!--Chat Icon-->
<script>
	$(document).ready(function() {
		$(document).ready(function() {
			$('#alertClose').click(function() {
			$('#alertDiv').hide();
			location.reload();
		});
			
    // $("#video")[0].src += "&autoplay=1";
    // ev.preventDefault();
 
  
});
		$('.message-icon').click(function() {
			$('.chat').fadeToggle(500);
		});

		// for nicescroll
		// $('.messages-box').niceScroll({
		//   cursorcolor:'#5290F5',
		//   cursoropacitymin:0.7,
		//   cursorborder:'none',
		//   cursorborderradius: "3px",
		//   scrollspeed: 400,
		//   background: "#ddd",
		//   railoffset: {left: 7},
		//   cursorwidth :'4px'
		// });

		// form submit
		// $('form').submit(function(e) {
		// 	e.preventDefault();
		// 	var $messagesBox = $(".messages-box"),
		// 		messagesBoxHeight = $messagesBox[0].scrollHeight,
		// 		message = $('input', this).val(),
		// 		messageLength = message.length;

		// 	if (messageLength > 0) {
		// 		$('input', this).removeClass('error');
		// 		$messagesBox.append('<div class="message"><i class="fa fa-close"></i> <p>' + message + '</p></div>');
		// 	} else {
		// 		$('input', this).addClass('error');
		// 	}

		// 	$('input', this).val('');
		// 	$('input', this).focus();

		// 	// scroll to see last message
		// 	$messagesBox.scrollTop(messagesBoxHeight);

		// }); // form

		// delete massage
		$(document).on('click', '.fa-close', function() {
			$(this).parent().fadeOut(500, function() {
				$(this).remove();
			});
		});

		// mouse enter add class
		$(document).on('mouseenter', '.fa-close', function() {
			$(this).parent().addClass('active');
		});

		// mouse leave remove class
		$(document).on('mouseleave', '.fa-close', function() {
			$(this).parent().removeClass('active');
		});

	}); // document ready
</script>

<!--back to top-->
<script>
	jQuery(document).ready(function() {
		//   insert back to top button dynamicly
		$("#backToTop").append('<a class="backToTop" href="javascript:void(null);" style="display: none;"><i class="fa fa-angle-up"></i><iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe></a>');
		var $window = $(window);
		var distance = 80;
		// scroll
		$window.scroll(function() {
			// header
			if ($window.scrollTop() >= distance) {
				$(".backToTop").fadeIn();
			} else {
				$(".backToTop").fadeOut();
			}
		});

		$('.backToTop').click(function() {
			$('html, body').animate({
				scrollTop: 0
			}, 800);
		});
	})
</script>

@yield('scripts')

</body>

</html>

  <!-- /*Footer starts Here*/-->
    <div class="container-fluid footer">
    	<!-- ><div class="row">
    		<div class="col-md-offset-11 col-md-1">
    			<img src="<?=base_url();?>assets/images/chat.png"  class="chatimage" /> </div>
        </div> -->
    </div>

  <!-- erorr message code START here -->
  <?php if(($this->session->flashdata('success') != "")){?>
    <div class="msg-box alert alert-dismissible" id="errMsgSer" style="display:block">
      <i class="fa fa-times closeBtn pull-right"></i>
      <div class="infobox msg-success succ-box">
        <h5 class="infobox-title"></h5><i class="fa fa-check-circle-o succ-icn"></i>
        <h4 id=""><?php if($this->session->flashdata('success') != ""){ echo $this->session->flashdata('success'); }?></h4>
      </div>
    </div>
  <?php }else if((validation_errors() != "") || ($this->session->flashdata('error') != "")){?>
    <div class="msg-box alert alert-dismissible" id="errMsgSer" style="display:block">
      <i class="fa fa-times closeBtn pull-right"></i>
      <div class="infobox msg-error">
        <h5 class="infobox-title"></h5><i class="fa fa-exclamation-triangle eror-icn"></i>
        <h4 id=""><?php if(validation_errors()!=""){echo validation_errors();}else if($this->session->flashdata('error') != ""){ echo $this->session->flashdata('error');}?></h4>
      </div>
    </div>
  <?php }?>
  <div class="msg-box alert alert-dismissible " id="errMsg" style="display:none">
    <i class="fa fa-times closeBtn pull-right"></i>
    <div class="infobox msg-error">
      <h5 class="infobox-title"></h5><i class="fa fa-exclamation-triangle eror-icn"></i>
      <h4 id="msg_show"></h4>
    </div>
  </div>
  <!-- erorr message code END here -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url();?>assets/scripts/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url();?>assets/scripts/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>validation/JS_validation.php"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/scripts/js/jquery.countTo.js"></script>
    <script type="text/javascript">
      (function($) {
          fakewaffle.responsiveTabs(['xs', 'sm']);
      })(jQuery);
    </script>
    <script type="text/javascript" src="<?=base_url();?>assets/scripts/js/jquery.waypoints.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="<?=base_url();?>assets/scripts/js/lightbox.min.js"></script>

  <!-- error msg script - start here -->
  <script>
    jQuery(window).load(
        function(){

          var wait_loading = window.setTimeout( function(){
                $('#loading').slideUp('fast');
                jQuery('body').css('overflow','auto');
              },1000
          );

        });
    setTimeout(function(){errMsgSer.style.display="none"}, 7000);
  </script>

  <script>
    $('.closeBtn').click(function(){
      $(this).parent().hide();
    });
  </script>
  <!-- error msg script - ends here -->

    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(26.802100, 75.822739),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script>
	$(document).ready(function () {
		$(document).on("scroll", onScroll);
 
		$('a[href^="#"]').on('click', function (e) {
			e.preventDefault();
			$(document).off("scroll");
 
			$('a').each(function () {
				$(this).removeClass('active');
			})
			$(this).addClass('active');
 
			var target = this.hash;
			$target = $(target);
			$('html, body').stop().animate({
				'scrollTop': $target.offset().top
			}, 500, 'swing', function () {
				window.location.hash = target;
				$(document).on("scroll", onScroll);
			});
		});
	});
 
	function onScroll(event){
		var scrollPosition = $(document).scrollTop();
		$('nav a').each(function () {
			var currentLink = $(this);
			var refElement = $(currentLink.attr("href"));
			if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
				$('nav ul li a').removeClass("active");
				currentLink.addClass("active");
			}
			else{
				currentLink.removeClass("active");
			}
		});
	}
	</script>
	<script type="text/javascript">
    jQuery(function ($) {
      // custom formatting example
      $('.timer').data('countToOptions', {
        formatter: function (value, options) {
          return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
      });
 
      // start all the timers
      $('#starts').waypoint(function() {
    $('.timer').each(count);
	});
 
      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
    });
  	</script>
</body>
</html>

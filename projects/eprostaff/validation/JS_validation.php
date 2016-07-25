<?php
	header("Cache-Control: no-store, no-cache");
	header("Content-type: text/javascript");
	echo '

		$(".isNumber").keypress(function (event) {
			event = (event) ? event : window.event;
			var charCode = (event.which) ? event.which : event.keyCode;
			if(charCode != 8 && charCode != 9 && (charCode < 48 || charCode > 57) && charCode != 46  && charCode != 39 && charCode != 37 && charCode != 13) {
				return false;
			}
			return true;
		});

		$(".isInteger").keypress(function (event) {
			event = (event) ? event : window.event;
			var charCode = (event.which) ? event.which : event.keyCode;
			if(charCode != 8 && charCode != 9 && (charCode < 48 || charCode > 57)  && charCode != 39 && charCode != 37 && charCode != 13) {
				return false;
			}
			return true;
		});

		$(".isAlpha").keypress(function (event) {
			event = (event) ? event : window.event;
			var charCode = (event.which) ? event.which : event.keyCode;
			if(charCode != 8 && charCode != 9 && charCode != 46 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && charCode != 39 && charCode != 37 && charCode != 32) {
				return false;
			}
			return true;
		});

		$(".isAlphaNumber").keypress(function (event) {
			event = (event) ? event : window.event;
			var charCode = (event.which) ? event.which : event.keyCode;
			if(charCode != 8 && charCode != 9 && charCode != 46 && (charCode < 48 || charCode > 57) && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90) && charCode != 39 && charCode != 37 && charCode != 32) {
				return false;
			}
			return true;
		});
			
	';
?>

<?php
	header("Cache-Control: no-store, no-cache");
	header("Content-type: text/javascript");
	echo '
		window.onload = init;

		function init(){
			var szControl = document.getElementById("frm_contactUs");
			szControl.addEventListener("submit",validate,false);

		}
		function validate(evt){

			if($("#txtName").val() == ""){
				$("#txtName").focus();
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the name";
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txtEmail").val() == ""){
				$("#txtEmail").focus();
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the email id";
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txtSubject").val() == ""){
				$("#txtSubject").focus();
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the subject";
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txtMessage").val() == ""){
				$("#txtMessage").focus();
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the message";
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else{
				return true;
			}
		}


	';
?>

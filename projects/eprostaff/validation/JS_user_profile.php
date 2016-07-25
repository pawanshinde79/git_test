<?php
	header("Cache-Control: no-store, no-cache");
	header("Content-type: text/javascript");
	echo '
		window.onload = init;

		function init(){
			var szControl = document.getElementById("step2");
			szControl.addEventListener("submit",validate,false);

			var szControl_1 = document.getElementById("addServicesModal");
			szControl_1.addEventListener("submit",services_validate,false);

			var szControl_2 = document.getElementById("saveSelLang");
			szControl_2.addEventListener("submit",language_validate,false);

		}
		function validate(evt){
			if($("#txt_fname").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the first name";
				$("#txt_fname").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_lname").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the last name";
				$("#txt_lname").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_mobile").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the mobile no";
				$("#txt_mobile").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_projects").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the no of projects";
				$("#txt_projects").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_peepz").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the peepz";
				$("#txt_peepz").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_bbb").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the BBB";
				$("#txt_bbb").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_licence").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the licence";
				$("#txt_licence").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_experience").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the experience";
				$("#txt_experience").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_lastProject").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the last project";
				$("#txt_lastProject").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_address").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML = "Please enter the last address";
				$("#txt_address").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else if($("#txt_about").val() == ""){
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML 	= "Please enter the last about";
				$("#txt_about").focus();
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else{
				return true;
			}
		}

		function services_validate(evt){

			if($("#multiselect_services").val() === null){
				$("#multiselect_services").focus();
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML 	= "Please select the services";
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else{
				return true;
			}
		}

		function language_validate(evt){

			if($("#example-getting-started").val() === null){
				$("#example-getting-started").focus();
				document.getElementById("errMsg").style.display = "block";
				document.getElementById("msg_show").innerHTML 	= "Please select the language";
				setTimeout(function(){errMsg.style.display="none"}, 10000);
				evt.preventDefault();
			}else{
				return true;
			}
		}
	';
?>

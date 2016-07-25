var submitform = true;
var is_submit = true; 
var is_ajax_return = false;
function submitcontactvalidate(form_id,name){ 
 if(is_submit){
  var $inputs = $('#'+form_id+' :input,textarea,select');
   $inputs.each(function() {
    if($(this).attr('validate') != undefined){
    var validation = $(this).attr('validate');
    var validation_array = validation.split(',');
    var current_name = $(this).attr('name');
    for(var i=0; i<validation_array.length; i++){
     var validation_inner_array = validation_array[i].split('|');
     for(var j=0; j<validation_inner_array.length; j++){
      switch(validation_inner_array[j])
      {
       case 'Required':
        if(name == 'all' || current_name == name) { 
			 var value = $(this).val();
			 if(value == '' || value == validation_inner_array[j+1]){          
			  $('#error_'+this.id).removeClass('valid fa-check');	  
			  $('#error_'+this.id).addClass('error1 fa-times');
			  submitform = false;	
			  //alert(this.id);		  
			 } else {
			   $('#error_'+this.id).addClass('valid fa-check');	  
			   $('#error_'+this.id).removeClass('error1 fa-times');
			   is_ajax_return = true;
			 }
		}        
        break;		
		case 'IsNumber' :
        if(name == 'all' || current_name == name) { 
         var value = $(this).val();
			 if(value == '' || isNaN(value)){
			  $(this).removeClass('valid');
			  $(this).addClass('error1');
			  submitform = false;
			 } else {
			  $(this).removeClass('error1');
			  $(this).addClass('valid');
			  is_ajax_return = true;
			 }
		}
        break;		
       case 'Email' : 
        if(name == 'all' || current_name == name) {
         var value = $(this).val();
         var atpos = value.indexOf("@");
         var dotpos = value.lastIndexOf(".");
         if(value == '' || value == validation_inner_array[j+1]){
          $(this).removeClass('valid');
          $(this).addClass('error1');
          submitform = false;
         } else if(atpos< 1 || dotpos<atpos+2 || dotpos+2>=value.length){
          $(this).removeClass('valid');
          $(this).addClass('error1');
          submitform = false;
         } else {
          $(this).removeClass('error1');
          $(this).addClass('valid');
         }
        }
        break;
       case 'Phone' : 
        if(name == 'all' || current_name == name) {
         var value = $(this).val();
         if(value == '' || value == validation_inner_array[j+1]){
          $(this).removeClass('valid');
          $(this).addClass('error1');
          submitform = false;
         } else if(isNaN(value) || value.length!=10){
          $(this).removeClass('valid');
          $(this).addClass('error1');
          submitform = false;
         } else {
          $(this).removeClass('error1');
          $(this).addClass('valid');
         }
        }
        break;       
      }
     }
    }
    }
   });
 }
}
function validate(form_id){
 is_submit = true;
 submitform = true; 
 submitcontactvalidate(form_id,'all');

 setTimeout(function(){ 
  do_form_submit(form_id);
 }, 1);
 
}

function do_form_submit(form_id){
 if(is_ajax_return){ 
   
  if(submitform){	 
	 $('#'+form_id).submit();
  }
  else{    
   return false;
  }
 }
 else{
  setTimeout(function(){ 
  do_form_submit(form_id);
 }, 1);
 }
}





function removeDefault(obj,defaultValue){ 
 if(obj.value==defaultValue) { 
  obj.value='';
 }
}
function addDefault(obj,fromId,defaultValue){
 if(obj.value=='') { 
  obj.value=defaultValue;
 }
 is_submit = true;
 submitcontactvalidate(fromId,obj.name);
}
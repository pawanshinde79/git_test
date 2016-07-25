function GetPage(str_url,ID){
						$.post(str_url, 
						function(data){
						$('#'+ID).html(data);
						//alert(data); // John
					 });
				 }

// JavaScript Document
$(document).ready(function(){


		  $("#frmItemRemove").submit(function(e)
	  {
		e.preventDefault();
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Item Removed");
			});
	  });


	  $("#frmItemAdd").submit(function(e)
	  {
		  e.preventDefault();
    
	
	
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Item Added");
			});
	  });
	  
	  
	  

	

			
});
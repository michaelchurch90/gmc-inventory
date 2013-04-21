$(document).ready(function(){


		  $("#frmStatusRemove").submit(function(e)
	  {
		e.preventDefault();
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Status Removed");
			});
	  });


	  $("#frmStatusAdd").submit(function(e)
	  {
		  e.preventDefault();
    
	
	
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Status Added");
			});
	  });
	  
	  
	  

	

			
});
$(document).ready(function(){


		  $("#frmDepRemove").submit(function(e)
	  {
		e.preventDefault();
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Department Removed");
			});
	  });


	  $("#frmDepAdd").submit(function(e)
	  {
		  e.preventDefault();
    
	
	
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Department Added");
			});
	  });
	  
	  
	  

	

			
});
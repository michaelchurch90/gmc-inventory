$(document).ready(function(){

	  $("#frmCampusAdd").submit(function(e)
	  {
		  e.preventDefault();
    
	
	
		$.post($(this).attr('action'),$("#frmCampusAdd").serialize(),
			function(data,status){
				alert("Campus Added");
			});
	  });
	  
	  		  $("#frmCampusRemove").submit(function(e)
	  {
		e.preventDefault();
		$.post($(this).attr('action'),$("#frmCampusRemove").serialize(),
			function(data,status){
				alert("Campus Removed");
			});
	  });
	

			
});
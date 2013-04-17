$(document).ready(function(){

	  $("form").submit(function(e)
	  {
		  e.preventDefault();
    
	
	
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("User Removed");
			});
	  });
	  
	  
	  
	  
	  $("#btnChangeEmail").click(function(e)
	  {
		  //window.location.replace("../php/queries/AdminChangeUserEmailQuery.php");
		$.post("../php/queries/AdminChangeUserEmailQuery.php",$("form").serialize(),
			function(data,status){
				alert("Change Successful");
			});
	  });
	  
	  
	  
	  $("#btnChangePassword").click(function(e)
	  {
		$.post("../php/queries/AdminChangeUserPassQuery.php",$("form").serialize(),
			function(data,status){
				alert("Change Successful");
			});
	  });
	
	

			
});
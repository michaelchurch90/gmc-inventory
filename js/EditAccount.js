$(document).ready(function(){

	  $("form").submit(function(e)
	  {
		  e.preventDefault();
    
	
	
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Account Updated");
			});
	  });
	

			
});
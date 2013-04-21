// JavaScript Document

// JavaScript Document
$(document).ready(function(){

	
	function validateForm()
		{
			var assignedToValue=document.forms["addItemForm"]["assignedTo"].value;
			if (assignedToValue==null || assignedToValue=="")
  			{
  				document.getElementById("assignedToError").innerHTML = "Required Field.";

  				return false;
  			}
		
			var CommentValue=document.forms["addItemForm"]["Comment"].value;
			if (CommentValue==null || CommentValue=="")
  			{
  				document.getElementById("commentError").innerHTML = "Required Field.";
  				return false;
  			}
			return true;
		}
	  
	  $("form").submit(function(e)
	  {
		  e.preventDefault();
    


		if(validateForm())
		{
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				alert("Item Added");
			});
		}
	  });
	

			
});
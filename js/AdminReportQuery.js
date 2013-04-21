// JavaScript Document
$(document).ready(function(){
	  $("form").submit(function(e)
	  {
		  $("#divAdminReportInput").hide();
		  e.preventDefault();
		$.post($(this).attr('action'),$("form").serialize(),
			function(data,status){
				$("div.outputDiv").empty();
				$("div.outputDiv").append(data);
			});
	  });
	

			
});
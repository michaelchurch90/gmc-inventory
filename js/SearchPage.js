// JavaScript Document
$(document).ready(function(){
	  $("#searchForm").submit(function(e)
	  {
		  
		e.preventDefault();
		
		$.post($(this).attr('action'),$("#searchForm").serialize(),
			function(data,status){
				$("#divSearchForm").hide();
				$("div.outputDiv").empty();
				$("div.outputDiv").append(data);
				
								$("tr.highlightable").hover(
	  				function()
					{
						$(this).addClass("trHover");

					},
					function()
					{
					$(this).removeClass("trHover");
					}
	 			 ); //highlightable.hover
				 $("tr.highlightable").click(function()
				 {
					 	
						var Inventory = ($(this).find("td:first-child").html());
						var AssignedTo =($(this).find("td:nth-child(2)").html());
						var Campus =($(this).find("td:nth-child(3)").html());
						var Department =($(this).find("td:nth-child(4)").html());
						var Item = $(this).find("td:nth-child(5)").html();
						var Manufacturer =($(this).find("td:nth-child(6)").html());
						var Model =($(this).find("td:nth-child(7)").html());
						var Serial =($(this).find("td:nth-child(8)").html());
						var Lan =($(this).find("td:nth-child(9)").html());
						var WLan =($(this).find("td:nth-child(10)").html());
						var Status =($(this).find("td:nth-child(11)").html());
						var Comment =($(this).find("td:nth-child(12)").html());
						
						$.post("../php/queries/EditDataOutput.php",
						{
							Inventory: Inventory,
							Campus: Campus,
							Department: Department,
							AssignedTo:AssignedTo,
							Manufacturer: Manufacturer,
							Model: Model,
							Serial: Serial,
							Lan: Lan,
							WLan: WLan,
							Item:Item,
							Status:Status,
							Comment:Comment
						},
						function(data,status)
						{
							$("div.outputDiv").empty();
							$("div.outputDiv").append(data);
							 $("#updateForm").submit(function(e){
							  e.preventDefault();
							  $.post($(this).attr('action'),$("#updateForm").serialize(),
								function(data,status){
									
									alert("Item updated");
									$("div.outputDiv").empty();
									$("#divSearchForm").show();
									
									
						});
					});//post
						
						
						
						
				 }); //highlightable.click

				 
				
				 
			});
	 	});
	  
	 
		  
		  
	
	}); //serachform.submit
	  	
	

			
}); //document.ready

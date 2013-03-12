$(document).ready(function() {

	$('#slider').nivoSlider();
	        
	$.get("php/getTable.php", function(response){
		$('#upper').find('.right').html(response);
	});
	
});


function loadProject(name){
	$.get("php/getProject.php?project=" + name, function(response){
		// split the response
		var splity = response.split("***");
		
		// insert the description with a fade effect
		$("#lower").find('.left').fadeOut('slow', function(){
			$(this).html(splity[0]);
		}).fadeIn('slow');
		
		// insert the new slices
		$('#upper').find('.left').fadeOut('slow', function(){
			$(this).html(splity[1]);
			$('#slider').nivoSlider();
		}).fadeIn('slow');
		
		$('#lower').find('.right').fadeOut('slow', function(){
			$(this).html(splity[2]);
		}).fadeIn('slow');
		
		// reinitalize slider
		

	});
}

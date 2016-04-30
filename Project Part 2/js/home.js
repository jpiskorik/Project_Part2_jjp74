$(document).ready(function(){

	$('.intro-picture').mouseover(function(){			
        $('#intro-picture-overlay').show();
	}).mouseout(function(){
		$('#intro-picture-overlay').hide();
	});
	
	$('#memoryForm').submit(function(e){
				
		var values = $(this).serialize();
		var res = values.split("&");
    	console.log(res[0] + " " + res[1] + " " + res[2]);
    	
    	$('.memoryBox').hide();
    	$('#results').append("<p>" +res[0] + " " + res[1] + "	"+ res[2] + "<p>");		
    	$('#results').show();
    	
    	e.preventDefault();
    	
    	$('.anotherMemory').show();
	});
	
	$('.anotherMemory').click(function(e){
		document.getElementById('nameform').value = '';
		document.getElementById('relationform').value = '';
		document.getElementById('memoryform').value = '';
		$('#results').hide();
		$('.memoryBox').show();
		
		e.preventDefault();
	
	});


});
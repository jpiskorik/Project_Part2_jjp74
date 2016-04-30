  var correctA=[];
  var imageWidth = 600;
  
  $(window).ready(function() {
            
    var currentImage = 0;

    //set image count 
	var allImages = $('#slideshow li img').length;
            
    //setup slideshow frame width
    $('#slideshow ul').width(allImages*imageWidth);

    //attach click event to slideshow buttons
    $('.slideshow-next').click(function(e){
                
        //increase image counter
        currentImage++;
        //if we are at the end let set it to 0
        if(currentImage>=allImages) currentImage = 0;
        //calcualte and set position
        setFramePosition(currentImage);
        
        e.preventDefault();
    });

    $('.slideshow-prev').click(function(e){
                
        //decrease image counter
        currentImage--;
        //if we are at the end let set it to 0
        if(currentImage<0) currentImage = allImages-1;
        //calcualte and set position
        setFramePosition(currentImage);
        
        e.preventDefault();

    });
    
    //get first question
	$('#startQuiz').click('submit', function(){
		$.ajax({
 	 		method: "GET",
 		 	url: "../html/quiz.xml",
 		 	datatype: "xml",
 		 	error: function(xhr, status, error) {
  				var err = eval("(" + xhr.responseText + ")");
  				alert(err.Message);
			},
 			success: function(value) {
 				
 				$('#quizzing').show();
                MartyQuiz(value);
            }
              
		});
	});
           
});

function MartyQuiz(xml)
{
	console.log("WE STILL HERE");
	//finding the info from our xml file
    $(xml).find('quiz-problems problem').each(function(i, element){
    
    	//getting the question
        var q = $(element).find('question').text().trim();

		// add the question to html
        $("#quiz").append('<div class="questions" id="question'+i+'"">'+q+'</div>');
		$('#question'+i).append('<select id=select'+i+' onchange=check(this)>');

        $('#select'+i).append('<option value="blank"></option>');
        
        $(element).find('answer').each(function(k, element){
			// Adding the answers to html
        	$('#select'+i).append('<option value="'+element.textContent.trim()+'" >'+element.textContent.trim()+'</option>');
        });
		$("#quiz").append('<br class=questions>');
        var correct = $(element).find('correct').text().trim();
        
        correctA.push(correct);

    });

}

function check(guess)
{
	// Remove other answers
	$(".answer").remove();
	
    var chosen = $(guess).find('option:selected')[0].innerText.trim();
    
	// if the user's answer is in the array
 	if ($.inArray(chosen.toString(), correctA) !== -1) {
 	
		//correct answer
		alert("Thats Correct!");
	}
	//else its wrong 
	else {
		alert("Sorry that is the wrong answer");
	}
}

	//calculate the slideshow frame position and animate it to the new position
function setFramePosition(pos){
            
	 //calculate position
    var px = imageWidth*pos*-1;
    //set ul left position
	$('#slideshow ul').animate({
		left: px
    }, 300);
}
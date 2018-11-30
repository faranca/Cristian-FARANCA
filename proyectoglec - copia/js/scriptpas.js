$(document).ready(function() {

	$('#pass1').keyup(function() {

		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();
		
		if ( pass1 == "" ) 
		{
			$('#pass1').css({"background": "#ffa78fcc"});
			document.getElementById("pass1").placeholder = "No se puede dejar en blanco";
		}
				else
		{	
			$('#pass1').css({"background": "white"});
		}

	});
	
		$('#pass2').keyup(function() {

		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();
		
		if ( pass2 == "" ) 
		{
			$('#pass2').css({"background": "#ffa78fcc"});
			document.getElementById("pass2").placeholder = "No se puede dejar en blanco";
		}
		else
		{	
			$('#pass2').css({"background": "white"});
				if ( pass1 == pass2 ) {
					$('#errorpass').text("").css({"background": "url(../img/check.png)", "float":"right", "margin": "0 0 0 5px" });
				} else {
					$('#errorpass').text("").css({"background": "url(../img/check-.png)", "float":"right", "margin": "0 0 0 5px"});
				}
		}

	});
	

});
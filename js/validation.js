function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validatePhone(phone) {
  var regex = new RegExp("^\\d+$");
  return regex.test(phone);
}

function validateName(name) {
  var regex = new RegExp("^[a-zA-Z ]+$");
  return regex.test(name);
}
 
$(function()   {
	 
	$('.list_validate_button').click(function(){ 
	    var result = document.getElementsByName("hid"); 
	    var optionse= 'Invalid Email Address.';
	    var optionsn= 'Invalid Name.';
	    var optionsp= 'Invalid Phone Number.';
	    for (var j = 0; j <= result.length; j++) { 

    		//if ( $("#fname"+j).val()!='' && $("#fname"+j).val().match('^[a-zA-Z ]*$') ) {
		    if ( validateName($("#fname"+j).val()) ) {
		      $('#fname'+j+' + span').html('');
		      $('#fname'+j).empty('<span class="' + '" style="color:#e03b3b">' + optionsn+ '</span>'); 
		    }
		    else{
		      $('#fname'+j+' + span').html('');
		      $('#fname'+j).after('<span class="' + '" style="color:#e03b3b">' + optionsn+ '</span>'); 
		      $('#fname'+j).focus();
		    }
		    
		    if ( validatePhone($("#phone"+j).val()) ) {
		      $('#phone'+j+' + span').html('');
		      $('#phone'+j).empty('<span class="' + '" style="color:#e03b3b">' + optionsp+ '</span>'); 
		    }
		    else{
		      $('#phone'+j+' + span').html('');
		      $('#phone'+j).after('<span class="' + '" style="color:#e03b3b">' + optionsp+ '</span>'); 
		      $('#phone'+j).focus();
		    }

		    if ( validateEmail($("#email"+j).val()) ) {
		      $('#email'+j+' + span').html('');
		      $('#email'+j).empty('<span class="' + '" style="color:#e03b3b">' + optionse+ '</span>'); 
		    }
		    else{
		      $('#email'+j+' + span').html('');
		      $('#email'+j).after('<span class="' + '" style="color:#e03b3b">' + optionse+ '</span>'); 
		      $('#email'+j).focus();
		    }
		}
	});
});



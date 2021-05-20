$(function()   {
	var x = 0; //Initial field counter
	var list_maxField = 10; //Input fields increment limitation
	
	$('.list_add_button').click(function()
	    {
		    if(x < list_maxField){ 
		        x++; //Increment field counter
		        var list_fieldHTML = '<div class="col-md-6"><div class="form-group"><div class="form-group">';

		        list_fieldHTML += '<label>Contact </label><button class="list_remove_button">Remove</button><br><hr /></div>';

		        list_fieldHTML += '<label>Name</label><input name="list['+x+'][]" id="fname'+x+'" type="text" placeholder="Type Name" class="form-control"/><input type="hidden" name="hid">';
		        list_fieldHTML += '</div><div class="form-group">';
		        list_fieldHTML += '<label>Email</label><input name="list['+x+'][]" id="email'+x+'" type="text" placeholder="Type Email" class="form-control"/>';
		        list_fieldHTML += '</div><div class="form-group">';
		        list_fieldHTML += '<label>Phone Number</label><input name="list['+x+'][]" id="phone'+x+'" type="text" placeholder="Type Number" class="form-control"/>';
		        
		        list_fieldHTML += '</div></div>';  
		        $('.list_wrapper').append(list_fieldHTML); //Add field html
		    }
        });
    
        $('.list_wrapper').on('click', '.list_remove_button', function()
        {
           $(this).closest('div.col-md-6').remove(); //Remove field html
           x--; //Decrement field counter
        });
 

        
});


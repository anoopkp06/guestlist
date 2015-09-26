$(function() {

    $('form[name="updateUser"]').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var username = $('#updateUser').find("input#uname").val();
            var password = $('#updateUser').find("input#password").val();
			 var user_id = $('#updateUser').find("input#user_id").val();
			          
            $.ajax({
                url: "/account/update_user/",
                type: "POST",
                data: {
                    username: username,
                    password: password,
					user_id: user_id
                    
                },
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						$('#updateUser').find('#success').html("<div class='alert alert-success'>");
						$('#updateUser').find('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#updateUser').find('#success > .alert-success')
							.append("<strong>"+data.msg+"</strong>");
						$('#updateUser').find('#success > .alert-success')
							.append('</div>');
	
						//clear all fields
						$('#updateUser').trigger("reset");
						 
						
					}
					else if(data.status == 0)
					{
						$('#updateUser').find('#success').html("<div class='alert alert-danger'>");
                    	$('#updateUser').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
						$('#updateUser').find('#success > .alert-danger').append("<strong>" + data.msg + "");
						$('#updateUser').find('#success > .alert-danger').append('</div>');
						//clear all fields
						$('#updateUser').trigger("reset");
						
					}
					
                },
                error: function() {
                    // Fail message
                    $('#updateUser').find('#success').html("<div class='alert alert-danger'>");
                    $('#updateUser').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#updateUser').find('#success > .alert-danger').append("<strong>Sorry , it seems that server is not responding. Please try again later!");
                    $('#updateUser').find('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#updateUser').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

 
    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});

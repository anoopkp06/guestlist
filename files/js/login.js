$(function() {


$('form[name="forgotfrm"]').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var email = $('#forgotfrm').find("input#email").val();
           		          
            $.ajax({
                url: "/account/proces_password/",
                type: "POST",
                data: {
                    email: email                   
                },
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						$('#forgotfrm').find('#success').html("<div class='alert alert-success'>");
						$('#forgotfrm').find('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#forgotfrm').find('#success > .alert-success')
							.append("<strong>"+data.msg+"</strong>");
						$('#forgotfrm').find('#success > .alert-success')
							.append('</div>');
	
						//clear all fields
						$('#forgotfrm').trigger("reset");
						 
						
					}
					else if(data.status == 0)
					{
						$('#forgotfrm').find('#success').html("<div class='alert alert-danger'>");
                    	$('#forgotfrm').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
						$('#forgotfrm').find('#success > .alert-danger').append("<strong>" + data.msg + "");
						$('#forgotfrm').find('#success > .alert-danger').append('</div>');
						//clear all fields
						$('#forgotfrm').trigger("reset");
						
					}
					
                },
                error: function() {
                    // Fail message
                    $('#forgotfrm').find('#success').html("<div class='alert alert-danger'>");
                    $('#forgotfrm').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#forgotfrm').find('#success > .alert-danger').append("<strong>Sorry , it seems that server is not responding. Please try again later!");
                    $('#forgotfrm').find('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#forgotfrm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $('form[name="loginfrm"]').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var username = $('#loginfrm').find("input#username").val();
            var password = $('#loginfrm').find("input#password").val();
			          
            $.ajax({
                url: "/account/proces_login/",
                type: "POST",
                data: {
                    username: username,
                    password: password
                    
                },
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						$('#loginfrm').find('#loginfrm#success').html("<div class='alert alert-success'>");
						$('#loginfrm').find('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#loginfrm').find('#success > .alert-success')
							.append("<strong>"+data.msg+"</strong>");
						$('#loginfrm').find('#success > .alert-success')
							.append('</div>');
	
						//clear all fields
						$('#loginfrm').trigger("reset");
						setTimeout(function() {
							 location.href = $('#ref_link').val();
						}, 1000);
						
						
					}
					else if(data.status == 0)
					{
						$('#loginfrm').find('#success').html("<div class='alert alert-danger'>");
                    	$('#loginfrm').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
						$('#loginfrm').find('#success > .alert-danger').append("<strong>" + data.msg + "");
						$('#loginfrm').find('#success > .alert-danger').append('</div>');
						//clear all fields
						$('#loginfrm').trigger("reset");
						
					}
					
                },
                error: function() {
                    // Fail message
                    $('#loginfrm').find('#success').html("<div class='alert alert-danger'>");
                    $('#loginfrm').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#loginfrm').find('#success > .alert-danger').append("<strong>Sorry , it seems that server is not responding. Please try again later!");
                    $('#loginfrm').find('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#loginfrm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });




	$('form[name="registerfrm"]').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var username = $('#registerfrm').find("input#username").val();
            var password = $('#registerfrm').find("input#password").val();
			var fname    = $('#registerfrm').find("input#fname").val();
			          
            $.ajax({
                url: "/account/proces_register/",
                type: "POST",
                data: {
                    username: username,
                    password: password,
					fname : fname                    
                },
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						$('#registerfrm').find('#success').html("<div class='alert alert-success'>");
						$('#registerfrm').find('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#registerfrm').find('#success > .alert-success')
							.append("<strong>"+data.msg+"</strong>");
						$('#registerfrm').find('#success > .alert-success')
							.append('</div>');
	
						//clear all fields
						$('#registerfrm').trigger("reset");
						setTimeout(function() {
							 location.href = $('#ref_link').val();
						}, 1000);
						
						
					}
					else if(data.status == 0)
					{
						$('#registerfrm').find('#success').html("<div class='alert alert-danger'>");
                   	 	$('#registerfrm').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
						$('#registerfrm').find('#success > .alert-danger').append("<strong>" + data.msg + "");
						$('#registerfrm').find('#success > .alert-danger').append('</div>');
						//clear all fields
						$('#registerfrm').trigger("reset");
						
					}
					
                },
                error: function() {
                    // Fail message
                    $('#registerfrm').find('#success').html("<div class='alert alert-danger'>");
                   $('#registerfrm').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#registerfrm').find('#success > .alert-danger').append("<strong>Sorry , it seems that server is not responding. Please try again later!");
                    $('#registerfrm').find('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#registerfrm').trigger("reset");
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

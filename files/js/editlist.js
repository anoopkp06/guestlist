// JavaScript Document$(function() {
$(function() {
    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var list_name = $("input#list_name").val();
            var gift_active = $("#gift_active").val();
			var list_gift_limit = $("input#list_gift_limit").val();
			var dollar_active = $("#dollar_active").val();
			var money_pot_active = $("#money_pot_active").val();
			var money_pot_value = $("#money_pot_value").val();
			var list_id = $("#list_id").val();
            
           var passdata = {
                    list_name: list_name,
                    gift_active: gift_active,
					list_gift_limit: list_gift_limit,
					dollar_active: dollar_active,
					money_pot_active: money_pot_active,
					money_pot_value: money_pot_value,
					list_id: list_id
                    
                };
				
			console.log(passdata);
			
            $.ajax({
                url: "/account/save_list/",
                type: "POST",
                data: passdata,
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						$('#success').html("<div class='alert alert-success'>");
						$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('#success > .alert-success')
							.append("<strong>"+data.msg+"</strong>");
						$('#success > .alert-success')
							.append('</div>');
	
						//clear all fields
						$('#loginfrm').trigger("reset");
						setTimeout(function() {
							 location.href = '/account/';
						}, 5000);
						
						
					}
					else if(data.status == 0)
					{
						$('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>" + data.msg + "");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
						
					}
					
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry , it seems that server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#loginfrm').trigger("reset");
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

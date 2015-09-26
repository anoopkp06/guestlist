 

$( ".dragitem" ).sortable({
  connectWith: "ul",
  dropOnEmpty: true
});
 

	$('ul.dragitem.li').draggable({
		connectToSortable: '.dropitems',
		helper: 'clone',
		revert: 'invalid',
		cursor: 'move'
	});
	
	$( ".dropitems" ).sortable({
	  connectWith: "ul",
	  dropOnEmpty: true
	});
		 
		$('.dragitem').droppable({
	 
			drop: function(ev, ui){
				var gift_id = $(ui.draggable).attr('data-id');
				var gift_type = $(ui.draggable).attr('gift-type');
				 
				var list_id = $(this).attr('data-id');
				var drop_email = $(this).attr('data-email');
			 
				 //alert(list_id  + '-' + gift_id + '-' +  drop_email + '-' +  gift_type);
				 
				 call_ajax_delete_gift(list_id, gift_id, drop_email, gift_type);	
					
				 
				 
			}
		}); 
		
		
		
	$('.dropitems').droppable({
	 
	drop: function(ev, ui){
		var gift_id = $(ui.draggable).attr('data-id');
		var gift_type = $(ui.draggable).attr('gift-type');
		 
		var list_id = $(this).attr('data-id');
		var drop_email = $(this).attr('data-email');
	 
		 
		if(gift_type == 'money' || gift_type == 'dollar')
		{ 
				if(gift_type == 'dollar')
				{
					$('#money_pot').hide();	
				}else{
					$('#money_pot').show();	
				}
				
				$('#g_list_id').val(list_id);
				$('#g_gift_id').val(gift_id);
				$('#g_email').val(drop_email);
				$('#g_type').val(gift_type);
				
				$.fancybox({	
						   	'width':500, 
							'height':400, 
							'autoSize' : false,
							//type: 'inline',
							content: $('#add_money').show()
				});
				
				 
			
		}else {
			
			call_ajax_gift(list_id, gift_id, drop_email, gift_type);	
			
		}
		 
		 
	}
}); 

function call_ajax_delete_gift(list_id, gift_id, drop_email, gift_type)
{
 	var gift_val = '';	
	 var passdata = {
                    list_id: list_id,
                    gift_id: gift_id,
					gift_type: gift_type,
					gift_val: gift_val,
					drop_email: drop_email                  
                };
				
			console.log(passdata);
			
            $.ajax({
                url: "/account/delete_gift/",
                type: "POST",
                data: passdata,
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						  
						  window.location.reload(); 
						
					}
					else if(data.status == 0)
					{
					 
						 
						 return false;
					}
					
                },
                error: function() {
                    
                     
                },
            }) ;	
}


function call_ajax_gift(list_id, gift_id, drop_email, gift_type)
{
	 var gift_val = '';	
	 var passdata = {
                    list_id: list_id,
                    gift_id: gift_id,
					gift_type: gift_type,
					gift_val: gift_val,
					drop_email: drop_email                  
                };
				
			console.log(passdata);
			
            $.ajax({
                url: "/account/set_gift/",
                type: "POST",
                data: passdata,
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						 alert('Gift Added !!');
						 return true;
						
					}
					else if(data.status == 0)
					{
					 
						 alert('Sorry, Cannot add gift');
						 return true;
					}
					
                },
                error: function() {
                    
                     
                },
            }) ;
}


$( ".sortable1, #sortable2, #sortable3" ).disableSelection();

  	
	$('.fancybox').fancybox({
		'width':400, 
		'height':350, 
		'autoSize' : false,
		'beforeClose': function() { window.location.reload(); },
								   
	});




 $('form[name="addmoney"]').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
          		var list_id = $('#g_list_id').val();
				var gift_id = $('#g_gift_id').val();
				var drop_email = $('#g_email').val();
				var gift_type = $('#g_type').val();
				var gift_val = $('#amt').val();
            
           var passdata = {
                    list_id: list_id,
                    gift_id: gift_id,
					gift_type: gift_type,
					gift_val: gift_val,
					drop_email: drop_email                  
                };
				
			console.log(passdata);
			
            $.ajax({
                url: "/account/set_gift/",
                type: "POST",
                data: passdata,
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						$('form[name="addmoney"]').find('#success').html("<div class='alert alert-success'>");
						$('form[name="addmoney"]').find('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('form[name="addmoney"]').find('#success > .alert-success')
							.append("<strong>"+data.msg+"</strong>");
						$('form[name="addmoney"]').find('#success > .alert-success')
							.append('</div>');
	
						//clear all fields
						$('#addmoney').trigger("reset");
						 window.location.reload();
						
						
					}
					else if(data.status == 0)
					{
						$('form[name="addmoney"]').find('#success').html("<div class='alert alert-danger'>");
						$('form[name="addmoney"]').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('form[name="addmoney"]').find('#success > .alert-danger').append("<strong>" + data.msg + "");
						$('form[name="addmoney"]').find('#success > .alert-danger').append('</div>');
						//clear all fields
						$('#addmoney').trigger("reset");
						
					}
					
                },
                error: function() {
                    // Fail message
                    $('form[name="addmoney"]').find('#success').html("<div class='alert alert-danger'>");
                    $('form[name="addmoney"]').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('form[name="addmoney"]').find('#success > .alert-danger').append("<strong>Sorry , it seems that server is not responding. Please try again later!");
                    $('form[name="addmoney"]').find('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#addmoney').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

		

    $('form[name="addGuest"]').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var uname = $("input#uname").val();
            var email = $("#email").val();
			 
			var list_id = $("#list_id").val();
            
            var passdata = {
                    uname: uname,
                    list_id: list_id,
					email: email,                  
                };
				
			console.log(passdata);
			
            $.ajax({
                url: "/account/add_guest/",
                type: "POST",
                data: passdata,
                cache: false,
				dataType: 'json',
                success: function(data) {
                    
					// Success message
                    if(data.status == 1)
					{
						$('form[name="addGuest"]').find('#success').html("<div class='alert alert-success'>");
						$('form[name="addGuest"]').find('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('form[name="addGuest"]').find('#success > .alert-success')
							.append("<strong>"+data.msg+"</strong>");
						$('form[name="addGuest"]').find('#success > .alert-success')
							.append('</div>');
					   
					   
					   
						//clear all fields
						$('#addGuest').trigger("reset");						 
						
						
					}
					else if(data.status == 0)
					{
						$('form[name="addGuest"]').find('#success').html("<div class='alert alert-danger'>");
						$('form[name="addGuest"]').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							.append("</button>");
						$('form[name="addGuest"]').find('#success > .alert-danger').append("<strong>" + data.msg + "");
						$('form[name="addGuest"]').find('#success > .alert-danger').append('</div>');
						//clear all fields
						$('#addGuest').trigger("reset");
						
					}
					
                },
                error: function() {
                    // Fail message
                    $('form[name="addGuest"]').find('#success').html("<div class='alert alert-danger'>");
                    $('form[name="addGuest"]').find('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('form[name="addGuest"]').find('#success > .alert-danger').append("<strong>Sorry , it seems that server is not responding. Please try again later!");
                    $('form[name="addGuest"]').find('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#addGuest').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });
	
	
	
	var onchange_checkbox = ($('.onchange :checkbox')).iphoneStyle({
        onChange: function(elem, value) { 
            var set_attend = 0
			if(value.toString() == 'true')
		    {
				set_attend = 1;   
					
				
			}
			var list_id = $(elem).attr('data-id');
			var email = $(elem).attr('data-email');
			
			 
			 var passdata = {
							list_id: list_id,							 
							email: email,
							attend:set_attend
						};
				
			console.log(passdata);
			
            $.ajax({
                url: "/account/made_attend/",
                type: "POST",
                data: passdata,
                cache: false,
				dataType: 'json',
                success: function(data) {
                    // Success message
                    if(data.status == 1)
					{
						 
						 return true;
						
					}
					else if(data.status == 0)
					{
					 
						  
						 return true;
					}
					
                },
                error: function() {
                    
                     
                },
            }) ;
			
			
			
			
			 
        }
      });
	 
	
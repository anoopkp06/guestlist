   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/css/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/css/style.css" media="screen" />
	
    <!-- Services Section -->
	 <?php if(!empty($error)) { ?>
	 
	  <section class="bg-light-black">
        <div class="container">
           
			
			<div class="row">
                <div class="col-lg-12 text-center list_back_head">
                    <h2 class="section-heading"> Invalid Page</h2>
                    
                </div>
				  
            </div>
		</div>
		</section>	
		
	 <?php } else { ?>
	 
    <section class="bg-light-black">
        <div class="container">
           
			
			<div class="row">
                <div class="col-lg-12 text-center list_back_head">
                    <h2 class="section-heading"><?php echo $list_details['list_name'];?></h2>
                    
                </div>
				  
            </div>
			
            <div class="row text-center ">
                <div class="guestList_conainer">
				  <table class="guestList">
				  
				  	<tr>
						<th> Name </th>
						<th> Email Address </th>
						<th> Attend  </th>
						<th> Gifts  </th>						 
					</tr>
					<?php if(!empty($guest_details)) {?>
					<?php foreach($guest_details as $guest_info) {?>
					
					<?php if($current_email == $guest_info['email']) {
							$text = 'Drop Your Gift Here.';
							$cls = 'dropitems current_drop';	
							$clsCheck = 'onchange';						
						}else {
							$text = '';
							$cls = 'other_user';
							$clsCheck = 'disabled';			
						}
						?> 
						
						
					 <tr  >
						<td> <?php echo $guest_info['name'] ;?> </td>
						<td> <?php echo $guest_info['email'] ;?> </td>
						<td class="<?php echo $clsCheck;?>"> 
						    <?php if($current_email == $guest_info['email']) { ?>
							<input type="checkbox" data-id="<?php echo $list_details['id'];?>" data-email="<?php echo $guest_info['email'] ;?>" id="onchange" <?php echo $guest_info['attend']==1?'checked="checked"':'' ?>/>
							<?php } else { ?>
							<?php echo $guest_info['attend']==1?'Yes':'Nil' ;?> 						
							<?php } ?>
						</td>
						<td class="drop_box">  
						 
						<div class="not-fixed">
						
												
						<center> <?php echo $text;?> </center>
						
						<ul  class="<?php echo $cls;?> sortable1" data-email="<?php echo $guest_info['email'] ;?>" data-id="<?php echo $list_details['id'];?>">	
						<?php if(!empty($guest_info['gifts'])) { ?>
								<?php foreach($guest_info['gifts'] as $gift_info) { ?>
								<li gift-type='<?php echo $gift_info['gift_type'];?>' data-id="<?php echo $gift_info['id'];?>" class="ui-state-highlight"><i class="fa <?php echo $gift_info['icon'];?>"></i> <?php echo $gift_info['gname'];?>
								<?php if(!empty($gift_info['gift_val'])) { ?> (<?php echo $gift_info['gift_val']; ?>)<?php } ?>
								
								</li>								
								<?php } ?>			  
											  
						<?php } ?>					  
						</ul>
						</div>
						  
						 </td>
						 
					</tr>
					 <?php } ?>
					 <?php } ?>
					
					
					
				  </table>
                </div>
				<div class="gift_conainer">
					<div class="ggt_grp"> <i class="fa fa-usd"></i> <i class="fa fa-envelope"></i> <i class="fa fa-money"></i> <?php echo $list_details['money_pot_value']-$user_pot;?>  </div>
					<ul id="sortable2" class="dragitem"  data-email="<?php echo $current_email ;?>" data-id="<?php echo $list_details['id'];?>">					 
							<?php 
							  if(!empty($gift_details)){ 
							foreach($gift_details as $gift_info) {?>	
								
								<?php if(!in_array($gift_info['id'], $current_users_ids)){ ?>		
						 		<li gift-type='<?php echo $gift_info['gift_type'];?>' data-id="<?php echo $gift_info['id'];?>" class="ui-state-highlight"><i class="fa <?php echo $gift_info['icon'];?>"></i> <?php echo $gift_info['gname'];?></li>						 
								<?php } ?>
							
							<?php } ?>	
						<?php } ?>	
						 
					</ul>
					 
				</div>
            </div>
        </div>
    </section> 
	
	<div id="add_guest">
	 	 
			<div class="col-lg-12 text-center">
									<h2 class="section-heading">Add Guest</h2>
								 
									<form name="addGuest" id="addGuest" novalidate>
								 			<input type="hidden" name="list_id" id='list_id' value="<?php echo $list_details['id']; ?>">							
										<div class="form-group">
										   <label >User Name </label>
											<input type="text" class="form-control" value="" placeholder="User Name *" id="uname" name="uname" required data-validation-required-message="User Name">
											<p class="help-block text-danger"></p>
										</div>
										
										 <div class="form-group">
											<label >Email </label>
											<input type="email" class="form-control" placeholder="Email" value="" id="email" name="email" required data-validation-required-message="User Email" >											 
											<p class="help-block text-danger"></p>
										</div>												 
										
										<div class="form-group">
											<div class="col-lg-12 text-center">
												<div id="success"></div>
												<button type="submit" class="btn btn-xl">Add</button>
											</div>
										</div>
                                </form> 
								</div>                                 
		 
	
	</div>
	
	
	
	<div id="add_money">
	 	 
			<div class="col-lg-12 text-center">
									<h2 class="section-heading">Money Value</h2>
								 
									<form name="addmoney" id="addmoney" novalidate>
								 			<input type="hidden" name="g_list_id" id='g_list_id' value="<?php echo $list_details['id']; ?>">
											<input type="hidden" name="g_gift_id" id='g_gift_id'  >
											<input type="hidden" name="g_email" id='g_email' >
											<input type="hidden" name="g_type" id='g_type' >
																									
										<div class="form-group">
										   <label >Amount </label>
											<input type="text" class="form-control" value="" placeholder="Your Amount *" id="amt" name="amt" required data-validation-required-message="Amount">
											<p class="help-block text-danger"></p>
										</div> 
										
										<div class="form-group" id='money_pot'>
										   <label >Total Money Pot : <?php echo $list_details['money_pot_value'];?> </label>
										   <br />
										   <label >Amount Added Money Pot : <?php echo $user_pot;?> </label>
											 
											<p class="help-block text-danger"></p>
										</div> 
										
										
										<div class="form-group">
											<div class="col-lg-12 text-center">
												<div id="success"></div>
												<button type="submit" class="btn btn-xl">Submit</button>
											</div>
										</div>
										
										
                                	</form> 
								</div>                                 
		 
	
	</div>
		
			
			
	<?php }?>
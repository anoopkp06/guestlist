 	
	   <section id="login_register">
        <div class="container">
            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row">
                            <div class="col-md-12" >
								<div class="col-lg-12 text-left">
									<h2 class="section-heading">Add List Details </h2>
									
							 <form name="listfrm" id="listfrm" action="/select_plan/<?php echo $segment; ?>" method="post">
								
								<div class="col-lg-6 text-left">
								 <input type="hidden" name="host_id" is='host_id' value="<?php echo $host_details['id'] ?>">
								<div class="form-group">
                                   <label >List Name </label>
								    <input type="text" class="form-control" value="" placeholder="List Name *" id="list_name" name="list_name" required data-validation-required-message="List Name">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
									<label >Gift Active </label>
									<select name="gift_active" class="form-control" id='gift_active' required data-validation-required-message="Gift Active">
									    <option value="1" >Yes</option>
										<option value="0" >No</option>
									</select>
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								 <div class="form-group">
									<label >Max Guests (Read only)</label>
									<input type="text" class="form-control" placeholder="Max Guests"  id="list_limit" disabled="disabled" name="list_limit"  value="<?php echo $host_details['list_max'] ?>" >
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								 <div class="form-group">
									<label >No of Gifts</label>
									<input type="text" class="form-control" placeholder="No of Gifts"   id="list_gift_limit" name="list_gift_limit" required data-validation-required-message="No of Gifts">
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								</div>
								<div class="col-lg-6 text-left">
								
								
								 <div class="form-group">
									<label >Money Option Active</label>
									<select name="dollar_active" class="form-control" id='dollar_active' required data-validation-required-message="Money Option Active">
									 <option value="1" >Yes</option>
										<option value="0" >No</option>
									</select>
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								 <div class="form-group">
									<label >Money Pot Active</label>
									<select name="money_pot_active" class="form-control" id='money_pot_active' required data-validation-required-message="Money Pot Active">
									  <option value="1" >Yes</option>
										<option value="0" >No</option>
									</select>
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								 <div class="form-group">
									<label >Money Pot Active (Enter Only if Money Pot Active)</label>
									<input type="text" class="form-control" placeholder="Money Pot Amount"  id="money_pot_value"   name="money_pot_value"  >
                                     
                                    <p class="help-block text-danger"></p>
                                </div> 
								</div>
								
								<div class="form-group">
                                    <div class="col-lg-12 text-center">
									<div id="success">
										<?php if(isset($error) && $error == 1) { ?>
											<div class='alert alert-danger'><?php echo $error_message; ?> </div>
										<?php } ?>
									</div>
									
									
									<button type="submit" name="submit" value="submit" class="btn btn-xl">Make Paymnet</button>
                           	 		</div>
                                </div>
                                </form> 
									
								</div>                                 
                            </div>
							<div class="clearfix"></div>
							  
                           
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
	
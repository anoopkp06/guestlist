 	
	   <section id="login_register">
        <div class="container">
            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row">
                            <div class="col-md-12" >
								<div class="col-lg-12 text-left">
									<h2 class="section-heading">Edit list</h2>
									
							 <form name="listfrm" id="listfrm" novalidate>
								
								<div class="col-lg-6 text-left">
								<input type="hidden" name="list_id" id='list_id' value="<?php echo $list_details['id']; ?>">
								<div class="form-group">
                                   <label >List Name </label>
								    <input type="text" class="form-control" value="<?php echo $list_details['list_name']; ?>" placeholder="List Name *" id="list_name" name="list_name" required data-validation-required-message="List Name">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
									<label >Gift Active </label>
									<select name="gift_active" class="form-control" id='gift_active' required data-validation-required-message="Gift Active">
									    <option <?php if($list_details['gift_active'] == 1){?> selected="selected" <?php }?>>Yes</option>
										<option <?php if($list_details['gift_active'] == 0){?> selected="selected" <?php }?> >No</option>
									</select>
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								 <div class="form-group">
									<label >Max Guests (Read only)</label>
									<input type="text" class="form-control" placeholder="Max Guests" value="<?php echo $list_details['list_limit']; ?>" id="list_limit" disabled="disabled" name="list_limit"  >
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								 <div class="form-group">
									<label >No of Gifts</label>
									<input type="text" class="form-control" placeholder="No of Gifts" value="<?php echo $list_details['list_gift_limit']; ?>" id="list_gift_limit" name="list_gift_limit" required data-validation-required-message="No of Gifts">
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								</div>
								<div class="col-lg-6 text-left">
								
								
								 <div class="form-group">
									<label >Money Option Active</label>
									<select name="dollar_active" class="form-control" id='dollar_active' required data-validation-required-message="Money Option Active">
									  <option <?php if($list_details['dollar_active'] == 1){?> selected="selected" <?php }?>>Yes</option>
										<option <?php if($list_details['dollar_active'] == 0){?> selected="selected" <?php }?> >No</option>
									</select>
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								 <div class="form-group">
									<label >Money Pot Active</label>
									<select name="money_pot_active" class="form-control" id='money_pot_active' required data-validation-required-message="Money Pot Active">
									  <option <?php if($list_details['money_pot_active'] == 1){?> selected="selected" <?php }?>>Yes</option>
										<option <?php if($list_details['money_pot_active'] == 0){?> selected="selected" <?php }?> >No</option>
									</select>
                                     
                                    <p class="help-block text-danger"></p>
                                </div>
								
								
								 <div class="form-group">
									<label >Money Pot Active (Enter Only if Money Pot Active)</label>
									<input type="text" class="form-control" placeholder="Money Pot Amount" value="<?php echo $list_details['money_pot_value']; ?>" id="money_pot_value"   name="money_pot_value"  >
                                     
                                    <p class="help-block text-danger"></p>
                                </div> 
								</div>
								
								<div class="form-group">
                                    <div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" class="btn btn-xl">Update</button>
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
	
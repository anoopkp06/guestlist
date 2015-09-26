<section id="login_register">
        <div class="container">
            <div class="row">                
            </div>
            <div class="row">
                <div class="col-lg-12">                    
                        <div class="row">
                            <div class="col-md-12">
								<div class="col-lg-12 text-center">
									<h2 class="section-heading">My Account</h2>
									<h3 class="section-subheading text-muted">Manage your account details here.</h3>								
								</div>                                 
                            </div>
							<div class="clearfix"></div>
							<div class="col-md-6">
								<div class="col-lg-12 text-center">
									<h2 class="section-heading">My Guest Lists</h2>
									<h3 class="section-subheading text-muted">Manage your guestlist details here.</h3>
									<table class="myaccounttbl" cellpadding="5" cellspacing="5">
										<tr>
											<th> Host Plan</th>
											<th> List Name </th>
											<th> Action </th>
										</tr>
										<?php if(count($host_plans) > 0) { ?>										
											<?php foreach($host_plans as $val) { ?>											
											<tr>
												<td><?php echo $val['host_name']; ?> </td>
												<td><?php echo $val['list_name']; ?> </td>
												<td> 
												<?php if($val['active'] == 1) {  ?> 
												<a href="/account/edit_list/<?php echo $this->encrypt->encode($val['list_id'], 'guest'); ?>/">Edit </a> /  
												<a href="/listpage/<?php echo $this->encrypt->encode($val['list_id'], 'guest'); ?>/"> View List </a>
												<?php } else { ?>
													In Active 
												<?php } ?>
												</td>
											</tr>	
											
											<?php } ?>
											
										<?php } ?>	
										
									</table>
									
									
								</div>                                 
                            </div>
							<div class="col-md-6">
								<div class="col-lg-12 text-center">
									<h2 class="section-heading">Update Account</h2>
									<h3 class="section-subheading text-muted">Edit account details</h3>
									<form name="updateUser" id="updateUser" novalidate>
								
										 
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_data['id']; ?>">
										
										<div class="form-group">
										   <label >User Name </label>
											<input type="text" class="form-control" value="<?php echo $user_data['uname']; ?>" placeholder="User Name *" id="uname" name="uname" required data-validation-required-message="User Name">
											<p class="help-block text-danger"></p>
										</div>
										
										 <div class="form-group">
											<label >Email </label>
											<input type="text" class="form-control" placeholder="Email" value="<?php echo $user_data['email']; ?>" id="email" name="email"  disabled="disabled">
											 
											<p class="help-block text-danger"></p>
										</div>
																			
										 <div class="form-group">
											<label >Password</label>
											<input type="password" class="form-control" placeholder="Password" value="<?php echo base64_decode($user_data['password']); ?>" id="password"  name="password">
											 
											<p class="help-block text-danger"></p>
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
                        </div>
                    
                </div>
            </div>
        </div>
</section>
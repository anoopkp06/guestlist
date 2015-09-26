 	
	   <section id="login_register">
        <div class="container">
            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row">
                            <div class="col-md-12" >
								<div class="col-lg-12 text-left">
									<h2 class="section-heading">Paypal Redirecting...Please wait..</h2>
									
							 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="payFrom" id="payFrom">
								<input type="hidden" name="cmd" value="_xclick">
								<input type="hidden" name="business" value="sellcode.in@gmail.com">
								<input type="hidden" name="item_name" value="<?php echo $host_name;?>  - <?php echo $list_name;?>">
								<input type="hidden" name="item_number" value="<?php echo $pay_id;?>">
								<input type="hidden" name="amount" value="<?php echo $amt;?>">
								<input type="hidden" name="tax" value="0">
								<input type="hidden" name="quantity" value="1">
								<input type="hidden" name="no_note" value="1">
								<input type="hidden" name="currency_code" value="USD">
								<input type="hidden" name="custom" value="<?php echo $pay_id;?>">
								<input type="hidden" name="notify_url" value="<?php echo base_url();?>ipn/index/">
							 
							</form>
									
								</div>                                 
                            </div>
							<div class="clearfix"></div>
							  
                           
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
	

	<div class="content">

<div class="user-profile" id="pad-wrapper">

            <!-- header -->

           

            

            <div class="col-md-7 personal-info">

                   

                   <?php if(isset($msg) && !empty($msg)) { ?>

                    <div class="alert alert-info">

                        <i class="icon-lightbulb"></i>

                        <?php echo $msg; ?>

                    </div>

                    <?php } ?>

                    <h2 class="personal-title">Order info</h2>

 

                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>admin/order_one/<?php echo $results['id'];?>/" method="post">

                        <div class="form-group">

                            <label class="col-lg-4 control-label">User Email :</label>

                            <div class="col-lg-8">

                                <input readonly="readonly"   value="<?php echo $results['email'];?>" class="form-control">

                            </div>

                        </div>

                         

                        <div class="form-group">

                            <label class="col-lg-4 control-label">User Name :</label>

                            <div class="col-lg-8">

                                <input readonly="readonly"   value="<?php echo $results['uname'];?>" class="form-control">

                            </div>

                        </div>
						
						
						 <div class="form-group">

                            <label class="col-lg-4 control-label">Host Plan :</label>

                            <div class="col-lg-8">

                                <input readonly="readonly"   value="<?php echo $results['host_name'];?>" class="form-control">

                            </div>

                        </div>
						

                         

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Payment Date:</label>

                            <div class="col-lg-8">

                                <input  name="dt_created"  value="<?php echo $results['paymnet_date'];?>" class="form-control">

                            </div>

                        </div>
						
						
						 <div class="form-group">

                            <label class="col-lg-4 control-label">Payment Status:</label>

                            <div class="col-lg-8">

                               <select name="status" id="status"> 

	                            <option <?php if( 'Completed' == $results['status'] ){?> selected="selected" <?php }?> value="Completed">Completed</option>

	                            <option <?php if( 'Cancel' == $results['status'] ){?> selected="selected" <?php }?> value="Cancel">Cancel</option>

	                            <option <?php if( 'initialize' == $results['status'] ){?> selected="selected" <?php }?> value="initialize">initialize</option>

	                            <option <?php if( 'Pending' == $results['status'] ){?> selected="selected" <?php }?> value="Pending">Pending</option>
								
       						 </select>

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Amount :</label>

                            <div class="col-lg-8 input-group">

                             <span class="input-group-addon">$</span><input  name="amt" type="text" value="<?php echo $results['amt'];?>" class="form-control">


                            </div>

                        </div>

                        
                     
                         

                        <div class="actions">

                            <input type="submit" name="submit" value="Save Changes" class="btn-glow primary">

                            <span>OR</span>

                             

                             <input type="submit" class="btn btn-danger" name="delete" value="Delete">

                        </div>

                    </form>

                </div>

                

                

        </div>

        </div>
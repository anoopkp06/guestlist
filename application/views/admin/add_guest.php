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

                    

                      
					

						 <h3 class="personal-title">Add Guest</h3>

					 
                    <form role="form" class="form-horizontal" action="<?php echo base_url()?>admin/add_guest/" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Email :</label>

                            <div class="col-lg-8">

                                <input name="email" type="text"   class="form-control">

                            </div>

                        </div>

                         <div class="form-group">

                            <label class="col-lg-3 control-label">Name:</label>

                            <div class="col-lg-8">

                                <input  name="name" type="text"   class="form-control">

                            </div>

                        </div>

                         

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Guest List :</label>

                            <div class="col-lg-8">

                            

                            <div class="ui-select">

                                    <select name="list_id" id="list_id">

	                                      <?php foreach($list as $val) {?>

	                                    	 <option value="<?php echo $val['id'];?>"><?php echo $val['list_name'];?></option>

	                                    <?php }?>

                                    </select>

                              

                            </div>

                        </div>

                        </div>
 
                      

                        <div class="actions">

                            <input type="submit" name="submit" value="Save Changes" class="btn-glow primary">

                             

                        </div>

                    </form>

                     
                    

                </div>

                

                <div class="clear" style="clear: both;"></div>

         

                

        </div>

        </div>
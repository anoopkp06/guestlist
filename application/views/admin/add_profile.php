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

                    

                      
					

						 <h3 class="personal-title">User info</h3>

					 
                    <form role="form" class="form-horizontal" action="<?php echo base_url()?>admin/add_account/<?php echo $page;?>/" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Email :</label>

                            <div class="col-lg-8">

                                <input name="email" type="text"   class="form-control">

                            </div>

                        </div>

                         <div class="form-group">

                            <label class="col-lg-3 control-label">Name:</label>

                            <div class="col-lg-8">

                                <input  name="uname" type="text"   class="form-control">

                            </div>

                        </div>

                         

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Password:</label>

                            <div class="col-lg-8">

                                <input type="password"   value="" name="password" class="form-control">

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Active:</label>

                            <div class="col-lg-8">

                            

                            <div class="ui-select">

                                    <select name="active" id="active">

	                                    <option   value="1">Active</option>

	                                    <option  value="0">Inactive</option>

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
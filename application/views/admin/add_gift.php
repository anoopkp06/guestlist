 <div class="content">

<div class="user-profile" id="pad-wrapper">

            <!-- header -->

           

            <div class="row header">

                <h2 class="personal-title">Add New Gift</h2>

                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">

                    <a class="btn-flat success pull-right" href="/admin/add_gift/">

                        <span>+</span>

                        Add Gift

                    </a>

                </div>

 			</div>

 

            <div class="col-md-7 personal-info">

                   

                   <?php if(isset($msg) && !empty($msg)) { ?>

                    <div class="alert alert-info">

                        <i class="icon-lightbulb"></i>

                        <?php echo $msg; ?>

                    </div>

                    <?php } ?>

                   

 

                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>admin/add_gift/" method="post">

                         

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Gift Name :</label>

                            <div class="col-lg-8">

                                <input  name="gname" id='gname' type="text"  class="form-control">

                            </div>

                        </div>
						
						
						<div class="form-group">

                            <label class="col-lg-4 control-label">Gift Type :</label>

                            <div class="col-lg-8">

                              <select name="gift_type" id="gift_type" >
							  	<option value="gift">Gift</option>
								<option value="dollar">Dollar</option>
								<option value="money">Money Pot</option>								 								
							  </select>
							  

                            </div>

                        </div>
 
                          

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Icon :</label>

                            <div class="col-lg-8">

                                <input  name="icon" type="text"  id='icon' class="form-control">
								<a target="_blank" href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/"> More Icons </a>
                            </div>

                        </div>
						
						 
                           

                        <div class="actions">

                            <input type="submit" name="submit" value="Add Gift" class="btn-glow primary">
 
                        </div>

                    </form>

                </div>
 

        </div>

        </div>

        

     

        
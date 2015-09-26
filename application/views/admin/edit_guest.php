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

                    

                      
					

						 <h3 class="personal-title">Edit Guest</h3>

					 
                    <form role="form" class="form-horizontal" action="<?php echo base_url()?>admin/guest/<?php echo $results['id'];?>/" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Email :</label>

                            <div class="col-lg-8">

                                <input name="email" type="text" readonly="readonly" value="<?php echo $results['email'];?>"  class="form-control">

                            </div>

                        </div>

                         <div class="form-group">

                            <label class="col-lg-3 control-label">Name:</label>

                            <div class="col-lg-8">

                                <input  name="name" type="text"  value="<?php echo $results['name'];?>"  class="form-control">

                            </div>

                        </div>

                         

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Guest List :</label>

                            <div class="col-lg-8">

                            

                            <div class="ui-select">

                                    <select name="list_id" id="list_id">

	                                      <?php foreach($list as $val) {?>

	                                    	 <option <?php if($results['list_id'] == $val['id']){ ?>  selected="selected" <?php } ?> value="<?php echo $val['id'];?>"><?php echo $val['list_name'];?></option>

	                                    <?php }?>

                                    </select>

                              

                            </div>

                        </div>

                        </div>
 
                      

                         <div class="actions">

                            <input type="submit" name="submit" value="Update Guest Details" class="btn-glow primary">

                            

                            <span>OR</span>

                             

                             <input type="submit" class="btn btn-danger" name="delete" value="Delete">

                             

                        </div>

                    </form>

                     
                    

                </div>

                

                <div class="clear" style="clear: both;"></div>

         

                

        </div>

        </div>
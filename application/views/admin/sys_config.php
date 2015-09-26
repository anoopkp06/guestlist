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
                    <h2 class="personal-title">System Configurations</h2>
 
                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>home/sys_config/" method="post">
                       
                       <?php if(!empty($results)){?>
                       		
                       		<?php foreach($results as $val){?>
                       			
                       				 <div class="form-group">
			                            <label class="col-lg-4 control-label"><?php echo $val['key'] ?> :</label>
			                            <div class="col-lg-8">
			                                <input name="val_<?php echo $val['id'] ?>"  value="<?php echo $val['value'] ?>" class="form-control">
			                            </div>
			                        </div>
                       			
                       		
                       		<?php }?>                       
                       
                       <?php }?>
                        
                        <div class="actions">
                            <input type="submit" name="submit" value="Save Changes" class="btn-glow primary">
                            <span>OR</span>
                             
                             <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                        </div>
                    </form>
                </div>
                
                
        </div>
        </div>
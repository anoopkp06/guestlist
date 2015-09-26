
 
 
 	<div class="content">
<div class="user-profile" id="pad-wrapper">
            <!-- header -->
           
            <div class="row header">
                <h2 class="personal-title">New Service Type</h2>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <a class="btn-flat success pull-right" href="/home/newservice_type/">
                        <span>+</span>
                        Add Service Type
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
                   
 
                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>home/newservice_type/" method="post">
                         
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Service Type Name :</label>
                            <div class="col-lg-8">
                                <input  name="name" type="text"  class="form-control">
                            </div>
                        </div>
                          
                         
                        <div class="actions">
                            <input type="submit" name="submit" value="Add Service Type" class="btn-glow primary">
                             
                        </div>
                    </form>
                </div>
                
                
        </div>
        </div>

 
 
 	<div class="content">
<div class="user-profile" id="pad-wrapper">
            <!-- header -->
           
            <div class="row header">
                <h2 class="personal-title">New Profession</h2>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <a class="btn-flat success pull-right" href="/home/addprofession/">
                        <span>+</span>
                        Add Profession
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
                   
 
                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>home/addprofession/" method="post">
                         
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Profession Name :</label>
                            <div class="col-lg-8">
                                <input  name="name" type="text"  class="form-control">
                            </div>
                        </div>
                          
                          
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Icon </label>
                            <div class="col-lg-8">
                               
                               <input type="file" name="image_icon" >
                            </div>
                        </div>
                        
                        
                         
                        <div class="actions">
                            <input type="submit" name="submit" value="Add Category" class="btn-glow primary">
                             
                        </div>
                    </form>
                </div>
                
                
        </div>
        </div>
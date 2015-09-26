
 
 
 	<div class="content">
<div class="user-profile" id="pad-wrapper">
            <!-- header -->
           
            <div class="row header">
                <h2 class="personal-title">Page Details</h2>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <!--<a class="btn-flat success pull-right" href="/home/addpage/">
                        <span>+</span>
                        Add Page
                    </a>
                --></div>
 			</div>
 
            <div class="col-md-9 personal-info">
                   
                   <?php if(isset($msg) && !empty($msg)) { ?>
                    <div class="alert alert-info">
                        <i class="icon-lightbulb"></i>
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>
                   
 
                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>home/page/<?php echo $results['id'];?>/" method="post">
                        <div class="form-group">
                            <label class="col-lg-4 control-label">ID :</label>
                            <div class="col-lg-6">
                                <input readonly="readonly"  name="id" type="text" value="<?php echo $results['id'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Title :</label>
                            <div class="col-lg-6">
                                <input  name="key_word" type="text" value="<?php echo $results['key_word'];?>" class="form-control">
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-lg-4 control-label">Current File :</label>
                            <div class="col-lg-6">
                             	<a href="<?php echo $results['content'];?>"> File Download </a> 
                               
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-lg-4 control-label">Update File :</label>
                            <div class="col-lg-6">                             
                               <input type="file" name="content" id='content'>
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
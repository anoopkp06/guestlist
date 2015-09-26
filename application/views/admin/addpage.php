
 
 
 	<div class="content">
<div class="user-profile" id="pad-wrapper">
            <!-- header -->
           
            <div class="row header">
                <h2 class="personal-title">New Page</h2>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right"><!--
                    <a class="btn-flat success pull-right" href="/home/addpage/">
                        <span>+</span>
                        Add Page
                    </a>
                --></div>
 			</div>
 
            <div class="col-md-7 personal-info">
                   
                   <?php if(isset($msg) && !empty($msg)) { ?>
                    <div class="alert alert-info">
                        <i class="icon-lightbulb"></i>
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>
                   
 
                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>home/addpage/" method="post">
                         
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Page Title :</label>
                            <div class="col-lg-8">
                                <input  name="key_word" type="key_word"  class="form-control">
                            </div>
                        </div>
                          
                          
                         <div class="form-group">
                            <label class="col-lg-3 control-label">Text :</label>
                            <div class="col-lg-9">
                             <input type="file" name="content" id='content'>
                               
                            </div>
                        </div>
                          
                         
                        <div class="actions">
                            <input type="submit" name="submit" value="Add Page" class="btn-glow primary">
                             
                        </div>
                    </form>
                </div>
                
                
        </div>
        </div>
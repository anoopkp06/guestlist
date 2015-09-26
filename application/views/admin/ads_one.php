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
                    <h2 class="personal-title">Ads info</h2>
 
                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>home/ads_one/<?php echo $results[0]['id'];?>/" method="post">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Posted By :</label>
                            <div class="col-lg-8">
                                <input readonly="readonly"  name="user_id" type="text" value="<?php echo $results[0]['user_email'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Title :</label>
                            <div class="col-lg-8">
                                <input  name="title" type="text" value="<?php echo $results[0]['title'];?>" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-lg-3 control-label">Description :</label>
                            <div class="col-lg-8">
                                <textarea  name="description"  class="form-control"><?php echo $results[0]['description'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">price :</label>
                            <div class="col-lg-8 input-group">
                             <span class="input-group-addon">$</span><input  name="price" type="text" value="<?php echo $results[0]['price'];?>" class="form-control">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contact Phone :</label>
                            <div class="col-lg-8">
                             <input  name="contact_phone" type="text" value="<?php echo $results[0]['contact_phone'];?>" class="form-control">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contact Email :</label>
                            <div class="col-lg-8">
                             <input  name="contact_email" type="text" value="<?php echo $results[0]['contact_email'];?>" class="form-control">
                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Location :</label>
                            <div class="col-lg-8">
                            <input  name="location" type="text" value="<?php echo $results[0]['location'];?>" class="form-control">
                                 
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category:</label>
                            <div class="col-lg-8">
                            
                            <div class="ui-select">
                                    <select name="cat_id" id="cat_id">
	                                    <?php foreach($cat as $val) {?>
	                                    	 <option <?php if( $val['id'] == $results[0]['cat_id']){?> selected="selected" <?php }?> value="<?php echo $val['id'];?>"><?php echo $val['cat_name'];?></option>
	                                    <?php }?>
                                    </select>
                            </div>
                        </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Active:</label>
                            <div class="col-lg-8">
                            <div class="ui-select">
                                    <select name="active" id="active">
	                                    <option <?php if( $results[0]['active'] == 1){?> selected="selected" <?php }?> value="1">Active</option>
	                                    <option <?php if( $results[0]['active'] == 0){?> selected="selected" <?php }?> value="0">Inactive</option>
                                    </select>
                            </div>
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date Added:</label>
                            <div class="col-lg-8">
                                <input type="text" name="added_date" value="<?php echo $results[0]['added_date'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Photo 1:</label>
                            <div class="col-lg-8">
                               <?php if(!empty($results[0]['photo1'])) {?>
                               	<img alt="" src="<?php echo $results[0]['photo1'];?>">
                               <?php } ?>
                               <input type="file" name="photo1" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Photo 2:</label>
                            <div class="col-lg-8">
                               <?php if(!empty($results[0]['photo2'])) {?>
                               	<img alt="" src="<?php echo $results[0]['photo2'];?>">
                               <?php } ?>
                               <input type="file" name="photo2" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Photo 3:</label>
                            <div class="col-lg-8">
                               <?php if(!empty($results[0]['photo3'])) {?>
                               	<img alt="" src="<?php echo $results[0]['photo3'];?>">
                               <?php } ?>
                               <input type="file" name="photo3" >
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
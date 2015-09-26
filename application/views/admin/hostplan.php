 <div class="content">

<div class="user-profile" id="pad-wrapper">

            <!-- header -->

           

            <div class="row header">

                <h2 class="personal-title">Edit Host Plan</h2>

                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">

                    <a class="btn-flat success pull-right" href="/admin/addhostplan/">

                        <span>+</span>

                        Add Host Plan

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

                   

 

                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>admin/hostplan/<?php echo $results['id'];?>/" method="post">

                         

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Plan Name :</label>

                            <div class="col-lg-8">

                                <input  name="host_name" id='host_name' value="<?php echo $results['host_name'];?>" type="text"  class="form-control">

                            </div>

                        </div>
						
						
						<div class="form-group">

                            <label class="col-lg-4 control-label">List Max :</label>

                            <div class="col-lg-8">

                                <input  name="list_max" id='list_max' type="text"  value="<?php echo $results['list_max'];?>" class="form-control">

                            </div>

                        </div>
 
                          

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Amount :</label>

                            <div class="col-lg-8">

                                <input  name="amt" type="text"  id='amt' value="<?php echo $results['amt'];?>" class="form-control">

                            </div>

                        </div>
						
						
						 <div class="form-group">

                            <label class="col-lg-4 control-label">iCon website :</label>

                            <div class="col-lg-8">

                                <input  name="icon" type="text"  id='icon' value="<?php echo $results['icon'];?>" class="form-control">

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

        

     

        
 <div class="content">

<div class="user-profile" id="pad-wrapper">

            <!-- header -->

           

            <div class="row header">

                <h2 class="personal-title">New Host Plan</h2>

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

                   

 

                    <form role="form" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url()?>admin/addhostplan/" method="post">

                         

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Plan Name :</label>

                            <div class="col-lg-8">

                                <input  name="host_name" id='host_name' type="text"  class="form-control">

                            </div>

                        </div>
						
						
						<div class="form-group">

                            <label class="col-lg-4 control-label">List Max :</label>

                            <div class="col-lg-8">

                                <input  name="list_max" id='list_max' type="text"  class="form-control">

                            </div>

                        </div>
 
                          

                        <div class="form-group">

                            <label class="col-lg-4 control-label">Amount :</label>

                            <div class="col-lg-8">

                                <input  name="amt" type="text"  id='amt' class="form-control">

                            </div>

                        </div>
						
						
						 <div class="form-group">

                            <label class="col-lg-4 control-label">iCon website :</label>

                            <div class="col-lg-8">

                                <input  name="icon" type="text"  id='icon' class="form-control">

                            </div>

                        </div>

                           

                        <div class="actions">

                            <input type="submit" name="submit" value="Add Host" class="btn-glow primary">
 
                        </div>

                    </form>

                </div>
 

        </div>

        </div>

        

     

        
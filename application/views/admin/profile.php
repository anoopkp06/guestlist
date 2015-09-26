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

					 <h3 class="personal-title">User info</h3>

					 
                    <form role="form" class="form-horizontal" action="<?php echo base_url()?>admin/user/<?php echo $results['id'];?>/" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Email :</label>

                            <div class="col-lg-8">

                                <input readonly="readonly" name="email" type="text" value="<?php echo $results['email'];?>" class="form-control">

                            </div>

                        </div>

                         <div class="form-group">

                            <label class="col-lg-3 control-label">Name:</label>

                            <div class="col-lg-8">

                                <input  name="uname" type="text" value="<?php echo $results['uname'];?>" class="form-control">

                            </div>

                        </div>

                        

                      

                        

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Active:</label>

                            <div class="col-lg-8">

                            

                            <div class="ui-select">

                                    <select name="active" id="active">

	                                    <option <?php if( $results['active'] == 1){?> selected="selected" <?php }?> value="1">Active</option>

	                                    <option <?php if( $results['active'] == 0){?> selected="selected" <?php }?> value="0">Inactive</option>

                                    </select>

                              

                            </div>

                        </div>

                        </div>

                        

                        <div class="form-group">

                            <label class="col-lg-3 control-label">Date Added:</label>

                            <div class="col-lg-8">

                                <input type="text" name="dt_created" value="<?php echo $results['dt_created'];?>" class="form-control">

                            </div>

                        </div>

                       
                      

                        <div class="actions">

                            <input type="submit" name="submit" value="Save Changes" class="btn-glow primary">

                            <span>OR</span>

                             

                             <input type="submit" class="btn btn-danger" name="delete" value="Delete">

                        </div>

                    </form>

                    

                    

                     

            

                    

                </div>

                

                <div class="clear" style="clear: both;"></div>

                <div class="col-md-12 personal-info">

                <br><br><br>

                	<h3>Credit Transasction </h3>

                	<?php if(!empty($transasction)) {?>

	                	<table class="table table-hover">

	                        <thead>

	                            <tr>

	                                <th class="col-md-3 sortable">

	                                    From User

	                                </th>	                                

	                                <th class="col-md-2 sortable">

	                                     Credits

	                                </th>

	                                 <th class="col-md-2 sortable">

	                                   Action

	                                </th>

	                                 <th class="col-md-3 sortable">

	                                   TRansaction Date

	                                </th>

	                                

	                                <th class="col-md-4 sortable">

	                                  Book ID (If Book Transaction)

	                                </th>

	                                 

	                                

	                            </tr>

	                        </thead>

	                        <tbody>

	                       

	                        <?php if(!empty($transasction)) { ?>

	                        <?php foreach($transasction as $val) {?>

	                        <!-- row -->

	                        <tr class="first">

	                            <td>	                                

	                                 <?php echo $val->f_email;?> (<?php echo $val->f_name;?>)

	                            </td>

	                             <td>	                                

	                                 <?php echo $val->credits;?>  

	                            </td>

	                            

	                             <td>	                                

	                                 <?php echo $val->action;?>  

	                            </td>

	                            <td>	                                

	                                 <?php echo $val->transaction_date;?>  

	                            </td>

	                            <td>	                                

	                                 <?php echo $val->book_id;?> 

	                                 <?php if($val->book_id != '') {?>

	                                 <a href="/home/order_one/<?php echo $val->book_id;?>/"> (View Details) </a>

	                                 <?php } ?> 

	                            </td>

	                            

	                             

	                        </tr>

	                        <?php } } ?>

	                        </tbody>

	                    </table>

                	

                	<?php }else { ?>

                		<p> No Transaction </p>

                		

                		

                		

                <?php	} ?>

                </div>

                

                

                

                

                 <div class="clear" style="clear: both;"></div>

                <div class="col-md-12 personal-info">

                <br><br><br>

                	<h3>Customer Reviews </h3>

                	<?php if(!empty($review)) {?>

	                	<table class="table table-hover">

	                        <thead>

	                            <tr>

	                                <th class="col-md-3 ">

	                                    From User

	                                </th>

	                                	                                

	                                <th class="col-md-2 ">

	                                     Rating (Out of 5)

	                                </th>

	                                

	                                 <th class="col-md-3 ">

	                                   Review

	                                </th>

	                                

	                                 <th class="col-md-3 ">

	                                   Date

	                                </th>

	                                

	                                 <th class="col-md-2 ">

	                                    Up

	                                </th>

	                                

	                                <th class="col-md-2 ">

	                                    Down

	                                </th> 

	                                

	                            </tr>

	                        </thead>

	                        <tbody>

	                       

	                        <?php if(!empty($review)) { ?>

	                        <?php foreach($review as $val) {?>

	                        <!-- row -->

	                        <tr class="first">

	                            <td>	                                

	                                 <?php echo $val->f_email;?> (<?php echo $val->f_name;?>)

	                            </td>

	                             <td>	                                

	                                 <?php echo $val->rate;?>  

	                            </td>

	                            

	                             <td>	                                

	                                 <?php echo $val->review;?>  

	                            </td>

	                            <td>	                                

	                                 <?php echo $val->created_date;?>  

	                            </td>

	                            <td>	                                

	                                 <?php echo $val->recommend;?>  

	                            </td>



 								<td>	                                

	                                 <?php echo $val->not_recommend;?>  

	                            </td>	                            

	                             

	                        </tr>

	                        <?php } } ?>

	                        </tbody>

	                    </table>

                	

                	<?php }else { ?>

                		<p> No Reviews </p>

                		

                		

                		

                <?php	} ?>

                </div>

                

        </div>

        </div>
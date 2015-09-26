	<div class="content">
 <link href="<?php echo base_url(); ?>files/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<div class="users-list" id="pad-wrapper">

            <h3> Gifts </h3>



			<div class="row header">

                

                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">

                 
 
                	<a class="btn-flat success pull-right" href="/admin/add_gift/">

                        <span>+</span>

                          Add Gift  

                    </a>

                 
                    

                </div>

 			</div>

 			

 			

            <!-- Users table -->

            <div class="row">

                <div class="col-md-12">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th class="col-md-3 sortable">

                                    Gift Name

                                </th>                                

                                <th class="col-md-2 sortable">

                                        Gift Type

                                </th> 
								
								<th class="col-md-2 sortable">

                                     Icon

                                </th>  

                            </tr>

                        </thead>

                        <tbody>

                       

                        <?php if(!empty($results)) { ?>

                        <?php foreach($results as $val) {?>

                        <!-- row -->

                        <tr class="first">

                            <td> 
                                <a class="name" href="/admin/gift/<?php echo $val->id?>"><?php echo $val->gname?></a>

                            </td>
 
                            <td>

                               <?php echo $val->gift_type?> 

                            </td>
							
							<td>

                              <i class="fa <?php echo $val->icon?>"></i> <?php echo $val->icon?>

                            </td>
 

                        </tr>

                        <?php } } ?>

                        </tbody>

                    </table>

                </div>

            </div>

            <?php echo $links; ?>

             

            <!-- end users table -->

        </div>

        </div>
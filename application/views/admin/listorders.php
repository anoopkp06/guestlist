	<div class="content">

	<div class="users-list" id="pad-wrapper">

            <h3> Lists </h3>



            <!-- Users table -->

            <div class="row">

                <div class="col-md-12">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th class="col-md-2">

                                    Payment Date

                                </th>

                                <th class="col-md-3">

                                    User Name

                                </th>

                                <th class="col-md-3 ">

                                 User Email

                                </th>

                                <th class="col-md-2">

                                    Amount

                                </th>

                                <th class="col-md-2">

                                 Pay Status

                                </th>

                                 <th class="col-md-3">

                                     List Name

                                </th>
								
								  <th class="col-md-3">

                                     Hosting Plan

                                </th>

                            </tr>

                        </thead>

                        <tbody>

                       

                        <?php if(!empty($results)) { ?>

                        <?php foreach($results as $val) {?>

                        <!-- row -->

                        <tr class="first">

                             <td>                                 

                                <a class="name"  href="/admin/order_one/<?php echo $val->id;?>/" ><?php echo $val->paymnet_date?></a>

                            </td>

                            <td>                                 

                                <a class="name" href="/admin/order_one/<?php echo $val->id;?>/" ><?php echo $val->uname?></a>

                            </td>

                            <td>

                             <?php echo $val->email?>

                            </td>
							
							
							 <td>

                             <?php echo $val->amt?>

                            </td>
							
							 <td>

                             <?php echo $val->status?>

                            </td>

                            <td>

                               <?php echo $val->list_name?>

                            </td>

                            <td  >

                                 <?php echo $val->host_name;?> 

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
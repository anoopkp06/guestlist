	<div class="content">

	<div class="users-list" id="pad-wrapper">

            <h3> <?php echo $h1;  ?></h3>



			<div class="row header">

                

                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">

                 

                

                	<a class="btn-flat success pull-right" href="/admin/add_account/user">

                        <span>+</span>

                          Add User  

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

                                    Email

                                </th>                                

                                <th class="col-md-2 sortable">

                                    <span class="line"></span>User Name

                                </th>  

                            </tr>

                        </thead>

                        <tbody>

                       

                        <?php if(!empty($results)) { ?>

                        <?php foreach($results as $val) {?>

                        <!-- row -->

                        <tr class="first">

                            <td> 
                                <a class="name" href="/admin/user/<?php echo $val->id?>"><?php echo $val->email?></a>

                            </td>
 
                            <td>

                               <?php echo $val->uname?>

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
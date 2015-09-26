	<div class="content">

	<div class="users-list" id="pad-wrapper">
 

		<div class="row header">

                <h2 class="personal-title">Host Plan</h2>

                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">

                    <a class="btn-flat success pull-right" href="/admin/addhostplan/">

                        <span>+</span>

                        Add Host Plan

                    </a>

                </div>

 			</div>

            <!-- Users table -->

            <div class="row">

                <div class="col-md-12">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th class="col-md-4 sortable">

                                    ID

                                </th>

                                <th class="col-md-3 sortable">

                                    <span class="line"></span>Plan Name

                                </th>

                                <th class="col-md-3 sortable">

                                    <span class="line"></span>Cost

                                </th>

                                <th class="col-md-3 sortable">

                                    <span class="line"></span>List Max Limit

                                </th>

                               
                                

                            </tr>

                        </thead>

                        <tbody>

                       

                        <?php if(!empty($results)) { ?>

                        <?php foreach($results as $val) {?>

                        <!-- row -->

                        <tr class="first">

                            <td>

                                <a class="name" href="/admin/hostplan/<?php echo $val->id?>"><?php echo $val->id?></a>

                            </td>

                            <td>

                             <a class="name" href="/admin/hostplan/<?php echo $val->id?>"><?php echo $val->host_name?></a>

                            </td>

                            <td>

                             $<a class="name" href="/admin/hostplan/<?php echo $val->id?>"><?php echo $val->amt?></a>

                            </td>

                            <td>

                             <a class="name" href="/admin/hostplan/<?php echo $val->id?>"><?php echo $val->list_max?> Guests</a>


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
	<div class="content">
	<div class="users-list" id="pad-wrapper">
             

		<div class="row header">
                <h2 class="personal-title">Profession</h2>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <a class="btn-flat success pull-right" href="/home/addprofession/">
                        <span>+</span>
                        Add Profession
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
                                    <span class="line"></span>Name
                                </th>
                                 <th class="col-md-3 sortable">
                                    <span class="line"></span>Image
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                       
                        <?php if(!empty($results)) { ?>
                        <?php foreach($results as $val) {?>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                
                                <a class="name" href="/home/profession/<?php echo $val->id?>"><?php echo $val->id?></a>
                            </td>
                            <td>
                             <a class="name" href="/home/profession/<?php echo $val->id?>"><?php echo $val->name?></a>
                             
                            </td>
                             <td>
                         		<img src='<?php echo $val->image?>' width="45" >
                             
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
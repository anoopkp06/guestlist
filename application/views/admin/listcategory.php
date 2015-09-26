	<div class="content">
	<div class="users-list" id="pad-wrapper">
             

		<div class="row header">
                <h2 class="personal-title">Category</h2>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right">
                    <a class="btn-flat success pull-right" href="/home/newcategory/">
                        <span>+</span>
                        Add Category
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
                                
                            </tr>
                        </thead>
                        <tbody>
                       
                        <?php if(!empty($results)) { ?>
                        <?php foreach($results as $val) {?>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                
                                <a class="name" href="/home/category/<?php echo $val->id?>"><?php echo $val->id?></a>
                            </td>
                            <td>
                             <a class="name" href="/home/category/<?php echo $val->id?>"><?php echo $val->cat_name?></a>
                             
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
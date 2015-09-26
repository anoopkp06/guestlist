	<div class="content">
	<div class="users-list" id="pad-wrapper">
           <div class="row header">
                <h2 class="personal-title">Pages</h2>
                <div class="col-md-10 col-sm-12 col-xs-12 pull-right"><!--
                    <a class="btn-flat success pull-right" href="/home/addpage/">
                        <span>+</span>
                        Add Page
                    </a>
                --></div>
 			</div>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-2 sortable">
                                    Page ID
                                </th>
                                <th class="col-md-2 sortable">
                                    <span class="line"></span>Title
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        <?php if(!empty($results)) { ?>
                        <?php foreach($results as $val) {?>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <a class="name" href="/home/page/<?php echo $val->id?>"><?php echo $val->id?></a>
                            </td>
                            <td>
                            <a class="name" href="/home/page/<?php echo $val->id?>"><?php echo $val->key_word?></a>
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
	<div class="content">
	<div class="users-list" id="pad-wrapper">
            <h3> Ads </h3>

            <!-- Users table -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-3">
                                    Title
                                </th>
                                <th class="col-md-3 ">
                                    <span class="line"></span>Price
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span>Location
                                </th>
                                <th class="col-md-2">
                                    <span class="line"></span> Phone
                                </th>
                                 <th class="col-md-3">
                                    <span class="line"></span> Date Added
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        <?php if(!empty($results)) { ?>
                        <?php foreach($results as $val) {?>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <img width="45" class="img-circle avatar hidden-phone" alt="Preview" src="<?php echo $val->photo1;?>">
                                <a class="name" href="/home/ads_one/<?php echo $val->id?>"><?php echo $val->title?></a>
                            </td>
                            <td>
                             $<?php echo $val->price?>
                            </td>
                            <td>
                               <?php echo $val->location?>
                            </td>
                            <td  >
                                <a href="/home/ads_one/<?php echo $val->id?>"> <?php echo $val->contact_email;?> </a>
                            </td>
                             <td  >
                                <a href="/home/ads_one/<?php echo $val->id?>"> <?php echo $val->added_date;?> </a>
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
<div id="sidebar-nav">

        <ul id="dashboard-menu">

            <li <?php if($page == 'home') {?>  class="active" <?php }?>>

                <?php if($page == 'home') {?>

                <div class="pointer">

                    <div class="arrow"></div>

                    <div class="arrow_border"></div>

                </div>

                <?php }?>

                <a href="/admin/">

                    <i class="icon-home"></i>

                    <span>Home</span>

                </a>

            </li>

            <li <?php if($page == 'orders') {?>  class="active" <?php }?>>

            	<?php if($page == 'orders') {?>

	            	 <div class="pointer">

	                    <div class="arrow"></div>

	                    <div class="arrow_border"></div>

	                </div>

            	<?php }?>

                <a href="/admin/orders/">

                    <i class="icon-th-large"></i>

                    <span>Lists</span>

                </a>

            </li>

            <li <?php if($page == 'user') {?> class="active"  <?php }?>>

                

                <?php if($page == 'user') {?>

	            	 <div class="pointer">

	                    <div class="arrow"></div>

	                    <div class="arrow_border"></div>

	                </div>

            	<?php }?>

                

                <a href="/admin/listusers/"  >

                    <i class="icon-group"></i>

                    <span>Users</span>

                   

                </a>

                

            </li>







			 <li <?php if($page == 'hostplan') {?> class="active"  <?php }?>>

                

                <?php if($page == 'hostplan') {?>

	            	 <div class="pointer">

	                    <div class="arrow"></div>

	                    <div class="arrow_border"></div>

	                </div>

            	<?php }?>

                

                <a href="/admin/listhostplan/"  >

                    <i class="icon-group"></i>

                    <span>Host Plan</span>

                   

                </a>

                

            </li>            

            

            

            

            

            <li <?php if($page == 'guest') {?> class="active"  <?php }?>>

            	 <?php if($page == 'guest') {?>

	            	 <div class="pointer">

	                    <div class="arrow"></div>

	                    <div class="arrow_border"></div>

	                </div>

            	<?php }?>

                <a href="/admin/listguests/"  >

                    <i class="icon-edit"></i>

                    <span>Guests</span>

                    

                </a>

                 

            </li>

            

            <li <?php if($page == 'gift') {?> class="active"  <?php }?>>

            	 <?php if($page == 'gift') {?>

	            	 <div class="pointer">

	                    <div class="arrow"></div>

	                    <div class="arrow_border"></div>

	                </div>

            	<?php }?>

                <a href="/admin/listgifts/"  >

                    <i class="icon-gift"></i>

                    <span>Gifts</span>

                    

                </a>

            </li>

              

        </ul>

    </div>
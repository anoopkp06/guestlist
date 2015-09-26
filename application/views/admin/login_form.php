<?php
$attributes = array('id' => 'loginform', 'name'=> 'loginform',  );
echo form_open('/admin/admin_login/', $attributes);
?>
<div class="login-wrapper">
        <a class="logocls" href="/">
         <h3>  A Guest List- Administration </h3> <br />
			 
        </a>
        <div class="box">
            <div class="content-wrap">
                <h6>Log in</h6>
                <?php
                if($login_error !='')
                {
                ?>
				<p class="error-message"><?php echo $login_error;?></p>
                <?php
                }
                ?>
                <input class="form-control required" name="email" id="txtUsername" type="text" placeholder="Admin Email">
                <input class="form-control required" name="password" id="txtPassword" type="password" placeholder="Password">
                              
                <a class="btn-glow primary login" href="javascript:document.loginform.submit();">Login</a>
            </div>
        </div>
 
    </div>
 
<?php
echo form_close();
 
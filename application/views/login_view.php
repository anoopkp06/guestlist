	
	   <section id="login_register">
        <div class="container">
            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row">
                            <div class="col-md-6">
							<div class="col-lg-12 text-center">
								<h2 class="section-heading">Login</h2>
								<h3 class="section-subheading text-muted">Existing user, login here.</h3>
							</div>
                                <form name="loginfrm" id="loginfrm" novalidate>
								<div class="form-group">
                                    <input type="email" class="form-control" placeholder="Username *" id="username" name="username" required data-validation-required-message="Username">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *"  id="password" name="password" required data-validation-required-message="Password">
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                    <div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" class="btn btn-xl">Login</button>
									<a href="/forgotpassword/"> Forgot Password?</a>
                           	 		</div>
									
                                </div>
								<input type="hidden" name="ref_link" id='ref_link' value="<?php echo $ref_link; ?>" >
                                </form>
                            </div>
                            <div class="col-md-6">
							
							<div class="col-lg-12 text-center">
								<h2 class="section-heading">Register</h2>
								<h3 class="section-subheading text-muted">Are you a new user ? Register here.</h3>
							</div>
                                <form name="registerfrm" id="registerfrm" novalidate>
								<div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="fname" name="fname" required data-validation-required-message="Name">
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Eamil *" id="username" required data-validation-required-message="Email">
                                    <p class="help-block text-danger"></p>
                                </div>								 
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" id="password" required data-validation-required-message="Password">
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                    <div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" class="btn btn-xl">Register</button>
                           	 		</div>
                                </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                           
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
	
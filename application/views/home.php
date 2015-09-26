 <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">				
				 Welcome to  			
				 
				</div>
               
			   <div class="intro-heading">agiftlist.com</div>
             <!--   <a href="#guest_list" class="page-scroll btn btn-xl">Tell Me More</a>-->
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="guest_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Welcome to agiftlist.com</h2>
                     
                </div>
            </div>
            <div class="row text-center">
                <p>
				Agiftlist has been designed to take away all the problems of organizing your events, be it a Birthday, Baby Shower, Wedding, Anniversary, Reunion, any event where you need either a Guest List or a Guest List and Wishlist together. It's very easy to use, you simply purchase your list, add your guests, make a wish list if you want, send the link provided to your guests and then they can choose a gift or whatever it is they wish to bring to your event. There are no businesses attached to the lists, so no online purchases from companies, no shipping, no handling, no Insurance etc. Your guests are free to buy in their local shopping malls etc. It;s a simple and small cost of only $2:99USD for your list, and then organise your event. No more ending up with two toasters, three sandwich makers etc. Your wish lists will ensure no guest can choose the same gift twice. So, please enjoy the simple and easiest way to organise your events whatever they may be for the low cost of only $2:99USD. Again, welcome to agiftlist.com. </p>
				
				<?php if(isset($host_plan) && !empty($host_plan)){ 
				
				$skey = $this->config->item('encryption_key');
 
				?>
				
					<?php foreach($host_plan as $plan) {  
					
						$outboundlink = urlencode( $this->encrypt->encode($plan['id'], $skey, TRUE) );
					
					?>
				
					<div class="col-md-4">
						<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x text-primary"></i>
							<i class="fa <?php echo $plan['icon'];?> fa-stack-1x fa-inverse"></i>
						</span>
						<h4 class="service-heading"><?php echo $plan['host_name'];?></h4>
						<p class="text-muted">No of Guest : <?php echo $plan['list_max'];?> </p>
						<p class="text-muted price">Cost : $<?php echo $plan['amt'];?> </p>
						<p class="text-muted"><?php echo $plan['plain_text'];?></p>
						<p>
						
						<a href="/select_plan/<?php echo $outboundlink;?>" class="page-scroll btn btn-xl">Buy Now</a>
						
						</p>
                	</div>
					<?php } ?>	
				
				<?php } ?>
				
                
                
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="occasions" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Occasions</h2>
                    <h3 class="section-subheading text-muted">Event Occasions </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                 
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                        </div>
                        </div>
                    <img src="<?php echo base_url(); ?>files/img/portfolio/e1.jpg" class="img-responsive" alt="">                    
                    <div class="portfolio-caption">
                        <h4>Reunion</h4>
                     
                    </div>
              </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                   
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                                          </div>
                        </div>
                    <img src="<?php echo base_url(); ?>files/img/portfolio/anii.jpg" class="img-responsive" alt="">                    
                    <div class="portfolio-caption">
                        <h4>Anniversary</h4>
                        
                    </div>
              </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                                             </div>
                        </div>
                    <img src="<?php echo base_url(); ?>files/img/portfolio/e3.jpg" class="img-responsive" alt="">                   
                    <div class="portfolio-caption">
                        <h4>Club Function</h4>
                        
                    </div>
              </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                   
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                                    </div>
                        </div>
                    <img src="<?php echo base_url(); ?>files/img/portfolio/e5.jpg" class="img-responsive" alt="">                    
                    <div class="portfolio-caption">
                        <h4>Birth Day</h4>
                         
                    </div>
              </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                                           </div>
                        </div>
                    <img src="<?php echo base_url(); ?>files/img/portfolio/e6.jpg" class="img-responsive" alt="">                    
                    <div class="portfolio-caption">
                        <h4>Marriage</h4>
                        
                    </div>
              </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                   
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                                             </div>
                        </div>
                    <img src="<?php echo base_url(); ?>files/img/portfolio/e7.jpg" class="img-responsive" alt="">                     
                    <div class="portfolio-caption">
                        <h4>Social Get Together</h4>
                        
                    </div>
              </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Agiftlist.com is all about making the oranizing of your event.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p>
					Agiftlist.com is all about making the oranizing of your event, as simple and easy as possible. 
					If you're have a Birthday, a Wedding, a Reunion, an Anniversary, or any event you can think of. 
					</p>
					<br />
					<p>
					We want to take the headaches of organising your events away and replace them with an easy no fuss way of doing things, 
					not only for you, but for all your guests to. So, how have we done this? After researching other sites who claim to organise 
					events and seeing all the registration process, having to buy products from these sites because they have businesses connected 
					to them, then having to get items shipped, flown, Insured and posted to you, provided the correct gift arrives, in one piece and is 
					not broken etc. 
					</p>
					<br />
					<p>
					Hey?? Who wants all that drama?? I certainly don't, and we don't think you or anyone else does either. So, we put agiftlist.com together, 
					and simplified the whole process.So,what did we do? First of all, we made it easy to get your list, sign in, pay a low cost of $2:99USD 
					for the basic list, all lists are the same, just the number of guests determines the level you pay, then you set up your list. 
					</p>
					<br />
					<p>
					Select the number of Guests, add your Guests, select a Wishlist if you want, Select how many Gifts you would like for your event, 
					then send all your Guests the special link provided and then your Guests do the rest. They have choices as to drag a Gift or choose an Icon. 
					Every now and again, you look in on the list and see where it's at. The list will tell you who's attending, what Gift they have chosen etc.
					 And the best part is, because there are no businesses tied to agiftlist.com, the Guests can go shopping in their local area, so no shipping, 
					 handling, Insurance or postage involved. Great for local businesses.  
					 </p>
					 <br />
					 <p>
					 
					 Guests can see who has chosen what, no more doubling of gifts and giving them away at Christmas, and Guests can list other Gifts that are not 
					 listed if they want, again, no two toatsers etc. As we see it, it will be the easiest and simplest way to organise and coordinate your 
					 event whatever it may be. The Guests will have the easiest time selecting a Gift or Icon or their own Gift and adding to the event. 
					 No headaches for Guests waiting for shipments, postage etc. 
					 </p>
					 <br />
					 <p>
					 Shopping in their own time and at their own convenience. What could be easier and cheaper than that?? And we do not ever hold any of 
					 your credit card details as all payments are through Paypal, your security is important to us. And your personal details are not collected by us, as you only use your email as a username to login into your List, nor are they passed on to any third parties, because we simply have no other businesses connected to this site. 
					 We only have the Giftlists for you, no shops or buying gifts from us. That equals no spam. 
					 </p>
					 <br />
					 <p>
					 Welcome to Agiftlist.com, and we hope you enjoy the easy and simple way to organise your events.
					</p>

                </div>
            </div>
        </div>
    </section>

     

   
    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">FAQ</h2>
                    <h3 class="section-subheading text-muted">Clarify your doubts</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            
                           	<ul class="faq_list">
								<li>
									<p class="faq_question" href="">What is Buy List ? <img src="/files/img/plus.png"></p>
									<div class="hidden_faq" style="display: none;">
										<p>For any function like Marriage, Birthday we will have a list of guests. Here we provide a way to manage your guest list online.  </p>
										<p>You can buy a list based on your requirement, if you plan to invite more guest then go for Gold plan.  </p>
									</div>
								</li>
								<li>
									<p class="faq_question" href="">What i need to do after buy a list <img src="/files/img/plus.png"></p>
									<div class="hidden_faq" style="display: none;">
										<p> You will have a form to fill before making the payment, we collect all the details about your guest list.</p>
										<p> Then after the payment, you can visit my account menu to see your list. </p>
										<p> Click on "View List" link to see the list. </p>
										<p> In the list View List page, you have the option to add guest by adding name and email id. </p>
										<p> Once you add a guest, we will send an invitation to that guest with a link </p>
										<p> The Guest will open the link and guest an see the list with other guests and on the right panel, we have lot of gits </p>
										<p> Guest can drag and drop any gift he / she wish to take when going to the function or event </p>
									</div>
								</li>
								<li>
									<p class="faq_question" href="">What is money pot? <img src="/files/img/plus.png"></p>
									<div class="hidden_faq" style="display: none;">
										<p> Its something like a pot, we will have a pot amount like $500 and any guest can contribute to the pot.</p>
										<p> For example, Guest A added $100 to the pot, Guest B added $50 to pot. Same way others also can add money to pot until pot amount become 0.</p>
									</div>
								</li>
							 
			 				</ul> 
                            
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




	<!-- Login Page -->
	<!--
	
	 
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
								<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
							</div>
                                <form name="loginfrm" id="loginfrm" novalidate>
								<div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *" id="name" required data-validation-required-message="Username">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Password *" id="email" required data-validation-required-message="Password">
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                    <div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" class="btn btn-xl">Login</button>
                           	 		</div>
                                </div>
                                </form>
                            </div>
                            <div class="col-md-6">
							
							<div class="col-lg-12 text-center">
								<h2 class="section-heading">Register</h2>
								<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
							</div>
                                <form name="loginfrm" id="loginfrm" novalidate>
								<div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Name">
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Eamil *" id="name" required data-validation-required-message="Email">
                                    <p class="help-block text-danger"></p>
                                </div>								 
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Password *" id="email" required data-validation-required-message="Password">
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
	
-->
	 
    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>EVENT</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>files/img/portfolio/e1.jpg" alt="">
                            <p>
					
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 
					
					</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Upcoming Event</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>files/img/portfolio/e2.jpg" alt="">
                             <p>
					
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 
					
					</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Tree House</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>files/img/portfolio/e3.jpg" alt="">
                           <p>
					
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 
					
					</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>BirthDay Celebration</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>files/img/portfolio/e5.jpg" alt="">
                            <p>
					
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 
					
					</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Marriage Function</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>files/img/portfolio/e6.jpg" alt="">
                            <p>
					
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 
					
					</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Meet Friends</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="<?php echo base_url(); ?>files/img/portfolio/e7.jpg" alt="">
                          <p>
					
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 
					
					</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
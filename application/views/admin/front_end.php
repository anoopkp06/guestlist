<?php
 	$this->load->view('site/front_header');

	 
    if (isset($main_view))
	 	$this->load->view($main_view);
    
	$this->load->view('site/front_footer');
    
?>
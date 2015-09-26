<?php
 
	if (isset($header))
		$this->load->view($header);
        
    if (isset($main_view))
	 	$this->load->view($main_view);
    
	if (isset($footer))
		$this->load->view($footer);
    
?>
<?php

 

	$this->load->view('admin/includes/header');



	$this->load->view('admin/includes/menu');

			

    if (isset($main_view))

	 	$this->load->view($main_view);

    

	$this->load->view('admin/includes/footer');

    

?>
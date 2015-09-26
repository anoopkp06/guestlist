<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 
	/** 
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	  
		$this->load->model('host_model');
		
		$this->load->library('encrypt');
		
		$data['main_view'] = 'home';
		
		$data['host_plan'] = $this->host_model->get_all_plans();
		
		
		$this->load->view('includes/template', $data);
		 
	}
	
	public function terms()
	{
	  
		$this->load->model('host_model');
		
		$data['main_view'] = 'terms';
		
		$data['host_plan'] = $this->host_model->get_all_plans();
		
		
		$this->load->view('includes/inner_template', $data);
		 
	}
}

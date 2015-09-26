<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Login extends CI_Controller {



	 

	function __construct()

	{

		parent::__construct();

		$this->load->helper('file');

		$this->load->helper('url');

		$this->load->helper('directory');

		$this->load->model('admin_model');

	}

	 

	public function index()

	{

		$this->load->helper('form');

		$login_error = '';

		if($this->input->post('email'))

		{
				print_r($_POST);
				die;
			$data['email'] = $this->input->post('email');

			$data['password'] = $this->input->post('password');

			 

			if($id = $this->admin_model->process_login($data)){

				

				$this->session->set_userdata('admin_user_id', $id);

				redirect('/home/'); die;

				

			}else {

				 

				$login_error = 'Wrong Email/Password, try again.';

				 

			}

		

		}else {

			$login_error = 'Please provide login details.';

		}

		$data['login_error']	= $login_error;

		$data['header']	= 'login_header';

		$data['footer']	= 'login_footer';

		$data['main_view']	= 'login_form';

		$this->load->view('template', $data);

	}

	public function logout()

	{

		$this->session->unset_userdata('admin_user_id');

		redirect('/login/'); die;

	 

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
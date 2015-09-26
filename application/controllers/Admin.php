<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/Mailgun/vendor/autoload.php';
use Mailgun\Mailgun;

class Admin extends CI_Controller {
 
 
	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model('login_model');
		
		$this->load->model('host_model');
		
		$this->load->library('encrypt');	
		
		$this->load->helper('file');

		$this->load->helper('url');

		$this->load->helper('directory');

		$this->load->model('admin_model');				
		 
	} 
	 public function admin_login()

	{

		$this->load->helper('form');

		$login_error = '';

		if($this->input->post('email'))

		{

			$data['email'] = $this->input->post('email');

			$data['password'] = $this->input->post('password');

			  
			if($id = $this->admin_model->process_login($data)){

				

				$this->session->set_userdata('admin_user_id', $id);

				redirect('/admin/index/'); die;

				

			}else {

				 

				$login_error = 'Wrong Email/Password, try again.';

				 

			}

		

		}else {

			$login_error = 'Please provide login details.';

		}

		$data['login_error']	= $login_error;

		$data['header']	= 'admin/login_header';

		$data['footer']	= 'admin/login_footer';

		$data['main_view']	= 'admin/login_form';

		$this->load->view('admin/template', $data);

	}

	public function logout()

	{

		$this->session->unset_userdata('admin_user_id');

		redirect('/admin/admin_login/'); die;

	 

	} 
	public function index()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		$data['users'] = $this->admin_model->getTotalUsers();

 		$data['orders'] = $this->admin_model->getTotalList();

		$data['main_view'] = 'admin/dashboard' ;

		$data['page'] = 'home' ;

		$this->load->view('admin/content', $data);

	}

	public function confirm()

	{

 		if($this->uri->segment(3)){

			$encoded_str = $this->uri->segment(3);

 		}else {

			echo 'invalid url';die;

		}

		$encoded = $encoded_str . str_repeat('=', strlen($encoded_str) % 4);

		

		$email_parsed = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(ENC_KEY), base64_decode($encoded), MCRYPT_MODE_CBC, md5(md5(ENC_KEY))), "\0");

			 

 		$data['msg'] = $this->admin_model->confirm_user($email_parsed);

 		 		 

		$data['header']	= 'login_header';

		$data['footer']	= 'login_footer';

		$data['main_view']	= 'lp';

		$this->load->view('template', $data);

	}

	

	 

	

	public function orders()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'admin/orders/';

		$config['total_rows'] = $this->admin_model->getTotalOrders();

		$config['per_page'] = ADS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_orders($config["per_page"], $page);

		

		

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'orders' ;

		$data['main_view'] = 'admin/listorders' ;

		$this->load->view('admin/content', $data);

	}

	
	
	public function listgifts()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'admin/listgifts/';

		$config['total_rows'] = $this->admin_model->getTotalGifts();

		$config['per_page'] = USERS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_gifts($config["per_page"], $page);
 
		 
		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'gift' ;

		$data['main_view'] = 'admin/listgift' ;

		$this->load->view('admin/content', $data);

	}


	public function listhostplan()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'admin/listhostplan/';

		$config['total_rows'] = $this->admin_model->getTotalHostPlan();

		$config['per_page'] = USERS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_hostplan($config["per_page"], $page);
 

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'hostplan' ;

		$data['main_view'] = 'admin/listhostplan' ;

		$this->load->view('admin/content', $data);

	}

	public function listservice_type()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'home/listservice_type/';

		$config['total_rows'] = $this->admin_model->getTotalServiceType();

		$config['per_page'] = USERS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_ServiceType($config["per_page"], $page);

		

		

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'service_type' ;

		$data['main_view'] = 'listservice_type' ;

		$this->load->view('content', $data);

	}

	

	public function list_service_providers()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'home/list_service_providers/';

		$config['total_rows'] = $this->admin_model->getTotalUsers(1);

		$config['per_page'] = USERS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_users($config["per_page"], $page, 2);

		$data['show_service_type'] = '1'; 

		$data['h1'] = 'Service Providers' ;

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'service_providers' ;

		$data['main_view'] = 'listusers' ;

		$this->load->view('content', $data);

	}

	public function listguests()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'admin/listguests/';

		$config['total_rows'] = $this->admin_model->getTotalUsers(1);

		$config['per_page'] = USERS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_guest($config["per_page"], $page, 1);

		
		
		
		 
		$data['h1'] = 'Guests' ;

		$data['show_service_type'] = '0';  

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'guest' ;

		$data['main_view'] = 'admin/listguest' ;

		$this->load->view('admin/content', $data);

	}

	public function listusers()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'admin/listusers/';

		$config['total_rows'] = $this->admin_model->getTotalUsers(1);

		$config['per_page'] = USERS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_users($config["per_page"], $page, 1);

		

		$data['h1'] = 'Users' ;

		$data['show_service_type'] = '0';  

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'user' ;

		$data['main_view'] = 'admin/listusers' ;

		$this->load->view('admin/content', $data);

	}

	public function listpages()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'home/listpages/';

		$config['total_rows'] = $this->admin_model->getTotalPages();

		$config['per_page'] = USERS_PER_PAGE;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination pull-right">';

		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['prev_tag_open'] = '<li>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$choice = $config["total_rows"] / $config["per_page"];

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["results"] = $this->admin_model->fetch_pages($config["per_page"], $page);

		

		

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'page' ;

		$data['main_view'] = 'listpages' ;

		$this->load->view('content', $data);

	}

	public function page()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 		

 		

 		$max_file_size = 1024*200;

		$valid_exts = array('pdf', 'doc', 'docx', 'txt');

			

			

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		//$res['content'] = $this->input->post('content');

 	 		$res['key_word'] = $this->input->post('key_word');



 	 		if (isset($_FILES['content']) && !empty($_FILES['content']['name']))

			{

			  

				  if( $_FILES['content']['size'] < $max_file_size )

				  {

					    // get file extension

					    $ext = strtolower(pathinfo($_FILES['content']['name'], PATHINFO_EXTENSION));

					    if (in_array($ext, $valid_exts))

					    {

					    	$config['upload_path'] = 'uploads/';

							$config['allowed_types'] = 'pdf|doc|txt|docx';

							$config['max_size']	= '500';

					 				

							$this->load->library('upload', $config);

					

							if (!$this->upload->do_upload('content'))

							{								 

								$msg = 'Cannot upload file';					 

							}

							else

							{

								$data = array('upload_data' => $this->upload->data());	

											

								$res['content'] = base_url().'uploads/'.$data['upload_data']['file_name'];

								

								$out = $this->admin_model->updatePage($id, $res);

					 	 		if($out){

					 	 			$msg = 'Page details updated successfully.';

					 	 		}else{

					 	 			$msg = 'Opps, Cannot update page details.';

					 	 		}

				 	 		 

								

							} 

							 

					    } else {

					      	$msg = 'Unsupported file';

					    }

				  } else{

				    	$msg = 'Please upload small file';

				  }

			  

			  

			} 

 	 		 

 	 		

 	 	}



		if($this->input->post('delete'))

 	 	{

 	 		$data['id'] =  $id;

 	 		$this->admin_model->delete_page($data);

 	 		redirect('/home/listpages');die;

 	 	}

  		 

		$data["results"] = $this->admin_model->get_page_by_id($id);

 		$data['msg'] = $msg;

 		$data['page'] = 'page' ;

		$data['main_view'] = 'page' ;

		$this->load->view('content', $data);

	}

	

	

	public function sys_config()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 		

 		$results = $this->admin_model->get_sys_sonfig();

 	 	

 		if($this->input->post('submit'))

 	 	{

 	 		

 			foreach($results as $item)

 			{	 		 

	 	 		$res = array();

 				$res['value'] = $this->input->post('val_'.$item['id']);	 	 		 

	 	 		

 			 

 			 	$out = $this->admin_model->update_sys_config($res, $item['id']);

 			} 

 	 		 

 	 		$msg = 'Configuration details updated successfully.';

 	 		 

 	 	}

 

		$data["results"] = $this->admin_model->get_sys_sonfig();

 		$data['msg'] = $msg;

 		$data['page'] = 'sys_config' ;

		$data['main_view'] = 'sys_config' ;

		$this->load->view('content', $data);

	}

	

	public function order_one()

	{

 		if(!$this->session->userdata('admin_user_id'))
 		{
 			redirect('/admin/admin_login/');
 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$res['status'] = $this->input->post('status');

 	 		$res['amt'] = $this->input->post('amt');

 	 		$res['dt_created'] = $this->input->post('dt_created');

 	 		 
 	 		$res['id']	= $id;
 
 	 		$out = $this->admin_model->update_order($res);

 	 		if($out){

 	 			$msg = 'Order details updated successfully.';

 	 		}

 	 	}



		if($this->input->post('delete'))

 	 	{

 	 		$data['id'] =  $id;
 

 	 		$this->admin_model->delete_order($data);

 	 		redirect('/admin/orders/');die;

 	 	}

		 

		$data["results"] = $this->admin_model->get_order_by_id($id);

 		$data['msg'] = $msg;

 		$data['page'] = 'orders' ;

		$data['main_view'] = 'admin/order_one' ;

		$this->load->view('admin/content', $data);

	}
	function guest()
	{
		if(!$this->session->userdata('admin_user_id'))
 		{
 			redirect('/admin/admin_login/');
 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{ 

			$res['email'] = $this->input->post('email');

			$res['name'] = $this->input->post('name');
			
			$res['list_id'] = $this->input->post('list_id');
 
 	 		 
 	 		if(!empty($res['name']) && !empty($res['email'])  && !empty($res['list_id']) )

 	 		{


				if($this->host_model->check_guest($res['email'], $res['list_id']))
				{
					$editdata['name'] = $res['name']; 
					
					
					if($this->admin_model->update_guest_details($editdata, $id))
					{			 			
						
						$msg = 'Guest details updated successfully.';
						
					}else{
						 
						$msg = 'Sorry, cannot update details';
					}
				
				}else{
						 
							$this->host_model->add_guest_details($res);
							
							$list_details = $this->host_model->get_list_details($res['list_id']);
							
							$email_hash = $this->encrypt->encode($res['email'], 'guest');
							$list_id_hash = $this->encrypt->encode($res['list_id'], 'guest');
							 
							$mg = new Mailgun(EMAIL_KEY);
							
							$domain = EMAIL_DOMAIN;
							
							$link = base_url()."userlistpage/".$list_id_hash."/".$email_hash."/";
							$text = "Hello ".$res['name'].", <br> <br> ";
							$text .= "<br> You are invited for the ".$list_details['list_name']. " from AGuestList.com <br>" ;
							$text .= "<br>  Please click the below link to join in list and send gifts <br> <br>";
							
							$text .= " <a style='background-color:#44c767;-moz-border-radius:28px;-webkit-border-radius:28px;
											border-radius:28px;
											border:1px solid #18ab29;
											display:inline-block;
											cursor:pointer;
											color:#ffffff;
											font-family:Arial;
											font-size:17px;
											padding:16px 31px;
											text-decoration:none;
											text-shadow:0px 1px 0px #2f6627;' href='".$link."'> Click to View List </a>";
												
							
							# Now, compose and send your message.
							$mg->sendMessage($domain, array('from'    => 'AguestList@gmail.com', 
															'to'      => $res['email'], 
															'subject' => 'You are invited for the '.$list_details['list_name'], 
															'html'    => $text));
															
															
					$msg = 'Guest details adeed successfully to new list and send email to guest.';										
				
				} 

 	 		}else{

 	 		

 	 			$msg = 'Opps, Please fill all the details.';

 	 		}	

 	 	}
 
 		if($this->input->post('delete'))
 	 	{

 	 		$data['id'] =  $id;	 		 

 	 		$this->admin_model->delete_guest($data);
 			redirect('/admin/listguests/');

 	 		   

 	 	}
		
 		
		$data['list'] = $this->admin_model->get_all_list();
		
 		$data['msg'] = $msg;

  	 	$data['page'] = 'guest' ;	

 		$data["results"] = $this->admin_model->get_guest_by_id($id);	

		$data['main_view'] = 'admin/edit_guest' ;

		$this->load->view('admin/content', $data);
	}
	function add_guest()
	{
		if(!$this->session->userdata('admin_user_id'))
 		{
 			redirect('/admin/admin_login/');
 		}

 		$msg = '';

 		$type = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		 

			$res['email'] = $this->input->post('email');

			$res['name'] = $this->input->post('name');
			
			$res['list_id'] = $this->input->post('list_id');
 
 	 		 
 	 		if(!empty($res['name']) && !empty($res['email'])  && !empty($res['list_id']) )

 	 		{


				if(!$this->host_model->check_guest($res['email'], $res['list_id']))
				{
					if($this->host_model->add_guest_details($res))
					{
							$list_details = $this->host_model->get_list_details($res['list_id']);
							
							$email_hash = $this->encrypt->encode($res['email'], 'guest');
							$list_id_hash = $this->encrypt->encode($res['list_id'], 'guest');
							 
							$mg = new Mailgun(EMAIL_KEY);
							
							$domain = EMAIL_DOMAIN;
							
							$link = base_url()."userlistpage/".$list_id_hash."/".$email_hash."/";
							$text = "Hello ".$res['name'].", <br> <br> ";
							$text .= "<br> You are invited for the ".$list_details['list_name']. " from AGuestList.com <br>" ;
							$text .= "<br>  Please click the below link to join in list and send gifts <br> <br>";
							
							$text .= " <a style='background-color:#44c767;-moz-border-radius:28px;-webkit-border-radius:28px;
											border-radius:28px;
											border:1px solid #18ab29;
											display:inline-block;
											cursor:pointer;
											color:#ffffff;
											font-family:Arial;
											font-size:17px;
											padding:16px 31px;
											text-decoration:none;
											text-shadow:0px 1px 0px #2f6627;' href='".$link."'> Click to View List </a>";
												
							
							# Now, compose and send your message.
							$mg->sendMessage($domain, array('from'    => 'AguestList@gmail.com', 
															'to'      => $res['email'], 
															'subject' => 'You are invited for the '.$list_details['list_name'], 
															'html'    => $text));
											
											
											
						
						$msg = 'Guest details added successfully, and send email to guest.';
						
					}else{
						 
						$msg = 'Sorry, cannot add guest';
					}
				
				}else {
						 
						$msg = 'Email already exists';
				
				} 

 	 		}else{

 	 		

 	 			$msg = 'Opps, Please fill all the details.';

 	 		}	

 	 	}

 
		$data['list'] = $this->admin_model->get_all_list();
		
 		$data['msg'] = $msg;

  	 	$data['page'] = 'guest' ;	

 			

		$data['main_view'] = 'admin/add_guest' ;

		$this->load->view('admin/content', $data);
	}
	function add_account()

	{

		if(!$this->session->userdata('admin_user_id'))
 		{
 			redirect('/admin/admin_login/');
 		}

 		$msg = '';

 		$type = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$pass = $this->input->post('password');	 		 

 	 		$res['password'] = base64_encode($this->input->post('password'));

 	 		 

			$res['email'] = $this->input->post('email');

			$res['uname'] = $this->input->post('uname');
			
			$res['active'] = $this->input->post('active');

			
			 
 	 		$res['dt_created'] = date('Y-m-d H:i:s');

 	 		 
 	 		if(!empty($res['uname']) && !empty($res['email']) )

 	 		{

 	 			$out = $this->admin_model->addUser($res);

 	 		

	 	 		if($out){

	 	 			$msg = 'User profile details added successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot add profile details.';

	 	 		}

	 	 		

 	 		}else{

 	 		

 	 			$msg = 'Opps, Please fill name and password.';

 	 		}	

 	 	}

 

 		$data['msg'] = $msg;

  	 	$data['page'] = 'user' ;	

 			

		$data['main_view'] = 'admin/add_profile' ;

		$this->load->view('admin/content', $data);

		

	

	}

	public function user()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$pass = $this->input->post('password');

 	 		if(!empty($pass))
 	 			$res['password'] = base64_encode($this->input->post('password'));

 	 		$res['uname'] = $this->input->post('uname');
			  
 	 		$res['dt_created'] = $this->input->post('dt_created');

 	 		$res['active'] = $this->input->post('active');
 

 	 		$out = $this->admin_model->updateUser($id, $res);

 	 		

 	 		if($out){

 	 			$msg = 'User profile details updated successfully.';

 	 		}else{

 	 			$msg = 'Opps, Cannot update profile details.';

 	 		}

 	 	}



		if($this->input->post('delete'))

 	 	{

 	 		$data['id'] =  $id;

 	 		 

 	 		$this->admin_model->delete_user($data);
 			redirect('/admin/listusers/');

 	 		   

 	 	}

 

     

		$data["results"] = $this->admin_model->get_user_by_id($id);

		 

		 

 		$data['msg'] = $msg;

 		
  		$data['page'] = 'user' ;	

 			

		$data['main_view'] = 'admin/profile' ;

		$this->load->view('admin/content', $data);

	}

	public function hostplan()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		 

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))
 	 	{
 
 	 		$res['host_name'] = $this->input->post('host_name');

 	 		$res['list_max'] = $this->input->post('list_max');

 	 		$res['amt'] = $this->input->post('amt'); 

 	 		$res['icon'] = $this->input->post('icon');
	 

 	 		if(!empty($res['amt']) && !empty($res['host_name']) && !empty($res['list_max']))
 	  		{	
 
	 	 		$out = $this->admin_model->updateHostPlan($id, $res);

	 	 		if($out){

	 	 			$msg = 'Host details updated successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot update host plan details.';

	 	 		}

 	  		}else{

 	  			$msg = 'Opps, please fill all the details';

 	  		}	

 	 	}



		if($this->input->post('delete'))

 	 	{

 	 		$data['id'] =  $id;

 	 		$this->admin_model->delete_host_pan($data);

 	 		redirect('/admin/listhostplan/');die;

 	 	}

  		 

		$data["results"] = $this->admin_model->get_host_by_id($id);

 		$data['msg'] = $msg;

 		$data['page'] = 'hostplan' ;

		$data['main_view'] = 'admin/hostplan' ;

		$this->load->view('admin/content', $data);

	}

	public function service_type()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$type_name =  $this->input->post('name');

 	 		

 	 		if(!empty($type_name))

 	 		{

	 	 		$res['name'] = $type_name;

	 	 		$out = $this->admin_model->updateServiceType($id, $res);

	 	 		if($out){

	 	 			$msg = 'Category details updated successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot update category details.';

	 	 		}

 	 		}else{

 	 			$msg = 'Opps, please enter any value.';

 	 			

 	 		}	

 	 	}



		if($this->input->post('delete'))

 	 	{

 	 		$data['id'] =  $id;

 	 		$this->admin_model->delete_service_type($data);

 	 		redirect('/home/listservice_type/');die;

 	 	}

  		 

		$data["results"] = $this->admin_model->get_service_type_by_id($id);

 		$data['msg'] = $msg;

 		$data['page'] = 'service_type' ;

		$data['main_view'] = 'service_type' ;

		$this->load->view('content', $data);

	}

	public function newservice_type()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 	 	if($this->input->post('submit'))

 	 	{

 	 		$res['name'] = $this->input->post('name');

 	 		 

 	 		

 	 		if(!empty($res['name']))

 	 		{ 

	 	 		$out = $this->admin_model->insertService_type($res);

	 	 		if($out){

	 	 			$msg = 'Service Type details added successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot add Service Type details.';

	 	 		}

 	 		}else{

 	 			$msg = 'Opps, please enter any text.';

 	 		}	

 	 	}

 		$data['msg'] = $msg;

 		$data['page'] = 'service_type' ;

		$data['main_view'] = 'newservice_type' ;

		$this->load->view('content', $data);

	}

	public function addpage()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 	 	if($this->input->post('submit'))

 	 	{

 	 		$res['key_word'] = $this->input->post('key_word');

 	 		//$res['content'] = $this->input->post('content');

 	 		

 	 		

 	 		

 	 		$max_file_size = 1024*200;

			$valid_exts = array('pdf', 'doc', 'docx', 'txt');

 

			if (isset($_FILES['content']) && !empty($_FILES['content']['name']))

			{

			  

				  if( $_FILES['content']['size'] < $max_file_size )

				  {

					    // get file extension

					    $ext = strtolower(pathinfo($_FILES['content']['name'], PATHINFO_EXTENSION));

					    if (in_array($ext, $valid_exts))

					    {

					    	$config['upload_path'] = 'uploads/';

							$config['allowed_types'] = 'pdf|doc|txt|docx';

							$config['max_size']	= '500';

					 				

							$this->load->library('upload', $config);

					

							if (!$this->upload->do_upload())

							{

								$error = array('error' => $this->upload->display_errors());

					 

							}

							else

							{

								$data = array('upload_data' => $this->upload->data());				

								 

							} 

							print_r($data);

							die;

					    } else {

					      	$msg = 'Unsupported file';

					    }

				  } else{

				    	$msg = 'Please upload small file';

				  }

			  

			  

			} 

			

			

 	 		

 	 		$out = $this->admin_model->insertPage($res);

 	 		if($out){

 	 			$msg = 'Page details added successfully.';

 	 		}else{

 	 			$msg = 'Opps, Cannot add page details.';

 	 		}

 	 	}

 		$data['msg'] = $msg;

 		$data['page'] = 'page' ;

		$data['main_view'] = 'addpage' ;

		$this->load->view('content', $data);

	}


	public function add_gift()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		$msg = '';

 		 

 	 	if($this->input->post('submit'))

 	 	{
			 
 	 		$res['gname'] = $this->input->post('gname');

 	 		$res['gift_type'] = $this->input->post('gift_type');

 	 		$res['icon'] = $this->input->post('icon');
 

 	  		if(!empty($res['gname']) && !empty($res['gift_type']))

 	  		{

	 	 		$out = $this->admin_model->insertGifts($res);

	 	 		if($out){

	 	 			$msg = 'Gift details added successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot add Gift details.';

	 	 		}

 	  		}else{

 	  			$msg = 'Opps, please fill all the details';

 	  		}	

 	 	}

 	  
 		$data['msg'] = $msg;

 		$data['page'] = 'gift' ;

		$data['main_view'] = 'admin/add_gift' ;

		$this->load->view('admin/content', $data);

	}


	public function addhostplan()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');

 		}

 		$msg = '';

 		 

 	 	if($this->input->post('submit'))

 	 	{
			 
 	 		$res['host_name'] = $this->input->post('host_name');

 	 		$res['list_max'] = $this->input->post('list_max');

 	 		$res['amt'] = $this->input->post('amt');

 	 		$res['icon'] = $this->input->post('icon');
 

 	  		if(!empty($res['host_name']))

 	  		{

	 	 		$out = $this->admin_model->insertHost($res);

	 	 		if($out){

	 	 			$msg = 'Host details added successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot add host details.';

	 	 		}

 	  		}else{

 	  			$msg = 'Opps, please fill all the details';

 	  		}	

 	 	}

 	  
 		$data['msg'] = $msg;

 		$data['page'] = 'hostplan' ;

		$data['main_view'] = 'admin/addhostplan' ;

		$this->load->view('admin/content', $data);

	}
	public function gift()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/admin/admin_login/');
 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$res['gname'] = $this->input->post('gname');

 	 		$res['gift_type'] = $this->input->post('gift_type');

 	 		$res['icon'] = $this->input->post('icon');
  

 	 		if(!empty($res['gname']) && !empty($res['gift_type']))

 	 		{ 
	 	 		 
	 	 		$out = $this->admin_model->update_gift($id, $res);

	 	 		if($out){

	 	 			$msg = 'Gift details updated successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot update gift details.';

	 	 		}

 	 		}else{

 	 			$msg = 'Opps, please enter any value.';

 	 			

 	 		}	

 	 	}



		if($this->input->post('delete'))

 	 	{

 	 		$data['id'] =  $id;

 	 		$this->admin_model->delete_gifts($data);

 	 		redirect('/admin/listgifts/');die;

 	 	}

  		 

		$data["results"] = $this->admin_model->get_gift_by_id($id);

 		$data['msg'] = $msg;

 		$data['page'] = 'gift' ;

		$data['main_view'] = 'admin/gift' ;

		$this->load->view('admin/content', $data);

	}
	
}	
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
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

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$data['users'] = $this->admin_model->getTotalUsers();

 		$data['orders'] = $this->admin_model->getTotalOrders();

		$data['main_view'] = 'dashboard' ;

		$data['page'] = 'home' ;

		$this->load->view('content', $data);

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

 			redirect('/login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'home/orders/';

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

		$data['main_view'] = 'listorders' ;

		$this->load->view('content', $data);

	}

	public function listpromocode()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'home/listpromocode/';

		$config['total_rows'] = $this->admin_model->getTotalPromoCode();

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

		$data["results"] = $this->admin_model->fetch_promocode($config["per_page"], $page);

		

		

		$data['links'] = $this->pagination->create_links();

  		$data['page'] = 'promocode' ;

		$data['main_view'] = 'listpromocode' ;

		$this->load->view('content', $data);

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

	

	public function listusers()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		

 		$this->load->library('pagination');



		$config['base_url'] = base_url().'home/listusers/';

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

		$data['main_view'] = 'listusers' ;

		$this->load->view('content', $data);

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

 			redirect('/login/');

 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$res['status'] = $this->input->post('status');

 	 		$res['cost'] = $this->input->post('cost');

 	 		$res['status_remarks'] = $this->input->post('status_remarks');

 	 		$res['from_date'] = $this->input->post('from_date');

 	 		$res['to_date'] = $this->input->post('to_date');

 	 		 

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

 	 		redirect('/home/orders/');die;

 	 	}

		 

		$data["results"] = $this->admin_model->get_order_by_id($id);

 		$data['msg'] = $msg;

 		$data['page'] = 'orders' ;

		$data['main_view'] = 'order_one' ;

		$this->load->view('content', $data);

	}

	function add_account()

	{

		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 		$type = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$pass = $this->input->post('password');

 	 		 

 	 		$res['password'] = base64_encode($this->input->post('password'));

 	 			

 	 			

 	 			

 	 		$max_file_size = 1024*200;

			$valid_exts = array('jpeg', 'jpg', 'png', 'gif');

 

			if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name']))

			{

			  

			  if( $_FILES['profile_image']['size'] < $max_file_size )

			  {

			    // get file extension

			    $ext = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));

			    if (in_array($ext, $valid_exts))

			    {

			        	$res['profile_image'] = $this->admin_model->resize(300, 300, 'profile_image', 'ads');

				

			    } else {

			      	$msg = 'Unsupported file photo1';

			    }

			  } else{

			    	$msg = 'Please upload image smaller than 200KB photo1';

			  }

			} 

			$res['email'] = $this->input->post('email');

			$res['name'] = $this->input->post('name');

			$res['phone'] = $this->input->post('phone');

 	 		$res['address1'] = $this->input->post('address1');

 	 		$res['address2'] = $this->input->post('address2');

 	 		$res['zipcode'] = $this->input->post('zipcode');

 	 		$res['city'] = $this->input->post('city');

 	 		$res['active'] = $this->input->post('active');

 	 		$res['created_date'] = $this->input->post('created_date');

 	 		

 	 		if($type == 'service_provider')

 	 			$res['service_type_id'] = $this->input->post('service_type_id');

 	 		  	 		

 	 		$res['promotion_code'] = $this->input->post('promotion_code');

 	 		$res['otp'] = $this->input->post('otp');

 	 		$res['longitude'] = $this->input->post('longitude');

 	 		$res['latitude'] = $this->input->post('latitude');

 	 		$res['state'] = $this->input->post('state');

 	 		$res['country'] = $this->input->post('country');

 	 		$res['credits'] = $this->input->post('credits');

 	 		$res['online'] = $this->input->post('online');

 	 		$res['user_type'] = $this->input->post('user_type');

 	 		$res['created_date'] = date('Y-m-d H:i:s');

 	 		 

 	 		if(!empty($res['name']) && !empty($res['email']) )

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



		 

    

		//$config['total_rows'] = $this->admin_model->getTotalUsers();

		$data["service_types"] = $this->admin_model->get_all_service_types();

		 

		 

 		$data['msg'] = $msg;

 		

 		

 		if($type == 'service_provider')

 			$data['page'] = 'service_provider' ;

 		else 	

 			$data['page'] = 'user' ;	

 			

		$data['main_view'] = 'add_profile' ;

		$this->load->view('content', $data);

		

	

	}

	public function user()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$pass = $this->input->post('password');

 	 		if(!empty($pass))

 	 			$res['password'] = base64_encode($this->input->post('password'));

 	 			

 	 			

 	 			

 	 		$max_file_size = 1024*200;

			$valid_exts = array('jpeg', 'jpg', 'png', 'gif');

 

			if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image']['name']))

			{

			  

			  if( $_FILES['profile_image']['size'] < $max_file_size )

			  {

			    // get file extension

			    $ext = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));

			    if (in_array($ext, $valid_exts))

			    {

			        	$res['profile_image'] = $this->admin_model->resize(300, 300, 'profile_image', 'ads');

				

			    } else {

			      	$msg = 'Unsupported file photo1';

			    }

			  } else{

			    	$msg = 'Please upload image smaller than 200KB photo1';

			  }

			} 

			$res['name'] = $this->input->post('name');

			$res['phone'] = $this->input->post('phone');

 	 		$res['address1'] = $this->input->post('address1');

 	 		$res['address2'] = $this->input->post('address2');

 	 		$res['zipcode'] = $this->input->post('zipcode');

 	 		$res['city'] = $this->input->post('city');

 	 		$res['active'] = $this->input->post('active');

 	 		$res['created_date'] = $this->input->post('created_date');

 	 		

 	 		if($this->input->post('user_type') == 2)

 	 			$res['service_type_id'] = $this->input->post('service_type_id');

 	 		  	 		

 	 		$res['promotion_code'] = $this->input->post('promotion_code');

 	 		$res['otp'] = $this->input->post('otp');

 	 		$res['longitude'] = $this->input->post('longitude');

 	 		$res['latitude'] = $this->input->post('latitude');

 	 		$res['state'] = $this->input->post('state');

 	 		$res['country'] = $this->input->post('country');

 	 		$res['credits'] = $this->input->post('credits');

 	 		$res['online'] = $this->input->post('online');

 	 		$res['updated_date'] = date('Y-m-d H:i:s');

 	 		 

 	 		

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

 	 		

 	 		if($this->input->post('user_type') == 2) 	 		

 	 			redirect('/home/list_service_providers/');

 	 		else

 	 		   redirect('/home/listusers/');

 	 		 die;  

 	 	}

 

    

		//$config['total_rows'] = $this->admin_model->getTotalUsers();

		$data["service_types"] = $this->admin_model->get_all_service_types();

		

		 

		$data["results"] = $this->admin_model->get_user_by_id($id);

		

		$data["transasction"] = $this->admin_model->get_all_transactions($id);

		

		$data["review"] = $this->admin_model->get_all_review($id);

		

		

		 

 		$data['msg'] = $msg;

 		

 		

 		if($data["results"]['user_type'] == 2)

 			$data['page'] = 'service_providers' ;

 		else 	

 			$data['page'] = 'user' ;	

 			

		$data['main_view'] = 'profile' ;

		$this->load->view('content', $data);

	}

	public function promocode()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		 

 		$msg = '';

 		$id = $this->uri->segment(3);

 	 	if($this->input->post('submit'))

 	 	{

 	 		$res['credits'] = $this->input->post('credits');

 	 		$res['code'] = $this->input->post('code');

 	 		$res['status'] = $this->input->post('status');

 	  	

 	 		$res['type'] = $this->input->post('type');

 	 		$res['pay_type'] = $this->input->post('pay_type');

 	 		if($res['pay_type'] == 'per')

 	 		{

 	 			$res['pay_cap'] = $this->input->post('pay_type'); 

 	 		}	



 	 		

 	 		if(!empty($res['code']))

 	  		{	

 	 		 

	 	 		$out = $this->admin_model->updatePromoCode($id, $res);

	 	 		if($out){

	 	 			$msg = 'Promocode details updated successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot update Profession details.';

	 	 		}

 	  		}else{

 	  			$msg = 'Opps, please fill all the details';

 	  		}	

 	 	}



		if($this->input->post('delete'))

 	 	{

 	 		$data['id'] =  $id;

 	 		$this->admin_model->delete_promoCode($data);

 	 		redirect('/home/listpromocode/');die;

 	 	}

  		 

		$data["results"] = $this->admin_model->get_promocode_by_id($id);

 		$data['msg'] = $msg;

 		$data['page'] = 'promocode' ;

		$data['main_view'] = 'promocode' ;

		$this->load->view('content', $data);

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

	public function addpromocode()

	{

 		if(!$this->session->userdata('admin_user_id'))

 		{

 			redirect('/login/');

 		}

 		$msg = '';

 		 

 	 	if($this->input->post('submit'))

 	 	{

 	 		$res['credits'] = $this->input->post('credits');

 	 		$res['code'] = $this->input->post('code');

 	 		$res['type'] = $this->input->post('type');

 	 		$res['pay_type'] = $this->input->post('pay_type');

 	 		if($res['pay_type'] == 'per')

 	 		{

 	 			$res['pay_cap'] = $this->input->post('pay_type'); 

 	 		}	

 	 		

 	 		

 	 		$res['status'] = $this->input->post('status');

 	  		if(!empty($res['code']))

 	  		{

	 	 		$out = $this->admin_model->insertPromoCode($res);

	 	 		if($out){

	 	 			$msg = 'PromoCode details added successfully.';

	 	 		}else{

	 	 			$msg = 'Opps, Cannot add promocode details.';

	 	 		}

 	  		}else{

 	  			$msg = 'Opps, please fill all the details';

 	  		}	

 	 	}

 	 	 

 	 	$data['code'] = $this->admin_model->getUniqueCouponCode(6);

 		$data['msg'] = $msg;

 		$data['page'] = 'promocode' ;

		$data['main_view'] = 'addpromocode' ;

		$this->load->view('content', $data);

	}

	

	

	

	

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
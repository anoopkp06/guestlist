<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/Mailgun/vendor/autoload.php';
use Mailgun\Mailgun;
class Account extends CI_Controller {
 
 
	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model('login_model');
		
		$this->load->model('host_model');
		
		$this->load->library('encrypt');					
		 
	} 
	public function index()
	{	  
		
		$user_data = $this->login_model->check_login();
		//echo 's'; die;
	 	if ( ! is_array($user_data) || $user_data === false  )
		{
			$this->session->sess_destroy();
			$redirect = '/login/';
			redirect($redirect);
		}
		$this->load->library('encrypt');
		
		$data['user_data'] = $user_data;
		
		
		$data['js_view'] = 'js/my_account';
		
		$data['main_view'] = 'my_page';
		
		$data['host_plans'] = $this->host_model->get_my_hosts($this->session->userdata('user_id'));
				
		$this->load->view('includes/inner_template', $data);
		 
	}
	function update_user()
	{
		$response['status'] = 0;
		$response['msg'] = 'Infomration missing';
				
		if($this->input->post('user_id'))
		{
			$user_id			=	$this->input->post('user_id');	 
			$this->username		=	$this->input->post('username') ;
			$this->password		=	$this->input->post('password') ;			
		 
			$dataBase['uname']					=	$this->username;
			$dataBase['password']				=	base64_encode($this->password);	
			 
			
			if($this->host_model->update_user_details($dataBase, $user_id))
			{
				$response['status'] = 1;
				$response['msg'] = 'Updated details successfully.';
				
			}else{
				$response['status'] = 0;
				$response['msg'] = 'Sorry, cannot update.';
			}
		} 	
		echo json_encode($response); die;
	
	}
	function edit_list($id)
	{
		 
		
		$user_data = $this->login_model->check_login();
		//echo 's'; die;
	 	if ( ! is_array($user_data) || $user_data === false  )
		{
			$this->session->sess_destroy();
			$redirect = '/login/';
			redirect($redirect);
		}
		
		$data['user_data'] = $user_data;
		
		$this->load->model('host_model');
		
		$data['main_view'] = 'edit_list';
		
		$list_id = $this->encrypt->decode($id, 'guest');
		
		if($res = $this->host_model->validate_list_ld($list_id, $this->session->userdata('user_id')))
		{
			$data['list_details'] = $res;
		}
		else{
			$data['error'] = "Sorry, Invalis page.";
		
		}	
		$data['js_view'] = 'js/edit_list';
					
		$this->load->view('includes/inner_template', $data);
		
	
	}
	function delete_gift()
	{
		$response['status'] = 0;
		$response['msg'] = 'Infomration missing';
				
		if($this->input->post('list_id'))
		{
			$this->gift_id				=	$this->input->post('gift_id');					 
			$this->gift_type			=	$this->input->post('gift_type') ;
			$this->gift_val				=	$this->input->post('gift_val') ; 
			$this->drop_email			=	$this->input->post('drop_email') ;
			$this->list_id		    	=   $this->input->post('list_id') ;
			
			$dataBase['gift_id']		=	$this->gift_id;
			$dataBase['gift_type']		=	$this->gift_type;	
			$dataBase['gift_val']		=	$this->gift_val;	
			$dataBase['email']			=	$this->drop_email;	
			$dataBase['list_id']		=	$this->list_id;
				
			if($this->host_model->delete_gift_details($dataBase))
			{
				$response['status'] = 1;
				$response['msg'] = 'gift deleted';
				
			}else{
				$response['status'] = 0;
				$response['msg'] = 'Sorry, cannot delete.';
			}
			
			 
		 
			
		} 	
		echo json_encode($response); die;
	
	}
	function set_gift()
	{
		$response['status'] = 0;
		$response['msg'] = 'Infomration missing';
				
		if($this->input->post('list_id'))
		{
			$this->gift_id				=	$this->input->post('gift_id');					 
			$this->gift_type			=	$this->input->post('gift_type') ;
			$this->gift_val				=	$this->input->post('gift_val') ; 
			$this->drop_email			=	$this->input->post('drop_email') ;
			$this->list_id		    	=   $this->input->post('list_id') ;
			
			$dataBase['gift_id']		=	$this->gift_id;
			$dataBase['gift_type']		=	$this->gift_type;	
			$dataBase['gift_val']		=	$this->gift_val;	
			$dataBase['email']			=	$this->drop_email;	
			$dataBase['list_id']		=	$this->list_id;
				
		 	if($this->host_model->check_guest($this->drop_email, $this->list_id))
			{
				if($this->host_model->add_gift_details($dataBase))
				{
					$response['status'] = 1;
					$response['msg'] = 'Amount added as gift.';
					
				}else{
					$response['status'] = 0;
					$response['msg'] = 'Sorry, cannot add.';
				}
			
			}else {
					$response['status'] = 0;
					$response['msg'] = 'Email not exisys in the list';
			
			}
		 
			
		} 	
		echo json_encode($response); die;
	
	}
	function made_attend()
	{
		$response['status'] = 0;
		$response['msg'] = 'Infomration missing';
				
		if($this->input->post('list_id'))
		{
			 			 
			$this->email				=	$this->input->post('email') ;
			$this->list_id				=	$this->input->post('list_id') ;
			$this->attend				=	$this->input->post('attend') ; 
			 
		 	 
				if($this->host_model->made_attend($this->email, $this->list_id, $this->attend))
				{						 
					$response['status'] = 1;
					$response['msg'] = 'Added Guest successfully.';
					
				}else{
					$response['status'] = 0;
					$response['msg'] = 'Sorry, cannot add.';
				}
			 
			
		} 	
		echo json_encode($response); die;
		
	
	}
	
	function add_guest()
	{
		$response['status'] = 0;
		$response['msg'] = 'Infomration missing';
				
		if($this->input->post('list_id'))
		{
			$this->name					=	$this->input->post('uname');					 
			$this->email				=	$this->input->post('email') ;
			$this->list_id				=	$this->input->post('list_id') ; 
			$dataBase['name']			=	$this->name;
			$dataBase['list_id']		=	$this->list_id;	
			$dataBase['email']			=	$this->email;	
		 	if(!$this->host_model->check_guest($this->email, $this->list_id))
			{
				if($this->host_model->add_guest_details($dataBase))
				{
						$list_details = $this->host_model->get_list_details($this->list_id);
						
						$email_hash = $this->encrypt->encode($this->email, 'guest');
						$list_id_hash = $this->encrypt->encode($this->list_id, 'guest');
						 
						$mg = new Mailgun(EMAIL_KEY);
						
						$domain = EMAIL_DOMAIN;
						
						$link = base_url()."userlistpage/".$list_id_hash."/".$email_hash."/";
						$text = "Hello ".$this->name.", <br> <br> ";
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
											
						$text .= " <br><br><br> Regards, <br>";
						$text .= " AguestList Team. ";
						
						# Now, compose and send your message.
						$mg->sendMessage($domain, array('from'    => 'AguestList@gmail.com', 
														'to'      => $this->email, 
														'subject' => 'You are invited for the '.$list_details['list_name'], 
														'html'    => $text));
										
										
							 			
					
					$response['status'] = 1;
					$response['msg'] = 'Added Guest successfully.';
					
				}else{
					$response['status'] = 0;
					$response['msg'] = 'Sorry, cannot add.';
				}
			
			}else {
					$response['status'] = 0;
					$response['msg'] = 'Email already exists';
			
			}
		 
			
		} 	
		echo json_encode($response); die;
	
	} 
	function save_list()
	{
		
		$response['status'] = 0;
		$response['msg'] = 'Infomration missing';
				
		if($this->input->post('list_id'))
		{
			$this->list_name			=	$this->input->post('list_name');					 
			$this->list_gift_limit		=	$this->input->post('list_gift_limit') ;
			$this->gift_active			=	$this->input->post('gift_active') ;
			$this->dollar_active		=	$this->input->post('dollar_active') ;
			$this->money_pot_active		=	$this->input->post('money_pot_active') ;
			$this->money_pot_active		=	$this->input->post('money_pot_active') ;
			$this->money_pot_value		=	$this->input->post('money_pot_value') ;			
			 						 
			$list_id							=	$this->input->post('list_id');
			$dataBase['list_name']				=	$this->list_name;
			$dataBase['list_gift_limit']		=	$this->list_gift_limit;	
			$dataBase['gift_active']			=	$this->gift_active;	
			$dataBase['dollar_active']			=	$this->dollar_active;	
			$dataBase['money_pot_active']		=	$this->money_pot_active;
			$dataBase['money_pot_value']				=	$this->money_pot_value;	
			
			if($this->host_model->update_list_details($dataBase, $list_id))
			{
				$response['status'] = 1;
				$response['msg'] = 'Updated details successfully.';
				
			}else{
				$response['status'] = 1;
				$response['msg'] = 'Sorry, cannot update.';
			}
		} 	
		echo json_encode($response); die;
	}
	public function login()
	{
		if(isset($_GET['ref']))
		{
			$link = $_GET['ref'];
		}
		else
		{
			$link = '/account/';
		}
		 
		$user_data = $this->login_model->check_login();
		//echo 's'; die;
	 	if (is_array($user_data) || $user_data != false  )
		{ 
			$redirect = '/account/';
			redirect($redirect);
		}
		$data['ref_link'] = $link; 
		$data['main_view'] = 'login_view';
	 	$data['js_view'] = 'js/login'	; 
		$this->load->view('includes/inner_template', $data);
		
	}
	public function forgotpassword()
	{
		 
		 
		$user_data = $this->login_model->check_login();
		//echo 's'; die;
	 	if (is_array($user_data) || $user_data != false  )
		{ 
			$redirect = '/account/';
			redirect($redirect);
		}
		 
		$data['main_view'] = 'forgotpassword';
	 	$data['js_view'] = 'js/login'	; 
		$this->load->view('includes/inner_template', $data);
		
	}
	public function proces_password()
	{
		if($this->input->post('email'))
		{
			$user['email'] =  $this->input->post('email');
 
			$res = $this->login_model->get_user($user['email']);	
			if($res)
			{
				
				
						$mg = new Mailgun(EMAIL_KEY);
						
						$domain = EMAIL_DOMAIN;
						
					 
						$text = "Hello ".$res['uname'].", <br> <br> ";
						$text .= "<br>As per your password request, here is the password  <br>" ;
						$text .= "<br> ";
						
						$text .= " <a style='background-color:#44c767;-moz-border-radius:28px;-webkit-border-radius:28px;
										border-radius:0px;
										border:1px solid #18ab29;
										display:inline-block;
										cursor:pointer;
										color:#ffffff;
										font-family:Arial;
										font-size:17px;
										padding:16px 31px;
										text-decoration:none;
										text-shadow:0px 1px 0px #2f6627;'  > ".base64_decode($res['password'])."</a>";
											
						$text .= " <br><br><br> Regards, <br>";
						$text .= " AguestList Team. ";
						# Now, compose and send your message.
						$mg->sendMessage($domain, array('from'    => 'AguestList@gmail.com', 
														'to'      => $res['email'], 
														'subject' => 'Your AGuestList Password', 
														'html'    => $text));
														
														
														
				$response['status'] = 1;
				$response['msg'] = 'Password successfully sent to your email id.';
				 
			
			}
			else 
			{
				$response['status'] = 0;
				$response['msg'] = 'This email does not exists in our system.';
			
			}
			 
			echo json_encode($response); die;	
		}
	
	}
	public function proces_login()
	{
		 
		if($this->input->post('username'))
		{
			$user['username'] =  $this->input->post('username');

			$user['password'] =  $this->input->post('password');
			
			$res = $this->login_model->validate_login($user);	
			if($res == 'success')
			{
				$response['status'] = 1;
				$response['msg'] = 'Successfully login, Redirecting to my account...';
				 
			
			}
			else if($res == 'fail_pass')
			{
				$response['status'] = 0;
				$response['msg'] = 'Password does not match';
			
			}
			else if($res == 'fail_login')
			{
				$response['status'] = 0;
				$response['msg'] = 'Username and Password does not match';
			
			}
			echo json_encode($response); die;	
		}
		
	}
	
	
	public function proces_register()
	{
		 
		if($this->input->post('username'))
		{
			$user['username'] =  $this->input->post('username');

			$user['password'] =  $this->input->post('password');
			
			$user['fname'] =  $this->input->post('fname');
			
			$user_regiser['email'] = $user['username'];
			$user_regiser['password'] =  base64_encode($user['password']);
			$user_regiser['uname'] = $user['fname'];
			$user_regiser['active'] =1;
			$user_regiser['dt_created'] = date('Y-m-d H:i:s');
			
			$reg_red =  $this->login_model->register($user_regiser);
			
			if($reg_red == 'success')
			{
				$res = $this->login_model->validate_login($user);
					
				if($res == 'success')
				{
					$response['status'] = 1;
					$response['msg'] = 'Registration Succes, Redirecting ...';
					 
				
				}
				else if($res == 'fail_pass')
				{
					$response['status'] = 0;
					$response['msg'] = 'Password does not match';
				
				}
				else if($res == 'fail_login')
				{
					$response['status'] = 0;
					$response['msg'] = 'Username and Password does not match';
				
				}
			}
			else{
					$response['status'] = 0;
					$response['msg'] = 'Email Already registered.';
			}	
			
			echo json_encode($response); die;	
		}
		
	}
	 
	public function select_plan()
	{		
		$segment = $this->uri->segment(2);
		
		$user_data = $this->login_model->check_login();
	 
	 	if ( ! is_array($user_data) || $user_data === false  )
		{
			$this->session->sess_destroy();
			$link = '/select_plan/'.$segment.'/';
			 
			 
			$redirect = '/login/?ref='.$link;
			redirect($redirect);
		} 
		
		$this->load->library('encrypt');
		
		$skey = $this->config->item('encryption_key');
		
		$this->load->model('host_model');
		
		$data['segment'] = $segment;
		
		$data['main_view'] = 'select_plan';
		 
		$inboundlink  = rawurldecode( $this->encrypt->decode( $segment, $skey) );
		 
		$data['host_details'] = $this->host_model->get_one_plan($inboundlink);
				 
		//$user_arr['host'] =  json_encode($data['host_details']);
		 				
		//$this->session->set_userdata($user_arr);
		
		
		$this->load->helper('form');
		$this->load->helper('url');
		$error ='';
		$error_message = '';
	 
		if($this->input->post('host_id'))
		{				
			 
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');				 
			$this->form_validation->set_rules('list_name','List name','trim|required');				 
			$this->form_validation->set_rules('list_gift_limit','Gift Limit','trim|required');	
			 	
			 
			if($this->form_validation->run()===TRUE)
			{
				$this->list_name			=	$this->input->post('list_name');					 
				$this->list_gift_limit		=	$this->input->post('list_gift_limit') ;
				$this->gift_active			=	$this->input->post('gift_active') ;
				$this->dollar_active		=	$this->input->post('dollar_active') ;
				$this->money_pot_active		=	$this->input->post('money_pot_active') ;
				$this->money_pot_value		=	$this->input->post('money_pot_value') ;
				
				
				
				 
				$error		=	0;
			 						 			 
				$dataBase['list_name']				=	$this->list_name;
				$dataBase['list_gift_limit']		=	$this->list_gift_limit;	
				$dataBase['gift_active']			=	$this->gift_active;	
				$dataBase['dollar_active']			=	$this->dollar_active;	
				$dataBase['money_pot_active']		=	$this->money_pot_active;
				$dataBase['money_pot_value']		=	$this->money_pot_value;				 
						
			}else {
				 
				$error	 				 =	1;
				$error_message			.=	form_error('list_name');					 
				$error_message			.=	form_error('list_gift_limit');
			  
			}	
	
			 
	
			if($error == 0)
			{
				  
				 $host_data =  $data['host_details'];
				 
				 $dataBase['list_limit'] =  $host_data['list_max'];
				 $dataBase['host_id'] 	 =  $host_data['id'];
				 $dataBase['user_id'] 	 =  $this->session->userdata('user_id');
				 $dataBase['active'] 	 =  0;
				 $dataBase['dt_created'] =  date('Y-m-d H:i:s');
				 
				 $db_paymnet['user_id'] 	  =  $this->session->userdata('user_id');
				 $db_paymnet['amt'] 	      =  $host_data['amt'];
				 $db_paymnet['host_plain_id'] = $dataBase['host_id'];
				 $db_paymnet['status']        = 'initialize';
				 $db_paymnet['dt_created']    =  date('Y-m-d H:i:s');
						 
				 $data['host_name']  = $host_data['host_name'];
				 $data['list_name']  = $dataBase['list_name'];
				 
				 $data['amt']      = $db_paymnet['amt'];
				 $data['list_id']  = $this->host_model->insert_list_details($dataBase);
				 
				 $db_paymnet['list_id'] = 	$data['list_id'];
				  	
				 $data['pay_id']   = $this->host_model->insert_paymnet_details($db_paymnet);
				 
				 $user_arr['payment'] =  json_encode($data);
		 				
				 $this->session->set_userdata($user_arr); 
				 
				 $redirect = '/make_paymnet/';
				 redirect($redirect);
							
			} 			
			 
		} 
					
		$data['error'] = $error;  
		
		$data['error_message'] = $error_message;  
		
		$this->load->view('includes/inner_template', $data);
	
	
	}
	
	function make_paymnet()
	{
		
		
		if($this->session->userdata('payment'))
		{
			
			$encode_info = $this->session->userdata('payment');
			$data = json_decode($encode_info, true);
			
			
			$data['main_view'] = 'paymnet_view';
			$data['js_view'] = 'js/paymnet'	; 
			$this->load->view('includes/inner_template', $data);
		}else {
			echo 'Error'; die;
		}
	
	}
	
	
	function logout()
	{
		$this->session->sess_destroy();
		$redirect = '/login/';
		redirect($redirect);	
	}
	function success()
	{
		 
		 
		$data['main_view'] = 'pay_success';
	 	$data['js_view'] = 'js/login'	; 
		$this->load->view('includes/inner_template', $data); 
	
	}
}

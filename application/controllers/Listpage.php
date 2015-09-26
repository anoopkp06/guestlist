<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Listpage extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model('login_model');
		
		$this->load->model('host_model');
		
		$this->load->library('encrypt');					
		 
	} 
	public function index($token)
	{
	   
		 
		$data['main_view'] = 'list_view';
		$data['guest_details'] =  [];
		$data['gift_details']	= [];
		$data['login_user'] =	[];
		$data['user_pot'] = 0;
		$list_id = $this->encrypt->decode($token, 'guest');
		
		 
			
		if($res = $this->host_model->validate_list_ld($list_id, $this->session->userdata('user_id')))
		{
			$data['list_details'] = $res;
			
			
			$final_details = [];
			$guest_details =  $this->host_model->get_all_guests($list_id);
			
			if(!empty($guest_details))
			{
				foreach($guest_details as $key => $user_info)
				{
					$gift_user = $this->host_model->get_user_gift($list_id, $user_info['email']);	
					$user_info['gifts'] = $gift_user ;
					array_push($final_details, 	$user_info); 			
				}			
			} 
			$data['guest_details'] =  $final_details; 
			
			$data['gift_details'] =  $this->host_model->get_all_gifts($list_id);
			
			$data['user_pot'] =  $this->host_model->get_money_pot($list_id);
			 
			
		}
		else{
			$data['error'] = "Sorry, Invalis page.";
		
		}	
 		
		 
		$data['js_view'] = 'js/guest_list';
		
		$this->load->view('includes/inner_template', $data);
		 
	}
	
	public function user_list_view($token, $user_email_token='')
	{
	   
		$data['main_view'] = 'user_list_view';
		$data['guest_details'] =  [];
		$data['gift_details']	= [];
		$data['login_user'] =	[];
		$data['user_pot'] = 0;
		$list_id = $this->encrypt->decode($token, 'guest');
		
		if(!empty($user_email_token))
			$user_email = $this->encrypt->decode($user_email_token, 'guest');
		else				
			$user_email = '';
	 
				 
		if($res = $this->host_model->validate_email_list($list_id, $user_email))
		{
						
			$data['list_details'] = $this->host_model->get_list_details($list_id);
			
			$current_user_gifts  = $this->host_model->get_user_gift($list_id, $user_email);	
			
			$G_ids = [];
			if(!empty($current_user_gifts))
			{
				foreach($current_user_gifts as $val){
					$G_ids[] = $val['id'];
				}	
				
			} 
			$data['current_users_ids'] =  $G_ids;
			
			$data['current_email'] =  $user_email;
			
			$final_details = [];
			$guest_details =  $this->host_model->get_all_guests($list_id);
			
			if(!empty($guest_details))
			{
				foreach($guest_details as $key => $user_info)
				{
					if($user_email != $user_info['email'])
					{
						$gift_user = $this->host_model->get_user_gift($list_id, $user_info['email']);	
						$user_info['gifts'] = $gift_user ;
						array_push($final_details, 	$user_info); 
					}else {
						$gift_user = $this->host_model->get_user_gift($list_id, $user_info['email']);	
						$user_info['gifts'] = $gift_user ;		
						array_unshift($final_details, $user_info);			
					}				
					
					
				}			
			} 
			$data['guest_details'] =  $final_details; 
						 
			$data['gift_details'] =  $this->host_model->get_all_gifts($list_id);
			
			$data['user_pot'] =  $this->host_model->get_money_pot($list_id);			
			 
			
		}
		else{
			$data['error'] = "Sorry, Invalid page.";
		
		}	
 		 
		 
		$data['js_view'] = 'js/guest_list';
		
		$this->load->view('includes/inner_template', $data);
		 
	}
	
} 
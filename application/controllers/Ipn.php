<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipn extends CI_Controller {
 
 
	public function __construct() 
	{
		parent::__construct();
		
		$this->load->model('login_model');
		
		$this->load->model('host_model');
		
		$this->load->library('encrypt');					
		 
	} 
	public function index()
	{	
		 
		// assign posted variables to local variables
		$item_name = $_POST['item_name'];
		$item_number = $_POST['item_number'];
		$payment_status = $_POST['payment_status'];
		$payment_amount = $_POST['mc_gross'];
		$payment_currency = $_POST['mc_currency'];
		$txn_id = $_POST['txn_id'];
		$receiver_email = $_POST['receiver_email'];
		$payer_email = $_POST['payer_email'];
		
		$txn_id = $_POST['txn_id'];
		 
		$arr['status'] = $_POST['payment_status'];
		$arr['dt_updated'] = date('Y-m-d H:i:s');
		//$arr['hosted_button_id'] = json_encode($_POST);
		$arr['txn_id'] = $txn_id;
	 	//$item_number = 17;
		$this->load->library('email');
 		//$item_number = 12;
		$this->host_model->update_paymnet_details($arr, $item_number); 
		if($_POST['payment_status'] === 'Completed')
		{
			$pay_details = $this->host_model->get_payment_history($item_number);
			
			$list['active'] = 1;
			$list['dt_updated'] = date('Y-m-d H:i:s'); 
			$list_id = $pay_details['list_id'];
			
			$this->host_model->update_list_details($list, $list_id);		
		}
		
		
		 
	}
 
 
}




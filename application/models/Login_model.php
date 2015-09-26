<?php
 
class Login_model extends CI_Model 
{

	public $title;
	public $content;
	public $date;

	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
	}
	function register($user_data)
	{
			$this->db->where('email', $user_data['email']);			 
			$query = $this->db->get('tbl_users');
			if($query->num_rows() > 0)
			{
				return 'exists';
 			}
			else
			{
				$this->db->insert('tbl_users', $user_data);
				return 'success';
			}
			
	}
	
	
	function validate_login($user_data)
	{
		
			$this->db->where('email', $user_data['username']);			 
			$query = $this->db->get('tbl_users');
			if($query->num_rows() == 1)
			{
				$row = $query->row_array();
				if(base64_decode($row['password']) == $user_data['password'] ) 
				{					
					$user_arr['user_id'] =  $row['id'];
					$user_arr['email'] =  $row['email'];					
					$this->session->set_userdata($user_arr);
						
					return 'success';
				
				}
				else {
					return 'fail_pass';
				}
 			}
			else
			{
				return 'fail_login';
			}
		
	}
	
	public function check_login()
	{
		 
		if($this->session->userdata('user_id'))
		{
			$this->db->where('id', $this->session->userdata('user_id'));			 
			$query = $this->db->get('tbl_users');
			if($query->num_rows() == 1)
			{
				$row = $query->row_array();
				 
				return $row;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return  false;
		}
	} 
	public function get_user($email='')
	{
		$results = false;
		if(!empty($email))
		{
			$this->db->where('active', 1);
			$this->db->where('email', $email);
			$query = $this->db->get('tbl_users');

			if ( $query->num_rows() > 0 )
			{
				$results = $query->row_array();
			}
		}
		return $results;
	}
}
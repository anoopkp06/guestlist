<?php
 
class Host_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_all_plans()
        {
                $query = $this->db->get('tbl_host_plan', 3);
                return $query->result_array();
        }
		public function get_all_guests($list_id)
        {
                $this->db->where('list_id', $list_id);
			    $query = $this->db->get('tbl_guest');
                return $query->result_array();
        }
		public function get_all_gifts($list_id)
        {
               // $this->db->where('list_id', $list_id);
			    $query = $this->db->get('tbl_gifts');
                return $query->result_array();
        }
		
		
		
		function check_guest($email, $list_id)
		{
			 $this->db->where('list_id', $list_id);
			 $this->db->where('email', $email); 
			 $query = $this->db->get('tbl_guest');	
			  if($query->num_rows() > 0)
			 {
				return true;
			 }
			 return false; 
		
		}
		function validate_list_ld($list_id, $user_id)
		{
			 $response = false;
			 $this->db->select('tbl_list.*');
			 $this->db->from('tbl_list');
			 $this->db->where('tbl_list.user_id', $user_id);
			 $this->db->where('tbl_list.id', $list_id);
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				$response = $query->row_array();
			 } 
             return $response;	
		
		}
		function made_attend($email, $list_id, $attend)
		{
			 $data['attend'] = $attend;
			 $this->db->where('tbl_guest.email', $email);	
			 $this->db->where('tbl_guest.list_id', $list_id);
			 $this->db->update('tbl_guest', $data);
			 return true;
		}
		function get_list_details($list_id)
		{
			 $response = false;
			 $this->db->select('tbl_list.*');
			 $this->db->from('tbl_list');
			 $this->db->where('tbl_list.id', $list_id);
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				$response = $query->row_array();
			 } 
             return $response;	
		
		}

		function get_my_hosts($user_id)
		{
			 $response = array();
			 $this->db->select('tbl_host_plan.*, tbl_list.*, tbl_list.id as list_id');
			 $this->db->from('tbl_host_plan');
	  
			 $this->db->join('tbl_list','tbl_list.host_id=tbl_host_plan.id','inner'); 
			 $this->db->where('tbl_list.user_id', $user_id);
		 	 $query = $this->db->get();
			 //echo $this->db->last_query(); die;
			 if($query->num_rows() > 0)
			 {
				$response = $query->result_array();
			 } 
             return $response;
		}
		
		
        public function get_one_plan($id)
        {
             $response = array();
			 $this->db->select('tbl_host_plan.*');
			 $this->db->from('tbl_host_plan');
			  
			 $this->db->where('tbl_host_plan.id', $id);
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				$response = $query->row_array();
			 } 
             return $response; 
        }

        public function insert_list_details($details)
        {
            $this->db->insert('tbl_list', $details);
			return 	$this->db->insert_id();    
        }
		
	 	public function add_guest_details($details)
		{
			$this->db->insert('tbl_guest', $details);
			return 	$this->db->insert_id(); 
		}
		public function validate_email_list($list_id, $email)
		{
			 $response = false;
			 $this->db->select('tbl_guest.*');
			 $this->db->from('tbl_guest');
			 $this->db->where('tbl_guest.list_id', $list_id); 
			 $this->db->where('tbl_guest.email', $email);
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				$response = $query->row_array();
			 } 
             return $response; 	
		
		}
		function delete_gift_details($details)
		{
			 $response = false;
			  
			 $this->db->where('tbl_guest_gift.list_id', $details['list_id']);
			 $this->db->where('tbl_guest_gift.gift_id', $details['gift_id']); 
			 $this->db->where('tbl_guest_gift.email', $details['email']);
		 	 $this->db->delete('tbl_guest_gift');
			 return true; 
		}
		public function add_gift_details( $details)
		{
			 $response = false;
			 $this->db->select('tbl_guest_gift.*');
			 $this->db->from('tbl_guest_gift');
			 $this->db->where('tbl_guest_gift.list_id', $details['list_id']);
			 $this->db->where('tbl_guest_gift.gift_id', $details['gift_id']); 
			 $this->db->where('tbl_guest_gift.email', $details['email']);
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				 return false;
				 
			 }else{
			 
			 	$this->db->insert('tbl_guest_gift', $details);
				return 	$this->db->insert_id(); 
			 } 
			
				
		}
		public function get_money_pot($list_id)
		{
			 $response = 0;
			 
			 $this->db->select_sum('gift_val');
			 $this->db->from('tbl_guest_gift');			  
			 $this->db->where('tbl_guest_gift.list_id', $list_id);
			 $this->db->where('tbl_guest_gift.gift_type', 'money');
			 
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				$responseArr = $query->row_array();
				$response = $responseArr['gift_val'];
			 } 
             return $response; 
			 
		
		}
		public function get_user_gift($list_id, $email )
		{
			 $response = false;
			 $this->db->select('tbl_gifts.*, gift_val');
			 $this->db->from('tbl_guest_gift');
			 $this->db->join('tbl_gifts','tbl_gifts.id=tbl_guest_gift.gift_id','inner'); 
			 $this->db->where('tbl_guest_gift.list_id', $list_id); 
			 $this->db->where('tbl_guest_gift.email', $email);
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				$response = $query->result_array();
			 } 
             return $response; 	
		
		}
		
		 public function insert_paymnet_details($details)
        {
            $this->db->insert('tbl_payment_history', $details);
			return 	$this->db->insert_id();    
        }
		
		 public function update_paymnet_details($details, $id)
        {
            $this->db->where('tbl_payment_history.id', $id);
			$this->db->update('tbl_payment_history', $details);
			return true;   
        }
		
		 public function update_list_details($details, $id)
        {
            $this->db->where('tbl_list.id', $id);
			$this->db->update('tbl_list', $details);
			return true;   
        }
		
		 public function update_user_details($details, $id)
        {
            $this->db->where('tbl_users.id', $id);
			$this->db->update('tbl_users', $details);
			return true;   
        }
		
		public function get_payment_history($id)
        {
             $response = array();
			 $this->db->select('tbl_payment_history.*');
			 $this->db->from('tbl_payment_history');
			  
			 $this->db->where('tbl_payment_history.id', $id);
		 	 $query = $this->db->get();
			 if($query->num_rows() > 0)
			 {
				$response = $query->row_array();
			 } 
             return $response; 
        }
		
		
}
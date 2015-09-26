<?php
	class Admin_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		}
		public function process_login($user_data)
		{
			
			
			if(!empty($user_data))
			{
				if($user = $this->get_user($user_data['email']))
				{
				 	 
					if($user['password'] == base64_encode($user_data['password'])){
				 	
				 		return $user['id'];
				 	}else {
				 		return false;
				 	}
					
				}else{
					return false;
					 
				}
			}

		}
		public function confirm_user($email)
		{
			if($userdata = $this->get_user_by_email($email))
			{
				$data['confirmed'] = 1;
				$this->db->where('id', $userdata['id']);
				$this->db->update('tbl_users', $data);
			}
		
		}
		public function get_user($email='')
		{
 			$results = false;
			if(!empty($email))
			{
				$this->db->where('active', 1);
				$this->db->where('email', $email);
				$query = $this->db->get('tbl_admin');

				if ( $query->num_rows() > 0 )
				{
					$results = $query->row_array();
				}
			}
			return $results;
		}
		public function get_user_by_id($id='')
		{
 			$results = false;
			if(!empty($id))
			{
				 
				$this->db->where('id', $id);
				$query = $this->db->get('tbl_users');

				if ( $query->num_rows() > 0 )
				{
					$results = $query->row_array();
				}
			}
			return $results;

		}
		public function get_user_by_email($email='')
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
		public function get_page_by_id($id='')
		{
 			$results = false;
			if(!empty($id))
			{
			 
				$this->db->where('id', $id);
				$query = $this->db->get('tbl_cms');

				if ( $query->num_rows() > 0 )
				{
					$results = $query->row_array();
				}
			}
			return $results;

		}
		
		
		
		public function get_guest_by_id($id='')
		{
 			$results = false;
			if(!empty($id))
			{
			 
				$this->db->where('id', $id);
				$query = $this->db->get('tbl_guest');

				if ( $query->num_rows() > 0 )
				{
					$results = $query->row_array();
				}
			}
			return $results;

		}
		
		public function get_host_by_id($id='')
		{
 			$results = false;
			if(!empty($id))
			{
			 
				$this->db->where('id', $id);
				$query = $this->db->get('tbl_host_plan');

				if ( $query->num_rows() > 0 )
				{
					$results = $query->row_array();
				}
			}
			return $results;

		}
		public function get_order_by_id($id='')
		{
 			$results = false;
			
 			if(!empty($id))
			{
		
				$this->db->select("tbl_payment_history.id, tbl_payment_history.amt, tbl_payment_history.dt_created as paymnet_date, tbl_payment_history.txn_id, tbl_payment_history.status as status");
				$this->db->select("booker.uname, booker.email");	 
				$this->db->select("tbl_list.list_name");
				$this->db->select("tbl_host_plan.host_name");			
				$this->db->order_by('tbl_payment_history.dt_created', 'DESC');
				$this->db->join('tbl_users as booker', 'booker.id=tbl_payment_history.user_id', 'inner');
				$this->db->join('tbl_list', 'tbl_list.id=tbl_payment_history.list_id', 'inner');  
				$this->db->join('tbl_host_plan', 'tbl_host_plan.id=tbl_payment_history.host_plain_id', 'inner');  
				$this->db->from("tbl_payment_history");
				$this->db->where('tbl_payment_history.id', $id);
			
		        $query = $this->db->get();
		        if ($query->num_rows() > 0) 
		        {
		            $data =  $query->row_array();
		            return $data;
		        }
		        return false;
				
			}
			return $results;

		}
		
		
		
		public function get_service_type_by_id($id='')
		{
 			$results = false;
			if(!empty($id))
			{
				
				$this->db->where('id', $id);
				$query = $this->db->get('tbl_service_types'); 

				if ( $query->num_rows() > 0 )
				{
					$results = $query->row_array();
				}
			}
			return $results;

		}
		
		
		public function get_gift_by_id($id='')
		{
 			$results = false;
			if(!empty($id))
			{
				
				$this->db->where('id', $id);
				$query = $this->db->get('tbl_gifts'); 

				if ( $query->num_rows() > 0 )
				{
					$results = $query->row_array();
				}
			}
			return $results;

		}
		
		
		
		
		public function get_ads_by_id_details($id='')
		{
 			$results = false;
			if(!empty($id))
			{
				
				$this->db->select('tbl_ads.*,tbl_category.cat_name,tbl_users.email as user_email');
				$this->db->join('tbl_category', 'tbl_category.id=tbl_ads.cat_id', 'left');
				$this->db->join('tbl_users', 'tbl_users.id=tbl_ads.user_id', 'left');
				$this->db->from('tbl_ads');
				$this->db->where('tbl_ads.id', $id);
				$query = $this->db->get();
				if ( $query->num_rows() > 0 )
				{
					$results = $query->result_array();
				}
			}
			return $results;

		}
		function resize($width, $height, $fdname, $type)
		{
			  list($w, $h) = getimagesize($_FILES[$fdname]['tmp_name']);
			  $ratio = max($width/$w, $height/$h);
			  $h = ceil($height / $ratio);
			  $x = ($w - $width / $ratio) / 2;
			  $w = ceil($width / $ratio);
			  $base_url_upload = $type.'/'.$width.'x'.$height.'_'.rand(1,999999).'_'.$_FILES[$fdname]['name'];
			  $path = PATH_UPLOAD.$base_url_upload;
		 	  $retun_path = URL_UPLOAD.$base_url_upload;
			  $imgString = file_get_contents($_FILES[$fdname]['tmp_name']);
			  /* create image from string */
			  $image = imagecreatefromstring($imgString);
			  $tmp = imagecreatetruecolor($width, $height);
			  imagecopyresampled($tmp, $image,
			    0, 0,
			    $x, 0,
			    $width, $height,
			    $w, $h);
			  /* Save image */
			  switch ($_FILES[$fdname]['type'])
			  {
			    case 'image/jpeg':
			      imagejpeg($tmp, $path, 100);
			      break;
			    case 'image/png':
			      imagepng($tmp, $path, 0);
			      break;
			    case 'image/gif':
			      imagegif($tmp, $path);
			      break;
			    default:
			      exit;
			      break;
			  }
			  return $retun_path;
		}
		
		public function getTotalGifts()
		{
			return $this->db->count_all_results('tbl_guest_gift');
		}
		public function getTotalList()
		{
			return $this->db->count_all_results('tbl_list');
		}
		
		public function getTotalOrders()
		{
			return $this->db->count_all_results('tbl_payment_history');
		}
		public function getTotalUsers($type='')
		{
			 
			return $this->db->count_all_results('tbl_users');
		}
		public function getTotalCategory()
		{
			return $this->db->count_all_results('tbl_category');
		}
		public function getTotalHostPlan()
		{
			return $this->db->count_all_results('tbl_host_plan');
		}
		public function getTotalPages()
		{
			return $this->db->count_all_results('tbl_cms');
		}

		public function getTotalServiceType()
		{
			return $this->db->count_all_results('tbl_service_types');
		}
		
		
		public function get_all_review($user_id)
		{
			$this->db->select("fromuser.name as f_name, fromuser.email as f_email");			
			$this->db->select("tbl_rate_service_provider.*");
			$this->db->order_by('tbl_rate_service_provider.created_date', 'DESC');
			$this->db->join('tbl_users as fromuser', 'fromuser.id=tbl_rate_service_provider.user_id', 'inner');
	        $this->db->from("tbl_rate_service_provider");
	        $this->db->where('tbl_rate_service_provider.service_provider_id', $user_id);
	        
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false; 
		}
		
		
		public function get_all_transactions($user_id)
		{
			$this->db->select("fromuser.name as f_name, fromuser.email as f_email");			
			$this->db->select("tbl_credits_transaction.*");
			$this->db->order_by('tbl_credits_transaction.transaction_date', 'DESC');
			$this->db->join('tbl_users as fromuser', 'fromuser.id=tbl_credits_transaction.from_user_id', 'inner');
	        $this->db->from("tbl_credits_transaction");
	        $this->db->where('tbl_credits_transaction.to_user_id', $user_id);
	        
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false; 
		}
		public function get_all_ads()
		{
 			$results = false;
			$query = $this->db->get('tbl_ads');
		 
			if ( $query->num_rows() > 0 )
			{
				$results = $query->result_array();
			}
			return $results;
		}
		public function get_sys_sonfig()
		{
			$results = false;
			$query = $this->db->get('tbl_config');
		 
			if ( $query->num_rows() > 0 )
			{
				$results = $query->result_array();
			}
			return $results;
		
		}
		public function get_all_service_types()
		{
 			$results = false;
			$query = $this->db->get('tbl_service_types');
		 
			if ( $query->num_rows() > 0 )
			{
				$results = $query->result_array();
			}
			return $results;
		}
		
		public function get_all_list()
		{
			$results = false;
			$query = $this->db->get('tbl_list');
		 
			if ( $query->num_rows() > 0 )
			{
				$results = $query->result_array();
			}
			return $results;
		
		}
		
		public function get_all_category()
		{
			$results = array();
			$this->db->limit(100);
			$query = $this->db->get('tbl_category');
			 
			if ( $query->num_rows() > 0 )
			{
				$results = $query->result_array();
			}
			return $results;
		}
		public function fetch_ServiceType($limit, $start)
		{
			$this->db->order_by('tbl_service_types.id', 'DESC');
			$this->db->limit($limit, $start);
	        $query = $this->db->get("tbl_service_types");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
		}
		
		
		
		public function fetch_gifts($limit, $start)
		{
			$this->db->order_by('tbl_gifts.id', 'DESC');
			$this->db->limit($limit, $start);
	        $query = $this->db->get("tbl_gifts");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
		}
		
		public function fetch_hostplan($limit, $start)
		{
			$this->db->order_by('tbl_host_plan.id', 'DESC');
			$this->db->limit($limit, $start);
	        $query = $this->db->get("tbl_host_plan");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
		}
		public function fetch_pages($limit, $start)
		{
			$this->db->order_by('tbl_cms.id', 'DESC');
			$this->db->limit($limit, $start);
	        $query = $this->db->get("tbl_cms");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
		}
		
		
		
		public function fetch_guest($limit, $start, $type = '1')
		{
			
			$this->db->select("tbl_guest.*, tbl_list.list_name");
			
			$this->db->limit($limit, $start);	
			//$this->db->where('user_type', $type);	
			$this->db->join('tbl_list', 'tbl_list.id=tbl_guest.list_id', 'inner');
	        $this->db->from("tbl_guest");
	        $this->db->order_by('tbl_guest.id', 'DESC'); 
	         $query = $this->db->get();
	 
	        if ($query->num_rows() > 0) {
	             
	        	$data = $query->result_object() ;
	            return $data; 
	        }
	        return false;
		}
		
		public function fetch_users($limit, $start, $type = '1')
		{
			
			$this->db->select("tbl_users.*");
			
			$this->db->limit($limit, $start);	
			//$this->db->where('user_type', $type);	
			//$this->db->join('tbl_service_types', 'tbl_service_types.id=tbl_users.service_type_id', 'left');
	        $this->db->from("tbl_users");
	        $this->db->order_by('tbl_users.dt_created', 'DESC'); 
	         $query = $this->db->get();
	 
	        if ($query->num_rows() > 0) {
	             
	        	$data = $query->result_object() ;
	            return $data; 
	        }
	        return false;
		}
		public function fetch_orders($limit, $start)
		{
			
 
			$this->db->select("tbl_payment_history.id, tbl_payment_history.amt, tbl_payment_history.dt_created as paymnet_date, tbl_payment_history.txn_id, tbl_payment_history.status as status");
			$this->db->select("booker.uname, booker.email");
 
			$this->db->select("tbl_list.list_name");
			$this->db->select("tbl_host_plan.host_name");			
			$this->db->order_by('tbl_payment_history.dt_created', 'DESC');
			$this->db->limit($limit, $start);
			$this->db->join('tbl_users as booker', 'booker.id=tbl_payment_history.user_id', 'inner');
			$this->db->join('tbl_list', 'tbl_list.id=tbl_payment_history.list_id', 'inner');  
			$this->db->join('tbl_host_plan', 'tbl_host_plan.id=tbl_payment_history.host_plain_id', 'inner');  
	        $this->db->from("tbl_payment_history");
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
		}
		public function get_all_ads_filder($filderData)
		{
			$pn= $filderData['page_no'];
			
			if ($pn < 1) {
			    $pn = 1;
			}
			
			$limit =  ($pn - 1) * ADS_PER_PAGE;
		 
			$results = array();
			$this->db->select('tbl_ads.*, tbl_category.*');
			if(!empty($filderData['cat_id']))
			{
				$this->db->where('cat_id', $filderData['cat_id']);
			}
			$this->db->limit(ADS_PER_PAGE, $limit);
			$this->db->join('tbl_category', 'tbl_category.id=tbl_ads.cat_id', 'inner');
			$this->db->from('tbl_ads');
			$query = $this->db->get();
			if ( $query->num_rows() > 0 )
			{
				$results = $query->result_array();
			}
			return $results;
		
		}
		public function get_partners_search($final_arr, $limit=100)
		{
			
			$results = array();
			$this->db->where('active', 1);
			$this->db->limit($limit);
			if(!empty($final_arr['zip']))
			{
				$this->db->where('zip_code', $final_arr['zip']);
			}else{
				$this->db->like('shop_address', $final_arr['locality']);
				$this->db->or_like('city', $final_arr['locality']);
				$this->db->or_like('land_mark', $final_arr['locality']);
				$this->db->or_like('district', $final_arr['dist']);
				$this->db->or_like('street', $final_arr['locality']);
				$this->db->or_like('shop_address', $final_arr['locality']);
			}
 
			$query = $this->db->get('fc_partner');
			 
			if ( $query->num_rows() > 0 )
			{
				$results = $query->result_array();
			}
			return $results;
		
		}
		
		
		public function save_user($user_data)
		{
			 
			if(!empty($user_data))
			{
				if($user = $this->get_user($user_data['email']))
				{
				 	return false;
				}else{
					$user_data['added_date'] = date('Y-m-d H:i:s') ;
					$user_data['confirmed'] = 0 ;
					$user_data['active'] = 1 ;
					$this->db->insert('tbl_users', $user_data);
					return $this->db->insert_id();
				}
			}
		}
		public function save_ads($ads_data)
		{
			 
			if(!empty($ads_data))
			{
				if($user = $this->get_user_by_id($ads_data['user_id']))
				{
				 	$ads_data['added_date'] = date('Y-m-d H:i:s') ;
					$ads_data['active'] = 1 ;
					$this->db->insert('tbl_ads', $ads_data);
					return $this->db->insert_id();
					
				}else{
					
					return false;
				
				}
			}
		}
		
		
	 
		
		public function update_order($ads_data)
		{
			 
			if(!empty($ads_data))
			{
				if($ads = $this->get_order_by_id($ads_data['id']))
				{
				  
				 	$this->db->where('id', $ads_data['id']);
					$this->db->update('tbl_payment_history', $ads_data);
					return $ads_data['id'];
					
				}else{
					
					return false;
				
				}
			}
		}
		
		public function update_guest_details($ads_data, $id)
		{
			 
			if(!empty($ads_data))
			{
				if($ads = $this->get_guest_by_id($id))
				{
				  
				 	$this->db->where('id', $id);
					$this->db->update('tbl_guest', $ads_data);
					return $id;
					
				}else{
					
					return false;
				
				}
			}
		}
		
		
		
		
		
		public function updatePage($id, $page_data)
		{
			 
			if(!empty($page_data))
			{
				if($ads = $this->get_page_by_id($id))
				{
				 	$this->db->where('id', $id);
					$this->db->update('tbl_cms', $page_data);
					return true;
					
				}else{
					
					return false;
				
				}
			}
		}
		
		
		
		
		public function updateUser($id, $user_data)
		{
			 
		 
			if(!empty($user_data))
			{
				if($user = $this->get_user_by_id($id))
				{				 	 
				 	$this->db->where('id', $id);
					$this->db->update('tbl_users', $user_data);
					return true;
					
				}else{
					
					return false;
				
				}
			}
		}
		public function update_gift($id, $cat_data)
		{
			 
			if(!empty($cat_data))
			{
			 	$this->db->where('id', $id);
				$this->db->update('tbl_gifts', $cat_data);
				return true;
			}
		}
		
		
		public function updateHostPlan($id, $pro_data)
		{
			 
			if(!empty($pro_data))
			{
			 	$this->db->where('id', $id);
				$this->db->update('tbl_host_plan', $pro_data);
				return true;
			}
		}
		
		public function update_sys_config($data, $id)
		{
			if(!empty($data))
			{
			 	$this->db->where('id', $id);
				$this->db->update('tbl_config', $data);
				return true;
			}
		
		}
		public function insertGifts($cat_data)
		{
			 
			if(!empty($cat_data))
			{
				$this->db->insert('tbl_gifts', $cat_data);
				return true;
			}
		}
		
		public function insertService_type($cat_data)
		{
			 
			if(!empty($cat_data))
			{
				$this->db->insert('tbl_service_types', $cat_data);
				return true;
			}
		}
		public function insertPage($page_data)
		{
			 
			if(!empty($page_data))
			{
				$this->db->insert('tbl_cms', $page_data);
				return true;
			}
		}
		
		public function addUser($page_data)
		{
			 
			if(!empty($page_data))
			{
				$this->db->insert('tbl_users', $page_data);
				return true;
			}
		}
		
		public function addGuest($page_data)
		{
			 
			if(!empty($page_data))
			{
				$this->db->insert('tbl_guest', $page_data);
				return true;
			}
		}
		
		
		
		
		
		
		public function insertHost($pro_data)
		{
			 
			if(!empty($pro_data))
			{
				$this->db->insert('tbl_host_plan', $pro_data);
				return true;
			}
		}
		
		
		
		public function delete_guest($page_data)
		{
			 
			if(!empty($page_data))
			{
				if($ads = $this->get_guest_by_id($page_data['id']))
				{
				 	$this->db->where('id', $page_data['id']);
					$this->db->delete('tbl_guest');
					return true;
				}else{
					
					return false;
				
				}
			}else {
				return false;
			}
		}
		
		public function delete_gifts($page_data)
		{
			 
			if(!empty($page_data))
			{
				if($ads = $this->get_gift_by_id($page_data['id']))
				{
				 	$this->db->where('id', $page_data['id']);
					$this->db->delete('tbl_gifts');
					return true;
				}else{
					
					return false;
				
				}
			}else {
				return false;
			}
		}
		
		
		
		public function delete_page($page_data)
		{
			 
			if(!empty($page_data))
			{
				if($ads = $this->get_page_by_id($page_data['id']))
				{
				 	$this->db->where('id', $page_data['id']);
					$this->db->delete('tbl_cms');
					return true;
				}else{
					
					return false;
				
				}
			}else {
				return false;
			}
		}
		
		public function delete_order($ads_data)
		{
			 
			if(!empty($ads_data))
			{
				if($ads = $this->get_order_by_id($ads_data['id']))
				{
				 	$this->db->where('id', $ads_data['id']);
					$this->db->delete('tbl_payment_history');
					return true;
				}else{
					
					return false;
				
				}
			}else {
				return false;
			}
		}
		public function delete_service_type($cat_data)
		{
			if(!empty($cat_data))
			{
				if($ads = $this->get_service_type_by_id($cat_data['id']))
				{
				 	$this->db->where('id', $cat_data['id']);
					$this->db->delete('tbl_service_types');
					return true;
				}else{
					return false;
				}
			}else {
				return false;
			}
		}
		
		public function delete_host_pan($pro_data)
		{
			if(!empty($pro_data))
			{
				if($ads = $this->get_host_by_id($pro_data['id']))
				{
				 	$this->db->where('id', $pro_data['id']);
					$this->db->delete('tbl_host_plan');
					return true;
				}else{
					return false;
				}
			}else {
				return false;
			}
		}
		
		
		
		
		public function delete_user($user_data)
		{
			 
			if(!empty($user_data))
			{
				if($ads = $this->get_user_by_id($user_data['id']))
				{
				 	$this->db->where('id', $user_data['id']);
					$this->db->delete('tbl_users');
					return true;
				}else{
					
					return false;
				
				}
			}else {
				return false;
			}
		}
		
		
		
		public function login_user($user_data)
		{
			 
			if(!empty($user_data))
			{
				if($user = $this->get_user($user_data['email']))
				{
				 	$password_db = base64_decode($user['password']);
				 	if($password_db == $user_data['password']){
				 	
				 		return $user['id'];
				 	}
					
				}else{
					return false;
					 
				}
			}
		}
		
		
		
		
		public function save_partner($user_data)
		{
		 
			if(!empty($user_data))
			{
				if($this->get_partner($user_data['mobile']))
				{
				 	return false;
				}else{
					$user_data['date_added'] = date('Y-m-d H:i:s') ;
					$user_data['active'] = 1 ;
					$this->db->insert('fc_partner', $user_data);
					return true;
				}
			}
		}
		public function getUniqueCouponCode($len=6)
		{
		  
			    $hex = md5("123123" . uniqid("", true));
			
			    $pack = pack('H*', $hex);
			    $tmp =  base64_encode($pack);
			
			    $uid = preg_replace("#(*UTF8)[^A-Za-z1-9]#", "", $tmp);
			
			    $len = max(4, min(128, $len));
			
			    while (strlen($uid) < $len)
			        $uid .= $this->getUniqueCouponCode(22);
			
			    $code_final = strtoupper(substr($uid, 0, $len));
			 
			    
			    if($this->check_code($code_final))
			    {
			    	$code_final = $this->getUniqueCouponCode(6);
			    	return $code_final;
			    }else {
			    
			    	return $code_final;
			    }
			    
			    
		}
		function check_code($code)
		{
				$this->db->where('tbl_promocode.code', $code);
				 
				$query = $this->db->get('tbl_promocode');

				if ( $query->num_rows() > 0 )
				{
					return true;
				}else {
					return false;
				}
		
		}
		public function create_token($user_id)
		{
			$token = $this->getUniqueCouponCode();
			$data['user_id'] = $user_id;
			$data['token'] = $token;
			$data['limit'] = MAX_NO_COPY;
			$data['used'] = 0;
			$data['date_added'] = date('Y-m-d H:i:s');
			$this->db->insert('fc_token', $data);
			return $token;
		}
		public function verify_token($data)
		{
			if($user_info = $this->get_user_by_token($data['token']))
			{
				$available = intval($user_info['limit']) - intval($user_info['used']);
				if($available >= $data['no_copy'])
				{
					$used_date_time = date('Y-m-d H:i:s');
					$partner_info = $data['partner_info'];
					$data['token']  = $data['token'];
					$data['user_id'] = $user_info['user_id'];
					$data['partner_id'] = $partner_info['id'];;
					$data['no_of_copy'] = $data['no_copy'];
					$data['date_added'] = $used_date_time;
					$this->db->insert('fc_token_history', $data);
					
					
					$update['used'] = intval($user_info['used']) + intval($data['no_copy']);
					$update['last_used'] = $used_date_time;
					$this->db->where('id',	$user_info['id']);
					$this->db->update('fc_token', $update);
					return 'success';
							
				}else
				{
					return 'limit_exceed';
				}
			}
			else
			{
				return 'token_invalid';
			}
		}
		public function getlocations($lat=0, $lon=0)
		{
			 
			if($lat != 0 && $lon != 0)
			{
				$current_location =	$this->getGoogleData($lat, $lon);
			}else {
				$current_location = 'ZERO_RESULTS';
			}
		 	if($current_location == 'ZERO_RESULTS')
			{
				$partner_details = $this->get_all_partners(100);
				
			}else {
				$partner_details = $this->get_partners_search($current_location);
			}
			return $partner_details;
			
		}
		public function getGoogleData($lat, $lon)
		{
			$options = array (CURLOPT_RETURNTRANSFER => true, // return web page
			CURLOPT_HEADER => false, // don't return headers
			CURLOPT_FOLLOWLOCATION => true, // follow redirects
			CURLOPT_ENCODING => "", // handle compressed
			CURLOPT_USERAGENT => "test", // who am i
			CURLOPT_AUTOREFERER => true, // set referer on redirect
			CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
			CURLOPT_TIMEOUT => 120, // timeout on response
			CURLOPT_MAXREDIRS => 10 ); // stop after 10 redirects
			$ch = curl_init ( "http://maps.googleapis.com/maps/api/geocode/json?latlng={$lat},{$lon}&sensor=false" );
			curl_setopt_array ( $ch, $options );
			$content = curl_exec ( $ch );
			$err = curl_errno ( $ch );
			$errmsg = curl_error ( $ch );
			$header = curl_getinfo ( $ch );
			$httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
			if(!empty($content))
			{
				$resArr = json_decode($content);
				if($resArr->status == 'OK')
				{
					if(isset($resArr->results[0]->address_components)){
						$final_arr = array();
						foreach($resArr->results[0]->address_components as $address) {
						
							if($address->types[0] == 'postal_code') {
								
								$final_arr['zip'] = $address->long_name;
							
							}
							if($address->types[0] == 'locality') {
								
								$final_arr['locality'] = $address->long_name;
							
							}
							if($address->types[0] == 'administrative_area_level_1') {
								
								$final_arr['state'] = $address->long_name;
							
							}
							if($address->types[0] == 'administrative_area_level_2') {
								
								$final_arr['dist'] = $address->long_name;
							
							}
							
						}
						return 	$final_arr;
					
					}
				
				}else {
				
					return 'ZERO_RESULTS';
				}
				 
			
			}
		
		}
		 
		
	}
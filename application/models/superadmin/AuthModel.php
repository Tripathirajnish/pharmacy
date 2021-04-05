<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class authModel extends CI_Model
{ 
  	public function user_login($login_data){
       $query = $this->db->get_where('hospital_profile',$login_data);
       if($query->num_rows())
		{
				return $query->row();
		}
	}
	public function addProfile($data_array)
  	{
     return  $this->db->insert('hospital_profile',$data_array);
 	}
	public function hospitallist(){
		return $this->db->get('hospital_profile')->result();
	}
 	
}
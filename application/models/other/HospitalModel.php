<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hospitalModel extends CI_model
{
  public function getyear()
  {
		return $this->db->get('year')->result();
	}
	public function getprofile($id)
  {
		return $this->db->get_where('hospital_profile',['id'=>$id])->result();
	}
	public function addProfile($data_array)
  {
     return  $this->db->insert('hospital_profile',$data_array);
  }
  public function updateProfile($id,$update_data)
  {
      $this->db->where('id', $id)
                ->update('hospital_profile', $update_data);
        return $this->db->affected_rows();
  }
	
}
?>
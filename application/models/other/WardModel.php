<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wardModel extends CI_model
{
	public function addWard($data_array)
  	{
     	return  $this->db->insert('ward',$data_array);
  	}
  	public function getWard($hospital_id)
  	{
  		return $this->db->get_where('ward', ['hospital_id' => $hospital_id])->result();
  	}
  	public function deleteWard($id)
  	{
  		$this->db->delete('ward', array('id' => $id));
      return $this->db->affected_rows();
  	}
  	public function editWard($id)
  	{
		  return $this->db->get_where('ward',['id'=>$id])->row();
	}
	  public function updateWard($id,$update_data)
  	{
      $this->db->where('id', $id)
                ->update('ward', $update_data);
      return $this->db->affected_rows();
  	}
}
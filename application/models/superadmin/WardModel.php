<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wardModel extends CI_model
{
	public function addWard($data_array)
  	{
      // $this->db->query("ALTER TABLE `ward` ADD `charge` varchar(100) AFTER `prefix`");
     	return  $this->db->insert('ward',$data_array);
  	}
  	public function getWard($id)
  	{
  		return $this->db->get_where('ward', ['hospital_id' => $id])->result();
  	}
  	public function deleteWard($id)
  	{
  		$this->db->delete('ward', array('id' => $id));
      return $this->db->affected_rows();
  	}
  	public function editWard($id)
  	{
		  return $this->db->get_where('ward',['id'=>$id])->result();
	}
	  public function updateWard($id,$update_data)
  	{
      $this->db->where('id', $id)
                ->update('ward', $update_data);
      return $this->db->affected_rows();
  	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wardModel extends CI_model
{
	public function addWard($data_array)
  	{
     	return  $this->db->insert('ward',$data_array);
  	}
  	public function getWard($data)
  	{
		$this->db->where($data);
  		return $this->db->get('ward')->row();
  	}
	public function getWards($id)
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class labModel extends CI_model
{
	public function addLab($data_array)
  	{
     	return  $this->db->insert('lab',$data_array);
  	}
  	public function getLab($id)
  	{
  		return $this->db->get_where('lab', ['hospital_id' => $id])->result();
  	}
  	public function getWard()
  	{
  		return $this->db->get('ward')->result();
  	}
  	public function deleteLab($id)
  	{
  		$this->db->delete('lab', array('id' => $id));
      return $this->db->affected_rows();
  	}
  	public function editLab($id)
  	{
		  return $this->db->get_where('lab',['id'=>$id])->result();
	}
	  public function updateLab($id,$update_data)
  	{
      $this->db->where('id', $id)
                ->update('lab', $update_data);
      return $this->db->affected_rows();
  	}
}
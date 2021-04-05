<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class staffModel extends CI_model
{
	public function getdesig()
  	{
  		return $this->db->get('designation')->result();
  	}
    public function getrole()
    {
      return $this->db->get('role')->result();
    }
	public function addStaff($data_array)
  	{
     	return  $this->db->insert('employee',$data_array);
  	}
  	public function getstaff($id)
  	{
  		return $this->db->get_where('employee', ['hospital_id' => $id])->result();
  	}
    public function staff($id)
    {
      return $this->db->get_where('employee', ['hospital_id' => $id])->result();
    }
  	public function deleteStaff($id)
  	{
  		$this->db->delete('employee', array('id' => $id));
      	return $this->db->affected_rows();
  	}
  	public function editStaff($id)
  	{
		return $this->db->get_where('employee',['id'=>$id])->row();
	}
	public function updateStaff($id,$update_data)
  	{
      	$this->db->where('id', $id)
                ->update('employee', $update_data);
        return $this->db->affected_rows();
  	}
	public function getdeparmentlist(){
		return $this->db->get('department')->result();
	} 


 }
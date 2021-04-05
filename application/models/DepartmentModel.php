<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class departmentModel extends CI_model
{
	public function addDepartment($data_array)
  	{
     	return  $this->db->insert('department',$data_array);
  	}
  	public function getDepartment($id)
  	{
  		return $this->db->get_where('department', ['hospital_id' => $id])->result();
  	}
  	public function deleteDepartment($id)
  	{
  		$this->db->delete('department', array('id' => $id));
      return $this->db->affected_rows();
  	}
  	public function editDepartment($id)
  	{
		  return $this->db->get_where('department',['id'=>$id])->result();
	  }
	  public function updateDepartment($id,$update_data)
  	{
      $this->db->where('id', $id)
                ->update('department', $update_data);
      return $this->db->affected_rows();
  	}
	public function checkdepartmentName($data){
		$this->db->where($data);
		return $this->db->get('department')->row();
	}


 }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoctorDeparmentModel extends CI_model
{
	public function addDoctorDepartment($data_array)
  	{
     	return  $this->db->insert('doctordepartment',$data_array);
  	}
  	public function getDoctorDepartment($id)
  	{
  		return $this->db->get_where('doctordepartment', ['hospital_id' => $id])->result();
  	}
  	public function deleteDoctorDepartment($id)
  	{
  		$this->db->delete('doctordepartment', array('id' => $id));
      return $this->db->affected_rows();
  	}
  	public function editDoctorDepartment($id)
  	{
		  return $this->db->get_where('doctordepartment',['id'=>$id])->result();
	  }
	  public function updateDoctorDepartment($id,$update_data)
  	{
      $this->db->where('id', $id)
                ->update('doctordepartment', $update_data);
      return $this->db->affected_rows();
  	}
	public function checkdoctordepartmentName($data){
		$this->db->where($data);
		return $this->db->get('doctordepartment')->row();
	}


 }
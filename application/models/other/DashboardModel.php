<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dashboardModel extends CI_Model 
{
	public function fetchPatient($hospital_id)
	{
  		return $this->db->get_where('patient', ['hospital_id' => $hospital_id])->num_rows();
  	}
  	public function fetchDepartment($hospital_id)
	{
  		return $this->db->get_where('doctordepartment', ['hospital_id' => $hospital_id])->num_rows();
  	}
  	public function fetchStaff($hospital_id)
	{
  		return $this->db->get_where('employee', ['hospital_id' => $hospital_id])->num_rows();
  	}
  	public function fetchDoctor($hospital_id)
	{
  		return $this->db->get_where('doctor', ['hospital_id' => $hospital_id])->num_rows();
  	}
  	
}

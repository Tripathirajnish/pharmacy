<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dashboardModel extends CI_Model 
{
	public function fetchPatient($id)
	{
  		return $this->db->get_where('patient', ['hospital_id' => $id])->num_rows();
  	}
  	public function fetchDepartment()
	{
  		return $this->db->get('doctordepartment')->num_rows();
  	}
  	public function fetchStaff($id)
	{
  		return $this->db->get_where('employee', ['hospital_id' => $id])->num_rows();
  	}
  	public function fetchDoctor($id)
	{
  		return $this->db->get_where('doctor', ['hospital_id' => $id])->num_rows();
  	}
}

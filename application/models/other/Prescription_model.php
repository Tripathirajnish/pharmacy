<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prescription_model extends CI_Model
{
	public function prescription_add($prescribe_drug)
	{
		$data_inserted = $this->db->insert('patient_prescription',$prescribe_drug);
		return $data_inserted;
	}
	public function show_prescription($where)
	{
		$this->db->order_by('pre_date','desc');
		$this->db->where($where);
		$get_data = $this->db->get('patient_prescription');
		return $get_data->result_array();
		
	}
	
}

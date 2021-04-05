<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dashboardModel extends CI_Model 
{
	public function fetchProduct($id)
	{
  		return $this->db->get_where('stock_report')->num_rows();
  	}
  	public function fetchSupplier($id)
	{
  		return $this->db->get_where('supplier')->num_rows();
  	}
  	public function fetchCategory($id)
	{
  		return $this->db->get_where('category', ['hospital_id' => $id])->num_rows();
  	}
  	public function fetchDoctor($id)
	{
  		return $this->db->get_where('doctor', ['hospital_id' => $id])->num_rows();
  	}
  	
}

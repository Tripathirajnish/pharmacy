<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HospitalserviceModel extends CI_model
{
	public function addservices($arraydata){
		return $this->db->insert('hospital_services', $arraydata);
	}
	public function getservice($hospital_id){
		return $this->db->get_where('hospital_services', ['hospital_id' => $hospital_id])->result();
	}
    public function deleteservice($id)
  	{
  		$this->db->delete('hospital_services', array('id' => $id));
      	return $this->db->affected_rows();
  	}
	public function deleteresource($id)
  	{
  		$this->db->delete('hospital_resources', array('id' => $id));
      	return $this->db->affected_rows();
  	}
	public function getservicesdata($id){
		return $this->db->get_where('hospital_services', ['id' => $id])->row();
	}
	public function updateservices($arraydata, $id){
		
      	$this->db->where('id', $id)
                ->update('hospital_services', $arraydata);
        return $this->db->affected_rows();
	}
	public function addinsurance($arraydata){
		return $this->db->insert('hospital_resources', $arraydata);
	}
	public function getresource($hospital_id){
		return $this->db->get_where('hospital_resources', ['hospital_id' => $hospital_id])->result();
	}
	public function getResourceByid($id){
		return $this->db->get_where('hospital_resources', ['id' => $id])->row();
	}
	public function updateresource($arraydata, $id){
		$this->db->where('id', $id)
                ->update('hospital_resources', $arraydata);
        return $this->db->affected_rows();
	}
	public function getsearchResource($value)
  	{
  		if(isset($value)) 
      {
        $this->db->like('resource_name',$value);
      } 
      $query  = $this->db->get_where('hospital_resources'); 
      $result = $query->result_array(); 
      return $result; 
  	}
}
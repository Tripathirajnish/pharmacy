<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bedModel extends CI_model
{
	public function addBed($data_array)
  	{
     	return  $this->db->insert('bed',$data_array);
  	}
  	public function getBed($id)
  	{
  		return $this->db->get_where('bed', ['hospital_id' => $id])->result();
  	}
  	public function getWard($id)
  	{
  		return $this->db->get_where('ward', ['hospital_id' => $id])->result();
  	}
  	public function deleteBed($id)
  	{
  		$this->db->delete('bed', array('id' => $id));
      return $this->db->affected_rows();
  	}
  	public function editBed($id)
  	{
		  return $this->db->get_where('bed',['id'=>$id])->result();
	}
	  public function updateBed($id,$update_data)
  	{
      $this->db->where('id', $id)
                ->update('bed', $update_data);
      return $this->db->affected_rows();
  	}
    public function assignBed($id,$data_array)
    {
     $this->db->where('id', $id)
                ->update('bed', $data_array);
        return $this->db->affected_rows();
    }
    public function getbPatient()
    {
      $this->db->select('patient.id,patient.uhid,patient.first_name,patient.middle_name,patient.last_name')
      ->from('patient')->where('patient.id NOT IN (select patient_id from bed)');
      
      $query=$this->db->get();
      return $query->result();
    }
	public function getBeddesc(){
		$this->db->select('id');
		$this->db->from('bed');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
}
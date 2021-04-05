<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class labtestModel extends CI_model
{
	  public function addlabTest($data_array)
  	{
     	return  $this->db->insert('labtest',$data_array);
  	}
    public function getTest()
    {
      return $this->db->get('test')->result();
    }
  	public function getLab()
    {
      return $this->db->get('lab')->result();
    }
  	public function getPatient()
    {
      return $this->db->get('patient')->result();
    }
    public function getpatientName($patient_id)
    {
     $query = $this->db->select('first_name,middle_name,last_name')
                      ->from('patient')
                      ->where('uhid', $patient_id)
                      ->get();
        return $query->row();
    }
  	public function deleteTest($id)
  	{
  		$this->db->delete('labtest', array('id' => $id));
      return $this->db->affected_rows();
  	}
  	public function editTest($id)
  	{
		  return $this->db->get_where('labtest',['id'=>$id])->result();
	  }
	  public function updateTest($id,$update_data)
  	{
      $this->db->where('id', $id)
                ->update('labtest', $update_data);
      return $this->db->affected_rows();
  	}
}
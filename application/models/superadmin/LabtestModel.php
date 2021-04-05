<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class labtestModel extends CI_model
{
	  public function addlabTest($data_array)
  	{
     	return  $this->db->insert('labtest',$data_array);
  	}
    public function getlabTest($id)
    {
      return $this->db->get_where('labtest', ['hospital_id' => $id])->result();
    }
  	public function getLab($id)
    {
      return $this->db->get_where('lab', ['hospital_id' => $id])->result();
    }
    public function getDoctor($id)
    {
      return $this->db->get_where('doctor', ['hospital_id' => $id])->result();
    }
  	public function getPatient($id)
    {
      return $this->db->get_where('patient', ['hospital_id' => $id])->result();
    }
    public function getpatientName($patient_id)
    {
     $query = $this->db->select('first_name,middle_name,last_name,gender')
                      ->from('patient')
                      ->where('uhid', $patient_id)
                      ->get();
        return $query->row();
    }
    public function gettestName($lab_name)
    {
     $query = $this->db->select('*')
                      ->from('lab')
                      ->where('lab_name', $lab_name)
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
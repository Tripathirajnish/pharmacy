<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class doctorModel extends CI_model
{
	public function addDoctor($data_array)
  	{
     	return  $this->db->insert('doctor',$data_array);
  	}
    public function getrole()
    {
      return $this->db->get('role')->result();
    }
  	public function getdepartment($id)
  	{
  		return $this->db->get_where('department', ['hospital_id' => $id])->result();
  	}
    public function getdep()
    {
      return $this->db->get('department')->result();
    }
    public function getdoctor($id)
    {
      return $this->db->get_where('doctor', ['hospital_id' => $id])->result();
    }
    public function doctor($dep)
    {
      return $this->db->get_where('doctor',['department'=>$dep])->result();
    }
  	public function deleteDoctor($id)
  	{
  		$this->db->delete('doctor', array('id' => $id));
      	return $this->db->affected_rows();
  	}
  	public function editDoctor($id)
  	{
		return $this->db->get_where('doctor',['id'=>$id])->result();
	  }
	  public function updateDoctor($id,$update_data)
  	{
      	$this->db->where('id', $id)
                ->update('doctor', $update_data);
        return $this->db->affected_rows();
  	}
    public function getviewPatient($id)
    {
      
       // $this->db->query("ALTER TABLE `patient` ADD `prescription` varchar(100) AFTER `doctor_id`");
       return $this->db->get_where('patient',['doctor_id'=>$id])->result();
    }
    public function getpatient()
    {
      return $this->db->get('patient')->result();
    }
    public function getDoc($id)
    {
      return $this->db->get('doctor',['id'=>$id])->result();
    }
	public function getroleid($role){
		return $this->db->get_where('role', [ 'name' => $role])->row();
	}
	public function getdoctordepartment($id){
		return $this->db->get_where('doctordepartment', ['hospital_id' => $id])->result();
	}
   public function getviewPatients($id, $hospital_id)
    {
    
      return $this->db->get_where('opd', ['doctor_id' => $id, 'hospital_id' => $hospital_id])->result();
    }

 }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class patientModel extends CI_model
{
	  public function addPatient($data_array)
  	{
     	return  $this->db->insert('patient',$data_array);
  	}
    public function updateBill($p_id,$data_array)
    {
      // $this->db->where('id', $p_id)
      //           ->update('patient', $data_array);
      // return $this->db->affected_rows();
      echo 'Hello'; exit;
    }
  	public function getdepartment()
  	{
  		return $this->db->get('department')->result();
  	}
    public function checkId()
    {
      $query = $this->db->query("SELECT uhid FROM patient ORDER BY id DESC LIMIT 1");
      $result = $query->row()->uhid;
      return $result;
    }
    public function getdoctor()
    {
      return $this->db->get('doctor')->result();
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
    public function getpatient($id)
    {
      return $this->db->get_where('patient', ['hospital_id' => $id])->result();
    }
    public function singlepatient($id)
    {
     $data = $this->db->get_where('patient',['id'=>$id])->row();
      $output='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><table class="table" cellspacing="10" cellpadding="10" >';
      $output.='<tr><td>UHID Number :-</td><td>'.$data->uhid .'</td><td>Name :-</td><td>'.$data->first_name.' '.$data->last_name.'</td></tr><tr><td>Gender :-</td><td>'.$data->gender .'</td><td>Registration Fee(In Rs.) :-</td><td>'.$data->register_fee .'</td></tr><tr><td>Patient Type :-</td><td>'.$data->patient_type .'</td><td>Marital Status :-</td><td>'.$data->marital_status .'</td></tr><tr><td>Email :-</td><td>'.$data->email .'</td><td>Contact No :-</td><td>'.$data->mobile1 .','.$data->mobile2 .'</td></tr><tr><td>Relative Type :-</td><td>'.$data->relative_name .'</td><td>Relative Name :-</td><td>'.$data->relative .'</td></tr><tr><td>Address :-</td><td>'.$data->address .'</td><td>City :-</td><td>'.$data->city .'</td></tr><tr><td>State :-</td><td>'.$data->state .'</td><td>Pincode :-</td><td>'.$data->pincode .'</td></tr><tr><td>Age :-</td><td>'.$data->age .'</td><td>Issue Date/Time :-</td><td>'.$data->created_at .'</td></tr>';
      $output.="</table>";
      return $output;
    }
     public function show_prescription($where)
    { 
	//$this->db->where($where);
    //return $this->db->get('patient_prescription')->result();
        $this->db->select('*');
		$this->db->from('patient_prescription');
		$this->db->order_by('pre_date', 'desc');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
  }
  public function prescription_add($prescribe_drug)
  {
    $data_inserted = $this->db->insert('patient_prescription',$prescribe_drug);
    return $data_inserted;
  }
  public function getPatientByPatientId($pid){
	 return $this->db->get_where('patient', ['id' => $pid])->row();
  }
  public function getprescriptionDataBydesc(){
		$this->db->select('*');
		$this->db->from('patient_prescription');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
public function getpatientByHospitalId($id){
	 return $this->db->get_where('patient', ['hospital_id' => $id])->result();
 } 
 public function getmedicine($value)
  	{
  		if(isset($value)) 
      {
        $this->db->like('medicine_name',$value);
      } 
      $query  = $this->db->get_where('product'); 
      $result = $query->result_array(); 
      return $result; 
  	}
 }
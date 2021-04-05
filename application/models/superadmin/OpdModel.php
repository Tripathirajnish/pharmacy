<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class opdModel extends CI_model
{
	   public function addPatient($data_array)
  	{
     	return  $this->db->insert('patient',$data_array);
  	}
  	public function fetchData($search, $hospital_id)
  	{
  		if(isset($search)) 
      {
		$this->db->where('hospital_id',$hospital_id);
        $this->db->group_start();  
        $this->db->like('uhid',$search); 
        $this->db->or_like('first_name',$search); 
        $this->db->or_like('middle_name',$search); 
        $this->db->or_like('last_name',$search);
        $this->db->or_like('mobile1',$search); 
        $this->db->or_like('mobile2',$search);
        $this->db->group_end();
      } 
	  
		
      return $this->db->get('patient')->result(); 
	}
	public function fetchOpdData($search, $hospital_id)
  	{
  		if(isset($search)) 
      {
      	$this->db->where('hospital_id',$hospital_id);
        $this->db->group_start(); 
        $this->db->like('patient_id',$search); 
        $this->db->or_like('patient_name',$search); 
        $this->db->or_like('opd_id',$search); 
        $this->db->or_like('contact_no',$search);
        $this->db->group_end();
      } 
      return $this->db->get('opd')->result();
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
    public function PatientDetails($uhid){
	 return $this->db->get_where('patient', ['uhid'=>$uhid])->row();
	}
	public function Patients($uhid){
		 return $this->db->get_where('patient', ['uhid'=>$uhid])->result();
	}
	public function getdoctorbyid($hospital_id){
		return $this->db->get_where('doctor', ['hospital_id' => $hospital_id])->result();
	}
	public function addOpdData($data_array){
		//print_r($data_array); die;
	return  $this->db->insert('opd',$data_array);
	}
	public function GetOpdDataByPatientId($uhid, $id){
		//return $this->db->get_where('opd', ['patient_id' => $uhid, 'hospital_id' => $id])->result();
		$this->db->select('*');
		$this->db->from('opd');
		$this->db->order_by('valid_date', 'desc');
		$this->db->where('patient_id', $uhid);
		$this->db->where('hospital_id', $id);
		$query = $this->db->get();
		return $query->result();	
	
	}
	public function getdepartmentbyid($hospital_id){
		return $this->db->get_where('department', ['hospital_id' => $hospital_id])->result();
	}
    public function getdoctorbydepartment($data){
		$this->db->where($data);
		return $this->db->get('doctor')->result();
	}
	public function getpatientDetails($uhid, $id){
		 $this->db
		  ->select('opd.patient_name, opd.id, opd.patient_id, opd.opd_id, opd.contact_no, opd.doctor_id, opd.department_id, patient.address, patient.age, patient.address')
		  ->from('opd')
		  ->join('patient', 'patient.uhid=opd.patient_id')
		  ->where('opd.hospital_id', $id)
		  ->where('opd.patient_id', $uhid);
		  return $this->db->get()->row();
	}
	public function lablist($id){
	 return $this->db->get_where('lab', ['hospital_id' => $id])->result();
	}
	public function getlabamount($data){
		$this->db->where($data);
		return $this->db->get('lab')->result();
	}
	public function addOpdBillingData($array_data){
		return $this->db->insert('opd_billing', $array_data);
	}
	public function getdoctoropdfee($selectedoc){
		return $this->db->get_where('doctor', ['id' => $selectedoc])->row();
	}
	public function getvaliddate($hospital_id){
		return $this->db->get_where('hospital_profile', ['id' => $hospital_id])->row();
	}
	public function getidbydesc(){
		$this->db->select('id');
		$this->db->from('opd');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function getopdbilldesc(){
		$this->db->select('id');
		$this->db->from('opd_billing');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function getPatientOpdbillingDetails(){
		$this->db->select('*');
		$this->db->from('opd_billing');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function checkpatientId($pid){
		return $this->db->get_where('opd', ['patient_id' => $pid])->row();
	}
	public function getNameAndContactno($pid){
		return $this->db->get_where('patient', ['uhid' => $pid])->row();
	}
	public function getLabentrylist($id){
		$this->db->select('*');
		$this->db->from('opd_billing');
		$this->db->order_by('id', 'desc');
		$this->db->where('hospital_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	 public function getdoctordepartment($id){
		return $this->db->get_where('doctordepartment', ['hospital_id' => $id])->result();
	}
	public function checkpatientIddesc($pid){
		//return $this->db->get_where('opd', ['patient_id' => $pid])->row();
		$this->db->select('*');
		$this->db->from('opd');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function getdischargeentry($id){
			$this->db->select('*');
		$this->db->from('discharge_shift');
		$this->db->order_by('id', 'desc');
		$this->db->where('hospital_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
 }
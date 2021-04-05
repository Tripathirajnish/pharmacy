<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IpdModel extends CI_model
{
	
	public function getdoctorbyid($hospital_id){
		return $this->db->get_where('doctor', ['hospital_id' => $hospital_id])->result();
	}
	public function fetchipdData($search, $hospital_id)
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
      return $this->db->get('ipd')->result(); 
  	}
	public function getward($hospital_id){
		return $this->db->get_where('ward', ['hospital_id' => $hospital_id])->result();
	}
	 public function PatientDetails($uhid){
	 return $this->db->get_where('patient', ['uhid'=>$uhid])->row();
	}
	public function getdeparment($hospital_id){
		return $this->db->get_where('department', ['hospital_id' => $hospital_id])->result();
	}
	public function getdoctors($selectedep, $id){
		     $query = $this->db->select('doc_name, id')
                      ->from('doctor')
                      ->where('department', $selectedep)
                      ->where('hospital_id', $id)
                      ->get();
        return $query->result();
	}
	public function getbed($selecteward, $id){
	$query = $this->db->select('bed_name, id')
                      ->from('bed')
                      ->where('ward_id', $selecteward)
                      ->where('hospital_id', $id)
                      ->where('status', 0)
                      ->get();
        return $query->result();
	
	}
	public function getopdid($pid, $id){
     return $this->db->get_where('opd', ['patient_id' => $pid, 'hospital_id' => $id])->row();		
	}
	public function addIpdData($data_array){
	return  $this->db->insert('ipd',$data_array);
	}
	public function getNameAndContactno($pid){
		return $this->db->get_where('patient', ['uhid' => $pid])->row();
	}
		public function getvaliddate($hospital_id){
		return $this->db->get_where('hospital_profile', ['id' => $hospital_id])->row();
	}
	function getipddetails($pid, $id){
		//return $this->db->get_where('ipd', ['patient_id' => $pid, 'hospital_id' => $id])->row();
		$this->db->select('*');
		$this->db->from('ipd');
		$this->db->where('patient_id', $pid);
        $this->db->where('hospital_id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function getdoctordeparment($hospital_id){
		return $this->db->get_where('doctordepartment', ['hospital_id' => $hospital_id])->result();
	}
	public function assignBed($id,$data_array)
    {
     $this->db->where('id', $id)
                ->update('bed', $data_array);
        return $this->db->affected_rows();
    }
	public function getpatientDetails($uhid, $id){
		
		 $this->db
		  ->select('ipd.patient_name, ipd.id, ipd.insurance, ipd.patient_id, ipd.opd_id, ipd.contact_no, ipd.p_doctor, ipd.p_department, patient.address, patient.age, patient.address')
		  ->from('ipd')
		  ->join('patient', 'patient.uhid=ipd.patient_id')
		  ->where('ipd.hospital_id', $id)
		  ->where('ipd.patient_id', $uhid);
		  return $this->db->get()->row();
	}
	public function getlabamount($data){
		$this->db->where($data);
		return $this->db->get('lab')->result();
	}
	public function addOpdBillingData($array_data){
		return $this->db->insert('ipd_billing', $array_data);
	}
	public function getipdbilldesc(){
		$this->db->select('id');
		$this->db->from('ipd_billing');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function getPatientOpdbillingDetails($id){
		$this->db->select('*');
		$this->db->from('ipd_billing');
		$this->db->order_by('id', 'desc');
		$this->db->where('hospital_id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getLabentrylist($id){
		$this->db->select('*');
		$this->db->from('ipd_billing');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function lablist($id){
	 return $this->db->get_where('lab', ['hospital_id' => $id])->result();
	}
	
 }
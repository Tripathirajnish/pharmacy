<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dischargeModel extends CI_model
{
    public function getBedAssignPatient($id)
    {
	  $this->db
		  ->select('bed.ward_id, bed.patient_id, bed.bed_name, patient.first_name, patient.middle_name, patient.last_name')
		  ->from('patient')
		  ->join('bed', 'patient.uhid=bed.patient_id')
		  ->where('bed.hospital_id', $id)
		  ->where('bed.status', 1);
		  return $this->db->get()->result();
    } 
	public function getBedAssignPatientshift($id)
    {
	  $this->db
		  ->select('shift.new_ward as ward_id, shift.patient_id, shift.new_bed as bed_name, patient.first_name, patient.middle_name, patient.last_name')
		  ->from('patient')
		  ->join('shift', 'patient.uhid=shift.patient_id')
		  ->where('shift.hospital_id', $id)
		  ->where('shift.status', 1);
		  return $this->db->get()->result();
    }
    public function dischargePatient($id,$update_data)
    {
        $this->db->where('patient_id', $id)
                ->update('bed', $update_data);
        return $this->db->affected_rows();
    } 
	public function dischargepaymentst($id,$update_data)
    {
        $this->db->where('patient_id', $id)
                ->update('discharge_bill', $update_data);
        return $this->db->affected_rows();
    }
	public function dischargePatients($id,$update_data)
    {
        $this->db->where('patient_id', $id)
                ->update('shift', $update_data);
        return $this->db->affected_rows();
    }
	
    public function dischargePatientReport($data_insert)
    {
        return  $this->db->insert('discharge_shift', $data_insert);
    }
    public function update_bed($patient_id,$updata_array)
    {
        $this->db->where('patient_id', $patient_id)
                ->update('bed', $updata_array);
        return $this->db->affected_rows();
    }

    public function shiftBed($data_array)
    {
       return  $this->db->insert('shift', $data_array);
    }
	public function getBedAssignPatientByPatientId($id){
		  $this->db
		  ->select('bed.updated_at, bed.patient_id, patient.first_name, patient.middle_name, patient.last_name, patient.age, patient.gender, patient.relative_name, patient.marital_status, patient.email, patient.mobile1')
		  ->from('patient')
		  ->join('bed', 'patient.uhid=bed.patient_id')
		  ->where('bed.patient_id', $id)
		  ->where('bed.status', 1);
		  return $this->db->get()->row();
	}
	public function getBedAssignPatientByPatientIdshift($id){
		  $this->db
		  ->select('shift.updated_at, shift.patient_id, patient.first_name, patient.middle_name, patient.last_name, patient.age, patient.gender, patient.relative_name, patient.marital_status, patient.email, patient.mobile1')
		  ->from('patient')
		  ->join('shift', 'patient.uhid=shift.patient_id')
		  ->where('shift.patient_id', $id)
		  ->where('shift.status', 1);
		  return $this->db->get()->row();
	}
	public function getwardByhospitalId($hospital_id){
		return $this->db->get_where('ward', ['hospital_id' => $hospital_id])->result();
	}
	public function getassignedpatientByPatientId($id){
		$this->db->where($id);
		return $this->db->get('bed')->row();
	}
	public function getassignedpatientByPatientIdshift($id){
		$this->db->where($id);
		return $this->db->get('shift')->row();
	}
	public function getbedBybedId($bed){
		return $this->db->get_where('bed',['id' => $bed])->row();
	}
	public function getbedwarddata($getbedward){
		 $this->db->where($getbedward);
		 return $this->db->get('bed')->row();
	}
	public function getbedwarddatashift($id){
		 $this->db->where($id);
		 return $this->db->get('shift')->row();
	}
	public function labtestReport($condition){
		 $this->db->where($condition);
		 return $this->db->get('ipd_billing')->row();
	}
	public function getipdpatientdata($id, $hospital_id ){
		$this->db->select('*');
		$this->db->from('ipd');
		$this->db->order_by('id', 'desc');
		$this->db->where('patient_id', $id);
		$this->db->where('hospital_id', $hospital_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function adddischargebilldata($arraydata){
		return $this->db->insert('discharge_bill', $arraydata);
	}
	public function getbillbydesc(){
		$this->db->select('id');
		$this->db->from('discharge_bill');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function getbillpaymentdatabypatientID($pid, $hospital_id){
		return $this->db->get_where('discharge_bill', ['patient_id' => $pid, 'hospital_id' => $hospital_id ])->row();
	}
	public function updatepayment($pid, $payment_data){
		$this->db->where('patient_id', $pid)
                ->update('discharge_bill', $payment_data);
        return $this->db->affected_rows();
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dailyreportModel extends CI_model
{
    public function getPatient()
    {
      return $this->db->get('patient')->result();
    }
    public function registerPatient($data, $id)
    {
        $query =  $this->db->select('*')
                        ->from('patient')
                        ->where('(created_at) >=',$data)
                        ->where('hospital_id',$id)
                        ->get()->result();
                         // $result = $query->result_array();
        return $query; 
        // return $this->db->get('patient')->result();
    }
    public function opdPatient($data, $id)
    {
        return $this->db->select('*')
                        ->from('opd')
                        ->join('doctor','doctor.id = opd.doctor_id')
                        ->join('patient','patient.uhid = opd.patient_id')
                        ->where('(opd.created_at) >=',$data)
                        ->where('opd.hospital_id', $id)
                        ->get()->result();
                        // $this->db->get('opd')->result();
    }
    public function ipdPatient($data, $id)
    {
        return $this->db->select('*')
                        ->from('ipd')
                        ->join('patient','patient.uhid = ipd.patient_id')
                        ->where('(ipd.created_at) >=',$data)
                        ->where('ipd.hospital_id',$id)
                        ->get()->result();
    }
    public function opdlab($data, $id)
    {
        return $this->db->select('*')
                        ->from('opd_billing')
                        ->join('patient','patient.uhid = opd_billing.patient_id')
                        ->where('(opd_billing.created_at) >=',$data)
                        ->where('opd_billing.hospital_id',$id)
                        ->get()->result();
                        // return $this->db->get('opd')->result();
    }
    public function ipdlab($data, $id)
    {
        return $this->db->select('*')
                        ->from('ipd_billing')
                        ->where('(created_at) >=',$data)
                        ->where('hospital_id',$id)
                        ->get()->result();
                        // $this->db->get('ipd')->result();
    }

    public function dischargePatient($data, $id)
    {
        return  $this->db->select('*')
                        ->from('discharge_shift')
                        ->join('opd_billing','opd_billing.patient_id = discharge_shift.patient_id')
                        ->where('(date_of_discharge) >=',$data)
                        ->where('discharge_shift.hospital_id',$id)
                        ->get()->result();
                        // $this->db->get('discharge_shift')->result();
    }
    public function opdPatient_dep($data, $id,$dep)
    {
        return $this->db->select('*')
                        ->from('opd')
                        ->join('doctor','doctor.id = opd.doctor_id')
                        ->join('patient','patient.uhid = opd.patient_id')
                        ->where('(opd.created_at) >=',$data)
                        ->where('opd.hospital_id', $id)
                        ->where('opd.department_id', $dep)
                        ->get()->result();
                        // $this->db->get('opd')->result();
    }
    public function ipdPatient_dep($data, $id,$dep)
    {
        return $this->db->select('*')
                        ->from('ipd')
                        ->join('patient','patient.uhid = ipd.patient_id')
                        ->where('(ipd.created_at) >=',$data)
                        // ->where('ipd.department_id', $dep)
                        ->where('ipd.hospital_id',$id)
                        ->get()->result();
    }
    
}
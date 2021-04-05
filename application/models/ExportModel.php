<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class exportModel extends CI_model
{
	public function getDataByDate($fcon)
	{
   	return $this->db->get_where('patient',$fcon)->result();
	}
  public function opd_report($fcon)
  {
    return $this->db->get_where('opd',$fcon)->result();
  }
	public function ipd_report($fcon)
  {
    return $this->db->get_where('ipd',$fcon)->result();
  }
  
 }
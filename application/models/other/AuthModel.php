<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class authModel extends CI_Model
{
    public function user_login($login_data){
       $query = $this->db->get_where('hospital_profile',$login_data);
       if($query->num_rows())
		{
				return $query->row();
		}
    }
    public function user_login1($login_data)
    {
      $query = $this->db->get_where('doctor',$login_data);
      if($query->num_rows())
		  {
				return $query->row();
		  }
    }
    public function roleid($role)
    {
      $query = $this->db
                            ->select('id')
                            ->from('role')
                            ->where('name', $role)
                            ->get();
        return $query->row();
    }
     public function user_login2($login_data)
    {
      $query = $this->db->get_where('employee',$login_data);
      if($query->num_rows())
      {
        return $query->row();
      }
    }
}
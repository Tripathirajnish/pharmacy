<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class authModel extends CI_Model
{
  //   public function user_login($login_data){
  //      $query = $this->db->get_where('hospital_profile',$login_data);
  //      if($query->num_rows())
		// {
		// 		return $query->row();
		// }
  //   }
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
    /*public function authentication($data_array)
    {
      return  $this->db->insert('authentication',$data_array);
    }*/
    public function roleid($name)
    {
      $query = $this->db->select('id, name')
                            ->from('role')
                            ->where('id',$name)
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
   /* public function verify($login_data)
    {
      $sqlQuery = "SELECT * FROM authentication WHERE otp='". $_POST["otp"]."' AND expired!=1 AND NOW() <= DATE_ADD(created, INTERVAL 1 HOUR)";
      $result = mysqli_query($conn, $sqlQuery);
      $count = mysqli_num_rows($result);
      if(!empty($count)) 
      {
        $sqlUpdate = "UPDATE authentication SET expired = 1 WHERE otp = '" . $_POST["otp"] . "'";
        $result = mysqli_query($conn, $sqlUpdate);
        return $result;
      } 
      else 
      {
        $errorMessage = "Invalid OTP!";
      } 
    } */
    
}
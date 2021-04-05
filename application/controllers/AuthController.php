<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class authController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('authModel');
        $this->load->model('hospitalModel');
        $this->load->helper('permission');
		$this->load->model('dashboardModel');  
        $this->load->model('other/dashboardModel'); 
        $this->load->model('other/staffModel'); 		

    }

    public function index()
    {
        // $array = $this->db->get('hospital_profile')->result();
        // echo "<pre>";
        // print_r($array);exit();

        $this->load->view('pharmacy/login.php');
    }
    public function register()
    {
        $year = $this->hospitalModel->getyear();
        $this->load->view('admin/register.php',['year'=>$year]);
    }
    
    public function login()
    {
        $login_data = array(
                          'email' => $this->input->post('email'),
                          'password' => md5($this->input->post('password')),
						  // 'parent_id' => !0,
                        );

        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        if( $this->form_validation->run() ){

            $result = $this->authModel->user_login($login_data);
            // $query = $this->db->get_where('hospital_profile',$login_data);
        //    $query =  $this->db->get('hospital_profile')->result();
        //              print_r($query);
        // // exit();
            if ($result) {
    
                $user_info = array(
                    'name'=>$result->username,
                    'id'=>$result->id,
                    // 'parent_id'=>$result->parent_id
                );
                // print_r($user_info);die();
                $this->session->set_userdata($user_info);
				//echo "test"; die;
                // redirect('dashboardController');
				$id = $this->session->userdata('id');
				$patient = $this->dashboardModel->fetchPatient($id);
				$department = $this->dashboardModel->fetchDepartment($id);
				$staff = $this->dashboardModel->fetchStaff($id);
				$doctor = $this->dashboardModel->fetchDoctor($id);
				$this->load->view('pharmacy/dashboard.php',['patient'=>$patient,'department'=>$department,'staff'=>$staff,'doctor'=>$doctor]);

              /*  $to = $result->email;
                // $to = 'trajnish121@gmail.com';
                $subject = 'Please enter this OTP to proceed login';
                $message =  rand(100000,999999);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <hospital@gmail.com>' . "\r\n";
                mail($to,$subject,$message,$headers);
                // echo $messages = "Thank you for register";
                // exit;
              // $_SESSION['items'] = array();
                $_SESSION['OTP'] = array('otp' => $message, 'email' => $to);



                // redirect('other/dashboardController');
                //$this->load->view('other/dashboard');
				$success = 'Your Otp is sent on your Email Address. Please check your email address'; */
                //$this->load->view('admin/otp.php', ['success' => $success, 'otp' => $message]);
                // redirect('dashboardController');
                //$this->load->view('admin/dashboard'); */
            } 
            else{
                $this->session->set_flashdata('error1','Incorrect Login Id or Password');
                redirect('authController');
            }
       } 
       else{
         $this->session->set_flashdata('error1','Incorrect Login Id or Password');
                redirect('authController');
       }
    }
    public function login1()
    {
        $login_data = array(
                          'doc_email' => $this->input->post('email'),
                          'password' => md5($this->input->post('password')),
						  'role' => '8',
                        );
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        if( $this->form_validation->run() ){
            $result = $this->authModel->user_login1($login_data);
			 if ($result) {
				$role = array(
							  'name' => $result->role
						  );
				$name=$role['name'];
				$role_id = $this->authModel->roleid($name);
                $user_info = array(
                    'name'=>$result->doc_name,
                    'id'=>$result->id,
                    'role'=>$role_id->name,
					'role_id' => $role_id->id
        
                );
                
                $this->session->set_userdata($user_info);

              /*  $to = $result->doc_email;
                // $to = 'trajnish121@gmail.com';
                $subject = 'OTP';
                $message =  rand(100000,999999);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <trajnish121@gmail.com>' . "\r\n";
                mail($to,$subject,$message,$headers);
                // echo $messages = "Thank you for register";
                // exit;
              // $_SESSION['items'] = array();
                $_SESSION['OTP'] = array('otp' => $message, 'email' => $to);



                // redirect('other/dashboardController');
                //$this->load->view('other/dashboard');
				
				$success = 'Your Otp is sent on your Email Address. Please check your email address';
                $this->load->view('doctor/otp.php', ['success' =>$success, 'otp' => $message]); */
				$id = $this->session->userdata('id');
				$role_id = $this->session->userdata('role_id');
				$roleName = $this->staffModel->getroleNameByroleId($role_id);
				if($roleName->name == 'doctor'){
				$hospital = $this->staffModel->getHospitalIdBySessionId($id);
				}else{
					$hospital = $this->staffModel->getHospitalIdBySessionBystaffId($id);
				}
				$hospital_id = $hospital->hospital_id;
				$patient = $this->dashboardModel->fetchPatient($hospital_id);
				$department = $this->dashboardModel->fetchDepartment($hospital_id);
				$staff = $this->dashboardModel->fetchStaff($hospital_id);
				$doctor = $this->dashboardModel->fetchDoctor($hospital_id);
			   $this->load->view('other/dashboard', ['patient' => $patient, 'department' => $department, 'staff' => $staff, 'doctor' => $doctor]);
            } 
            else{
                $this->session->set_flashdata('error1','Incorrect Login Id or Password');
                redirect('doctor/DoctorController');
            }
       } 
       else{
         $this->session->set_flashdata('error1','Incorrect Login Id or Password');
                redirect('doctor/DoctorController');
       }
    }


    public function login2()
    {
        $login_data = array(
                          'emp_email' => $this->input->post('email'),
                          'password' => md5($this->input->post('password')),
						  'role' => $this->input->post('roletype'),
                        );
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        if( $this->form_validation->run() ){
            $result = $this->authModel->user_login2($login_data);
           if ($result) {           
		   $role = array(
                          'name' => $result->role
                      );
            $name=$role['name'];

            $role_id=$this->authModel->roleid($name);
                $user_info = array(
                    'name'=>$result->emp_name,
                    'id'=>$result->id,
                    'role_id'=>$role_id->id,
                );
                
                $this->session->set_userdata($user_info);
              /*  $to = $result->emp_email;
                // $to = 'trajnish121@gmail.com';
                $subject = 'OTP';
                $message =  rand(100000,999999);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <trajnish121@gmail.com>' . "\r\n";
                mail($to,$subject,$message,$headers);
                // echo $messages = "Thank you for register";
                // exit;
              // $_SESSION['items'] = array();
                $_SESSION['OTP'] = array('otp' => $message, 'email' => $to);



                // redirect('other/dashboardController');
                //$this->load->view('other/dashboard');
				$success = 'Your Otp is sent on your Email Address. Please check your email address';
				$error = '';
                $this->load->view('staff/otp.php', ['success' => $success, 'error' => $error, 'otp' => $message]); */
                
                //$this->load->view('other/dashboard');
								$id = $this->session->userdata('id');
				$role_id = $this->session->userdata('role_id');
				$roleName = $this->staffModel->getroleNameByroleId($role_id);
				if($roleName->name == 'doctor'){
				$hospital = $this->staffModel->getHospitalIdBySessionId($id);
				}else{
					$hospital = $this->staffModel->getHospitalIdBySessionBystaffId($id);
				}
				$hospital_id = $hospital->hospital_id;
				$patient = $this->dashboardModel->fetchPatient($hospital_id);
				$department = $this->dashboardModel->fetchDepartment($hospital_id);
				$staff = $this->dashboardModel->fetchStaff($hospital_id);
				$doctor = $this->dashboardModel->fetchDoctor($hospital_id);
			   $this->load->view('other/dashboard', ['patient' => $patient, 'department' => $department, 'staff' => $staff, 'doctor' => $doctor]);
            } 
            else{
                $this->session->set_flashdata('error1','Incorrect Login Id or Password');
                redirect('staff/staffController');
            }
       } 
       else{
         $this->session->set_flashdata('error1','Incorrect Login Id or Password');
                redirect('staff/staffController');
       }
    }
    public function logout(){
        $this->session->unset_userdata('adminlogin');
        $this->session->sess_destroy();
        redirect('authController');
    }
    public function logout1(){
        $this->session->unset_userdata('adminlogin');
        
        $this->session->sess_destroy();
        redirect('doctor/doctorController');
    }
    public function logout2(){
        $this->session->unset_userdata('adminlogin');
        $this->session->sess_destroy();
        redirect('staff/staffController');
    }
    public function otp(){
        $otp = $this->input->post('otp');
        $otp1 = $this->input->post('otp_confirm');
		

        if($otp == $otp1){
			$this->session->set_userdata('doctor_otp', $otp);
            $this->session->set_flashdata('success','Successfully Added');
            redirect('other/dashboardController');
        }
        else
        {
			$this->session->set_flashdata('error','Your otp is incorrect!');
            $success = 'Your Otp is sent on your Email Address. Please check your email address';
			$message = '';
             $this->load->view('doctor/otp.php', ['success' => $success,  'otp' => $message]);
        }
        // redirect('authController');
    }
    public function staff_otp(){
        $otp = $this->input->post('otp');
        $otp1 = $this->input->post('otp_confirm');
	
        if($otp == $otp1){
			$this->session->set_userdata('doctor_otp', $otp);
            $this->session->set_flashdata('success','Successfully Added');
            redirect('other/dashboardController');
        }
        else
        {
			$error = 'Your otp is incorrect!';
			$success = '';
			$message = '';
             $this->load->view('staff/otp.php', ['error' => $error, 'success' => $success, 'otp' => $message]);
        }
		
        // redirect('authController');
    }
    public function admin_otp(){
        $otp = $this->input->post('otp');
        $otp1 = $this->input->post('otp_confirm');

        if($otp == $otp1){
			$this->session->set_userdata('admin_otp', $otp);
            $this->session->set_flashdata('success','Successfully Added');
            // redirect('other/dashboardController');
            redirect('dashboardController');
        }
        else
        { 
            $this->session->set_flashdata('error','Your otp is incorrect!');
			$success = '';
			$message = '';
             $this->load->view('admin/otp.php', ['success' => $success, 'otp' => $message]);
            // redirect('doctorController');
        }
        // redirect('authController');
    }
    public function password()
    {
        $this->load->view('admin/forgotPassword.php');
    }
    public function forgotPassword()
    {
         $email=$this->input->post('email');

        // $que=$this->db->query("select rpassword,email from hospital_profile where email='$email'");
        $query = $this->db->select('*')
              ->from('hospital_profile')
              ->where(['email'=>$email])
              ->get()->row();
           // $row=$query->row();  
           if (!empty($query)) {
            $que=$this->db->query("select rpassword,email from hospital_profile where email='$email'");
             
            
        $row=$que->row();
        $user_email=$row->email;
        if((!strcmp($email, $user_email)))
        {
            $pass=$row->rpassword;
            $to = $user_email;
            $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  // More headers
                  $headers .= 'From: <ens@gmail.com>' . "\r\n";
                    $from_name = "Ens Hospital";
                    $to = $user_email;;
                    $subject = 'Password';
                    $message = "Your password is $pass";
                    mail($to,$subject,$message,$headers);
                   $this->session->set_flashdata('success','Your Password is sent on your Email Address. Please check your email address');
                   redirect('authController');
        }
    }
        else
        {
            
             $this->session->set_flashdata('error1','This email is not exist');
             redirect('authController');
        }
   }

}

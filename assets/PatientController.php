<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."controllers/superadmin/SessionController.php");
class patientController extends SessionController {
    
  public function __construct()
  {
        parent::__construct();   
        $this->load->model('superadmin/patientModel'); 
        $this->load->library('Pdf');
  }
    public function index()
  {
    $generate = 'ENS/';
    $id = $this->patientModel->checkId();
    $pos = 3;
    $begin = substr($id, 0, $pos+1);
    $end = substr($id, $pos+1);
    $num= $end+1;
    //$randommember= mt_rand(1000000, 9999999);
      /*$member_id = $tgfgenerate. $randommember;
    
    if($checkmemberId > 0 ){
      $this->generatememberid();
    }*/
    $doctor = $this->patientModel->getdoctor();
    
    $this->load->view('superadmin/patient.php',['uhid'=>$generate.$num,'doctor'=>$doctor]);
    }
    public function addBill()
    {
      $uhid = $this->input->post('uhid');
      $p_id = $this->input->post('p_id');
      $email = $this->input->post('email');

      $data_array = array(
                          'email' => $email,
                          'b_status' => '1',
                          );
      if($this->patientModel->updateBill($uhid,$data_array)){
              $this->session->set_flashdata('success1','Successfully Updated');
              // echo "success";
                redirect('superadmin/patientController/patients_list');
            } 
            else
            {
              $this->session->set_flashdata('error1','Error!');
                redirect('superadmin/patientController/patients_list');
            }

    }
    public function addPatient()
    {
      $uhid = $this->input->post('uhid');
      $first_name = $this->input->post('first_name');
      $middle_name = $this->input->post('middle_name');
      $last_name = $this->input->post('last_name');
      $patient_type = $this->input->post('patient_type');

      $relative = $this->input->post('relative');
      $relative_name = $this->input->post('relative_name');

      $gender = $this->input->post('gender');
      $marital_status = $this->input->post('marital_status');
      $dob = $this->input->post('dob');
      $age = $this->input->post('age');
      $email = $this->input->post('email');

      $mobile1 = $this->input->post('mobile1');
      $mobile2 = $this->input->post('mobile2');
      $register_fee = $this->input->post('register_fee');
      $address = $this->input->post('address');
      $area = $this->input->post('area');
      $city = $this->input->post('city');
      $pincode = $this->input->post('pincode');
      $d_id = $this->input->post('doc_id');
      $a = explode(",", $d_id);
      // print_r($a);
      $doc_id = $a[0];
      $doc_email = $a[1];
      $p_name = $first_name.' '.$middle_name.' '.$last_name;
      // exit;
      
      $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
     $this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
     $this->form_validation->set_rules('patient_type', 'Patient Type', 'required');
     $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
     $this->form_validation->set_rules('relative', 'Relative', 'required');
     $this->form_validation->set_rules('relative_name', 'Relative Name', 'required|alpha');
     $this->form_validation->set_rules('gender', 'Gender', 'required');
     $this->form_validation->set_rules('dob', 'Date Of Birth', 'required');
     $this->form_validation->set_rules('age', 'Age', 'required|numeric');
      $this->form_validation->set_rules('mobile1', 'Mobile First Number', 'required|exact_length[10]|regex_match[/^[0-9]{10}$/]');
      $this->form_validation->set_rules('mobile2', 'Mobile Second Number', 'required|exact_length[10]|regex_match[/^[0-9]{10}$/]');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('register_fee', 'Register Fee', 'required|numeric');
        // $this->form_validation->set_rules('address', 'Address', 'required');
        // $this->form_validation->set_rules('area', 'Area', 'required');
        // $this->form_validation->set_rules('City', 'City', 'required');
        // // $this->form_validation->set_rules('State', 'State', 'required');
        // $this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric');
        $this->form_validation->set_error_delimiters('<div class="error" style="color:#FF0000">', '</div>');
        if($this->form_validation->run())
        {
          $data_array = array(
                            'uhid' => $uhid,
                            'first_name' => $first_name,
                            'middle_name' =>  $middle_name,
                            'last_name' => $last_name,
                            'relative' => $relative,
                            'relative_name' => $relative_name,
                            'gender' => $gender,
                            'marital_status' =>  $marital_status,
                            'dob' => $dob,
                            'age' => $age,
                            'email' => $email,
                            'mobile1' => $mobile1,
                            'mobile2' => $mobile2,
                            'register_fee'=>$register_fee,
                            'address' =>  $address,
                            'area' => $area,
                            'city' => $city,
                             // 'state' => $state,
                            'pincode' => $pincode,
                            'doctor_id' => $doc_id
                            );
          if($this->patientModel->addPatient($data_array)){
                $this->session->set_flashdata('success','Successfully Added');

                //MAIL
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  // More headers
                  $headers .= 'From: <testensmail@gmail.com>' . "\r\n";
                    $from_name = $first_name;
                    $to = $email;
                    $to_d = $doc_email;
                    $subject = 'Registration';
                    $subject_d = 'Registration of Patient';
                    $message = "Hey ".$first_name."!".'<br><br>'." Thank you for registering  as a patient!. 
                    Your unique patient Id is ".$uhid.". You can login by your unique Id on hospital portal.
                    If you have any questions, please let me know.\r\n".'<br><br><br>'."
                    Regards,".'<br>'."
                    ENS Hospital";
                    $message_d = "Hey ".$first_name."!".'<br><br>'." named patient! is registering. 
                    Unique patient Id is ".$uhid.". You can login by your User Id on hospital portal.
                    ".'<br><br><br>'."
                    Regards,".'<br>'."
                    ENS Hospital";
                    mail($to,$subject,$message,$headers);
                    
                    mail($to_d,$subject_d,$message_d,$headers);

                    // redirect('patientController');
                    // $num = $this->patientModel->checkId();
                    $num = $this->patientModel->checkId();
                    $pos = 3;
                    $begin = substr($num, 0, $pos+1);
                    $end = substr($num, $pos+1);
                    $p_id= $end;
                    $doctor = $this->patientModel->getdoctor();
                   
                    $this->load->view('superadmin/billing.php',['uhid'=>$uhid,'doctor_id'=>$doc_id,'patient_email'=>$email,'doc_email'=>$doc_email,'p_name' =>$p_name,'p_id'=>$p_id,'doctor'=>$doctor]);
              } 
              else
              {
                $this->session->set_flashdata('err','Error!');
                  redirect('superadmin/patientController');
              }
            }
            else
            {
              $errors = array('first_name'=>form_error('first_name'),'last_name'=>form_error('last_name'),'patient_type'=>form_error('patient_type'),'marital_status'=>form_error('marital_status'),'relative'=>form_error('relative'),'relative_name'=>form_error('relative_name'),'gender'=>form_error('gender'),'dob'=>form_error('dob'),'age'=>form_error('age'),'mobile1'=>form_error('mobile1'),'mobile2'=>form_error('mobile2'),'email'=>form_error('email'),'register_fee'=>form_error('register_fee'),'address'=>form_error('address'),'area'=>form_error('area'),'city'=>form_error('city'),'state'=>form_error('state'),'pincode'=>form_error('pincode'));
              $error=$this->session->set_flashdata('error', $errors);
              $this->session->set_userdata($error);
              redirect('superadmin/patientController');
            }

    }


    // public function sendEmail()
    // {
    //     //hnt 3
    // $to =  'trajnish121@gmail.com';  // User email pass here
    // $subject = 'Welcome To TestEmail';

    // $from = 'trajnish121@gmail.com';              // Pass here your mail id

    // $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    // $emailContent .='<tr><td style="height:20px"></td></tr>';


    // $emailContent .= "This is testmail";  //   Post message available here


    // $emailContent .='<tr><td style="height:20px"></td></tr>';
    // $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
                


    // $config['protocol']    = 'SFTP';
    // $config['smtp_host']    = 'home738916443.1and1-data.host';
    // $config['smtp_port']    = '22';
    // // $config['smtp_timeout'] = '60';

    // $config['smtp_user']    = 'u93694812';    //Important
    // $config['smtp_pass']    = 'W1nn1ng$$';  //Important

    // $config['charset']    = 'utf-8';
    // $config['newline']    = "\r\n";
    // $config['mailtype'] = 'html'; // or html
    // $config['validation'] = TRUE; // bool whether to validate email or not 

     

    // $this->email->initialize($config);
    // $this->email->set_mailtype("html");
    // $this->email->from($from);
    // $this->email->to($to);
    // $this->email->subject($subject);
    // $this->email->message($emailContent);
    // $this->email->send();

    // $this->session->set_flashdata('msg',"Mail has been sent successfully");
    // $this->session->set_flashdata('msg_class','alert-success');
    // return redirect('patientController');
    // // exit;
    // }


    public function pending()
    {
      $id=$_GET['id'];
      $patient = $this->patientModel->getpatients($id);
      // print_r($patient);
      foreach($patient as $patients){
        // print_r($patients);
      $uhid = $patients->uhid;
      echo $doc_id = $patients->doctor_id;
      $email = $patients->email;
      $p_name = $patients->first_name.' '.$patients->middle_name.' '.$patients->last_name;
      // $uhid = $patients->uhid;
      // $uhid = $patients->uhid;

      }
      $doc_email = $this->db->get_where('doctor',['id'=>$doc_id])->result();
      $doctor = $this->patientModel->getdoctor();
      // print_r($doc_email);
      // exit();

      $this->load->view('superadmin/billing.php',['uhid'=>$uhid,'doctor_id'=>$doc_id,'patient_email'=>$email,'doc_email'=>$doc_email,'p_name' =>$p_name,'p_id'=>$id,'doctor'=>$doctor]);
      // if($this->patientModel->getpatient($id))
      //   {
      //     $this->session->set_flashdata('success1','Successfully deleted');
      //     redirect('doctorController');
      // } 
      // else 
      // {
      //     $this->session->set_flashdata('error1','Error!');
      //     redirect('doctorController');
      // }
    }




    public function deleteDoctor()
    {
      $id=$_GET['id'];
      if($this->doctorModel->deleteDoctor($id))
        {
          $this->session->set_flashdata('success1','Successfully deleted');
          redirect('doctorController');
      } 
      else 
      {
          $this->session->set_flashdata('error1','Error!');
          redirect('doctorController');
      }
    }
    public function editDoctor()
    {
      $id=$_GET['id'];
      $stf=$this->doctorModel->editDoctor($id);
      $department = $this->doctorModel->getdepartment();
      $this->load->view('superadmin/editDoctor.php',['stf' => $stf,'department'=>$department]);

    }
    public function updateDoctor()
      {
        $id=$_GET['id'];
        $doc_name = $this->input->post('doc_name');
      $department = $this->input->post('department');
      $gender = $this->input->post('gender');
      $doc_mobile = $this->input->post('doc_mobile');
      $doc_email = $this->input->post('doc_email');
      $data_array = array(
                        'doc_name' => $doc_name,
                        'department' => $department,
                        'gender' =>  $gender,
                        'doc_mobile' => $doc_mobile,
                        'doc_email' => $doc_email
                     
                        );
        if($this->doctorModel->updateDoctor($id,$data_array)){
          $this->session->set_flashdata('success1','Successfully Updated');
            redirect('superadmin/doctorController?id='.$id);
        } 
        else
        {
          $this->session->set_flashdata('error1','Error!');
            redirect('superadmin/doctorController/editDoctor?id='.$id);
        }
  }  
  public function list()
  {
    $patient = $this->patientModel->getpatient();
    $this->load->view('superadmin/patientlist.php',['patient'=>$patient]);
  }
  public function patients_list()
  {
    $patient = $this->patientModel->getpatient();
    $this->load->view('superadmin/patient_list.php',['patient'=>$patient]);
  }
  public function view()
  {
    $id= $_GET['id'];
    $content ="<h3 style='text-align:center'>PATIENT REPORT</h3>";
    $content .= $this->patientModel->singlepatient($id);
    $this->pdf->loadHtml($content);
    $this->pdf->render();
    $this->pdf->stream("".$id.".pdf",array("Attachment"=>0));
    
  }
  public function pdfdetails()
  {
    $id= $_GET['id'];
    $content ="<h3 style='text-align:center'>PATIENT REPORT</h3>";
    $content .= $this->patientModel->singlepatient($id);
    $this->pdf->loadHtml($content);
    $this->pdf->render();
    $this->pdf->stream("".$id.".pdf",array("Attachment"=>1));

  }
  public function loadform()
  {
    $this->load->view('superadmin/message_form');
  }
  public function sendsms()
  {
    $this->form_validation->set_rules('sendTo', 'Mobile number', 'trim|required|regex_match[/^[0-9]{10}$/]');
    $this->form_validation->set_rules('message', 'Text Message', 'trim|required');

    if ($this->form_validation->run() == FALSE) 
    {
      $this->load->view('superadmin/message_form');  
    } 
    else 
    {
      $to = $this->input->post('sendTo');
      $message = $this->input->post('message');

      if($to) {

        if($this->msg91->send($to, $message) == TRUE)  {
          $this->session->set_flashdata('update_status', '
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong><i class="dripicons-checkmark"></i> Hooray!</strong> Message Sent.
          </div>');
          redirect('superadmin/patientController');
        }
         else 
         {
          $this->session->set_flashdata('update_status', '
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong><i class="dripicons-checkmark"></i> Oops!</strong> Message  not sent.
          </div>');
          redirect('superadmin/patientController');

        }
      }

      
    }

    
 }}
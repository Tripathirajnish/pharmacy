<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."controllers/SessionController.php");
class RequestController extends SessionController {
    
    public function __construct()
	{
        parent::__construct();   
		$this->load->helper('permission');
        $this->load->helper('form');
        $this->load->helper('site_helper');
        $this->load->library('Pdf');
		$this->load->model('pharmacyModel'); 
	}
    public function index()
	{      	
	    $date = date("Y-m-d H:m:s");
	    $id = $this->session->userdata('id');
		$data = $this->db->get_where('supplier', ['hospital_id' => $id])->result();
 		$this->load->view('pharmacy/request.php', ['data' => $data, 'date' => $date]);
    }
	public function returnproductlist(){
		$id = $this->session->userdata('id');
		$data = $this->db->get_where('product_return', ['hospital_id' => $id])->result();
		$this->load->view('pharmacy/productreturn.php', ['data' => $data]);
	}
	public function requestproductlist(){
		$id = $this->session->userdata('id');
		$data = $this->db->get_where('product_request', ['hospital_id' => $id])->result();
		$this->load->view('pharmacy/productrequest.php', ['data' => $data]);
	}
    public function Addrequest()
	{		   $id = $this->session->userdata('id');
	           $medicine_name = $this->input->post('medicine_name[]');
	           $quan = $this->input->post('quan[]');
	           $date = $this->input->post('date[]');
	           $supplier = $this->input->post('spl');
			   //echo $supplier; die;
			   $spl = $this->db->get_where('supplier', ['id' => $supplier])->row();
			   $zipped = array_map(null, $medicine_name, $quan, $date);
			   $output = '<table class="table table-bordered" id="item_table" style="width:80%;     margin-top: 50px;" align="center"><tbody class="cstmtbody"><tr><th>Medicin Name </th><th>Quantity</th><th>Request Date</th>
                <th>Supplier</th></tr>';
			   for($i = 0 ; $i<count($medicine_name) ; $i++) {
				$output .='<tr><td style="text-align: center;">'.$medicine_name[$i].'</td><td style="text-align: center;">'.$quan[$i].'</td><td style="text-align: center;">'.$date[$i].'</td><td style="text-align: center;">'.$supplier.'</td></tr>';
				$data = array(
				"medicine_name" => $medicine_name[$i],
				"quantity" => $quan[$i],
				"request_date" => $date[$i],
				"supplier" => $supplier,
				"hospital_id" => $id,
				);
				$result = $this->db->insert('product_request', $data);
			    }
				$output .="</tbody></table>";
               if($result){
				//print_r($output); die;
	           $to = $spl->email;//'prasadyogendra473@gmail.com';
                $subject = 'Please enter this OTP to proceed login';
                $message =  $output; //rand(100000,999999);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <hospital@gmail.com>' . "\r\n";
                mail($to,$subject,$message,$headers);
                // echo $messages = "Thank you for register";
					echo "<script>alert('Mail Sent')</script>";
					$data = $this->db->get_where('supplier', ['hospital_id' => $id])->result();
 		            $this->load->view('pharmacy/request.php', ['data' => $data, 'date' => $date]);
			   }else{
				   echo "<script>alert('Error')</script>";
				   $data = $this->db->get_where('supplier', ['hospital_id' => $id])->result();
 		          $this->load->view('pharmacy/request.php', ['data' => $data, 'date' => $date]);
			   }
    }
	public function productreturn(){
		$date = date("Y-m-d H:m:s");
	    $id = $this->session->userdata('id');
		$data = $this->db->get_where('supplier', ['hospital_id' => $id])->result();
 		$this->load->view('pharmacy/product-return.php', ['data' => $data, 'date' => $date]);
	}
	public function AddReturn(){
		  	   $id = $this->session->userdata('id');
	           $medicine_name = $this->input->post('medicine_name[]');
	           $quan = $this->input->post('quan[]');
	           $date = $this->input->post('date[]');
	           $supplier = $this->input->post('spl');
			   //echo $supplier; die;
			   $spl = $this->db->get_where('supplier', ['id' => $supplier])->row();
			   $zipped = array_map(null, $medicine_name, $quan, $date);
			   $output = '<table class="table table-bordered" id="item_table" style="width:80%;     margin-top: 50px;" align="center"><tbody class="cstmtbody"><tr><th>Medicin Name </th><th>Quantity</th><th>Request Date</th>
                <th>Supplier</th></tr>';
			   for($i = 0 ; $i<count($medicine_name) ; $i++) {
				$output .='<tr><td style="text-align: center;">'.$medicine_name[$i].'</td><td style="text-align: center;">'.$quan[$i].'</td><td style="text-align: center;">'.$date[$i].'</td><td style="text-align: center;">'.$supplier.'</td></tr>';
				$data = array(
				"medicine_name" => $medicine_name[$i],
				"quantity" => $quan[$i],
				"request_date" => $date[$i],
				"supplier" => $supplier,
				"hospital_id" => $id,
				);
				$result = $this->db->insert('product_return', $data);
			    }
				$output .="</tbody></table>";
               if($result){
				//print_r($output); die;
	           $to = $spl->email;//'prasadyogendra473@gmail.com';
                $subject = 'Please enter this OTP to proceed login';
                $message =  $output; //rand(100000,999999);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <hospital@gmail.com>' . "\r\n";
                mail($to,$subject,$message,$headers);
                // echo $messages = "Thank you for register";
					echo "<script>alert('Mail Sent')</script>";
					$data = $this->db->get_where('supplier', ['hospital_id' => $id])->result();
 		            $this->load->view('pharmacy/product-return.php', ['data' => $data, 'date' => $date]);
			   }else{
				   echo "<script>alert('Error')</script>";
				   $data = $this->db->get_where('supplier', ['hospital_id' => $id])->result();
 		          $this->load->view('pharmacy/product-return.php', ['data' => $data, 'date' => $date]);
			   }
	}
   public function repurchase(){
	   $id = $this->session->userdata('id');
	   $data = $this->db->get_where('repruchase_product', ['hospital_id' => $id])->result();
	   //print_r($data); die;
	   $this->load->view('pharmacy/repurchase_product.php', ['data' => $data]);
   }
   public function SearchSaleMedicine(){
	    $id = $this->session->userdata('id');
		$output = '';
		$search = $this->input->post('med');
		$vehicle = $this->pharmacyModel->getsalemedicine($search, $id);
		$output = '<ul class="list-unstyled">'; 
		if(isset($vehicle)) { 
		 foreach($vehicle as $vech){
			$output .='<li class="ststsmli add">'.$vech['medicine_name'].'<input type="hidden" class="hiddenid" value="'.$vech['id'].'"></li>'; 
		 }
		}else{
			$output .= '<li>Medicine not fount</li>';
		}
		$output .= '</ul>';
		echo $output;
	}
  }
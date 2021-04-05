<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."controllers/SessionController.php");
class pharmacyReportController extends SessionController {
	
	public function __construct()
	{
		parent::__construct();   
		$this->load->model('pharmacyModel'); 
		$this->load->library('Pdf');
	}
	public function index()
	{
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$categorys = $this->pharmacyModel->getcategorylist($hospital_id);
		$this->load->view('admin/addPharmacy.php', ['cat' => $categorys]);
	}
	public function sale_medicine_report()
	{	
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		// echo 'Hello'; exit();
		$this->load->view('admin/sale_medicine_report.php');

		
		
	}
	public function purchase_medicine_report()
	{
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		// echo 'Hello'; exit();
		$this->load->view('admin/purchase_medicine_reports.php');
		
		
	}
	public function ExportSale()
	{
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		// if($_POST){
			// echo 'Hello';
			if($this->input->post('year')){
				$year =	$this->input->post('year');
				// echo $year;
				$fcon = array(
	  "YEAR(created_at)" => $year
	  );
				$stock = $this->db->get_where('sale_product', $fcon)->result();
				 // echo '<pre>';print_r($data);exit();
			}


			if($this->input->post('month')){
				$month =$this->input->post('month');
				$year =	$this->input->post('year');
				$fcon = array(
	  "YEAR(created_at)" => $year,
	   "MONTH(created_at)" => $month
	  );
				$stock = $this->db->get_where('sale_product', $fcon)->result();
			}

			if($this->input->post('FromDate')){
				$FromDate =$this->input->post('FromDate');
				$Todate =	$this->input->post('Todate');
				$fcon = array(
	  "YEAR(created_at)" => $FromDate,
	   "MONTH(created_at)" => $Todate
	  );
				$stock = $this->db->get_where('sale_product', ['created_at' <=  $FromDate && 'created_at' >= $Todate ])->result();
			}
		// }


		// echo '<pre>';print_r($stock);
		// exit();
			$export_data[] =  array(
			'Name',
			'Email',
			'Phone',
			'Address',
			'Medicine Name',
			'Medicine Quantity',
			'Price'
// 'export'
		);
    // if(isset($stock)){
		foreach ($stock as $row =>$value) {
			$name = $value->name;
			$email = $value->email;
			$phone = $value->phone;
			$address = $value->address;
			$medicine_name = $value->medicine_name;
			$quantity = $value->quantity;
			$total_price = $value->total_price;
			$export_data[] = array($name,$email,$phone,$address,$medicine_name,$quantity,$total_price);
		}
		
		$filename = 'export.csv';
		$file = fopen($filename, 'w');
    //echo $file;
		foreach ($export_data as $key) {
			fputcsv($file, $key);
		}
		fclose($file);
		header('Content-Type: application/csv');
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=".$filename);
		error_reporting(0);
		readfile($filename);
		redirect('pharmacyReportController/sale_medicine_report');
	} 
	public function ExportPurchase()
	{
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		if($this->input->post('year')){
				$year =	$this->input->post('year');
				// echo $year;
				$fcon = array(
	  "YEAR(created_at)" => $year
	  );
				$stock = $this->db->get_where('purchase_medicine', $fcon)->result();
				 // echo '<pre>';print_r($stock);exit();
			}


			if($this->input->post('month')){
				$month =$this->input->post('month');
				$year =	$this->input->post('year');
				$fcon = array(
	  "YEAR(created_at)" => $year,
	   "MONTH(created_at)" => $month
	  );
				$stock = $this->db->get_where('purchase_medicine', $fcon)->result();
			}

			if($this->input->post('FromDate')){
				$FromDate =$this->input->post('FromDate');
				$Todate =	$this->input->post('Todate');
				$fcon = array(
	  "YEAR(created_at)" => $FromDate,
	   "MONTH(created_at)" => $Todate
	  );
				$stock = $this->db->get_where('purchase_medicine', ['created_at' <=  $FromDate && 'created_at' >= $Todate ])->result();
			}
		// }


		// echo '<pre>';print_r($stock);
		// exit();
			$export_data[] =  array(
			'Invoice_no',
			'Purchase_date',
			'Supplier',
			'Medicine_id',
			'Quantity',
			'Purchase_price',
			'Sale_price',
			'Total_price',
			'Expiry_date',
// 'export'
		);
    // if(isset($stock)){
		foreach ($stock as $row =>$value) {
			$invoice_no = $value->invoice_no;
			$purchase_date = $value->purchase_date;
			$supplier = $value->supplier;
			$medicine_id = $value->medicine_id;
			$quantity = $value->quantity;
			$purchase_price = $value->purchase_price;
			$sale_price = $value->sale_price;
			$total_price = $value->total_price;
			$expiry_date = $value->expiry_date;
			$export_data[] = array($invoice_no,$purchase_date,$supplier,$medicine_id,$quantity,$purchase_price,$sale_price,$total_price,$expiry_date);
		}
		
		$filename = 'export.csv';
		$file = fopen($filename, 'w');
    //echo $file;
		foreach ($export_data as $key) {
			fputcsv($file, $key);
		}
		fclose($file);
		header('Content-Type: application/csv');
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=".$filename);
		error_reporting(0);
		readfile($filename);
		redirect('pharmacyReportController/purchase_medicine_report');
	}



	
	  
	public function productList()
	{
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$date = date("Y-m-d");
		$data = $this->db->get_where('product', ['expiry_date <' => $date, 'hospital_id' => $hospital_id])->result();
		
		foreach($data as $dat){
			$id = $dat->id;
			
			$mid = $dat->medicine_id;
			$managedata = $this->db->get_where('product_manage', ['id' => $mid, 'hospital_id' => $hospital_id])->row();
			$managequan = $managedata->medicine_quantity - $dat->quantity;
			$manage_data = array(
				'medicine_quantity' => $managequan,
			);
			$array_data = array(
				'status' => 1,
				'quantity' => 0,
			);
			
			$updatemp = $this->pharmacyModel->updatemedicine($id, $array_data);
			if($updatemp){
				$updatempmanage = $this->pharmacyModel->updatemanageedicine($mid, $manage_data);
			}
		}
		$product=$this->pharmacyModel->productList($hospital_id);
		$this->load->view('superadmin/product.php',['product'=>$product]);
	}
	
	public function stock()
	{
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$date = date("Y-m-d");
		$data = $this->db->get_where('product', ['expiry_date <' => $date, 'hospital_id' => $hospital_id])->result();
		
		foreach($data as $dat){
			$id = $dat->id;
			
			$mid = $dat->medicine_id;
			$managedata = $this->db->get_where('product_manage', ['id' => $mid, 'hospital_id' => $hospital_id])->row();
			$managequan = $managedata->medicine_quantity - $dat->quantity;
			$manage_data = array(
				'medicine_quantity' => $managequan,
			);
			$array_data = array(
				'status' => 1,
				'quantity' => 0,
			);
			
			$updatemp = $this->pharmacyModel->updatemedicine($id, $array_data);
			if($updatemp){
				$updatempmanage = $this->pharmacyModel->updatemanageedicine($mid, $manage_data);
			}
		}
		$stock = $this->pharmacyModel->stockList($hospital_id);
		$this->load->view('superadmin/addStock.php',['stock' => $stock]);
	} 

	public function Category(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$categorys = $this->pharmacyModel->getcategorylist($hospital_id);
		$this->load->view('superadmin/addcotegory.php', ['category' => $categorys]);
	}
	public function addCategory(){
		if($this->input->post('hospital_id')){
			$hospital_id = $this->input->post('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$this->form_validation->set_rules('cname', 'Category Name', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:#FF0000">', '</div>');
		if($this->form_validation->run())
		{
			
			$array_data = array(
				"category_name" => $this->input->post('cname'),
				"hospital_id" => $hospital_id,
			);
			if($this->pharmacyModel->addcategory($array_data)){
				$this->session->set_flashdata('success','Successfully Added');
				redirect('superadmin/pharmacyController/Category');
			}else{
				$this->session->set_flashdata('error','Error!');
				redirect('superadmin/pharmacyController/Category');
			}
		}
		else
		{
			$errors = array('cname'=>form_error('cname'));
			$error=$this->session->set_flashdata('error1', $errors);
			$this->session->set_userdata($error);
			redirect('superadmin/pharmacyController/Category');
		}
	}
	
	public function editCategory(){
		$id = $_GET['id'];
		$category = $this->pharmacyModel->getcategorybyId($id);
		
		$this->load->view('superadmin/editcategory.php', ['categorys' => $category]);
	}
	public function Updatecategory(){
		$id= $this->input->post('id');
		$this->form_validation->set_rules('cname', 'Category Name', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:#FF0000">', '</div>');
		if($this->form_validation->run())
		{
			$array_data = array(
				"category_name" => $this->input->post('cname'),
			);
			if($this->pharmacyModel->updatecategory($array_data, $id)){
				$this->session->set_flashdata('success','Successfully Updated');
				redirect('superadmin/pharmacyController/Category');
			}else{
				$this->session->set_flashdata('error','Error!');
				redirect('superadmin/pharmacyController/editCategory?id='.$id);
			}
		}
		else
		{
			$errors = array('cname'=>form_error('cname'));
			$error=$this->session->set_flashdata('error1', $errors);
			$this->session->set_userdata($error);
			redirect('superadmin/pharmacyController/editCategory?id='.$id);
		}
	}
	public function deleteCategory(){
		$id= $_GET['id'];
		if($this->pharmacyModel->deleteCategory($id))
		{
			$this->session->set_flashdata('success1','Successfully deleted');
			redirect('superadmin/pharmacyController/Category');
		} 
		else 
		{
			$this->session->set_flashdata('error1','Error!');
			redirect('superadmin/pharmacyController/Category');
		}
	}
	public function categorylist(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$categorys = $this->pharmacyModel->getcategorylist($hospital_id);        
		$this->load->view('pharmacy/medicinecategorylist.php', ['category' => $categorys]);
	}
	public function Searchmedicine(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$output = '';
		$search = $this->input->post('med');
		$vehicle = $this->pharmacyModel->getmedicine($search, $hospital_id);
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
	public function salemedicine(){
		$this->load->view('superadmin/salemedicine.php');
	}
	public function SearchSaleMedicine(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$output = '';
		$search = $this->input->post('med');
		$vehicle = $this->pharmacyModel->getsalemedicine($search, $hospital_id);
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
	public function updatesalemedicine(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$hid = $this->input->post('hid[]');
		$medicine_name = $this->input->post('medicine_name[]');
		$cquan = $this->input->post('cquan[]');
		$cprice = $this->input->post('cprice[]');
		$ctotalprice = $this->input->post('ctotalprice[]');
		$this->form_validation->set_rules('name', 'Patient Name', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[sale_product.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|exact_length[10]|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('address', 'Address', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:#FF0000">', '</div>');
		if($this->form_validation->run())
		{
			$multiarray = array_map(null, $medicine_name, $cquan, $cprice, $ctotalprice);
			$array = array_combine($hid, $cquan);
			foreach($array as $key => $value){
				$getdata = $this->pharmacyModel->getmedicineById($key);
				$getmanagequan = $this->pharmacyModel->getQuantityFromProductManage($key);
				if($getmanagequan->medicine_quantity >= $value){
					$managereduce = $getmanagequan->medicine_quantity - $value;
					$id = $getmanagequan->id;
					$datam_array = array(
						'medicine_quantity' => $managereduce,
					);
					$result = $this->pharmacyModel->updatemedicinequantitymanage($id, $datam_array);
					if($result){
						
						$remainquan = '';
						$reducequan = '';
						
						foreach($getdata as $data){
							
							if($remainquan == ''){
								if($value>$data->quantity){
									$remainquan = $value - $data->quantity;
									$reducequan = 0;
								}else{
									$remainquan = 'test';
									$reducequan =  $data->quantity - $value;
								}
								$id = $data->id;
								$data_array = array(
									'quantity' => $reducequan,
								);
								$result = $this->pharmacyModel->updatemedicinequantity($id, $data_array);
							}elseif($remainquan != '' && $remainquan != 'test'){
								if($remainquan>$data->quantity){
									$remainquan = $remainquan - $data->quantity;
									$reducequan = 0;
								}elseif($remainquan){
									$reducequan =  $data->quantity - $remainquan;
								}
								$id = $data->id;
								$data_array = array(
									'quantity' => $reducequan,
								);
								$result = $this->pharmacyModel->updatemedicinequantity($id, $data_array);
							}
							
						}
					}
				}
			}
			if($result){
				$arra_data = array(
					"medicine_name" => json_encode($this->input->post('medicine_name[]')),
					"quantity" => json_encode($this->input->post('cquan[]')),
					"price" => json_encode($this->input->post('cprice[]')),
					"total_price" => json_encode($this->input->post('ctotalprice[]')),
					"name" => $this->input->post('name'),
					"email" => $this->input->post('email'),
					"phone" => $this->input->post('phone'),
					"address" => $this->input->post('address'),
					"grandtotal" => $this->input->post('grandtotal'),
					"discount" => $this->input->post('discount'),
					"dnarration" => $this->input->post('dnarration'),
				);
				if($this->pharmacyModel->addpatient_details($arra_data)){
					$patientdata = $this->pharmacyModel->getpatientDetails();
					$phono = $this->db->get_where('hospital_profile', ['id' => $hospital_id])->row();
					echo "<script>alert('Medicine Paper Generated Successfully')</script>";
					$this->load->view('superadmin/medicine-report.php', ['patientdatas' => $patientdata, 'phonos' => $phono ]);
				}else{
					$this->session->set_flashdata('error','Error!');
					redirect('superadmin/pharmacyController/salemedicine');
				}
			} 
			else 
			{
				$this->session->set_flashdata('error','Error!');
				redirect('superadmin/pharmacyController/salemedicine');
			}
		}
		else
		{
			$errors = array('name'=>form_error('name'),'address'=>form_error('address'),'phone'=>form_error('phone'),'email'=>form_error('email'));
			$error=$this->session->set_flashdata('error1', $errors);
			$this->session->set_userdata($error);
			redirect('superadmin/pharmacyController/salemedicine');
		}					
	}
	
	public function CheckAvailablity(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$id = $this->input->post('id');
		$quan = $this->input->post('quan');
		$madicinequan = $this->pharmacyModel->checAvailablity($id, $hospital_id);
		$madicineprice = $this->pharmacyModel->getMedicinePrice($id, $hospital_id);
		//print_r($madicinequan); die;
		if($madicinequan){
			if($madicinequan->medicine_quantity >= $quan){
				$output = '<ul class="list-unstyled">'; 
				$output .='<input type="hidden" class="cstmsalemname" value="'.$madicinequan->medicine_name .'"><input type="hidden" class="cstmsalemid" value="'.$madicinequan->id .'"><input type="hidden" class="cstmsalemquan" value="'.$quan .'"><input type="hidden" class="cstmsalemprice" value="'.$madicineprice->sale_price .'">'; 
				$output .= '</ul>';
				echo $output;
			}else{
				$output = '';
				echo $output;
			}
		}else{
			$output = 1;
			echo $output;
		}
		
		
	}
	public function expirymedicine(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$date = date("Y-m-d");
		$data = $this->db->get_where('product', ['expiry_date <' => $date, 'hospital_id' => $hospital_id])->result();
		
		foreach($data as $dat){
			$id = $dat->id;
			
			$mid = $dat->medicine_id;
			$managedata = $this->db->get_where('product_manage', ['id' => $mid, 'hospital_id' => $hospital_id])->row();
			$managequan = $managedata->medicine_quantity - $dat->quantity;
			$manage_data = array(
				'medicine_quantity' => $managequan,
			);
			$array_data = array(
				'status' => 1,
				'quantity' => 0,
			);
			
			$updatemp = $this->pharmacyModel->updatemedicine($id, $array_data);
			if($updatemp){
				$updatempmanage = $this->pharmacyModel->updatemanageedicine($mid, $manage_data);
			}
		}
		$expiry = $this->pharmacyModel->getExpiryData($hospital_id);
		$this->load->view('superadmin/expiry-data-list.php', ['expdata' => $expiry]);
	}
	// public function Export_medicin()
	// {
	// 	if($this->session->userdata('hospital_id')){
	// 		$hospital_id = $this->session->userdata('hospital_id');
	// 	}else{
	// 		$hospital_id = $this->session->userdata('session_id'); 
	// 	}
	// 	$date = date("Y-m-d");
	// 	$data = $this->db->get_where('product', ['expiry_date <' => $date, 'hospital_id' => $hospital_id])->result();
		
	// 	foreach($data as $dat){
	// 		$id = $dat->id;
			
	// 		$mid = $dat->medicine_id;
	// 		$managedata = $this->db->get_where('product_manage', ['id' => $mid, 'hospital_id' => $hospital_id])->row();
	// 		$managequan = $managedata->medicine_quantity - $dat->quantity;
	// 		$manage_data = array(
	// 			'medicine_quantity' => $managequan,
	// 		);
	// 		$array_data = array(
	// 			'status' => 1,
	// 			'quantity' => 0,
	// 		);
			
	// 		$updatemp = $this->pharmacyModel->updatemedicine($id, $array_data);
	// 		if($updatemp){
	// 			$updatempmanage = $this->pharmacyModel->updatemanageedicine($mid, $manage_data);
	// 		}
	// 	}
	// 	$stock = $this->pharmacyModel->stockList($hospital_id);
	// 	$this->export($stock);
	// 	redirect('superadmin/pharmacyController/stock');
 //    // echo '<pre>'; print_r($stock); exit();
 //    // $this->load->view('superadmin/addStock.php',['stock' => $stock]);
		
	// // $this->load->view('superadmin/addStock.php',['stock' => $stock]);
	// }

	public function export($stock)
	{
		error_reporting(0);
		$export_data[] =  array(
			'Id',
			'Medicine Name',
			'Medicin Quantity',
			'Date'
// 'export'
		);
    // if(isset($stock)){
		foreach ($stock as $row =>$value) {
			$id = $value->id;
			$medicine_name = $value->medicine_name;
			$medicine_quantity = $value->medicine_quantity;
			$date = $value->updated_at;
			$export_data[] = array($id,$medicine_name,$medicine_quantity,$date);
		}
		
		$filename = 'export.csv';
		$file = fopen($filename, 'w');
    //echo $file;
		foreach ($export_data as $key) {
			fputcsv($file, $key);
		}
		fclose($file);
		header('Content-Type: application/csv');
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=".$filename);
		readfile($filename);
	// }
	}
	public function medicineBill(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
		$time = $dateTime->format("d/m/y  H:i A"); 
		$patient = $this->db->get_where('patient', ['hospital_id' => $hospital_id])->result();
		$doctor = $this->db->get_where('doctor', ['hospital_id' => $hospital_id])->result();
		$category = $this->db->get_where('category', ['hospital_id' => $hospital_id])->result();
		$this->load->view('superadmin/generatemedicinebill.php', ['time' => $time, 'patient' => $patient, 'doctor' => $doctor, 'category' => $category]);
	}
	public function selectdoctor(){
		if($this->session->userdata('hospital_id')){
			$hospital_id = $this->session->userdata('hospital_id');
		}else{
			$hospital_id = $this->session->userdata('session_id'); 
		}
		$ptype = $this->input->post('ptype');
		$patient = $this->db->get_where('opd', ['hospital_id' => $hospital_id, 'patient_id' => $ptype])->row();
		if($patient){
			$doctor = $this->db->get_where('doctor', ['id' => $patient->doctor_id])->row();
			echo $doctor->doc_name;
		}else{
			$patient = $this->db->get_where('ipd', ['hospital_id' => $hospital_id, 'patient_id' => $ptype])->row(); 
			if($patient){
				$doctor = $this->db->get_where('doctor', ['id' => $patient->doctor_id])->row();
				echo $doctor->doc_name;
			}else{
				echo "";
			}
			
		}
	//print_r($patient);
	}
	public function getcategory(){
		$medcat = $this->input->post('medcat');
		$product = $this->db->get_where('product', ['category' => $medcat])->result();
		$output = '';
		foreach($product as $prod){
			$output .='<option value="'.$prod->id.'">'.$prod->medicine_name.'</option>';
		}
		echo $output;
	}
}
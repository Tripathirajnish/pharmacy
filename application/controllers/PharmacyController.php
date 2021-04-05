<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."controllers/SessionController.php");
class pharmacyController extends SessionController {
    
  public function __construct()
	{
        parent::__construct();   
        $this->load->model('pharmacyModel'); 
        $this->load->library('Pdf');
	}
  public function index()
  {
	 $hospital_id = $this->session->userdata('id');
     $categorys = $this->pharmacyModel->getcategorylist($hospital_id);
     $this->load->view('pharmacy/addPharmacy.php', ['cat' => $categorys]);
  }
  public function addmedicine()
  {
	    $hospital_id = $this->session->userdata('id');
		//echo $hospital_id; die;
        $code = $this->input->post('code');
   		$name = $this->input->post('name');
   		$formulation = $this->input->post('formulation');
   		$p_price = $this->input->post('p_price');
   		$sale_price = $this->input->post('sale_price');
   		$d_price = $this->input->post('d_price');
   		$quantity = $this->input->post('quantity');
   		$category = $this->input->post('category');
   		$purchase_date = $this->input->post('purchase_date');
   		$expiry_date = $this->input->post('expiry_date');
        $supplier=$this->input->post('supplier_name');
        $unit=$this->input->post('unit');
        $manufactured_name=$this->input->post('manufactured_name');
        $batch_no=$this->input->post('batch_no');
        $hid = $this->input->post('hid');
			$this->form_validation->set_rules('code', 'Medicine Code', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('name', 'Medicine Name', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('formulation', 'Medicine formulation', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('category', 'Medicine Category', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('unit', 'Unit', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('manufactured_name', 'Manufactured Name', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('batch_no', 'Batch No', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
		$this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required|regex_match["^[a-zA-Z0-9\\s]*$"]');
   		$this->form_validation->set_rules('p_price', 'Purchase Price', 'required|numeric');
   		$this->form_validation->set_rules('sale_price', 'Sale Price', 'required|numeric');
   		$this->form_validation->set_rules('d_price', 'Discount Price', 'required|numeric');
   		$this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
   		$this->form_validation->set_rules('purchase_date', 'Purchase Date', 'required');
   		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
   		$this->form_validation->set_error_delimiters('<div class="error" style="color:#FF0000">', '</div>');
   		if($this->form_validation->run())
   		{
		$checkm = $this->db->get_where('product_manage', ['id' => $hid])->row();
		   if(!$checkm){
			   $data_array = array(
	                      'medicine_name' => $name,
                          'hospital_id'=>$hospital_id,
                          'medicine_quantity' => $quantity,
                    );
			$result = $this->pharmacyModel->addProductmanage($data_array);
		   }else{
			   $oldquan = $checkm->medicine_quantity + $quantity;
			   $data_array = array(
					  'medicine_quantity' => $oldquan,
					  'updated_at' => date('Y-m-d'),
                      );
			$result = $this->pharmacyModel->updateProductmanage($data_array, $hid);
		   }
		    if( $hid){ $hid = $this->input->post('hid'); }else{
				$getlastid = $this->pharmacyModel->getlastIdBydescOrd();
				$hid = $getlastid->id; 
			}
        if($result){
   		    $data_array = array(
	                      'medicine_code' => $code,
	                      'medicine_id' => $hid,
	                      'medicine_name' => $name,
	                      'formulation' =>  $formulation,
	                      'p_price' => $p_price,
	                      'sale_price' => $sale_price,
	                      'quantity'=>$quantity,
	                      'category'=>$category,
                          'supplier'=>$supplier,
                          'unit'=>$unit,
                          'd_price'=>$d_price,
                          'purchase_date'=>$purchase_date,
                          'expiry_date'=>$expiry_date,
                          'manufacture_date'=>$manufactured_name,
                          'batch_no'=>$batch_no,
                          'hospital_id'=>$hospital_id,
                    );
		   if($this->pharmacyModel->addProduct($data_array)){
			   $this->session->set_flashdata('success','Successfully Added');
				redirect('pharmacyController');
		    } 
		   else
			{
				$this->session->set_flashdata('error','Error!');
				redirect('pharmacyController');
			}
	    }else{
			$this->session->set_flashdata('error','Error!');
			redirect('pharmacyController');
			
		}
		}
		else
		{
		    $errors = array('code'=>form_error('code'),'name'=>form_error('name'),'formulation'=>form_error('formulation'),'category'=>form_error('category'),'unit'=>form_error('unit'),'manufactured_name'=>form_error('manufactured_name'),'batch_no'=>form_error('batch_no'),'supplier_name'=>form_error('supplier_name'),'p_price'=>form_error('p_price'),'sale_price'=>form_error('sale_price'),'d_price'=>form_error('d_price'),'quantity'=>form_error('quantity'),'purchase_date'=>form_error('purchase_date'),'expiry_date'=>form_error('expiry_date'));
			$error=$this->session->set_flashdata('error1', $errors);
		    $this->session->set_userdata($error);
		    redirect('pharmacyController');
		}
     
    }
      
  public function productList()
  {
	$hospital_id = $this->session->userdata('id');
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
    $this->load->view('pharmacy/product.php',['product'=>$product]);
  }
 
  public function stock()
  {
	 // echo "test"; die;
	$hospital_id = $this->session->userdata('id');
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
    $this->load->view('pharmacy/addStock.php',['stock' => $stock]);
  } 

    public function Category(){
		$hospital_id = $this->session->userdata('id');
		$categorys = $this->pharmacyModel->getcategorylist($hospital_id);
		$this->load->view('pharmacy/addcotegory.php', ['category' => $categorys]);
    }
	public function addCategory(){
		$hospital_id = $this->session->userdata('id');
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
      		    redirect('pharmacyController/Category');
		}else{
			$this->session->set_flashdata('error','Error!');
      		    redirect('pharmacyController/Category');
		}
		}
		else
		{
		    $errors = array('cname'=>form_error('cname'));
			$error=$this->session->set_flashdata('error1', $errors);
		    $this->session->set_userdata($error);
		    redirect('pharmacyController/Category');
		}
	}
	public function editCategory(){
		$id = $_GET['id'];
		$category = $this->pharmacyModel->getcategorybyId($id);
		$this->load->view('pharmacy/editcategory.php', ['categorys' => $category]);
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
      		    redirect('pharmacyController/Category');
		}else{
			$this->session->set_flashdata('error','Error!');
      		    redirect('pharmacyController/editCategory?id='.$id);
		}
		}
		else
		{
		    $errors = array('cname'=>form_error('cname'));
			$error=$this->session->set_flashdata('error1', $errors);
		    $this->session->set_userdata($error);
		    redirect('pharmacyController/editCategory?id='.$id);
		}
	}
	public function deleteCategory(){
		$id= $_GET['id'];
  	if($this->pharmacyModel->deleteCategory($id))
    	{
      	$this->session->set_flashdata('success1','Successfully deleted');
      	redirect('pharmacyController/Category');
 		} 
 		else 
 		{
    		$this->session->set_flashdata('error1','Error!');
      	redirect('pharmacyController/Category');
  	}
	}
	public function Searchmedicine(){
		$hospital_id = $this->session->userdata('id');
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
		$this->load->view('pharmacy/salemedicine.php');
	}
	public function SearchSaleMedicine(){
		$hospital_id = $this->session->userdata('id');
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
		$hospital_id =  $this->session->userdata('id');
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
					  );
					  if($this->pharmacyModel->addpatient_details($arra_data)){
						 $patientdata = $this->pharmacyModel->getpatientDetails();
						 $phono = $this->db->get_where('hospital_profile', ['id' => $hospital_id])->row();
						echo "<script>alert('Medicine Paper Generated Successfully')</script>";
						$this->load->view('pharmacy/medicine-report.php', ['patientdatas' => $patientdata, 'phonos' => $phono ]);
					  }else{
						  $this->session->set_flashdata('error','Error!');
					    redirect('pharmacyController/salemedicine');
					  }
					} 
					else 
					{
						$this->session->set_flashdata('error','Error!');
					    redirect('pharmacyController/salemedicine');
					}
    }
	else
	{
		$errors = array('name'=>form_error('name'),'address'=>form_error('address'),'phone'=>form_error('phone'),'email'=>form_error('email'));
		$error=$this->session->set_flashdata('error1', $errors);
		$this->session->set_userdata($error);
		redirect('pharmacyController/salemedicine');
	}					
	}
	
	public function CheckAvailablity(){
		$hospital_id = $this->session->userdata('id');
		
		$id = $this->input->post('id');
		$quan = $this->input->post('quan');
		$madicinequan = $this->pharmacyModel->checAvailablity($id, $hospital_id);
		$madicineprice = $this->pharmacyModel->getMedicinePrice($id, $hospital_id);
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
		$hospital_id = $this->session->userdata('id');
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
		$this->load->view('pharmacy/expiry-data-list.php', ['expdata' => $expiry]);
	}
	public function nearExpirymedicine(){
				$hospital_id = $this->session->userdata('id');
	    $dates = date("Y-m-d");
		$date = new DateTime($dates);
		$month = $date->format('m') + 1;

       $nwdate= $date->format('Y-' . $month . '-d');
		// $nwdate = date("Y-(m-1)-d");
		// print_r($date);
		// print_r($nwdate);
		// exit();
		$data = $this->db->get_where('product', ['expiry_date <' => $nwdate,'expiry_date >' => $dates, 'hospital_id' => $hospital_id])->result();
		$data1 = $this->db->get_where('purchase_medicine', ['expiry_date <' => $nwdate,'expiry_date >' => $dates, 'hospital_id' => $hospital_id])->result();
		$data2 = $this->db->select('product.*, purchase_medicine.*')
						  ->from('product')
						  ->join('purchase_medicine','product.hospital_id = purchase_medicine.hospital_id')
						  ->where(['product.expiry_date <' => $nwdate,'product.expiry_date >' => $dates, 'product.hospital_id' => $hospital_id])
						  ->where(['purchase_medicine.expiry_date <' => $nwdate,'purchase_medicine.expiry_date >' => $dates, 'purchase_medicine.hospital_id' => $hospital_id])
						  ->get()->result();
		// echo $this->db->last_query();
		// echo '<pre>';print_r($data);
		// echo '<pre>'; print_r($data1);
		// echo '<pre>'; print_r($data2);
		// exit();

		$this->load->view('pharmacy/near_expiry_data_list.php', ['expdata' => $data]);
	}
	public function supplier(){
		$hospital_id = $this->session->userdata('id');
		$supplier = $this->db->get_where('supplier', ['hospital_id' => $hospital_id])->result();
		$this->load->view('pharmacy/addsupplier.php', ['suppliers' => $supplier]);
	}
	public function addsupplier(){
		$hospital_id = $this->session->userdata('id');
		$data = array(
		"name" => $this->input->post('name'),
		"email" => $this->input->post('email'),
		"contact_no" => $this->input->post('contact_no'),
		"address" => $this->input->post('address'),
		"hospital_id" => $hospital_id
        );
      
	 if($this->db->insert('supplier', $data)){
		 echo "<script>alert('Supplier Added')</script>";
	     $supplier = $this->db->get_where('supplier', ['hospital_id' => $hospital_id])->result();
		$this->load->view('pharmacy/addsupplier.php', ['suppliers' => $supplier]); 
	 }
}
public function editsupplier(){
		 $id = $_GET['id'];
		 $supplier = $this->db->get_where('supplier', ['id' => $id])->row();
		$this->load->view('pharmacy/editsupplier.php', ['supplier' => $supplier]); 


	 }
   public function updategategory(){
	   $hospital_id = $this->session->userdata('id');
	   $sid = $this->input->post('sid');
	   $data = array(
		"name" => $this->input->post('name'),
		"email" => $this->input->post('email'),
		"contact_no" => $this->input->post('contact_no'),
		"address" => $this->input->post('address'),
        );
		$this->db->where('id', $sid)
                 ->update('supplier', $data);
                $result = $this->db->affected_rows();
				if($result){
					$this->session->set_flashdata('success1','Update Successfully');
                    	redirect('pharmacyController/supplier');
				}else{
					$this->session->set_flashdata('error','Error!');
      	              redirect('pharmacyController/editsupplier');
				}
   }
  public function deletesupplier(){
		$id= $_GET['id'];
			$this->db->delete('supplier', array('id' => $id));
            $result = $this->db->affected_rows();
  	if($result)
    	{
      	$this->session->set_flashdata('success1','Successfully deleted');
      	redirect('pharmacyController/supplier');
 		} 
 		else 
 		{
    		$this->session->set_flashdata('error1','Error!');
      	redirect('pharmacyController/supplier');
  	    }
    }
   public function pharmacy(){
	  $hospital_id = $this->session->userdata('id');
	  $bill = $this->db->get_where('bill_generate', ['hospital_id' => $hospital_id])->result();
	  $this->load->view('pharmacy/pharmacy.php', ['bill' => $bill]);
   }
  public function pharmacymedicine(){
	  $hospital_id = $this->session->userdata('id');
	  $purchase = $this->db->get_where('purchase_medicine', ['hospital_id' => $hospital_id])->result();
	 $this->load->view('pharmacy/medcinepharmacy.php', ['purchase' => $purchase]);
  }
  public function medicineBill(){
	  	$hospital_id = $this->session->userdata('id');
		$bill = $this->pharmacyModel->getbillno($hospital_id);
		$rnd = rand(1000,9999);
		$rand = '#'.$rnd;
		if($bill){ $bill_no = $rand.$bill->id; }else{$bill_no = $rand; }
		$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
       $time = $dateTime->format("d/m/y  H:i A"); 
	  $patient = $this->db->get_where('patient', ['hospital_id' => $hospital_id])->result();
	  $doctor = $this->db->get_where('doctor', ['hospital_id' => $hospital_id])->result();
	  $category = $this->db->get_where('category', ['hospital_id' => $hospital_id])->result();
	  $this->load->view('pharmacy/generatemedicinebill.php', ['time' => $time, 'patient' => $patient, 'doctor' => $doctor, 'category' => $category, 'bill' => $bill_no]);
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
  public function getproductdetails(){
	  $medicine = $this->input->post('medname');
	   $data = $this->db->get_where('product', ['id' => $medicine])->row();
	   $quan = $this->db->get_where('product_manage', ['id' => $data->medicine_id])->row();
	 $output ='<input type="hidden" value="'.$data->batch_no .'" class="cbatch_no"><input type="hidden" value="'.$quan->medicine_quantity .'" class="cavalablequan"><input type="hidden" value="'.$data->expiry_date .'" class="cexpdate"><input type="hidden" value="'.$data->sale_price .'" class="cprice">';

 echo $output;
  }
 
  public function addsalemedicine(){
	  	$hospital_id = $this->session->userdata('id');
		$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
		$time = $dateTime->format("d/m/y  H:i A"); 
		$patient = $this->db->get_where('patient', ['hospital_id' => $hospital_id])->result();
		$doctor = $this->db->get_where('doctor', ['hospital_id' => $hospital_id])->result();
		$category = $this->db->get_where('category', ['hospital_id' => $hospital_id])->result();
		  $name = $this->input->post('name');
		  $bill_no = $this->input->post('bill');
		  $hdoctor = $this->input->post('hdoctor');
		  $tax = $this->input->post('tax');
		  $doctor = $this->input->post('doctor');
		  $tdate = $this->input->post('tdate');
		  $grandtotal = $this->input->post('grandtotal');
		  $discount = $this->input->post('discount');
		  $finalpay = $this->input->post('finalpay');
		  $dnarration = $this->input->post('dnarration');
		  $mcat = $this->input->post('mcat[]');
		  $mname = $this->input->post('mname[]');
		  $bno = $this->input->post('bno[]');
		  $expdate = $this->input->post('expdate[]');
		  $medprice = $this->input->post('medprice[]');
		  $medquan = $this->input->post('medquan[]');
		  $tprice = $this->input->post('tprice[]');
			$zipped = array_map(null, $mcat, $mname, $bno, $expdate, $medprice, $medquan, $tprice);
			for($i = 0 ; $i<count($mcat) ; $i++) {
				$med = $this->db->get_where('product', ['id' => $mname[$i]])->row();
				$quan = $this->db->get_where('product_manage', ['id' => $med->medicine_id])->row();
				$remainingquan = $quan->medicine_quantity - $medquan[$i];
				 $id = $med->medicine_id;
				 $this->db->where('id', $id)
                 ->update('product_manage', ['medicine_quantity' => $remainingquan]);
                $result = $this->db->affected_rows();
				if($result){
					$data = array(
					'patient_id' => $name,
					'hospital_doctor' => $hdoctor,
					'doctor' => $doctor,
					'bill_no' => $bill_no,
					'sale_date' => $tdate,
					'grandtotal' => $grandtotal,
					'discount' => $discount,
					'finalpay' => $finalpay,
					'dnarration' => $dnarration,
					'quantity' => $medquan[$i],
					'price' => $medprice[$i],
					'total_price' => $tprice[$i],
					'batch_no' => $bno[$i],
					'expiry_date' => $expdate[$i],
					'medicine_id' => $mname[$i],
					'category_id' => $mcat[$i],
					'hospital_id' => $hospital_id,
					'tax' => $tax,
					);
					$result = $this->db->insert('bill_generate', $data);
					
				}
				}
				if($result){
						echo "<script>alert('Bill Generated')</script>";
					  $this->load->view('pharmacy/medicine_bill-report.php', ['mname' =>$mname, 'bno' => $bno, 'expdate' => $expdate, 'medprice' => $medprice, 'medquan' => $medquan, 'tprice' => $tprice, 'tdate' => $tdate, 'patient' => $name, 'doctor' => $doctor, 'grandtotal' => $grandtotal, 'discount' => $discount, 'finalpay' => $finalpay, 'dnarration' => $dnarration, 'tax' => $tax, 'bill' => $bill_no]);
					}else{
						echo "<script>alert('Error')</script>";
					  $this->load->view('pharmacy/generatemedicinebill.php', ['time' => $time, 'patient' => $patient, 'doctor' => $doctor, 'category' => $category]);
					}
	 }
   public function purchasemedicine(){
	   	$hospital_id = $this->session->userdata('id');
		$invoice = $this->pharmacyModel->getinvoiceno($hospital_id);
		$rnd = rand(1000,9999);
		$rand = '#'.$rnd;
		if($invoice){ $invoice_no = $rand.$invoice->id; }else{$invoice_no = $rand; }
		
		$category = $this->db->get_where('category', ['hospital_id' => $hospital_id])->result();
		$supplier = $this->db->get_where('supplier', ['hospital_id' => $hospital_id])->result();
		//print_r($supplier); die;
	    $this->load->view('pharmacy/purchasemedicine.php', ['suppliers' => $supplier, 'category' => $category, 'invoice' => $invoice_no]);
  }
public function addpurchasemedicine(){
	  	  $hospital_id = $this->session->userdata('id');
		  $name = $this->input->post('name');
		  $invoice = $this->input->post('invoice');
		  $pdate = $this->input->post('pdate');
		  $tax = $this->input->post('tax');
		  $grandtotal = $this->input->post('grandtotal');
		  $discount = $this->input->post('discount');
		  $finalpay = $this->input->post('finalpay');
		  $dnarration = $this->input->post('dnarration');
		  $mcat = $this->input->post('mcat[]');
		  $mname = $this->input->post('mname[]');
		  $bno = $this->input->post('bno[]');
		  $expdate = $this->input->post('expdate[]');
		  $medprice = $this->input->post('medprice[]');
		  $mrp = $this->input->post('mrp[]');
		  $saleprice = $this->input->post('saleprice[]');
		  $medquan = $this->input->post('medquan[]');
		  $tprice = $this->input->post('tprice[]');
			$zipped = array_map(null, $mcat, $mname, $bno, $expdate, $medprice, $medquan, $tprice, $saleprice, $mrp);
			for($i = 0 ; $i<count($mcat) ; $i++) {
				$med = $this->db->get_where('product', ['id' => $mname[$i]])->row();
				$quan = $this->db->get_where('product_manage', ['id' => $med->medicine_id])->row();
				$remainingquan = $quan->medicine_quantity + $medquan[$i];
				 $id = $med->medicine_id;
				 $this->db->where('id', $id)
                 ->update('product_manage', ['medicine_quantity' => $remainingquan]);
                $result = $this->db->affected_rows();
				if($result){
					$data = array(
					'supplier' => $name,
					'purchase_date' => $pdate,
					'grandtotal' => $grandtotal,
					'discount' => $discount,
					'finalpay' => $finalpay,
					'dnarration' => $dnarration,
					'quantity' => $medquan[$i],
					'purchase_price' => $medprice[$i],
					'mrp' => $mrp[$i],
					'sale_price' => $saleprice[$i],
					'total_price' => $tprice[$i],
					'batch_no' => $bno[$i],
					'expiry_date' => $expdate[$i],
					'medicine_id' => $mname[$i],
					'category_id' => $mcat[$i],
					'hospital_id' => $hospital_id,
					'tax' => $tax,
					'invoice_no' => $invoice,
					);
					$result = $this->db->insert('purchase_medicine', $data);
					
				}
				}
				if($result){
						echo "<script>alert('Medicine purchase successfully')</script>";
					  $this->load->view('pharmacy/purchase_medicine_report.php', ['mname' =>$mname, 'bno' => $bno, 'expdate' => $expdate, 'medprice' => $medprice, 'medquan' => $medquan, 'tprice' => $tprice, 'pdate' => $pdate, 'supplier' => $name, 'grandtotal' => $grandtotal, 'discount' => $discount, 'finalpay' => $finalpay, 'dnarration' => $dnarration, 'tax' => $tax, 'invoice' => $invoice]);
					}else{
						echo "<script>alert('Error')</script>";
					  $this->load->view('pharmacy/generatemedicinebill.php', ['time' => $time, 'patient' => $patient, 'doctor' => $doctor, 'category' => $category]);
					}
   }  
    public function selectdoctor(){
	 	  $hospital_id = $this->session->userdata('id'); 
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
  
  public function Export_medicin()
	{
		  $hospital_id = $this->session->userdata('id'); 
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
    $this->export($stock);
     redirect('pharmacyController/stock');
    // echo '<pre>'; print_r($stock); exit();
    // $this->load->view('pharmacy/addStock.php',['stock' => $stock]);
    
	// $this->load->view('pharmacy/addStock.php',['stock' => $stock]);
  }
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
  public function editstock(){
		 $id = $_GET['id'];
		 $stock = $this->db->get_where('stock_report', ['id' => $id])->row();
		$this->load->view('pharmacy/editStock.php', ['stock' => $stock]); 


	 }
	 public function updateStock(){	
	  $sid = $this->input->post('sid');   
	   $meddata = array(
	             'code' => $this->input->post('code'),
				 'product_name' => $this->input->post('product_name'),
				 'unit' => $this->input->post('unit'),
				 'current_stock' => $this->input->post('current_stock'),
				 'sales_scheme' => $this->input->post('sales_scheme'),
				 'purc_scheme_free' => $this->input->post('purc_scheme_free'),
				 'cost_price' => $this->input->post('cost_price'),
				 'purchase_price' => $this->input->post('purchase_price'),
				 'sales_price' => $this->input->post('sales_price'),
				 'mrp' => $this->input->post('mrp'),
				 'company' => $this->input->post('company'),
				 'purc_scheme_deal' => $this->input->post('purc_scheme_deal'),
				 'sales_scheme_deal' => $this->input->post('sales_scheme_deal'),
				 'sales_scheme_free' =>$this->input->post('sales_scheme_free'),
				 'manufacturer' => $this->input->post('manufacturer'),
				 'rack_no' => $this->input->post('rack_no'),
				);
	   // print_r($meddata);
		$this->db->where('id', $sid)
                 ->update('stock_report', $meddata);
                $result = $this->db->affected_rows();
                // print_r($result);exit();
				if($result){
					$this->session->set_flashdata('success1','Update Successfully');
                    	redirect('pharmacyController/pharmacymedicine');
				}else{
					$this->session->set_flashdata('error','Error!');
      	              redirect('pharmacyController/pharmacymedicine');
				}
   }

  }
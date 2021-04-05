<?php 
 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."controllers/SessionController.php");
class ImportController extends SessionController {  
 
	function __construct() {
		
		parent::__construct();
		$this->load->model('import_model');
		$this->load->model('pharmacyModel'); 
		$this->load->library('form_validation');
        $this->load->library('Pdf');
        // Load file helper
        $this->load->helper('file');
    }
public function index(){	
       
       $hospital_id = $this->session->userdata('id');
        $categorys = $this->pharmacyModel->getcategorylist($hospital_id);
        $this->load->view('pharmacy/excel_file_upload', ['category' => $categorys]);
    }
    
    public function import(){
        $data = array();
        $memData = array();
        $hospital_id = $this->session->userdata('id');
        // If import request is submitted
        if($this->input->post('importSubmit')){
           //  $catid = $this->input->post('medcat');
            // For/m field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
            // Validate submitted form data
            //if($this->form_validation->run() == true){
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                    
                    // Insert/update CSV data into database
					
                    if(!empty($csvData)){
						
                        foreach($csvData as $row){ $rowCount++;
						//echo "test"; die;
						//print_r($row); die;
						//$product_name = $row['medicine_name'];
						// check product exixt or not
						/*$chekdata = $this->import_model->checkproduct($product_name);
						if($chekdata){
							$product_id = $chekdata->id;
							$quan = $chekdata->medicine_quantity;
							$quantity = $quan+$row['quantity'];
							$updata = array(
							'medicine_quantity' => $quantity,
							'updated_at' => $date = date("Y-m-d"),
							);
							
						$result =	$this->import_model->updateproductquan($product_id, $updata);
							//echo $product_id; die;
						}else{ */
						 $meddata = array(
						             'code' => $row['Code'],
									 'product_name' => $row['Product Name'],
									 'unit' => $row['Unit'],
									 'current_stock' => $row['Current Stock'],
									 'sales_scheme' => $row['Sales Scheme'],
									 'purc_scheme_free' => $row['Purc.Scheme'],
									 'cost_price' => $row['Cost Price'],
									 'purchase_price' => $row['Purchase Price'],
									 'sales_price' => $row['Sales Price'],
									 'mrp' => $row['M.R.P.'],
									 'company' => $row['Company'],
									 'purc_scheme_deal' => $row['purc_scheme_deal'],
									 'sales_scheme_deal' => $row['sales_scheme_deal'],
									 'sales_scheme_free' => $row['sales_scheme_free'],
									 'manufacturer' => $row['Manufacturer'],
									 'rack_no' => $row['Rack No.'],
									
						  );	
						  $result =	$this->import_model->insertproduct($meddata);
                        }
						if($result){
							echo "<script>alert('Csv file import successfully')</script>";
							$categorys = $this->pharmacyModel->getcategorylist($hospital_id);
						     $this->load->view('pharmacy/excel_file_upload', ['category' => $categorys]);
						}
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }
            }else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }
    }
	public function sample(){
		$hospital_id = $this->session->userdata('id');
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
			'medicine_code',
			'medicine_name',
			'formulation',
			'p_price',
			'sale_price',
			'quantity',
			'supplier',
			'unit',
			'purchase_date',
			'expiry_date',
			'manufacture_date',
			'status',
			'batch_no',
			'd_price',
		);
		
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
		redirect('pharmacy/pharmacyReportController/sale_medicine_report');
	}
}

?>
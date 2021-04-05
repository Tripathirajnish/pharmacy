<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."controllers/SessionController.php");
class dashboardController extends SessionController {
    
    public function __construct()
	{
        parent::__construct(); 
        $this->load->model('dashboardModel');   
	}
    public function index()
	{
		$id = $this->session->userdata('id');
		$product = $this->dashboardModel->fetchProduct($id);
		$supplier = $this->dashboardModel->fetchSupplier($id);
		$category = $this->dashboardModel->fetchCategory($id);
		$doctor = $this->dashboardModel->fetchDoctor($id);
		$this->load->view('pharmacy/dashboard.php',['patient'=>$product,'supplier'=>$supplier,'category'=>$category,'doctor'=>$doctor]);

		//dashboard
    }
    
}
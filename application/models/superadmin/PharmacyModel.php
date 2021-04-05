<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pharmacyModel extends CI_model
{
	public function addProduct($data_array)
	{
		//print_r($data_array); die;
   	return  $this->db->insert('product', $data_array);
	}
	public function addProductmanage($data_array){
		return  $this->db->insert('product_manage', $data_array);
		
	}
	public function productList($id)
	{
		return $this->db->get_where('product', ['hospital_id' => $id, 'status' => 0])->result();
    }
	public function getCurrentMonthproduct($id)
	{
		$sql ="Select * from product WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())  AND status = 0 AND hospital_id =".$id;   		 
         $query = $this->db->query($sql);
       return $query->result();
    }
	public function getlastthreeMonthproduct($id)
	{
		$sql ="Select * from product where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 3 month AND status = 0 AND hospital_id =".$id;
         $query = $this->db->query($sql);
         return $query->result();
    }
	public function getlastsixMonthproduct($id)
	{
		$sql ="Select * from product where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month AND status = 0 AND hospital_id =".$id;
         $query = $this->db->query($sql);
         return $query->result();
    }
	public function getCurrentyearproduct($id)
	{
		$sql ="Select * from product  WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND status = 0 AND hospital_id =".$id;   		 
         $query = $this->db->query($sql);
        return $query->result();
    }
	public function getCurrentMonthexpiryproduct($id)
	{
		$sql ="Select * from product WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())  AND status = 1 AND hospital_id =".$id;   		 
         $query = $this->db->query($sql);
       return $query->result();
    }
	public function getlastthreeMonthexpiryproduct($id)
	{
		$sql ="Select * from product where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 3 month AND status = 1 AND hospital_id =".$id;
         $query = $this->db->query($sql);
         return $query->result();
    }
	public function getlastsixMonthexpiryproduct($id)
	{
		$sql ="Select * from product where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month AND status = 1 AND hospital_id =".$id;
         $query = $this->db->query($sql);
         return $query->result();
    }
	public function getCurrentyearexpiryproduct($id)
	{
		$sql ="Select * from product  WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND status = 1 AND hospital_id =".$id;   		 
         $query = $this->db->query($sql);
        return $query->result();
    }
	public function getCurrentMonthstockproduct($id)
	{
		$sql ="Select * from product_manage WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND hospital_id =".$id;   		 
         $query = $this->db->query($sql);
       return $query->result();
    }
	public function getlastthreeMonthstockproduct($id)
	{
		$sql ="Select * from product_manage where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 3 month AND hospital_id =".$id;
         $query = $this->db->query($sql);
         return $query->result();
    }
	public function getlastsixMonthstockproduct($id)
	{
		$sql ="Select * from product_manage where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month AND hospital_id =".$id;
         $query = $this->db->query($sql);
         return $query->result();
    }
	public function getCurrentyearstockproduct($id)
	{
		$sql ="Select * from product_manage  WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND hospital_id =".$id;   		 
         $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function updateProductmanage($data_array, $hid){
		$this->db->where('id', $hid)
              ->update('product_manage', $data_array);
    return $this->db->affected_rows();
	}
  public function stockList($hospital_id)
  {
     return $this->db->get_where('product_manage', ['hospital_id' => $hospital_id])->result();
  }
    public function getcategorylist($hospital_id){
		return $this->db->get_where('category', ['hospital_id' => $hospital_id])->result();
	}
	public function addcategory($array_data){
		return $this->db->insert('category', $array_data);
	}
	public function getcategorybyId($id){
		return $this->db->get_where('category', ['id' => $id])->row();
	}
	public function updatecategory($array_data, $id){
		$this->db->where('id', $id)
              ->update('category', $array_data);
    return $this->db->affected_rows();
	}
	public function deleteCategory($id){
		
		$this->db->delete('category', array('id' => $id));
    return $this->db->affected_rows();
	}
     public function getmedicine($value, $hospital_id)
  	{
  		if(isset($value)) 
      {
		$this->db->where('hospital_id',$hospital_id);
        $this->db->group_start(); 
        $this->db->like('medicine_name',$value);
		$this->db->group_end();
      } 
      $query  = $this->db->get_where('product_manage'); 
      $result = $query->result_array(); 
      return $result; 
  	}
	public function getlastIdBydescOrd(){
		$this->db->select('id');
		$this->db->from('product_manage');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();

	}
	public function getsalemedicine($value, $hospital_id){
	  if(isset($value)) 
      {
      $this->db->where('hospital_id',$hospital_id);
        $this->db->group_start(); 
        $this->db->like('medicine_name',$value);
		$this->db->group_end();
      } 
      $query  = $this->db->get_where('product_manage'); 
      $result = $query->result_array(); 
      return $result; 
	}
	public function getmedicineById($hid){
		$this->db->select('expiry_date, quantity, id');
		$this->db->from('product');
		$this->db->where('medicine_id', $hid);
		$this->db->order_by('expiry_date', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function updatemedicinequantity($id, $data_array){
		$this->db->where('id', $id)
              ->update('product', $data_array);
    return $this->db->affected_rows();
	}
	public function getQuantityFromProductManage($hid){
		return $this->db->get_where('product_manage', ['id' => $hid])->row();
	}
	public function updatemedicinequantitymanage($id, $datam_array)
	{
		///print_r($datam_array); die;
		$this->db->where('id', $id)
              ->update('product_manage', $datam_array);
    return $this->db->affected_rows();
	}
	public function checAvailablity($id, $hospital_id){
		return $this->db->get_where('product_manage', ['id' => $id, 'hospital_id' => $hospital_id])->row();
	}
	public function getMedicinePrice($id, $hospital_id){
		$this->db->select('sale_price');
		$this->db->from('product');
		$this->db->where('medicine_id', $id);
		$this->db->where('hospital_id', $hospital_id);
		$this->db->order_by('sale_price', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function addpatient_details($arra_data){
		return $this->db->insert('sale_product', $arra_data);
	}
	public function getpatientDetails(){
		$this->db->select('*');
		$this->db->from('sale_product');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function updatemedicine($id, $array_data){
		$this->db->where('id', $id)
              ->update('product', $array_data);
    return $this->db->affected_rows();
	}
	public function updatemanageedicine($id, $manage_data){
		$this->db->where('id', $id)
              ->update('product_manage', $manage_data);
    return $this->db->affected_rows();
	}
	public function getExpiryData($hospital_id){
		return $this->db->get_where('product', ['hospital_id' => $hospital_id, 'status' => 1])->result();
	}
	////public function getCategoryList(){
	//	return $this->db->get('category')->result();
	//}
	public function getopdpatientforbill($hospital_id){
		return $this->db->get_where('opd', ['hospital_id' => $hospital_id])->result();
	}
	public function getipdpatientforbill($hospital_id){
		return $this->db->get_where('ipd', ['hospital_id' => $hospital_id])->result();
	}
	public function getbillno($hospital_id){
		$this->db->select('id');
		$this->db->from('bill_generate');
		$this->db->order_by('id', 'desc');
		$this->db->where('hospital_id', $hospital_id);
		$query = $this->db->get();
		return $query->row();	
	}
	public function getinvoiceno($hospital_id){
		$this->db->select('id');
		$this->db->from('purchase_medicine');
		$this->db->order_by('id', 'desc');
		$this->db->where('hospital_id', $hospital_id);
		$query = $this->db->get();
		return $query->row();	
	}
	public function getCurrentMonthdata($hospital_id){
		 $sql ="Select * from purchase_medicine  WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND hospital_id =".$hospital_id;   		 
         $query = $this->db->query($sql);
    return $query->result();
	}
	public function getCurrentyeardata($hospital_id){
		 $sql ="Select * from purchase_medicine  WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND hospital_id =".$hospital_id;   		 
         $query = $this->db->query($sql);
    return $query->result();
	}
	public function getlastthreeMonthdata($hospital_id){
		 $sql ="Select * from purchase_medicine where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 3 month AND hospital_id =".$hospital_id;
         $query = $this->db->query($sql);
         return $query->result();
	       		 
 	
	}
	public function getlastsixMonthdata($hospital_id){
		 $sql ="Select * from purchase_medicine where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month AND hospital_id =".$hospital_id;
         $query = $this->db->query($sql);
         return $query->result();
	}
		public function getCurrentgMonthdata($hospital_id){
		 $sql ="Select * from bill_generate WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND hospital_id =".$hospital_id;   		 
         $query = $this->db->query($sql);
    return $query->result();
	}
	public function getCurrentgyeardata($hospital_id){
		 $sql ="Select * from bill_generate  WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND hospital_id =".$hospital_id;   		 
         $query = $this->db->query($sql);
    return $query->result();
	}
	public function getlastthreegMonthdata($hospital_id){
		 $sql ="Select * from bill_generate where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 3 month AND hospital_id =".$hospital_id;
         $query = $this->db->query($sql);
         return $query->result();
	       		 
 	
	}
	public function getlastsixgMonthdata($hospital_id){
		 $sql ="Select * from bill_generate where created_at > curdate() - interval (dayofmonth(curdate()) - 1) day - interval 6 month AND hospital_id =".$hospital_id;
         $query = $this->db->query($sql);
         return $query->result();
	}
}
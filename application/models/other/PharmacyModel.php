<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pharmacyModel extends CI_model
{
	public function addProduct($data_array)
	{
   	return  $this->db->insert('product', $data_array);
	}
	public function addProductmanage($data_array){
		return  $this->db->insert('product_manage', $data_array);
		
	}
	public function productList($id)
	{
		return $this->db->get_where('product', ['hospital_id' => $id, 'status' => 0])->result();
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
}